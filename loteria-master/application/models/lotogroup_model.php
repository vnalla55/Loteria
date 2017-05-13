<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lotogroup_model extends CI_Model {
     function getalllotogrouplistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('lottogroup_id', 'lotto_group_name', 'icon');
        
        // DB table to use
        $sTable = 'loto_group';
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
                if($col=='icon')
                {
                    if($aRow[$col]){
                       $row[]=' <img style="width:75px;" title="'.$aRow[$col].'" alt="'.$aRow[$col].'" src="'.base_url().'lottogroupicon/'.$aRow[$col].'">';  
                       
 
                    }
                    else{
                        $row[]=$aRow[$col]; 
                    }
                    
                }else {
                  $row[] = $aRow[$col];  
                }
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#lotogroupedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Webpage"><i class="glyphicon glyphicon-edit" alt="'.$aRow['lottogroup_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#lotogroupdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['lottogroup_id'].'"></i></a>';
                if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          if($allpermissioninfo[19]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[19]['deletetask'] == 0)
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
     function getlotogroups()
    {
         $result = $this->db->get('loto_group');
        return $result;
    }
    public function getlottogroupinfobyid($lottogroup_id) {
        $result = $this->db->get_where('loto_group', array('lottogroup_id' => $lottogroup_id));
        return $result->result_array();
    }

     function getallcurrentlotogroupinfo()
    {
        // $query =  $result = $this->db->get_where('lottery', array('status' => 'current'));
         
           // return $query;
        $this->db->select('count(lotto_group_name) as noofgroup,lotto_group_name,loto_group.lottogroup_id,game_name,lottery_game.game_id, minbet,maxbet');
           
                             $this->db->from('lottery_announcement_detail');
                             $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
           
            $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->where('announcement_status','current');
            $this->db->group_by('lotto_group_name');
            //$this->db->distinct();
            $this->db->order_by("lotto_group_name", "asc");
              $query = $this->db->get('');
             // echo $this->db->last_query();

            
            return $query;
    }
     function getalllottogroupforform() {
        // $this->db->select('*');

        $query = $this->db->get('loto_group');


        return $query;
    }
    public function getlotterygameinfobylottogroupid($lottogroup_id) {
        $sql = "SELECT  game_id
FROM lotto_group_assignment
where lottogroup_id =
" . $lottogroup_id;

        $result = $this->db->query($sql);

        return $result->result_array();
    }
    public function deletelottogroupinfo($lottogroupinfo_id) {
        $dir = "lottogroupicon";
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
        if ($this->db->delete('loto_group', array('lottogroup_id' => $lottogroupinfo_id)))
            return 1;
    }
    
     public function addlottogroupinfo() {

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        if ($_FILES["lotterygroupfile1"]["name"]) {
            $temp = explode(".", $_FILES["lotterygroupfile1"]["name"]);
            $extension = end($temp);

            if ((($_FILES["lotterygroupfile1"]["type"] == "image/gif") || ($_FILES["lotterygroupfile1"]["type"] == "image/jpeg") || ($_FILES["lotterygroupfile1"]["type"] == "image/jpg") || ($_FILES["lotterygroupfile1"]["type"] == "image/pjpeg") || ($_FILES["lotterygroupfile1"]["type"] == "image/x-png") || ($_FILES["lotterygroupfile1"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                if ($_FILES["lotterygroupfile1"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } else {
                    //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                    // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                    if (file_exists("lottogroupicon/" . $_FILES["lotterygroupfile1"]["name"])) {
                        echo $_FILES["lotterygroupfile1"]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["lotterygroupfile1"]["tmp_name"], "lottogroupicon/" . $_FILES["lotterygroupfile1"]["name"]);
                        //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
$renamedfile=$this->input->post('lottogroupname1').date('Y-m-d H.i.s').'.'.$extension;
 rename("./lottogroupicon/".$_FILES["lotterygroupfile1"]["name"], "./lottogroupicon/".$renamedfile);
 
                        $new_member_insert_data = array(
                            'lotto_group_name' => $this->input->post('lottogroupname1'),
                            'icon' => $renamedfile,
                        );
                        $insert = $this->db->insert('loto_group', $new_member_insert_data);
                        if ($insert) {

                            $last_lotogroup_id = $this->db->insert_id();
                            $lottoall = $this->input->post('lottoall');
                            //print_r($lottoall);
                            foreach ($lottoall as $abc) {
                                // echo $a;
                                $data = array(
                                    'lottogroup_id' => $last_lotogroup_id,
                                    'game_id' => $abc,
                                );

                                $this->db->insert('lotto_group_assignment', $data);
                            }

                           return 1;
                           //echo 'successfully added';


                            //$this->load->view('userprofile');
                        }
                    }//if file doesnot exist
                }
            } else {
                echo "Invalid file";
                 
            }
        } else {
            echo "No file selected";
            
        }//if another file isnot selected
    }

   

    

    public function updatelottogroupinfo($lottogroupinfo_id) {



            $allowedExts = array("gif", "jpeg", "jpg", "png");
            if ($_FILES["lotterygroupfile"]["name"]) {
                $temp = explode(".", $_FILES["lotterygroupfile"]["name"]);
                $extension = end($temp);

                if ((($_FILES["lotterygroupfile"]["type"] == "image/gif") || ($_FILES["lotterygroupfile"]["type"] == "image/jpeg") || ($_FILES["lotterygroupfile"]["type"] == "image/jpg") || ($_FILES["lotterygroupfile"]["type"] == "image/pjpeg") || ($_FILES["lotterygroupfile"]["type"] == "image/x-png") || ($_FILES["lotterygroupfile"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                    if ($_FILES["lotterygroupfile"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                    } else {
                        //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                        //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                        //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                        // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                        if (file_exists("lottogroupicon/" . $_FILES["lotterygroupfile"]["name"])) {
                            echo $_FILES["lotterygroupfile"]["name"] . " already exists. ";
                        } else {
                             move_uploaded_file($_FILES["lotterygroupfile"]["tmp_name"], "lottogroupicon/" . $_FILES["lotterygroupfile"]["name"]);
                          
                               //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
$renamedfile=$this->input->post('lottogroupname').date('Y-m-d H.i.s').'.'.$extension;
 rename("./lottogroupicon/".$_FILES["lotterygroupfile"]["name"], "./lottogroupicon/".$renamedfile);
 
                            $new_member_insert_data = array(
                                'lotto_group_name' => $this->input->post('lottogroupname'),
                                'icon' => $renamedfile,
                            );
                            $this->db->where('lottogroup_id', $lottogroupinfo_id);
                            $insert = $this->db->update('loto_group', $new_member_insert_data);
                            if ($insert) {
                                $this->db->delete('lotto_group_assignment', array('lottogroup_id' => $lottogroupinfo_id));
                                //echo '1';
                                $last_lotogroup_id = $lottogroupinfo_id;
                                $lottoall = $this->input->post('lottoall');
                                //print_r($lottoall);
                                foreach ($lottoall as $abc) {
                                    // echo $a;
                                    $data = array(
                                        'lottogroup_id' => $last_lotogroup_id,
                                        'game_id' => $abc,
                                    );

                                    $this->db->insert('lotto_group_assignment', $data);
                                }
                                return 1;

                                //$this->load->view('userprofile');
                            }
                            $dir = "lottogroupicon";
                            $dirHandle = opendir($dir);
                            while ($file = readdir($dirHandle)) {
                                if ($file == $this->input->post('previouslottogroupicon')) {
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
                }
            } else {
                $new_member_insert_data = array(
                    'lotto_group_name' => $this->input->post('lottogroupname'),
                );
                $this->db->where('lottogroup_id', $lottogroupinfo_id);
                $insert = $this->db->update('loto_group', $new_member_insert_data);
                if ($insert) {
                    //echo '1';
                    $this->db->delete('lotto_group_assignment', array('lottogroup_id' => $lottogroupinfo_id));
                    //echo '1';
                    $last_lotogroup_id = $lottogroupinfo_id;
                    $lottoall = $this->input->post('lottoall');
                    //print_r($lottoall);
                    foreach ($lottoall as $abc) {
                        // echo $a;
                        $data = array(
                            'lottogroup_id' => $last_lotogroup_id,
                            'game_id' => $abc,
                        );

                        $this->db->insert('lotto_group_assignment', $data);
                    }
                    //echo 'update successful';
                     return 1;
                    

                    //$this->load->view('userprofile');
                }
            }//if another file isnot selected
       
    }

     function getlotterygroup() {
        try {
            $num_rows = $this->db->get('loto_group')->num_rows();


            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 9;

            // How many pages will there be
            $pages = ceil($total / $limit);


            // What page are we currently on?

            $page = $_POST['page'];
            //$page=2;
            // Calculate the offset for the query
            $offset = ($page - 1) * $limit;



            // Some information to display to the user
            $start = $offset + 1;
            $end = min(($offset + $limit), $total);

            // The "back" link
            $prevlink = ($page > 1) ? '<a href="javascript:getlotterygroupdiv(1)" title="First page">&laquo;</a> <a href="javascript:getlotterygroupdiv(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getlotterygroupdiv(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:getlotterygroupdiv(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;
            //$this->db->get('subscription_content', $limit, $offset);
            // $this->db->order_by("subscribed_date", "desc");
            $query = $this->db->get('loto_group', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

   public function getallcombovaluelottogroup($partner_id) {
     $sql = "SELECT  *
FROM loto_group
";
            $result = $this->db->query($sql);

            return $result->result_array();
    }
  
}