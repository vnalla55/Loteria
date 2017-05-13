<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('user_model');
       
       // var_dump($_SESSION);
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
public function getuserfordatatable(){
    $this->user_model->getalluserlistfordatatable( $this->classkoadminmodulepermission);
   // json_encode($result);
}
public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
            if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[3]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }
    
                                           
                           
             $users['pagetitle']= lang('lang_member_page_title');                  
        $users['menuactiveornot']= 'members-members-members';
       
          $this->loadadminview->loaderfirst('admin/user', $users);
     
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
   public function getallcombovalueforwinnerforedit()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    
			$data['serology_details'] = $this->user_model->getallcombovalueforwinnerforedit();
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
			$serology_details[$i]['name'] = $row['email'];
                       $serology_details[$i]['id'] = $row['user_id'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO User in database.Please add User first";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        public function edituser($user_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('admin_model');
			$data['serology_details'] = $this->user_model->getuserinfobyid($user_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'user_id' => $row['user_id'],
				'username' => $row['username'],
				'name' => $row['name'],
				'gender' => $row['gender'],
				'email' => $row['email'],
				'password' => $row['password'],
				'lastname' => $row['lastname'],
                            'phone' => $row['phone'],
                          'residenceaddress' => $row['residenceaddress'],
                            'postalcode' => $row['postalcode'],
                            'country' => $row['country'],
                            'wallet_balance' => $row['wallet_balance'],
                            'bonus_balance' => $row['bonus_balance']


				
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}

 public function deleteuser($user_id)
	{
      
                   
                       $okornot= $this->user_model->deleteuserinfo($user_id);
                        
if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
  public function updateuser($user_id)
	{
         $this->load->model('admin_model');
 $email_available=$this->user_model->check_if_other_email_existsforcustomer();
 $username_available= $this->user_model->check_if_other_username_existsforcustomer();
 if(!$email_available){
     echo json_encode(array('status' => 1, 'message' => 'email already exists'));
     
 }
 else if(!$username_available)
 {
       echo json_encode(array('status' => 2, 'message' => 'username already exists'));
   
 }
 else{
 
                        $okornot=$this->user_model->updateuserinfo($user_id);
                          if($okornot==1)
                       echo json_encode(array('status' => 3, 'message' => lang('lang_update_successmessage')));
                     
                     else
                         echo json_encode(array('status' => 4, 'message' => lang('lang_error_message')));
                     
                       
                        
                         //echo json_encode(array('status' => 2, 'message' => 'username already exists'));
     
 }
      
                     
			
			
				
	}
        
 public function adduser()
	{
             $this->load->model('non_adminmodel');
 $email_available=$this->user_model->check_if_email_exists();
 $user_available=$this->user_model->check_if_username_exists();
 if($email_available){
     echo json_encode(array('status' => 1, 'message' => 'email already exists'));
     
 }
 else if($user_available){
    echo json_encode(array('status' => 2, 'message' => 'username already exists'));  
 }
 else{
  //$this->load->model('admin_model');
   $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'residenceaddress' => $this->input->post('residenceaddress'),
            'postalcode' => $this->input->post('postalcode'),
            'country' => $this->input->post('country'),
            'wallet_balance' => $this->input->post('wallet_balance'),
            'bonus_balance' => $this->input->post('bonus_balance')
        );
  

                           $okornot=$this->user_model->adduserinfo($new_member_insert_data);  
                      if($okornot==1){
                          $to= $this->input->post('email'); 
              
                $fromname=$this->admin_model->getadminname();
              
                $fromemail=$this->admin_model->getadminemail();
                
                  $subject=lang('lang_user_registration_success_email_subject');
              $this->load->library('parser'); 

 $data = array(
            'email_username' => $this->input->post('username'),
            
                     'email_password'=>$this->input->post('password'),
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/userregistrationsuccessemailtemplate', $data, TRUE);
              
          
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');
                        
                       echo json_encode(array('status' => 3, 'message' => lang('lang_add_successmessage')));
                       
                        
                  
                      }
                      
                     else
                     {
                         echo json_encode(array('status' => 4, 'message' => lang('lang_error_message')));  
                     }
                         
                       
}
      
                    
			
			
				
	}
 

                          }