<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class result_model extends CI_Model{
      function getallresultlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('result_id', 'lotto_group_name', 'game_name', 'result_date', 'result_num', 'ampmtype');
        
        // DB table to use
        $sTable = 'loto_results';
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
        $this->db->from($sTable);
                $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = loto_results.lottery_announcement_detail_id');
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
        $rResult = $this->db->get('');
    
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
            
            foreach($aColumns as $col)
            {
                if($col=='result_num')
                    
                {
                 //$resultnumarray=implode('/',$aRow[$col]);
                     $row[] = str_replace('/',' ',$aRow[$col]);
                 
                }else {
                    $row[] = $aRow[$col];
                }
               
                
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#resultedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Lottery Announcement"><i class="glyphicon glyphicon-edit" alt="'.$aRow['result_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#resultdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['result_id'].'"></i></a>';
                if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[6]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[6]['deletetask'] == 0)
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
    function get_next_results($announcement_id,$result_date){
       $sql = "SELECT result_num,result_date from loto_results where  result_date in (select MIN(result_date) as result_date
FROM loto_results where result_date > '".$result_date."' and lottery_announcement_detail_id = ".$announcement_id.")";

        $result = $this->db->query($sql);
//echo $this->db->last_query();
      //  exit();
            $row=$result->row();
    
$temparray=array();
if($row){
   $temparray['result_num']=$row->result_num;
$temparray['result_date']=$row->result_date; 
}else
{$temparray['result_num']=0;
$temparray['result_date']=0;

}
return $temparray;


       // return $result->result_array(); 
    }
    function get_previous_results($announcement_id,$result_date){
       $sql = "SELECT result_num,result_date from loto_results where  result_date in (select MAX(result_date) as result_date
FROM loto_results where result_date < '".$result_date."' and lottery_announcement_detail_id = ".$announcement_id.")";

        $result = $this->db->query($sql);
//echo $this->db->last_query();
      //  exit();

   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 
     $row=$result->row();
    
$temparray=array();
if($row){
   $temparray['result_num']=$row->result_num;
$temparray['result_date']=$row->result_date; 
}else
{$temparray['result_num']=0;
$temparray['result_date']=0;}

