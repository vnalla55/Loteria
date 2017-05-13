<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class subscription_model extends CI_Model{
     function getallsubscriberlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id', 'subscribed_email', 'subscribed_status', 'subscribed_date');
        
        // DB table to use
        $sTable = 'subscribed_user';
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
                if($col=='subscribed_status')
                {
                    if($aRow[$col]==1)
                    {
                        $row[] = 'Subscribed'; 
                    }
                    else
                    {
                      $row[] = 'Unsubscribed';  
                    }
                }
                else 
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#subscriberedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Subscriber"><i class="glyphicon glyphicon-edit" alt="'.$aRow['id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#subscriberdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['id'].'"></i></a>';
             if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[16]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[16]['deletetask'] == 0)
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
     function getallsubscriptionlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('content_id', 'content_title', 'content');
        
        // DB table to use
        $sTable = 'subscription_content';
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
                if($col=='content')
                {
                    
                   if(strlen(strip_tags($aRow[$col]))>35)
                       $row[] = substr(strip_tags($aRow[$col]), 0,35).'...'; 
                   
                        else 
                             $row[] = strip_tags($aRow[$col]); 
                }
                else 
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#subscriptionedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Role"><i class="glyphicon glyphicon-edit" alt="'.$aRow['content_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#subscriptiondelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['content_id'].'"></i></a>';
    $sendsubscriptionlink='<a class="popup" data-toggle="modal" data-target="#subscriptionsend" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-send"  alt="'.$aRow['content_id'].'"></i></a>';
             
           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
                  if($allpermissioninfo[15]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[15]['deletetask'] == 0)
    $deletelink='<i class="glyphicon glyphicon-trash"></i>';
               if($allpermissioninfo[15]['deletetask'] == 0)
    $sendsubscriptionlink='<i class="glyphicon glyphicon-send"></i>';
    
     }
     
     } 
          
     $row[] =$updatelink.'|'.$deletelink.'|'.$sendsubscriptionlink;
            $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
     public function addsubscribeduserinfo() {

        $new_member_insert_data = array(
            'subscribed_email' => $this->input->post('subscribed_email'),
            'subscribed_status' => $this->input->post('subscribed_status'),
            'subscribed_date' => $this->input->post('subscribed_date'),
        );
        $insert = $this->db->insert('subscribed_user', $new_member_insert_data);
        if ($insert) {
           return 1;


            //$this->load->view('userprofile');
        }
    }

     public function addsubscribeduserinfofront() {

       $new_member_insert_data = array(
            
       
            'subscribed_email' => $this->input->post('email'),
           
         
        );
        $insert = $this->db->insert('subscribed_user', $new_member_insert_data);
        if ($insert) {
            echo '1';


            //$this->load->view('userprofile');katipachijane
        }
    }
    
     function getsubscribeduserid()
    {
        $this->db->select('id');
        $query = $this->db->get_where('subscribed_user', array('subscribed_email' =>$this->input->post('email') ));
        $row = $query->row();
        return $row->id;
        
    }
    function getcurrentsubscriptioncontent($content_id) {
        $this->db->select('content,content_title');
        $query = $this->db->get_where('subscription_content', array('content_id' => $content_id));
        $row = $query->row();
        //echo $this->db->last_query();
        $subscriptiondetail=array();
        $subscriptiondetail[0]=$row->content_title;
        $subscriptiondetail[1]=$row->content;
        return $subscriptiondetail;
    }
    function getcurrentsubscriptioncontentfront()
    {
        $this->db->select('content');
        $query = $this->db->get_where('subscription_content', array('subscription_status' => 'current'));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->content;
        
    }
    function updatesubscribeduserstatus()
{
      $new_member_insert_data = array(
            'subscribed_status' => 1,
            
        );
        $this->db->where('subscribed_email', $this->input->post('email'));
        $insert = $this->db->update('subscribed_user', $new_member_insert_data);
       
}

    function check_if_subscribedemail_unsubscribed(){
        
    $this->db->where('subscribed_email', $this->input->post('email'));
    $this->db->where('subscribed_status', 0);
    $result =$this->db->get('subscribed_user');
    
     if($result->num_rows()>0){
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
    function check_if_subscribedemail_exists($email) {

        $this->db->where('subscribed_email', $email);
        $result = $this->db->get('subscribed_user');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function unsubscribelottosubscription($subscribeduserid)
{
      $new_member_insert_data = array(
            'subscribed_status' => 0,
            
        );
        $this->db->where('id', $subscribeduserid);
        $insert = $this->db->update('subscribed_user', $new_member_insert_data);
       
}
     public function getsubscribeduserinfobyid($subscribeduserinfo_id) {
        $result = $this->db->get_where('subscribed_user', array('id' => $subscribeduserinfo_id));
        return $result->result_array();
    }
    public function deletesubscribeduserinfo($subscribeduserinfo_id) {
        if ($this->db->delete('subscribed_user', array('id' => $subscribeduserinfo_id)))
            return 1;
    }
     public function getemailsubscriptioninfobyid($emailsubscriptioninfo_id) {
        $result = $this->db->get_where('subscription_content', array('content_id' => $emailsubscriptioninfo_id));
        return $result->result_array();
    }
     public function updateemailsubscriptioninfo($emailsubscriptioninfo_id) {


        $new_member_insert_data = array(
            'content_title' => $this->input->post('content_title'),
            'content' => $this->input->post('content'),
            'subscription_status' => $this->input->post('subscription_status'),
            'creation_date' => $this->input->post('creation_date'),
        );
        $this->db->where('content_id', $emailsubscriptioninfo_id);
        $insert = $this->db->update('subscription_content', $new_member_insert_data);
        if ($insert) {
            return 1;


            //$this->load->view('userprofile');
        }
    }
     
     
    
public function addemailsubscriptioninfo() {


        $new_member_insert_data = array(
            'content_title' => $this->input->post('content_title'),
            'content' => $this->input->post('content'),
            'subscription_status' => $this->input->post('subscription_status'),
            'creation_date' => $this->input->post('creation_date'),
        );

        $insert = $this->db->insert('subscription_content', $new_member_insert_data);
        if ($insert) {
           return 1;

            //$this->load->view('userprofile');
        }
    }

    function getallsubscribeduserinfo() {



        $this->db->where('subscribed_status', 1);
        $result = $this->db->get('subscribed_user');
        echo $this->db->last_query();
        return $result->result_array();
    }
 public function deletesubscriptioncontentinfo($subscriptioncontentinfo_id) {
        if ($this->db->delete('subscription_content', array('content_id' => $subscriptioncontentinfo_id)))
            return 1;
    }
    
 function getallemailsubscription() {
        try {
            $num_rows = $this->db->get('subscription_content')->num_rows();


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
            $prevlink = ($page > 1) ? '<a href="javascript:getemailsubscriptiondiv(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getemailsubscriptiondiv(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getemailsubscriptiondiv(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getemailsubscriptiondiv(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            //$this->db->get('subscription_content', $limit, $offset);
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}
            $this->db->order_by("creation_date", "desc");
            $query = $this->db->get('subscription_content', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
     public function updatesubscribeduserinfo($subscribeduserinfo_id) {


        $new_member_insert_data = array(
            'subscribed_email' => $this->input->post('subscribed_email'),
            'subscribed_status' => $this->input->post('subscribed_status'),
            'subscribed_date' => $this->input->post('subscribed_date'),
        );
        $this->db->where('id', $subscribeduserinfo_id);
        $insert = $this->db->update('subscribed_user', $new_member_insert_data);
        if ($insert) {
          return 1;


            //$this->load->view('userprofile');
        }
    }

     function getallsubscriptionuser() {
        try {
            $num_rows = $this->db->get('subscribed_user')->num_rows();


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
            $prevlink = ($page > 1) ? '<a href="javascript:getsubscriptionuserdiv(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getsubscriptionuserdiv(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getsubscriptionuserdiv(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getsubscriptionuserdiv(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            //$this->db->get('subscription_content', $limit, $offset);
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}
            $this->db->order_by("subscribed_date", "desc");
            $query = $this->db->get('subscribed_user', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
}