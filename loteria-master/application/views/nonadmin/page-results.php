<script src="<?php echo base_url();?>js/nonadminjs/jquery.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                                       <li class="active">
            <a href="<?php echo base_url()?>lottofront/pages/result"> Todos Lottos</a>
                                        </li>
              <?php 
foreach($lotogroups->result() as $row){


?>
   <li><a href="<?php echo base_url()?>frontresult/resultbylotogroup/<?php echo $row->lottogroup_id;?>"><?php echo $row->lotto_group_name;?></a>                                      
<?php 
}
?>
   			
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                             $num_rows = $noofrows;
           
            $total = $num_rows;

            // How many items to list per page
            $limit = $thelimit;

            // How many pages will there be
            //$pages = ceil($total / $limit);


            // What page are we currently on?

         //$page = $thepage;

    // Calculate the offset for the query
    //$offset = $theoffset;



            // Some information to display to the user
            $start = $thestart;
            $end = $theend;
            // $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';
            //$prevlink=$theprevlink;
    // The "forward" link
   // $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';
            //$nextlink=$thenextlink;
    // Display the paging information
    echo '<p ><h3 id="resultyetioutofyeti" style="margin-left:40%;">', $start, '-', $end, ' of ', $total, ' results</h3></p>';
        ?>
<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
<span></span> <b class="caret"></b>
</div>
 
