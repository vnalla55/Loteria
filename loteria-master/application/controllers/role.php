<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class role extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('role_model');
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
public function getrolefordatatable(){
    $this->role_model->getallrolelistfordatatable( $this->classkoadminmodulepermission);
   // json_encode($result);
}


public function roleassignment(){
     $users['noofmodules']=$this->admin_model->getnoofmodulelistforform();
     $users['modules']=$this->admin_model->getallmodulelistforform();
      if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                 if( $this->classkoadminmodulepermission[13]['others'] == 0)
                                    redirect (base_url().'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_role_page_title'); 
        $users['menuactiveornot']= 'administration-rolemgmt-role';

           
            $users['pagetitle']= lang('lang_role_assignment_page_title');             
        $users['menuactiveornot']= 'administration-rolemgmt-roleassignment';
     
          $this->loadadminview->loaderfirst('admin/roleassignment', $users);
     
     }
     else 
     {
          //session_destroy();
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
                if ($this->classkoadminmodulepermission[13]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                          $users['pagetitle']= lang('lang_role_page_title'); 
        $users['menuactiveornot']= 'administration-rolemgmt-role';

           
            $this->loadadminview->loaderfirst('admin/role', $users);
     
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
public function editroles($roles_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
			$data['serology_details'] = $this->role_model->getroleinfobyid($roles_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'role_id' => $row['role_id'],
				'rolename' => $row['rolename'],
							
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        public function addrole()
	{
                    
                        
                     $okornot=$this->role_model->addroleinfo($this->partner_id);  
                      
			if($okornot==1)
                       echo lang('lang_add_successmessage');
                     else
                         echo lang('lang_error_message');

			
				
	}
        public function deleterole($role_id)
	{
      
                    
                        $okornot=$this->role_model->deleteroleinfo($role_id);
                        if($okornot==1)
                       echo lang('lang_delete_successmessage');
                     else
                         echo lang('lang_error_message');

			
			
				
	}
        
        public function updaterole($role_id)
	{
      
                    
                       $okornot= $this->role_model->updateroleinfo($role_id);
                       if($okornot==1)
                       echo lang('lang_update_successmessage');
                     else
                         echo lang('lang_error_message');
			
			
				
	}

public function getallcombovalueforroles()
	{
     
     if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                     
			$data['serology_details'] = $this->role_model->getallcombovalueforroles($this->partner_id);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
			$serology_details[$i]['name'] = $row['rolename'];
                       $serology_details[$i]['id'] = $row['role_id'];
                                    $i++;
			}
			
                        }
                        else 
                        {
                        $serology_details[0]['name'] = "NO Roles Created .Please Create role first";
                         $serology_details[0]['id'] = 0;
                        }
                          
			echo json_encode($serology_details);
                         
		}        
  
	

	}
 public function deleteadminassignment($adminassignment_id)
	{
     
      
     if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                        $this->role_model->deleteadminassignmentinfo($adminassignment_id);
			
                         
		}        
    
        
    }
      
                    
                     
			
			
				
	
 public function populateassignment($roleid){
            
      
     if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                     $data['serology_details'] = $this->role_model->gettheassignmentofgivenadmin($roleid);
			if($data['serology_details'])
                        {
                            $i=0;
                        foreach($data['serology_details'] as $row)
			{
                            $serology_details[$i]['assignment_id'] = $row['assignment_id'];
                            $serology_details[$i]['module_id'] = $row['module_id'];
                        $serology_details[$i]['viewtask'] = $row['viewtask'];
			
                       $serology_details[$i]['addtask'] = $row['addtask'];
                         $serology_details[$i]['updatetask'] = $row['updatetask'];
                          $serology_details[$i]['deletetask'] = $row['deletetask'];
                           $serology_details[$i]['others'] = $row['others'];
                                    $i++;
                        }
                        echo json_encode($serology_details);
                        
                        }   
			
                         
		}        
    

                     
            
            
        }
  public function updateassignment()
	{
           
                        
                    
     
     if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     
                     
		 $this->role_model->updateassignmentinfo();	
                         
		}        
    
       
                    
     
			
			
				
	}

          }