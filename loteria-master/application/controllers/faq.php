<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class faq extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('faq_model');
       
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
public function getfaqfordatatable(){
    $this->faq_model->getallfaqlistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[12]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_faq_page_title');             
        $users['menuactiveornot']= 'cms-cms-faq';
       
          $this->loadadminview->loaderfirst('admin/faq', $users);
 
     
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

    public function editfaq($faq_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
			$data['serology_details'] = $this->faq_model->getfaqinfobyid($faq_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'q_id' => $row['q_id'],
				'question' => $row['question'],
				'answer' => $row['answer'],
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        
    public function updatefaq($faq_id)
	{
      
                   
                        $okornot=$this->faq_model->updatefaqinfo($faq_id);
			
  if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
				
	}
         public function deletefaq($faq_id)
	{
      
                   //  $this->load->model('admin_model');
                        $okornot=$this->faq_model->deletefaq($faq_id);
                        if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
     public function addfaq()
	{
      
                     
                     $okornot=$this->faq_model->addfaqinfo();
                     if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
                      
			
			
				
	}
     
    
     

          }
