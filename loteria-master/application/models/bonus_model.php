<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bonus_model extends CI_Model {
    
    function getallbonuslistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('bonus_id', 'beneficiary_id','lastname','name','email','bonus_amount','bonus_date');
        
        // DB table to use
        $sTable = 'bonus';
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


            $this->db->join('user', 'user_id = 	beneficiary_id');
        $rResult = $this->db->get('');
    
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
             $lastnametemp='';
            foreach($aColumns as $col)
            {
               
               if($col=='lastname')
               {
                   $lastnametemp=$aRow['lastname'];
                 //$row['name'].=' '.$aRow['lastname'];   
               }
               else if($col=='name'){
                   $row[] = $aRow[$col].' '.$lastnametemp;
               }
               
               else 
               {
                 $row[] = $aRow[$col];  
               }
                
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#bonusedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Bonus"><i class="glyphicon glyphicon-edit" alt="'.$aRow['bonus_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#bonusdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['bonus_id'].'"></i></a>';
              if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
        if($allpermissioninfo[11]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[11]['deletetask'] == 0)
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
    function searchbonus() {
        try {

            $this->db->select('*');
            $this->db->from('bonus');

            $this->db->join('user', 'user_id = beneficiary_id');
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');

            $num_rows = $this->db->get('')->num_rows();
            //$num_rows=$this->db->count_all_results();
            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 12;

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
            $prevlink = ($page > 1) ? '<a href="javascript:processsearchforbonus(1)" title="First page">&laquo;</a> <a href="javascript:processsearchforbonus(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:processsearchforbonus(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:processsearchforbonus(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';


            // $this->db->like($this->input->post('arg1'), $this->input->post('arg2'),'after'); 



            $this->db->select('*');
            $this->db->from('bonus');

            $this->db->join('user', 'user_id = beneficiary_id');
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');
            $this->db->order_by("bonus_date", "desc");



            $query = $this->db->get('', $limit, $offset);
            return $query;
            //echo $this->db->last_query();
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

 public function getbonusinfobyid($bonusinfo_id) {
        $result = $this->db->get_where('bonus', array('bonus_id' => $bonusinfo_id));
        return $result->result_array();
    }
        public function updatebonusinfo($bonusinfo_id) {


        $new_member_insert_data = array(
            'beneficiary_id' => $this->input->post('beneficiary_id'),
            'bonus_amount' => $this->input->post('bonus_amount'),
            'bonus_date' => $this->input->post('bonus_date'),
        );
        $this->db->where('bonus_id', $bonusinfo_id);
        $insert = $this->db->update('bonus', $new_member_insert_data);
        if ($insert) {
           return 1;


            //$this->load->view('userprofile');
        }
    }
       public function addbonusinfo() {

        $new_member_insert_data = array(
            'beneficiary_id' => $this->input->post('beneficiary_id'),
            'bonus_amount' => $this->input->post('bonus_amount'),
            'bonus_date' => $this->input->post('bonus_date')
        );
        $insert = $this->db->insert('bonus', $new_member_insert_data);
        if ($insert) {
          return 1;


            //$this->load->view('userprofile');
        }
    }
     public function deletebonus($bonus_id) {
        if ($this->db->delete('bonus', array('bonus_id' => $bonus_id)))
            return 1;
    }
    function getallbonus() {

        try {
            $num_rows = $this->db->get('bonus')->num_rows();
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
            $limit = 12;

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
            $prevlink = ($page > 1) ? '<a href="javascript:getallbonus(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getallbonus(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getallbonus(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getallbonus(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            $this->db->select('*');
            $this->db->from('bonus');

            $this->db->join('user', 'user_id = beneficiary_id');
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}
            $this->db->order_by("bonus_date", "desc");


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

}