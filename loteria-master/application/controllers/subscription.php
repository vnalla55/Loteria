<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class subscription extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('subscription_model');
       
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
public function getsubscriberfordatatable(){
    $this->subscription_model->getallsubscriberlistfordatatable( $this->classkoadminmodulepermission);
   
}
public function getsubscriptionfordatatable(){
    $this->subscription_model->getallsubscriptionlistfordatatable( $this->classkoadminmodulepermission);
   
}
public function subscriber(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[16]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

            $users['pagetitle']= lang('lang_subscriber_page_title');       
                         
        $users['menuactiveornot']= 'promotion-promotion-subscriber';
     
          $this->loadadminview->loaderfirst('admin/subscriber', $users);
     
     }
     else 
     {
          //session_destroy();
        //  var_dump($_SESSION);
          redirect(base_url().'admin/dashboard');
       
     }
     
     }
     else {
        session_destroy();
          redirect(base_url().'admin'); 
     }
    
}
public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[15]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                           $users['pagetitle']= lang('lang_subscription_page_title');            
        $users['menuactiveornot']= 'promotion-promotion-subscription';
     
          $this->loadadminview->loaderfirst('admin/subscription', $users);
     
     }
     else 
     {
          //session_destroy();
         // var_dump($_SESSION);
         //redirect(base_url().'admin/dashboard');
       
     }
     
     }
     else {
        session_destroy();
          redirect(base_url().'admin'); 
     }
     
}
 public function editemailsubscription($emailsubscription_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     //$this->load->model('admin_model');
			$data['serology_details'] = $this->subscription_model->getemailsubscriptioninfobyid($emailsubscription_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'content_id' => $row['content_id'],
				'content_title' => $row['content_title'],
				'content' => $row['content'],
                            'subscription_status' => $row['subscription_status'],
                            'creation_date' => $row['creation_date'],
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         
          public function updateemailsubscription($emailsubscription_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->subscription_model->updateemailsubscriptioninfo($emailsubscription_id);
                         if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
         public function deletesubscriptioncontent($subscriptioncontent_id)
	{
      
                     //$this->load->model('admin_model');
                        $okornot=$this->subscription_model->deletesubscriptioncontentinfo($subscriptioncontent_id);
			if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
				
	}
         public function addemailsubscription()
	{
      
                     //$this->load->model('admin_model');
                     $okornot=$this->subscription_model->addemailsubscriptioninfo();
                     if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
                     
			
			
				
	}
         public function addsubscribeduser()
	{
      
                     $this->load->model('admin_model');
                     $email_available=$this->subscription_model->check_if_subscribedemail_exists( $this->input->post('subscribed_email'));
 if($email_available){
   echo 'emailexists';
 }
 else {
     $okornot=$this->subscription_model->addsubscribeduserinfo();  
    if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
 }
                        
			
			
				
	}
        
        
        
        function sendsubscription($content_id){
             //$this->load->model('admin_model');
                   $AdminEmail = $this->admin_model->getadminemail();
             $subscriptioncontent=$this->subscription_model->getcurrentsubscriptioncontent($content_id);

              $data['subscribeduserinfo']= $this->subscription_model->getallsubscribeduserinfo();
              $fromname=$this->admin_model->getadminname();
               $subject=$subscriptioncontent[0];
               $fromemail=$AdminEmail;
            foreach($data['subscribeduserinfo'] as $row)
			{
                       
                    //$mul[$ij][0]=$row['multipleforonepick'];
                 $subscribeduserid=$row['id'];
                // echo $subscribeduserid;
                 $subscribeduseremail=$row['subscribed_email'];
                  $to= $subscribeduseremail; 
                      $data = array(
          
                     'email_subscription_content'=>$subscriptioncontent[1],
                         'email_unsubscribe_link'=> base_url() . 'lottofront/unsubscribelottosubscription/' . $subscribeduserid
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/subscriptionemailtemplate', $data, TRUE);
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
              
          // $this->subscription_model->pushsubscriptionforcurrentemail($AdminEmail,$subscriptioncontent,$subscribeduserid,$subscribeduseremail);  
                    
                    }
           

        }
       
        
       
        

   
public function editsubscribeduser($subscribeduser_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['serology_details'] = $this->subscription_model->getsubscribeduserinfobyid($subscribeduser_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'id' => $row['id'],
				'subscribed_email' => $row['subscribed_email'],
				 'subscribed_status' => $row['subscribed_status'],
                            'subscribed_date' => $row['subscribed_date'],
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         public function updatesubscribeduser($subscribeduser_id)
	{
      
                     //$this->load->model('admin_model');
                        $okornot=$this->subscription_model->updatesubscribeduserinfo($subscribeduser_id);
                         if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
         public function deletesubscribeduser($subscribeduser_id)
	{
      
                   //  $this->load->model('admin_model');
                        $okornot=$this->subscription_model->deletesubscribeduserinfo($subscribeduser_id);
                        if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');

                       
			
			
				
	}
        
 
          }