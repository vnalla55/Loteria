<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class partner_model extends CI_Model {
    function getallpartnerlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id', 'partner_name',  'username', 'email', 'address', 'country', 'phoneno', 'postalcode', 'partner_icon');
        
        // DB table to use
        $sTable = 'business_partner';
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
        $rResult = $this->db->get($sTable);
    
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
                if($col=='partner_icon')
                {
                    if($aRow[$col]){
                       $row[]=' <img style="width:75px;" title="'.$aRow[$col].'" alt="'.$aRow[$col].'" src="'.base_url().'partnericons/'.$aRow[$col].'">';  
                       
 
                    }
                    else{
                        $row[]=$aRow[$col]; 
                    }
                    
                }else {
                  $row[] = $aRow[$col];  
                }
                
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#partneredit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Partner"><i class="glyphicon glyphicon-edit" alt="'.$aRow['id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#partnerdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['id'].'"></i></a>';
                if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            if($allpermissioninfo[17]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[17]['deletetask'] == 0)
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
     function getbusinesspartneremail($businesspartnerid){
        $this->db->select('email,partner_name');
        $this->db->where('id',$businesspartnerid);
        $query = $this->db->get('business_partner');
        $row = $query->row();
        //echo $this->db->last_query();
        
        return $row->email.'/'.$row->partner_name;
    }
     function registerbetinfointopartnertable($cart_itm,$userid){
       
              
         $new_member_insert_data = array(
            'betno_slot1' => $cart_itm['betno_slot1'],
            'betno_slot2' => $cart_itm['betno_slot2'],
            'betno_slot3' => $cart_itm['betno_slot3'],
            'betno_slot4' => $cart_itm['betno_slot4'],
            'betno_slot5' => preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $cart_itm['betno_slot5']),
            'lottery_announcement_detail_id' => $cart_itm['announcement_id'],
            'better_id' => $userid,
            'partner_id' => $cart_itm['partnerid'],
             'game_id' => trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $cart_itm['gametypeid'])),
            'bet_amount' => $cart_itm['bet_amount'],
            'bet_date' => $cart_itm['bet_date'],
              'ticket_no' => $cart_itm['ticketno'],
             'drawing_date' => $cart_itm['drawingdate'],
           
        );
           //print_r($cart_itm);
         //print_r($new_member_insert_data);
         //exit();
        $this->db->insert('loto_bet_history_for_partner', $new_member_insert_data);
        
        
    }
    function getpartnerforlottouser(){
           $this->db->select('*');
            $this->db->from('business_partner');
            $result = $this->db->get();
            return $result;
    }
     public function getallcombovaluebusinesspartner() {


        $sql = "SELECT id, partner_name
FROM business_partner";

        $result = $this->db->query($sql);

        return $result->result_array();
    }
    function getbusinesspartnerinfo(){
          $query = $this->db->get('business_partner');
            return $query;
    }
     public function getbusinesspartnerinfobyid($partner_id) {

        $result = $this->db->get_where('business_partner', array('id' => $partner_id));
        return $result->result_array();
    }
    function getbusinesspartner() {
        try {
            $num_rows = $this->db->get('business_partner')->num_rows();


            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 9;

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
$sortby=$_POST['sortby'];
            // The "back" link
            $prevlink = ($page > 1) ? '<a href="javascript:getbusinesspartnerdiv(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getbusinesspartnerdiv(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getbusinesspartnerdiv(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getbusinesspartnerdiv(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            //$this->db->get('subscription_content', $limit, $offset);
            // $this->db->order_by("subscribed_date", "desc");
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}
            $query = $this->db->get('business_partner', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
     public function updatebusinesspartnerinfo($partner_id) {


        $allowedExts = array("gif", "jpeg", "jpg", "png");
        if ($_FILES["partnerfile"]["name"]) {
            $temp = explode(".", $_FILES["partnerfile"]["name"]);
            $extension = end($temp);

            if ((($_FILES["partnerfile"]["type"] == "image/gif") || ($_FILES["partnerfile"]["type"] == "image/jpeg") || ($_FILES["partnerfile"]["type"] == "image/jpg") || ($_FILES["partnerfile"]["type"] == "image/pjpeg") || ($_FILES["partnerfile"]["type"] == "image/x-png") || ($_FILES["partnerfile"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                if ($_FILES["partnerfile"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } else {
                    //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                    // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                    if (file_exists("partnericons/" . $_FILES["partnerfile"]["name"])) {
                        echo $_FILES["partnerfile"]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["partnerfile"]["tmp_name"], "partnericons/" . $_FILES["partnerfile"]["name"]);
                        $renamedfile=$this->input->post('name').date('Y-m-d H.i.s').'.'.$extension;
                        //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
                        rename("./partnericons/".$_FILES["partnerfile"]["name"], "./partnericons/".$renamedfile);
                        $new_member_insert_data=array();
                        if ($this->input->post('password')) {
                            $new_member_insert_data = array(
                            'partner_name' => $this->input->post('name'),
                            'username' => $this->input->post('username'),
                            'password' => md5($this->input->post('password')),
                            'email' => $this->input->post('email'),
                            'address' => $this->input->post('address'),
                            'country' => $this->input->post('country'),
                            'phoneno' => $this->input->post('phoneno'),
                            'postalcode' => $this->input->post('postalcode'),
                            'partner_icon' => $renamedfile,
                        );
                        }
                        else {
                          $new_member_insert_data = array(
                            'partner_name' => $this->input->post('name'),
                            'username' => $this->input->post('username'),
                            
                            'email' => $this->input->post('email'),
                            'address' => $this->input->post('address'),
                            'country' => $this->input->post('country'),
                            'phoneno' => $this->input->post('phoneno'),
                            'postalcode' => $this->input->post('postalcode'),
                            'partner_icon' => $renamedfile,
                        );  
                        }
                        


                        $this->db->where('id', $partner_id);
                        $insert = $this->db->update('business_partner', $new_member_insert_data);

  

                        if ($insert) {
                            //echo '1';
                           return 1;

                            //$this->load->view('userprofile');
                        }



                        $dir = "partnericons";
                        $dirHandle = opendir($dir);
                        while ($file = readdir($dirHandle)) {
                            if ($file == $this->input->post('previouspartnericon')) {
                                if (unlink($dir . '/' . $file)) {
                                    //echo 'file successfully deleted';
                                } else {
                                    // echo 'file could not be deleted';
                                }
                            }
                        }

                        closedir($dirHandle);
                    }//if file doesnot exist
                }
            } else {
                echo "Invalid file";
            }
        } else {
              $new_member_insert_data=array();
                        if ($this->input->post('password')) {
                              $new_member_insert_data = array(
                'partner_name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'country' => $this->input->post('country'),
                'phoneno' => $this->input->post('phoneno'),
                'postalcode' => $this->input->post('postalcode'),
            );
                        }
                        else {
                           $new_member_insert_data = array(
                'partner_name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
               
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'country' => $this->input->post('country'),
                'phoneno' => $this->input->post('phoneno'),
                'postalcode' => $this->input->post('postalcode'),
            );
                        }
           


            $this->db->where('id', $partner_id);
            $insert = $this->db->update('business_partner', $new_member_insert_data);


            if ($insert) {
                //echo '1';
               return 1;

                //$this->load->view('userprofile');
            }
        }//if another file isnot selected
    }
     function getbusinesspartnerusernamebyid($partner_id) {
        $this->db->select('username');
        $query = $this->db->get_where('business_partner', array('id' => $partner_id));
        $row = $query->row();
        return $row->username;
    }
     function check_if_other_username_exists_in_businesspartnertable() {
        $username = $this->input->post('username');
        //$this->load->database();
        if ($username != $_SESSION['businesspartnerflag']) {
            $this->db->where('username', $username);
            $result = $this->db->get('business_partner');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    public function addbusinesspartnerinfo() {

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        if ($_FILES["partnerfile1"]["name"]) {
            $temp = explode(".", $_FILES["partnerfile1"]["name"]);
            $extension = end($temp);

            if ((($_FILES["partnerfile1"]["type"] == "image/gif") || ($_FILES["partnerfile1"]["type"] == "image/jpeg") || ($_FILES["partnerfile1"]["type"] == "image/jpg") || ($_FILES["partnerfile1"]["type"] == "image/pjpeg") || ($_FILES["partnerfile1"]["type"] == "image/x-png") || ($_FILES["partnerfile1"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                if ($_FILES["partnerfile1"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } else {
                    //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                    // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                    if (file_exists("partnericons/" . $_FILES["partnerfile1"]["name"])) {
                        echo $_FILES["partnerfile1"]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["partnerfile1"]["tmp_name"], "partnericons/" . $_FILES["partnerfile1"]["name"]);
                        //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
                        $renamedfile=$this->input->post('name').date('Y-m-d H.i.s').'.'.$extension;
 rename("./partnericons/".$_FILES["partnerfile1"]["name"], "./partnericons/".$renamedfile);
                      
                        $new_member_insert_data = array(
                            'partner_name' => $this->input->post('name'),
                            'username' => $this->input->post('username'),
                            'password' => md5($this->input->post('password')),
                            'email' => $this->input->post('email'),
                            'address' => $this->input->post('address'),
                            'country' => $this->input->post('country'),
                            'phoneno' => $this->input->post('phoneno'),
                            'postalcode' => $this->input->post('postalcode'),
                            'partner_icon' => $renamedfile,
                        );

                        $insert = $this->db->insert('business_partner', $new_member_insert_data);


                        if ($insert) {
                            //echo '1';
                           return 1;

                            //$this->load->view('userprofile');
                        }
                    }//if file doesnot exist
                }
            } else {
                echo "Invalid file";
            }
        } else {
            echo "No file selected";
        }//if another file isnot selected
    }
    function check_if_username_exists_in_businesspartnertable() {

        $this->db->where('username', $this->input->post('username'));
        $result = $this->db->get('business_partner');

        if ($result->num_rows() > 0) {
             
            return TRUE;
            
           
        } else {
            return FALSE;
        }
    }
       public function deletebusinesspartnerinfo($partnerinfo_id) {
        $sql = "SELECT partner_icon FROM business_partner where id = '" . $partnerinfo_id . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row = $result->row();

        $dir = "partnericons";
        $dirHandle = opendir($dir);
        while ($file = readdir($dirHandle)) {
            if ($file == $row->partner_icon) {
                if (unlink($dir . '/' . $file)) {
                    //echo 'file successfully deleted';
                } else {
                    // echo 'file could not be deleted';
                }
            }
        }

        closedir($dirHandle);
        if ($this->db->delete('business_partner', array('id' => $partnerinfo_id)))
            return 1;
    }
     function search_businesspartner() {


        $result = $this->db->query("select * from business_partner where partner_name like'" . $this->input->post('input') . "%'");

        //$customers=array();
        $list = "<ul class='unorganizedfromscratch'>";
        foreach ($result->result() as $row) {
            //$customer= "";
            $list .="<li class='unorganizedfromscratchli'>" . $row->id . "/" . $row->partner_name . " </li>";
        }
        $list.="</ul>";
        echo $list;
        //echo json_encode($customers);
    }
     function getbusinesspartnerid($backendusername) {
        $this->db->select('id');
        $query = $this->db->get_where('business_partner', array('username' => $backendusername));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->id;
    }
}