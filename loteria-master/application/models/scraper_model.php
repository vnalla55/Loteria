<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class scraper_model extends CI_Model {
    function updatetheresultdataintotheresulttable($announcementid,$lotterygamedatenresult){
       // echo '3 vayako array:';print_r($lotterygamedatenresult);
       $theresult=trim(preg_replace("/&#?[a-z0-9]+;/i","",trim($lotterygamedatenresult[1])));
       //print_r($theresult);
       $theresultarray=preg_split('/\s+/', $theresult);
      //$theresultarray=explode(' ',$theresult);
  // echo 'arrayfileter agadi:'; print_r($theresultarray);
   // print_r(array_filter($theresultarray));
    
    $theresultarray=array_filter($theresultarray);
   // echo 'arrayfileter pachadi:';print_r($theresultarray);
    $theresultarray1=array_filter($theresultarray);
    $theresultarray=implode('/',$theresultarray);
    //print_r($theresultarray);
    //array_filter($linksArray)
    $new_member_insert_data = array(
            
           
            'result_slot1' => explode('/',$theresultarray)[0] ,
       'result_slot2' => explode('/',$theresultarray)[1] ,
       'result_slot3' => explode('/',$theresultarray)[2]  ,
       'result_num' => implode('/',$theresultarray1),
        );
      
    $this->db->where('lottery_announcement_detail_id', explode('/',$announcementid)[0]); 
   
$this->db->where('result_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])).' '.explode('/',$announcementid)[1]);
   
        $this->db->update('loto_results', $new_member_insert_data);  
         $new_member_insert_data = array(
            
           
            
            'result_status' => 1,
       
        );
        
    $this->db->where('announcement_id', explode('/',$announcementid)[0]); 
$this->db->where('detail_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])));
   
        $this->db->update('lottery_announcement_detail', $new_member_insert_data); 
    }
    function updatetheresultdataintothescrapletable($lotogroup,$lotterygamedatenresult)
    {
      $theresult=trim(preg_replace("/&#?[a-z0-9]+;/i","",trim($lotterygamedatenresult[1])));
      $theresultarray=explode(' ',$theresult);
   // print_r($theresultarray);
   // print_r(array_filter($theresultarray));
    
    $theresultarray=array_filter($theresultarray);
    //array_filter($linksArray)
   $new_member_insert_data = array(
            
            'result_no' => implode('/',$theresultarray),
        );
   $this->db->where('loto_group', $lotogroup);   
$this->db->where('lottery_game', $lotterygamedatenresult[0]);   
$this->db->where('result_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])));
   
        $this->db->update('results_scraper', $new_member_insert_data);
       //   print_r($theresult) ;
    }
    function inserttheresultdataintotheresulttable($announcement_id,$lotterygamedatenresult){
       $theresult=trim(preg_replace("/&#?[a-z0-9]+;/i","",trim($lotterygamedatenresult[1])));
      //$theresultarray=explode(' ',$theresult);
        $theresultarray=preg_split('/\s+/', $theresult);
   // print_r($theresultarray);
   // print_r(array_filter($theresultarray));
    
    $theresultarray=array_filter($theresultarray); 
     $theresultarray1=array_filter($theresultarray);
    $theresultarray=implode('/',$theresultarray);
    //print_r($theresultarray);
    //array_filter($linksArray)
  $new_member_insert_data = array(
            
           
            
            'result_status' => 'passed',
       
        );
        
  $this->db->where('lottery_announcement_detail_id', explode('/',$announcement_id)[0]); 
   $this->db->update('loto_results', $new_member_insert_data); 

   $new_member_insert_data = array(
            
           
            'result_date' => date("Y-m-d", strtotime($lotterygamedatenresult[2])).' '.explode('/',$announcement_id)[1],
           
            'result_slot1' => explode('/',$theresultarray)[0] ,
       'result_slot2' => explode('/',$theresultarray)[1] ,
       'result_slot3' => explode('/',$theresultarray)[2] ,
       'lottery_announcement_detail_id'=>explode('/',$announcement_id)[0],
          'result_num' => implode('/',$theresultarray1),
        );
        $insert = $this->db->insert('loto_results', $new_member_insert_data);   
        echo $this->db->last_query();
        $new_member_insert_data = array(
            
           
            
            'result_status' => 1,
       
        );
        
  $this->db->where('announcement_id', explode('/',$announcement_id)[0]); 
$this->db->where('detail_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])));
   
        $this->db->update('lottery_announcement_detail', $new_member_insert_data);  
    }
function inserttheresultdataintothescrapletable($lotogroup,$lotterygamedatenresult)
{
   $theresult=trim(preg_replace("/&#?[a-z0-9]+;/i","",trim($lotterygamedatenresult[1])));
      $theresultarray=explode(' ',$theresult);
   //print_r($theresultarray);
   // print_r(array_filter($theresultarray));
    
    $theresultarray=array_filter($theresultarray); 
   $new_member_insert_data = array(
            'loto_group' => $lotogroup,
            'lottery_game' => $lotterygamedatenresult[0],
            'result_date' => date("Y-m-d", strtotime($lotterygamedatenresult[2])),
            'result_no' => implode('/',$theresultarray),
        );
        $insert = $this->db->insert('results_scraper', $new_member_insert_data);  
}

function checkifthisresultdateexists($announcement_id,$lotterygamedatenresult){
    $this->db->select('*');
        $this->db->from('loto_results');
        $this->db->where('lottery_announcement_detail_id', explode('/',$announcement_id)[0]);   
  
$this->db->where('result_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])).' '.explode('/',$announcement_id)[1]);
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 if($result->num_rows()>0){
     return 1;
 }else 
 {
     return 0;
 }
}
function checkifthisannouncementexists($lotogroup,$lotterygamedatenresult){
    $this->db->select('announcement_id,drawing_type,dailytime,weeklytime');
        $this->db->from('lottery_announcement');
    //$this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
         
      $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
        
   $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
         
        $this->db->where('loto_group.lotto_group_name', $lotogroup);   
$this->db->where('lottery_game.game_name', $lotterygamedatenresult[0]);   
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 if($result->num_rows()>0){
     $row=$result->row();
     $drawingtime='';
         if($row->drawing_type == 'daily')
             $drawingtime=$row->dailytime;
             else if($row->drawing_type =='weekly')
        $drawingtime=$row->weeklytime;
                 return $row->announcement_id.'/'.$drawingtime;
    // return 1;
 }else 
 {
     return 0;
 }
    
}
function checkifthisresultdataexistsinthescrapletable($lotogroup,$lotterygamedatenresult)
{
    //print_r($lotterygamedatenresult);
  $this->db->select('*');
        $this->db->from('results_scraper');
        $this->db->where('loto_group', $lotogroup);   
$this->db->where('lottery_game', $lotterygamedatenresult[0]);   
$this->db->where('result_date', date("Y-m-d", strtotime($lotterygamedatenresult[2])));
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 if($result->num_rows()>0){
     return 1;
 }else 
 {
     return 0;
 }
 
}

}
