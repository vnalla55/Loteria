 <script src="<?php echo base_url();?>js/nonadminjs/jquery.js"></script>
 <script type="text/javascript">
      $(document).ready(function(){
     
  pagecheckoutpagehoyo=1;
                      
  
  
}); 
                       
                       </script>
        <div class="container">
       
            <div class="row row-wrap">
            
                        
                <div class="col-md-5">
                    <aside class="sidebar-left">
                        <div class="box clearfix">
                            <?php              if(isset($_SESSION["betinfowithpartner"]))
                                
    {
                                $ticketandcountarray=array();
                                $partnernamearray=array();
                                $partnertelephonearray=array();
                                $ticketarrayforpartnernamearray=array();
                                foreach($_SESSION["betinfowithpartner"] as $cart_itm){
                                    $ticketandcountarray[]=$cart_itm["ticketno"];
                                }
                                
        $ticketnoandcount =array();
       $ticketnoandcount= array_count_values ( $ticketandcountarray );
      
                                   foreach($_SESSION["betinfowithpartner"] as $cart_itm){
                                        
                                    if(!(in_array($cart_itm['ticketno'], $ticketarrayforpartnernamearray)))
                                    {
                                         $ticketarrayforpartnernamearray[]=$cart_itm['ticketno'];
                                        $partnernamearray[]=$cart_itm["partnername"];
                                        $partnertelephonearray[]= getthepartnertelephoneno($cart_itm['partnerid']);
                                   }
                                   
                                    }
                                              
                               
       //print_r($partnertelephonearray);
       $tickettracker=array();
       $total=0;
       $j=0;
	      foreach($ticketnoandcount as $rowticektandcount=>$value){
                  $countticket= $value;
                  $i=0;
           
                
                  ?>
                            <ul  style="padding-left:0px;" >
                <img  style="width:75px; margin-left:40%" title="" alt="" src="<?php echo base_url();?>partnericons/<?php echo  explode('/',$partnertelephonearray[$j])[1];?>"/>
                                  <a style="float:right;" value="value" href="javascript:deletebetfrompagecheckoutcart()"><div class='glyphicon glyphicon-trash pagecheckoutcart'alt="<?php  echo $rowticektandcount;?>"></div></a>          
                                </ul> <strong><p class="text-center font-family:courier ; font-size: large;padding-left:0px;"><?php echo $partnernamearray[$j] ; ?></p></strong>
		 <p style="font-family:courier ; font-size: medium" class="text-center"> 
 <?php echo explode('/',$partnertelephonearray[$j])[0]; ?>
 </p>
 			  <p style="font-family:courier ; font-size: medium" class="text-center"> 
 
 <?php 
 $englishday=jddayofweek (cal_to_jd (CAL_GREGORIAN , date("m"),date("d"), date("Y")) , 1 );
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
?> </br>
               Ticket..: <?php echo $rowticektandcount ; 
echo  "&nbsp;&nbsp;&nbsp;";
 echo date("h:i:s A");?></p>
                               
 <table style="font-family:courier ; font-size: small" class="table">
<thead>
</thead>
                                <thead>
                                    <tr>
                                          
                                        <th>Lotería</th>
                                        <th>Juego</th>
                                        <th>Jugada</th>
                                        <th>No</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $subtotal=0;
                                    
                       
                                    
                                    ?>
                            <?php  foreach($_SESSION["betinfowithpartner"] as $cart_itm){
                if($i<$countticket && !(in_array($cart_itm['ticketno'], $tickettracker))){
               ?>
                          
                                <tr>
                                    
                                    <td><?php echo $cart_itm["lotogroupname"] ; ?></td>
             <td><?php echo $cart_itm["lotogamename"] ; ?></td>
             <td><?php echo $cart_itm['gametypename'] ; ?></td>
                                       <td>
                 <?php if($cart_itm["betno_slot1"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot1"].'</span>';?>
                                         <?php if($cart_itm["betno_slot2"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot2"].'</span>';?>
                                         <?php if($cart_itm["betno_slot3"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot3"].'</span>';?>
                                            <?php if($cart_itm["betno_slot4"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot4"].'</span>';?>
                                            <?php if($cart_itm["betno_slot5"]!=0) echo' <span class="badge">'. $cart_itm["betno_slot5"].'</span>';?>
                                        
              
                                </td>
                                 <td>RD$<?php echo $cart_itm["bet_amount"] ;  ?></td>
                                    </tr>
                                
                                
                                 <?php
                                 $subtotal+= $cart_itm["bet_amount"];
                       


   
?>
                                   
                               
                           
              <?php $i++;} }  $tickettracker[]=$rowticektandcount;
              ?>
                     
                                </tbody>
                            </table>   

        
         <ul style="font-family:courier; font-size: small" class="cart-total-list text-right mb0">
                                <li><span>Sub Total</span><span>RD$<?php echo $subtotal;
                                $total=$total+$subtotal;
                                ?></span>
                                 </li>
                                 <li></li>
         </ul>
                                              <?php
               $j++; }?>
                                        <ul style="font-family:courier; font-size: small" class="cart-total-list text-right mb0">
                                            <li><span></span><span></span>
                                 </li>

                                <li><span>Total :</span><span>RD$<?php echo $total;?></span>
                                </li>
                            </ul>
<br>
<p style="font-family:courier; font-size: small"  class="text-center" >
REVISE SU TICKET. NO SE ANULAN </br>
TICKETS DESPUES DE 15 MINUTOS</br>
</br>
**** BUENA SUERTE GRACIAS ****
        </p>
 
        <?php
    
    
    
    
                                     }
                                     else 
                                     {
                                       ?>
                                          <p>Ticket no:</p>
                            <p>Banca:  </p>
                              <table class="table">
                                <thead>
                                    <tr>
                                          
                                        <th>Lotería</th>
                                        <th>Juego</th>
                                        <th>No</th>
                                        <th>Valor</th>                                    </tr>
                                </thead>
                                <tbody>  
                                </tbody>
                            </table>           
         <ul class="cart-total-list text-center mb0">
                                <li><span>Sub Total</span><span>RD$0</span>
                                 </li>
                                 <li><span>Total</span><span>RD$0</span>
                                </li>
                            </ul>
                                           
                                           <?php  
                                     }
                                     ?>
                        </div>
                    </aside>
                </div>
                <div class="col-md-7">
                    
                    <div class="row">
                        <div class="col-md-6">  
                               <legend>Opciones de pago</legend>  
                        </div>
                        
                    </div>
                 
                    <?php 
                                  if(!isset($_SESSION['lotteryuser']))
                                  {
                                 ?> 
                    <p class="mb20"><a data-effect="mfp-move-from-top" href="#login-dialog" class="popup-text">Entrar</a> or <a data-effect="mfp-move-from-top" href="#register-dialog" class="popup-text">Registrame</a> para el pago más rápido.</p>
                                  <?php }
                                  else {
                                      echo $_SESSION['lotteryusername'].'&nbsp;Balance: RD$'; echo $walletbalance;
                                  ?>
                    <div class="row">
                            <div class="gap-small"></div>
                        <div class="col-md-7">
                            <button class="btn btn-primary" onclick="pagecheckoutafterpedido()">Pague con Balance</button>
                            <button class="btn btn-primary" onclick="getthedivtopaywithpinforthebets()">Use PIN</button>
                            <button id="pageckeckoutdeposit" class="btn btn-primary"  onclick="">Depósito</button>
                          </div>
                        
                        <div class="gap"></div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Pagar con tarjeta de crédito</h3>

                            <form action="#" method='post' onsubmit="return pagecheckoutwithcardafterpedido(event)" id="paylottofrontbetswithcreditcard">
                                <!-- <legend>Información Personal</legend> -->
                                <?php 
                                  if(!isset($_SESSION['lotteryuser']))
                                  {
                                 ?> 
                                 
                                <div class="form-group">
                                    <label for="">Nombre Completo</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Número de Teléfono</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="text" class="form-control">
                                </div>
                                <legend>Dirección</legend>
                                <div class="form-group">
                                    <label for="">País</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Código Postal</label>
                                    <input type="text" class="form-control">
                                </div>
                               
                               
                                <?php  
                                 }?>
                                
                                <legend>Información de la Tarjeta de Crédito</legend>
                                <div class="cc-form">
                                    <div class="clearfix">
                                        <div class="form-group form-group-cc-number">
                                            <label>Número Tarjeta de Crédito</label>
                                            <input placeholder="xxxx xxxx xxxx xxxx" name='x_card_num' required type="text" class="form-control" /><span class="cc-card-icon"></span>
                                        </div>
                                        <div class="form-group form-group-cc-cvc">
                                            <label>CVC</label>
                                            <input placeholder="xxxx" type="text"  name='x_card_code' class="form-control" />
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="form-group form-group-cc-name">
                                            <label>Nombre Tarjeta de Crédito</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="form-group form-group-cc-date">
                                            <label>Expiración</label>
                                            <input placeholder="mmyy" name='x_exp_date' type="text" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                
                                    <input type='hidden' name='x_amount' value='<?php echo $total; ?>' />
                                 <input type='hidden' name='x_login' value='<?php echo $apiloginidandtransactionkey[0]; ?>' />
	 <input type='hidden' name='x_tran_key' value='<?php echo $apiloginidandtransactionkey[1]; ?>' />
	<input type='hidden' name='x_version' value='3.1' />
	
        <input type='hidden' name='x_delim_data' value='TRUE' />
                                <input type="submit" class="btn btn-primary" value="Presentar Pago">
                            </form>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="pull-right">
                            <div class="gap gap-small"></div> 
                                <ul class="list-inline list-payment">
                                     <li>
                                        <img src="<?php echo base_url();?>img/payment/vis-curved-64px.png" alt="Visa" title="Visa" />
                                    </li>
                                     <li>
                                        <img src="<?php echo base_url();?>img/payment/mast-curved-64px.png" alt="Mastercard" title="Mastercard" />
                                    </li>                             
                                    <li>
                                        <img src="<?php echo base_url();?>img/payment/maest-curved-64px.png" alt="maestro" title="maestro" />
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url();?>img/payment/gira-curved-64px.png" alt="GiroBancario" title="GiroBancario" />
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url();?>img/payment/mone-curved-64px.png" alt="Money Order" title="Money Order" />
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url();?>img/payment/tarj-curved-64px.png" alt="Tarjeta Pre-Paga" title="Tarjeta Pre-Paga" />
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-5 col-md-offset-1">
                            <h3>Pagar con Money Order</h3>

                             
                            <a href="http://tubanquita.co/loteria/lottofront/moneyorder" class="btn btn-primary">Pagar con Money Order</a>

                        </div>
                         
                    </div>
                        <?php  if(isset($_SESSION['lotteryuser']))
             {
              
             
             ?>
                     <div class="row">
                        <div class="col-md-6">
                            <legend>Pagar con tarjeta de crédito existente</legend> 
                        </div>
                        
                        
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <form action="#" onsubmit="return pagecheckoutwithexistingcardafterpedido(event)" id="paylottofrontbetswithexistingcreditcard">
                                 <div class="form-group">
                                    <label for="">Tarjeta existente</label>
                                    <select class="form-control" id="lfexistingcreditcard">
                                         <?php 
foreach($currentcreditcards->result() as $row){


?>
                                         <option id='lfexistingcc<?php echo $row->credit_cardno;?>' <?php if($row->primary_card_flag==1)echo 'selected';?> expirydate='<?php echo $row->expiry_date;?>' cvv='<?php echo $row->cvv;?>' value="<?php echo $row->credit_cardno;?>">
                                           <?php echo $row->card_nickname;?>
                                        </option>
                                         
                       <?php 
}
?>
                                       
                                       
                                    </select>
                                </div>
                                
                                    <input type='hidden' name='x_amount' value='<?php echo $total; ?>' />
                                 <input type='hidden' name='x_login' value='<?php echo $apiloginidandtransactionkey[0]; ?>' />
	 <input type='hidden' name='x_tran_key' value='<?php echo $apiloginidandtransactionkey[1]; ?>' />
	<input type='hidden' name='x_version' value='3.1' />
	
        <input type='hidden' name='x_delim_data' value='TRUE' />
                                <input type="submit" class="btn btn-primary" value="Pay with existing credit card">
                            
                            </form>
                        </div>
                    </div>
             <?php } ?>
                </div>
            </div>
            <div class="gap"></div>
        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

 <div id="popoverExampleTwoHiddenContent" style="display: none ;">
                            <button  class="btn btn-primary"  onclick="getthecreditcarddepositdivforcheckoutpage()">Tarjeta de Crédito</button>
    <button  class=" btn btn-default"  onclick="gettheprepaiddepositdivforcheckoutpage()">Tarjeta de Crédito Prepagada</button>
                   
  </div>  
  <!-- Popover 2 hidden title -->
  <div id="popoverExampleTwoHiddenTitle" style="display: none">
    Deposit Type?
  </div> 
  <div id="depositdivforcheckoutpages" class="mfp-dialog clearfix" style="display:none;">
      
            <h3 style="margin-top: -49px;"> Tarjeta de Crédito Deposit </h3>

            
        <span id="depositpagecheckoutspanpromt"></span>
            <form class="dialog-form" action="<?php echo base_url();?>lottofront/senddepositrequest" onsubmit="return senddepositrequestfrompagecheckout(event)"  id="creditcarddepositform" method="post">
                
               
                 
                
                
                
                <div class="form-group">
                              <label>Monto del depósito </label>
                              <input name="x_amount" id="lfpcdepositamt" type="number"  class="form-control" style="width:144px;" required>
                     </div>
                <div class="form-group">
                                    
                                    <label for="">Número Tarjeta de Crédito</label>
                                     <input  name='x_card_num' type="text" value="" class="form-control" required>
                                </div>
                  <div class="form-group">
                                    
                                    <label for="">CVV</label>
                                     <input  name='x_card_code' type="text" value="" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    
                                    <label for="">Expiración</label>
                                    <input placeholder="mmyy"  name='x_exp_date' type="text" value="" class="form-control" required>
                                </div>
                               <input type='hidden' name='x_login' value='<?php echo $apiloginidandtransactionkey[0]; ?>' />
	 <input type='hidden' name='x_tran_key' value='<?php echo $apiloginidandtransactionkey[1]; ?>' />
	<input type='hidden' name='x_version' value='3.1' />
	<!input type='hidden' name='x_exp_date' value='03/15' />
        <input type='hidden' name='x_delim_data' value='TRUE' />
                
                <input id="" type="submit" value="Continue" class="btn btn-primary"  >
                <input  type="button" value="Cancel" class="btn btn-warning cancelofpagecheckoutprepaidandcreditcard" >
            </form>
  </div>
  <div id="prepaidcarddivforcheckoutpages" class="mfp-dialog clearfix" style="display:none;">
      
            <h3 style="margin-top: -49px;"> Depósito tarjeta de crédito prepagada </h3>

            
        <span id="prepaidpagecheckoutspanpromt"></span>
            <form class="dialog-form" action="<?php echo base_url();?>lottofront/sendprepaiddepositrequest" onsubmit="return sendprepaidcarddepositrequest(event)" id="prepaidCarddepositform" >
                
               
                 
                
                
                
                <div class="form-group">
                              <label>Introducir número de PIN </label>
                              <input name="valor" id="lfpcpinnumber" type="number"  class="form-control"  required>
                     </div>
                
                <input id="" type="submit" value="Continue" class="btn btn-primary"  >
                <input  type="button" value="Cancel" class="btn btn-warning cancelofpagecheckoutprepaidandcreditcard" >
            </form>
  </div>
  
  <div id="paybetswithpinfromcheckout" class="mfp-dialog clearfix" style="display:none;">
      
            <h3 style="margin-top: -49px;"> Pay With Pin </h3>

            
        
            <form class="dialog-form" action="" onsubmit="return pagecheckoutwithpinafterpedido(event)" id="paybetswithpinform" >
                
               
                 
                
                
                
                <div class="form-group">
                              <label>Introducir número de PIN </label>
                              <input name="valor" id="lfpinnumberforbets" type="number"  class="form-control"  required>
                     </div>
                
                <input id="" type="submit" value="Continue" class="btn btn-primary"  >
                <input  type="button" value="Cancel" class="btn btn-warning cancelofpagecheckoutprepaidandcreditcard" >
            </form>
  </div>
    <div id="yesnoforpagecheckoutcartdelete" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >Are you sure you want to Delete?</h1>  
            <input type="button" id="yesforpagecheckoutcartdelete" value="Yes" /> 
            <input type="button" id="noforpagecheckoutcartdelete" value="No" /> 
        </div>
   <div id="emptysavecartfrompagecheckout" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >Would you like to empty your cart or save for later?</h1>  
            <input type="button" id="savecartfrompagecheckout" value="Save" /> 
            <input type="button" id="emptycartfrompagecheckout" value="Empty cart" /> 
             <input type="button" id="cancelemptysavecartfrompagecheckout" value="Cancel" /> 
        </div>
 