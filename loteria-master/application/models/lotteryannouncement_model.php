<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class lotteryannouncement_model extends CI_Model {
     function getalllotteryannouncementlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('announcement_id', 'lotto_group_name', 'game_name', 'minbet', 'maxbet', 'drawingvalidupto', 'drawing_type','dailytime','drawing_day','weeklytime','onetimedatetime','ampmtype');
        
        // DB table to use
        $sTable = 'lottery_announcement';
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
               
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#lotteryannouncementedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Lottery Announcement"><i class="glyphicon glyphicon-edit" alt="'.$aRow['announcement_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#lotteryannouncementdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['announcement_id'].'"></i></a>';
                  if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[5]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[5]['deletetask'] == 0)
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
     function getallannouncementdatesforresults($lotogrouplotterygame) {
        $lotogrouplotterygamearray = explode('-', $lotogrouplotterygame);
        $sql = "SELECT ampmtype, detail_date,lottery_announcement_detail_id,drawing_type,dailytime,weeklytime,amtime,pmtime,onetimedatetime
FROM lottery_announcement_detail join lottery_announcement on (lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id) join loto_group on (loto_group.lottogroup_id = lottery_announcement.lottogroup_id) join lottery_game on (lottery_game.game_id = lottery_announcement.game_id)  where lottery_announcement.lottogroup_id =
" . $lotogrouplotterygamearray[0] . " and lottery_announcement.game_id =" . $lotogrouplotterygamearray[1] . " and result_status =0";
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getallcombovaluelotobetsforannouncingwinners($lotogrouplotterygame) {

        $lotogrouplotterygamearray = explode('-', $lotogrouplotterygame);
        $sql = "SELECT  detail_date,lottery_announcement_detail_id,drawing_type,dailytime,weeklytime,amtime,pmtime,onetimedatetime
FROM lottery_announcement_detail join lottery_announcement on (lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id) join loto_group on (loto_group.lottogroup_id = lottery_announcement.lottogroup_id) join lottery_game on (lottery_game.game_id = lottery_announcement.game_id)  where lottery_announcement.lottogroup_id =
" . $lotogrouplotterygamearray[0] . " and lottery_announcement.game_id =" . $lotogrouplotterygamearray[1] . " order by detail_date DESC";
        $result = $this->db->query($sql);

        return $result->result_array();
    }
    


    function search_lottery() {


        $result = $this->db->query("select * from lottery where lottery_name like'" . $this->input->post('input') . "%'");

        //$customers=array();
        $list = "<ul class='unorganizedfromscratch'>";
        foreach ($result->result() as $row) {
            //$customer= "";
            $list .="<li class='unorganizedfromscratchli'>" . $row->lottery_id . "/" . $row->lottery_name . " </li>";
        }
        $list.="</ul>";
        echo $list;
        //echo json_encode($customers);
    }

    public function addlotteryinfo($partner_id) {
      
            if ($this->input->post('drawing_type') == 'daily') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'dailytime' => $this->input->post('dailytime'),
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $insert = $this->db->insert('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                   return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'ampm') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'amtime' => $this->input->post('amtime'),
                    'pmtime' => $this->input->post('pmtime'),
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $insert = $this->db->insert('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                  return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'weekly') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'drawing_day' => $this->input->post('drawing_day'),
                    'weeklytime' => $this->input->post('weeklytime'),
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $insert = $this->db->insert('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                   return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'onetime') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'onetimedatetime' => $this->input->post('onetimedatetime'),
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $insert = $this->db->insert('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                    return 1;


                    //$this->load->view('userprofile');
                }
            }
        
    }

    public function updatelotteryinfo($lotteryinfo_id) {

       
            if ($this->input->post('drawing_type') == 'daily') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'dailytime' => $this->input->post('dailytime'),
                    'amtime' => null,
                    'pmtime' => null,
                    'drawing_day' => null,
                    'weeklytime' => null,
                    'onetimedatetime' => null,
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $this->db->where('announcement_id', $lotteryinfo_id);
                $insert = $this->db->update('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                    return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'ampm') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'amtime' => $this->input->post('amtime'),
                    'pmtime' => $this->input->post('pmtime'),
                    'dailytime' => null,
                    'drawing_day' => null,
                    'weeklytime' => null,
                    'onetimedatetime' => null,
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $this->db->where('announcement_id', $lotteryinfo_id);
                $insert = $this->db->update('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                    return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'weekly') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'drawing_day' => $this->input->post('drawing_day'),
                    'weeklytime' => $this->input->post('weeklytime'),
                    'dailytime' => null,
                    'amtime' => null,
                    'pmtime' => null,
                    'onetimedatetime' => null,
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $this->db->where('announcement_id', $lotteryinfo_id);
                $insert = $this->db->update('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                     return 1;


                    //$this->load->view('userprofile');
                }
            } else if ($this->input->post('drawing_type') == 'onetime') {
                $new_member_insert_data = array(
                    'game_id' => $this->input->post('game_id'),
                    'lottogroup_id' => $this->input->post('lottogroup_id'),
                    'minbet' => $this->input->post('minbet'),
                    'maxbet' => $this->input->post('maxbet'),
                    'drawingvalidupto' => $this->input->post('drawingvalidupto'),
                    'drawing_type' => $this->input->post('drawing_type'),
                    'onetimedatetime' => $this->input->post('onetimedatetime'),
                    'dailytime' => null,
                    'amtime' => null,
                    'pmtime' => null,
                    'drawing_day' => null,
                    'weeklytime' => null,
                    'sundayflag' => $this->input->post('sundayflag'),
                    'mondayflag' => $this->input->post('mondayflag'),
                    'tuesdayflag' => $this->input->post('tuesdayflag'),
                    'wednesdayflag' => $this->input->post('wednesdayflag'),
                    'thursdayflag' => $this->input->post('thursdayflag'),
                    'fridayflag' => $this->input->post('fridayflag'),
                    'saturdayflag' => $this->input->post('saturdayflag'),
                    'ampmtype' => $this->input->post('ampmtype'),
                );
                $this->db->where('announcement_id', $lotteryinfo_id);
                $insert = $this->db->update('lottery_announcement', $new_member_insert_data);
                if ($insert) {
                   return 1;


                    //$this->load->view('userprofile');
                }
            }
        
    }

    public function deletelottery($lottery_id) {

        
            if ($this->db->delete('lottery_announcement', array('announcement_id' => $lottery_id)))
                return 1;
        
    }

    public function getlotteryinfobyid($lotteryinfo_id) {

       $result = $this->db->get_where('lottery_announcement', array('announcement_id' => $lotteryinfo_id));
            return $result->result_array();
    }

   
}
