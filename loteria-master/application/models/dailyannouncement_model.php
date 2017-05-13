<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dailyannouncement_model extends CI_Model {
function changethependingstatusofpendingbetsandrefund($announcementid)
{
    $this->db->select('better_id,bet_amount,bet_id_forpartner');
        $this->db->from('loto_bet_history_for_partner');
         $this->db->join('lottery_announcement_detail', 'loto_bet_history_for_partner.lottery_announcement_detail_id = lottery_announcement_detail.lottery_announcement_detail_id');
   
        
        $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.lottery_announcement_detail_id');
$this->db->where('announcement_status', 'current');   
$this->db->where('pending_status', '1');   
$this->db->where('lottery_announcement.announcement_id', $announcementid);
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 if($result->num_rows()>0){
  
 foreach ($result->result() as $row) {
    $sql = "update loto_bet_history_for_partner set pending_status = 0 where bet_id_forpartner = ".$row->bet_id_forpartner;
         $this->db->query($sql); 
        $sql = "INSERT INTO deposit (depositer_id,deposit_amount,diposit_date,gateway_name)
VALUES (" . $row->better_id . "," . $row->bet_amount . ",now(),'Refund')";
            $this->db->query($sql);
         $sql = "update user set wallet_balance = wallet_balance+".$row->bet_amount." where user_id =".$row->better_id;

        $this->db->query($sql); 
        
 }   
 }
}

    function getallvaluesofannouncementtable() {
        $result = $this->db->get('lottery_announcement');
        return $result;
    }
    function changethependingstatusofexpiredbetsinpartnerbettable(){
        $todaydatetime = date('Y-m-d H:i:s');
        //echo 'today ko date time:'.$todaydatetime;
       
         $sql = "update loto_bet_history_for_partner set pending_status = 0 where drawing_date < '".$todaydatetime."'";
         $this->db->query($sql); 
        /*
        $this->db->select('bet_id_forpartner');
        $this->db->from('loto_bet_history_for_partner');
         $this->db->join('lottery_announcement_detail', 'loto_bet_history_for_partner.lottery_announcement_detail_id = lottery_announcement_detail.lottery_announcement_detail_id');
   
        
        $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.lottery_announcement_detail_id');
$this->db->where('loto_bet_history_for_partner.drawing_date <', $todaydatetime);   
$this->db->where('pending_status', '1');   
$this->db->where('lottery_announcement_detail.announcement_id', $announcementid);
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 if($result->num_rows()>0){
  
 foreach ($result->result() as $row) {
    $sql = "update loto_bet_history_for_partner set pending_status = 0 where bet_id_forpartner = ".$row->bet_id_forpartner;
         $this->db->query($sql); 
       
        
 }   
 }*/
    }

    function insertintolottery_announcement_detailtable($detaildate, $announcementid) {
        $new_member_insert_data = array(
            'announcement_status' => 'passed',
        );
        $this->db->where('announcement_id', $announcementid);
        $this->db->update('lottery_announcement_detail', $new_member_insert_data);
        $new_member_insert_data = array(
            'announcement_id' => $announcementid,
            'detail_date' => $detaildate,
            'announcement_status' => 'current',
            'result_status' => 0,
        );
        $insert = $this->db->insert('lottery_announcement_detail', $new_member_insert_data);
    }

    function updatelottery_announcement_detailtableforallannouncement($announcementid) {
        $new_member_insert_data = array(
            'announcement_status' => 'passed',
        );
        $this->db->where('announcement_id', $announcementid);
        $this->db->update('lottery_announcement_detail', $new_member_insert_data);
    }

    function checkifthisannouncementwiththisdateexists($announcementid, $insertdate) {
        $sql = "SELECT COALESCE(count(lottery_announcement_detail.announcement_id),0) as yda "
                . "FROM lottery_announcement_detail "
                . "join lottery_announcement on lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id "
                . "where lottery_announcement_detail.announcement_id = '" . $announcementid . "' "
                . "and detail_date = '" . $insertdate . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();



        $row = $result->row();
        //$onetimedatetimewithtimearray=explode(' ',$row->onetimedatetime);
        // $flagarray=array();
        // $flagarray[0]=$row->yda;
        //$flagarray[1]=$onetimedatetimewithtimearray[0];
        return $row->yda;
    }

    function checkifthisannouncementexists($announcementid) {
        $sql = "SELECT COALESCE(count(lottery_announcement_detail.announcement_id),0) as yda,onetimedatetime FROM lottery_announcement_detail join lottery_announcement on lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id where lottery_announcement_detail.announcement_id = '" . $announcementid . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();



        $row = $result->row();
        $onetimedatetimewithtimearray = explode(' ', $row->onetimedatetime);
        $flagarray = array();
        $flagarray[0] = $row->yda;
        $flagarray[1] = $onetimedatetimewithtimearray[0];
        return $flagarray;
    }

    function insertonetimeannouncement($announcementid, $detaildate) {
        $new_member_insert_data = array(
            'announcement_id' => $announcementid,
            'detail_date' => $detaildate,
            'announcement_status' => 'current',
            'result_status' => 0,
        );
        $insert = $this->db->insert('lottery_announcement_detail', $new_member_insert_data);
    }

    function sendemailomerebhai() {
        $this->load->library('email');
        $config['mailtype'] = "html";
        $this->email->initialize($config);
        $this->email->from('shybishwas2047@gmail.com', 'Bishwas cron');
        $this->email->to('20wash.sharma@gmail.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Main cront testing');
        $emailcontent = 'Hello  this is from another cron';


        $this->email->message($emailcontent);
        $this->email->send();
    }

}
