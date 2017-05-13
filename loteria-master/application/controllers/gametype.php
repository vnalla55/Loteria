<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class gametype extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('gametype_model');
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
public function getgametypefordatatable(){
    $this->gametype_model->getallgametypelistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[4]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           $users['pagetitle']= lang('lang_game_type_page_title');           
        $users['menuactiveornot']= 'loteria-loteria-gametype';
    
          $this->loadadminview->loaderfirst('admin/gametype', $users);
     
     }
     else 
     {
          //session_destroy();
          var_dump($_SESSION);
         // redirect(base_url().'admin/dashboard');
       
     }
     
     }
     else {
        session_destroy();
          redirect(base_url().'admin'); 
     }
     
}
 public function getallcombovalueforgametype()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     //$this->load->model('admin_model');
			$data['serology_details'] = $this->gametype_model->getallcombovalueforgametype($this->partner_id);
                        
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
			$serology_details[$i]['name'] = $row['gametype_name'];
                       $serology_details[$i]['id'] = $row['game_id'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO Game in database.Please add Game first";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
 
     public function addgametype()
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->gametype_model->addgametypeinfo();
                      if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
         public function deletegametype($gametype_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->gametype_model->deletegametype($gametype_id);
                        
 if($okornot==1)
                            echo lang('lang_delete_successmessage');
                        else 
                            echo lang('lang_error_message');
			
			
				
	}
         public function updategametype($gametype_id)
	{
      
                     //$this->load->model('admin_model');
                        $okornot=$this->gametype_model->updategametypeinfo($gametype_id);
			 if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
				
	}
         public function editgametype($gametype_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['serology_details'] = $this->gametype_model->getgametypeinfobyid($gametype_id);
			foreach($data['serology_details'] as $row)
			{
                            

			$serology_details = array
				(
				'game_id' => $row['game_id'],
				'gametype_name' => $row['gametype_name'],
				'no_of_picks' => $row['no_of_picks'],
                            				'multipleforonepick' => $row['multipleforonepick'],
				'multiplefortwopicks' => $row['multiplefortwopicks'],
				'multipleforthreepicks' => $row['multipleforthreepicks'],
				
				'multipleforfourpicks' => $row['multipleforfourpicks'],
                                'multipleforallpicks' => $row['multipleforallpicks'],


				
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
    

          }