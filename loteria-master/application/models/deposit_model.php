<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class deposit_model extends CI_Model {
          function getalldepositlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('depositer_id','diposit_id', 'email','deposited_by','last_updated_by','deposit_amount','gateway_name','transaction_id','clerkname','cashier','diposit_date','bank_name','deposit_status','receiptpicture');
         $aColumns1 = array('diposit_id', 'email','deposited_by','last_updated_by','deposit_amount','gateway_name','transaction_id','clerkname','cashier','diposit_date','bank_name','deposit_status');
       
        // DB table to use
        $sTable = 'deposit';
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
                    $this->db->order_by($aColumns1[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
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
                    $this->db->or_like($aColumns1[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
      
         $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $this->db->from($sTable);


            $this->db->join('user', 'user_id = 	depositer_id');
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
                if($col=='receiptpicture')
                {
                    if($aRow[$col]){
                       $row[]=' <a  class="popup" data-toggle="modal" data-target="#depositreceipt" data-toggle="tooltip" data-placement="top" title="" data-original-title="View receipt"><img class="depositreceipt" style="width:75px;" title="'.$aRow[$col].'" alt="'.$aRow[$col].'" src="'.base_url().'depositreceipticons/'.$aRow[$col].'"></a>';  
                       
 
                    }
                    else{
                        $row[]=$aRow[$col]; 
                    }
                    
                }
                else if($col=='depositer_id')
                {
                    
                }
                    else {
                  $row[] = $aRow[$col];  
                }
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#depositedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Deposit"><i class="glyphicon glyphicon-edit" alt="'.$aRow['diposit_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#depositdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['diposit_id'].'"></i></a>';
            $approvedisapprovelink='<a class="popup" data-toggle="modal" data-target="#depositapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="deposit approve""><i class="glyphicon glyphicon-ok" alt="'.$aRow['diposit_id'].'-1-'.$aRow['deposit_amount'].'-'.$aRow['depositer_id'].'" ></i></a> | <a class="popup" data-toggle="modal" data-target="#depositapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="deposit disapprove""><i class="glyphicon glyphicon-remove" alt="'.$aRow['diposit_id'].'-0-'.$aRow['deposit_amount'].'-'.$aRow['depositer_id'].'" ></i></a>';
           if($aRow['deposit_status']=='approved')
               $approvedisapprovelink='<i class="glyphicon glyphicon-ok"></i>';
           else if($aRow['deposit_status']=='disapproved')
                $approvedisapprovelink='<i class="glyphicon glyphicon-remove"></i>';
        
      if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') {
                $row[] =$approvedisapprovelink;
           }
     else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
         if($allpermissioninfo[10]['others'] == 1)
                    $row[] =$approvedisapprovelink;
                    
                  if($allpermissioninfo[10]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[10]['deletetask'] == 0)
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
     function getuserdeposithistory($theoffset,$userid)
    {
         
         $limit=10;
         $offset=$theoffset;
         
         
        
          $this->db->select('*');
            $this->db->from('deposit');
           // $this->db->join('user', 'depositer_id= user_id');
           // $this->db->join('game_type', 'game_id = gametype_id');
              $this->db->where('depositer_id',$userid);
              $this->db->where('deposit_status','approved');
             $this->db->order_by("diposit_date", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
     
 function getuserdeposithistoryno($userid)
    {
        return $this->db->get_where('deposit', array('depositer_id' => $userid,'deposit_status' => 'approved'))->num_rows();
    }
    
     function gettotaldeposit($userid)
    {
         $this->db->select_sum('deposit_amount');
        $query = $this->db->get_where('deposit', array('depositer_id' => $userid,'deposit_status' => 'approved'));
        $row = $query->row();
        //echo $row->bet_amount;
                return $row->deposit_amount;
    }
    function registerdepositconfirm(){
         
        
      //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
      
         $allowedExts = array("gif", "jpeg", "jpg", "png");
         $receiptpicture='';
         
          if($_FILES["receiptpic"]["name"])
                              {
              $receiptpicture=$_FILES["receiptpic"]["name"];
                            $temp = explode(".", $_FILES["receiptpic"]["name"]);
$extension = end($temp);

if ((($_FILES["receiptpic"]["type"] == "image/gif")
|| ($_FILES["receiptpic"]["type"] == "image/jpeg")
|| ($_FILES["receiptpic"]["type"] == "image/jpg")
|| ($_FILES["receiptpic"]["type"] == "image/pjpeg")
|| ($_FILES["receiptpic"]["type"] == "image/x-png")
|| ($_FILES["receiptpic"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["receiptpic"]["error"] > 0) {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
       echo json_encode(array('status'=>2,'message'=> $_FILES["file"]["error"]));
  } else {
    //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
    //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
    if (file_exists("depositreceipticons/" . $_FILES["receiptpic"]["name"])) {
      //echo $_FILES["receiptpic"]["name"] . " already exists. ";
       echo json_encode(array('status'=>3,'message'=> $_FILES["receiptpic"]["name"] .'already exists'));
        
    } else {
      move_uploaded_file($_FILES["receiptpic"]["tmp_name"],
      "depositreceipticons/" . $_FILES["receiptpic"]["name"]);
      //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
      
     $this->db->select('user_id');
        $query = $this->db->get_where('user', array('username' => $_SESSION['lotteryusername']));
        $row = $query->row();
        //echo $this->db->last_query();
        
        $new_member_insert_data = array(
            'depositer_id' =>$row->user_id,
            'deposit_amount' => $this->input->post('deposit_amount'),
            'diposit_date' => $this->input->post('diposit_date'),
               
             'transaction_id' =>$this->input->post('transid'),
           
            'bank_name' =>$this->input->post('bank_name'),
             'clerkname' =>$this->input->post('clerkname'),
             'cashier' =>$this->input->post('cashier'),
             'bank_name' =>$this->input->post('bank_name'),
            'receiptpicture' =>$receiptpicture,
             'deposit_status' =>'pending',
             'deposited_by' =>'SELF',
        );
        $insert = $this->db->insert('deposit', $new_member_insert_data);
    
    }//if file doesnot exist
  }
} else {
   echo json_encode(array('status'=>3,'message'=> 'Invalid file'));
      
}
                              
              
                              
  }
  else {
    $this->db->select('user_id');
        $query = $this->db->get_where('user', array('username' => $_SESSION['lotteryusername']));
        $row = $query->row();
        //echo $this->db->last_query();
        
        $new_member_insert_data = array(
            'depositer_id' =>$row->user_id,
            'deposit_amount' => $this->input->post('deposit_amount'),
            'diposit_date' => $this->input->post('diposit_date'),
               
             'transaction_id' =>$this->input->post('transid'),
           
            'bank_name' =>$this->input->post('bank_name'),
             'clerkname' =>$this->input->post('clerkname'),
             'cashier' =>$this->input->post('cashier'),
             'bank_name' =>$this->input->post('bank_name'),
            'receiptpicture' =>$receiptpicture,
             'deposit_status' =>'pending',
             'deposited_by' =>'SELF',
        );
        $insert = $this->db->insert('deposit', $new_member_insert_data);   
  }
         
        
         //$last_deposit_id=$this->db->insert_id();
//        $sql = "INSERT INTO deposit (depositer_id,deposit_amount,diposit_date,transaction_id,bank_name,deposit_status)
//VALUES (".$row->user_id.",".$this->input->post('deposit_amount').",".$this->input->post('todaykodate').",".$this->input->post('transid').",".$this->input->post('bank_name').",'pending')";
//        $result = $this->db->query($sql);
  
    }
     function registerdeposit($transaction_id, $deposit_amt,$card_type) {
        $this->db->select('user_id');
        $query = $this->db->get_where('user', array('username' => $_SESSION['lotteryusername']));
        $row = $query->row();
        //echo $this->db->last_query();

        /* $new_member_insert_data = array(
          'depositer_id' =>$row->user_id,
          'deposit_amount' => $deposit_amt,
          'diposit_date' => $this->input->post('todaykodate'),

          'transaction_id' =>$transaction_id,

          ); */
        //$insert = $this->db->insert('deposit', $new_member_insert_data);
        if ($transaction_id == 0) {
            $sql = "INSERT INTO deposit (depositer_id,deposit_amount,diposit_date,gateway_name,deposited_by)
VALUES (" . $row->user_id . "," . $deposit_amt . ",now(),'".$card_type."','SELF')";
            $result = $this->db->query($sql);
             //$sql = "update deposit set  (" . $row->user_id . "," . $deposit_amt . ",now(),'".$card_type."')";
           // $result = $this->db->query($sql);
            
        } else {
            $sql = "INSERT INTO deposit (depositer_id,deposit_amount,diposit_date,transaction_id,gateway_name,deposited_by)
VALUES (" . $row->user_id . "," . $deposit_amt . ",now()," . $transaction_id . ",'".$card_type."','SELF')";
            $result = $this->db->query($sql);
        }
    }
     function getdeposityesterday($yesterdaykodate) {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT sum(deposit_amount) as yda FROM deposit
WHERE diposit_date ='" . $yesterdaykodate . "' and deposit_status ='approved'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row = $result->row();
        return $row->yda;
    }
     function gettotaldeposits() {
        $this->db->select_sum('deposit_amount');
        $query = $this->db->get_where('deposit', array('deposit_status' => 'approved'));
        ;
        $row = $query->row();
        //echo $row->bet_amount;
        return $row->deposit_amount;
    }

       public function adddepositinfo($superadminorotheradmin) {

        $new_member_insert_data = array(
            'depositer_id' => $this->input->post('depositer_id'),
            'deposit_amount' => $this->input->post('deposit_amount'),
            'gateway_name' => $this->input->post('gateway_name'),
            'transaction_id' => $this->input->post('transaction_id'),
            'diposit_date' => $this->input->post('diposit_date'),
               'deposited_by' => $superadminorotheradmin,
            
        );

        $insert = $this->db->insert('deposit', $new_member_insert_data);
        if ($insert) {
          return 1;


            //$this->load->view('userprofile');
        }
    }

     public function getdepositinfobyid($depositinfo_id) {
        $result = $this->db->get_where('deposit', array('diposit_id' => $depositinfo_id));
        return $result->result_array();
    }
     public function getdepositdateforemail($depositinfo_id) {
      
         $this->db->select('diposit_date');
        $query = $this->db->get_where('deposit', array('diposit_id' => $depositinfo_id));
        
        $row = $query->row();
        //echo $row->bet_amount;
        return $row->diposit_date;
    }
   function changethedepositstatusindeposittable($depositid, $deposit_status) {
        $wstatus = '';
        if ($deposit_status == 0)
            $wstatus = 'disapproved';
        else
            $wstatus = 'approved';
        $new_member_insert_data = array(
            'deposit_status' => $wstatus,
        );
        $this->db->where('diposit_id', $depositid);
        $this->db->update('deposit', $new_member_insert_data);
    }
     public function deletedeposit($deposit_id) {
        if ($this->db->delete('deposit', array('diposit_id' => $deposit_id)))
            return 1;
    }
    function searchdeposit() {
        try {

            $this->db->select('*');
            $this->db->from('deposit');

            $this->db->join('user', 'user_id = depositer_id');
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');

            $num_rows = $this->db->get('')->num_rows();
            //$num_rows=$this->db->count_all_results();
            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 7;

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
            $prevlink = ($page > 1) ? '<a href="javascript:processsearchfordeposit(1)" title="First page">&laquo;</a> <a href="javascript:processsearchfordeposit(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:processsearchfordeposit(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:processsearchfordeposit(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';


            // $this->db->like($this->input->post('arg1'), $this->input->post('arg2'),'after'); 




            $this->db->select('*');
            $this->db->from('deposit');

            $this->db->join('user', 'user_id = depositer_id');
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');
            $this->db->order_by("diposit_date", "desc");

            $query = $this->db->get('', $limit, $offset);
            return $query;
            //echo $this->db->last_query();
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }
    public function updatedepositinfo($depositinfo_id,$superadminorotheradmin) {


        $new_member_insert_data = array(
            'depositer_id' => $this->input->post('depositer_id'),
            'deposit_amount' => $this->input->post('deposit_amount'),
            'gateway_name' => $this->input->post('gateway_name'),
            'transaction_id' => $this->input->post('transaction_id'),
            'diposit_date' => $this->input->post('diposit_date'),
             'last_updated_by' => $superadminorotheradmin,
            
        );
        $this->db->where('diposit_id', $depositinfo_id);
        $insert = $this->db->update('deposit', $new_member_insert_data);
        if ($insert) {
           return 1;


            //$this->load->view('userprofile');
        }
    }
      function getalldeposit() {

        try {
            $num_rows = $this->db->get('deposit')->num_rows();
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
            $limit = 7;

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
            $prevlink = ($page > 1) ? '<a href="javascript:getalldeposit(1,\''.$sortby.'\')" title="First page">&laquo;</a> <a href="javascript:getalldeposit(' . ($page - 1) . ',\''.$sortby.'\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getalldeposit(' . ($page + 1) . ',\''.$sortby.'\')" title="Next page">&rsaquo;</a> <a  href="javascript:getalldeposit(' . $pages . ',\''.$sortby.'\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            $this->db->select('*');
            $this->db->from('deposit');

            $this->db->join('user', 'user_id = 	depositer_id');
            if($_POST['sortby']!='default')
			{
			$this->db->order_by(explode('/',$_POST['sortby'])[0], explode('/',$_POST['sortby'])[1]);
			}

            $this->db->order_by("diposit_date", "desc");


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