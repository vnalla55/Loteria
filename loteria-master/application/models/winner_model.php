<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class winner_model extends CI_Model{
      function getallwinnerlistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('winning_id', 'lotto_group_name', 'game_name', 'detail_date', 'winning_date','email', 'winning_amt', 'ampmtype');
        
        // DB table to use
        $sTable = 'loto_winning_lottery';
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
                $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_winning_lottery.lottery_announcement_detail_id');

                $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
                $this->db->join('loto_group', 'lottery_announcement.lottogroup_id = loto_group.lottogroup_id');
                $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');

                $this->db->join('user', 'user.user_id = loto_winning_lottery.winner_id');

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
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#winneredit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Lottery Announcement"><i class="glyphicon glyphicon-edit" alt="'.$aRow['winning_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#winnerdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['winning_id'].'"></i></a>';
             if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[7]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[7]['deletetask'] == 0)
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
    function getuserwinhistory($theoffset,$userid)
    {
         
         $limit=10;
         $offset=$theoffset;
         
         
        
          $this->db->select('*');
            $this->db->from('loto_winning_lottery');
            $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_winning_lottery.lottery_announcement_detail_id');
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
              $this->db->where('winner_id',$userid);
             $this->db->order_by("winning_date", "desc");
            $result = $this->db->get('', $limit, $offset);
        //$this->db->order_by("result_date", "asc"); 
            //print_r($result);
        return $result;
    }
    
    function getuserwinhistoryno($userid)
    {
        return $this->db->get_where('loto_winning_lottery', array('winner_id' => $userid))->num_rows();
    }
   
    function gettotalwinamount($userid)
    {
         $this->db->select_sum('winning_amt');
        $query = $this->db->get_where('loto_winning_lottery', array('winner_id' => $userid));
        $row = $query->row();
        //echo $row->bet_amount;
                return $row->winning_amt;
    }
    function getnoofwinnersyesterday($yesterdaykodate) {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT distinct winner_id FROM loto_winning_lottery
WHERE winning_date = '" . $yesterdaykodate . "'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }
     function gettotalwinners() {
        //return $this->db->get_where('user', array('better_id' => $userid,'betstatus'=>'current'))->num_rows();
        $sql = "SELECT distinct winner_id FROM loto_winning_lottery
";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        return $result->num_rows();
    }
    public function getwinnerinfobyid($winnerinfo_id) {
        $result = $this->db->get_where('loto_winning_lottery', array('winning_id' => $winnerinfo_id));
            return $result->result_array();
    }
     public function updatewinnerinfo($winner_id) {


        $new_member_insert_data = array(
            'lottery_announcement_detail_id' => explode('/', $this->input->post('detailidplusdrawingtype'))[0],
            'ampmspecifier' => $this->input->post('ampmspecifier'),
            'winner_id' => $this->input->post('winner_id'),
            'winning_amt' => $this->input->post('winning_amt'),
            'winning_date' => $this->input->post('winning_date')
        );
        $this->db->where('winning_id', $winner_id);
     

            $insert = $this->db->update('loto_winning_lottery', $new_member_insert_data);
            if ($insert) {
                return 1;


                //$this->load->view('userprofile');
            }
        
    }
    
    public function deletewinner($winner_id) {
        
            if ($this->db->delete('loto_winning_lottery', array('winning_id' => $winner_id)))
               return 1;
        
    }
    public function addwinnerinfo($partner_id) {
       
            $new_member_insert_data = array(
                'lottery_announcement_detail_id' => explode('/', $this->input->post('detailidplusdrawingtype'))[0],
                'winner_id' => $this->input->post('winner_id'),
                'winning_amt' => $this->input->post('winning_amt'),
                'winning_date' => $this->input->post('winning_date'),
                'ampmspecifier' => $this->input->post('ampmspecifier'),
            );
            $insert = $this->db->insert('loto_winning_lottery', $new_member_insert_data);
            if ($insert) {
                return 1;
            }
        
    }
    
}
