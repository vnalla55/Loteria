<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class configuration extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('configuration_model');
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
public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[0]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                         $users['pagetitle']= lang('lang_configuration_page_title');                    
        $users['menuactiveornot']= 'cms-cms-configuration';
      
          $this->loadadminview->loaderfirst('admin/configuration', $users);
     
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
public function viewadminsetting()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                    $data['serology_details'] = $this->configuration_model->getadminsetting();
                   // print_r($data);
                                   
                     foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'admin_name' => $row['admin_name'],
				'admin_email' => $row['admin_email'],
                            'email_subject' => $row['email_subject'],
				'offline_data' => $row['offline_data'],	
                                'website_status' => $row['website_status'],
                               
                           
                               	);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         public function deleteadminsetting()
	{
      
                    
                        $this->configuration_model->deleteadminsettng();
			
			
				
	}
      public function saveadminsetting()
	{
      
                    
                        $okornot=$this->configuration_model->saveadminsetting();
                        if($okornot==1)
                            echo json_encode(array('status' => 0, 'message' => lang('lang_update_successmessage')));
                        else if($okornot==2)
                             echo json_encode(array('status' => 1, 'message' => lang('lang_add_successmessage')));
                        else 
                             echo json_encode(array('status' => 2, 'message' => lang('lang_error_message')));
			
			
				
	}
 
    

          }
