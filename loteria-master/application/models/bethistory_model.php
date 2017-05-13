<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bethistory_model extends CI_Model {
     function getallcurrentpartnerbethistorylistfordatatable($partnerid) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns1 = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','user.email as email','gametype_name','bet_amount','bet_date','drawing_date','partner_approved_status','pending_status');
        $aColumns = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'email','gametype_name','bet_amount','bet_date','drawing_date','partner_approved_status');
         $aColumns2 = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','email','gametype_name','bet_amount','bet_date','drawing_date','pending_status','partner_approved_status');
       
        // DB table to use
        $sTable = 'loto_bet_history_for_partner';
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
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns1)), false);
        $this->db->from($sTable);
                  $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id');
                $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
                $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
                $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');


                $this->db->join('business_partner', 'loto_bet_history_for_partner.partner_id = business_partner.id');
                $this->db->join('game_type', 'loto_bet_history_for_partner.game_id = game_type.game_id');
                $this->db->join('user', 'user_id = better_id');
                $this->db->where('partner_id',$partnerid);
                 $todaydatetime = date('Y-m-d H:i:s');
$this->db->where('loto_bet_history_for_partner.drawing_date >= ', $todaydatetime);

        $rResult = $this->db->get('');
        //echo $this->db->last_query();
    
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
            $displaybetno='';
            $temppendingstatus='';
            foreach($aColumns2 as $col)
            {
               if($col=='betno_slot1'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
               else if($col=='betno_slot2'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                  
               else if($col=='betno_slot3'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                   
                else if($col=='betno_slot4'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                }
                 else if($col=='betno_slot5'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                     $row[] = $displaybetno;
                }
                else if($col=='pending_status'){
                  $temppendingstatus  =$aRow[$col];
                }
                 else if($col=='partner_approved_status'){
                   
                    if($temppendingstatus == 0)
                        {
                        if($aRow[$col]==1) 
                        {
                          $row[] = 'APPROVED';  
                          $row[]='<div class="glyphicon glyphicon-ok" alt="" ></div>';
                        }
                             
                        else{
                         $row[] = 'DISAPPROVED';  
                         $row[]='<div class="glyphicon glyphicon-remove" alt="" ></div>';
                        } 
                        
                        }
                        else {
                            $row[] = 'PENDING';
                             $approvedisapprovelink='<a class="popup" data-toggle="modal" data-target="#partnerapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="withdraw approve""><i class="glyphicon glyphicon-ok" alt="'.$aRow['bet_id_forpartner'].'-1" ></i></a> | <a class="popup" data-toggle="modal" data-target="#partnerapprovedisapprove" data-toggle="tooltip" data-placement="top" title=""  data-original-title="withdraw disapprove""><i class="glyphicon glyphicon-remove" alt="'.$aRow['bet_id_forpartner'].'-0" ></i></a>';
         
                            $row[]=$approvedisapprovelink;
                            
                        }
                }
                 else 
                $row[] = $aRow[$col];
                 
                 
            }
          $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
     function getallpassedpartnerbethistorylistfordatatable($partnerid) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns1 = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','user.email as email','gametype_name','bet_amount','bet_date','drawing_date','partner_approved_status');
        $aColumns = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'email','gametype_name','bet_amount','bet_date','drawing_date','partner_approved_status');
         $aColumns2 = array('bet_id_forpartner', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','email','gametype_name','bet_amount','bet_date','drawing_date','partner_approved_status');
       
        // DB table to use
        $sTable = 'loto_bet_history_for_partner';
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
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns1)), false);
        $this->db->from($sTable);
                  $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id');
                $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
                $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
                $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');


                $this->db->join('business_partner', 'loto_bet_history_for_partner.partner_id = business_partner.id');
                $this->db->join('game_type', 'loto_bet_history_for_partner.game_id = game_type.game_id');
                $this->db->join('user', 'user_id = better_id');
                $this->db->where('partner_id',$partnerid);
                 $todaydatetime = date('Y-m-d H:i:s');
