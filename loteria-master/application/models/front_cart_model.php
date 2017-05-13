<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class front_cart_model extends CI_Model{
     function getticketno()
    {
      $sql = "SELECT COALESCE(max(ticket_no),0) as ticketno FROM loto_ticket_no_counter";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        $theticketno= $row->ticketno+1;    
        //$sql1 = "INSERT INTO loto_ticket_no_counter(ticket_no) VALUES (".$theticketno.")";
        //$this->db->query($sql1);
        return $theticketno;
    }
    function insertticketno(){
          $sql = "SELECT COALESCE(max(ticket_no),0) as ticketno FROM loto_ticket_no_counter";
        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        $theticketno= $row->ticketno+1;  
       
  
        $sql1 = "INSERT INTO loto_ticket_no_counter(ticket_no) VALUES (".$theticketno.")";
        $this->db->query($sql1);
        
    }
}