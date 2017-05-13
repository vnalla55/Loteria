<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class configuration_model extends CI_Model{
     public function deleteadminsettng() {
        if ($this->db->empty_table('admin_setting'))
           
        echo '1';
    }
     public function getadminsetting() {
        $result = $this->db->get('admin_setting');
        return $result->result_array();
    }
     function getadminsettingobject()
    {
        $query = $this->db->get('admin_setting');
            return $query;  
    }
        public function saveadminsetting() {

        $num_rows = $this->db->get('admin_setting')->num_rows();
        if ($num_rows) {
            $new_member_insert_data = array(
                'admin_name' => $this->input->post('admin_name'),
                'admin_email' => $this->input->post('admin_email'),
                'email_subject' => $this->input->post('email_subject'),
                'offline_data' => $this->input->post('offline_data'),
                'website_status' => $this->input->post('website_status'),
            );

            $insert = $this->db->update('admin_setting', $new_member_insert_data);
            if ($insert) {
               return 1;


                //$this->load->view('userprofile');
            }
        } else {


            $new_member_insert_data = array(
                'admin_name' => $this->input->post('admin_name'),
                'admin_email' => $this->input->post('admin_email'),
                'email_subject' => $this->input->post('email_subject'),
                'offline_data' => $this->input->post('offline_data'),
                'website_status' => $this->input->post('website_status'),
            );

            $insert = $this->db->insert('admin_setting', $new_member_insert_data);
            if ($insert) {
               return 2;


                //$this->load->view('userprofile');
            }
        }
    }


}