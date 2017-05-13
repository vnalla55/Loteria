<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lotterygame extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('lotterygame_model');
       
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
public function getlotterygamefordatatable(){
    $this->lotterygame_model->getalllotterygamelistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[18]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           $users['pagetitle']= lang('lang_lottery_game_page_title');                 
        $users['menuactiveornot']= 'loteria-loteria-lotterygame';
       
          $this->loadadminview->loaderfirst('admin/lotterygame', $users);
     
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
public function fetchlotterygames($addoredit){
       $users['lotterygames']=$this->lotterygame_model->getalllotterygamesforform();
       if($addoredit=='add')
       $this->load->view('admin/helperlotterygameaddform',$users);
       else 
           $this->load->view('admin/helperlotterygameeditform',$users);
           
}
public function getallcombovaluelotterygame($lottogroupid)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['serology_details'] = $this->lotterygame_model->getallcombovaluelotterygame($this->partner_id,$lottogroupid);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
                           $serology_details[$i]['name'] = $row['game_name'];
                       $serology_details[$i]['id'] = $row['game_id'];
			
                                    $i++;
			}
			
                        }
                        else 
                        {
                        //$serology_details[0]['name'] = "NO Lotto Group  Created .Please Create Lotto Group  first";
                       //  $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
public function editlotterygame($lottery_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     //$this->load->model('admin_model');
			$data['serology_details'] = $this->lotterygame_model->getlotterygameinfobyid($lottery_id);
			foreach($data['serology_details'] as $row)
			{
                          $serology_details = array
				(
				'game_id' => $row['game_id'],
				'game_name' => $row['game_name'],
				'description' => $row['description'],				
                                'gameicon' => $row['gameicon'],	
                           
                            	
                                    	

				
				);  
                     
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
         public function addlotterygame()
	{
      
                     //$this->load->model('admin_model');
                        $okornot=$this->lotterygame_model->addlotterygameinfo($this->partner_id);
                        if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo '<br>'.lang('lang_error_message');
			
			
				
	}
        public function deletelotterygame($lotterygame_id)
	{
      
                    // $this->load->model('admin_model');
                       $okornot= $this->lotterygame_model->deletelotterygame($lotterygame_id);
                       if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}
         public function updatelotterygame($lotterygame_id)
	{
      
                     //$this->load->model('admin_model');
                       $okornot= $this->lotterygame_model->updatelotterygameinfo($lotterygame_id);
                       if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo '<br>'.lang('lang_error_message');
			
			
				
	}


          }