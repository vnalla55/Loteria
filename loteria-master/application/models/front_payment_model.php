<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class front_payment_model extends CI_Model{
    function addtothepintransactiontable($transaction_amt,$user_id){
           $sql = "INSERT INTO prepaidcardpaymenttransaction (prepaid_userid,transaction_amt,transaction_date,pinnumber)
VALUES (".$user_id.",".$transaction_amt.",now(),".$this->input->post('pinnumber').")";
        $result = $this->db->query($sql);
         return $this->db->insert_id();
     }
    function gettheusedmoneyofpin(){
     //$CI = &get_instance();
      //  $CI->load->database('b', FALSE);
        $this->load->database('default', TRUE);
   $sql = "SELECT COALESCE(sum(transaction_amt),0) as totoalusedmoney FROM prepaidcardpaymenttransaction"
           . " where pinnumber = ".$this->input->post('pinnumber');
        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        return $row->totoalusedmoney;  
    }

    
    function getallpinstatusinfo(){
        
       // $CI = &get_instance();
//setting the second parameter to TRUE (Boolean) the function will return the database object.
//$this->db2 = $CI->load->database('b', TRUE);
//$this->load->database('db2');
$DB1 = $this->load->database('db2', TRUE);
$qry = $DB1->query("SELECT COALESCE(count(generatedpin),0) as thegenpin,  generatedpin,price,id FROM cards where generatedpin = ".$this->input->post('pinnumber')." and status = 1");
//  $this->db2->select('generatedpin,price,id');
//               $this->db2->from('cards');
//                 //$this->db2->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
//           $this->db2->where('generatedpin',$this->input->post('pinnumber'));
//                 //$this->db2->where('announcement_status','passed');
           //  $result = $qry->result();
            $row=$qry->row();
    
             $num_rows =$row->thegenpin;
             if($num_rows>0)
             {
               $DB1->select_sum('rechargeprice');
              $DB1->from('recharge');
                 //$this->db2->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
          $DB1->where('cardid',$row->id); 
               $result1 =$DB1->get();
            $row1 = $result1->row();
            
           $totalprice= $row1->rechargeprice+$row->price;
           $DB1->close();
           return $totalprice;
             }else {
                  $DB1->close();
                 return $num_rows;
             }
    }
   
}
