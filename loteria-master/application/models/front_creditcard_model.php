<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class front_creditcard_model  extends CI_Model{
     function getcurrentcreditcards()
    {
         
        
        
         $this->db->select('user_id');
         $this->db->from('user');
           $this->db->where('username', $_SESSION['lotteryusername']);
            
             
      $query= $this->db->get();
        $row = $query->row();
        
         
        
          $this->db->select('*');
            $this->db->from('user_credit_card_info');
           
               $this->db->where('user_id', $row->user_id);
    
            $result = $this->db->get();
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
     public function deletelotocreditcard($credit_card_serial_id) {
        $this->db->delete('user_credit_card_info', array('credit_card_serial_id' => $credit_card_serial_id));
           
    }
     public function updatelotocreditcard($credit_card_serial_id,$user_id) {
        if($this->input->post('primary_card_flag')==1)
        {
           $new_member_insert_data1 = array(
            
            'primary_card_flag' => 0,
             
        );
 $this->db->where('user_id', $user_id);
 
            $this->db->update('user_credit_card_info', $new_member_insert_data1);  
        }
        
        $new_member_insert_data = array(
            'user_id' => $user_id,
             'credit_cardno' => $this->input->post('credit_cardno'),
            'card_nickname' => $this->input->post('card_nickname'),
            'cvv' => $this->input->post('cvv'),
              'credit_cardname' => $this->input->post('credit_cardname'),
           'expiry_date' => $this->input->post('expiry_date'),
            'primary_card_flag' => $this->input->post('primary_card_flag'),
             
        );
       $this->db->where('credit_card_serial_id', $credit_card_serial_id);
            $insert = $this->db->update('user_credit_card_info', $new_member_insert_data);
       
    }
       public function addlotocreditcard($user_id) {
        if($this->input->post('primary_card_flag')==1)
        {
           $new_member_insert_data1 = array(
            
            'primary_card_flag' => 0,
             
        );
 $this->db->where('user_id', $user_id);
 
            $this->db->update('user_credit_card_info', $new_member_insert_data1);  
        }
        
        $new_member_insert_data = array(
            'user_id' => $user_id,
             'credit_cardno' => $this->input->post('credit_cardno'),
            'credit_cardname' => $this->input->post('credit_cardname'),
             'card_nickname' => $this->input->post('card_nickname'),
             'cvv' => $this->input->post('cvv'),
           'expiry_date' => $this->input->post('expiry_date'),
            'primary_card_flag' => $this->input->post('primary_card_flag'),
             
        );
       
            $insert = $this->db->insert('user_credit_card_info', $new_member_insert_data);
       
    }
    
    public function getlotocreditcardinfobyid($credit_card_serial_id) {
        $result = $this->db->get_where('user_credit_card_info', array('credit_card_serial_id' => $credit_card_serial_id));
        return $result->result_array();
    }
    
      
     
    function getusercreditcardinfo($userid)
    {
         
       
         
         
        
//          
       $sql = "SELECT * 
FROM user_credit_card_info 


  where user_id=".$userid;
     $result = $this->db->query($sql);

        return $result;
    }
   
}