return $temparray;
        //return $result->result_array(); 
    }
    function getlotteryresults($theoffset,$lotogroupid)
    {
         
         $limit=5;
         $offset=$theoffset;
         
         if(isset($_GET['limit']))
             $limit=$_GET['limit'];
        
          $this->db->select('*');
            $this->db->from('loto_results');
            //$this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_results.lottery_announcement_detail_id');

             $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = loto_results.lottery_announcement_detail_id');
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
             $this->db->order_by("result_date", "desc");
             if($lotogroupid!=0)
                 $this->db->where('lottery_announcement.lottogroup_id',$lotogroupid);
             if(isset($_GET['start']))
              {
                 if($_GET['start']==$_GET['end'])
                 {
                    $this->db->where('result_date',$_GET['start']);   
                    //$this->db->where('result_date <',$_GET['end']); 
                 }
                 else 
                 {
                  $this->db->where('result_date >',$_GET['start']);   
                    $this->db->where('result_date <',$_GET['end']);    
                 }
               
              }
            $result = $this->db->get('', $limit);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
     function getlotteryresultsno($lotogroupid,$start_date,$end_date)
    {
         
          
           
         if($lotogroupid!=0)
         {
              $this->db->select('*');
               $this->db->from('loto_results');
              // $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_results.lottery_announcement_detail_id');

            $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = loto_results.lottery_announcement_detail_id');
           
                   $this->db->where('lottogroup_id',$lotogroupid);
                   if($start_date!=0)
                   {
                       if($_GET['start']==$_GET['end'])
                 {
                    $this->db->where('result_date',$start_date);   
                    //$this->db->where('result_date <',$_GET['end']); 
                 }
                 else 
                 {
                 $this->db->where('result_date >',$start_date);   
                    $this->db->where('result_date <',$end_date);   
                 }
                    
                   }
             $num_rows = $this->db->get('')->num_rows();
             return $num_rows;
                 //return $this->db->get_where('loto_results', array('lottogroup_id' => $lotogroupid))->num_rows();
         }
             
         else
         {
            
                
                  
             if($start_date!=0)
                   {
                  $this->db->select('*');
               $this->db->from('loto_results');
               
                    $this->db->where('result_date >',$start_date);   
                    $this->db->where('result_date <',$end_date); 
                     
             $num_rows = $this->db->get('')->num_rows();
             return $num_rows;
                   }
                   else 
                       
            return $this->db->get('loto_results')->num_rows();  
         }
       
    }
    function getcountofeachannouncement(){
        $sql="select count(*) as noofresultcount,lottery_announcement_detail_id from  loto_results group by lottery_announcement_detail_id";
         $results=$this->db->query($sql);
         $resultcountarray=array();
          foreach($results->result() as $row){
              $resultcountarray[$row->lottery_announcement_detail_id]=$row->noofresultcount;
          }
          return $resultcountarray;
         
    }
     function getfivelatestresults()
    {
        $sql="SELECT  `result_id`, `lottery_announcement_detail_id`, `result_num`, `ampmtype`, "
      . "`ampmspecifier`, `drawing_type`, `lottery_game`.`gameicon`, `lottery_game`.`game_id`, "
                . "`game_name`, `loto_group`.`lottogroup_id`, `lotto_group_name`, `result_date`, "
                . "`result_slot1`, `result_slot2`, `result_slot3`, `result_slot4`, `result_slot5`, "
                . "`resultpm_slot1`, `resultpm_slot2`, `resultpm_slot3`, `resultpm_slot4`, "
                . "`resultpm_slot5` FROM (`loto_results`) "
. "JOIN `lottery_announcement` ON `lottery_announcement`.`announcement_id` = `loto_results`.`lottery_announcement_detail_id` "
. "JOIN `loto_group` ON `loto_group`.`lottogroup_id` = `lottery_announcement`.`lottogroup_id`"
. " JOIN `lottery_game` ON `lottery_game`.`game_id` = `lottery_announcement`.`game_id`"
                . " WHERE `result_status` = 'current' ORDER BY `result_date` desc  ";
            $result=$this->db->query($sql);
           // print_r($this->db->last_query());
        return $result;
    }
     public function getresultinfobyid($resultinfo_id) {
        $this->db->select('*');

       $this->db->from('loto_results');
           // $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_results.lottery_announcement_detail_id');
            $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = loto_results.lottery_announcement_detail_id');
            $this->db->join('loto_group', 'lottery_announcement.lottogroup_id = loto_group.lottogroup_id');
            $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');

//$this->db->order_by("serology_id", "desc");
            $this->db->where('result_id', $resultinfo_id);

        //$this->db->or_where('registered',1);
        $result = $this->db->get();
        //return $result;
        //$this->db->get_where('lottery', array('lottery_id' => $serology_id));
        return $result->result_array();
    }

     public function updateresultinfo($result_id) {
$result_num= '';
            if($this->input->post('result_slot1') < 10 && $this->input->post('result_slot1') > 0)
                  {
                      $result_num='0'.intval($this->input->post('result_slot1'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num=intval($this->input->post('result_slot1'));  
                  }
                  
                
                if($this->input->post('result_slot2')!=0)
                {
                     if($this->input->post('result_slot2') < 10 && $this->input->post('result_slot2') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot2'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot2'));  
                  }
                  
                }
                 if($this->input->post('result_slot3')!=0)
                {
                    if($this->input->post('result_slot3') < 10 && $this->input->post('result_slot3') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot3'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot3'));  
                  }
                }
                 if($this->input->post('result_slot4')!=0)
                {
                   if($this->input->post('result_slot4') < 10 && $this->input->post('result_slot4') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot4'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot4'));  
                  }
                }
                 if($this->input->post('result_slot5')!=0)
                {
                   if($this->input->post('result_slot5') < 10 && $this->input->post('result_slot5') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot5'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot5'));  
                  } 
                }
        $new_member_insert_data = array(
            'result_slot1' => $this->input->post('result_slot1'),
            'result_slot2' => $this->input->post('result_slot2'),
            'result_slot3' => $this->input->post('result_slot3'),
            'result_slot4' => $this->input->post('result_slot4'),
            'result_slot5' => $this->input->post('result_slot5'),
             'result_num' => $result_num,
        );
       
            $this->db->where('result_id', $result_id);
            $insert = $this->db->update('loto_results', $new_member_insert_data);
            if ($insert) {
                return 1;


                //$this->load->view('userprofile');
            }
        
    }
    
  

    
