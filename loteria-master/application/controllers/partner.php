<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class partner extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('partner_model');
         $this->load->model('admin_model');
         $this->load->library('loadadminview');
       
        if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            //the role associated with the otheradmin
//echo 'constructor';
            $admin_id = $this->admin_model->getotheradminid($_SESSION['lottobackendusername']);
            $this->classkoadminmodulepermission = $this->admin_model->getadminmodulepermission($admin_id);
      
            }
            else if($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner'){
                 $this->partner_id = $this->partner_model->getbusinesspartnerid($_SESSION['lottobackendusername']); 
            }
     }
        
    }
    public function getpartnerfordatatable(){
        
    $this->partner_model->getallpartnerlistfordatatable( $this->classkoadminmodulepermission);
  
    }
   public function index(){
        if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[17]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_partner_page_title');                
        $users['menuactiveornot']= 'partner-partner-partner';
     
          $this->loadadminview->loaderfirst('admin/partner', $users);
     
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
    public function getallcombovalueforbusinesspartnerlist()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('admin_model');
                     
			$data['serology_details'] = $this->admin_model->getallcombovaluebusinesspartner();
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
			$serology_details[$i]['name'] = $row['partner_name'];
                       $serology_details[$i]['id'] = $row['id'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO partners Created .Please Create partner first";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
    public function editbusinesspartner($businesspartner_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    
			$data['serology_details'] = $this->partner_model->getbusinesspartnerinfobyid($businesspartner_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'id' => $row['id'],
				'name' => $row['partner_name'],
                            'username' => $row['username'],
				
                            'password' => $row['password'],
				'email' => $row['email'],
                            'address' => $row['address'],
				'country' => $row['country'],
                            'phoneno' => $row['phoneno'],
				'postalcode' => $row['postalcode'],
				'partner_icon' => $row['partner_icon'],			
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
    
    
        
        
      public function addbusinesspartner()
	{
           
                        
                    
       $this->load->model('admin_model');
       
              $user_available=$this->admin_model->check_if_username_exists();
                $this->load->model('superadmin_model');
       $user_available1=$this->superadmin_model->check_if_username_exists_in_superadmintable();
     //$user_available2=$this->admin_model->check_if_username_exists_in_partnertable();
     // $user_available3=$this->admin_model->check_if_username_exists_in_subpartnertable();
 $user_available4=$this->partner_model->check_if_username_exists_in_businesspartnertable();
       if($user_available||$user_available1||$user_available4){
        echo 'notpossible';  
        }
        else {
          
              $okornot=$this->partner_model->addbusinesspartnerinfo();
              if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
              
        }       
      
			
			
				
	}
    public function search_businesspartner()
	{
           // echo $key;
            
	$this->partner_model->search_businesspartner();
	}
         public function deletebusinesspartner($partner_id)
	{
      
                     
                          $okornot=$this->partner_model->deletebusinesspartnerinfo($partner_id);
                          if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                          echo '<br>'.lang('lang_error_message');
			
			
				
	}
         public function updatebusinesspartner($partner_id)
	{
           
                        
                    
         
             $sessmarakhneadminusername=$this->partner_model->getbusinesspartnerusernamebyid($partner_id);
              
              $_SESSION['businesspartnerflag']=$sessmarakhneadminusername;
               $flaggo=1;
               $this->load->model('admin_model');
               $user_available4=$this->admin_model->check_if_username_exists(); 
  if($user_available4)
      $flaggo=0;
  
                
         
 $this->load->model('superadmin_model');
$user_available1=$this->superadmin_model->check_if_username_exists_in_superadmintable();
if($user_available1)
      $flaggo=0;
     $user_available5=$this->partner_model->check_if_other_username_exists_in_businesspartnertable();
if(!$user_available5)
      $flaggo=0;
      
 if($flaggo==0)
 {
echo 'notpossible';    
 }
 else 
 {
     
     
      
       $okornot=$this->partner_model->updatebusinesspartnerinfo($partner_id);
       if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo '<br>'.lang('lang_error_message');

        
    
 }
      
                    
                       
		
			
				
	}
}