<script type="text/javascript">
$(function() {
 
$('#reportrange span').html('<?php 
 if($startdate!=0) 
     { 
     echo $displaystartdate.' - '.$displayenddate;
     } else
         { 
         echo 'None Selected' ; 
         
         } ?>');
 
$('#reportrange').daterangepicker({
format: 'YYYY-MM-DD',
startDate:  moment().subtract(-1, 'days'),
endDate:  moment().subtract(-2, 'days'),
minDate: moment().subtract(12, 'month').startOf('month'),
maxDate: moment().subtract(-12, 'month').startOf('month'),
dateLimit: { days: 60 },
showDropdowns: true,
showWeekNumbers: true,
timePicker: false,
timePickerIncrement: 1,
timePicker12Hour: true,
ranges: {
 'None': [moment().subtract(-1, 'days'),moment().subtract(-2, 'days') ],
'Today': [moment(), moment()],
'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
'Last 7 Days': [moment().subtract(6, 'days'), moment()],
'Last 30 Days': [moment().subtract(29, 'days'), moment()],
'This Month': [moment().startOf('month'), moment().endOf('month')],
'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
},
opens: 'left',
buttonClasses: ['btn', 'btn-sm'],
applyClass: 'btn-primary',
cancelClass: 'btn-default',
separator: ' to ',
locale: {
applyLabel: 'Submit',
cancelLabel: 'Cancel',
fromLabel: 'From',
toLabel: 'To',
customRangeLabel: 'Custom',
daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
firstDay: 1
},

}, function(start, end, label) {
console.log(start.toISOString(), end.toISOString(), label);
var tobesentingetdiff=0;
if(start.format('MMMM D, YYYY')==moment().format('MMMM D, YYYY'))
{
 tobesentingetdiff=1;   
}
else if(start.format('MMMM D, YYYY')==moment().subtract(1, 'days').format('MMMM D, YYYY'))
{
     tobesentingetdiff=2;
}
else if(start.format('MMMM D, YYYY')==moment().subtract(6, 'days').format('MMMM D, YYYY'))
{
     tobesentingetdiff=3;
}
else if(start.format('MMMM D, YYYY')==moment().subtract(29, 'days').format('MMMM D, YYYY'))
{
     tobesentingetdiff=4;
}
else if(start.format('MMMM D, YYYY')==moment().startOf('month').format('MMMM D, YYYY'))
{
     tobesentingetdiff=5;
}
else if(start.format('MMMM D, YYYY')==moment().subtract(1, 'month').startOf('month').format('MMMM D, YYYY'))
{
     tobesentingetdiff=6;
}
else 
{
  tobesentingetdiff=7;  
}
//if(start.format('MMMM D, YYYY')==moment().subtract(-1, 'days').format('MMMM D, YYYY'))
//{
// $('#reportrange span').html('None Selected');   
//}
//else 
//{
// 
//}
 $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')); 
  window.location.assign('?start='+start.format('YYYY-MM-DD')+'&end='+end.format('YYYY-MM-DD')+'&active='+tobesentingetdiff);



//alert($("input[name = 'daterangepicker_start']").val());
//alert(start.format('YYYY-MM-DD'));
//var a_href = $('#viewmoreofpageresulttosetgetvariable').attr('href');
//$('#viewmoreofpageresulttosetgetvariable').attr('href','http://example.com');

});
 differencebetweentwodates= <?php echo $differencebetweentwodates;?>
});
</script> 
                            <table class="table table-order" id="alllottoresultstable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Fecha</th>
                                        <th>Juego</th>
                                        <th>Números Ganadores</th>
                                        <th> Próximos Sorteo</th>
                                          <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                     $theultimateweeklydate='';
foreach($result->result() as $row){
$flaggreentoinsert=0;

?>

 


                                <tr>
                                    
                                        
                                        <td class="table-order-img">
<a href="#">
    <img title="<?php echo $row->game_name;?>" alt="<?php echo $row->game_name;?>" src="<?php echo base_url();?>lotterygameicons/<?php echo $row->gameicon;?>">
</a>
</td>
                                    
                                        
                                        <td><?php echo $row->result_date;?></td>
                                        <td><?php echo $row->game_name.' '. $row->ampmtype; ?> &nbsp;<?php if($row->ampmspecifier){echo $row->ampmspecifier;}?><br>
                                        <span class="product-location"><?php echo $row->lotto_group_name;?></span>
                                        </td>
                                        
                                       <td>
                            <?php
                            $resultnumarray=explode('/',$row->result_num);
                            for($i=0;$i<count($resultnumarray);$i++)
                            {
                               echo'<span class="badgewin">'.$resultnumarray[$i].'</span>' ;
                            }
                            ?>

                                       
                                        
                                        </td>
                                        
                               <td>
                                  <?php if($row->drawing_type != 'onetime') { ?>
                                   <span class="product-time">
                                       <?php if($row->drawing_type =='daily') 
                                           {
                                           /////////////////////////////////////
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
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'];
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                   echo $nextdrawingdatewithcorrectformat;
                                               }
}else {
    echo $nextdrawingdatewithcorrectformat; 
}
   
                                           ////////////////////////////////////
                                          
                                              
                                           //echo $this->session->userdata('thetomdate');
                                           
                                           }
                                   else if($row->drawing_type =='weekly')
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
                                           
                                       //echo '<br>the raw day: '.$therawdate;
                                      // echo '<br>the today day: '.$_SESSION['thenextweekdate'];
                                      // echo '<br>the offset day: '.$theoffsetday;
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
                                      echo $theultimateweeklydate; 
                                       }
                                       else if($row->drawing_type =='ampm'){
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
                                        if($row->ampmspecifier =='AM')
                                        {
                                            if($flaggreentoinsert==1)
                                            {
                                               $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->amtime);
                                           if($aajakodatetime < $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'];
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                   echo $nextdrawingdatewithcorrectformat;
                                               }   
                                            }//if the flag is green to insert
                                            else {
                                                echo $nextdrawingdatewithcorrectformat;
                                            }
                                          
                                        }
                                        else 
                                        {
                                            if($flaggreentoinsert==1)
                                            {
                                                 $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->pmtime);
                                           if($aajakodatetime < $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'];
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                   echo $nextdrawingdatewithcorrectformat;
                                               }   
                                            } //if the flag to go is green
                                            else 
                                            {
                                              echo $nextdrawingdatewithcorrectformat;  
                                            }//if the flag is red
                                         
                                        }
                                              
                                       }
                                           ?>
                                   </span>
                              
                                      <?php } ?>
                                <span class="product-desciption"><?php echo $row->description; ?> </span>
                                <?php if($row->drawing_type !='onetime') { ?>
                                <div data-countdown="<?php 
                                if($row->drawing_type =='daily') 
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
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                              // echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'].' '.$row->dailytime;
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                    echo $nextdrawingdatewithcorrectformat.' '.$row->dailytime;
                                               }
                     }
                     else 
                     {
                      echo $nextdrawingdatewithcorrectformat.' '.$row->dailytime;
                                                 
                     }
                                  
                                    
                                    } 
                                    else if($row->drawing_type =='weekly'){echo $theultimateweeklydate.' '.$row->weeklytime;}
                                    else if($row->drawing_type =='ampm')
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
                                        if($row->ampmspecifier =='AM'){
                                            if($flaggreentoinsert==1)
                                            {
                                             $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->amtime);
                                           if($aajakodatetime < $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'].' '.$row->amtime;
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                   echo $nextdrawingdatewithcorrectformat.' '.$row->amtime;
                                               }     
                                            }
                                            else {
                                                echo $nextdrawingdatewithcorrectformat.' '.$row->amtime;
                                               
                                            }
                                             
                                              
                                        }
                                            
                                        else {
                                            if($flaggreentoinsert==1)
                                            {
                                               $aajakodatetime = new DateTime($_SESSION['aajakodatetime']);
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->pmtime);
                                           if($aajakodatetime < $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                echo $_SESSION['thetomminusonedate'].' '.$row->pmtime;
                                           }
                                              
                                               else{
                                                 //echo $this->session->userdata('thetomdate');    
                                                  // echo 'else ma aayo';
                                                   echo $nextdrawingdatewithcorrectformat.' '.$row->pmtime;
                                               }       
                                            }else{
                                              echo $nextdrawingdatewithcorrectformat.' '.$row->pmtime;
                                                 
                                            }
                                           
                                        }
                                            
                                        
                                        } ?>" class="countdown countdown-inline-small"></div>
                            
                                      <?php } ?>
                                <!-- COUNTDOWN -->
                                 </td>
                             
                             <td>
                                 <a class="popup-text btn btn-warning btn-xs lotoresultpopup" alt='<?php echo $row->lottogroup_id.'-'.$row->game_id;?>' href="#numpicker" data-effect="mfp-zoom-out" >Estadísticas</a>
                                   </td>
                               
                            
                                    </tr>
                                    <?php 
}
?>
     
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <!input id="resultviewmoreindicator" total="<?php //echo $total ?>" end="<?php //echo $end; ?>" start="<?php //echo $start; ?>" type="button" class="btn btn-info" value="View More"  onclick="bringotherresultsforalllotos()"/>
                        <div class="col-md-12">
                            <a id="viewmoreofpageresulttosetgetvariable" class="btn btn-info" href="?<?php if($startdate !=0 ){echo 'start='.$startdate.'&end='.$enddate;} ?>&limit=<?php $limit+=5;  echo $limit; ?>" style="width:100%;<?php if($total==$end) echo 'display:none;'; ?>">Ver Más</a>
                  
                        </div>
                          </div>
                    <div class="gap"></div>
                </div>
            </div>

        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

  <div id="numpicker" class="mfp-with-anim mfp-hide mfp-dialog clearfix container bg-primary" style="height:600px; max-width:1000px;" >
      <span id="graptimedisplay">3 Meses</span>
       <select id="graphtimeselector" class="pull-right" style="margin-right: 15px;">
              <option value="3">Last 3 Months
                  
              </option>
              <option value="4"> Últimos 4 Meses
                  
              </option>
               <option value="5"> Últimos 5 Meses
                  
              </option>
              <option value="6"> Últimos 6 Meses
                  
              </option>
              <option value="12"> Últimos 12 Meses
                  
              </option>
          </select>
           
      <div id="subnumpicker" style="height:500px; max-width:800px;">
          
      </div>
       
                
  </div>