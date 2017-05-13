<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class crawler_model extends CI_Model {
    function getallinputsforget(){
     $this->db->select('*');
            $this->db->from('plates');
            $this->db->join('states', 'state_StateID = StateID');
            $this->db->join('platetypes', 'PlatetypesID = plateTypes_plateTypesID');

            $result = $this->db->get();
            //echo $this->db->last_query();
            return $result;
           // return $result->result_array();
}
function insert_crawling_info($id,$crawling_data){
 $new_member_insert_data = array(
            'check_to_pay' => $crawling_data[0],
            'ticket_no' => $crawling_data[1],
            'violation_description' =>  $crawling_data[2],
            'licence_plate' =>  $crawling_data[3],
            'state' =>  $crawling_data[4],
            'issue_date' =>  $crawling_data[5],
            'ticket_amount' =>  $crawling_data[6],
            'ticket_status' =>  $crawling_data[7],
            
            
        );
 
 $sql = "SELECT COALESCE(count(Ticketnumber),0) as theticketcount from tickets where Ticketnumber = ".$crawling_data[1];
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       if($row->theticketcount>0)
       {
       $sql = "update tickets set  violationcode = '" . $crawling_data[2]."',"
         . " plates_platenumber = '" . $crawling_data[3]."',  "
               . "issueddatetime = '" . explode('/',$crawling_data[5])[2]."-".explode('/',$crawling_data[5])[0]."-".explode('/',$crawling_data[5])[1]."',"
               . " amount = '" . $crawling_data[6]."', status = '" . trim($crawling_data[7])."' where Ticketnumber='".$crawling_data[1]."'";
//echo 'if vitra<br>';
      $this->db->query($sql);
           //echo $this->db->last_query();
       }
       else {
          // echo 'else vitra<br>';
         $sql = "insert into  tickets (Ticketnumber,violationcode,plates_platenumber,issueddatetime,amount,status) "
                 . "values('" . $crawling_data[1] . "','" . $crawling_data[2]."',"
         . "  '" . $crawling_data[3]."',  "
               . "'" . explode('/',$crawling_data[5])[2]."-".explode('/',$crawling_data[5])[0]."-".explode('/',$crawling_data[5])[1]."',"
               . "  '" . $crawling_data[6]."', '" . trim($crawling_data[7])."')";
       //echo explode('/',$crawling_data[5])[2]."-".explode('/',$crawling_data[5])[1]."-".explode('/',$crawling_data[5])[0].'<br>';
           $this->db->query($sql);
           //echo $this->db->last_query();
       }

// $sql = "INSERT INTO parking_info (parking_info_id,check_to_pay,ticket_no,violation_description,licence_plate,state,issue_date,ticket_amount,ticket_status) "
//         . "VALUES (" . $id. ",'" . $crawling_data[0] . "','" . $crawling_data[1] . "','" . $crawling_data[2]. "','" . $crawling_data[3] . "','" . $crawling_data[4] . "','" .
//        $crawling_data[5] . "','" . $crawling_data[6] . "','" . $crawling_data[7] . "')
//  ON DUPLICATE KEY UPDATE check_to_pay = '" . $crawling_data[0] . "', ticket_no = '" . $crawling_data[1]."',"
//         . " violation_description = '" . $crawling_data[2]."', licence_plate = '" . $crawling_data[3]."', state = '" . $crawling_data[4]."', issue_date = '" . $crawling_data[5]."', ticket_amount = '" . $crawling_data[6]."', ticket_status = '" . $crawling_data[7]."'";

        //$this->db->query($sql);

       // $this->db->insert('parking_info', $new_member_insert_data);

//$this->db->insert_batch('parking_info', $crawling_data); 
}
}