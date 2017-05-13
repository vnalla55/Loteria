
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                       
                           <li ><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
                            </li>
                           
                            <li class="active"><a href="<?php echo base_url();?>frontuser/lottouserbethistory"><?php echo lang('lang_dashboard_game_history_link_name'); ?></a>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest"><?php echo lang('lang_dashboard_deposit_application_link_name'); ?></a>
                            </li>
     <li><a href="<?php echo base_url();?>frontuser/lottouserpendingtickets"><?php echo lang('lang_dashboard_pending_tickets_link_name'); ?></a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottouserbankaccount"><?php echo lang('lang_dashboard_bank_account_link_name'); ?></a>
                            </li>
                        </ul>
</br>
</br>
</br>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                           <?php 
                             $num_rows = $noofrows;
           
            $total = $num_rows;

            // How many items to list per page
            $limit = 10;

            // How many pages will there be
            $pages = ceil($total / $limit);


            // What page are we currently on?

         $page = $thepage;

    // Calculate the offset for the query
    $offset = $theoffset;



            // Some information to display to the user
            $start = $thestart;
            $end = $theend;
            // $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';
            $prevlink=$theprevlink;
    // The "forward" link
   // $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="Última página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';
            $nextlink=$thenextlink;
    // Display the paging information
    echo '<p style="margin-left:20%;">', $prevlink, ' Página ', $page, ' de ', $pages, ' páginas, mostrando ', $start, '-', $end, ' de ', $total, ' resultados ', $nextlink, ' </p>';
        ?>
                            <table class="table table-order">
                                <thead>
                                    <tr>
                                     <th> Número de entradas </th>
                                        <th>Fecha Apuesta</th>
                                       
                                        <th>Grupo</th>
                                        <th>
                                            Juego de la Lotería
                                        </th>
                                        <th>Banca</th>
                                        <th>Tipo de juego</th>
                                      
                                         <th>Monto Apuesta</th>
                                        <th>Número de apuestas</th>
                                        <th>Fecha Dibujo</th>
                                        <th></th>
                                          
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
foreach($result->result() as $row){
$flaggreentoinsert=0;

?>

 


                                <tr>
                                         <td><?php echo $row->ticket_no;?></td>
                                        <td><?php echo $row->bet_date;?></td>
                                        <td><?php echo $row->lotto_group_name;?></td>
                                        <td><?php echo $row->game_name.' '.$row->ampmtype;?></td>
                                        	
                                         <td><?php echo $row->partner_name;?></td>
                                         <td><?php echo $row->gametype_name;?></td>
                                          
                                           <td><?php echo $row->bet_amount;?></td>
                                       <td>
                            
                                          <?php if($row->betno_slot1!=0) echo' <span class="badgewin">'. $row->betno_slot1.'</span>';?>
                                         <?php if($row->betno_slot2!=0) echo' <span class="badgewin">'. $row->betno_slot2.'</span>';?>
                                         <?php if($row->betno_slot3!=0) echo' <span class="badgewin">'. $row->betno_slot3.'</span>';?>
                                            <?php if($row->betno_slot4!=0) echo' <span class="badgewin">'. $row->betno_slot4.'</span>';?>
                                            <?php if($row->betno_slot5!=0) echo' <span class="badgewin">'. $row->betno_slot5.'</span>';?>
                                        
                                        </td>
                                        <td>
                                            <?php 
                                           if($row->drawing_type=='ampm')
                                           {
                                                                          $todaykoday=$_SESSION['thetodayday'];
$offsetfornextdateampm=1;
if($todaykoday==1)
{
 if($row->mondayflag==1)
 {
   $offsetfornextdateampm=1;  
 }
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=5;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }
}
else if($todaykoday==2){
 
if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=4;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==3){
 
 if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==4){
 
 if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==5){
 
  if($row->fridayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==6){
 
   if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=2;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==7){
 
    if($row->sundayflag==1)
 {
  $offsetfornextdateampm=1;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=2;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=6;   
 } 
}
$timestampfornextdrawingdate = strtotime("+".$offsetfornextdateampm." days");

$nextdrawingdate=date('Y-m-d', $timestampfornextdrawingdate);
$nextdrawingdatewithcorrectformat = getthenextdateformat($nextdrawingdate);
 if($todaykoday==1 && $row->sundayflag ==1)
     {
       $flaggreentoinsert=1;  
     }
     else if($todaykoday==2 && $row->mondayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==3 && $row->tuesdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==4 && $row->wednesdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==5 && $row->thursdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==6 && $row->fridayflag ==1){
         $flaggreentoinsert=1; 
     }
     else if($todaykoday==7 && $row->saturdayflag ==1){
         $flaggreentoinsert=1; 
     }
if($flaggreentoinsert==1)
{
 
                                             $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddateamtime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->amtime);
                                            $announceddatepmtime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->pmtime);
                                          
                                           if($aajakodatetime < $announceddateamtime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                echo $_SESSION['thetomminusonedate'].' '.$row->amtime;
                                           }
                                           else if($aajakodatetime < $announceddatepmtime)
                                           {
                                            echo  $_SESSION['thetomminusonedate'].' '.$row->pmtime;  
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                    echo $nextdrawingdatewithcorrectformat.' '.$row->amtime;
                                               }   
}//if the flag is green
else 
{
 echo $nextdrawingdatewithcorrectformat.' '.$row->amtime;   
}
                                           
                                              
                                           }
                                           else if($row->drawing_type=='daily')
                                           {
                                                                              $todaykoday=$_SESSION['thetodayday'];
$offsetfornextdateampm=1;
if($todaykoday==1)
{
 if($row->mondayflag==1)
 {
   $offsetfornextdateampm=1;  
 }
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=5;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }
}
else if($todaykoday==2){
 
if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=4;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==3){
 
 if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=3;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==4){
 
 if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=2;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==5){
 
  if($row->fridayflag==1)
 {
  $offsetfornextdateampm=1;   
 }
 else if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=2;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==6){
 
   if($row->saturdayflag==1)
 {
  $offsetfornextdateampm=1;   
 }   
 else if($row->sundayflag==1)
 {
  $offsetfornextdateampm=2;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=6;   
 }  
}
else if($todaykoday==7){
 
    if($row->sundayflag==1)
 {
  $offsetfornextdateampm=1;   
 }  
 else if($row->mondayflag==1)
 {
  $offsetfornextdateampm=2;   
 }  
 else if($row->tuesdayflag==1)
 {
  $offsetfornextdateampm=3;   
 }  
 else if($row->wednesdayflag==1)
 {
  $offsetfornextdateampm=4;   
 }  
 else if($row->thursdayflag==1)
 {
  $offsetfornextdateampm=5;   
 }  
 else if($row->fridayflag==1)
 {
  $offsetfornextdateampm=6;   
 } 
}
$timestampfornextdrawingdate = strtotime("+".$offsetfornextdateampm." days");

