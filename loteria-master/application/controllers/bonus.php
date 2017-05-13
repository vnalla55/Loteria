<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bonus extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('bonus_model');
       
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
public function getbonusfordatatable(){
    $this->bonus_model->getallbonuslistfordatatable( $this->classkoadminmodulepermission);
   
}
public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[11]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

            $users['pagetitle']= lang('lang_bonus_page_title');                 
        $users['menuactiveornot']= 'accounting-accounting-bonus';
       
          $this->loadadminview->loaderfirst('admin/bonus', $users);
     
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

     public function addbonus()
	{
      
                    
                     $okornot=$this->bonus_model->addbonusinfo();
                     if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
 
                     
			
			
				
	}
    public function deletebonus($bonus_id)
	{
      
                    
                        $okornot=$this->bonus_model->deletebonus($bonus_id);
                         if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
    public function updatebonus($bonus_id)
	{
      
                    
                       $okornot= $this->bonus_model->updatebonusinfo($bonus_id);
                        if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
     public function editbonus($bonus_id)
	{
         $this->load->model('user_model');
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('admin_model');
                    $data['serology_details'] = $this->bonus_model->getbonusinfobyid($bonus_id);
                   // print_r($data);
                    $userkolist['user_details']=$this->user_model->getallcombovalueforwinnerforedit();
                 
		 //print_r($userkolist);
                    $checkuserid="";
                     foreach($data['serology_details'] as $row)
			{
                         $checkuserid= $row['beneficiary_id'];
			 
			}
                        $i=0;
                        foreach($userkolist['user_details'] as $row)
			{
                            if($row['user_id']==$checkuserid)
                                break;
                            
			$i++;
			}
                       
                     
                       
                   
                     foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'bonus_id' => $row['bonus_id'],
				'beneficiary_id' => $row['beneficiary_id'],
				'bonus_amount' => $row['bonus_amount'],	
                                'bonus_date' => $row['bonus_date'],
                                'userindex'=>$i,
                           
                               	);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        
     
   

          }
