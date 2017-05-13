<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class frontuser extends CI_Controller{
     private $db_b; 
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('user_model');
          $this->load->library('loadview');
          //$this->db_b = $this->load->database('b', TRUE);
         
    }
    function lottouserdepositrequest(){
            if(isset($_SESSION['lotteryusername']))
                                  {   
                $this->load->model('non_adminmodel');
                 $this->load->model('front_creditcard_model');
                
                   $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  
      
         
     
     
         $users['result']= $this->user_model->getuserinfo($userid);
          //$users['apiloginidandtransactionkey']= $this->non_adminmodel->gettheloginidandtransactionkey();
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        $users['apiloginidandtransactionkey']= $this->non_adminmodel->gettheloginidandtransactionkey();
         $users['currentcreditcards']= $this->front_creditcard_model->getcurrentcreditcards();
         $this->loadview->loaderfirst('nonadmin/depositrequest',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
        }
    function lottouserwithdrawalrequest(){
            if(isset($_SESSION['lotteryuser']))
                                  {    
          
     $this->load->model('user_model');
                   $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  
     
         $users['result']= $this->user_model->getuserinfo($userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/withdrawalrequest',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
        }
    function userinfoupdate()
        {
            
           
 $email_available=$this->user_model->check_if_other_email_exists();
 $username_available= $this->user_model->check_if_other_username_exists();
 if(!$email_available){
     echo json_encode(array('status' => 1, 'message' => 'Correo electrónico ya existe'));
     
 }
 else if(!$username_available)
 {
       echo json_encode(array('status' => 3, 'message' => 'Ya existe Nombre de usuario'));
   
 }
 else{
     
    
     if($this->user_model->updateuserinfowithemail())
     {
             echo json_encode(array('status' => 2, 'message' => 'Actualizado con éxito'));
             
              //$this->session->set_userdata('lotteryusername',$this->input->post('username'));
             //$this->session->set_userdata('lotteryuser',$this->input->post('email'));
             $_SESSION['lotteryuser']=$this->input->post('email');
              $_SESSION['lotteryusername']=$this->input->post('username');

 
     }
     
        }
        }
    public function offlinepage()
    {
        $this->load->model('configuration_model');
        $users['results']= $this->configuration_model->getadminsettingobject();
      $this->load->view('nonadmin/offlineview',$users);  
    }
    public function _remap($method,$otherarg)
{
         $this->load->model('configuration_model');
                    $data['adminsetting'] = $this->configuration_model->getadminsetting();
                   // print_r($data);
                            $onoffstatus='';       
                     foreach($data['adminsetting'] as $row)
			{
                         
                         $onoffstatus=$row['website_status'];
			
			}
    if ($onoffstatus == 'online')
    {
        //$this->$method($otherarg);
        if($otherarg)
        {
            //echo $method . $otherarg;
              $this->$method($otherarg[0]);
        }
            //$this->$method($otherarg);
        else
             $this->$method();
    }
    else
    {
        $this->offlinepage();
    }
}

function lottouserbethistory(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
                 $this->load->model('bethistory_model');
                   $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  
      
       
           $limit=10;
           $total=$this->bethistory_model->getuserbethistorynopassed($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->bethistory_model->getuserbethistorypassed($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/page-my-account-orders',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
function dashboard()
        {
              if($_SESSION['lotteryuser'])
                                  { 
                   
                   $this->load->model('winner_model');
                   $this->load->model('bethistory_model');
                    $this->load->model('deposit_model');
                    $this->load->model('non_adminmodel');
                    $this->load->model('withdrawal_model');
                    
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  
                 $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                  //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
                      $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
                 $this->user_model->updateuserbalanceasperthecalculation($better_id,$users['balanceofaccounts']);
                 $limit=10;
           $total=$this->bethistory_model->getusercurrentbethistoryno($better_id);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="Última página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   //$users['pageno']=100;
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     $users['pageno']=100;
         $users['result']= $this->bethistory_model->getusercurrentbethistory($offset,$better_id);
        // print_r($users['result']);
             $this->loadview->loaderfirst('nonadmin/page-my-account-dash',$users);
                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
         $users['pageno']=2;
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
 
            
        }
public function editlotousercreditcard($credit_card_serial_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                     $this->load->model('front_creditcard_model');
                     
			$data['serology_details'] = $this->front_creditcard_model->getlotocreditcardinfobyid($credit_card_serial_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'credit_cardno' => $row['credit_cardno'],
				'cvv' => $row['cvv'],
                             'card_nickname' => $row['card_nickname'],
                            'credit_cardname' => $row['credit_cardname'],
				'expiry_date' => $row['expiry_date'],
				'primary_card_flag' => $row['primary_card_flag'],
							
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
 public function editlotouserbankaccount($credit_card_serial_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                      $this->load->model('front_bank_account_model');
			$data['serology_details'] = $this->front_bank_account_model->getlotobankaccountinfobyid($credit_card_serial_id);
			foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'bank_name' => $row['bank_name'],
				'swift_code' => $row['swift_code'],
                            'bank_address' => $row['bank_address'],
				'account_no' => $row['account_no'],
				'account_type' => $row['account_type'],
                            'customer_account_name' => $row['customer_account_name'],
                            'customer_telephone' => $row['customer_telephone'],
                             'customer_physical_address' => $row['customer_physical_address'],
                           'primary_bankaccount_flag' => $row['primary_bankaccount_flag'],
							
				);
			}
			echo json_encode($serology_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
function userlogin()
        {
            
            //$this->load->model('non_adminmodel');
           // $this->load->model('user_model');
 $email_available=$this->user_model->check_if_email_exists();
 if($email_available){
    if($this->user_model->validateuserinfo())
     {
             
             $_SESSION['lotteryuser']=$this->input->post('email');
             $lottousername=$this->user_model->getusernamebyemail();
             
              $_SESSION['lotteryusername']=$lottousername;
        echo json_encode(array('status' => 1, 'message' => 'Inicio de sesión correcto'));
             
 
     }
     else
     {
         echo json_encode(array('status' => 2, 'message' => 'Error De Inicio De Sesion')); 
     }
     
 }else{
     
    // $this->load->model('non_adminmodel');
    
       echo json_encode(array('status' => 3, 'message' => 'Su dirección de correo electrónico no existe. tienes que registrarte'));
        
       
 }
        }
        
        
        function registeruser()
        {
            
          $this->load->model('admin_model');
 $email_available=$this->user_model->check_if_email_exists();
 $user_available=$this->user_model->check_if_username_exists();
 if($email_available){
     echo json_encode(array('status' => 1, 'message' => 'Correo electrónico ya existe'));
     
 }
 else if($user_available){
    echo json_encode(array('status' => 3, 'message' => 'Nombre de usuario ya existe'));  
 }
 else{
     
    // $this->load->model('non_adminmodel');
      $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'name' => '',
            'gender' => '',
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'lastname' => '',
            'phone' => '',
            'residenceaddress' => $this->input->post('residenceaddress'),
            'postalcode' => $this->input->post('postalcode'),
            'country' => '',
            'wallet_balance' => '',
            'bonus_balance' => ''
        );
    $this->user_model->adduserinfo($new_member_insert_data);
    $to= $this->input->post('email'); 
               // $to=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                //$fromname=$this->session->userdata('lotteryusername');
                $fromemail=$this->admin_model->getadminemail();
                //$fromemail = $this->user_model->getuseremailbyusername($this->session->userdata('lotteryusername'));
                //$username=$this->admin_model->getadminname();
                $subject=lang('lang_user_registration_success_email_subject');
              $this->load->library('parser'); 

 $data = array(
            'email_username' => $this->input->post('username'),
            
                     'email_password'=>$this->input->post('password'),
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/userregistrationsuccessemailtemplate', $data, TRUE);
              
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none'); 
    //$this->user_model->sendregistersuccessemail();
      //$this->session->set_userdata('lotteryuser',$this->input->post('email'));
      $_SESSION['lotteryuser']=$this->input->post('email');
                // echo $this->input->post('email');
             //$lottousername=$this->non_adminmodel->getusernamebyemail();
             //$this->session->set_userdata('lotteryusername',$this->input->post('username'));
              $_SESSION['lotteryusername']=$this->input->post('username');
             echo json_encode(array('status' => 2, 'message' => 'successfully registered'));
             
     
        }
        }
        public function edituser()
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    
			$data['serology_details'] = $this->user_model->getuserinfobyemail();
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
				'picname' => $row['picname'],
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
         function lottouseraccount(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
        $this->load->model('non_adminmodel');
        $this->load->model('partner_model');
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
         
     
     $users['partnerinfo']= $this->partner_model->getpartnerforlottouser();
         $users['result']= $this->user_model->getuserinfo($userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/page-my-account-settings',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
        function forgotpassword()
        {
            
            //$this->load->model('non_adminmodel');
           // $this->load->model('user_model');
           
 $email_available=$this->user_model->check_if_email_exists();
 if($email_available){
     $this->load->helper('string');
     //$userpassword=uniqid(rand(), true);
    $userpassword= random_string('alnum',15);
      $this->user_model->updateuserpasswordinfobyemail($userpassword);
            //$userpassword='';
            
    $this->load->model('admin_model');
                   $to= $this->input->post('email'); 
              
                $fromname=$this->admin_model->getadminname();
               
                $fromemail=$this->admin_model->getadminemail();
                
                $subject=lang('lang_user_password_recovery_email_subject');
                 // $content='your new password is :'.$userpassword;
                       
$this->load->library('parser'); 
$subject=lang('lang_user_password_recovery_email_subject');
 $data = array(
            'email_user_password' => $userpassword,
            
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/passwordrecoveryemailtemplate', $data, TRUE);
              
         
      
            send_the_email($subject,$to,'no-reply@tubanquita.com',$fromname,$content,'none');
                  echo json_encode(array('status' => 1, 'message' => 'Su contraseña ha sido enviada a su correo electrónico'));
            
            //else
                 ///echo json_encode(array('status' => 2, 'message' => 'e-mail no se ha podido enviar por favor intente de nuevo'));
                
		
     
 }else{
     
    // $this->load->model('non_adminmodel');
    
       echo json_encode(array('status' => 3, 'message' => 'Tu email no existe. tienes que registrarte'));
        
       
 }
        }
           
     function deletelottouserbankaccount($credit_card_serial_id){
                     $this->load->model('front_bank_account_model');
                    //$better_id=$this->non_adminmodel->getuserid($this->session->userdata('lotteryuser'));
                     $this->front_bank_account_model->deletelotobankaccount($credit_card_serial_id); 
    }
    function deletelottousercreditcard($credit_card_serial_id){
                     $this->load->model('front_creditcard_model');
                    //$better_id=$this->non_adminmodel->getuserid($this->session->userdata('lotteryuser'));
                     $this->front_creditcard_model->deletelotocreditcard($credit_card_serial_id); 
    }
    function updatelottouserbankaccount($credit_card_serial_id){
                    $this->load->model('front_bank_account_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                   //echo $better_id;
                    $this->front_bank_account_model->updatelotobankaccount($credit_card_serial_id,$better_id); 
    }
    function updatelottousercreditcard($credit_card_serial_id){
                     $this->load->model('front_creditcard_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                   //echo $better_id;
                    $this->front_creditcard_model->updatelotocreditcard($credit_card_serial_id,$better_id); 
    }
    function userpasswordupdate()
        {
            
            $this->load->model('user_model');
           
 
  $checkpassword=$this->user_model->checkpassword();
  if($checkpassword)
  {
      if($this->user_model->updatepassword())
      echo json_encode(array('status' => 1, 'message' => 'Su contraseña se ha cambiado correctamente'));
   
  }
  else 
  {
    echo json_encode(array('status' => 2, 'message' => 'Contraseña incorrecta'));
   
  }
           
           
		
        }
        
    function addlottouserbankaccount(){
      $this->load->model('front_bank_account_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  $this->front_bank_account_model->addlotobankaccount($better_id);  
    }
  
          function addlottousercreditcard(){
      $this->load->model('front_creditcard_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                       $this->front_creditcard_model->addlotocreditcard($better_id);  
    }
    
         function lottouserbankaccount(){
        if(isset($_SESSION['lotteryuser']))
                                  { 
                   $this->load->model('front_bank_account_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                   $users['result']= $this->front_bank_account_model->getuserbankaccountinfo($better_id);
             $this->loadview->loaderfirst('nonadmin/page-my-bankaccount',$users);
                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
         $users['pageno']=2;
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }  
    }
        function lottousercreditcard(){
        if(isset($_SESSION['lotteryuser']))
                                  { 
                   $this->load->model('front_creditcard_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                    $users['result']= $this->front_creditcard_model->getusercreditcardinfo($better_id);
             $this->loadview->loaderfirst('nonadmin/page-my-creditcard',$users);
                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
         $users['pageno']=2;
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }  
    }
         
        
        function lottouserpendingtickets(){
             if(isset($_SESSION['lotteryuser']))
                                  { 
                 $this->load->model('bethistory_model');
      
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                  
                      $limit=10;
           $total=$this->bethistory_model->getuserpendingbethistoryno($better_id);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="Última página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   //$users['pageno']=100;
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     $users['pageno']=100;
         $users['result']= $this->bethistory_model->getuserpendingbethistory($offset,$better_id);
             $this->loadview->loaderfirst('nonadmin/page-pendingtickets',$users);
                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
         $users['pageno']=2;
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
        }
         function lottouserexpenseshistory(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
       $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
       
       
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                            $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                        $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
        
       
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
           $limit=10;
           $total=$this->bethistory_model->getuserbethistoryno($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->bethistory_model->getuserbethistory($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/bethistory',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
        function lottouserwinhistory(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
         $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                           $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                        $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
        
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
           $limit=10;
           $total=$this->winner_model->getuserwinhistoryno($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->winner_model->getuserwinhistory($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/winhistory',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
          function wallet(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
         $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                             $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                  //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
                      $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
      
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
         
     
     
         $users['result']= $this->user_model->getuserwallet($userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/wallet',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
          function lottouserdeposithistory(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
       $this->load->model('user_model');
         $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                            $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                  //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
                      $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
           $limit=10;
           $total=$this->deposit_model->getuserdeposithistoryno($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->deposit_model->getuserdeposithistory($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/deposithistory',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
         
          function lottouserwithdrawalhistory(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
         $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                            $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                  //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
                      $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
      
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
           $limit=10;
           $total=$this->withdrawal_model->getuserwithdrawalhistoryno($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->withdrawal_model->getuserwithdrawalhistory($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/withdrawalhistory',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
        function lottouserbetinfo(){
             if(isset($_SESSION['lotteryuser']))
                                  {    
       
         $this->load->model('bethistory_model');
       $this->load->model('winner_model');
       $this->load->model('deposit_model');
        $this->load->model('withdrawal_model');
                   $better_id=$this->user_model->getuserid($_SESSION['lotteryuser']);
                           $users['totalbettings']=$this->bethistory_model->getuserbethistoryno($better_id);
                  //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
                      $users['totalbetamounts']=$this->bethistory_model->gettotalbetamount($better_id);
                 $users['totalwinamounts']=$this->winner_model->gettotalwinamount($better_id);
                 $users['totaldeposit']=$this->deposit_model->gettotaldeposit($better_id);
                 $users['totalwithdrawal']=$this->withdrawal_model->gettotalwithdrawal($better_id);
                 $users['balanceofaccounts']=$users['totalwinamounts']+$users['totaldeposit']- $users['totalbetamounts']-$users['totalwithdrawal'];
        
       
        $userid=$this->user_model->getuserid($_SESSION['lotteryuser']);
           $limit=10;
           $total=$this->bethistory_model->getuserbethistoryno($userid);
           
           $pages = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           $page=1;
           if(isset($_GET['page']))
            $page = $_GET['page'];
             $offset = ($page - 1)  * $limit;
              $start = $offset + 1;
            $end = min(($offset + $limit), $total);
    $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    

    // Calculate the offset for the query
   
     $users['noofrows']=$total;
     $users['thepage']=$page;
      $users['theoffset']=$offset;
      $users['theprevlink']=$prevlink;
      $users['thenextlink']=$nextlink;
      $users['thestart']=$start;
       $users['theend']=$end;
     
         $users['result']= $this->bethistory_model->getuserbethistory($offset,$userid);
        // $users['upcoming']=$this->non_adminmodel->getupcominglotteries();
        
         $this->loadview->loaderfirst('nonadmin/betinfo',$users);                                  }
                                  else
                                  {
                                   
         $this->load->model('result_model');
	 $users['results']= $this->result_model->getfivelatestresults();
          $this->loadview->loaderfirst('nonadmin/index',$users);   
                                  }
         
        }
       
}