$this->db->where('loto_bet_history_for_partner.drawing_date < ', $todaydatetime);

        $rResult = $this->db->get('');
        //echo $this->db->last_query();
    
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
            $displaybetno='';
            foreach($aColumns2 as $col)
            {
               if($col=='betno_slot1'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
               else if($col=='betno_slot2'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                  
               else if($col=='betno_slot3'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                   
                else if($col=='betno_slot4'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                }
                 else if($col=='betno_slot5'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                     $row[] = $displaybetno;
                }
                 else if($col=='partner_approved_status'){
                    if($aRow[$col]==1)
                   
                     $row[] = '<i class="glyphicon glyphicon-ok"></i>';
                    else
                         $row[] = '<i class="glyphicon glyphicon-remove"></i>';
                }
                 else 
                $row[] = $aRow[$col];
            }
          $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
      function getallbethistorylistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns1 = array('bet_id', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','user.email as email','gametype_name','partner_name','bet_amount','bet_date','drawing_date');
        $aColumns = array('bet_id', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'email','gametype_name','partner_name','bet_amount','bet_date','drawing_date');
         $aColumns2 = array('bet_id', 'lotto_group_name', 'game_name', 'ticket_no', 'betno_slot1', 'betno_slot2', 'betno_slot3','betno_slot4','betno_slot5','email','gametype_name','partner_name','bet_amount','bet_date','drawing_date');
       
        // DB table to use
        $sTable = 'loto_bet_history';
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
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns1)), false);
        $this->db->from($sTable);
                  $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
                $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
                $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
                $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');


                $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
                $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
                $this->db->join('user', 'user_id = better_id');

        $rResult = $this->db->get('');
        //echo $this->db->last_query();
    
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
            $displaybetno='';
            foreach($aColumns2 as $col)
            {
               if($col=='betno_slot1'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
               else if($col=='betno_slot2'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                  
               else if($col=='betno_slot3'){
                   if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
               }
                   
                else if($col=='betno_slot4'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                }
                 else if($col=='betno_slot5'){
                    if($aRow[$col])
                   $displaybetno.=$aRow[$col].' ';
                     $row[] = $displaybetno;
                }
                 else 
                $row[] = $aRow[$col];
            }
          $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
    function getuserbethistory($theoffset,$userid)
    {
         
      $limit=10;
         $offset=$theoffset;
         
         
                                         
        
          $this->db->select('ampmtype,sundayflag,mondayflag,tuesdayflag,wednesdayflag,thursdayflag,fridayflag,saturdayflag,bet_id,bet_date,lotto_group_name,game_name,partner_name,gametype_name,bet_amount,betno_slot1,betno_slot2,betno_slot3,betno_slot4,betno_slot5,loto_group.lottogroup_id, lottery_game.game_id as lottery_gameid,business_partner.id as business_partnerid,game_type.game_id as game_typeid,loto_bet_history.lottery_announcement_detail_id,lottery_announcement_detail.announcement_id,ticket_no,drawing_type,dailytime,drawing_day,weeklytime,amtime,pmtime');
            $this->db->from('loto_bet_history');
            $this->db->join('lottery_announcement_detail', 'loto_bet_history.lottery_announcement_detail_id = lottery_announcement_detail.lottery_announcement_detail_id');
           
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
           $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
               $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
              $this->db->where('better_id',$userid);
          $todaydatetime = date('Y-m-d H:i:s');
//$this->db->where('loto_bet_history.drawing_date < ', $todaydatetime);    
 //$this->db->where('announcement_status','passed');
             $this->db->order_by("bet_date", "desc");
              $this->db->order_by("bet_id", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
     function getuserbethistorypassed($theoffset,$userid){
          
      $limit=10;
         $offset=$theoffset;
         
         
                                         
        
          $this->db->select('ampmtype,sundayflag,mondayflag,tuesdayflag,wednesdayflag,thursdayflag,fridayflag,saturdayflag,bet_id,bet_date,lotto_group_name,game_name,partner_name,gametype_name,bet_amount,betno_slot1,betno_slot2,betno_slot3,betno_slot4,betno_slot5,loto_group.lottogroup_id, lottery_game.game_id as lottery_gameid,business_partner.id as business_partnerid,game_type.game_id as game_typeid,loto_bet_history.lottery_announcement_detail_id,lottery_announcement_detail.announcement_id,ticket_no,drawing_type,dailytime,drawing_day,weeklytime,amtime,pmtime');
            $this->db->from('loto_bet_history');
            $this->db->join('lottery_announcement_detail', 'loto_bet_history.lottery_announcement_detail_id = lottery_announcement_detail.lottery_announcement_detail_id');
           
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
           $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
               $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
              $this->db->where('better_id',$userid);
               $todaydatetime = date('Y-m-d H:i:s');
$this->db->where('loto_bet_history.drawing_date < ', $todaydatetime); 
 //$this->db->where('announcement_status','passed');
             $this->db->order_by("bet_date", "desc");
              $this->db->order_by("bet_id", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;  
    }
     
    function getuserbethistorynopassed($userid){
             $todaydatetime = date('Y-m-d H:i:s');

        //return $this->db->get_where('loto_bet_history', array('better_id' => $userid))->num_rows();
       $this->db->select('*');
               $this->db->from('loto_bet_history');
                 $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
           $this->db->where('better_id',$userid);
           $this->db->where('loto_bet_history.drawing_date < ', $todaydatetime);
                 //$this->db->where('announcement_status','passed');
            
            
             $num_rows = $this->db->get('')->num_rows();
             return $num_rows;
        }
     function getusercurrentbethistory($theoffset,$userid)
    {
         
$todaydatetime = date('Y-m-d H:i:s');
         $limit=10;
         $offset=$theoffset;
         
         
        
//          $this->db->select('*');
//            $this->db->from('loto_bet_history');
//           $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
//           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
//           
//           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
//            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
//           $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
//               $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
//              $this->db->where('better_id',$userid);
//              $this->db->where('announcement_status','current');
//
//             $this->db->order_by("bet_date", "desc");
//              $this->db->order_by("bet_id", "desc");
//            $result = $this->db->get('', $limit, $offset);
//        //$this->db->order_by("result_date", "asc"); 
//            //print_r($result);
//        return $result;
       $sql = "SELECT * 
FROM loto_bet_history 
join lottery_announcement_detail on (lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id) 
join lottery_announcement on (lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id) 
join loto_group on (loto_group.lottogroup_id = lottery_announcement.lottogroup_id) 
join lottery_game on (lottery_game.game_id = lottery_announcement.game_id) 
join game_type on (loto_bet_history.game_id = game_type.game_id) 
join business_partner on (loto_bet_history.partner_id = business_partner.id)
WHERE (	ticket_no)  IN
(SELECT distinct(ticket_no) FROM loto_bet_history join lottery_announcement_detail on (lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id)  where better_id=".$userid." and  drawing_date >= '".$todaydatetime."' ) order by bet_date DESC  LIMIT ".$limit." OFFSET ".$offset;
     $result = $this->db->query($sql);

        return $result;
    }
     function getusercurrentbethistoryno($userid)
    {
        $todaydatetime = date('Y-m-d H:i:s');
       // return $this->db->get_where('bet_history', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
   
 //$this->db->select('count(*) as therowcount');
//               $this->db->from('loto_bet_history');
//                 $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
//           $this->db->where('better_id',$userid);
//                 $this->db->where('announcement_status','current');
           $sql = "SELECT count(*) as therowcount
FROM loto_bet_history
WHERE (	ticket_no)  IN
(SELECT distinct(ticket_no) FROM loto_bet_history join lottery_announcement_detail on (lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id)  where better_id=".$userid." and drawing_date >= '".$todaydatetime."' ) ";


        $result = $this->db->query($sql);
            
//             $num_rows = $this->db->get('')->num_rows();
            
             // $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
         
        
                 return $row->therowcount;
        }
    function gettotalbetamount($userid)
    {
         $this->db->select_sum('bet_amount');
        $query = $this->db->get_where('loto_bet_history', array('better_id' => $userid));
        $row = $query->row();
        //echo $row->bet_amount;
                return $row->bet_amount;
    }
     function getuserpendingbethistory($theoffset,$userid)
    {
         $todaydatetime = date('Y-m-d H:i:s');
         $limit=10;
         $offset=$theoffset;
         
         
        
          $this->db->select('*');
            $this->db->from('loto_bet_history_for_partner');
           $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id');
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
           $this->db->join('game_type', 'loto_bet_history_for_partner.game_id = game_type.game_id');
               $this->db->join('business_partner', 'loto_bet_history_for_partner.partner_id = business_partner.id');
              $this->db->where('better_id',$userid);
              $this->db->where('loto_bet_history_for_partner.drawing_date >=', $todaydatetime);
             // $this->db->where('announcement_status','current');
 $this->db->where('pending_status','1');
             $this->db->order_by("bet_date", "desc");
             // $this->db->order_by("bet_id", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
    
    function getuserpendingbethistoryno($userid)
    {
       // return $this->db->get_where('bet_history', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
   $todaydatetime = date('Y-m-d H:i:s');
 $this->db->select('*');
               $this->db->from('loto_bet_history_for_partner');
                 $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id');
           $this->db->where('better_id',$userid);
           $this->db->where('loto_bet_history_for_partner.drawing_date >=', $todaydatetime);
                 //$this->db->where('announcement_status','current');
            //$this->db->where('announcement_status','current');
             $this->db->where('pending_status','1');
            
             $num_rows = $this->db->get('')->num_rows();
             return $num_rows;
        }
   
function getuserbethistoryno($userid)
    {
         $todaydatetime = date('Y-m-d H:i:s');

        //return $this->db->get_where('loto_bet_history', array('better_id' => $userid))->num_rows();
       $this->db->select('*');
               $this->db->from('loto_bet_history');
                 $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
           $this->db->where('better_id',$userid);
           //$this->db->where('loto_bet_history.drawing_date < ', $todaydatetime);
                 //$this->db->where('announcement_status','passed');
            
            
             $num_rows = $this->db->get('')->num_rows();
             return $num_rows;
        
    }
    public function getbethistoryinfobyid($bethistoryinfo_id) {

         $sql = "SELECT  loto_bet_history.*,lottery_announcement.minbet,lottery_announcement.maxbet
FROM loto_bet_history join  lottery_announcement_detail on ( lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id) join  lottery_announcement on ( lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id) where bet_id =
" . $bethistoryinfo_id;
            $result = $this->db->query($sql);

            return $result->result_array();
    }

    public function deletebethistory($bethistory_id) {

        if ($this->db->delete('loto_bet_history', array('bet_id' => $bethistory_id)))
                echo '1';
    }
    function getallbethistorytoexport($partner_id,$currentorhistory) {
$todaydatetime = date('Y-m-d H:i:s');

        $this->db->select('ampmtype,loto_bet_history_for_partner.drawing_date,loto_bet_history_for_partner.bet_id_forpartner,loto_bet_history_for_partner.betno_slot1,loto_bet_history_for_partner.betno_slot2,loto_bet_history_for_partner.betno_slot3,loto_bet_history_for_partner.betno_slot4,loto_bet_history_for_partner.betno_slot5,loto_group.lotto_group_name,lottery_game.game_name,user.email,game_type.gametype_name,loto_bet_history_for_partner.bet_amount,loto_bet_history_for_partner.bet_date,lottery_announcement_detail.announcement_status,loto_bet_history_for_partner.partner_approved_status,loto_bet_history_for_partner.pending_status,loto_bet_history_for_partner.ticket_no');

       
        $this->db->from('loto_bet_history_for_partner');
                $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history_for_partner.lottery_announcement_detail_id');

                $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
                $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
                $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
                $this->db->join('user', 'loto_bet_history_for_partner.better_id = user.user_id');
                $this->db->join('game_type', 'loto_bet_history_for_partner.game_id = game_type.game_id');
                  $this->db->where('partner_id', $partner_id);
                  if($currentorhistory=='current')
                   $this->db->where('loto_bet_history_for_partner.drawing_date >=', $todaydatetime);
                  else 
                      $this->db->where('loto_bet_history_for_partner.drawing_date <', $todaydatetime);
        $query = $this->db->get();

        //echo $this->db->last_query();
        //$this->load->dbutil();
//echo $this->db->last_query();
//$query = $this->db->query($this->db->last_query());
//$delimiter = ",";
//$newline = "\r\n";
//echo $this->dbutil->csv_from_result($query,$delimiter,$newline); 
        return $query;
    }


   
     function getannouncementidstatus($lottery_announcement_detail_id) {
        $this->db->select('announcement_id');
        $this->db->from('lottery_announcement_detail');
        $this->db->where('lottery_announcement_detail_id', $lottery_announcement_detail_id);

        $query1 = $this->db->get();
        $row1 = $query1->row();
        $announcementid = $row1->announcement_id;
        $this->db->select('drawing_type,dailytime,drawing_day,weeklytime,amtime,pmtime,onetimedatetime,drawingvalidupto');
        $this->db->from('lottery_announcement');
        $this->db->where('announcement_id', $announcementid);

        $query = $this->db->get();
        $row = $query->row();
        $announcementstatusinfo = array();
        $announcementstatusinfo[0] = $row->drawing_type;
        $announcementstatusinfo[1] = $row->dailytime;
        $announcementstatusinfo[2] = $row->drawing_day;
        $announcementstatusinfo[3] = $row->weeklytime;
        $announcementstatusinfo[4] = $row->amtime;
        $announcementstatusinfo[5] = $row->pmtime;
        $announcementstatusinfo[6] = $row->onetimedatetime;
        $announcementstatusinfo[7] = $row->drawingvalidupto;
        return $announcementstatusinfo;
    }
   

 function getannouncementidandbetdate($bet_id_forpartner) {
        $this->db->select('lottery_announcement_detail_id,bet_date,drawing_date');
        $this->db->from('loto_bet_history_for_partner');
        $this->db->where('bet_id_forpartner', $bet_id_forpartner);

        $query = $this->db->get();
        $row = $query->row();
        $announcementidandbetdate = array();
        $announcementidandbetdate[0] = $row->lottery_announcement_detail_id;
        $announcementidandbetdate[1] = $row->bet_date;
         $announcementidandbetdate[2] = $row->drawing_date;
        return $announcementidandbetdate;
    }
     function getpartnerandotherdetailsforemailfrompartnertable($bet_id_forpartner) {
        $this->db->select('lotto_group_name,game_name ,betno_slot1,betno_slot2,betno_slot3,betno_slot4,betno_slot5,user.username as userkousername,user.email as useremail, business_partner.email as partneremail');
        $this->db->from('loto_bet_history_for_partner');
        $this->db->where('bet_id_forpartner', $bet_id_forpartner);
        $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id =loto_bet_history_for_partner.lottery_announcement_detail_id');

        $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id =lottery_announcement_detail.announcement_id');
        $this->db->join('loto_group', ' loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
        $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
        $this->db->join('user', 'loto_bet_history_for_partner.better_id =user.user_id');
        $this->db->join('business_partner', 'business_partner.id = loto_bet_history_for_partner.partner_id');

        $query = $this->db->get();
        $row = $query->row();
        //echo $this->db->last_query();
return $row;
       
    }
     function getpartnerandotherdetailsforemail($registeredbetid){
       $this->db->select('ampmtype,loto_bet_history.ticket_no as theticket,lotto_group_name,game_name ,betno_slot1,betno_slot2,betno_slot3,betno_slot4,betno_slot5,user.username as userkousername,user.email as useremail, business_partner.email as partneremail');
        $this->db->from('loto_bet_history');
        $this->db->where('bet_id', $registeredbetid);
        $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id =loto_bet_history.lottery_announcement_detail_id');

        $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id =lottery_announcement_detail.announcement_id');
        $this->db->join('loto_group', ' loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
        $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
        $this->db->join('user', 'loto_bet_history.better_id = user.user_id');
        $this->db->join('business_partner', 'business_partner.id = loto_bet_history.partner_id');

        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }
     function getusercurrentbethistoryofparticularticketno($ticketno)
    {
         
        
        
         
         
        
          $this->db->select('*');
            $this->db->from('loto_bet_history');
           $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
           $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
               $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
              //$this->db->where('better_id',$userid);
              //$this->db->where('announcement_status','current');
               $this->db->where('ticket_no',$ticketno);
    
            $result = $this->db->get();
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
   
      function changetheparterapprovedstatusinloto_bet_history_for_partnertable($bet_id_forpartner, $partner_approved_status) {
        $new_member_insert_data = array(
            'partner_approved_status' => $partner_approved_status,
            'pending_status' => 0,
        );
        $this->db->where('bet_id_forpartner', $bet_id_forpartner);
        $this->db->update('loto_bet_history_for_partner', $new_member_insert_data);
    }
function addbalanceintopartneraccountanddeductfromuser($registeredbetid) {
        $this->db->select('bet_amount,partner_id,better_id');
        $this->db->from('loto_bet_history');
        $this->db->where('bet_id', $registeredbetid);


        $query = $this->db->get();
        $row = $query->row();
        $sql = "update user set wallet_balance = wallet_balance-" . $row->bet_amount . " where user_id =" . $row->better_id;

        $this->db->query($sql);
        $sql = "update business_partner set partner_balance = partner_balance+" . $row->bet_amount . " where id =" . $row->partner_id;

        $this->db->query($sql);
    }

function getticketnoforprintinginpdf($registeredbetid) {
        $this->db->select('loto_bet_history.ticket_no as theticket');
        $this->db->from('loto_bet_history');
        $this->db->where('bet_id', $registeredbetid);
        $query = $this->db->get();
        $row = $query->row();
        return $row->theticket;
    }

 function insertbetintotheloto_bet_historytable($bet_id_forpartner) {
        $this->db->select('*');
        $this->db->from('loto_bet_history_for_partner');
        $this->db->where('bet_id_forpartner', $bet_id_forpartner);
        $query = $this->db->get();
        $row = $query->row();
        $new_member_insert_data = array(
            'betno_slot1' => $row->betno_slot1,
            'betno_slot2' => $row->betno_slot2,
            'betno_slot3' => $row->betno_slot3,
            'betno_slot4' => $row->betno_slot4,
            'betno_slot5' => $row->betno_slot5,
            'lottery_announcement_detail_id' => $row->lottery_announcement_detail_id,
            'better_id' => $row->better_id,
            'partner_id' => $row->partner_id,
            'game_id' => $row->game_id,
            'bet_amount' => $row->bet_amount,
            'bet_date' => $row->bet_date,
            'ticket_no' => $row->ticket_no,
             'drawing_date' => $row->drawing_date,
        );

        $this->db->insert('loto_bet_history', $new_member_insert_data);
        return $this->db->insert_id();
    }
    function gettotalamountofbetsofcurrentbusinesspartner($businesspartner_id){
         $sql = "SELECT COALESCE(sum(bet_amount),0) as therowcount
FROM loto_bet_history
WHERE  partner_id = ".$businesspartner_id;

        $result = $this->db->query($sql);
            
//             $num_rows = $this->db->get('')->num_rows();
            
             // $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
         
        
                 return $row->therowcount;
        //return $result->num_rows();
    }
    function gettotalnooffailedbetsofcurrentbusinesspartner($businesspartner_id){
      $sql = "SELECT * FROM loto_bet_history_for_partner
WHERE partner_id = ".$businesspartner_id." and  pending_status = 0 and partner_approved_status = 0";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();  
    }
    function getnoofbetsyesterdayofcurrentbusinesspartner($yesterdaydate,$businesspartner_id){
        $sql = "SELECT * FROM loto_bet_history
WHERE partner_id = ".$businesspartner_id." and  bet_date ='" . $yesterdaydate . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }
    function gettotalnoofbetsofcurrentbusinesspartner($businesspartner_id) {
         $sql = "SELECT * FROM loto_bet_history
WHERE 	partner_id ='" . $businesspartner_id . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }
     function gettotalnoofbets() {
        return $this->db->get('loto_bet_history')->num_rows();
    }
    function getnoofbetsyesterday($yesterdaykodate) {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT * FROM loto_bet_history
WHERE bet_date ='" . $yesterdaykodate . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }
    public function addbethistoryinfo($partner_id, $ticketno) {
        $new_member_insert_data = array(
                'betno_slot1' => $this->input->post('betno_slot1'),
                'betno_slot2' => $this->input->post('betno_slot2'),
                'betno_slot3' => $this->input->post('betno_slot3'),
                'betno_slot4' => $this->input->post('betno_slot4'),
                'betno_slot5' => $this->input->post('betno_slot5'),
                'lottery_announcement_detail_id' => $this->input->post('lottery_announcement_detail_id'),
                'better_id' => $this->input->post('better_id'),
                'game_id' => $this->input->post('gametype_id'),
                'partner_id' => $this->input->post('busnesspartner_id'),
                'bet_amount' => $this->input->post('bet_amount'),
                'bet_date' => $this->input->post('bet_date'),
                'ticket_no' => $ticketno,
            );
            $insert = $this->db->insert('loto_bet_history', $new_member_insert_data);
            if ($insert) {
                echo '1';


                //$this->load->view('userprofile');
            }
    }

    public function updatebethistoryinfo($bethistory_id) {

        $new_member_insert_data = array(
                'betno_slot1' => $this->input->post('betno_slot1'),
                'betno_slot2' => $this->input->post('betno_slot2'),
                'betno_slot3' => $this->input->post('betno_slot3'),
                'betno_slot4' => $this->input->post('betno_slot4'),
                'betno_slot5' => $this->input->post('betno_slot5'),
                'better_id' => $this->input->post('better_id'),
                'game_id' => $this->input->post('gametype_id'),
                'partner_id' => $this->input->post('busnesspartner_id'),
                'bet_amount' => $this->input->post('bet_amount'),
                'bet_date' => $this->input->post('bet_date'),
            );
            $this->db->where('bet_id', $bethistory_id);
            $insert = $this->db->update('loto_bet_history', $new_member_insert_data);
            if ($insert) {
                echo '1';


                //$this->load->view('userprofile');
            }
    }


}
