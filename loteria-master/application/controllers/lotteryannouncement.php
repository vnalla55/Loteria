<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lotteryannouncement extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('lotteryannouncement_model');
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
public function getlotteryannouncementfordatatable(){
    $this->lotteryannouncement_model->getalllotteryannouncementlistfordatatable( $this->classkoadminmodulepermission);
   
}

public function index(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[5]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                           $users['pagetitle']= lang('lang_lottery_announcement_page_title');                
        $users['menuactiveornot']= 'loteria-loteria-lotteryannouncement';
       
          $this->loadadminview->loaderfirst('admin/lotteryannouncement', $users);
     
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
function getallannouncementdatesforresults($lotogrouplotterygame)
        {
          if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('admin_model');
                     
			$data['serology_details'] = $this->lotteryannouncement_model->getallannouncementdatesforresults($lotogrouplotterygame);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
                            $detaildateandtime='';
                            if($row['drawing_type']=='daily')
                                $detaildateandtime= $row['detail_date'].' '.$row['dailytime'];
                            else  if($row['drawing_type']=='weekly')
                                 $detaildateandtime= $row['detail_date'].' '.$row['weeklytime'];
                            else  if($row['drawing_type']=='onetime')
                                 $detaildateandtime= $row['onetimedatetime'];
                            else if($row['drawing_type']=='ampm')
                                  $detaildateandtime= $row['detail_date'].' AM: '.$row['amtime'].' PM: '.$row['pmtime'];
			$serology_details[$i]['name'] = $detaildateandtime;
                        $serology_details[$i]['ampmtype'] = $row['ampmtype'];
                       $serology_details[$i]['id'] = $row['lottery_announcement_detail_id'];
                        $serology_details[$i]['drawing_type'] = $row['drawing_type'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO dates available";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}  
        }
          
         
 function getallannouncementdatesforwinners($lotogrouplotterygame)
        {
          if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('admin_model');
                     
			$data['serology_details'] = $this->lotteryannouncement_model->getallcombovaluelotobetsforannouncingwinners($lotogrouplotterygame);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
                            $detaildateandtime='';
                            if($row['drawing_type']=='daily')
                                $detaildateandtime= $row['detail_date'].' '.$row['dailytime'];
                            else  if($row['drawing_type']=='weekly')
                                 $detaildateandtime= $row['detail_date'].' '.$row['weeklytime'];
                            else  if($row['drawing_type']=='onetime')
                                 $detaildateandtime= $row['onetimedatetime'];
                            else if($row['drawing_type']=='ampm')
                                  $detaildateandtime= $row['detail_date'];
			$serology_details[$i]['name'] = $detaildateandtime;
                       $serology_details[$i]['id'] = $row['lottery_announcement_detail_id'];
                        $serology_details[$i]['drawing_type'] = $row['drawing_type'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO dates available";
                         $serology_details[0]['id'] = 0;
                        }
			echo json_encode($serology_details);
		}  
        }

    
public function search_lottery()
	{
           // echo $key;
            //$this->load->model('admin_model');
	$this->lotteryannouncement_model->search_lottery();
	}
 public function addlottery()
	{
      
      
                        $okornot=$this->lotteryannouncement_model->addlotteryinfo($this->partner_id);
                        if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');
                       
			
			
				
	}
        
public function updatelottery($lottery_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->lotteryannouncement_model->updatelotteryinfo($lottery_id);
                        if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}

     public function deletelottery($lottery_id)
	{
      
                    // $this->load->model('admin_model');
                       $okornot= $this->lotteryannouncement_model->deletelottery($lottery_id);
			
                       if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');

			
				
	}
    public function editlottery($lottery_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['serology_details'] = $this->lotteryannouncement_model->getlotteryinfobyid($lottery_id);
			foreach($data['serology_details'] as $row)
			{
                           $serology_details = array
				(
				'announcement_id' => $row['announcement_id'],
				'game_id' => $row['game_id'],
				'lottogroup_id' => $row['lottogroup_id'],				
                                'minbet' => $row['minbet'],	
                            'maxbet' => $row['maxbet'],	
                             'drawingvalidupto' => $row['drawingvalidupto'],
                            'drawing_type' => $row['drawing_type'],	
                                'dailytime' => $row['dailytime'],
                            'drawing_day' => $row['drawing_day'],
                             'weeklytime' => $row['weeklytime'],
                            'amtime' => $row['amtime'],
                            'pmtime' => $row['pmtime'],
                               'onetimedatetime' => $row['onetimedatetime'],
                            	
                                    'sundayflag' => $row['sundayflag'],
                            	 'mondayflag' => $row['mondayflag'],
                             'tuesdayflag' => $row['tuesdayflag'],
                             'wednesdayflag' => $row['wednesdayflag'],
                             'thursdayflag' => $row['thursdayflag'],
                             'fridayflag' => $row['fridayflag'],
                             'onetimedatetime' => $row['onetimedatetime'],
                             'saturdayflag' => $row['saturdayflag'],	
                            'ampmtype' => $row['ampmtype'],
				
				);  
                     
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
    
    
    
    
    

          }