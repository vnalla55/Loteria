<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class admin extends CI_Controller {

    public $partner_id = 0;
    public $classkoadminmodulepermission = '';
     public $yesterdaydate='';

    function __construct() {
        parent::__construct();
        // $this->load->library('session');
        $this->load->model('admin_model');
         $this->load->model('partner_model');
        
         
          $timestamp = strtotime("+0 days");

        $timestampforyesterday = strtotime("-1 days");

        $this->yesterdaydate = date('Y-m-d', $timestampforyesterday);
         
        
        if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            //the role associated with the otheradmin
//echo 'constructor';
            $admin_id = $this->admin_model->getotheradminid($_SESSION['lottobackendusername']);
            $this->classkoadminmodulepermission = $this->admin_model->getadminmodulepermission($admin_id);
      
            } else  if ( $_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner') {
            $this->partner_id = $this->partner_model->getbusinesspartnerid($_SESSION['lottobackendusername']);
        }     
     }
       
        $this->load->library('loadadminview');
       
       
    }
    
    

    public function password() {
        if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       
     if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[14]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

            $users['pagetitle'] = lang('lang_change_password_page_title');
            $users['menuactiveornot'] = 'password-password-password';
           
            $this->loadadminview->loaderfirst('admin/changepassword', $users);
     
     }
     else 
     {
         session_destroy();
          redirect(base_url().'admin');
       
     }

       
    }

    public function deleteotheradmin($otheradmin_id) {

        $this->load->model('admin_model');
        $okornot = $this->admin_model->deleteotheradmininfo($otheradmin_id);
        if ($okornot == 1)
            echo lang('lang_delete_successmessage');
        else
            echo lang('lang_error_message');
    }

    public function getassociatedadmins($roleid) {

        $data = $this->admin_model->getallassociatedadmins($roleid);
        if ($data) {
            $i = 0;
            // echo '<ul class="list-inline">';
            foreach ($data as $row) {
                echo '<li class="list-group-item">' . $row['username'] . ' (' . $row['otheradminemail'] . ')</li>';
            }
            //  echo '</ul>';
        } else {
            
        }
    }

    public function addotheradmin() {
        $this->load->model('superadmin_model');
        $user_available = $this->admin_model->check_if_username_exists();
        $user_available1 = $this->superadmin_model->check_if_username_exists_in_superadmintable();
        // $user_available2=$this->admin_model->check_if_username_exists_in_partnertable();
        //$user_available3=$this->admin_model->check_if_username_exists_in_subpartnertable();
        $this->load->model('partner_model');
        $user_available4 = $this->partner_model->check_if_username_exists_in_businesspartnertable();

        if ($user_available || $user_available1 || $user_available4) {
            echo json_encode(array('status' => 1, 'message' => 'Username Already Exists'));
        } else {

            $varokornot = $this->admin_model->addotheradmininfo($this->partner_id);
            if ($varokornot == 1) {
                $to = $this->input->post('otheradminemail');

                $fromname = $this->admin_model->getadminname();

                $fromemail = $this->admin_model->getadminemail();

                $subject = lang('lang_admin_registration_sucess_email_subject');
                $data = array(
                    'email_username' => $this->input->post('username'),
                    'email_password' => $this->input->post('password')
                );

                $this->load->library('parser');
                $content = $this->parser->parse('emailtemplates/adminregistrationemailtemplate', $data, TRUE);
                // $content = $this->load->view('emailtemplate',$data,TRUE);
                send_the_email($subject, $to, $fromemail, $fromname, $content, 'none');
                echo json_encode(array('status' => 2, 'message' => lang('lang_add_successmessage')));
            } else {
                echo json_encode(array('status' => 3, 'message' => lang('lang_error_message')));
            }
        }
    }

    public function addassignment() {

        $this->load->model('admin_model');
        $this->admin_model->addassignmentinfo();
    }

    public function updateotheradmin($otheradmin_id) {
        $this->load->model('admin_model');
        $sessmarakhneadminusername = $this->admin_model->getotherusernamebyid($otheradmin_id);
        $flaggo = 1;
       
        $_SESSION['otheradminflag']=$sessmarakhneadminusername;
            // $user_available3=$this->admin_model->check_if_username_exists_in_subpartnertable(); 
            /// if($user_available3)
            // $flaggo=0;
            $username_available = $this->admin_model->check_if_other_username_exists();
            if (!$username_available)
                $flaggo = 0;
//$user_available2=$this->admin_model->check_if_username_exists_in_partnertable();
        //if($user_available2)
        // $flaggo=0;
        $this->load->model('superadmin_model');
        $user_available1 = $this->superadmin_model->check_if_username_exists_in_superadmintable();
        if ($user_available1)
            $flaggo = 0;
        $this->load->model('partner_model');
        $user_availablebp = $this->partner_model->check_if_username_exists_in_businesspartnertable();
        if ($user_availablebp)
            $flaggo = 0;
        if ($flaggo == 0) {
            echo json_encode(array('status' => 1, 'message' => 'Username Already Exists'));
        } else {



            $okornot = $this->admin_model->updateotheradmininfo($otheradmin_id);
            if ($okornot == 1)
                echo json_encode(array('status' => 2, 'message' => lang('lang_update_successmessage')));
            else
                echo json_encode(array('status' => 3, 'message' => lang('lang_error_message')));
        }
    }

    

    

    public function getallcombovalueforotheradminviewedit() {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $this->load->model('admin_model');
            $data['serology_details'] = $this->admin_model->getallcombovalueforotheradminviewedit();
            if ($data['serology_details']) {
                $i = 0;
                foreach ($data['serology_details'] as $row) {
                    $serology_details[$i]['name'] = $row['username'];
                    $serology_details[$i]['id'] = $row['admin_id'];
                    $i++;
                }
            } else {
                $serology_details[0]['name'] = "NO Admin Assigned. Please add assignment first";
                $serology_details[0]['id'] = 0;
            }
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

    public function getallcombovalueforotheradminadd() {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $this->load->model('admin_model');
            $data['serology_details'] = $this->admin_model->getallcombovalueforotheradminadd();
            if ($data['serology_details']) {
                $i = 0;
                foreach ($data['serology_details'] as $row) {
                    $serology_details[$i]['name'] = $row['username'];
                    $serology_details[$i]['id'] = $row['admin_id'];
                    $i++;
                }
            } else {
                $serology_details[0]['name'] = "NO Admin Created. Please create admin first";
                $serology_details[0]['id'] = 0;
            }
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

    public function getallcombovalueformoduleadd() {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $this->load->model('admin_model');
            $data['serology_details'] = $this->admin_model->getallcombovalueformoduleadd();
            if ($data['serology_details']) {
                $i = 0;
                foreach ($data['serology_details'] as $row) {
                    $serology_details[$i]['name'] = $row['module_name'];
                    $serology_details[$i]['id'] = $row['module_id'];
                    $i++;
                }
            } else {
                $serology_details[0]['name'] = "NO module created. Please add module first";
                $serology_details[0]['id'] = 0;
            }
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

    public function getallcombovalueforresultadd() {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $this->load->model('admin_model');
            $data['serology_details'] = $this->admin_model->getallcombovalueforresultadd($this->partner_id);
            if ($data['serology_details']) {
                $i = 0;
                foreach ($data['serology_details'] as $row) {
                    $serology_details[$i]['name'] = $row['lottery_name'];
                    $serology_details[$i]['id'] = $row['lottery_id'];
                    $i++;
                }
            } else {
                $serology_details[0]['name'] = "NO lottery left. Please add lottery first";
                $serology_details[0]['id'] = 0;
            }
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

    public function search_gametype() {
        // echo $key;
        $this->load->model('admin_model');
        $this->admin_model->search_gametype();
    }

    public function search_user() {
        // echo $key;
        $this->load->model('admin_model');
        $this->admin_model->search_user();
    }

    public function getfiverandomnos() {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $arr = array();
            while (count($arr) < 5) {
                $nr = rand(1, 100);

                if (in_array($nr, $arr))
                    $nr = rand(1, 100);
                else {
                    $arr[] = $nr;
                }
            }
            // gets a random number

            $temp1 = '';
            $temp2 = '';
            $temp3 = '';
            $temp4 = '';
            $temp5 = '';
            if ($arr[0] >= 1 && $arr[0] <= 9) {
                $temp1 = '0' . $arr[0];
            } else
                $temp1 = $arr[0];
            if ($arr[1] >= 1 && $arr[1] <= 9) {
                $temp2 = '0' . $arr[1];
            } else
                $temp2 = $arr[1];
            if ($arr[2] >= 1 && $arr[2] <= 9) {
                $temp3 = '0' . $arr[2];
            } else
                $temp3 = $arr[2];
            if ($arr[3] >= 1 && $arr[3] <= 9) {
                $temp4 = '0' . $arr[3];
            } else
                $temp4 = $arr[3];
            if ($arr[4] >= 1 && $arr[4] <= 9) {
                $temp5 = '0' . $arr[4];
            } else
                $temp5 = $arr[4];


            $serology_details = array
                (
                'slot1' => $temp1,
                'slot2' => $temp2,
                'slot3' => $temp3,
                'slot4' => $temp4,
                'slot5' => $temp5
            );
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

    public function editotheradmin($otheradmin_id) {

        if (!$this->input->is_ajax_request()) {
            redirect(404);
        } else {
            $this->load->model('admin_model');
            $data['serology_details'] = $this->admin_model->getotheradmininfobyid($otheradmin_id);
            foreach ($data['serology_details'] as $row) {
                $serology_details = array
                    (
                    'admin_id' => $row['admin_id'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'otheradminemail' => $row['otheradminemail'],
                    'role_id' => $row['role_id'],
                );
            }
            echo json_encode($serology_details);
        }
        /* 	$this->load->view('lims_header');
          $this->load->view('lims_navigation');
          $this->load->view('serology/lims_edit_serology_by_id_form',$data); */
    }

   

    

    

    function getmodulesdiv() {
        $this->load->model('admin_model');

        $users['result'] = $this->admin_model->getallmodulelist();
        $this->load->view('modulediv', $users);
    }

    function getadminfordatatable() {

        $this->admin_model->getalladminlistfordatatable($this->classkoadminmodulepermission);
    }

    function administrators() {
         if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                 if ($this->classkoadminmodulepermission[2]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                           $users['pagetitle'] = lang('lang_admininistrator_page_title');
            $users['menuactiveornot'] = 'administration-rolemgmt-administrators';

           
             $this->loadadminview->loaderfirst('admin/administrators', $users);
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

    function index() {
        
       if (isset($_SESSION['lottobackendusertypeaftervalidation']))
           {
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner')
     {
       $this->dashboard();         
     }else 
     {
          $this->load->view('admin_login');
     }
          
     
        } else {
            $this->load->view('admin_login');
        }
    }

    function postdata() {
        // print_r($_POST);
        print_r($_POST['area']);
    }

    function adminlogout() {
       
        
       
         session_destroy();
          


      

       redirect(base_url() . 'admin');
    }

    

    function dashboard() {

        $this->load->model('non_adminmodel');
        $this->load->model('winner_model');
        $this->load->model('user_model');
        $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
        $this->load->model('bethistory_model');
        $this->load->model('lotogroup_model');
        $this->load->model('lotterygame_model');
        $this->load->model('admin_model');
        $this->load->model('gametype_model');
        $this->load->model('partner_model');
        $users['lotogroupresult'] = $this->lotogroup_model->getallcurrentlotogroupinfo();
        $users['lotteryresult'] = $this->lotterygame_model->getallcurrentlotteryinfo();
        $users['lotteryresultnoofrows'] = $this->lotterygame_model->getallcurrentlotteryinfonoofrows();
        $users['gametyperesult'] = $this->gametype_model->getgametypeinfo();
        $users['partnerresult'] = $this->partner_model->getbusinesspartnerinfo();





        $users['lottogroup'] = $this->lotogroup_model->getalllottogroupforform();
        $users['lotterygames'] = $this->lotterygame_model->getalllotterygamesforform();
        $users['gametype'] = $this->gametype_model->getallgametypeforform();
        $users['modules'] = $this->admin_model->getallmodulelistforform();
        $users['noofmodules'] = $this->admin_model->getnoofmodulelistforform();
        $users['menuactiveornot'] = 'dashboard-dashboard-dashboard';
        $users['pagetitle'] = lang('lang_dashboard_page_title');
       
        if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') {

            //Total users, new users yesterday. Total deposits, total withdrawals, # of winners yesterday, total winners, total # of bets, # of bets yesterday, deposits yesterday, withdrawals yesterday.
            $users['totalusers'] = $this->user_model->gettotalusers();
            $users['newusersyesterday'] = $this->user_model->getnewusersyesterday( $this->yesterdaydate);
            $users['totaldeposits'] = $this->deposit_model->gettotaldeposits();
            $users['totalwithdrawals'] = $this->withdrawal_model->gettotalwithdrawals();
            $users['noofwinnersyesterday'] = $this->winner_model->getnoofwinnersyesterday( $this->yesterdaydate);
            $users['totalwinners'] = $this->winner_model->gettotalwinners();
            $users['totalnoofbets'] = $this->bethistory_model->gettotalnoofbets();
            $users['noofbetsyesterday'] = $this->bethistory_model->getnoofbetsyesterday( $this->yesterdaydate);
            $users['deposityesterday'] = $this->deposit_model->getdeposityesterday( $this->yesterdaydate);
            $users['withdrawalyesterday'] = $this->withdrawal_model->getwithdrawalyesterday( $this->yesterdaydate);


            //  $this->load->view('dashboardpage',$users);
            $this->loadadminview->loaderfirst('admin/dashboardpage', $users);
        } else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
 $users['totalusers'] = $this->user_model->gettotalusers();
            $users['newusersyesterday'] = $this->user_model->getnewusersyesterday( $this->yesterdaydate);
            $users['totaldeposits'] = $this->deposit_model->gettotaldeposits();
            $users['totalwithdrawals'] = $this->withdrawal_model->gettotalwithdrawals();
            $users['noofwinnersyesterday'] = $this->winner_model->getnoofwinnersyesterday( $this->yesterdaydate);
            $users['totalwinners'] = $this->winner_model->gettotalwinners();
            $users['totalnoofbets'] = $this->bethistory_model->gettotalnoofbets();
            $users['noofbetsyesterday'] = $this->bethistory_model->getnoofbetsyesterday( $this->yesterdaydate);
            $users['deposityesterday'] = $this->deposit_model->getdeposityesterday( $this->yesterdaydate);
            $users['withdrawalyesterday'] = $this->withdrawal_model->getwithdrawalyesterday( $this->yesterdaydate);

          
 $admin_id = $this->admin_model->getotheradminid($_SESSION['lottobackendusername']);
            $users['adminmodulepermission'] = $this->admin_model->getadminmodulepermission($admin_id);
            $this->loadadminview->loaderfirst('admin/dashboardpage', $users);
        } else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner') {
                $users['totalnoofbets'] = $this->bethistory_model->gettotalnoofbetsofcurrentbusinesspartner($this->partner_id);
            $users['noofbetsyesterday'] = $this->bethistory_model->getnoofbetsyesterdayofcurrentbusinesspartner( $this->yesterdaydate, $this->partner_id);
            $users['totalamountofbets'] = $this->bethistory_model->gettotalamountofbetsofcurrentbusinesspartner($this->partner_id);
            $users['totalnooffailedbets'] = $this->bethistory_model->gettotalnooffailedbetsofcurrentbusinesspartner($this->partner_id);


            $this->loadadminview->loaderfirst('admin/dashboardpage', $users);
        } else {
            redirect(base_url() . 'admin');
        }
    }

    function changepassword() {
        
      
       if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       
     $this->admin_model->changepassword();
     
     }
     else 
     {
          echo json_encode(array('status' => 3, 'message' => 'session failed'));
       
     }

        // $param['error_message']="Invalid username or password";
        //$this->load->view('admin_login', $param);
    }

    function adminloginvalidate() {


        $this->load->model('admin_model');
        $this->load->model('superadmin_model');
        $superadmin = $this->superadmin_model->getsuperadminusername();

        $user_available1 = $this->superadmin_model->check_if_username_exists_in_superadmintable();
        $this->load->model('partner_model');
        $user_available4 = $this->partner_model->check_if_username_exists_in_businesspartnertable();
        $user_available = $this->admin_model->check_if_username_exists();
        $nousernameflag = 0;
        if ($user_available1)
        {
           
          $_SESSION['lottobackendusername']=$superadmin;
           $_SESSION['lottobackendusertypebeforevalidation']='backendsuperadmin';
        }
            
        else if ($user_available)
        {
        
         $_SESSION['lottobackendusername']=$this->input->post('username');
          $_SESSION['lottobackendusertypebeforevalidation']='backendotheradmin';
        }
            

        else if ($user_available4) {
            
             $_SESSION['lottobackendusername']=$this->input->post('username');
              $_SESSION['lottobackendusertypebeforevalidation']='backendbusinesspartner';
        } else
            $nousernameflag = 1;
        if ($nousernameflag == 0) {
            $query = $this->admin_model->adminloginvalidate();
            // echo $query;
            if ($query == 'superadmin' || $query == 'otheradmin' || $query == 'businesspartner') {
                if ($query == 'superadmin'){
                    
                      $_SESSION['lottobackendusertypeaftervalidation']='backendsuperadmin';
                     // echo 'superadmin';
                }
                   
                else if ($query == 'otheradmin')
                {
                   
                   $_SESSION['lottobackendusertypeaftervalidation']='backendotheradmin';
                    //echo 'otheradmin';
             
                }
                        else if ($query == 'businesspartner')
                        {
                            $_SESSION['lottobackendusertypeaftervalidation']='backendbusinesspartner';
                            // echo 'businesspartner';
                        }
//                   echo  $_SESSION['lottobackendusertypeaftervalidation'];
//                    var_dump($_SESSION);
//                    exit();
              redirect(base_url() . 'admin/dashboard');
            }
            else {
                  session_destroy();
                $param['error_message'] = "Invalid username or password";
                $this->load->view('admin_login', $param);
              
                //  echo '<p> Invalid username or password</P>';
                //redirect(base_url().'index.php/admin/',$param);
            }
        } else {


            $param['error_message'] = "Username Not available";
            $this->load->view('admin_login', $param);
        }
    }

}
