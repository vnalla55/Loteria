<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lotterygame_model extends CI_Model {
     function getalllotterygamelistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('game_id', 'game_name', 'description', 'gameicon');
        
        // DB table to use
        $sTable = 'lottery_game';
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
                if($col=='gameicon')
                {
                    if($aRow[$col]){
                       $row[]=' <img style="width:75px;" title="'.$aRow[$col].'" alt="'.$aRow[$col].'" src="'.base_url().'lotterygameicons/'.$aRow[$col].'">';  
                       
 
                    }
                    else{
                        $row[]=$aRow[$col]; 
                    }
                    
                }else {
                  $row[] = $aRow[$col];  
                }
               
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#lotterygameedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Webpage"><i class="glyphicon glyphicon-edit" alt="'.$aRow['game_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#lotterygamedelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['game_id'].'"></i></a>';
                   if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[18]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[18]['deletetask'] == 0)
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
     function getallcurrentlotteryinfonoofrows()
    {
        // $query =  $result = $this->db->get_where('lottery', array('status' => 'current'));
         
           // return $query;
        $this->db->select('lotto_group_name,loto_group.lottogroup_id,game_name,lottery_game.game_id, minbet,maxbet,drawing_type');
           
                             $this->db->from('lottery_announcement');
            $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            //$this->db->where('announcement_status','current');
            //$this->db->distinct();
              $query = $this->db->get('')->num_rows();
              //echo $this->db->last_query();

            
            return $query;
    }
     function getallcurrentlotteryinfo()
    {
        // $query =  $result = $this->db->get_where('lottery', array('status' => 'current'));
         
           // return $query;
        $sql ="SELECT lottery_announcement_detail_id as announcement_id, lotto_group_name, "
                . "loto_group.lottogroup_id, game_name, lottery_game.game_id, minbet, maxbet, "
                . "gameicon, drawing_type, dailytime, weeklytime, onetimedatetime, detail_date, "
                . "ampmtype FROM (lottery_announcement_detail) "
                . "JOIN lottery_announcement ON lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id"
                . " JOIN lottery_game ON lottery_announcement.game_id = lottery_game.game_id "
                . "JOIN loto_group ON loto_group.lottogroup_id = lottery_announcement.lottogroup_id "
                . "WHERE announcement_status = 'current' ORDER BY lotto_group_name asc, "
                . "FIELD(ampmtype, 'AM', 'PM')";
//        $this->db->select('lottery_announcement_detail_id as announcement_id,lotto_group_name,loto_group.lottogroup_id,game_name,lottery_game.game_id, minbet,maxbet,gameicon,drawing_type,dailytime,weeklytime,onetimedatetime,detail_date,ampmtype');
//           
//                             $this->db->from('lottery_announcement_detail');
//                              $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
//           
//                             $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
//           
//            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
//            $this->db->where('announcement_status','current');
//           // $this->db->group_by('lotto_group_name');
//            //$this->db->distinct();
//            $this->db->order_by("lotto_group_name", "asc");
//              //$this->db->order_by("lotto_group_name", "asc");
//              $query = $this->db->get('');
//              echo $this->db->last_query();
//              exit();
$query=$this->db->query($sql);
            
            return $query;
    }
    function getalllotterygamesforform() {
        // $this->db->select('*');

        $query = $this->db->get('lottery_game');


        return $query;
    }
     public function getallcombovaluelotterygame($partner_id, $lottogroupid) {
        
       $sql = "SELECT  *
FROM lottery_game join lotto_group_assignment on (lottery_game.game_id = lotto_group_assignment.game_id) where lottogroup_id =
" . $lottogroupid;
            $result = $this->db->query($sql);

            return $result->result_array();
    }

     public function getlotterygameinfobyid($lotterygameinfo_id) {

         $result = $this->db->get_where('lottery_game', array('game_id' => $lotterygameinfo_id));
            return $result->result_array();
    }
     public function updatelotterygameinfo($lotterygameinfo_id) {

   
            $allowedExts = array("gif", "jpeg", "jpg", "png");
             if ((int)$_SERVER['CONTENT_LENGTH'] < 500000){
                 if ($_FILES["lotterygamefile"]["name"]) {
                
                $temp = explode(".", $_FILES["lotterygamefile"]["name"]);
                $extension = end($temp);
   if ((($_FILES["lotterygamefile"]["type"] == "image/gif") || ($_FILES["lotterygamefile"]["type"] == "image/jpeg") || ($_FILES["lotterygamefile"]["type"] == "image/jpg") || ($_FILES["lotterygamefile"]["type"] == "image/pjpeg") || ($_FILES["lotterygamefile"]["type"] == "image/x-png") || ($_FILES["lotterygamefile"]["type"] == "image/png")) && in_array($extension, $allowedExts)) 
                {
                    if ($_FILES["lotterygamefile"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                        //echo json_encode(array('status' => 4, 'message' => $_FILES["file"]["error"])); 
                   
                    }
                     
                    else {
                        //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                        //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                        //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                        // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                        if (file_exists("lotterygameicons/" . $_FILES["lotterygamefile"]["name"])) {
                            echo $_FILES["lotterygamefile"]["name"] . " already exists. ";
                            //echo json_encode(array('status' => 2, 'message' => $_FILES["lotterygamefile"]["name"] . " already exists. ")); 
                      
                        } else {
                            move_uploaded_file($_FILES["lotterygamefile"]["tmp_name"], "lotterygameicons/" . $_FILES["lotterygamefile"]["name"]);
                            //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
$renamedfile=$this->input->post('lotterygamename').date('Y-m-d H.i.s').'.'.$extension;
 rename("./lotterygameicons/".$_FILES["lotterygamefile"]["name"], "./lotterygameicons/".$renamedfile);
                            $new_member_insert_data = array(
                                'game_name' => $this->input->post('lotterygamename'),
                                'description' => $this->input->post('lotterygamedescription'),
                                'gameicon' => $renamedfile,
                            );
                            $this->db->where('game_id', $lotterygameinfo_id);
                            $insert = $this->db->update('lottery_game', $new_member_insert_data);
                            if ($insert) {
                                //echo '1';
                                return 1;
//echo json_encode(array('status' => 3, 'message' => 'update successful'));  
                                //$this->load->view('userprofile');
                            }
                            $dir = "lotterygameicons";
                            $dirHandle = opendir($dir);
                            while ($file = readdir($dirHandle)) {
                                if ($file == $this->input->post('previousgameicon')) {
                                    if (unlink($dir . '/' . $file)) {
                                        //echo 'file successfully deleted';
                                    } else {
                                        // echo 'file could not be deleted';
                                    }
                                }
                            }

                            closedir($dirHandle);
                        }//if file doesnot exist
                    }
                } else {
                    echo "Invalid file";
                      //echo json_encode(array('status' => 5, 'message' => 'Invalid file')); 
                }
            } else {
                $new_member_insert_data = array(
                    'game_name' => $this->input->post('lotterygamename'),
                    'description' => $this->input->post('lotterygamedescription'),
                );
                $this->db->where('game_id', $lotterygameinfo_id);
                $insert = $this->db->update('lottery_game', $new_member_insert_data);
                if ($insert) {
                    //echo '1';
                  return 1;
                    //echo json_encode(array('status' => 3, 'message' => 'update successful'));  

                    //$this->load->view('userprofile');
                }
            }//if another file isnot selected
             }//if php length less than 500000
             else 
             {
                 echo '@the size of picture is too large';
                  //echo json_encode(array('status' => 6, 'message' => "the size of picture is too large "));  
                  
             }
            
        

        
    }
     public function deletelotterygame($lotterygame_id) {

       
            $dir = "lotterygameicons";
            $dirHandle = opendir($dir);
            while ($file = readdir($dirHandle)) {
                if ($file == $this->input->post('previousgameicon')) {
                    if (unlink($dir . '/' . $file)) {
                        //echo 'file successfully deleted';
                    } else {
                        // echo 'file could not be deleted';
                    }
                }
            }

            closedir($dirHandle);
            if ($this->db->delete('lottery_game', array('game_id' => $lotterygame_id)))
                return 1;
        
    }
     public function addlotterygameinfo($partner_id) {
       

            $allowedExts = array("gif", "jpeg", "jpg", "png");
             if ((int)$_SERVER['CONTENT_LENGTH'] < 500000){
            if ($_FILES["lotterygamefile1"]["name"]) {
                $temp = explode(".", $_FILES["lotterygamefile1"]["name"]);
                $extension = end($temp);

                if ((($_FILES["lotterygamefile1"]["type"] == "image/gif") || ($_FILES["lotterygamefile1"]["type"] == "image/jpeg") || ($_FILES["lotterygamefile1"]["type"] == "image/jpg") || ($_FILES["lotterygamefile1"]["type"] == "image/pjpeg") || ($_FILES["lotterygamefile1"]["type"] == "image/x-png") || ($_FILES["lotterygamefile1"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                    if ($_FILES["lotterygamefile1"]["error"] > 0) {
                        echo " " . $_FILES["file"]["error"] . "<br>";
                         //echo json_encode(array('status' => 4, 'message' => $_FILES["file"]["error"])); 
                     
                    }
                   
                    else {
                        //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                        //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                        //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                        // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                        if (file_exists("lotterygameicons/" . $_FILES["lotterygamefile1"]["name"])) {
                            echo $_FILES["lotterygamefile1"]["name"] . " already exists. ";
                           // echo json_encode(array('status' => 2, 'message' => $_FILES["lotterygamefile1"]["name"] . " already exists. ")); 
                        } else {
                            move_uploaded_file($_FILES["lotterygamefile1"]["tmp_name"], "lotterygameicons/" . $_FILES["lotterygamefile1"]["name"]);
                            //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
 $renamedfile=$this->input->post('lotterygamename1').date('Y-m-d H.i.s').'.'.$extension;
 rename("./lotterygameicons/".$_FILES["lotterygamefile1"]["name"], "./lotterygameicons/".$renamedfile);
                            $new_member_insert_data = array(
                                'game_name' => $this->input->post('lotterygamename1'),
                                'description' => $this->input->post('lotterygamedescription1'),
                                'gameicon' => $renamedfile,
                            );
                            $insert = $this->db->insert('lottery_game', $new_member_insert_data);

                            if ($insert) {
                                //echo '1';
                                return 1;
//echo json_encode(array('status' => 3, 'message' => 'add successful'));  
                                //$this->load->view('userprofile');
                            }
                        }//if file doesnot exist
                    }
                } else {
                    echo "Invalid file";
                    // echo json_encode(array('status' => 5, 'message' => 'Invalid file')); 
                }
            } else {
                echo "No file selected";
               // echo json_encode(array('status' => 1, 'message' => 'No file selected'));  
            }//if another file isnot selected
        }else {
            echo '@the size of picture is too large';
        }
       
    }
    
    
}