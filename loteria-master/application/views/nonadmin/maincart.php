<table class="table cart-table">
                     
                        <thead>
                            <tr>
                                 
                                 <th>Fecha</th>
                                <th>Lotería</th>
                                <th>Juego de Lotería</th>
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
	   
	 

		
 
		foreach ($_SESSION["betinfowithpartner"] as $cart_itm)
    {?>
                            
                                <tr>
                                     
                                        <td><?php echo $cart_itm["bet_date"];?></td>
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
                                   
                                    <a href="javascript:deletelottofrontbet()"><div class='fa fa-times'alt="<?php  echo $cart_itm["lotogroupid"].'/'.$cart_itm["lotterygameid"].'/'.$cart_itm["gametypeid"].'/'.$cart_itm["betno_slot1"].'/'.$cart_itm["betno_slot2"].'/'.$cart_itm["betno_slot3"].'/'.$cart_itm["betno_slot4"].'/'.$cart_itm["betno_slot5"].'/'.$cart_itm["partnerid"];?>"></div></a>
                                </td>
                            
                                    </tr>
        <?php
                    
       $subtotal+=  $cart_itm["bet_amount"];           
    }
    
    $total=$subtotal;
    
    }
    ?>
                           
                        </tbody>
                    </table>