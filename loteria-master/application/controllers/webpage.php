<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class webpage extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('webpage_model');
       
$this->load->library('loadadminview');
                   
                     $this->load->model('admin_model');
          if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            //the role associated with the otheradmin
//echo 'constructor';
            $admin_id = $this->admin_model->getotheradminid($_SESSION['lottobackendusername']);
            $this->classkoadminmodulepermission = $this->admin_model->getadminmodulepermission($admin_id);
      
            }
     }
        
}
public function getwebpagefordatatable(){
    $this->webpage_model->getallwebpagelistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[1]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_webpage_page_title');                
        $users['menuactiveornot']= 'cms-cms-webpage';
      
          $this->loadadminview->loaderfirst('admin/webpage', $users);
     
     }
     else 
     {
          //session_destroy();
          //var_dump($_SESSION);
         redirect(base_url().'admin/dashboard');
       
     }
     
     }
     else {
        session_destroy();
          redirect(base_url().'admin'); 
     }
     
}

         public function editcms($cms_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
			$data['serology_details'] = $this->webpage_model->getcmsinfobyid($cms_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'page_id' => $row['page_id'],
				'page_name' => $row['page_name'],
				'meta_name' => $row['meta_name'],
				'meta_description' => $row['meta_description'],
				'page_content' => $row['page_content'],
				'published_status' => $row['published_status'],
                            'language' => $row['language'],
                            'alias' => $row['alias'],
							
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
     public function updatecms($cms_id)
	{
      
                   
                        $okornot=$this->webpage_model->updatecmsinfo($cms_id);
                          if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
          public function deletecms($cms_id)
	{
      
                     //$this->load->model('admin_model');
                     $okornot=   $this->webpage_model->deletecms($cms_id);
                     if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
      public function addcms()
	{
      
                    // $this->load->model('admin_model');
                    $okornot=  $this->webpage_model->addcmsinfo();
                    if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
                    
			
			
				
	}
        
 
    

          }