public function deleteresult($result_id) {

       
              $resultidplusladidarray = explode('-', $result_id);
             $this->db->select('result_date,lottery_announcement_detail_id');
        $this->db->from('loto_results');
         $this->db->where('result_id', $result_id);   
$result = $this->db->get();
   //$result = $this->db->get_where('loto_bet_history_for_partner', array('role_id' => $role_id));
 
     $row=$result->row();
    
       
          
            
          $insert=  $this->db->delete('loto_results', array('result_id' => $resultidplusladidarray[0]));
          if($insert)
          {
             $new_member_insert_data = array(
                'result_status' => 0,
            );
            $this->db->where('announcement_id', $row->lottery_announcement_detail_id);
             $this->db->where('detail_date', explode(' ',$row->result_date)[0]);

            $this->db->update('lottery_announcement_detail', $new_member_insert_data);
            return 1;
          }
           
        
    }

   public function addresultinfo($partner_id) {
        
            $this->db->select('lottery_announcement.announcement_id,lottery_announcement_detail_id,drawing_type,dailytime ,detail_date,weeklytime,amtime,pmtime,onetimedatetime');
            $this->db->from('lottery_announcement_detail');
            $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id =lottery_announcement.announcement_id');
            $this->db->where('lottery_announcement_detail_id', $this->input->post('lottery_announcement_detail_id'));



            $query = $this->db->get();
            $row = $query->row();
                $result_date = $row->detail_date . ' ';
                if ($row->drawing_type == 'weekly') {
                    $result_date.=$row->weeklytime;
                } else if ($row->drawing_type == 'onetime') {
                    $result_date = $row->onetimedatetime;
                } else {
                    $result_date.= $row->dailytime;
                }
             $result_num= '';
            if($this->input->post('result_slot1') < 10 && $this->input->post('result_slot1') > 0)
                  {
                      $result_num='0'.intval($this->input->post('result_slot1'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num=intval($this->input->post('result_slot1'));  
                  }
                  
                
                if($this->input->post('result_slot2')!=0)
                {
                     if($this->input->post('result_slot2') < 10 && $this->input->post('result_slot2') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot2'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot2'));  
                  }
                  
                }
                 if($this->input->post('result_slot3')!=0)
                {
                    if($this->input->post('result_slot3') < 10 && $this->input->post('result_slot3') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot3'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot3'));  
                  }
                }
                 if($this->input->post('result_slot4')!=0)
                {
                   if($this->input->post('result_slot4') < 10 && $this->input->post('result_slot4') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot4'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot4'));  
                  }
                }
                 if($this->input->post('result_slot5')!=0)
                {
                   if($this->input->post('result_slot5') < 10 && $this->input->post('result_slot5') > 0)
                  {
                      $result_num.='/0'.intval($this->input->post('result_slot5'));
                     // $result_num= $this->input->post('result_slot1');
                  }
                  else 
                  {
                     $result_num.='/'.intval($this->input->post('result_slot5'));  
                  } 
                }
                
                $new_member_insert_data = array(
                    'result_date' => $result_date,
                    'result_slot1' => $this->input->post('result_slot1'),
                    'result_slot2' => $this->input->post('result_slot2'),
                    'result_slot3' => $this->input->post('result_slot3'),
                    'result_slot4' => $this->input->post('result_slot4'),
                    'result_slot5' => $this->input->post('result_slot5'),
                    'lottery_announcement_detail_id' => $row->announcement_id,
                    
                     'result_num' => $result_num,
                );
                $insert = $this->db->insert('loto_results', $new_member_insert_data);
                if($insert){
                    $new_member_insert_data = array(
                'result_status' => 1,
            );




            $this->db->where('lottery_announcement_detail_id', $row->lottery_announcement_detail_id);
            $this->db->update('lottery_announcement_detail', $new_member_insert_data);
                    return 1;
            } 

            
        
    }



    
}