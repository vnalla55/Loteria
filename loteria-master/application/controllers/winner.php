<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class winner extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('winner_model');
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
public function getwinnerfordatatable(){
    $this->winner_model->getallwinnerlistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[7]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_winner_page_title');            
        $users['menuactiveornot']= 'historialdejugadas-historialdejugadas-winner';
    
          $this->loadadminview->loaderfirst('admin/winner', $users);
     
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
 public function addwinner()
	{
      
                    // $this->load->model('admin_model');
                     $okornot=$this->winner_model->addwinnerinfo($this->partner_id);
                     if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
                     
			
			
				
	}
         public function editwinner($winner_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                   
			$data['serology_details'] = $this->winner_model->getwinnerinfobyid($winner_id);
                              $checkuserid=""; $checklotteryid="";
                     
                   
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'winning_id' => $row['winning_id'],
				
				'winning_date' => $row['winning_date'],	
                                'winner_id' => $row['winner_id'],
                                'winning_amt' => $row['winning_amt'],
                             'ampmspecifier' => $row['ampmspecifier'],
                            
                               	);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         public function updatewinner($winner_id)
	{
      
                     //$this->load->model('admin_model');
                        $okornot= $this->winner_model->updatewinnerinfo($winner_id);
                         if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
         public function deletewinner($winner_id)
	{
      
                   //  $this->load->model('admin_model');
                        $okornot=$this->winner_model->deletewinner($winner_id);
                       
			
			if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
				
	}
 
 

          }