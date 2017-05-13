<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class lottofront extends CI_Controller {

    private $db_b;

    function __construct() {
        parent::__construct();
        // $this->load->library('session');
        $this->load->library('loadview');
        $this->load->model('non_adminmodel');
        //$this->db_b = $this->load->database('b', TRUE);
    }

    public function _remap($method, $otherarg) {
        $this->load->model('configuration_model');
        $data['adminsetting'] = $this->configuration_model->getadminsetting();
        // print_r($data);
        $onoffstatus = '';
        foreach ($data['adminsetting'] as $row) {

            $onoffstatus = $row['website_status'];
        }
        if ($onoffstatus == 'online') {
            //$this->$method($otherarg);
            if ($otherarg) {
                //echo $method . $otherarg;
                $this->$method($otherarg[0]);
            }
            //$this->$method($otherarg);
            else
                $this->$method();
        }
        else {
            $this->offlinepage();
        }
    }

    public function offlinepage() {
        $this->load->model('configuration_model');
        $users['results'] = $this->configuration_model->getadminsettingobject();
        $this->load->view('nonadmin/offlineview', $users);
    }

    public function index() {
        $this->load->model('result_model');
        $users['results'] = $this->result_model->getfivelatestresults();
        $users['countresults'] = $this->result_model->getcountofeachannouncement();
        //print_r( $users['countresults']);
        
        $users['pageno'] = lang('lang_index_id');
        $this->loadview->loaderfirst('nonadmin/index', $users);
    }

    public function unsubscribelottosubscription($subscribeduserid) {

        $this->load->model('subscription_model');

        // print_r($data);
        // $Emailsubject='';

        $this->subscription_model->unsubscribelottosubscription($subscribeduserid);
        echo 'successfully unsubscribed<br>';
        echo 'Haga clic aquí para visitar el sitio de la lotería:<a href="' . base_url() . '">Loteria</a>';
    }

    public function subscribeuser() {

        $this->load->model('subscription_model');
        $this->load->model('admin_model');

        // print_r($data);
        // $Emailsubject='';

        $email_available = $this->subscription_model->check_if_subscribedemail_exists($this->input->post('email'));
        if ($email_available) {

            $subscribedornot = $this->subscription_model->check_if_subscribedemail_unsubscribed();
            if (!$subscribedornot) {
                echo 'correo electrónico ya exisits';
            } else {
                $this->subscription_model->updatesubscribeduserstatus();
                $subscriptioncontent = $this->subscription_model->getcurrentsubscriptioncontentfront();
                $AdminEmail = $this->admin_model->getadminemail();
                $subscribeduserid = $this->subscription_model->getsubscribeduserid();
                $to=$this->input->post('email');
                $fromname=$this->admin_model->getadminname();
               //$subject='Lotto Subscription';
               $fromemail=$AdminEmail;
              // $content='You have successfully subscribed.<br> To unsubscribe Please Click this link below:<br>'.  base_url().'lottofront/unsubscribelottosubscription/'.$subscribeduserid;
               $this->load->library('parser'); 
$subject=lang('lang_subscriber_registration_email_subject');
 $data = array(
            'email_unsubscribe_link' => base_url().'lottofront/unsubscribelottosubscription/'.$subscribeduserid,
           
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/subsriberregistrationemailtemplate', $data, TRUE);
               
               send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
               //$this->subscription_model->pushsubscriptionforcurrentemailfront($AdminEmail, $subscriptioncontent, $subscribeduserid);
            }
        } else {

            $this->subscription_model->addsubscribeduserinfofront();
            $subscriptioncontent = $this->subscription_model->getcurrentsubscriptioncontentfront();
            $AdminEmail = $this->admin_model->getadminemail();
            $subscribeduserid = $this->subscription_model->getsubscribeduserid();
            $to=$this->input->post('email');
                $fromname=$this->admin_model->getadminname();
               //$subject='Lotto Subscription';
               $fromemail=$AdminEmail;
              // $content='You have successfully subscribed.<br> To unsubscribe Please Click this link below:<br>'.  base_url().'lottofront/unsubscribelottosubscription/'.$subscribeduserid;
               
               $this->load->library('parser'); 
$subject=lang('lang_subscriber_registration_email_subject');
 $data = array(
            'email_unsubscribe_link' => base_url().'lottofront/unsubscribelottosubscription/'.$subscribeduserid,
           
                       
            );
                 
                 
            $content = $this->parser->parse('emailtemplates/subsriberregistrationemailtemplate', $data, TRUE);
               
            
               send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
            
            //$this->subscription_model->pushsubscriptionforcurrentemailfront($AdminEmail, $subscriptioncontent, $subscribeduserid);
        }
    }

    function setsessionforviewticketofthecurrentbets($ticketno) {
        $this->load->model('bethistory_model');
        $users['result'] = $this->bethistory_model->getusercurrentbethistoryofparticularticketno($ticketno);


        $this->loadview->loaderfirst('nonadmin/viewticketofcurrentbets', $users);
    }

    public function deletelottofrontcurrentbethistory($serology_id) {

        $this->load->model('bethistory_model');
        $this->bethistory_model->deletebethistory($serology_id);
        $walletbalance = 0;
        $this->load->model('non_adminmodel');
        $data['multipleinfo'] = $this->non_adminmodel->checksufficientbalance();

        foreach ($data['multipleinfo'] as $row) {

            $walletbalance = $row['wallet_balance'];
            //break;
        }
        $remainingbalance = $walletbalance + $this->input->post('lfbetamount');
        $this->non_adminmodel->updateuserbalance($remainingbalance);
    }

    function playgame() {
        $this->load->model('user_model');

        $walletbalance = 0;
        $data['multipleinfo'] = $this->non_adminmodel->checksufficientbalance();

        foreach ($data['multipleinfo'] as $row) {

            $walletbalance = $row['wallet_balance'];
            //break;
        }
        //echo json_encode(array('status' => 1, 'message' => $walletbalance)); 
        if ($walletbalance >= $this->input->post('bet_amount')) {
            $remainingbalance = $walletbalance - $this->input->post('bet_amount');
            $this->non_adminmodel->updateuserbalance($remainingbalance);

            $better_id = $this->user_model->getuserid($_SESSION['lotteryuser']);

            $this->non_adminmodel->playgame($better_id);
            echo json_encode(array('status' => 1, 'message' => 'Su apuesta se ha presentado para su aprobación'));
        } else {
            echo json_encode(array('status' => 0, 'message' => 'Saldo de la cuenta es insuficiente:'));
            //echo 'Insufficient balance in the wallet'; 
        }
    }

    function lotterylogout() {
        //session_destroy();
        //$this->session->unset_userdata('lotteryuser');
        //$this->session->unset_userdata('lotteryusername');
         unset($_SESSION["lotteryuser"]);
          unset($_SESSION["lotteryusername"]);
        unset($_SESSION["betinfo"]);
        unset($_SESSION["betinfowithpartner"]);
        $this->load->model('gametype_model');
        $this->load->model('lotterygame_model');
        $users['lotteryresult'] = $this->lotterygame_model->getallcurrentlotteryinfo();
        $users['gametyperesult'] = $this->gametype_model->getgametypeinfo();
        //$this->loadview->loaderfirst('nonadmin/index',$users);
        redirect(base_url(), $users);
    }

   

    function check_if_no_is_positive($requested_amount) {
        echo $requested_amount;


        if ($requested_amount > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_if_no_is_positive', 'La cantidad debe ser mayor que 0');
            return FALSE;
        }
    }

    function sendwithdrawrequest() {
        $this->load->model('user_model');
        $this->load->model('admin_model');
        //  $this->non_adminmodel->checkifsufficientbalanceofuserexists();
        $userid = $this->user_model->getuseridforpartnerapproval();

        //echo $userid;
        $databasebalance = $this->user_model->getuserbalance();
        $balancependingtopartners = 0;
        $balancependinginwithdrawaltable = 0;
        $balancependingtopartners = $this->user_model->getuserpendingbalance($userid);
        $balancependinginwithdrawaltable = $this->user_model->getuserpendingbalanceinwithdrawaltable($userid);
        $availablebalance = $databasebalance - $balancependingtopartners - $balancependinginwithdrawaltable;
        if ($this->input->post('withdraw_amount') <= $availablebalance) {
            $this->non_adminmodel->registerwithdrawal();
              $to=$this->admin_model->getadminemail();
                $fromname=$_SESSION['lotteryusername'];
                $fromemail = $this->user_model->getuseremailbyusername($_SESSION['lotteryusername']);
                $username=$this->admin_model->getadminname();
                   $subject=lang('lang_withdrawal_request_email_subject');
                 //$content= 'Hello '  .$username.'!!<br> '.$fromname.' has sent a deposit request of RD '.$this->input->post('deposit_amount'). '. on '.$this->input->post('diposit_date').'<br> Please respond by logging in with your admin account.';
         $data = array(
            'email_admin_username' => $username,
            'email_sender_username' => $fromname,
                     'email_withdraw_amount'=>$this->input->post('withdraw_amount'),
                         'email_withdraw_request_date'=>$this->input->post('withdraw_date')
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/withdrawalrequestemailtemplate', $data, TRUE);
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');
                    $fromemail=$this->admin_model->getadminemail();
                $fromname=$this->admin_model->getadminname();
                $to = $this->user_model->getuseremailbyusername($_SESSION['lotteryusername']);
                $username=$_SESSION['lotteryusername'];
               // $subject='Withdrawal Pending';
               // $content= 'Hello '  .$username.'!!<br> Your Withdrawal request of Rs  '.$this->input->post('withdraw_amount'). '. is pending and submitted to admin for approval.';
                 $subject=lang('lang_withdrawal_pending_email_subject');
                 $data = array(
            'email_username' => $username,
           
                     'email_withdraw_amount'=>$this->input->post('withdraw_amount'),
                         'email_withdraw_request_date'=>$this->input->post('withdraw_date')
            );
                 
               
            $content = $this->parser->parse('emailtemplates/withdrawalpendingemailtemplate', $data, TRUE);
                        send_the_email($subject,$to,'no-reply@tubanquita.com',$fromname,$content,'none');	
           // $this->non_adminmodel->notifytheadmin();
            echo json_encode(array('status' => 1, 'message' => 'Su solicitud de retiro ha sido enviado al administrador para su aprobación'));
        } else {
            echo json_encode(array('status' => 2, 'message' => 'Usted no tiene saldo suficiente.<br> Su saldo actual RD: ' . $databasebalance . '<br>Balance pending to partners RD: ' . $balancependingtopartners . '<br>Balance pending for withdrawal RD: ' . $balancependinginwithdrawaltable . '<br>Saldo disponible es RD: ' . $availablebalance));
        }
    }

    function sendemailforfaq() {
        $this->load->model('configuration_model');
        $data['adminsetting'] = $this->configuration_model->getadminsetting();
        ;
        // print_r($data);
        $AdminEmail = '';
        //$Emailsubject='';
        foreach ($data['adminsetting'] as $row) {

            $AdminEmail = $row['admin_email'];
            // $Emailsubject=$row['email_subject'];
        }
        $this->load->library('email');

        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to($AdminEmail);
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('FAQ Enquiries');
        $this->email->message($this->input->post('message'));
        $param = '';
        if ($this->email->send())
            echo"Email enviado con éxito";
        else
            echo "Error al enviar el correo";

        //$this->loadview->loaderfirst('nonadmin/page-faq', $param);
    }

    function sendemail() {
        $this->load->model('configuration_model');
        $data['adminsetting'] = $this->configuration_model->getadminsetting();
        // print_r($data);
        $AdminEmail = '';
        $Emailsubject = '';
        foreach ($data['adminsetting'] as $row) {

            $AdminEmail = $row['admin_email'];
            $Emailsubject = $row['email_subject'];
        }
        $this->load->library('email');

        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to($AdminEmail);
        // $this->email->bcc('them@their-example.com');

        $this->email->subject($Emailsubject);
        $this->email->message($this->input->post('message'));
        $param = '';
        if ($this->email->send())
            echo"Email enviado con éxito";
        else
            echo"Error al enviar el correo";

        //$this->loadview->loaderfirst('nonadmin/page-contact', $param);
    }

    function getthedamnlotodetailshoney() {
        $this->load->model('non_adminmodel');

        $data['serology_details'] = $this->non_adminmodel->getthedamnlotodetailshoney();
        if ($data['serology_details']) {
            foreach ($data['serology_details'] as $row) {
                $serology_details = array
                    (
                    'lottery_announcement_detail_id' => $row['lottery_announcement_detail_id'],
                    'lotto_group_name' => $row['lotto_group_name'],
                    'game_name' => $row['game_name'],
                    'minbet' => $row['minbet'],
                    'maxbet' => $row['maxbet'],
                    'gameicon' => $row['gameicon'],
                    'all' => $row['lottery_announcement_detail_id'] . '/' . $row['lotto_group_name'] . '/' . $row['game_name'] . '/' . $row['minbet'] . '/' . $row['maxbet'] . '/' . $row['gameicon'],
                );
            }
            //echo json_encode($serology_details);
            echo $row['game_name'] . '/' . $row['lotto_group_name'] . '/' . $row['minbet'] . '/' . $row['maxbet'] . '/' . $row['lottery_announcement_detail_id'] . '/' . $row['gameicon'];
        } else {
            echo 'kehichaina';
        }
    }

    function pages($pageid) {
        
       
           
        $users = null;
        if ($pageid == lang("lang_faq_alias")) {
            $this->load->model('faq_model');
            $users['result'] = $this->faq_model->getallfaq();
            $users['pageno'] = lang("lang_faq_id");
            //$this->load->view('nonadmin/page-faq',$users);
            $this->loadview->loaderfirst('nonadmin/page-faq', $users);
        } else if ($pageid == lang("lang_loteria_alias")) {

            // $this->load->view('nonadmin/product-loteria'); 
            if (isset($_SESSION['lotteryuser'])) {
                $users['pageno'] = lang("lang_loteria_id");
                $this->load->model('user_model');

                $this->load->model('lotogroup_model');
                $this->load->model('lotterygame_model');

                $this->load->model('gametype_model');
                $this->load->model('partner_model');
                $users['lotogroupresult'] = $this->lotogroup_model->getallcurrentlotogroupinfo();
                $users['lotteryresult'] = $this->lotterygame_model->getallcurrentlotteryinfo();
                $users['lotteryresultnoofrows'] = $this->lotterygame_model->getallcurrentlotteryinfonoofrows();
                $users['gametyperesult'] = $this->gametype_model->getgametypeinfo();
                $users['partnerresult'] = $this->partner_model->getbusinesspartnerinfo();


                $users['favbanca'] = $this->user_model->getfavouritebancaofuser();
                $users['walletbalance'] = $this->user_model->getwalletbalanceofuser();
                $this->loadview->loaderfirst('nonadmin/product-loteria', $users);
            } else {

                $this->index();
            }
        } else if ($pageid == lang("lang_aboutus_alias")) {
            $users['pageno'] = lang("lang_aboutus_id");

            //$this->load->view('nonadmin/page-about-us'); 
            $this->loadview->loaderfirst('nonadmin/page-about-us', $users);
        } else if ($pageid == lang("lang_consortia_alias")) {
            $users['pageno'] = lang("lang_team_id");

            //$this->load->view('nonadmin/page-team'); 
            $this->loadview->loaderfirst('nonadmin/page-team', $users);
        } else if ($pageid == lang("lang_result_alias")) {
            $users['pageno'] = lang("lang_results_id");

            $this->load->model('result_model');
            $this->load->model('lotogroup_model');

            // $limit=5;
            $start_date = 0;
            $end_date = 0;
            $users['startdate'] = 0;
            $users['enddate'] = 0;
            $users['differencebetweentwodates'] = 0;
            if (isset($_GET['start'])) {
                //$now = strtotime($_GET['start']); // or your date as well
                //$your_date = strtotime($_GET['end']);
                //$datediff = $now - $your_date;
                //  $users['differencebetweentwodates']= floor($datediff/(60*60*24));


                $users['differencebetweentwodates'] = $_GET['active'];

                $start_date = $_GET['start'];
                $end_date = $_GET['end'];
                $users['startdate'] = $_GET['start'];
                $users['enddate'] = $_GET['end'];
                if (explode('-', $_GET['start'])[1] == 1) {
                    $users['displaystartdate'] = 'January ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 2) {
                    $users['displaystartdate'] = 'February ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 3) {
                    $users['displaystartdate'] = 'March ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 4) {
                    $users['displaystartdate'] = 'April ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 5) {
                    $users['displaystartdate'] = 'May ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 6) {
                    $users['displaystartdate'] = 'June ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 7) {
                    $users['displaystartdate'] = 'JUly ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 8) {
                    $users['displaystartdate'] = 'August ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 9) {
                    $users['displaystartdate'] = 'September ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 10) {
                    $users['displaystartdate'] = 'October ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 11) {
                    $users['displaystartdate'] = 'November ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                } else if (explode('-', $_GET['start'])[1] == 12) {
                    $users['displaystartdate'] = 'December ' . explode('-', $_GET['start'])[2] . ', ' . explode('-', $_GET['start'])[0];
                }
                if (explode('-', $_GET['end'])[1] == 1) {
                    $users['displayenddate'] = 'January ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 2) {
                    $users['displayenddate'] = 'February ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 3) {
                    $users['displayenddate'] = 'March ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 4) {
                    $users['displayenddate'] = 'April ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 5) {
                    $users['displayenddate'] = 'May ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 6) {
                    $users['displayenddate'] = 'June ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 7) {
                    $users['displayenddate'] = 'JUly ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 8) {
                    $users['displayenddate'] = 'August ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 9) {
                    $users['displayenddate'] = 'September ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 10) {
                    $users['displayenddate'] = 'October ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 11) {
                    $users['displayenddate'] = 'November ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                } else if (explode('-', $_GET['end'])[1] == 12) {
                    $users['displayenddate'] = 'December ' . explode('-', $_GET['end'])[2] . ', ' . explode('-', $_GET['end'])[0];
                }
            }
            $total = $this->result_model->getlotteryresultsno(0, $start_date, $end_date);

            //$pages = ceil($total / $limit);
            //$this->load->view('nonadmin/page-results'); 
            //$page=1;
            // if(isset($_GET['page']))
            //$page = $_GET['page'];
            //$offset = ($page - 1)  * $limit;
            // $start = 1;
            //$end = min(($offset + $limit), $total);
            //$prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="First page"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Previous page"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';
            // The "forward" link
            //$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Next page"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="Last page"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';
            // Calculate the offset for the query

            $users['noofrows'] = $total;
            //$users['thepage']=$page;
            // $users['theoffset']=$offset;
            //$users['theprevlink']=$prevlink;
            $users['thelimit'] = 5;

            if (isset($_GET['limit']))
                $users['thelimit'] = $_GET['limit'];
            $users['thestart'] = 1;
            $users['theend'] = $users['thelimit'];
            if ($users['theend'] > $users['noofrows'])
                $users['theend'] = $users['theend'] - ($users['theend'] - $users['noofrows']);

            $users['result'] = $this->result_model->getlotteryresults($offset = 0, 0);
            $users['lotogroups'] = $this->lotogroup_model->getlotogroups();

            $this->loadview->loaderfirst('nonadmin/page-results', $users);
        }
        else if ($pageid == lang("lang_contactus_alias")) {
            $users['pageno'] = lang("lang_contactus_id");

            $this->load->model('non_adminmodel');
            $users['result'] = $this->non_adminmodel->getmenubyid($pageid);
            $this->loadview->loaderfirst('nonadmin/page-contact', $users);
        } else if ($pageid == lang("lang_home_alias")) {
            $this->index();
        } else {
            $this->load->model('non_adminmodel');
            $users['pagecontent'] = $this->non_adminmodel->getthecontentofotherpages($pageid);
            if ($users['pagecontent'] != 0)
                $this->loadview->loaderfirst('nonadmin/commontemplate', $users);
            else {
                $this->index();
            }
        }

        // $this->load->view('nonadmin/footer');
    }

    function setalldatemydear() {
        print_r($this->input->post('tomdate'));
        $infodate = $this->input->post('tomdate');
        $infodatenextweek = $this->input->post('nextweekkolagitoday');
        $res = explode('-', $infodate);
        //$ajakodatematraarray=explode('-', $infodatenextweek);
        $resnextweek = explode('-', $infodatenextweek);
        //print_r($res);
        $tomyear = $res[0]; // $tomminusoneyear=$ajakodatematraarray[0];
        $tommonth = $res[1]; // $tomminusonemonth=$ajakodatematraarray[1];
        $tomdate = $res[2]; // $tomminusonedate=$ajakodatematraarray[2];
        $nextweekyear = $resnextweek[0];
        $nextweekmonth = $resnextweek[1];
        $nextweekdate = $resnextweek[2];
        $thetodayday = $this->input->post('theday');
        if ($tommonth == 1) {
            $tommonth = 'January';
        } else if ($tommonth == 2) {
            $tommonth = 'February';
        } else if ($tommonth == 3) {
            $tommonth = 'March';
        } else if ($tommonth == 4) {
            $tommonth = 'April';
        } else if ($tommonth == 5) {
            $tommonth = 'May';
        } else if ($tommonth == 6) {
            $tommonth = 'June';
        } else if ($tommonth == 7) {
            $tommonth = 'July';
        } else if ($tommonth == 8) {
            $tommonth = 'August';
        } else if ($tommonth == 9) {
            $tommonth = 'September';
        } else if ($tommonth == 10) {
            $tommonth = 'October';
        } else if ($tommonth == 11) {
            $tommonth = 'November';
        } else if ($tommonth == 12) {
            $tommonth = 'December';
        }
        if ($nextweekmonth == 1) {
            $nextweekmonth = 'January';
        } else if ($nextweekmonth == 2) {
            $nextweekmonth = 'February';
        } else if ($nextweekmonth == 3) {
            $nextweekmonth = 'March';
        } else if ($nextweekmonth == 4) {
            $nextweekmonth = 'April';
        } else if ($nextweekmonth == 5) {
            $nextweekmonth = 'May';
        } else if ($nextweekmonth == 6) {
            $nextweekmonth = 'June';
        } else if ($nextweekmonth == 7) {
            $nextweekmonth = 'July';
        } else if ($nextweekmonth == 8) {
            $nextweekmonth = 'August';
        } else if ($nextweekmonth == 9) {
            $nextweekmonth = 'September';
        } else if ($nextweekmonth == 10) {
            $nextweekmonth = 'October';
        } else if ($nextweekmonth == 11) {
            $nextweekmonth = 'November';
        } else if ($nextweekmonth == 12) {
            $nextweekmonth = 'December';
        }
        // January 17, 2015 11:55:00
        //$infodatearray= $infodate.
        echo session_save_path();
        echo CI_VERSION;
       // $this->session->set_userdata('thetomminusonedate', $nextweekmonth . ' ' . $nextweekdate . ', ' . $nextweekyear);
        $_SESSION['thetomminusonedate']= $nextweekmonth . ' ' . $nextweekdate . ', ' . $nextweekyear;
        //$this->session->set_userdata('thetomdate', $tommonth . ' ' . $tomdate . ', ' . $tomyear);
         $_SESSION['thetomdate']= $tommonth . ' ' . $tomdate . ', ' . $tomyear;
       
      //  $this->session->set_userdata('thenextweekdate', $infodatenextweek);
        $_SESSION['thetomdate']=$infodatenextweek;
        
        //$this->session->set_userdata('thetodayday', $thetodayday);
         $_SESSION['thetodayday']=$thetodayday;
        
       // $this->session->set_userdata('aajakodatetime', $this->input->post('aajakodatetime'));
         $_SESSION['aajakodatetime']=$this->input->post('aajakodatetime');
        // $_SESSION["aajakodatetime"] = $this->input->post('aajakodatetime');
    }

    function myaccountaddresses() {


        //$this->load->view(''); 
        $this->loadview->loaderfirst('nonadmin/page-my-account-addresses');
    }

    function myaccountdash() {


        // $this->load->view('nonadmin/page-my-account-dash'); 
        $this->loadview->loaderfirst('nonadmin/page-my-account-dash');
    }

    function myaccountwishlist() {


        //$this->load->view('nonadmin/page-my-account-wishlist'); 
        $this->loadview->loaderfirst('nonadmin/page-my-account-wishlist');
    }

    function myaccountsettings() {


        //$this->load->view('nonadmin/page-my-account-settings'); 
        $this->loadview->loaderfirst('nonadmin/page-my-account-settings');
    }

    function myaccountorders() {


        //$this->load->view('nonadmin/page-my-account-orders'); 
        $this->loadview->loaderfirst('nonadmin/page-my-account-orders');
    }

    function home() {

        $this->index();
    }

    function pagehow() {
        //$this->load->view('nonadmin/page-how'); 
        $this->loadview->loaderfirst('nonadmin/page-how');
    }

    function pagecheckout() {
        //$this->load->view('nonadmin/page-checkout'); 
        //if($this->session->userdata('lotteryuser'))
        //{ 
        $this->load->model('user_model');
        $this->load->model('front_creditcard_model');

        //$better_id=$this->non_adminmodel->getuserid($this->session->userdata('lotteryuser'));
        //$users['threerecentbets']= $this->non_adminmodel->gettworecentbets($better_id,3);
        //$users['balanceofaccounts']=$this->non_adminmodel->getuseraccountbalance($better_id);
        // $users['totalcurrentbetamounts']=$this->non_adminmodel->gettotalbetamountcurrent($better_id);
        // $users['totalwinamounts']=$this->non_adminmodel->gettotalwinamount($better_id);
        // $users['totaldeposit']=$this->non_adminmodel->gettotaldeposit($better_id);
        //$users['totalwithdrawal']=$this->non_adminmodel->gettotalwithdrawal($better_id);
        $users['walletbalance'] = 0;
        if (isset($_SESSION['lotteryuser'])) {
            $users['walletbalance'] = $this->user_model->getwalletbalanceofuser();
            $users['currentcreditcards'] = $this->front_creditcard_model->getcurrentcreditcards();
        }
        $users['apiloginidandtransactionkey'] = $this->non_adminmodel->gettheloginidandtransactionkey();

        if (isset($_SESSION["betinfowithpartner"]) && count($_SESSION["betinfowithpartner"]) > 0) {
            $this->loadview->loaderfirst('nonadmin/page-checkout', $users);
        } else {
            $this->loadview->loaderfirst('nonadmin/page-cart');
        }

        //$this->loadview->loaderfirst('nonadmin/page-checkout');
    }

    function lottery() {
        //$this->load->view('nonadmin/product-loteria'); 
        $this->loadview->loaderfirst('nonadmin/product-loteria');
    }

    function aboutus() {
        //$this->load->view('nonadmin/page-about-us'); 
        $this->loadview->loaderfirst('nonadmin/page-about-us');
    }

    function faq() {
        $this->load->model('non_adminmodel');
        $users['result'] = $this->non_adminmodel->getallfaqs();
        //$this->load->view('nonadmin/page-faq',$users); 
        $this->loadview->loaderfirst('nonadmin/page-faq', $users);
    }

    function consortia() {
        //$this->load->view('nonadmin/page-team'); 
        $this->loadview->loaderfirst('nonadmin/page-team');
    }

    function result() {
        //$this->load->view('nonadmin/page-results'); 
        $this->loadview->loaderfirst('nonadmin/page-results');
    }

    function contact() {
        // $this->load->view('nonadmin/page-contact'); 
        $this->loadview->loaderfirst('nonadmin/page-contact');
    }

    function privacidad() {
        // $this->load->view('nonadmin/page-privacidad'); 
        $this->loadview->loaderfirst('nonadmin/page-privacidad');
    }

    function politicas() {
        // $this->load->view('nonadmin/page-politicas-de-uso'); 
        $this->loadview->loaderfirst('nonadmin/page-politicas-de-uso');
    }

    function sitemap() {
        // $this->load->view('nonadmin/page-sitemap'); 
        $this->loadview->loaderfirst('nonadmin/page-sitemap');
    }

    function moneyorder() {
        // $this->load->view('nonadmin/page-moneyorder'); 
        $this->loadview->loaderfirst('nonadmin/page-moneyorder');
    }

    function confirmdeposit() {
        // $this->load->view('nonadmin/confirmdeposit'); 

        if (isset($_SESSION['lotteryuser'])) {
            $this->loadview->loaderfirst('nonadmin/confirmdeposit');
        } else {
            $this->index();
        }
    }

}
