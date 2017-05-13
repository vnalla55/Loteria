<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bethistory extends CI_Controller{
     public $partner_id=0;
      public $classkoadminmodulepermission = '';
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('bethistory_model');
       
 $this->load->library('loadadminview');
                   
                     $this->load->model('admin_model');
                      $this->load->model('partner_model');
         if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            //the role associated with the otheradmin
//echo 'constructor';
            $admin_id = $this->admin_model->getotheradminid($_SESSION['lottobackendusername']);
            $this->classkoadminmodulepermission = $this->admin_model->getadminmodulepermission($admin_id);
      
            }
            else if($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner'){
                 $this->partner_id = $this->partner_model->getbusinesspartnerid($_SESSION['lottobackendusername']); 
            }
     }
                   
                 
               
}
public function getbethistoryfordatatable(){
    $this->bethistory_model->getallbethistorylistfordatatable($this->classkoadminmodulepermission);
   
}
public function getpassedpartnerbethistoryfordatatable(){
    $this->bethistory_model->getallpassedpartnerbethistorylistfordatatable($this-> partner_id);
   
}
public function getcurrentpartnerbethistoryfordatatable(){
    $this->bethistory_model->getallcurrentpartnerbethistorylistfordatatable($this-> partner_id);
   
}

public function passedpartnerhistory(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner') 
           {
     
            $users['pagetitle']= lang('lang_partner_passed_history_page_title');              
        $users['menuactiveornot']= 'historialdejugadas-historialdejugadas-passedpartnerhistory';
    
          $this->loadadminview->loaderfirst('admin/passedpartnerhistory', $users);
     
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
public function currentpartnerhistory(){
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner') 
           {
     
          $users['pagetitle']= lang('lang_partner_current_history_page_title');               
        $users['menuactiveornot']= 'historialdejugadas-historialdejugadas-currentpartnerhistory';
    
          $this->loadadminview->loaderfirst('admin/currentpartnerhistory', $users);
     
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
public function index(){
    
     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin') 
           {
     
           if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          $users['adminmodulepermission'] = $this->classkoadminmodulepermission;
                if ($this->classkoadminmodulepermission[8]['viewtask'] == 0)
                    redirect(base_url() . 'admin/dashboard');
            }

           
                         $users['pagetitle']= lang('lang_bet_history_page_title');        
        $users['menuactiveornot']= 'historialdejugadas-historialdejugadas-bethistory';
      
          $this->loadadminview->loaderfirst('admin/bethistory', $users);
     
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

 public function deletebethistory($bethistory_id)
	{
      
                    // $this->load->model('admin_model');
                        $this->bethistory_model->deletebethistory($bethistory_id);
			
			
				
	}
 public function addbethistory()
	{
       $this->load->model('non_adminmodel');
          
  $ticketno=$this->non_adminmodel->getticketno();
                     //$this->load->model('admin_model');
                     $this->bethistory_model->addbethistoryinfo($this->partner_id,$ticketno);
			
			
				
	}
 public function updatebethistory($bethistory_id)
	{
      
                     //$this->load->model('admin_model');
                        $this->bethistory_model->updatebethistoryinfo($bethistory_id);
			
			
				
	}
 
       
     function exportbethistory($currentorhistory)
    {
      // $this->load->model('admin_model');
        //   header('Content-Type: text/html; charset=utf-8');
     $users=$this->bethistory_model->getallbethistorytoexport($this->partner_id,$currentorhistory);
     //print_r( $users);
    $this->load->library('excel');
    
    $this->excel->create_excel($users);
    $this->load->helper('download');
   $data = file_get_contents("./tempexcel/bethistory.xls"); // Read the file's contents
          // $data = 'Here is some text!';
$name = 'bethistory.xls';

force_download($name, $data); 
        //$this->load->view('bethistorylist',$users); 
    }
   
    public function approvedisapproveuserbybusinesspartner($bet_id_forpartnerplusadflag)
	{
      
                     $this->load->model('user_model');
                     //$approvalflag= $this->admin_model->getapprovalstatusbybethistoryid($bethistory_id);
                     
                   //  if($approvalflag==1)
                        // $approvalflag=0;
                    // else 
                         //$approvalflag=1;
                     
                     $bet_id_forpartnerplusadflagarray=explode('-',$bet_id_forpartnerplusadflag);
                      if($bet_id_forpartnerplusadflagarray[1]==1)
    {
     $announcementidnbetdate = $this->bethistory_model->getannouncementidandbetdate($bet_id_forpartnerplusadflagarray[0]);
			$announcementidstatus=$this->bethistory_model->getannouncementidstatus($announcementidnbetdate[0]);
                        //print_r( $announcementidstatus);
                        
                        $dailytime='';$drawingday='';$weeklytime='';$amtime='';$pmtime='';$onetimedatetime='';$validupto='';
                        $validupto=$announcementidstatus[7];
                        $validuptohourarray= explode(':',$validupto);
                        $therequiredyeardate='';$therequiredtime='';
                        $thefinaldatetime='';
			if($announcementidstatus[0]=='daily')
                        {
                          $dailytime=$announcementidstatus[1]; 
                          $therequiredyeardate=$this->input->post('todaykodate');
                          $therequiredtime=$dailytime;
                          $thefinaldatetime=$therequiredyeardate.' '.$therequiredtime;
                        }
                        else if($announcementidstatus[0]=='ampm')
                        {
                         $amtime=$announcementidstatus[4];
                         $pmtime=$announcementidstatus[5]; 
                         $therequiredyeardate=$this->input->post('todaykodate');
                         if($this->input->post('ampm')=='am')
                          $therequiredtime=$amtime;
                         else 
                              $therequiredtime=$pmtime;
                          $thefinaldatetime=$therequiredyeardate.' '.$therequiredtime;
                        }
                        else if($announcementidstatus[0]=='onetime')
                        {
                        $onetimedatetime=$announcementidstatus[6];
                          $thefinaldatetime=$onetimedatetime;
                        }
                         else if($announcementidstatus[0]=='weekly')
                        {
                        $weeklytime=$announcementidstatus[3];
                        $drawingday=$announcementidstatus[2];
                        $therequiredtime=$weeklytime;
                        $databaseday=0;$theoffsetday=0;
                                       $todayday = $this->input->post('theday');
                                       //echo '<br>the today day:'.$todayday;
                                       if($drawingday=='sunday')
                                           $databaseday=1;
                                       else if($drawingday=='monday')
                                           $databaseday=2;
                                        else if($drawingday=='tuesday')
                                           $databaseday=3;
                                         else if($drawingday=='wednesday')
                                           $databaseday=4;
                                          else if($drawingday=='thursday')
                                           $databaseday=5;
                                           else if($drawingday=='friday')
                                           $databaseday=6;
                                            else if($drawingday=='saturday')
                                           $databaseday=7;
                                            //echo $todayday.'ani'.$databaseday;
                                            if($todayday-$databaseday > 0)
                                            {
                                              $theoffsetday=7-($todayday-$databaseday);
                                            }
                                            else if($todayday-$databaseday == 0){
                                                $theoffsetday=0;
                                            }
                                            else if($todayday-$databaseday < 0){
                                               $theoffsetday= abs(($todayday-$databaseday));
                                            }
                                           // echo 'the offset day:'.$theoffsetday;
                                            $format = 'Y-m-d';
                                           $therawdate = date($format, strtotime('+'.$theoffsetday.'day',strtotime($this->input->post('todaykodate'))));
                                       //echo '<br>the raw date'.$therawdate;
                                           $therequiredyeardate=$therawdate;
                                       $thefinaldatetime=$therequiredyeardate.' '.$therequiredtime;
                         
                        }
                        
                       //echo $this->input->post('theday');
                      // echo 'the final date before substraction of valid upto period: '.$thefinaldatetime;
                        //$date = new DateTime($thefinaldatetime);
                        $date = new DateTime($announcementidnbetdate[2]);
 $date->sub(new DateInterval('PT'.$validuptohourarray[0].'H'.$validuptohourarray[1].'M'));
//echo '<br>the final date after substraction of valid upto period: '. $date->format('Y-m-d H:i:s');
			//$this->admin_model->approvedisapproveuserbybusinesspartnerinfo($bet_id_forpartner);
                       // $this->admin_model->sendemailtonotifyuserofbusinesspartnerapprovaldisapproval($bet_id_forpartner);
         //echo '<br> betdate to be compared: '.$announcementidnbetdate[1];
$betdate = new DateTime($announcementidnbetdate[1]);
$expire_dt = new DateTime($date->format('Y-m-d H:i:s'));
//echo 'the bet date:'.$announcementidnbetdate[1];
if($betdate <= $expire_dt){
    //echo 'bet is valid';
   
    $lastinsertid= $this->bethistory_model->insertbetintotheloto_bet_historytable($bet_id_forpartnerplusadflagarray[0]);
      $this->bethistory_model->changetheparterapprovedstatusinloto_bet_history_for_partnertable($bet_id_forpartnerplusadflagarray[0],$bet_id_forpartnerplusadflagarray[1]);
       $this->bethistory_model->addbalanceintopartneraccountanddeductfromuser($lastinsertid);
       $ticketnoforpdf=$this->bethistory_model->getticketnoforprintinginpdf($lastinsertid);
        $this->load->helper(array('dompdf', 'file'));
     // page info here, db calls, etc.     
    $this->load->model('non_adminmodel');
               $users['result']=$this->bethistory_model->getusercurrentbethistoryofparticularticketno($ticketnoforpdf);
         
     $html = $this->load->view('pdfreport', $users,true);
     //$html='<p> hello there how you??</p>';
     //pdf_create($html, 'filename');
     //or
     $data = pdf_create($html, '', false);
     write_file('./pdftmp/tubanquita-'.$ticketnoforpdf.'.pdf', $data);
     $row=$this->bethistory_model->getpartnerandotherdetailsforemail($lastinsertid);
     $to= $row->useremail; 
               
                $fromname='Banco';
                
                $fromemail=$row->partneremail;
               // $subject='Ticket Confirmation';
                 $betno = '';
        if ($row->betno_slot1 != 0)
            $betno.= $row->betno_slot1;
        if ($row->betno_slot2 != 0)
            $betno.= ' ' . $row->betno_slot2;

        if ($row->betno_slot3 != 0)
            $betno.= ' ' . $row->betno_slot3;
        if ($row->betno_slot4 != 0)
            $betno.= ' ' . $row->betno_slot4;
        if ($row->betno_slot5 != 0)
            $betno.= ' ' . $row->betno_slot5;
        $subject=lang('lang_bet_approval_sucess_email_subject');
                $data = array(
            'email_username' =>  $row->userkousername,
            'email_lotto_group_name' => $row->lotto_group_name,
             'email_lottery_game_name' => $row->game_name,
                     'email_bet_numbers'=>$betno,
                    'email_ticket_number'=> $row->theticket,
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/betapprovalemailtemplate', $data, TRUE);
         // $emailcontent = 'Hello ' . $row->userkousername . '!!<br> Your bet on lotto group ' . $row->lotto_group_name . ' lotterygame name ' . $row->game_name . ' ' . $row->ampmtype . ' and the bet no ' . $betno . ' ';
       // $emailcontent.= '<br> is approved by the banco and successfully registered. <br> Your ticket no for the bet is ' . $row->theticket;
       // $emailcontent.= '<br> Your ticket is attached below<br>';

                       //$content=$emailcontent;
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'./pdftmp/tubanquita-' . $row->theticket . '.pdf');  
 $dir = "pdftmp";
        $dirHandle = opendir($dir);
        while ($file = readdir($dirHandle)) {
            if ($file == 'tubanquita-' . $row->theticket . '.pdf') {
                unlink($dir . '/' . $file);
            }
        }
         closedir($dirHandle);
//$this->user_model->sendemailtonotifyuserofbusinesspartnerapproval($lastinsertid);
      
      echo json_encode(array('status'=>1,'message'=>lang('lang_bet_approval_by_partner_success_message')));
}
else 
{
//echo 'bet is not valid';   
    //$betsuccessorfail='fail';
    $row=$this->bethistory_model->getpartnerandotherdetailsforemailfrompartnertable($bet_id_forpartnerplusadflagarray[0]);
     $to= $row->useremail; 
               
                $fromname='Banco';
                
                $fromemail=$row->partneremail;
                 $subject=lang('lang_bet_disapproval_sucess_email_subject');
                 $betno = '';
        if ($row->betno_slot1 != 0)
            $betno.= $row->betno_slot1;
        if ($row->betno_slot2 != 0)
            $betno.= ' ' . $row->betno_slot2;

        if ($row->betno_slot3 != 0)
            $betno.= ' ' . $row->betno_slot3;
        if ($row->betno_slot4 != 0)
            $betno.= ' ' . $row->betno_slot4;
        if ($row->betno_slot5 != 0)
            $betno.= ' ' . $row->betno_slot5;
       
                 $data = array(
            'email_username' =>  $row->userkousername,
            'email_lotto_group_name' => $row->lotto_group_name,
             'email_lottery_game_name' => $row->game_name,
                     'email_bet_numbers'=>$betno
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/betdisapprovalemailtemplate', $data, TRUE);
        //$emailcontent = 'Hello ' . $row->userkousername . '!!<br> Your bet on lotto group ' . $row->lotto_group_name . ' lotterygame name ' . $row->game_name . ' and the bet no ' . $betno . ' ';
       // $emailcontent.= '<br> fails to be approved by the banco';

          
                      // $content=$emailcontent;
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
 
  //  $this->user_model->sendemailtonotifyuserofbusinesspartnerdisapproval($bet_id_forpartnerplusadflagarray[0]);
    $this->bethistory_model->changetheparterapprovedstatusinloto_bet_history_for_partnertable($bet_id_forpartnerplusadflagarray[0],0);
    echo json_encode(array('status'=>2,'message'=>'Bet is no longer valid as the time is up'));
    
}
                 
    }//if approval flag is 1
    else {
          $row=$this->bethistory_model->getpartnerandotherdetailsforemailfrompartnertable($bet_id_forpartnerplusadflagarray[0]);
     $to= $row->useremail; 
               
                $fromname='Banco';
                
                $fromemail=$row->partneremail;
               // $subject='Bet Disapproval Notice';
                 $subject=lang('lang_bet_disapproval_sucess_email_subject');
                 $betno = '';
        if ($row->betno_slot1 != 0)
            $betno.= $row->betno_slot1;
        if ($row->betno_slot2 != 0)
            $betno.= ' ' . $row->betno_slot2;

        if ($row->betno_slot3 != 0)
            $betno.= ' ' . $row->betno_slot3;
        if ($row->betno_slot4 != 0)
            $betno.= ' ' . $row->betno_slot4;
        if ($row->betno_slot5 != 0)
            $betno.= ' ' . $row->betno_slot5;
        
          $data = array(
            'email_username' =>  $row->userkousername,
            'email_lotto_group_name' => $row->lotto_group_name,
             'email_lottery_game_name' => $row->game_name,
                     'email_bet_numbers'=>$betno
            );
                 
                 $this->load->library('parser');
            $content = $this->parser->parse('emailtemplates/betdisapprovalemailtemplate', $data, TRUE);
        //$emailcontent = 'Hello ' . $row->userkousername . '!!<br> Your bet on lotto group ' . $row->lotto_group_name . ' lotterygame name ' . $row->game_name . ' and the bet no ' . $betno . ' ';
        //$emailcontent.= '<br> fails to be approved by the banco';

          
                       //$content=$emailcontent;
                   send_the_email($subject,$to,$fromemail,$fromname,$content,'none');  
       // $this->user_model->sendemailtonotifyuserofbusinesspartnerdisapproval($bet_id_forpartnerplusadflagarray[0]);
    $this->bethistory_model->changetheparterapprovedstatusinloto_bet_history_for_partnertable($bet_id_forpartnerplusadflagarray[0],0);
    echo json_encode(array('status'=>2,'message'=>lang('lang_bet_disapproval_by_partner_success_message')));
     
    }//if approvalflag is 0
                     
				
	}
}