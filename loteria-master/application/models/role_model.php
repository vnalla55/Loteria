<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class role_model extends CI_Model {
     public function updateassignmentinfo() {
       // echo'roleid='. $this->input->post('role_id');
        $modulenall = array();
        $modulenall = $this->input->post('modulenall');
 //print_r($modulenall);
        foreach ($modulenall as list($a, $b, $c, $d, $e, $f, $g, $h)) {
            $data = array(
                'role_id' => $a,
                'module_id' => $b,
                'viewtask' => $c,
                'addtask' => $d,
                'updatetask' => $e,
                'deletetask' => $f,
                'others' => $g,
            );
            print_r($data);
            $this->db->where('assignment_id', $h);
           
                $this->db->update('role_assignment', $data);
              
            
        }



//$this->db->insert_batch('role_assignment', $data);
    }
      function gettheassignmentofgivenadmin($role_id) {
             $result = $this->db->get_where('role_assignment', array('role_id' => $role_id));
            return $result->result_array();
        
    }
     public function deleteadminassignmentinfo($role_id) {

        $new_member_insert_data = array(
            'viewtask' => 0,
            'addtask' => 0,
            'updatetask' => 0,
            'deletetask' => 0,
            'others' => 0
        );
        $this->db->where('role_id', $role_id);
         $insert = $this->db->update('role_assignment', $new_member_insert_data);
    }
    
    
    
     function getallrolelistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('role_id', 'rolename');
        
        // DB table to use
        $sTable = 'roles';
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
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#roleedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Role"><i class="glyphicon glyphicon-edit" alt="'.$aRow['role_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#roledelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['role_id'].'"></i></a>';
            
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
        if($allpermissioninfo[13]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[13]['deletetask'] == 0)
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
    function getallrolelist($partner_id) {
       
               try {
           
                $query = $this->db->get('roles');
                return $query;
            }
            
        catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
   
        public function getroleinfobyid($roleinfo_id) {

    
            $result = $this->db->get_where('roles', array('role_id' => $roleinfo_id));
            return $result->result_array();
        
    }
     public function deleteroleinfo($roleinfo_id) {
       
            if ($this->db->delete('roles', array('role_id' => $roleinfo_id)))
               return 1;
        
    }
    
    public function addroleinfo($partner_id) {
            $new_member_insert_data = array(
                'rolename' => $this->input->post('rolename'),
            );

            $insert = $this->db->insert('roles', $new_member_insert_data);
            if ($insert) {
                //echo '1';


                $last_admin_id = $this->db->insert_id();
            $data = array(
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 1,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 2,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 3,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 4,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 5,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 6,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 7,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 8,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 9,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 10,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 11,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 12,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ), array(
                    'role_id' => $last_admin_id,
                    'module_id' => 13,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 14,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 15,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 16,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 17,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                ),
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 18,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                )
                ,
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 19,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                )
                ,
                array(
                    'role_id' => $last_admin_id,
                    'module_id' => 20,
                    'viewtask' => 0,
                    'addtask' => 0,
                    'updatetask' => 0,
                    'deletetask' => 0,
                    'others' => 0
                )
            );

            $this->db->insert_batch('role_assignment', $data);
            return 1;
            }
           
        
    }
         public function updateroleinfo($roleinfo_id) {


        $new_member_insert_data = array(
            'rolename' => $this->input->post('rolename'),
        );
        $this->db->where('role_id', $roleinfo_id);
       
            $insert = $this->db->update('roles', $new_member_insert_data);
            if ($insert) {
               return 1;


                //$this->load->view('userprofile');
            }
        
    }

        public function getallcombovalueforroles($partner_id) {
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
              $sql = "SELECT  *
FROM roles ";

            $result = $this->db->query($sql);

            return $result->result_array();
        
    }

}