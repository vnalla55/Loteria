<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class superadmin_model extends CI_Model {
    function getsuperadminusername() {
        $this->db->select('username');
        $query = $this->db->get('super_admin');
        $row = $query->row();
        //echo $this->db->last_query();
        return $row->username;
    }
    function check_if_username_exists_in_superadmintable() {

        $this->db->where('username', $this->input->post('username'));
        $result = $this->db->get('super_admin');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}