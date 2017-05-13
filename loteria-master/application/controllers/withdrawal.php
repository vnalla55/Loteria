<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class withdrawal extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('withdrawal_model');
       

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
public function getwithdrawalfordatatable(){
    $this->withdrawal_model->getallwithdrawallistfordatatable( $this->classkoadminmodulepermission);
   
}
public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[9]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                                       
               $users['pagetitle']= lang('lang_withdrawal_page_title');            
        $users['menuactiveornot']= 'accounting-accounting-withdrawal';
       
          $this->loadadminview->loaderfirst('admin/withdrawal', $users);
     
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
public function editwithdrawal($withdrawal_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                    $data['serology_details'] = $this->withdrawal_model->getwithdrawalinfobyid($withdrawal_id);
                   // print_r($data);
                     $this->load->model('user_model');
                    $userkolist['user_details']=$this->user_model->getallcombovalueforwinnerforedit();
                 
		 //print_r($userkolist);
                    $checkuserid="";
                     foreach($data['serology_details'] as $row)
			{
                         $checkuserid= $row['withdrawer_id'];
			 
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
				'withdrawal_id' => $row['withdrawal_id'],
				'withdrawer_id' => $row['withdrawer_id'],
				'withdraw_amount' => $row['withdraw_amount'],	
                                'withdraw_date' => $row['withdraw_date'],
                                'userindex'=>$i,
                           
                               	);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         public function deletewithdrawal($withdrawal_id)
	{
      
                   //  $this->load->model('admin_model');
                        $okornot=$this->withdrawal_model->deletewithdrawal($withdrawal_id);
                        if($okornot==1)
                            echo lang('lang_delete_successmessage');
                        else 
                            echo lang('lang_error_message');

			
			
				
	}
         public function addwithdrawal()
	{
       $this->load->model('user_model');
                    
                     $okornot=$this->withdrawal_model->addwithdrawalinfo();
                     if($okornot==1){
                      
                       $this->user_model->deductbalanceofuserdeposit($this->input->post('withdraw_amount'),$this->input->post('withdrawer_id'));
			 echo lang('lang_add_successmessage'); 
                     }
                       
                     else
                         echo lang('lang_error_message');
			
			 
	}
      
        public function updatewithdrawal($withdrawal_id)
	{
      
                     //$this->load->model('admin_model');
                      $okornot=  $this->withdrawal_model->updatewithdrawalinfo($withdrawal_id);
                         if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
  function approvedisapprovewithdrawalrequestofuser($withdrawal_id_plusadflag){
             
                     //$approvalflag= $this->admin_model->getapprovalstatusbybethistoryid($bethistory_id);
                     
                   //  if($approvalflag==1)
                        // $approvalflag=0;
                    // else 
                         //$approvalflag=1;
                     $withdrawal_id_forpartnerplusadflagarray=explode('-',$withdrawal_id_plusadflag);
                     $this->withdrawal_model->changethewithdrawalstatusinwithdrawaltable($withdrawal_id_forpartnerplusadflagarray[0],$withdrawal_id_forpartnerplusadflagarray[1]);
       $this->load->model('user_model');
                     $this->user_model->deductfromuserforwithdrawapproval($withdrawal_id_forpartnerplusadflagarray[0]);
                    
                $fromname=$this->admin_model->getadminname();
               
                $fromemail=$this->admin_model->getadminemail();
                  $row=$this->withdrawal_model->getuseremailandotherdetailswithwithdrawalid($withdrawal_id_forpartnerplusadflagarray[0]);
                $to  = $row->useremail;   
                $withdrawstatus=$withdrawal_id_forpartnerplusadflagarray[1];
        $emailcontent = '';
                  if ($withdrawstatus == 1)
           $emailcontent=lang('lang_withdrawal_approval_email_content1');
                      else
           $emailcontent=lang('lang_withdrawal_disapproval_email_content1');


      $subject=lang('lang_withdrawal_approval_disapproval_email_subject');
                
       
        
                 $data = array(
            'email_username' => $row->username,
            'email_withdrawal_date' => $row->withdraw_date,
                     'email_withdrawal_amount'=>$row->withdraw_amount,
                         'email_approved_or_disapproved_message'=>$emailcontent
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/withdrawalapprovaldisapprovalemailtemplate', $data, TRUE);

                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none'); 
                   //  $this->user_model->sendemailtonotifyuserofwithdrwalstatus($withdrawal_id_forpartnerplusadflagarray[0],$withdrawal_id_forpartnerplusadflagarray[1]);
                   if($withdrawal_id_forpartnerplusadflagarray[1]==1)
                     echo lang('lang_withdrawal_approval_success_message');
                   else
                      echo lang('lang_withdrawal_disapproval_success_message');
                       
                   
        }

}