$nextdrawingdate=date('Y-m-d', $timestampfornextdrawingdate);
$nextdrawingdatewithcorrectformat = getthenextdateformat($nextdrawingdate);
 if($todaykoday==1 && $row->sundayflag ==1)
     {
       $flaggreentoinsert=1;  
     }
     else if($todaykoday==2 && $row->mondayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==3 && $row->tuesdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==4 && $row->wednesdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==5 && $row->thursdayflag ==1){
          $flaggreentoinsert=1;
     }
     else if($todaykoday==6 && $row->fridayflag ==1){
         $flaggreentoinsert=1; 
     }
     else if($todaykoday==7 && $row->saturdayflag ==1){
         $flaggreentoinsert=1; 
     }
if($flaggreentoinsert==1)
{
       $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->dailytime);
                                             
                                           if($aajakodatetime < $announceddatetime){
                                             //echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$this->session->userdata('aajakodatetime'))[0]; 
                                                echo $_SESSION['thetomminusonedate'].' '.$row->dailytime;
                                           }
                                          
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                    echo $nextdrawingdatewithcorrectformat.' '.$row->dailytime;
                                               } 
}else 
{
  echo $nextdrawingdatewithcorrectformat.' '.$row->dailytime;   
}
    
                                           }
                                           else if($row->drawing_type=='onetime'){
                                              echo 'One time drawing'; 
                                           }
                                           else if($row->drawing_type=='weekly')
                                           {
                                             $databaseday=0;
                                       $todayday = $_SESSION['thetodayday'];
                                       //echo '<br>the today day:'.$todayday;
                                       
                                       if($row->drawing_day=='sunday')
                                           $databaseday=1;
                                       else if($row->drawing_day=='monday')
                                           $databaseday=2;
                                        else if($row->drawing_day=='tuesday')
                                           $databaseday=3;
                                         else if($row->drawing_day=='wednesday')
                                           $databaseday=4;
                                          else if($row->drawing_day=='thursday')
                                           $databaseday=5;
                                           else if($row->drawing_day=='friday')
                                           $databaseday=6;
                                            else if($row->drawing_day=='saturday')
                                           $databaseday=7;
                                            // echo '<br>the database day:'.$databaseday;
                                      if($todayday-$databaseday < 0)
                                           $theoffsetday= abs($todayday-$databaseday);
                                       else if($todayday-$databaseday > 0) 
                                           $theoffsetday = 7-abs($todayday-$databaseday);
                                       else 
                                       {
                                         $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->weeklytime);
                                           if($aajakodatetime < $announceddatetime){
                                             $theoffsetday=0;
                                           }
                                              
                                               else{
                                                 $theoffsetday = 7-abs($todayday-$databaseday);
                                               }  
                                       }
                                       $format = 'Y-m-d';
                                           $therawdate = date($format, strtotime('+'.$theoffsetday.'day',strtotime($_SESSION['thenextweekdate'])));
                                           
                                      
                                       $res=explode('-', $therawdate);
                                       $weeklykolagiyear=$res[0];
                $weeklykolagimonth=$res[1];
                $weeklykolagidate=$res[2];
                if($weeklykolagimonth==1)
                {
                  $weeklykolagimonth= 'January';
                  
                }
                else if($weeklykolagimonth==2)
                {
                  $weeklykolagimonth= 'February';  
                }
                else if($weeklykolagimonth==3)
                {
                  $weeklykolagimonth= 'March';  
                }
                else if($weeklykolagimonth==4)
                {
                  $weeklykolagimonth= 'April';  
                }
                else if($weeklykolagimonth==5)
                {
                  $weeklykolagimonth= 'May';  
                }
                else if($weeklykolagimonth==6)
                {
                  $weeklykolagimonth= 'June';  
                }
                else if($weeklykolagimonth==7)
                {
                  $weeklykolagimonth= 'July';  
                }
                else if($weeklykolagimonth==8)
                {
                  $weeklykolagimonth= 'August';  
                }
                else if($weeklykolagimonth==9)
                {
                  $weeklykolagimonth= 'September';  
                }
                else if($weeklykolagimonth==10)
                {
                  $weeklykolagimonth= 'October';  
                }
                else if($weeklykolagimonth==11)
                {
                  $weeklykolagimonth= 'November';  
                }
                else if($weeklykolagimonth==12)
                {
                  $weeklykolagimonth= 'December';  
                }
                  $theultimateweeklydate=$weeklykolagimonth.' '.$weeklykolagidate.', '.$weeklykolagiyear;
                                      echo $theultimateweeklydate.' '.$row->weeklytime;   
                                           }
                                               ?> 
                                        </td>
                                        <td>
                                            <button id="playagain_<?php echo $row->bet_id;?>" class="btn btn-warning btn-xs" alt="<?php echo $row->bet_id.'/'.$row->announcement_id; ?>" type="button" onclick="playagainandaddtotemporarycart(this.id)">Play Again</button>
                                        </td>
                                        
                               
                            
                                    </tr>
                                    <?php 
}
?>
     
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
            </div>

        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

