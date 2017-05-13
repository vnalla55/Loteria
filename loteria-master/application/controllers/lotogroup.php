<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lotogroup extends CI_Controller{
    public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('lotogroup_model');
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
public function getlotogroupfordatatable(){
    $this->lotogroup_model->getalllotogrouplistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[19]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                            $users['pagetitle']= lang('lang_lotto_group_page_title');                
        $users['menuactiveornot']= 'loteria-loteria-lotogroup';
       
          $this->loadadminview->loaderfirst('admin/lotogroup', $users);
     
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
 public function addlottogroup()
	{
      
                    // $this->load->model('admin_model');
                     $okornot=$this->lotogroup_model->addlottogroupinfo(); 
                     if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo '<br>'.lang('lang_error_message');
                     
			 //$this->admin_model->assignlotterygametolottogroup();
			
				
	}
public function updatelottogroup($lottogroup_id)
	{
      
                   //  $this->load->model('admin_model');
                        $okornot=$this->lotogroup_model->updatelottogroupinfo($lottogroup_id);
                         if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                          echo '<br>'.lang('lang_error_message');
                        
			
			
				
	}
         public function deletelottogroup($lottogroup_id)
	{
      
                     //$this->load->model('admin_model');
                       $okornot= $this->lotogroup_model->deletelottogroupinfo($lottogroup_id);
                       
if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');

			
			
				
	}
public function editlottogroup($lottogroup_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     //$this->load->model('admin_model');
			
                        $data['serology_details1'] = $this->lotogroup_model->getlotterygameinfobylottogroupid($lottogroup_id);
			if($data['serology_details1'])
                        {
                            $i=0;
                        foreach($data['serology_details1'] as $row)
			{
			
                       $serology_details1[$i]['id'] = $row['game_id'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                       
                         $serology_details1[0]['id'] = 0;
                        }
                        $data['serology_details'] = $this->lotogroup_model->getlottogroupinfobyid($lottogroup_id);
                        foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'lottogroup_id' => $row['lottogroup_id'],
				'lottogroupname' => $row['lotto_group_name'],
					'icon' => $row['icon'],		
				);
			}
			//echo json_encode($serology_details);
                        echo json_encode(array('status' =>1, 'message' =>$serology_details , 'messagelotterygame' =>$serology_details1 )); 
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}

 public function getallcombovaluelottogroup()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['serology_details'] = $this->lotogroup_model->getallcombovaluelottogroup($this->partner_id);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
                             $serology_details[$i]['name'] = $row['lotto_group_name'];
                       $serology_details[$i]['id'] = $row['lottogroup_id']; 
			
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO Lotto Group  Created .Please Create Lotto Group  first";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
          }