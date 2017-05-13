<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class result extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('result_model');
       
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
public function getresultfordatatable(){
    $this->result_model->getallresultlistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[6]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

            $users['pagetitle']= lang('lang_result_page_title');            
        $users['menuactiveornot']= 'historialdejugadas-historialdejugadas-result';
       
          $this->loadadminview->loaderfirst('admin/result', $users);
     
     }
     else 
     {
          //session_destroy();
         // var_dump($_SESSION);
         redirect(base_url().'admin/dashboard');
       
     }
     
     }
     else {
        session_destroy();
          redirect(base_url().'admin'); 
     }
    
}
  public function addresult()
	{
            $okornot=$this->result_model->addresultinfo($this->partner_id);
            if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');

                                    
			
			
				
	}
 public function deleteresult($result_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot= $this->result_model->deleteresult($result_id);
                        if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}

 public function updateresult($result_id)
	{
      
                    // $this->load->model('admin_model');
                          $okornot=$this->result_model->updateresultinfo($result_id);
                          if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');

			
			
				
	}
 public function editresult($result_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     //$this->load->model('admin_model');
			$data['serology_details'] = $this->result_model->getresultinfobyid($result_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				
				'lotto_group_name' => $row['lotto_group_name'],
				'game_name' => $row['game_name'],
                            'result_date' => $row['result_date'],
                                'result_slot1' => $row['result_slot1'],	
                             'result_slot2' => $row['result_slot2'],	
                             'result_slot3' => $row['result_slot3'],	
                             'result_slot4' => $row['result_slot4'],	
                             'result_slot5' => $row['result_slot5'],	
                            'ampmspecifier' => $row['ampmspecifier'],
                            
                               	);
			}
			echo json_encode($serology_details);
		}

	}
       
         
 
   
    
  
}

