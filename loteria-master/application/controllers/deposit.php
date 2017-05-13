<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class deposit extends Authentication{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('deposit_model');
       
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
public function getdepositfordatatable(){
    $this->deposit_model->getalldepositlistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[10]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

            $users['pagetitle']= lang('lang_deposit_page_title');                 
        $users['menuactiveornot']= 'accounting-accounting-deposit';
       
          $this->loadadminview->loaderfirst('admin/deposit', $users);
 
     
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

      public function adddeposit()
	{
      
                     $this->load->model('user_model');
                     $superadminorotheradmin='';
                     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          $superadminorotheradmin= $_SESSION['lottobackendusername'];
   

}
                     $okornot=$this->deposit_model->adddepositinfo($superadminorotheradmin);
                     if($okornot==1){
                        $this->user_model->addbalanceofuserdeposit($this->input->post('deposit_amount'),$this->input->post('depositer_id'));
		$fromemail=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                $to = $this->user_model->getuseremailbyuserid($this->input->post('depositer_id'));
                $username=$this->user_model->getusernamebyuserid($this->input->post('depositer_id'));
               // $subject='Deposit';
               // $content= 'Hello '  .$username.'!!<br> '.$fromname.' has deposited RD '.$this->input->post('deposit_amount'). '. in your account. Please login with your account to make sure.';
                   $subject=lang('lang_deposit_sucess_email_subject');
                 $data = array(
            'email_username' => $username,
            'email_deposit_amount' => $this->input->post('deposit_amount'),
                          'email_system_admin_name' => $fromname
                         
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/depositemailtemplate', $data, TRUE);
                        send_the_email($subject,$to,$fromemail,$fromname,$content,'none'); 
                        echo lang('lang_add_successmessage');
                     
                     }
                    else
                         echo lang('lang_error_message');
			
                        
				
	}
        
       
        public function editdeposit($deposit_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('user_model');
                    $data['serology_details'] = $this->deposit_model->getdepositinfobyid($deposit_id);
                   // print_r($data);
                    $userkolist['user_details']=$this->user_model->getallcombovalueforwinnerforedit();
                 
		 //print_r($userkolist);
                    $checkuserid="";
                     foreach($data['serology_details'] as $row)
			{
                         $checkuserid= $row['depositer_id'];
			 
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
				'diposit_id' => $row['diposit_id'],
				'depositer_id' => $row['depositer_id'],
				'deposit_amount' => $row['deposit_amount'],
                            'gateway_name' => $row['gateway_name'],
                            'transaction_id' => $row['transaction_id'],
                                'diposit_date' => $row['diposit_date'],
                                'userindex'=>$i,
                           
                               	);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        public function deletedeposit($deposit_id)
	{
      
                    
                        $okornot=$this->deposit_model->deletedeposit($deposit_id);
                        if($okornot==1)
                            echo lang('lang_delete_successmessage');
                        else 
                            echo lang('lang_error_message');

			
			
				
	}
         
        function approvedisapprovedepositrequestofuser($deposit_id_plusadflag){
            
                    
              $this->load->model('user_model');
                     $deposit_id_forpartnerplusadflagarray=explode('-',$deposit_id_plusadflag);
                     $this->deposit_model->changethedepositstatusindeposittable($deposit_id_forpartnerplusadflagarray[0],$deposit_id_forpartnerplusadflagarray[1]);
       $email_deposit_date=  $this->deposit_model->getdepositdateforemail($deposit_id_forpartnerplusadflagarray[0]);
                     $this->user_model->addtouserfordepositapproval($deposit_id_forpartnerplusadflagarray[0]);
       $to  = $this->user_model->getuseremailbyuserid($deposit_id_forpartnerplusadflagarray[3]); 
               
                $fromname=$this->admin_model->getadminname();
                
                $fromemail=$this->admin_model->getadminemail();
               
                $username=$this->user_model->getusernamebyuserid($deposit_id_forpartnerplusadflagarray[3]);
                $subject=lang('lang_deposit_approval_disapproval_email_subject');
                 $emailcontent = '';
       $depositsuccessflag=$deposit_id_forpartnerplusadflagarray[1];
                 if ($depositsuccessflag == 1)
            $emailcontent= lang('lang_deposit_approval_email_content1');
        else
            $emailcontent=lang('lang_deposit_disapproval_email_content1');
           $subject=lang('lang_deposit_approval_disapproval_email_subject');
                 $data = array(
            'email_username' => $username,
            'email_deposit_date' => $email_deposit_date,
                     'email_deposit_amount'=>$deposit_id_forpartnerplusadflagarray[2],
                         'email_approved_or_disapproved_message'=>$emailcontent
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/depositapprovaldisapprovalemailtemplate', $data, TRUE);
//$content=$emailcontent;
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
                    // $this->user_model->sendemailtonotifyuserofdepositstatus($deposit_id_forpartnerplusadflagarray[3],$deposit_id_forpartnerplusadflagarray[1],$deposit_id_forpartnerplusadflagarray[2]);
                   if($deposit_id_forpartnerplusadflagarray[1]==1)
                     echo lang('lang_deposit_approval_success_message');
                   else
                       echo lang('lang_deposit_disapproval_success_message');
                       
                   
        }
        
         public function updatedeposit($deposit_id)
	{
      
                    $superadminorotheradmin='';
                      if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          $superadminorotheradmin= $_SESSION['lottobackendusername'];
   

}
                      $okornot= $this->deposit_model->updatedepositinfo($deposit_id,$superadminorotheradmin);
                        
  if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
 

          }