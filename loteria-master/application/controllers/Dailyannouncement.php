<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dailyannouncement extends CI_Controller {

    function index() {
        if (!$this->input->is_cli_request()) {
            //echo "This script can only be accessed via the command line" . PHP_EOL;
            // return;
        }
        //$this->load->model('non_adminmodel');
        //$this->dailyannouncement_model->sendemailomerebhai();
        // $allvalues=$this->non_adminmodel->getthedrawingdateforcorrespondinggame(31,13,'AM');
        $timestamp = strtotime("+0 days");
//$day_start = date('Y-m-d 00:00:00', $timestamp);
        //$day_end = date('Y-m-d 23:59:59', $timestamp);
        $insertdate = date('Y-m-d', $timestamp);
        echo '<br>the today ko date: ' . $insertdate . '<br>';
        $timestampfortomorrow = strtotime("+1 days");
//$day_start = date('Y-m-d 00:00:00', $timestamp);
        //$day_end = date('Y-m-d 23:59:59', $timestamp);
//$insertdate = date('Y-m-d', $timestamp);
        $tomorrowinsertdate = date('Y-m-d', $timestampfortomorrow);
        echo '<br>the tomorrow ko date: ' . $tomorrowinsertdate . '<br>';
        $timestampforweekly = strtotime("+7 days");
//$day_start = date('Y-m-d 00:00:00', $timestamp);
        //$day_end = date('Y-m-d 23:59:59', $timestamp);
        $nextweekinsertdate = date('Y-m-d', $timestampforweekly);
        echo '<br>the nextweek ko date: ' . $nextweekinsertdate . '<br>';
//echo $insertdate;
        $todaykoday = date('N') + 1;
        if ($todaykoday == 8)
            $todaykoday = 1;
//echo $todaykoday;
        $this->load->model('dailyannouncement_model');
        //$this->dailyannouncement_model->sendemailomerebhai();
         $this->dailyannouncement_model->changethependingstatusofexpiredbetsinpartnerbettable( );
          
        $allvalues = $this->dailyannouncement_model->getallvaluesofannouncementtable();
        print_r($allvalues->result());
        foreach ($allvalues->result() as $row) {
               if ($row->drawing_type != 'onetime') {
                if ($row->drawing_type == 'ampm') {
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
                    $timestampfornextinsertdate = strtotime("+" . $offsetfornextdateampm . " days");

                    $nextinsertdate = date('Y-m-d', $timestampfornextinsertdate);
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
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $insertdate);
                        if ($flagarray == 0) {

                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($insertdate, $row->announcement_id);
                        }



                        $ampmannounceddate = new DateTime($insertdate . ' ' . $row->pmtime);
                        $todaydatetime = date('Y-m-d H:i:s');
                        echo '<br> today ko date time :' . $todaydatetime;
                        echo '<br> database ko date time :' . $insertdate . ' ' . $row->pmtime;
                        $expire_dt = new DateTime($todaydatetime);
//echo 'the bet date:'.$announcementidnbetdate[1];
//echo $todaydatetime;
//echo '<br>'.$todaydatetime;
                        if ($ampmannounceddate <= $expire_dt) {
                            echo '<br>expire vayo for announcment id :' . $row->announcement_id;


                            $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $nextinsertdate);
                            if ($flagarray == 0) {

                                $this->dailyannouncement_model->insertintolottery_announcement_detailtable($nextinsertdate, $row->announcement_id);
                            }
                            //$this->dailyannouncement_model->updatelottery_announcement_detailtableforallannouncement($row->announcement_id); 
                            // $this->dailyannouncement_model->insertthenextdrawingdate($row->announcement_id,$tomorrowinsertdate); 
                        }
                    }//if green to insert for ampm type
                    else {
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $nextinsertdate);
                        if ($flagarray == 0) {

                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($nextinsertdate, $row->announcement_id);
                        }
                    }//if notgreen/red to insert for ampm type
                } else if ($row->drawing_type == 'daily') {
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
                    $timestampfornextinsertdate = strtotime("+" . $offsetfornextdateampm . " days");

                    $nextinsertdate = date('Y-m-d', $timestampfornextinsertdate);
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
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $insertdate);
                        if ($flagarray == 0) {
                            //$row->drawing_day
                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($insertdate, $row->announcement_id);
                        }

                        //$dailyannounceddate = new DateTime($insertdate . ' ' . $row->dailytime);
                        $date = new DateTime($insertdate . ' ' . $row->dailytime);
 $date->sub(new DateInterval('PT'.explode(':',$row->drawingvalidupto)[0].'H'.explode(':',$row->drawingvalidupto)[1].'M'));
 $dailyannounceddate = new DateTime($date->format('Y-m-d H:i:s'));                       
 $todaydatetime = date('Y-m-d H:i:s');
                        $expire_dt = new DateTime($todaydatetime);
