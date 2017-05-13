<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class admin_model extends CI_Model {
    
    
    function getalladminlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('admin_id', 'username', 'otheradminemail', 'rolename');
        
        // DB table to use
        $sTable = 'admin_login';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $this->db->from($sTable);
$this->db->join('roles', 'roles.role_id = admin_login.role_id');

                 if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
        $this->db->where('username !=', $_SESSION['lottobackendusername']);
     }
     
     }
                
        $rResult = $this->db->get('');
        //echo $this->db->last_query();
       // exit();
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        //$aColumns1 = array('role_id', 'rolename');
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#adminedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Admin"><i class="glyphicon glyphicon-edit" alt="'.$aRow['admin_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#admindelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['admin_id'].'"></i></a>';
            
         
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
         if($allpermissioninfo[2]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[2]['deletetask'] == 0)
    $deletelink='<i class="glyphicon glyphicon-trash"></i>'; 
     }
     
     }
     $row[] =$updatelink.'|'.$deletelink;
            $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
function getallassociatedadmins($roleid){
      $sql = "SELECT otheradminemail,username
FROM admin_login where role_id =".$roleid;

        $result = $this->db->query($sql);

        return $result->result_array();
}
function get_all_the_admin_with_role_id_6(){
     $this->db->select('otheradminemail,username');
         $this->db->from('admin_login');
            $this->db->where('role_id', 6);
             
      $result= $this->db->get();
      return $result;
}
   



    
    function adminloginvalidate() {
        $superadminkiotherkipartnerkisub = 'none';
        $query='';
        if ($this->input->post('username') && $this->input->post('password')) {
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('password', md5($this->input->post('password')));
            if ($_SESSION['lottobackendusertypebeforevalidation']=='backendsuperadmin') {
                $query = $this->db->get('super_admin');
                $superadminkiotherkipartnerkisub = 'superadmin';
            } else if ($_SESSION['lottobackendusertypebeforevalidation']=='backendotheradmin') {
                $query = $this->db->get('admin_login');
                $superadminkiotherkipartnerkisub = 'otheradmin';
            }  else if ($_SESSION['lottobackendusertypebeforevalidation']=='backendbusinesspartner') {
                $query = $this->db->get('business_partner');
                $superadminkiotherkipartnerkisub = 'businesspartner';
                
                
            } 
            

            if ($query->num_rows == 1) {
                return $superadminkiotherkipartnerkisub;
            }
        } else
            return $superadminkiotherkipartnerkisub;
    }
  

   

   

   

    function getotheradminid($backendusername) {
        $this->db->select('role_id');
        $query = $this->db->get_where('admin_login', array('username' =>$backendusername  ));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->role_id;
    }

    

   

   

   

   

   
    
   

    

       

    
    

    

    

    function getnoofmodulelistforform() {
    
            $num_rows = $this->db->get('modules')->num_rows();


            return $num_rows;
        
    }

   

    

   

   

    function getallmodulelistforform() {
      
            $query = $this->db->get('modules');


            return $query;
        
    }

    function getallmodulelist() {
        try {
            $num_rows = $this->db->get('modules')->num_rows();
            //$this->db->select('*');
            //$this->db->from('results');
            //$this->db->join('lottery', 'lottery.lottery_id = results.lottery_id');
            //$this->db->order_by("serology_id", "desc");
            //$this->db->where('registered',0);
            //$this->db->or_where('registered',1);
            //$result = $this->db->get();
            //return $result;
            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 10;

            // How many pages will there be
            $pages = ceil($total / $limit);


            // What page are we currently on?

            $page = $_POST['page'];
            //$page=2;
            // Calculate the offset for the query
            $offset = ($page - 1) * $limit;



            // Some information to display to the user
            $start = $offset + 1;
            $end = min(($offset + $limit), $total);

            // The "back" link
            $prevlink = ($page > 1) ? '<a href="javascript:getmodulesdiv(1)" title="First page">&laquo;</a> <a href="javascript:getmodulesdiv(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getmodulesdiv(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:getmodulesdiv(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            $this->db->select('*');
            $this->db->from('modules');
            // $this->db->join('lottery', 'lottery.lottery_id = bet_history.lottery_id');
            //$this->db->join('user', 'user_id = better_id');
            //$this->db->join('game_type', 'game_id = gametype_id');
            // $this->db->order_by("bet_date", "desc");
//$this->db->order_by("serology_id", "desc");
            //$this->db->where('registered',0);
            //$this->db->or_where('registered',1);
            //$result = $this->db->get();
            //return $result;
            $query = $this->db->get('', $limit, $offset);
            //echo $this->db->last_query();

            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

    
    
    

    
   

    

    
   
   

     

    
    

  

   

  

   

    function getadminmodulepermission($roleid) {

        $result = $this->db->get_where('role_assignment', array('role_id' => $roleid));
        return $result->result_array();
    }

   
   

    function getadminemail() {
        $this->db->select('admin_email');
        $query = $this->db->get('admin_setting');
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->admin_email;
    }
  function getadminname() {
        $this->db->select('admin_name');
        $query = $this->db->get('admin_setting');
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->admin_name;
    }
  

    

  
    

     

    public function deleteotheradmininfo($otheradmininfo_id) {
        if ($this->db->delete('admin_login', array('admin_id' => $otheradmininfo_id)))
                return 1;
    }

   

   

    
 

    

    
   

    

    


   
   
   




    public function approvedisapproveuserbybusinesspartnerinfo($bet_id_forpartner) {

        $new_member_insert_data = array(
            'partner_approved_status' => 1,
        );
        $this->db->where('bet_id_forpartner', $bet_id_forpartner);
        $insert = $this->db->update('loto_bet_history_for_partner', $new_member_insert_data);
        if ($insert) {
            echo '1';


            //$this->load->view('userprofile');
        }
    }

   

   

    

    
    

    public function updateotheradmininfo($otheradmin_id) {
 if ($this->input->post('password')) {
      $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'otheradminemail' => $this->input->post('otheradminemail'),
            'role_id' => $this->input->post('designation'),
        );
        
            $this->db->where('admin_id', $otheradmin_id);
            $insert = $this->db->update('admin_login', $new_member_insert_data);
        


        if ($insert) {
            return 1;


            //$this->load->view('userprofile');
        }
 }else{
   $new_member_insert_data = array(
            'username' => $this->input->post('username'),
           
            'otheradminemail' => $this->input->post('otheradminemail'),
            'role_id' => $this->input->post('designation'),
        );
        
            $this->db->where('admin_id', $otheradmin_id);
            $insert = $this->db->update('admin_login', $new_member_insert_data);
        


        if ($insert) {
           return 1;

            //$this->load->view('userprofile');
        }  
 }
       
    }

   

    
   

    

    function check_if_username_exists() {

        $this->db->where('username', $this->input->post('username'));
        $result = $this->db->get('admin_login');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

   

   

    
    

    function getotherusernamebyid($adminid) {
        $this->db->select('username');
      $query = $this->db->get_where('admin_login', array('admin_id' => $adminid));
            $row = $query->row();
            return $row->username;
    }

   

   

    
    function check_if_other_username_exists() {
        $username = $this->input->post('username');
        //$this->load->database();
        if ($username != $_SESSION['otheradminflag']) {
            $this->db->where('username', $username);
            $result = $this->db->get('admin_login');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function addotheradmininfo($partner_id) {


       
       
            $new_member_insert_data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'otheradminemail' => $this->input->post('otheradminemail'),
                'role_id' => $this->input->post('designation'),
            );
            $insert = $this->db->insert('admin_login', $new_member_insert_data);


            if ($insert) {
                //echo json_encode(array('status' => 2, 'message' => 'Add successful'));


                //$this->load->view('userprofile');
                return 1;
            }
        
    }

   

    public function addassignmentinfo() {
        echo $this->input->post('role_id');
        $modulenall = array();
        $modulenall = $this->input->post('modulenall');
// print_r($modulenall);
        foreach ($modulenall as list($a, $b, $c, $d, $e, $f)) {
            $data = array(
                'role_id' => $a,
                'module_id' => $b,
                'viewtask' => $c,
                'addtask' => $d,
                'updatetask' => $e,
                'deletetask' => $f
            );
            $this->db->insert('role_assignment', $data);
        }



//$this->db->insert_batch('role_assignment', $data);
    }

    public function getallcombovalueformoduleadd() {


        $sql = "SELECT module_name, module_id
FROM modules";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    public function getallcombovalueforotheradminviewedit() {
        // $this->db->select('lottery.lottery_name,lottery.lottery_id');
        //$this->db->from('lottery');
        //$this->db->join('results', 'lottery.lottery_id=results.lottery_id','left');
        //$this->db->order_by("serology_id", "desc");
        //$this->db->where('lottery.lottery_id',$serology_id);
        //$this->db->or_where('registered',1);
        //$result = $this->db->get();
        //return $result;
        // echo $this->db->last_query();
        //$this->db->get_where('lottery', array('lottery_id' => $serology_id));

        $sql = "SELECT DISTINCT username, admin_id
FROM admin_login
WHERE (admin_id)  IN
(SELECT role_id FROM role_assignment) and designation != 'super_admin'";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    public function getallcombovalueforotheradminadd() {
        // $this->db->select('lottery.lottery_name,lottery.lottery_id');
        //$this->db->from('lottery');
        //$this->db->join('results', 'lottery.lottery_id=results.lottery_id','left');
        //$this->db->order_by("serology_id", "desc");
        //$this->db->where('lottery.lottery_id',$serology_id);
        //$this->db->or_where('registered',1);
        //$result = $this->db->get();
        //return $result;
        // echo $this->db->last_query();
        //$this->db->get_where('lottery', array('lottery_id' => $serology_id));

        $sql = "SELECT DISTINCT username, admin_id
FROM admin_login
WHERE (admin_id) NOT IN
(SELECT role_id FROM role_assignment) and designation != 'super_admin'";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

   

    public function getotheradmininfobyid($otheradmin_id) {
       $result = $this->db->get_where('admin_login', array('admin_id' => $otheradmin_id));
            return $result->result_array();
    }

    
   

   

   

    
    function changepassword() {

 
    $username=$_SESSION['lottobackendusername'];
    $query='';
        if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
        {
             
             $this->db->where('username', $username);
        $this->db->where('password', md5($this->input->post('password')));
         $query = $this->db->get('super_admin'); 
        
        }
            
        else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin')
        {
            
            $this->db->where('username', $username);
        $this->db->where('password', md5($this->input->post('password')));
            
          $query = $this->db->get('admin_login');   
         
        }
           
       
         else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner')
     
        {
             
             $this->db->where('username', $username);
        $this->db->where('password', md5($this->input->post('password')));
            $query = $this->db->get('business_partner');
            
        }
        
        if ($query->num_rows == 1 ) {


            $new_member_insert_data = array(
               
                'password' => md5($this->input->post('password1')),
            );
            $this->db->where('username', $username);
             if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                 $insert = $this->db->update('super_admin', $new_member_insert_data);
            else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin')
                $insert = $this->db->update('admin_login', $new_member_insert_data);
           
            else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner')
                $insert = $this->db->update('business_partner', $new_member_insert_data);
           
            if ($insert) {
                //return TRUE;

                echo json_encode(array('status' => 1, 'message' => 'Password successfully changed'));


                //$this->load->view('userprofile');
            }
        } else {
            echo json_encode(array('status' => 2, 'message' =>'Incorrect password. Try again'));
        }
}
        
    

}
