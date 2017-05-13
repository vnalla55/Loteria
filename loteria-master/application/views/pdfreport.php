<html>
    <head>
        
    
     <!link rel="stylesheet" href="<?php //echo base_url();?>css/nonadmincss.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        
    </head>
    <body>
         <div style="margin-left:auto;
    margin-right:auto;
    width:700px;
    text-align:center;border-style: solid;
    border-width: 1px;" class="pdfcontainer">
           <?php     $subtotal=0;
                                    $total=0;
                                    $product=array();
                                   
                                 
   foreach($result->result() as $row){
                   // echo $row->ticket_no;
                    $product[]=array('gametypename'=>$row->gametype_name,'ticketno'=>$row->ticket_no,'partnericon'=>$row->partner_icon,'partnerphoneno'=>$row->phoneno,'partnername'=>$row->partner_name, 'lotogamename'=>$row->game_name.' '.$row->ampmtype, 'lotogroupname'=>$row->lotto_group_name, 'bet_amount'=>$row->bet_amount, 'betno_slot1'=>$row->betno_slot1, 'betno_slot2'=>$row->betno_slot2, 'betno_slot3'=>$row->betno_slot3, 'betno_slot4'=>$row->betno_slot4, 'betno_slot5'=>$row->betno_slot5);;  
             
                }
	   
	 
                                                   ?>
 
<?php if($product[0]['partnericon']){
    ?>
             <ul  style="padding-left:0px; margin-left: -600px;" >
                <img  style="width:75px; margin-left:49%;" title="" alt="" src="/var/www/loteria/partnericons/<?php echo $product[0]['partnericon']; ?>">
                                            
                                </ul>
        <?php 
} ?>

<strong><ul style="font-family:courier ; font-size: large" class="text-center">
 <?php echo $product[0]['partnername']; ?></ul></strong>
    <p style="font-family:courier ; font-size: medium" class="text-center"> 
 <?php echo $product[0]['partnerphoneno'] ; ?>
 </p>
		
 			  <p style="font-family:courier ; font-size: medium" class="text-center"> 
 
 <?php $englishday=jddayofweek (cal_to_jd (CAL_GREGORIAN , date("m"),date("d"), date("Y")) , 1 );
 if($englishday=='Monday')
     echo 'Lunes';
 else if($englishday=='Tuesday')
     echo 'Martes';
 else if($englishday=='Wednesday')
     echo 'Miercoles';
  else if($englishday=='Thursday')
     echo 'Jueves';
  else if($englishday=='Friday')
     echo 'Viernes';
  else if($englishday=='Saturday')
     echo 'Sabado';
  else if($englishday=='Sunday')
     echo 'Domingo';
echo ", "; 
echo date("d")."-"; 
echo date("m")."-";
echo date("Y")."";
?> <br>
               Ticket..: <?php echo $product[0]['ticketno']; 
echo  "&nbsp;&nbsp;&nbsp;";
 echo date("h:i:s A");?></p>
 <aside class="sidebar-left">
                        <div class="box clearfix">
                            <table style=" text-align: center;font-family:courier ;font-size: small;
    line-height: 50px;
    border-top: 1px solid #ddd;
    border-collapse: collapse;
    width: 100%;" class="tablepdf">
                                <thead style="border-bottom:1px solid #ddd; ">
                                    <tr>
                                        <th style=" text-align: center;
    line-height: 50px;">Lotería</th>
                                        <th style=" text-align: center;
    line-height: 50px;">Juego</th>
                                         <th style=" text-align: center;
    line-height: 50px;">Jugada</th>
                                        <th style=" text-align: center;
    line-height: 50px;">#'s Jugados</th>
                                        <th style=" text-align: center;
    line-height: 50px;">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $subtotal=0;
                                    $total=0;
                                   
	 
                                 foreach($product as $cart_itm){ 
                                    ?>
                                <tr>
                                    <td style=" border-bottom: 1px dashed #ddd;
     text-align: center;
    line-height: 50px;
    margin-left:15px;"><?php echo $cart_itm["lotogroupname"] ; ?></td>
                                   
             <td style=" border-bottom: 1px dashed #ddd;
     text-align: center;
    line-height: 50px;
    margin-left:15px;"><?php echo $cart_itm["lotogamename"] ; ?></td>
              <td style=" border-bottom: 1px dashed #ddd;
     text-align: center;
    line-height: 50px;
    margin-left:15px;"><?php echo $cart_itm["gametypename"] ; ?></td>
                                       <td style=" border-bottom: 1px dashed #ddd;
     text-align: center;
    line-height: 50px;
    margin-left:15px;">
                 <?php if($cart_itm["betno_slot1"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot1"].'</span>';?>
                                         <?php if($cart_itm["betno_slot2"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot2"].'</span>';?>
                                         <?php if($cart_itm["betno_slot3"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot3"].'</span>';?>
                                            <?php if($cart_itm["betno_slot4"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot4"].'</span>';?>
                                            <?php if($cart_itm["betno_slot5"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot5"].'</span>';?>
                                        
              
                                </td>
                                 <td style=" border-bottom: 1px dashed #ddd;
     text-align: center;
    line-height: 50px;
    margin-left:15px;">RD <?php echo $cart_itm["bet_amount"] ;  ?></td>
                                    </tr>
                                
                                
                                 <?php
                                 $subtotal+= $cart_itm["bet_amount"];
                       
}
$total=$subtotal;
    
?>
                                   
                                   
                                </tbody>
                            </table>
                            <ul style="list-style-type: none;text-align: right;font-family:courier; font-size: small;" >
                                <li><span>Sub Total:&nbsp;</span><span>RD$<?php echo $subtotal. ' ';?></span>
                                 </li>
                                <li><b><span>Total:&nbsp;</span><span>RD$<?php echo $total;?></span>
                                    </b> </li>
                            </ul>
                            <br>
<p style="font-family:courier; font-size: small"  class="pdftext-center" >
REVISE SU TICKET. NO SE ANULAN<br>
TICKETS DESPUES DE 15 MINUTOS<br>
<br>
**** BUENA SUERTE GRACIAS ****
        </p>
                        </div>
                    </aside>
                         </div>
    </body>
</html>
