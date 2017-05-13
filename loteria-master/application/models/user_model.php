<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user_model extends CI_Model {
   
 function getalluserlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('user_id', 'username','lastname','name','gender','email','phone','residenceaddress','postalcode','country','wallet_balance','bonus_balance');
        
        // DB table to use
        $sTable = 'user';
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
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#memberedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Member"><i class="glyphicon glyphicon-edit" alt="'.$aRow['user_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#memberdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['user_id'].'"></i></a>';
              if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
         if($allpermissioninfo[3]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[3]['deletetask'] == 0)
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
   

    
    function getuserwallet($userid) {




        $this->db->where('user_id', $userid);

        $result = $this->db->get('user');
        //$this->db->order_by("result_date", "asc"); 
        //print_r($result);
        return $result;
    }

    function updateuserbalanceasperthecalculation($user_id, $userbalance) {
        $new_member_insert_data = array(
            'wallet_balance' => $userbalance
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $new_member_insert_data);
    }

    public function updateuserinfo($user_id) {

        $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'residenceaddress' => $this->input->post('residenceaddress'),
            'postalcode' => $this->input->post('postalcode'),
            'country' => $this->input->post('country'),
            'wallet_balance' => $this->input->post('wallet_balance'),
            'bonus_balance' => $this->input->post('bonus_balance')
        );
        $this->db->where('user_id', $user_id);
        $insert = $this->db->update('user', $new_member_insert_data);
        if ($insert) {
           return 1;
        }
    }

    function getfavouritebancaofuser() {
        $this->db->select('fav_banca');
        $this->db->from('user');
        $this->db->where('username', $_SESSION['lotteryusername']);


        $query = $this->db->get();
        $row = $query->row();
        return $row->fav_banca;
    }

    function getwalletbalanceofuser() {
        $this->db->select('wallet_balance');
        $this->db->from('user');
        $this->db->where('username', $_SESSION['lotteryusername']);


        $query = $this->db->get();
        $row = $query->row();
        return $row->wallet_balance;
    }

    public function updateuserinfowithemail() {
        if ($this->input->post('password')) {
            $new_member_insert_data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'phone' => $this->input->post('phone'),
                'password' => md5($this->input->post('password')),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'fav_banca' => $this->input->post('fav_banca'),
                'gender' => $this->input->post('gender'),
                'residenceaddress' => $this->input->post('residenceaddress'),
                'auto_deposit_to_bank' => $this->input->post('auto_deposit_to_bank'),
                'otherpreference' => $this->input->post('otherpreference'),
            );
            $this->db->where('email', $_SESSION['lotteryuser']);
            $insert = $this->db->update('user', $new_member_insert_data);
            //echo $this->db->last_query();
            if ($insert) {
                return true;


                //$this->load->view('userprofile');
            }
        } else {
            $new_member_insert_data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'phone' => $this->input->post('phone'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'fav_banca' => $this->input->post('fav_banca'),
                'gender' => $this->input->post('gender'),
                'residenceaddress' => $this->input->post('residenceaddress'),
                'auto_deposit_to_bank' => $this->input->post('auto_deposit_to_bank'),
                'otherpreference' => $this->input->post('otherpreference'),
            );
            $this->db->where('email', $_SESSION['lotteryuser']);
            $insert = $this->db->update('user', $new_member_insert_data);
            //echo $this->db->last_query();
            if ($insert) {
                return true;


                //$this->load->view('userprofile');
            }
        }
    }

    function check_if_other_username_exists() {
        $username = $this->input->post('username');
        //$this->load->database();
        if ($username != $_SESSION['lotteryusername']) {
            $this->db->where('username', $username);
            $result = $this->db->get('user');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    function check_if_other_email_exists() {
        $email = $this->input->post('email');
        //$this->load->database();
        if ($email != $_SESSION['lotteryuser']) {
            $this->db->where('email', $email);
            $result = $this->db->get('user');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

   

    function addbalanceofuserdeposit($deposit_amt, $depositerid) {

        $sql = "update user set wallet_balance = wallet_balance+" . $deposit_amt . " where user_id =" . $depositerid;

        $this->db->query($sql);
    }

    function getuserpendingbalanceinwithdrawaltable($userid) {
        $sql = "SELECT COALESCE(sum(withdraw_amount),0) as yda FROM withdrawals where withdrawer_id = '" . $userid . "' and withdraw_status = 'pending'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();



        $row = $result->row();
        return $row->yda;
    }

    function getuserpendingbalance($userid) {
        $sql = "SELECT COALESCE(sum(bet_amount),0) as yda FROM loto_bet_history_for_partner join lottery_announcement_detail on lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id where better_id = '" . $userid . "' and pending_status = '1' and announcement_status = 'current'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();



        $row = $result->row();
        return $row->yda;
    }

    function getuserbalance() {
        $sql = "SELECT wallet_balance FROM user where username = '" . $_SESSION['lotteryusername'] . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row = $result->row();
        return $row->wallet_balance;
    }

    function getusernamebyemail() {
        $this->db->select('username');
        $query = $this->db->get_where('user', array('email' => $_SESSION['lotteryuser']));
        $row = $query->row();
        return $row->username;
    }

    function validateuserinfo() {

        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('user');
        if ($query->num_rows == 1) {
            return True;
        }
    }

    public function getuserinfobyemail() {
        $result = $this->db->get_where('user', array('email' => $this->input->post('email')));
        return $result->result_array();
    }

    function check_if_email_exists() {

        $this->db->where('email', $this->input->post('email'));
        $result = $this->db->get('user');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateuserpasswordinfobyemail($userpassword) {
        $new_member_insert_data = array(
            'password' => md5($userpassword),
        );
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user', $new_member_insert_data);
    }

    public function updatepassword() {

        $new_member_insert_data = array(
            'password' => md5($this->input->post('newpassword')),
        );
        $this->db->where('email', $_SESSION['lotteryuser']);
        $insert = $this->db->update('user', $new_member_insert_data);

        if ($insert) {
            return true;


            //$this->load->view('userprofile');
        }
    }

    public function checkpassword() {

        $this->db->where('email', $_SESSION['lotteryuser']);
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('user');
        if ($query->num_rows == 1) {
            return True;
        } else
            return False;
    }

    public function getuserinfobyid($userinfo_id) {
        $result = $this->db->get_where('user', array('user_id' => $userinfo_id));
        return $result->result_array();
    }

    function gettotalusers() {

        return $this->db->get('user')->num_rows();
    }

    function getnewusersyesterday($yesterdaykodate) {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT * FROM user
WHERE registration_date BETWEEN '" . $yesterdaykodate . " 00:00:00' AND '" . $yesterdaykodate . " 23:59:59'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }

    function addtouserfordepositapproval($depositid) {
        $this->db->select('depositer_id,deposit_amount');
        $this->db->from('deposit');
        $this->db->where('diposit_id', $depositid);


        $query = $this->db->get();
        $row = $query->row();
        $sql = "update user set wallet_balance = wallet_balance+" . $row->deposit_amount . " where user_id =" . $row->depositer_id;

        $this->db->query($sql);
    }

    public function getallcombovalueforwinnerforedit() {


        $sql = "SELECT  email, user_id
FROM user
";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

      

   

    function deductbalanceofuserdeposit($withdraw_amt, $withdrawerid) {

        $sql = "update user set wallet_balance = wallet_balance-" . $withdraw_amt . " where user_id =" . $withdrawerid;

        $this->db->query($sql);
    }

    function deductfromuserforwithdrawapproval($withdrawalid) {
        $this->db->select('withdrawer_id,withdraw_amount');
        $this->db->from('withdrawals');
        $this->db->where('withdrawal_id', $withdrawalid);


        $query = $this->db->get();
        $row = $query->row();
        $sql = "update user set wallet_balance = wallet_balance-" . $row->withdraw_amount . " where user_id =" . $row->withdrawer_id;

        $this->db->query($sql);
    }

    function searchusers() {
        try {


            //$num_rows =$this->db->get('user')->num_rows();
            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');
            $num_rows = $this->db->get('user')->num_rows();
            //$num_rows=$this->db->count_all_results();
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

            // The "back" link
            $prevlink = ($page > 1) ? '<a href="javascript:processsearch(1)" title="First page">&laquo;</a> <a href="javascript:processsearch(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:processsearch(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:processsearch(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';


            $this->db->like($this->input->post('arg1'), $this->input->post('arg2'), 'after');

            $query = $this->db->get('user', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

    function check_if_username_exists() {

        $this->db->where('username', $this->input->post('username'));
        $result = $this->db->get('user');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_if_other_username_existsforcustomer() {
        $username = $this->input->post('username');
        //$this->load->database();
        if ($username != $this->input->post('oldusername')) {
            $this->db->where('username', $username);
            $result = $this->db->get('user');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    function check_if_other_email_existsforcustomer() {
        $email = $this->input->post('email');
        //$this->load->database();
        if ($email != $this->input->post('oldemail')) {
            $this->db->where('email', $email);
            $result = $this->db->get('user');
            if ($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function deleteuserinfo($userinfo_id) {
        if ($this->db->delete('user', array('user_id' => $userinfo_id)))
           return 1;
    }

    function getuserinfo($userid) {




        $this->db->where('user_id', $userid);

        $result = $this->db->get('user');
        //$this->db->order_by("result_date", "asc"); 
        //print_r($result);
        return $result;
    }

    function getuseridforpartnerapproval() {
        $this->db->select('user_id');
        $query = $this->db->get_where('user', array('username' => $_SESSION['lotteryusername']));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->user_id;
    }
    function getusernamebyuserid($userid) {
        $this->db->select('username');
        $query = $this->db->get_where('user', array('user_id' => $userid));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->username;
    }
    function getuseremailbyusername($username){
         $this->db->select('email');
        $query = $this->db->get_where('user', array('username' =>$username ));
        $row = $query->row();
        //echo $this->db->last_query();
        
       return $row->email;
    }
 function getuseremailbyuserid($userid) {
        $this->db->select('email');
        $query = $this->db->get_where('user', array('user_id' => $userid));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->email;
    }
    function getuserid($email) {
        $this->db->select('user_id');
        $query = $this->db->get_where('user', array('email' => $email));
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->user_id;
    }

    
    public function adduserinfo($new_member_insert_data) {


        $insert = $this->db->insert('user', $new_member_insert_data);
        if ($insert) {
           return 1;
            //$this->load->view('userprofile');
        }
    }

    function getallusers() {
        try {
            $num_rows = $this->db->get('user')->num_rows();


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
            $sortby = $_POST['sortby'];
            // The "back" link
            $prevlink = ($page > 1) ? '<a href="javascript:getalluser(1,\'' . $sortby . '\')" title="First page">&laquo;</a> <a href="javascript:getalluser(' . ($page - 1) . ',\'' . $sortby . '\')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getalluser(' . ($page + 1) . ',\'' . $sortby . '\')" title="Next page">&rsaquo;</a> <a  href="javascript:getalluser(' . $pages . ',\'' . $sortby . '\')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            if ($_POST['sortby'] != 'default') {
                $this->db->order_by(explode('/', $_POST['sortby'])[0], explode('/', $_POST['sortby'])[1]);
            }
            $query = $this->db->get('user', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

}
