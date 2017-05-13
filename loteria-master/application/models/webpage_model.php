<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class webpage_model extends CI_Model{
    
     function getallwebpagelistfordatatable($allpermissioninfo) {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('page_id', 'page_name', 'alias', 'meta_name', 'meta_description', 'page_content', 'published_status','language');
        
        // DB table to use
        $sTable = 'cms';
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
                if($col=='page_content')
                {
                    if(strlen(strip_tags($aRow[$col]))>35)
                        $row[]=substr($aRow[$col], 0,35).'...';
                    else 
                        $row[]=substr($aRow[$col], 0,35);
                   
                    
                }
                else 
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#webpageedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Webpage"><i class="glyphicon glyphicon-edit" alt="'.$aRow['page_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#webpagedelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['page_id'].'"></i></a>';
             if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[1]['updatetask'] == 0)
    $updatelink='<i class="glyphicon glyphicon-edit"></i>';
               if($allpermissioninfo[1]['deletetask'] == 0)
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
    public function getcmsinfobyid($cmsinfo_id) {
        $result = $this->db->get_where('cms', array('page_id' => $cmsinfo_id));
        return $result->result_array();
    }
     public function deletecms($cms_id) {
        if ($this->db->delete('cms', array('page_id' => $cms_id)))
            return 1;
    }

public function updatecmsinfo($cmsinfo_id) {


        $new_member_insert_data = array(
            'page_name' => $this->input->post('page_name'),
            'meta_name' => $this->input->post('meta_name'),
            'meta_description' => $this->input->post('meta_description'),
            'page_content' => $this->input->post('page_content'),
            'published_status' => $this->input->post('published_status'),
             'language' => $this->input->post('language'),
            'alias' => $this->input->post('alias'),
        );
        $this->db->where('page_id', $cmsinfo_id);
        $insert = $this->db->update('cms', $new_member_insert_data);
        if ($insert) {
            return 1;


            //$this->load->view('userprofile');
        }
    }

  
        public function addcmsinfo() {

        $new_member_insert_data = array(
            'page_name' => $this->input->post('page_name'),
            'meta_name' => $this->input->post('meta_name'),
            'meta_description' => $this->input->post('meta_description'),
            'page_content' => $this->input->post('page_content'),
            'published_status' => $this->input->post('published_status'),
            'language' => $this->input->post('language'),
            'alias' => $this->input->post('alias'),
        );

        $insert = $this->db->insert('cms', $new_member_insert_data);
        if ($insert) {
           return 1;
        }
    }
    
    
     function getallpages() {


        try {
            $num_rows = $this->db->get('cms')->num_rows();


            // Find out how many items are in the table
            $total = $num_rows;

            // How many items to list per page
            $limit = 10;

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
            $prevlink = ($page > 1) ? '<a href="javascript:getallpages(1)" title="First page">&laquo;</a> <a href="javascript:getallpages(' . ($page - 1) . ')" title="Previous page" data-ajax="ajax">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

            // The "forward" link
            $nextlink = ($page < $pages) ? '<a  href="javascript:getallpages(' . ($page + 1) . ')" title="Next page">&rsaquo;</a> <a  href="javascript:getallpages(' . $pages . ')" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

            // Display the paging information
            echo '<span id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></span>';



            // $this->db->select('*');
            //$this->db->from('user');
            //$query = $this->db->get();
            //return $query;

            $query = $this->db->get('cms', $limit, $offset);
            return $query;
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

}