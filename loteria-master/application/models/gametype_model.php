<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class gametype_model extends CI_Model {
     function getallgametypelistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('game_id', 'gametype_name', 'no_of_picks');
        
        // DB table to use
        $sTable = 'game_type';
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
        $rResult = $this->db->get($sTable);
    
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
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#gametypeedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Gametype"><i class="glyphicon glyphicon-edit" alt="'.$aRow['game_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#gametypedelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['game_id'].'"></i></a>';
                   if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
         if($allpermissioninfo[4]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[4]['deletetask'] == 0)
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
    public function getallcombovalueforgametype($partner_id) {



        $sql = "SELECT  gametype_name, game_id
FROM game_type
";

            $result = $this->db->query($sql);

            return $result->result_array();
    }

    function getgametypeinfo()
    {
         $query = $this->db->get('game_type');
            return $query;
    }
     public function getgametypeinfobyid($gametype_id) {
        $result = $this->db->get_where('game_type', array('game_id' => $gametype_id));
        return $result->result_array();
    }
    public function updategametypeinfo($gametype_id) {

        $new_member_insert_data = array(
            'gametype_name' => $this->input->post('gamename'),
            'no_of_picks' => $this->input->post('no_of_picks'),
            'multipleforonepick' => $this->input->post('multipleforonepick'),
            'multiplefortwopicks' => $this->input->post('multiplefortwopicks'),
            'multipleforthreepicks' => $this->input->post('multipleforthreepicks'),
            'multipleforfourpicks' => $this->input->post('multipleforfourpicks'),
            'multipleforallpicks' => $this->input->post('multipleforallpicks'),
        );
        $this->db->where('game_id', $gametype_id);
        $insert = $this->db->update('game_type', $new_member_insert_data);
        if ($insert) {
           return 1;


            //$this->load->view('userprofile');
        }
    }
     public function deletegametype($gametype_id) {
        if ($this->db->delete('game_type', array('game_id' => $gametype_id)))
            return 1;
    }
     function getallgametype() {

        return $this->db->get('game_type');
    }
     function getallgametypeforform() {
        // $this->db->select('*');

        $query = $this->db->get('game_type');


        return $query;
    }
     public function addgametypeinfo() {

        $new_member_insert_data = array(
            'gametype_name' => $this->input->post('gamename'),
            'no_of_picks' => $this->input->post('no_of_picks'),
            'multipleforonepick' => $this->input->post('multipleforonepick'),
            'multiplefortwopicks' => $this->input->post('multiplefortwopicks'),
            'multipleforthreepicks' => $this->input->post('multipleforthreepicks'),
            'multipleforfourpicks' => $this->input->post('multipleforfourpicks'),
            'multipleforallpicks' => $this->input->post('multipleforallpicks'),
        );
        $insert = $this->db->insert('game_type', $new_member_insert_data);
        if ($insert) {
            return 1;


            //$this->load->view('userprofile');
        }
    }

}