//echo 'the bet date:'.$announcementidnbetdate[1];
//echo $todaydatetime;
//echo '<br>'.$todaydatetime;
                        if ($dailyannounceddate <= $expire_dt) {

                            $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $nextinsertdate);
                            if ($flagarray == 0) {
                                $this->dailyannouncement_model->insertintolottery_announcement_detailtable($nextinsertdate, $row->announcement_id);
                            }

                            //$this->dailyannouncement_model->updatelottery_announcement_detailtableforallannouncement($row->announcement_id); 
                            // $this->dailyannouncement_model->insertthenextdrawingdate($row->announcement_id,$tomorrowinsertdate); 
                        }
                    }//if flag is green to insert
                    else {

                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $nextinsertdate);
                        if ($flagarray == 0) {
                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($nextinsertdate, $row->announcement_id);
                        }
                    } //if the flag is red to insert
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
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $insertdate);
                        if ($flagarray == 0) {
                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($insertdate, $row->announcement_id);
                        }
                       // $weeklyannounceddate = new DateTime($insertdate . ' ' . $row->weeklytime);
                         $date = new DateTime($insertdate . ' ' . $row->weeklytime);
 $date->sub(new DateInterval('PT'.explode(':',$row->drawingvalidupto)[0].'H'.explode(':',$row->drawingvalidupto)[1].'M'));
 $weeklyannounceddate = new DateTime($date->format('Y-m-d H:i:s'));    
                        $todaydatetime = date('Y-m-d H:i:s');
                        $expire_dt = new DateTime($todaydatetime);
//echo 'the bet date:'.$announcementidnbetdate[1];
//echo $todaydatetime;
//echo '<br>'.$todaydatetime;
                        if ($weeklyannounceddate <= $expire_dt) {

                            $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $nextweekinsertdate);
                            if ($flagarray == 0) {
                                $this->dailyannouncement_model->insertintolottery_announcement_detailtable($nextweekinsertdate, $row->announcement_id);
                            }
                            //$this->dailyannouncement_model->updatelottery_announcement_detailtableforallannouncement($row->announcement_id); 
                            // $this->dailyannouncement_model->insertthenextdrawingdate($row->announcement_id,$tomorrowinsertdate); 
                        } //if weeklyannouced date is expired
                    } else if ($todaykoday - $databaseday > 0) {
                        $offset = 7 - ($todaykoday - $databaseday);
                        $format = 'Y-m-d';
                        $therawdate = date($format, strtotime('+' . $offset . 'day', strtotime($insertdate)));
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $therawdate);
                        if ($flagarray == 0) {
                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($therawdate, $row->announcement_id);
                        }
                    } else {
                        $offset = $databaseday - $todaykoday;
                        $format = 'Y-m-d';
                        $therawdate = date($format, strtotime('+' . $offset . 'day', strtotime($insertdate)));
                        $flagarray = $this->dailyannouncement_model->checkifthisannouncementwiththisdateexists($row->announcement_id, $therawdate);
                        if ($flagarray == 0) {
                            $this->dailyannouncement_model->insertintolottery_announcement_detailtable($therawdate, $row->announcement_id);
                        }
                    }//if databaseday>todaykoday
                }//if drawing type is weekly
            }//if drawing type is not onetime
            else {
                $flagarray = $this->dailyannouncement_model->checkifthisannouncementexists($row->announcement_id);
                if ($flagarray[0] == 0) {
                    $this->dailyannouncement_model->insertonetimeannouncement($row->announcement_id, $flagarray[1]);
                }

                $onetimeannounceddate = new DateTime($row->onetimedatetime);
                $todaydatetime = date('Y-m-d H:i:s');
                $expire_dt = new DateTime($todaydatetime);
//echo 'the bet date:'.$announcementidnbetdate[1];
//echo $todaydatetime;
//echo '<br>'.$todaydatetime;
                if ($onetimeannounceddate <= $expire_dt) {

                    $this->dailyannouncement_model->updatelottery_announcement_detailtableforallannouncement($row->announcement_id);
                } else {
                    
                }
            }//if drawing type is onetime
        }
    }

}
