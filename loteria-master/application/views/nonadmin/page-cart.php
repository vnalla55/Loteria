
        <div class="container">
            <div class="row">
                <div class="col-md-10" id="maincartchangingdiv">
                    <table class="table cart-table">
                     
                        <thead>
                            <tr>
                                 <th>Billete no</th>
                                 <th>Fecha</th>
                                  <th>Lotería Fecha</th>
                                <th>Lotería</th>
                                <th>Juego de lotería</th>
                                 <th>Tipo de juego</th>
                                 <th>Banca</th>
                                <th>Números Jugados</th>
                                <th>Valor</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                                    
                           <?php
   $subtotal=0;$total=0;
	if(isset($_SESSION["betinfowithpartner"]))
    {
	   
	 
if(count($_SESSION["betinfowithpartner"])>0){
		
 
		foreach ($_SESSION["betinfowithpartner"] as $cart_itm)
    {?>
                            
                                <tr>
                                      <td><?php echo $cart_itm["ticketno"];?></td>
                                        <td><?php echo $cart_itm["bet_date"];?></td>
                                        <td><?php echo $cart_itm["drawingdate"];?></td>
                                        <td><?php  echo $cart_itm["lotogroupname"];?></td>
                                         <td><?php echo $cart_itm["lotogamename"];?></td>
                                          <td><?php echo $cart_itm["gametypename"];?></td>
                                     
                                            <td><?php echo $cart_itm["partnername"];?></td>
                                       <td>
                                             <?php if($cart_itm['betno_slot1']!=0) echo' <span class="badge">'. $cart_itm['betno_slot1'].'</span>';?>
                                         <?php if($cart_itm['betno_slot2']!=0) echo' <span class="badge">'. $cart_itm['betno_slot2'].'</span>';?>
                                         <?php if($cart_itm['betno_slot3']!=0) echo' <span class="badge">'. $cart_itm['betno_slot3'].'</span>';?>
                                            <?php if($cart_itm['betno_slot4']!=0) echo' <span class="badge">'. $cart_itm['betno_slot4'].'</span>';?>
                                            <?php if($cart_itm['betno_slot5']!=0) echo' <span class="badge">'. $cart_itm['betno_slot5'].'</span>';?>
                                        
                                        
                                        </td>
                                        <td> <?php echo $cart_itm["bet_amount"];?> </td>
                                         
                               <td class="cart-item-remove">
                                   
                                    <a href="javascript:deletelottofrontbet()"><div class='fa fa-times'alt="<?php  echo $cart_itm["lotogroupid"].'/'.$cart_itm["lotterygameid"].'/'.$cart_itm["gametypeid"].'/'.$cart_itm["betno_slot1"].'/'.$cart_itm["betno_slot2"].'/'.$cart_itm["betno_slot3"].'/'.$cart_itm["betno_slot4"].'/'.$cart_itm["betno_slot5"].'/'.$cart_itm["partnerid"].'/'.$cart_itm["displaygarneampmtype"];?>"></div></a>
                                </td>
                            
                                    </tr>
        <?php
                    
       $subtotal+=  $cart_itm["bet_amount"];           
    }
    
    $total=$subtotal;
} else {
 echo '<tr><td colspan="5"><h4>Su cesta está vacía<h4></td></tr>';    
}
    }
    else
    {
        echo '<tr><td colspan="5"><h4>Su cesta está vacía<h4></td></tr>';
    }
    ?>
                           
                        </tbody>
                    </table>	<a href="#" class="btn btn-primary">Actualización de la cesta</a>

                </div>
                <div class="col-md-2">
                    <ul class="cart-total-list">
                        <li><span>Sub Total</span><span>RD$<?php echo $subtotal; ?></span>
                        </li>
                        <li><span>Total</span><span>RD$<?php echo $total; ?></span>
                        </li>
                    </ul>
                    <a href="<?php echo base_url();?>lottofront/pagecheckout" class="btn btn-primary btn-lg"><?php  echo lang('lang_checkout_link_name');?></a>

                </div>
            </div>
            <div class="gap"></div>
        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

  <div id="lottofrontbethistoryyesno" style="display:none; cursor: default; "> 
        <h1 style="font-size: 16px;" >¿Seguro que desea eliminar de la lista?</h1>  
        <input type="button" id="yesforbethistorylottofront" value="Si" /> 
        <input type="button" id="noforbethistorylottofront" value="No" /> 
</div> 