<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class frontpayment extends CI_Controller{
    private $db_b; 
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
          $this->load->library('loadview');
           $this->load->model('non_adminmodel');
             $this->load->model('front_payment_model');
           
          //$this->db_b = $this->load->database('b', TRUE);
         
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
    public function offlinepage()
    {
        $this->load->model('configuration_model');
        $users['results']= $this->configuration_model->getadminsettingobject();
      $this->load->view('nonadmin/offlineview',$users);  
    }
    function senddepositrequest(){
            
           $post_url = AUTHORIZE_DOT_NET_REDIRECT_URL;

$post_values = array(
	
	// the API Login ID and Transaction Key must be replaced with valid values
	"x_login"			=> $this->input->post('x_login'),
	"x_tran_key"		=> $this->input->post('x_tran_key'),

	"x_version"			=> "3.1",
	"x_delim_data"		=> "TRUE",
	"x_delim_char"		=> "|",
	"x_relay_response"	=> "FALSE",
        "x_card_code"	=> $this->input->post('x_card_code'),
	"x_type"			=> "AUTH_CAPTURE",
	"x_method"			=> "CC",
	"x_card_num"		=> $this->input->post('x_card_num'),
	"x_exp_date"		=> $this->input->post('x_exp_date'),

	"x_amount"			=> $this->input->post('x_amount'),
	
	// Additional fields can be added here as outlined in the AIM integration
	// guide at: http://developer.authorize.net
);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
foreach( $post_values as $key => $value )
	{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
$post_string = rtrim( $post_string, "& " );

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
/*
$line_items = array(
	"item1<|>golf balls<|><|>2<|>18.95<|>Y",
	"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
	"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
	
foreach( $line_items as $value )
	{ $post_string .= "&x_line_item=" . urlencode( $value ); }
*/

// This sample code uses the CURL library for php to establish a connection,
// submit the post, and record the response.
// If you receive an error, you may want to ensure that you have the curl
// library enabled in your php configuration
$request = curl_init($post_url); // initiate curl object
	curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	$post_response = curl_exec($request); // execute curl post and store results in $post_response
	// additional options may be required depending upon your server configuration
	// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close ($request); // close curl object

// This line takes the response and breaks it into an array using the specified delimiting character
$response_array = explode($post_values["x_delim_char"],$post_response);

// The results are output to the screen in the form of an html numbered list.
echo "<OL>\n";
echo "<LI>" . $response_array[3] . "&nbsp;</LI>";
//print_r($post_response);
$this->load->model('user_model');

              
                 $this->load->model('partner_model');
                  $this->load->model('deposit_model');
                  
 $userid=$this->user_model->getuseridforpartnerapproval();
if($response_array[0]==1)
{
    //echo'approved';
    
                     
                     
                     $this->deposit_model->registerdeposit($response_array[6],$response_array[9],$response_array[51]);
       $this->user_model->addbalanceofuserdeposit($response_array[9],$userid);
                    
                   echo'<br> Depósito exitosa';
                       

}
else 
{
 echo'<br> Depósito Falló';    
}
 $this->load->model('admin_model');
 $to  = $this->user_model->getuseremailbyuserid($userid); 
               // $to=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                //$fromname=$this->session->userdata('lotteryusername');
                $fromemail=$this->admin_model->getadminemail();
                //$fromemail = $this->user_model->getuseremailbyusername($this->session->userdata('lotteryusername'));
                $username=$this->user_model->getusernamebyuserid($userid);
               // $subject='Deposit Successful/Failure Notice';
                $subject=lang('lang_deposit_approval_disapproval_email_subject');
                // $emailcontent = 'Hello ' . $username . '!!<br> Your deposit on the date ' . $this->session->userdata('aajakodatetime') . ' for RD ' . $response_array[9] . ' is  ';
       $depositsuccessflag=$response_array[0];
          
 if ($depositsuccessflag == 1)
            $emailcontent= lang('lang_deposit_approval_email_content1');
        else
            $emailcontent=lang('lang_deposit_disapproval_email_content1');
           $subject=lang('lang_admin_registration_sucess_email_subject');
           $email_deposit_date=  $this->deposit_model->getdepositdateforemail($deposit_id_forpartnerplusadflagarray[0]);
     
                 $data = array(
            'email_username' => $username,
            'email_deposit_date' => $email_deposit_date,
                     'email_deposit_amount'=> $response_array[9],
                         'email_approved_or_disapproved_message'=>$emailcontent
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/depositapprovaldisapprovalemailtemplate', $data, TRUE);
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none'); 
 //$this->user_model->sendemailtonotifyuserofdepositstatus($userid,$response_array[0],$response_array[9]);


        }
         function senddepositconfirmrequest()
        {
         $this->load->model('deposit_model'); 
          $this->load->model('admin_model');
           $this->load->model('user_model');
        //  $this->non_adminmodel->checkifsufficientbalanceofuserexists();
          //$userid=$this->non_adminmodel->getuseridforpartnerapproval();
                
                 //echo $userid;
               //$databasebalance=$this->non_adminmodel->getuserbalance();
              // $balancependingtopartners=0;$balancependinginwithdrawaltable=0;
              // $balancependingtopartners=$this->non_adminmodel->getuserpendingbalance($userid);
              // $balancependinginwithdrawaltable=$this->non_adminmodel->getuserpendingbalanceinwithdrawaltable($userid);
              // $availablebalance=$databasebalance-$balancependingtopartners-$balancependinginwithdrawaltable;
                $this->deposit_model->registerdepositconfirm();
                 $to=$this->admin_model->getadminemail();
                //$fromname=$this->session->userdata('lotteryusername');
                 $fromname=$_SESSION['lotteryusername'];
                //$fromemail = $this->user_model->getuseremailbyusername($this->session->userdata('lotteryusername'));
                 $fromemail = $this->user_model->getuseremailbyusername($_SESSION['lotteryusername']);
               
                $username=$this->admin_model->getadminname();
                $subject=lang('lang_deposit_request_email_subject');
                 //$content= 'Hello '  .$username.'!!<br> '.$fromname.' has sent a deposit request of RD '.$this->input->post('deposit_amount'). '. on '.$this->input->post('diposit_date').'<br> Please respond by logging in with your admin account.';
         $data = array(
            'email_admin_username' => $username,
            'email_sender_username' => $fromname,
                     'email_deposit_amount'=>$this->input->post('deposit_amount'),
                         'email_deposit_request_date'=>$this->input->post('diposit_date')
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/depositrequestemailtemplate', $data, TRUE);
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');	
        // $this->admin_model->notifythemainadmin();  
          	
       $alladminwithroleid6=$this->admin_model->get_all_the_admin_with_role_id_6();
        foreach($alladminwithroleid6->result() as $row){
        $to=$row->otheradminemail;
    $data = array(
            'email_admin_username' => $row->username,
            'email_sender_username' => $fromname,
                     'email_deposit_amount'=>$this->input->post('deposit_amount'),
                         'email_deposit_request_date'=>$this->input->post('diposit_date')
            );
         $content = $this->parser->parse('emailtemplates/depositrequestemailtemplate', $data, TRUE);
         // $content= 'Hello '  .$row->username.'!!<br> '.$fromname.' has sent a deposit request of RD '.$this->input->post('deposit_amount'). '. on '.$this->input->post('diposit_date').'<br> Please respond by logging in with your admin account.';
           send_the_email($subject,$to,$fromemail,$fromname,$content,'none');
     }
          //$this->admin_model->notifyotheradminwithroleid6();  
          //$fromemail=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                $to = $this->user_model->getuseremailbyusername($_SESSION['lotteryusername']);
                $username=$_SESSION['lotteryusername'];
                $subject=lang('lang_deposit_pending_email_subject');
                //$content= 'Hello '  .$username.'!!<br> Your deposit request of Rs  '.$this->input->post('deposit_amount'). '. is pending and submitted to admin for approval.';
                 $data = array(
            'email_username' => $username,
           
                     'email_deposit_amount'=>$this->input->post('deposit_amount'),
                         'email_deposit_request_date'=>$this->input->post('diposit_date')
            );
                 
               
            $content = $this->parser->parse('emailtemplates/depositpendingemailtemplate', $data, TRUE);
                        send_the_email($subject,$to,'no-reply@tubanquita.com',$fromname,$content,'none');	
       echo json_encode(array('status'=>1,'message'=>'Su solicitud de depósito ha sido enviado al administrador para su aprobación'));
             
        
         
         
        }
         function depositwithpincard()
        {
            $this->load->model('user_model');
             $this->load->model('deposit_model');
 $userid=$this->user_model->getuseridforpartnerapproval();
 $pinstatus=$this->front_payment_model->getallpinstatusinfo();
 $usedmoney=$this->front_payment_model->gettheusedmoneyofpin();
 
 
 
 
          if($pinstatus!=0)
{
    //echo'approved';
    if($pinstatus > $usedmoney)
    {
        $transaction_id=$this->front_payment_model->addtothepintransactiontable($pinstatus-$usedmoney,$userid);
    $this->deposit_model->registerdeposit($transaction_id,$pinstatus-$usedmoney,'PIN');
       $this->user_model->addbalanceofuserdeposit($pinstatus-$usedmoney,$userid);  
        $this->front_payment_model->addtothepintransactiontable($pinstatus-$usedmoney,$userid);
        // echo'<br> Depósito exitosa';
           echo json_encode(array('status'=>1,'message'=>'Depósito exitosa'));
             
        
    }
    else 
    {
     // echo'<br> No balance in pin. Please recharge';  
      echo json_encode(array('status'=>2,'message'=>' No balance in pin. Please recharge'));
           
    }
                     
                     
                     
                    
                 
                       

}
else 
{
 //echo'<br> Invalid PIN';  
     echo json_encode(array('status'=>3,'message'=>'Invalid PIN'));
       
}
 
   
        }
        
    function checkuserpinbalance(){
             $this->load->model('user_model');
               $this->load->model('admin_model');
                 $this->load->model('partner_model');
                  $this->load->model('deposit_model');
               
             if(isset($_SESSION['lotteryusername'])){
                 
              
                 
                 
                 $userid=$this->user_model->getuseridforpartnerapproval();
                 $adminemail=$this->admin_model->getadminemail();
                 //echo $userid;
             //  $databasebalance=$this->non_adminmodel->getuserbalance();
               //$balancependingtopartners=0;$balancependinginwithdrawaltable=0;
             //  $balancependingtopartners=$this->non_adminmodel->getuserpendingbalance($userid);
               // $balancependinginwithdrawaltable=$this->non_adminmodel->getuserpendingbalanceinwithdrawaltable($userid);
              
               //echo $balancependingtopartners;
                  $pinstatus=$this->front_payment_model->getallpinstatusinfo();
 $usedmoney=$this->front_payment_model->gettheusedmoneyofpin();
 if($pinstatus!=0)
{
             $cartbalance=0;
                    $availablebalance=0;
                     $subtotal=0;$total=0;
	if(isset($_SESSION["betinfowithpartner"])&&count($_SESSION["betinfowithpartner"])>0)
    {
	   
	 

		
 
		foreach ($_SESSION["betinfowithpartner"] as $cart_itm){
   
                            
                               
                              
                    
       $subtotal+=  $cart_itm["bet_amount"];  
       //echo $cart_itm["announcement_id"];
    }
    
    $total=$subtotal;
     $cartbalance=$total;
     $availablebalance=$pinstatus-$usedmoney;
     if($availablebalance < $cartbalance)
     {
        echo json_encode(array('status'=>1,'message'=>'Not enough balance in the pin'));
     }
     else 
     {
         $this->load->library('parser');
         foreach ($_SESSION["betinfowithpartner"] as $cart_itm){
   
                            
                $this->partner_model->registerbetinfointopartnertable($cart_itm,$userid);
                $businesspartneremail= $this->partner_model->getbusinesspartneremail($cart_itm['partnerid']);
                $to= explode('/',$businesspartneremail)[0]; 
               // $to=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                //$fromname=$this->session->userdata('lotteryusername');
                $fromemail=$adminemail;
                //$fromemail = $this->user_model->getuseremailbyusername($this->session->userdata('lotteryusername'));
                //$username=$this->admin_model->getadminname();
                $subject=lang('lang_partner_bet_info_email_subject');
               $data = array(
            'email_partner_username' => explode('/',$businesspartneremail)[1],
            'email_customer_username' => $_SESSION['lotteryusername'],
                     'email_bet_amount'=>$cart_itm['bet_amount'],
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/betinfotopartneremailtemplate', $data, TRUE);
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
               // $this->partner_model->sendemailtopartnertonotifyaboutbets($adminemail,$businesspartneremail,$cart_itm);                     
                    
      
          }
          $_SESSION["betinfowithpartner"]=null;
           $pintransactionid = $this->front_payment_model->addtothepintransactiontable($availablebalance,$userid);
            if($availablebalance > $cartbalance)
            {
                    $this->deposit_model->registerdeposit($pintransactionid,$availablebalance-$cartbalance,'PIN');
                $this->user_model->addbalanceofuserdeposit($availablebalance-$cartbalance,$userid); 
            }
         echo json_encode(array('status'=>2,'message'=>'las apuestas se han presentado al Banco para su aprobación')); 
         
     }
    
    }
     else 
       {
              echo json_encode(array('status'=>3,'message'=>'Su cesta está vacía'));   
      }    
}//pin ma balance cha
else 
{
    echo json_encode(array('status'=>5,'message'=>'Invalid Pin')); 
}//pin ma balance chaina

        
             }//if user sesssion exists
             else 
             {
              echo json_encode(array('status'=>4,'message'=>'No ha iniciado sesión'));   
             }
         
            
    
        }
        
    function checkuserbalancewithexistingcard(){
             $this->load->model('user_model');
              $this->load->model('admin_model');
               $this->load->model('partner_model');
               $this->load->model('deposit_model');
             if(isset($_SESSION['lotteryusername'])){
                 
              
                 
                 
                 $userid=$this->user_model->getuseridforpartnerapproval();
                 $adminemail=$this->admin_model->getadminemail();
                              
	if(isset($_SESSION["betinfowithpartner"])&&count($_SESSION["betinfowithpartner"])>0)
    {
	         
                
                   $post_url = AUTHORIZE_DOT_NET_REDIRECT_URL;

$post_values = array(
	
	// the API Login ID and Transaction Key must be replaced with valid values
	"x_login"			=> $this->input->post('x_login'),
	"x_tran_key"		=> $this->input->post('x_tran_key'),
        "x_card_code"	=> $this->input->post('x_card_code'),
	"x_version"			=> "3.1",
	"x_delim_data"		=> "TRUE",
	"x_delim_char"		=> "|",
	"x_relay_response"	=> "FALSE",

	"x_type"			=> "AUTH_CAPTURE",
	"x_method"			=> "CC",
	"x_card_num"		=> $this->input->post('x_card_num'),
	"x_exp_date"		=> $this->input->post('x_exp_date'),

	"x_amount"			=> $this->input->post('x_amount'),
	
	// Additional fields can be added here as outlined in the AIM integration
	// guide at: http://developer.authorize.net
);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
foreach( $post_values as $key => $value )
	{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
$post_string = rtrim( $post_string, "& " );

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
/*
$line_items = array(
	"item1<|>golf balls<|><|>2<|>18.95<|>Y",
	"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
	"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
	
foreach( $line_items as $value )
	{ $post_string .= "&x_line_item=" . urlencode( $value ); }
*/

// This sample code uses the CURL library for php to establish a connection,
// submit the post, and record the response.
// If you receive an error, you may want to ensure that you have the curl
// library enabled in your php configuration
$request = curl_init($post_url); // initiate curl object
	curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	$post_response = curl_exec($request); // execute curl post and store results in $post_response
	// additional options may be required depending upon your server configuration
	// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close ($request); // close curl object

// This line takes the response and breaks it into an array using the specified delimiting character
$response_array = explode($post_values["x_delim_char"],$post_response);

// The results are output to the screen in the form of an html numbered list.
//echo "<OL>\n";
//echo "<LI>" . $response_array[3] . "&nbsp;</LI>";
//print_r($post_response);

 $userid=$this->user_model->getuseridforpartnerapproval();
if($response_array[0]==1)
{
    $this->load->library('parser'); 
 foreach ($_SESSION["betinfowithpartner"] as $cart_itm){
   
                            
                $this->partner_model->registerbetinfointopartnertable($cart_itm,$userid);
                $businesspartneremail= $this->partner_model->getbusinesspartneremail($cart_itm['partnerid']);
                $to= explode('/',$businesspartneremail)[0]; 
               // $to=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                //$fromname=$this->session->userdata('lotteryusername');
                $fromemail=$adminemail;
           $subject=lang('lang_partner_bet_info_email_subject');
 $data = array(
            'email_partner_username' => explode('/',$businesspartneremail)[1],
            'email_customer_username' => $_SESSION['lotteryusername'],
                     'email_bet_amount'=>$cart_itm['bet_amount'],
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/betinfotopartneremailtemplate', $data, TRUE);
              
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');     
               // $this->partner_model->sendemailtopartnertonotifyaboutbets($adminemail,$businesspartneremail,$cart_itm);                     
                    
      
          }
            $this->deposit_model->registerdeposit($response_array[6],$response_array[9],$response_array[51]);
            $this->user_model->addbalanceofuserdeposit($response_array[9],$userid);
          $_SESSION["betinfowithpartner"]=null;
         echo json_encode(array('status'=>2,'message'=>'las apuestas se han presentado al Banco para su aprobación')); 
                         

}
else 
{
 echo json_encode(array('status'=>5,'message'=>$response_array[3])); 
          
}
                    
       
	 

		
 
    
    
    
    }
     else 
       {
              echo json_encode(array('status'=>3,'message'=>'Su cesta está vacía'));   
      }
             }//if user sesssion exists
             else 
             {
              echo json_encode(array('status'=>4,'message'=>'No ha iniciado sesión'));   
             }
         
            
    
        }
       function checkuserbalance(){
             $this->load->model('user_model');
              $this->load->model('admin_model');
              $this->load->model('partner_model');
             
             if(isset($_SESSION['lotteryusername'])){
                 
              
                 
                 
                 $userid=$this->user_model->getuseridforpartnerapproval();
                 $adminemail=$this->admin_model->getadminemail();
                 //echo $userid;
               $databasebalance=$this->user_model->getuserbalance();
               $balancependingtopartners=0;$balancependinginwithdrawaltable=0;
               $balancependingtopartners=$this->user_model->getuserpendingbalance($userid);
                $balancependinginwithdrawaltable=$this->user_model->getuserpendingbalanceinwithdrawaltable($userid);
              
               //echo $balancependingtopartners;
                    $cartbalance=0;
                    $availablebalance=0;
                     $subtotal=0;$total=0;
	if(isset($_SESSION["betinfowithpartner"])&&count($_SESSION["betinfowithpartner"])>0)
    {
	   
	 

		
 
		foreach ($_SESSION["betinfowithpartner"] as $cart_itm){
   
                            
                               
                              
                    
       $subtotal+=  $cart_itm["bet_amount"];  
       //echo $cart_itm["announcement_id"];
    }
    
    $total=$subtotal;
     $cartbalance=$total;
     $availablebalance=$databasebalance-$balancependingtopartners-$balancependinginwithdrawaltable;
     if($availablebalance < $cartbalance)
     {
        echo json_encode(array('status'=>1,'message'=>'Usted no tiene un saldo suficiente . Su saldo actual es de RD: '.$databasebalance.'<br>Pending balance for partner approval is RD '.$balancependingtopartners.'<br>Balance pending for withdrawal RD: '.$balancependinginwithdrawaltable.'<br> Available balance RD '.$availablebalance));
     }
     else 
     {
         $this->load->library('parser'); 
         foreach ($_SESSION["betinfowithpartner"] as $cart_itm){
   
                            
                $this->partner_model->registerbetinfointopartnertable($cart_itm,$userid);
                $businesspartneremail= $this->partner_model->getbusinesspartneremail($cart_itm['partnerid']);
                $to= explode('/',$businesspartneremail)[0]; 
               // $to=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                //$fromname=$this->session->userdata('lotteryusername');
                $fromemail=$adminemail;
               
$subject=lang('lang_partner_bet_info_email_subject');
 $data = array(
            'email_partner_username' => explode('/',$businesspartneremail)[1],
            'email_customer_username' => $_SESSION['lotteryusername'],
                     'email_bet_amount'=>$cart_itm['bet_amount'],
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/betinfotopartneremailtemplate', $data, TRUE);
              
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
                   //$this->partner_model->sendemailtopartnertonotifyaboutbets($adminemail,$businesspartneremail,$cart_itm);                     
                    
      
          }
          $_SESSION["betinfowithpartner"]=null;
         echo json_encode(array('status'=>2,'message'=>'las apuestas se han presentado al Banco para su aprobación')); 
         
     }
    
    }
     else 
       {
              echo json_encode(array('status'=>3,'message'=>'Su cesta está vacía'));   
      }
             }//if user sesssion exists
             else 
             {
              echo json_encode(array('status'=>4,'message'=>'No ha iniciado sesión'));   
             }
         
            
    
        }
       
}