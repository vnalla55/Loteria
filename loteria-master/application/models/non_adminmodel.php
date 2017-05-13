<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class non_adminmodel extends CI_Model {
   function getthepartnertelephoneno($partner_id){
       $sql = "SELECT phoneno,partner_icon FROM business_partner where id = ".$partner_id;
        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        return $row->phoneno.'/'.$row->partner_icon;    
    }
    
   
    function getthecontentofotherpages($pageid)
    {
     $sql = "SELECT page_content FROM cms where page_id = '".$pageid."'" ;

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        if($row)
        return $row->page_content; 
        else 
            return 0 ;
    }
   function getnooftimesthenoappeared($lotogroupid, $lotogameid,$theno){
       $sql = "SELECT count(*) as yda,lotto_group_name,game_name FROM loto_results join  lottery_announcement on lottery_announcement.announcement_id=loto_results.lottery_announcement_detail_id   join  loto_group on loto_group.lottogroup_id=lottery_announcement.lottogroup_id join  lottery_game on lottery_game.game_id=lottery_announcement.game_id
WHERE lottery_game.game_id ='".$lotogameid."' and loto_group.lottogroup_id = '".$lotogroupid."' and result_num like '%".$theno."%' and result_date <= '".$this->input->post('today')."' AND  result_date >='".$this->input->post('katipachijane')."'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
        return $row->yda.'/'.$row->lotto_group_name.'/'.$row->game_name; 
    }
   
    
     
   
    function getthedrawingdateforcorrespondinggame($lotogroupid,$lotogameid,$ampmtype){
       $this->db->select('lottery_announcement_detail_id as announcement_id,lotto_group_name,loto_group.lottogroup_id,game_name,lottery_game.game_id, minbet,maxbet,drawing_day,gameicon,drawing_type,dailytime,weeklytime,onetimedatetime,detail_date,ampmtype,sundayflag,mondayflag,tuesdayflag,wednesdayflag,thursdayflag,fridayflag,saturdayflag');
           
                             $this->db->from('lottery_announcement');
                              $this->db->join('lottery_announcement_detail', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
           
                             $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
           
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->where('announcement_status','current');
             $this->db->where('loto_group.lottogroup_id',$lotogroupid);
             $this->db->where('lottery_game.game_id',$lotogameid);
              $this->db->where('announcement_status','current');
                $this->db->where('ampmtype',$ampmtype);
           // $this->db->group_by('lotto_group_name');
            //$this->db->distinct();
            $this->db->order_by("detail_date", "asc");
              $query = $this->db->get('',1);
              //echo $this->db->last_query();
               $displaygarnetooltip='';
foreach($query->result() as $row){
    $ampmflag=0;
   
    if($row->drawing_type=='onetime'){
         $aajakodatetime = new DateTime($row->detail_date.' 12:00:00');
                                            $announceddatetime=new DateTime($row->detail_date.' '.explode(' ',$row->onetimedatetime)[1]);
                                           if($aajakodatetime > $announceddatetime){
                                                 $ampmflag=0;
                                                 //echo 'am raicha onetime';
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                               echo 'pm raicha onetime';
                                           }
                                           if(($ampmtype=='AM' && $row->ampmtype == 'AM')||($ampmtype=='PM' && $row->ampmtype == 'PM'))
                                           {
                                           $displaygarnetooltip.= 'Next Drawing @ '.$row->onetimedatetime.',';  
                                          
                                           }
                                           // $displaygarnetooltip.= $row->onetimedatetime.', ';  
                                           
                                          
        
    }
    else if($row->drawing_type=='daily'){
      $aajakodatetime = new DateTime($row->detail_date.' 12:00:00');
                                            $announceddatetime=new DateTime($row->detail_date.' '.$row->dailytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                $ampmflag=0;
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                           }
                                           if(($ampmtype=='AM' && $row->ampmtype == 'AM')||($ampmtype=='PM' && $row->ampmtype == 'PM'))
                                           {
                                               $katidekhikati='';
                                              if($row->sundayflag==0 && $row->mondayflag==1 && $row->tuesdayflag==1 && $row->wednesdayflag==1 && $row->thursdayflag==1 && $row->fridayflag==1 && $row->saturdayflag==1)
                                              {
                                                $katidekhikati='Monday through Saturday';  
                                              }
                                              else if($row->sundayflag==1 && $row->mondayflag==1 && $row->tuesdayflag==1 && $row->wednesdayflag==1 && $row->thursdayflag==1 && $row->fridayflag==1 && $row->saturdayflag==1)
                                              {
                                               $katidekhikati='Sunday through Saturday';    
                                              }
                                              else 
                                              {
                                                  if($row->sundayflag==1)
                                                      $katidekhikati.='Sunday, ';
                                                  if($row->mondayflag==1)
                                                       $katidekhikati.='Monday, ';
                                                  if($row->tuesdayflag==1)
                                                       $katidekhikati.='Tuesday, ';
                                                  if($row->wednesdayflag==1)
                                                       $katidekhikati.='Wednesday, ';
                                                  if($row->thursdayflag==1)
                                                       $katidekhikati.='Thursday, ';
                                                  if($row->fridayflag==1)
                                                       $katidekhikati.='Friday, ';
                                                   if($row->saturdayflag==1)
                                                       $katidekhikati.='Saturday ';
                                                      
                                              }
                                                  $displaygarnetooltip.= 'Next Drawing @ '.$row->detail_date.' '.$row->dailytime.', ';  
                                           }   
                                            //$displaygarnetooltip.= $row->detail_date.' '.$row->dailytime.', ';  
                                           
    }
    else if($row->drawing_type=='weekly'){
      $aajakodatetime = new DateTime($row->detail_date.' 12:00:00');
                                            $announceddatetime=new DateTime($row->detail_date.' '.$row->weeklytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                $ampmflag=0;
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                           }
                                          if(($ampmtype=='AM' && $row->ampmtype=='AM')||($ampmtype=='PM' && $row->ampmtype=='PM'))
                                           {
                                           $displaygarnetooltip.= 'Next Drawing @ '.$row->detail_date.' '.$row->weeklytime.' '.$row->drawing_day.' only, ';  
                                           
                                           }     
                                           // $displaygarnetooltip.= $row->detail_date.' '.$row->weeklytime.', ';  
                                           
    }
    
}
            
            return $displaygarnetooltip;
              
    }
    function getallgamesofgivenlotogrouplotogameandampmtype($lotogroupid,$lotterygameid,$displaygarneampmtype){
      $this->db->select('*');
        $this->db->from('lottery_announcement');
        $this->db->join('lottery_announcement_detail', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
        $this->db->join('lottery_game', 'lottery_game.game_id = lottery_announcement.game_id');
        
        $this->db->where('lottery_announcement.lottogroup_id', $lotogroupid); 
         $this->db->where('lottery_announcement.game_id', $lotterygameid);
        
          $this->db->where('ampmtype', $displaygarneampmtype);
           $this->db->where('announcement_status','current');
        $result = $this->db->get();
        return $result;
}
    function getthedamnlotodetailshoney($lotogroupid,$lotterygameid,$drawingdate,$displaygarneampmtype){
        
          /* $sql = "SELECT drawing_type FROM lottery_announcement_detail join lottery_announcement on "
                   . "(lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id) "
                   . "join loto_group on (loto_group.lottogroup_id = lottery_announcement.lottogroup_id) "
                   . "join lottery_game on (lottery_game.game_id = lottery_announcement.game_id) "
                   . "where loto_group.lottogroup_id = '".$lotogroupid."' "
                   . "and lottery_game.game_id = '".$lotterygameid."' and "
                   . "detail_date = '".$drawingdate."'  ";

        $result1 = $this->db->query($sql);
        //echo $this->db->last_query();
               
        $row=$result1->row();*/
      
        
        $this->db->select('lottery_announcement_detail_id ,lotto_group_name,loto_group.lottogroup_id,game_name,lottery_game.game_id, minbet,maxbet,gameicon,drawing_type,dailytime,weeklytime,onetimedatetime,detail_date');
           
                             $this->db->from('lottery_announcement_detail');
                              $this->db->join('lottery_announcement', 'lottery_announcement.announcement_id = lottery_announcement_detail.announcement_id');
           
                             $this->db->join('lottery_game', 'lottery_announcement.game_id = lottery_game.game_id');
           
            $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
           
             $this->db->where('loto_group.lottogroup_id',$lotogroupid);
               $this->db->where('lottery_game.game_id',$lotterygameid);
                $this->db->where('detail_date >= ',$drawingdate);
                $this->db->where('announcement_status','current');
                $this->db->where('ampmtype',$displaygarneampmtype);
            /* if($result1->num_rows()>0)
                {
                 if( $row->drawing_type=='daily')
                {
                 if($displaygarneampmtype=='AM')
                {
                  //$this->db->where('dailytime < ','12:00:00');   
                     $this->db->where('ampmtype',$displaygarneampmtype);
                }
                else 
                {
                   // $this->db->where('dailytime > ','12:00:00');  
                     $this->db->where('ampmtype',$displaygarneampmtype);
                }   
                }
                else 
                {
                   $this->db->where('ampmtype',$displaygarneampmtype);  
                }
                }*/
               
                
           // $this->db->group_by('lotto_group_name');
            //$this->db->distinct();
           
              $query = $this->db->get('',1);
             // return $this->db->last_query();
              //exit();
              

            
            return $query->result_array();
           
    }
   
    
     
 
    
    
   
    function getallmenus()
    {
        $language='spanish';
       
        if(isset($_SESSION['site_lang']))
            $language=$_SESSION['site_lang'];
        
            
     $sql = "SELECT * FROM cms where  language='".$language."'" ;

        $query = $this->db->query($sql);
            return $query; 
    }
     
         
       
    
   
   
    
     
     
     
    
     
    
    
    
    function getpreviousbetvaluesandall($bet_id)
    {
       $this->db->select('ampmtype,drawing_type,dailytime,weeklytime,onetimedatetime,detail_date,loto_group.lottogroup_id,lotto_group_name,lottery_game.game_id as lotterygameid,game_name,game_type.game_id as gametypeid,gametype_name,bet_amount,betno_slot1,betno_slot2,betno_slot3,betno_slot4,betno_slot5,gameicon');
            $this->db->from('loto_bet_history');
           $this->db->join('lottery_announcement_detail', 'lottery_announcement_detail.lottery_announcement_detail_id = loto_bet_history.lottery_announcement_detail_id');
           $this->db->join('lottery_announcement', 'lottery_announcement_detail.announcement_id = lottery_announcement.announcement_id');
           
           $this->db->join('loto_group', 'loto_group.lottogroup_id = lottery_announcement.lottogroup_id');
            $this->db->join('lottery_game', ' lottery_game.game_id = lottery_announcement.game_id');
           $this->db->join('game_type', 'loto_bet_history.game_id = game_type.game_id');
               $this->db->join('business_partner', 'loto_bet_history.partner_id = business_partner.id');
              $this->db->where('bet_id',$bet_id);
                    
            $query= $this->db->get();
        $row = $query->row();
        //echo $this->db->last_query();
 
    $oldbetsnallarray=array();
    $oldbetsnallarray[0]=$row->lottogroup_id;
     $oldbetsnallarray[1]=$row->lotto_group_name;
      $oldbetsnallarray[2]=$row->lotterygameid;
       $oldbetsnallarray[3]=$row->game_name;
        $oldbetsnallarray[4]=$row->gametypeid;
         $oldbetsnallarray[5]=$row->gametype_name;
          $oldbetsnallarray[6]=$row->bet_amount;
          $oldbetsnallarray[7]=$row->betno_slot1;
           $oldbetsnallarray[8]=$row->betno_slot2;
            $oldbetsnallarray[9]=$row->betno_slot3;
             $oldbetsnallarray[10]=$row->betno_slot4;
              $oldbetsnallarray[11]=$row->betno_slot5;
              $oldbetsnallarray[12]=$row->gameicon;
              // $oldbetsnallarray[13]=$row->detail_date;
              
                                   $displaygarneampmtype='';
                     if($row->drawing_type=='weekly')
                     {
                       $displaygarnegametype= 'WEEKLY';
                      $aajakodatetime = new DateTime($row->detail_date.' 12:00:00');
                                              $announceddatetime=new DateTime($row->detail_date.' '.$row->weeklytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                $ampmflag=0;
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                           }
                     }
                      else if($row->drawing_type=='daily')
                     {
                       $displaygarnegametype= 'DAILY';  
                        $aajakodatetime = new DateTime($row->detail_date.' 12:00:00');
                                           $announceddatetime=new DateTime($row->detail_date.' '.$row->dailytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                $ampmflag=0;
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                           }
                     }
                     if($ampmflag==0)
                     {
                      //   echo '<option  value="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'/'.$row->gameicon.'">'.$row->game_name.' AM</option>'; 
                      
                       //$amflag++;
                         $displaygarneampmtype='AM';
                     }
                     else  {
                       //echo '<option  value="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'/'.$row->gameicon.'">'.$row->game_name.' PM</option>'; 
                        //$pmflag++;
                           $displaygarneampmtype='PM';
                     }
                     $displaygarneampmtype=$row->ampmtype;
                      $oldbetsnallarray[3]=$row->game_name.' '.$displaygarneampmtype;
              $oldbetsnallarray[13]=$displaygarneampmtype;
         return $oldbetsnallarray;   
    }
    function checkiftheannouncementiscurrent($announcement_id){
     $sql = "SELECT COALESCE(sum(lottery_announcement_detail_id),0) as yda,lottery_announcement_detail_id,detail_date FROM lottery_announcement_detail where announcement_id = '".$announcement_id."' and announcement_status = 'current'";

        $result = $this->db->query($sql);
        //echo $this->db->last_query();
 
    
    
       $row=$result->row(); 
        // return $row->yda; 
         if($row->yda==0)
             return 0;
         else {
              $tempvar=array();
             $tempvar[0] = $row->lottery_announcement_detail_id;
             $tempvar[1] = $row->detail_date;
           return $tempvar;   
         }
            
    }
     
    function getmenubyid($pageid)
    {
        $result = $this->db->get_where('cms', array('page_id' => $pageid));
        return $result;
    }
    
   
     
    function gettotalbetamountcurrent($userid)
    {
         $this->db->select_sum('bet_amount');
        $query = $this->db->get_where('bet_history', array('better_id' => $userid,'betstatus'=>'current'));
        $row = $query->row();
        //echo $row->bet_amount;
                return $row->bet_amount;
                
    }
     
    
    function getuseraccountbalance($userid)
    {
         $this->db->select('wallet_balance');
        $query = $this->db->get_where('user', array('user_id' => $userid));
        $row = $query->row();
        return $row->wallet_balance;
    }
   
   
   
   
   
    
     
   
     function gettheloginidandtransactionkey()
    {
        $this->db->select('api_login_id,transaction_key');
        $query = $this->db->get_where('authorize_net_setting');
        $row = $query->row();
        //echo $this->db->last_query();
        $loginidandtransactionkeyarray=array();
        $loginidandtransactionkeyarray[0]=$row->api_login_id;
        $loginidandtransactionkeyarray[1]=$row->transaction_key;
        return $loginidandtransactionkeyarray;
        
    }
   
     
   
    
     
     
    function registerwithdrawal(){
         $this->db->select('user_id');
        $query = $this->db->get_where('user', array('username' => $_SESSION['lotteryusername']));
        $row = $query->row();
        //echo $this->db->last_query();
        
         $new_member_insert_data = array(
            'withdrawer_id' =>$row->user_id,
            'withdraw_amount' => $this->input->post('withdraw_amount'),
            'withdraw_date' => $this->input->post('withdraw_date'),
            'withdraw_method' => $this->input->post('withdraw_method'),
            
        );
        $insert = $this->db->insert('withdrawals', $new_member_insert_data);
    }
    
    
  
    
     
    function playgame($better_id)
    {
         $new_member_insert_data = array(
             'betno_slot1' => $this->input->post('betno_slot1'),
             'betno_slot2' => $this->input->post('betno_slot2'),
             'betno_slot3' => $this->input->post('betno_slot3'),
             'betno_slot4' => $this->input->post('betno_slot4'),
             'betno_slot5' => $this->input->post('betno_slot5'),
            'lottery_id' => $this->input->post('lottery_id'),
            'better_id' =>$better_id,
             'gametype_id' => $this->input->post('gametype_id'),
             'bet_amount' => $this->input->post('bet_amount'),
            'bet_date' => $this->input->post('bet_date')
        );
        $insert = $this->db->insert('bet_history', $new_member_insert_data);
        
    }
   
     function checksufficientbalance(){
        $this->db->select('wallet_balance');
    $this->db->where('email', $_SESSION['lotteryuser']);
    $result =$this->db->get('user');
    return $result->result_array();
    
    return $result;
}

 function check_if_username_exists(){
        
    $this->db->where('username', $this->input->post('username'));
    $result =$this->db->get('user');
    
     if($result->num_rows()>0){
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
     

 
    
    
     
    
    
     public function updateuserbalance($remainingbalance) {

        $new_member_insert_data = array(
            'wallet_balance' =>$remainingbalance,
            
        );
        $this->db->where('email', $_SESSION['lotteryuser']);
         $this->db->update('user', $new_member_insert_data);
       //echo $this->db->last_query();
        
    }
     
   
    
   // array('partnerid'=>$partnerid,'partnername'=>$partnername,'announcement_id'=>$cart_itm['announcement_id'],'bet_date'=>$cart_itm['bet_date'],'gametypename'=>$cart_itm['gametypename'],'gametypeid'=>$cart_itm['gametypeid'],'lotogroupid'=>$cart_itm['lotogroupid'],'lotterygameid'=>$cart_itm['lotterygameid'], 'lotogamename'=>$cart_itm['lotogamename'], 'lotogroupname'=>$cart_itm['lotogroupname'], 'bet_amount'=>$cart_itm['bet_amount'], 'betno_slot1'=>$cart_itm['betno_slot1'], 'betno_slot2'=>$cart_itm['betno_slot2'], 'betno_slot3'=>$cart_itm['betno_slot3'], 'betno_slot4'=>$cart_itm['betno_slot4'], 'betno_slot5'=>$cart_itm['betno_slot5']);               
    
   
public function adduserinfo() {

        $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'name' => '',
            'gender' => '',
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'lastname' => '',
            'phone' => '',
            'residenceaddress' => $this->input->post('residenceaddress'),
            'postalcode' => $this->input->post('postalcode'),
            'country' => '',
            'wallet_balance' => '',
            'bonus_balance' => ''
        );
        $this->db->insert('user', $new_member_insert_data);
       
    }
}