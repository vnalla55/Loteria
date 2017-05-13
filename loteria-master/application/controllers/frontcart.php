<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class frontcart extends CI_Controller{
     private $db_b; 
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('front_cart_model');
          $this->load->library('loadview');
          //$this->db_b = $this->load->database('b', TRUE);
         
    }
    
     function emptythecartfrompagecheckout(){
              $_SESSION["betinfowithpartner"]=null;
        }
    public function offlinepage()
    {
        $this->load->model('configuration_model');
        $users['results']= $this->configuration_model->getadminsettingobject();
      $this->load->view('nonadmin/offlineview',$users);  
    }
     function deletefrommaincart(){
            $info=$this->input->post('SelBranchVal');
             $res=explode('/', $info);
            //print_r($res);
                $lotterygameid=$res[1];
                $lotogroupid=$res[0];
                $gametypeid=$res[2];
                $betno_slot1=$res[3];
                $betno_slot2=$res[4];
                $betno_slot3=$res[5];
                $betno_slot4=$res[6];
                $betno_slot5=$res[7];
                $partnerid=$res[8];
                $displaygarneampmtype=$res[9];
                $product=array();
                foreach ($_SESSION["betinfowithpartner"] as $cart_itm) //loop through session array var
	{
                   
		if(!($cart_itm["partnerid"] == $partnerid && $cart_itm["lotogroupid"]==$lotogroupid && $cart_itm["displaygarneampmtype"]==$displaygarneampmtype && $cart_itm["gametypeid"]==$gametypeid && $cart_itm["lotterygameid"]==$lotterygameid && $cart_itm["betno_slot1"] == $betno_slot1 && $cart_itm["betno_slot2"] == $betno_slot2 && $cart_itm["betno_slot3"] == $betno_slot3 && $cart_itm["betno_slot4"] == $betno_slot4 && $cart_itm["betno_slot5"] == $betno_slot5)){ //item does,t exist in the list
			//$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		
                       $product[] =  array('ticketno'=>$cart_itm['ticketno'],'partnerid'=>$cart_itm['partnerid'],'partnername'=>$cart_itm['partnername'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
                }
                //echo  'cartko partnerid: '.$cart_itm['partnerid'].'<br>';
                //echo 'pathako partner id: '.$partnerid.'<br>';
		
		//create a new product list for cart
		$_SESSION["betinfowithpartner"] = $product;
	}
        //$this->loadview->loaderfirst('nonadmin/maincart');
        }
     function usercart()
        {
        
         
         $this->loadview->loaderfirst('nonadmin/page-cart');  
                                 
            
        }
     function deletefrompagecheckoutcart($ticketno){
                     foreach ($_SESSION["betinfowithpartner"] as $cart_itm) //loop through session array var
	{
                   
		if(!($cart_itm["ticketno"] == $ticketno)) //item does,t exist in the list
			//$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		{
                       $product[] =  array('ticketno'=>$cart_itm['ticketno'],'partnerid'=>$cart_itm['partnerid'],'partnername'=>$cart_itm['partnername'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
                }
                //echo  'cartko partnerid: '.$cart_itm['partnerid'].'<br>';
                //echo 'pathako partner id: '.$partnerid.'<br>';
		
		//create a new product list for cart
		$_SESSION["betinfowithpartner"] = $product;
	} 
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
 function updatetemporarycart()
        {
            $info=$this->input->post('SelBranchVal');
             $bet_amount=$this->input->post('bet_amount');
             //$gametypeid=$this->input->post('gametype_id');
              
              //$gametypename=$this->input->post('gametypename');
              $betno_slot1=$this->input->post('betno_slot1');
               $betno_slot2=$this->input->post('betno_slot2');
                $betno_slot3=$this->input->post('betno_slot3');
                 $betno_slot4=$this->input->post('betno_slot4');
                  $betno_slot5=$this->input->post('betno_slot5');
                 if($betno_slot1 < 10 && $betno_slot1 > 0)
                  {
                      $betno_slot1='0'.intval($betno_slot1);
                  }
                  else 
                  {
                    $betno_slot1=intval($betno_slot1);  
                  }
                   if($betno_slot2 < 10 && $betno_slot2 > 0)
                  {
                      $betno_slot2='0'.intval($betno_slot2);
                  }
                   else 
                  {
                   $betno_slot2=intval($betno_slot2);  
                  }
                  if($betno_slot3 < 10 && $betno_slot3 > 0)
                  {
                      $betno_slot3='0'.intval($betno_slot3);
                  }
                   else 
                  {
                    $betno_slot3=intval($betno_slot3);
                  }
                  if($betno_slot4 < 10 && $betno_slot4 > 0)
                  {
                      $betno_slot4='0'.intval($betno_slot4);
                  }
                   else 
                  {
                    $betno_slot4=intval($betno_slot4);
                  }
                  if($betno_slot5 < 10 && $betno_slot5 > 0)
                  {
                      $betno_slot5='0'.intval($betno_slot5);
                  }
                   else 
                  {
                     $betno_slot5=intval($betno_slot5);
                  }
                  $announcement_id=$this->input->post('announcement_id');
            //echo $info;
            $res=explode('/', $info);
            //print_r($res);
           $lotterygameid=$res[0];
                $lotogroupid=$res[1];
               $lotogamename=$res[2];
              $lotogroupname=$res[3];
              $oldvaluesarray=explode('/',$this->input->post('oldvalues'));
              
                      $oldlotogroupid=$oldvaluesarray[0];
                      $oldlotterygameid=$oldvaluesarray[1];
                      
                      $oldgametypeid=$oldvaluesarray[2];
                      $oldbetslot1= $oldvaluesarray[4];
                       $oldbetslot2= $oldvaluesarray[5];
                        $oldbetslot3= $oldvaluesarray[6];
                         $oldbetslot4= $oldvaluesarray[7];
                          $oldbetslot5= $oldvaluesarray[8];
                          $olddisplaygarneampmtype=$oldvaluesarray[10];
              
               if(isset($_SESSION["betinfo"])) //if we have the session
		{
                    $product=array();
			foreach ($_SESSION["betinfo"] as $cart_itm) //loop through session array
			{
				if($cart_itm["displaygarneampmtype"] == $olddisplaygarneampmtype && $cart_itm["lotogroupid"] == $oldlotogroupid && $cart_itm["gametypeid"] == $oldgametypeid && $cart_itm["lotterygameid"] == $oldlotterygameid && $cart_itm["betno_slot1"] == $oldbetslot1 && $cart_itm["betno_slot2"] == $oldbetslot2 && $cart_itm["betno_slot3"] == $oldbetslot3 && $cart_itm["betno_slot4"] == $oldbetslot4 && $cart_itm["betno_slot5"] == $oldbetslot5){ //the item exist in array

					$product[] = array('drawingdatefrontelephantteeth'=>$this->input->post('drawingdatefrontelephantteeth'),'drawingdate'=>$this->input->post('drawingdate'),'displaygarneampmtype'=>$this->input->post('displaygarneampmtype'),'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$announcement_id,'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$lotogroupid,'lotterygameid'=>$lotterygameid, 'lotogamename'=>$lotogamename, 'lotogroupname'=>$lotogroupname, 'bet_amount'=>$bet_amount, 'betno_slot1'=>$betno_slot1, 'betno_slot2'=>$betno_slot2, 'betno_slot3'=>$betno_slot3, 'betno_slot4'=>$betno_slot4, 'betno_slot5'=>$betno_slot5);
					
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
					}
			}
			$_SESSION["betinfo"] = $product;
			
			
			
		}
                
                //print_r($_SESSION["betinfo"]);
                //unset($_SESSION["betinfo"]);
                $this->loadview->loaderfirst('nonadmin/temporarycart');
        }
         function processusercart(){
              $info=$this->input->post('partnerinfo');
            $res=explode('/', $info);
            //print_r($res);
           $partnerid=$res[0];
           $flagsamepartner=0;
                $partnername=$res[1];
                 $this->load->model('user_model');
                           $userid=$this->user_model->getuseridforpartnerapproval();

  $ticketno=$userid.$partnerid.$this->front_cart_model->getticketno();  
 
                        if(!isset($_SESSION["betinfowithpartner"])) //if we have the session
		{
               if(isset($_SESSION["betinfo"])){
                  
                   foreach ($_SESSION["betinfo"] as $cart_itm)
    {
     $product[] = array('ticketno'=>$ticketno,'partnerid'=>$partnerid,'partnername'=>$partnername,'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);               
    }
    
    $_SESSION["betinfowithpartner"]=$product; 
     $this->front_cart_model->insertticketno();
               }
                            
                }
                else {
                    
                                if(isset($_SESSION["betinfo"]))
                    {
                       $product[] = array();
                       $product1 = array();
                foreach ($_SESSION["betinfo"] as $cart_itm) //loop through session array
                    {
                    
                    
                   //$product[] = array('partnerid'=>$partnerid,'partnername'=>$partnername,'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);               
                      $flag=0;
                        
                     foreach( $_SESSION["betinfowithpartner"] as $cart_itm1) 
                    {
                      if($cart_itm1['partnerid'] == $partnerid && $cart_itm1["lotogroupid"] == $cart_itm["lotogroupid"]  && $cart_itm1["displaygarneampmtype"] == $cart_itm["displaygarneampmtype"] && $cart_itm1["gametypeid"] == $cart_itm["gametypeid"] && $cart_itm1["lotterygameid"] == $cart_itm["lotterygameid"] && $cart_itm1["betno_slot1"] == $cart_itm["betno_slot1"] && $cart_itm1["betno_slot2"] == $cart_itm["betno_slot2"] && $cart_itm1["betno_slot3"] == $cart_itm["betno_slot3"] && $cart_itm1["betno_slot4"] == $cart_itm["betno_slot4"] && $cart_itm1["betno_slot5"] == $cart_itm["betno_slot5"] )
                      {
                       $flag=1;
                       //break;
                      }
                      
                    }
                    if($flag==0)
                    {
                       if( $cart_itm1['partnerid'] == $partnerid)
                       {
                           $ticketno=$cart_itm1['ticketno'];
                           $flagsamepartner=1;
                       }
                       
                      $product1[]=array('ticketno'=>$ticketno,'partnerid'=>$partnerid,'partnername'=>$partnername,'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);;  
                    }
                    
                    }
                    if(count($product1)>0)
                    $_SESSION["betinfowithpartner"]=array_merge($_SESSION["betinfowithpartner"], $product1);
                    if($flagsamepartner==0) 
                    $this->front_cart_model->insertticketno();
                    //print_r($_SESSION["betinfowithpartner"]);
                }//if the session of first session exists
               
                    
                }//if the second session of betinfowithpartner doesn't exist 
                $_SESSION["betinfo"]=null;
        }
         function playagainandaddtotemporarycart(){
       $this->load->model('non_adminmodel');
       $betidplusannouncementid=explode('/',$this->input->post('bet_idplusannouncement_id'));
    $announcement_id=$betidplusannouncementid[1];
   
    $bet_id=$betidplusannouncementid[0];
   $flagzeroorcurrentdetailid = $this->non_adminmodel->checkiftheannouncementiscurrent($announcement_id); 
  				
     if($flagzeroorcurrentdetailid!=0)
     {
         $tempdrawingdate=$flagzeroorcurrentdetailid[1];
         $tempannouncementid=$flagzeroorcurrentdetailid[0];
             $oldbetnovaluesandallarray=$this->non_adminmodel->getpreviousbetvaluesandall($bet_id);
              $new_product = array(array('drawingdatefrontelephantteeth'=>$tempdrawingdate,'drawingdate'=>$tempdrawingdate,'displaygarneampmtype'=>$oldbetnovaluesandallarray[13],'lotogameicon'=>$oldbetnovaluesandallarray[12],'announcement_id'=>$tempannouncementid ,'bet_date'=>$this->input->post('bet_date'),'gametypename'=>$oldbetnovaluesandallarray[5],'gametypeid'=>$oldbetnovaluesandallarray[4],'lotogroupid'=>$oldbetnovaluesandallarray[0],'lotterygameid'=>$oldbetnovaluesandallarray[2], 'lotogamename'=>$oldbetnovaluesandallarray[3], 'lotogroupname'=>$oldbetnovaluesandallarray[1], 'bet_amount'=>$oldbetnovaluesandallarray[6], 'betno_slot1'=>$oldbetnovaluesandallarray[7], 'betno_slot2'=>$oldbetnovaluesandallarray[8], 'betno_slot3'=>$oldbetnovaluesandallarray[9], 'betno_slot4'=>$oldbetnovaluesandallarray[10], 'betno_slot5'=>$oldbetnovaluesandallarray[11]));
		if(isset($_SESSION["betinfo"])) //if we have the session
		{
                    //echo 'session set vayo';
			$found = false; //set found item to false
			$product=array();
			foreach ($_SESSION["betinfo"] as $cart_itm) //loop through session array
			{
				if($cart_itm["displaygarneampmtype"] ==$oldbetnovaluesandallarray[13] && $cart_itm["lotogroupid"] == $oldbetnovaluesandallarray[0] && $cart_itm["gametypeid"] == $oldbetnovaluesandallarray[4] && $cart_itm["lotterygameid"] == $oldbetnovaluesandallarray[2] && $cart_itm["betno_slot1"] == $oldbetnovaluesandallarray[7] && $cart_itm["betno_slot2"] == $oldbetnovaluesandallarray[8] && $cart_itm["betno_slot3"] == $oldbetnovaluesandallarray[9] && $cart_itm["betno_slot4"] == $oldbetnovaluesandallarray[10] && $cart_itm["betno_slot5"] == $oldbetnovaluesandallarray[11]){ //the item exist in array

					$product[] = array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
					}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["betinfo"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
                            
				$_SESSION["betinfo"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["betinfo"] = $new_product;
                       // echo 'session set vayena';
		}
            echo json_encode(array('status'=>1,'message'=>'sucess'));   
     }
     else 
     {
         echo json_encode(array('status'=>2,'message'=>'Announcement is no longer valid'));  
     }
     
    }
function loadtemporarycart(){
            $this->load->view('nonadmin/temporarycart');
            
        }
        function deletefromtemporarycart(){
            $info=$this->input->post('SelBranchVal');
             $res=explode('/', $info);
            //print_r($res);
           $lotterygameid=$res[1];
                $lotogroupid=$res[0];
                $gametypeid=$res[2];
                $betno_slot1=$res[3];
                $betno_slot2=$res[4];
                $betno_slot3=$res[5];
                $betno_slot4=$res[6];
                $betno_slot5=$res[7];
                $displaygarneampmtype=$res[9];
                $product=array();
                foreach ($_SESSION["betinfo"] as $cart_itm) //loop through session array var
	{
                   
		if(!($cart_itm["displaygarneampmtype"]==$displaygarneampmtype && $cart_itm["lotogroupid"]==$lotogroupid && $cart_itm["gametypeid"]==$gametypeid && $cart_itm["lotterygameid"]==$lotterygameid&& $cart_itm["betno_slot1"] == $betno_slot1 && $cart_itm["betno_slot2"] == $betno_slot2 && $cart_itm["betno_slot3"] == $betno_slot3 && $cart_itm["betno_slot4"] == $betno_slot4 && $cart_itm["betno_slot5"] == $betno_slot5)){ //item does,t exist in the list
			//$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		
                       $product[] =  array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
                }
		
		//create a new product list for cart
		$_SESSION["betinfo"] = $product;
	}
        $proceedtocheckoutflag=1;
         if(count($_SESSION["betinfo"])==0)
             $proceedtocheckoutflag=0;
          echo $proceedtocheckoutflag .'|'; 
          $this->loadview->loaderfirst('nonadmin/temporarycart');
          
        
        }
function temporarycart()
        {
            $info=$this->input->post('SelBranchVal');
             $bet_amount=$this->input->post('bet_amount');
             $gametypeid=$this->input->post('gametype_id');
              
              $gametypename=$this->input->post('gametypename');
              $betno_slot1=$this->input->post('betno_slot1');
               $betno_slot2=$this->input->post('betno_slot2');
                $betno_slot3=$this->input->post('betno_slot3');
                 $betno_slot4=$this->input->post('betno_slot4');
                  $betno_slot5=$this->input->post('betno_slot5');
                  if($betno_slot1 < 10 && $betno_slot1 > 0)
                  {
                      $betno_slot1='0'.intval($betno_slot1);
                  }
                  else 
                  {
                    $betno_slot1=intval($betno_slot1);  
                  }
                   if($betno_slot2 < 10 && $betno_slot2 > 0)
                  {
                      $betno_slot2='0'.intval($betno_slot2);
                  }
                   else 
                  {
                   $betno_slot2=intval($betno_slot2);  
                  }
                  if($betno_slot3 < 10 && $betno_slot3 > 0)
                  {
                      $betno_slot3='0'.intval($betno_slot3);
                  }
                   else 
                  {
                    $betno_slot3=intval($betno_slot3);
                  }
                  if($betno_slot4 < 10 && $betno_slot4 > 0)
                  {
                      $betno_slot4='0'.intval($betno_slot4);
                  }
                   else 
                  {
                    $betno_slot4=intval($betno_slot4);
                  }
                  if($betno_slot5 < 10 && $betno_slot5 > 0)
                  {
                      $betno_slot5='0'.intval($betno_slot5);
                  }
                   else 
                  {
                     $betno_slot5=intval($betno_slot5);
                  }
                  //$bet_date=$this->input->post('bet_date');
                  $todaydatetime = date('Y-m-d H:i:s');
                  $bet_date=$todaydatetime;
                  $announcement_id=$this->input->post('announcement_id');
            //echo $info;
            $res=explode('/', $info);
            //print_r($res);
           $lotterygameid=$res[0];
                $lotogroupid=$res[1];
               $lotogamename=$res[2];
              $lotogroupname=$res[3];
              $lotogameicon=$res[7];
              //echo $lotterygameid.'<br>'.$lotogroupid.'<br>'.$lotogamename.'<br>'.$lotogroupname.'<br>';
              $new_product = array(array('drawingdatefrontelephantteeth'=>$this->input->post('drawingdatefrontelephantteeth'),'drawingdate'=>$this->input->post('drawingdate'),'displaygarneampmtype'=>$this->input->post('displaygarneampmtype'),'lotogameicon'=>$lotogameicon,'announcement_id'=>$announcement_id,'bet_date'=>$bet_date,'gametypename'=>$gametypename,'gametypeid'=>$gametypeid,'lotogroupid'=>$lotogroupid,'lotterygameid'=>$lotterygameid, 'lotogamename'=>$lotogamename, 'lotogroupname'=>$lotogroupname, 'bet_amount'=>$bet_amount, 'betno_slot1'=>$betno_slot1, 'betno_slot2'=>$betno_slot2, 'betno_slot3'=>$betno_slot3, 'betno_slot4'=>$betno_slot4, 'betno_slot5'=>$betno_slot5));
		if(isset($_SESSION["betinfo"])) //if we have the session
		{
                    //echo 'session set vayo';
			$found = false; //set found item to false
			$product=array();
			foreach ($_SESSION["betinfo"] as $cart_itm) //loop through session array
			{
				if($cart_itm["displaygarneampmtype"] == $this->input->post('displaygarneampmtype') && $cart_itm["lotogroupid"] == $lotogroupid && $cart_itm["gametypeid"] == $gametypeid && $cart_itm["lotterygameid"] == $lotterygameid && $cart_itm["betno_slot1"] == $betno_slot1 && $cart_itm["betno_slot2"] == $betno_slot2 && $cart_itm["betno_slot3"] == $betno_slot3 && $cart_itm["betno_slot4"] == $betno_slot4 && $cart_itm["betno_slot5"] == $betno_slot5){ //the item exist in array

					$product[] = array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('drawingdatefrontelephantteeth'=>$cart_itm['drawingdatefrontelephantteeth'],'drawingdate'=>$cart_itm['drawingdate'],'displaygarneampmtype'=>$cart_itm['displaygarneampmtype'],'lotogameicon'=>$cart_itm['lotogameicon'],'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);
					}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["betinfo"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
                            
				$_SESSION["betinfo"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["betinfo"] = $new_product;
                       // echo 'session set vayena';
		}
                
                //print_r($_SESSION["betinfo"]);
                //unset($_SESSION["betinfo"]);
                $this->loadview->loaderfirst('nonadmin/temporarycart');
        }

    }