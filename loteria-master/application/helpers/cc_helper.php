<?php

	if(!function_exists('check_active_or_not'))
	{
		function check_active_or_not($nav_name,$nav1)
		{
			if(isset($nav1) && $nav1 == $nav_name)
			echo  "active";
			else
			echo "";
		}
                function getthepartnertelephoneno($partnerid)
		{
			 $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('non_adminmodel');

    // Call a function of the model
   return $CI->non_adminmodel->getthepartnertelephoneno($partnerid);
		}
                function getthedamnlotodetailshoney($lotogroupid,$lotterygameid,$drawingdate,$displaygarneampmtype)
        {
             $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('non_adminmodel');
            
            $data['serology_details'] = $CI->non_adminmodel->getthedamnlotodetailshoney($lotogroupid,$lotterygameid,$drawingdate,$displaygarneampmtype);
            if($data['serology_details'])
                        {
                foreach($data['serology_details'] as $row)
			{
			$serology_details = array
				(
				'lottery_announcement_detail_id' => $row['lottery_announcement_detail_id'],
				'lotto_group_name' => $row['lotto_group_name'],
				'game_name' => $row['game_name'],
				'minbet' => $row['minbet'],
				'maxbet' => $row['maxbet'],
				'gameicon' => $row['gameicon'],
                            'all' => $row['lottery_announcement_detail_id'].'/'.$row['lotto_group_name'].'/'.$row['game_name'].' '.$displaygarneampmtype.'/'.$row['minbet'].'/'.$row['maxbet'].'/'.$row['gameicon'],
							
				);
			}
                        $tempdrawingtime='';
    if($row['drawing_type']=='weekly')
        $tempdrawingtime=$row['weeklytime'];
    else 
        $tempdrawingtime=$row['dailytime'];
			//echo json_encode($serology_details);
                        return  $row['game_name'].' '.$displaygarneampmtype.'/'.$row['lotto_group_name'].'/'.$row['minbet'].'/'.$row['maxbet'].'/'.$row['lottery_announcement_detail_id'].'/'.$row['gameicon'].'/'.$row['detail_date'].' '.$tempdrawingtime;
    
                        }
                        else {
                             $allvalues = $CI->non_adminmodel->getallgamesofgivenlotogrouplotogameandampmtype($lotogroupid,$lotterygameid,$displaygarneampmtype);
          //$timestamp = strtotime("+0 days");
          
          
//$day_
        
//echo $insertdate;
        $todaykoday = date('N',strtotime( "$drawingdate")) + 1;
        if ($todaykoday == 8)
            $todaykoday = 1;
//echo $todaykoday;
        $therequirednextdrawingdate='';
        $insertannouncementdetailid='';
        $therawannouncementdetailid='';
        $therequiredannouncementdetailid='';
        $nextinsertdate='';
        $therawdate='';
        $thegamename='';
        $thelotogroupname='';
        $thegameicon='';
        $therequireddrawingtime='';
        $therawdrawingtime='';
        $theinsertdrawingtime='';
        $therequiredminbet='';
        $therequiredmaxbet='';
        $theinsertmaxbet='';
        $therawmaxbet='';
        $therawminbet='';
        $theinsertminbet='';
         foreach ($allvalues->result() as $row) {
             $thegamename=$row->game_name;
             $thelotogroupname=$row->lotto_group_name;
             $thegameicon=$row->gameicon;
         if ($row->drawing_type == 'onetime') {
             return 'kehichaina';
         }
         else if ($row->drawing_type == 'daily') {
             
                    $offsetfornextdateampm = 1;
                    if ($todaykoday == 1) {
                        if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 2) {

                        if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 3) {

                        if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 4) {

                        if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 5) {

                        if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 6) {

                        if ($row->saturdayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    } else if ($todaykoday == 7) {

                        if ($row->sundayflag == 1) {
                            $offsetfornextdateampm = 1;
                        } else if ($row->mondayflag == 1) {
                            $offsetfornextdateampm = 2;
                        } else if ($row->tuesdayflag == 1) {
                            $offsetfornextdateampm = 3;
                        } else if ($row->wednesdayflag == 1) {
                            $offsetfornextdateampm = 4;
                        } else if ($row->thursdayflag == 1) {
                            $offsetfornextdateampm = 5;
                        } else if ($row->fridayflag == 1) {
                            $offsetfornextdateampm = 6;
                        }
                    }
                     $flaggreentoinsert = 0;
                    if ($todaykoday == 1 && $row->sundayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 2 && $row->mondayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 3 && $row->tuesdayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 4 && $row->wednesdayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 5 && $row->thursdayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 6 && $row->fridayflag == 1) {
                        $flaggreentoinsert = 1;
                    } else if ($todaykoday == 7 && $row->saturdayflag == 1) {
                        $flaggreentoinsert = 1;
                    }
 if ($flaggreentoinsert == 1) {
     $timestampfornextinsertdate = strtotime("+" . 0 . " days",strtotime($drawingdate));

                    $nextinsertdate = date('Y-m-d', $timestampfornextinsertdate);
                   
 }else {
     $timestampfornextinsertdate = strtotime("+" . $offsetfornextdateampm . " days",strtotime($drawingdate));

                    $nextinsertdate = date('Y-m-d', $timestampfornextinsertdate);
                   
     
 }
                     $insertannouncementdetailid=$row->lottery_announcement_detail_id;
                    $therequirednextdrawingdate=$nextinsertdate;
                     $therequiredannouncementdetailid=$insertannouncementdetailid;
                      $theinsertminbet=$row->minbet;
                      $therequiredminbet=$theinsertminbet;
                      $theinsertmaxbet=$row->maxbet;
                      $therequiredmaxbet=$theinsertmaxbet;
                      $theinsertdrawingtime=$row->dailytime;
                      $therequireddrawingtime=$theinsertdrawingtime;
                   
                } else {
                     $databaseday = 0;


                    if ($row->drawing_day == 'sunday')
                        $databaseday = 1;
                    else if ($row->drawing_day == 'monday')
                        $databaseday = 2;
                    else if ($row->drawing_day == 'tuesday')
                        $databaseday = 3;
                    else if ($row->drawing_day == 'wednesday')
                        $databaseday = 4;
                    else if ($row->drawing_day == 'thursday')
                        $databaseday = 5;
                    else if ($row->drawing_day == 'friday')
                        $databaseday = 6;
                    else if ($row->drawing_day == 'saturday')
                        $databaseday = 7;
                      if ($databaseday == $todaykoday) {
                          $offset = 7 ;
                        $format = 'Y-m-d';
                        $therawdate = date($format, strtotime('+' . $offset . 'day', strtotime($drawingdate)));
                      
                      } else if ($todaykoday - $databaseday > 0) {
                        $offset = 7 - ($todaykoday - $databaseday);
                        $format = 'Y-m-d';
                        $therawdate = date($format, strtotime('+' . $offset . 'day', strtotime($drawingdate)));
                       
                    } else {
                        $offset = $databaseday - $todaykoday;
                        $format = 'Y-m-d';
                        $therawdate = date($format, strtotime('+' . $offset . 'day', strtotime($drawingdate)));
                        
                    }//if databaseday>todaykoday
$therawannouncementdetailid=$row->lottery_announcement_detail_id;
$therequirednextdrawingdate=$therawdate;
                     $therequiredannouncementdetailid=$therawannouncementdetailid;
                    $therawminbet=$row->minbet;
                      $therequiredminbet=$therawminbet;
                      $therawmaxbet=$row->maxbet;
                      $therequiredmaxbet=$therawmaxbet;
                      $therawdrawingtime=$row->weeklytime;
                      $therequireddrawingtime=$therawdrawingtime;
                   
                }//if drawing type is weekly
         
         }//end of for
         if($insertannouncementdetailid!=''&&$therawannouncementdetailid!='')
         {
             if(strtotime($therawdate)>strtotime($nextinsertdate))
             {
                 $therequirednextdrawingdate=$nextinsertdate;
                 $therequiredannouncementdetailid=$insertannouncementdetailid;
                 $therequiredminbet=$theinsertminbet;
                 $therequiredmaxbet=$theinsertmaxbet;
                 $therequireddrawingtime=$theinsertdrawingtime;
                 
             }
             else 
             {
               $therequirednextdrawingdate =  $therawdate;
                $therequiredannouncementdetailid=$therawannouncementdetailid;
                 $therequiredminbet=$therawminbet;
                 $therequiredmaxbet=$therawmaxbet;
                 $therequireddrawingtime=$therawdrawingtime;
                 
             }
         }
                        return  $thegamename.' '.$displaygarneampmtype.'/'.$thelotogroupname.'/'.$therequiredminbet.'/'.$therequiredmaxbet.'/'.$therequiredannouncementdetailid.'/'.$thegameicon.'/'.$therequirednextdrawingdate.' '.$therequireddrawingtime;
         
                        }//kehi chaina scope
			
        }
                 function getthenextdateformat($rawformatofdate)
		{
                      
       $infodate= $rawformatofdate;
       
             $res=explode('-', $infodate);
             
          
                $tomyear=$res[0];// $tomminusoneyear=$ajakodatematraarray[0];
                $tommonth=$res[1];// $tomminusonemonth=$ajakodatematraarray[1];
                $tomdate=$res[2];// $tomminusonedate=$ajakodatematraarray[2];
               
                if($tommonth==1)
                {
                  $tommonth= 'January';
                  
                }
                else if($tommonth==2)
                {
                  $tommonth= 'February';  
                }
                else if($tommonth==3)
                {
                  $tommonth= 'March';  
                }
                else if($tommonth==4)
                {
                  $tommonth= 'April';  
                }
                else if($tommonth==5)
                {
                  $tommonth= 'May';  
                }
                else if($tommonth==6)
                {
                  $tommonth= 'June';  
                }
                else if($tommonth==7)
                {
                  $tommonth= 'July';  
                }
                else if($tommonth==8)
                {
                  $tommonth= 'August';  
                }
                else if($tommonth==9)
                {
                  $tommonth= 'September';  
                }
                else if($tommonth==10)
                {
                  $tommonth= 'October';  
                }
                else if($tommonth==11)
                {
                  $tommonth= 'November';  
                }
                else if($tommonth==12)
                {
                  $tommonth= 'December';  
                }
                 		
       
                     return $tommonth.' '.$tomdate.', '.$tomyear;
                //return 'abc';
		}
                function getthedrawingdatedetailsofthisgametype($lotogroupid,$lotterygameid,$ampmtype){
                    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('non_adminmodel');
    return $CI->non_adminmodel->getthedrawingdateforcorrespondinggame($lotogroupid,$lotterygameid,$ampmtype);
                 // return 'bishwas';  
                }
                function send_the_email($subject,$to,$fromemail,$fromname,$content,$attachment){
                    //$header='Reply-To';
                   // $value='no-reply@tubanquita.com';
                   // $headers = 'Reply-To: webmaster@example.com' . "\r\n" ;
                     $CI = get_instance();
                     $CI->load->library('email');
      $config['mailtype'] = "html";
    $CI->email->initialize($config);
              $CI->email->from($fromemail, $fromname);
        $CI->email->to($to);
       // $this->email->bcc('them@their-example.com');

            $CI->email->subject($subject);
            $CI->email->message($content );
         if($attachment!='none')
         {
              $CI->email->attach($attachment);
         }
            $CI->email->send();
                }
                
                
                
                
	}	




