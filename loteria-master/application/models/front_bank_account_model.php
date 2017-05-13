<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class front_bank_account_model extends CI_Model{
      public function deletelotobankaccount($credit_card_serial_id) {
        $this->db->delete('user_bank_account_info', array('bank_account_serial_id' => $credit_card_serial_id));
           
    }
     public function updatelotobankaccount($credit_card_serial_id,$user_id) {
        if($this->input->post('primary_bankaccount_flag')==1)
        {
           $new_member_insert_data1 = array(
            
            'primary_bankaccount_flag' => 0,
             
        );
 $this->db->where('user_id', $user_id);
 
            $this->db->update('user_bank_account_info', $new_member_insert_data1);  
        }
        
        $new_member_insert_data = array(
            'user_id' => $user_id,
             'bank_name' => $this->input->post('bank_name'),
            'swift_code' => $this->input->post('swift_code'),
             'bank_address' => $this->input->post('bank_address'),
           'account_no' => $this->input->post('account_no'),
            'account_type' => $this->input->post('account_type'),
            'customer_account_name' => $this->input->post('customer_account_name'),
            'customer_physical_address' => $this->input->post('customer_physical_address'),
            'customer_telephone' => $this->input->post('customer_telephone'),
            'primary_bankaccount_flag' => $this->input->post('primary_bankaccount_flag'),
            
             
        );
       $this->db->where('bank_account_serial_id', $credit_card_serial_id);
            $insert = $this->db->update('user_bank_account_info', $new_member_insert_data);
       
    }
    
    public function addlotobankaccount($user_id) {
        if($this->input->post('primary_bankaccount_flag')==1)
        {
           $new_member_insert_data1 = array(
            
            'primary_bankaccount_flag' => 0,
             
        );
 $this->db->where('user_id', $user_id);
 
            $this->db->update('user_bank_account_info', $new_member_insert_data1);  
        }
        
        $new_member_insert_data = array(
            'user_id' => $user_id,
             'bank_name' => $this->input->post('bank_name'),
            'swift_code' => $this->input->post('swift_code'),
             'bank_address' => $this->input->post('bank_address'),
           'account_no' => $this->input->post('account_no'),
            'account_type' => $this->input->post('account_type'),
            'customer_account_name' => $this->input->post('customer_account_name'),
            'customer_physical_address' => $this->input->post('customer_physical_address'),
            'customer_telephone' => $this->input->post('customer_telephone'),
            'primary_bankaccount_flag' => $this->input->post('primary_bankaccount_flag'),
            
             
        );
       
            $insert = $this->db->insert('user_bank_account_info', $new_member_insert_data);
       
    }
 
     public function getlotobankaccountinfobyid($credit_card_serial_id) {
        $result = $this->db->get_where('user_bank_account_info', array('bank_account_serial_id' => $credit_card_serial_id));
        return $result->result_array();
    }
    function getuserbankaccountinfo($userid)
    {
         
       
         
         
        
//          
       $sql = "SELECT * 
FROM user_bank_account_info 


  where user_id=".$userid;
     $result = $this->db->query($sql);

        return $result;
    }
    
    
}