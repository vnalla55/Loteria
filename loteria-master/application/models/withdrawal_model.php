<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class withdrawal_model extends CI_Model {
     function getallwithdrawallistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('withdrawal_id', 'email','withdraw_amount','withdraw_date','withdraw_method','withdraw_status');
        
        // DB table to use
        $sTable = 'withdrawals';
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


            $this->db->join('user', 'user_id = 	withdrawer_id');
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
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#withdrawaledit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Role"><i class="glyphicon glyphicon-edit" alt="'.$aRow['withdrawal_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#withdrawaldelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['withdrawal_id'].'"></i></a>';
            $approvedisapprovelink='<a class="popup" data-toggle="modal" data-target="#withdrawalapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="withdraw approve""><i class="glyphicon glyphicon-ok" alt="'.$aRow['withdrawal_id'].'-1" ></i></a> | <a class="popup" data-toggle="modal" data-target="#withdrawalapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="withdraw disapprove""><i class="glyphicon glyphicon-remove" alt="'.$aRow['withdrawal_id'].'-0" ></i></a>';
           if($aRow['withdraw_status']=='approved')
               $approvedisapprovelink='<i class="glyphicon glyphicon-ok"></i>';
           else if($aRow['withdraw_status']=='disapproved')
                $approvedisapprovelink='<i class="glyphicon glyphicon-remove"></i>';
            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                 if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') {
                    $row[] =$approvedisapprovelink;  
                 }
     else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            if($allpermissioninfo[9]['others'] == 1)
                    $row[] =$approvedisapprovelink;
                    
                  if($allpermissioninfo[9]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[9]['deletetask'] == 0)
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
    function getuseremailandotherdetailswithwithdrawalid($withdrawalid) {
           $this->db->select('user.email as useremail,username,withdraw_date,withdraw_amount');
        $this->db->from('withdrawals');
        $this->db->where('withdrawal_id', $withdrawalid);
        $this->db->join('user', 'withdrawals.withdrawer_id = user.user_id');

        $query = $this->db->get();
        $row = $query->row();
        return $row;
        
      }
    function getuserwithdrawalhistory($theoffset,$userid)
    {
         
         $limit=10;
         $offset=$theoffset;
         
         
        
          $this->db->select('*');
            $this->db->from('withdrawals');
           // $this->db->join('user', 'depositer_id= user_id');
           // $this->db->join('game_type', 'game_id = gametype_id');
              $this->db->where('withdrawer_id',$userid);
             $this->db->order_by("withdraw_date", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
     function getuserwithdrawalhistoryno($userid)
    {
        return $this->db->get_where('withdrawals', array('withdrawer_id' => $userid))->num_rows();
    }
    
    function gettotalwithdrawal($userid)
    {
         $this->db->select_sum('withdraw_amount');
        $query = $this->db->get_where('withdrawals', array('withdrawer_id' => $userid,'withdraw_status' => 'approved'));
        $row = $query->row();
        //echo $row->bet_amount;
                return $row->withdraw_amount;
    }
    function getwithdrawalyesterday($yesterdaykodate) {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT sum(withdraw_amount) as yda FROM withdrawals
WHERE withdraw_date ='" . $yesterdaykodate . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row = $result->row();
        return $row->yda;
    }

    function gettotalwithdrawals() {
        $this->db->select_sum('withdraw_amount');
        $query = $this->db->get('withdrawals');
        $row = $query->row();
        //echo $row->bet_amount;
        return $row->withdraw_amount;
    }
     public function addwithdrawalinfo() {

        $new_member_insert_data = array(
            'withdrawer_id' => $this->input->post('withdrawer_id'),
            'withdraw_amount' => $this->input->post('withdraw_amount'),
            'withdraw_date' => $this->input->post('withdraw_date'),
        );

        $insert = $this->db->insert('withdrawals', $new_member_insert_data);
        if ($insert) {
           return 1;


            //$this->load->view('userprofile');
        }
    }
        function searchwithdrawal() {
        try {

            $this->db->select('*');
            $this->db->from('withdrawals');

            $this->db->join('user', 'user_id = withdrawer_id');
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
            $prevlink = ($page > 1) ? '<a href="javascript:processsearchforwithdrawal(1)" title="First page">&laquo;</a> <a href="javascript:processsearchforwithdrawal(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:processsearchforwithdrawal(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:processsearchforwithdrawal(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';


            // $this->db->like($this->input->post('arg1'), $this->input->post('arg2'),'after'); 



            $this->db->select('*');
            $this->db->from('withdrawals');

            $this->db->join('user', 'user_id = withdrawer_id');
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');
            $this->db->order_by("withdraw_date", "desc");

            $query = $this->db->get('', $limit, $offset);
            return $query;
            //echo $this->db->last_query();
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
public function deletewithdrawal($withdrawal_id) {
        if ($this->db->delete('withdrawals', array('withdrawal_id' => $withdrawal_id)))
           return 1;
    }
      public function updatewithdrawalinfo($withdrawalinfo_id) {


        $new_member_insert_data = array(
            'withdrawer_id' => $this->input->post('withdrawer_id'),
            'withdraw_amount' => $this->input->post('withdraw_amount'),
            'withdraw_date' => $this->input->post('withdraw_date'),
        );
        $this->db->where('withdrawal_id', $withdrawalinfo_id);
        $insert = $this->db->update('withdrawals', $new_member_insert_data);
        if ($insert) {
            return 1;


            //$this->load->view('userprofile');
        }
    }
        function getallwithdrawal() {

        try {
            $num_rows = $this->db->get('withdrawals')->num_rows();
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
            $prevlink = ($page > 1) ? '<a href="javascript:getallwithdrawal(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getallwithdrawal(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getallwithdrawal(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getallwithdrawal(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            $this->db->select('*');
            $this->db->from('withdrawals');

            $this->db->join('user', 'user_id = 	withdrawer_id');
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}

            $this->db->order_by("withdrawal_id", "desc");


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
function changethewithdrawalstatusinwithdrawaltable($withdrawalid, $withdrawal_status) {
        $wstatus = '';
        if ($withdrawal_status == 0)
            $wstatus = 'disapproved';
        else
            $wstatus = 'approved';
        $new_member_insert_data = array(
            'withdraw_status' => $wstatus,
        );
        $this->db->where('withdrawal_id', $withdrawalid);
        $this->db->update('withdrawals', $new_member_insert_data);
    }
    public function getwithdrawalinfobyid($withdrawalinfo_id) {
        $result = $this->db->get_where('withdrawals', array('withdrawal_id' => $withdrawalinfo_id));
        return $result->result_array();
    }
    
}