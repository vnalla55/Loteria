<?php
if(isset($_SESSION["betinfo"]))
    {
    if(count($_SESSION["betinfo"])==0)   
    {
        ?>
  
      <?php
    }
    }
    else 
    {
        
    }
?>
<table  id='temporarycart' class='table table-striped'>
    <thead>      
        <tr>
                        <th>
                            Loteria &nbsp;&nbsp;
                        </th>
                         <th>
                            Juego de lotería
            </th> 
                        <th>
                            #'s Jugados &nbsp;&nbsp;
                        </th>
                        <th>
                            Valor &nbsp;&nbsp;
                        </th>
                        <th>
                            Eliminar &nbsp;&nbsp;
                        </th>
        </tr>
</thead>
<tbody>

                        <?php
   $subtotal=0;$total=0;
	if(isset($_SESSION["betinfo"]))
    {
	   
	 

		if(count($_SESSION["betinfo"])>0)
                {
 
		foreach ($_SESSION["betinfo"] as $cart_itm)
                {
        ?>
           
         <tr>
             
              <td><?php echo $cart_itm["lotogroupname"] ; ?></td>
             <td><?php echo $cart_itm["lotogamename"] ; ?></td>
             <td>
                 <?php if($cart_itm["betno_slot1"]!=0) echo' <span class="badgewin">'. $cart_itm["betno_slot1"].'</span>';?>
                                         <?php if($cart_itm["betno_slot2"]!=0) echo' <span class="badgewin">'. $cart_itm["betno_slot2"].'</span>';?>
                                         <?php if($cart_itm["betno_slot3"]!=0) echo' <span class="badgewin">'. $cart_itm["betno_slot3"].'</span>';?>
                                            <?php if($cart_itm["betno_slot4"]!=0) echo' <span class="badgewin">'. $cart_itm["betno_slot4"].'</span>';?>
                                            <?php if($cart_itm["betno_slot5"]!=0) echo' <span class="badgewin">'. $cart_itm["betno_slot5"].'</span>';?>
                                        
              
             </td>
             <td>RD $<?php echo $cart_itm["bet_amount"] ;  ?></td>
             <td>
                
             <a href="javascript:editfromtemporarycart()"><div class='glyphicon glyphicon-edit'alt="<?php  echo $cart_itm["lotogroupid"].'/'.$cart_itm["lotterygameid"].'/'.$cart_itm["gametypeid"].'/'.$cart_itm["bet_amount"].'/'.$cart_itm["betno_slot1"].'/'.$cart_itm["betno_slot2"].'/'.$cart_itm["betno_slot3"].'/'.$cart_itm["betno_slot4"].'/'.$cart_itm["betno_slot5"].'/'.$cart_itm["drawingdatefrontelephantteeth"].'/'.$cart_itm["displaygarneampmtype"];?>"></div></a>|<a href="javascript:deletebetfromtemporarycart()"><div class='glyphicon glyphicon-trash'alt="<?php  echo $cart_itm["lotogroupid"].'/'.$cart_itm["lotterygameid"].'/'.$cart_itm["gametypeid"].'/'.$cart_itm["betno_slot1"].'/'.$cart_itm["betno_slot2"].'/'.$cart_itm["betno_slot3"].'/'.$cart_itm["betno_slot4"].'/'.$cart_itm["betno_slot5"].'/'.$cart_itm["drawingdate"].'/'.$cart_itm["displaygarneampmtype"];?>"></div></a>
             </td>
             
         </tr>
			
        <?php 
        $subtotal+= $cart_itm["bet_amount"];
                }
                $total=$subtotal;
                ?>
         
                    <?php
                
               
    	
		               

		
    }else {
       echo '<tr><td colspan="5">Su cesta está vacía</td></tr>';  
    }
    
                }else{
		//echo 'Su cesta está vacía';
        echo '<tr><td colspan="5">Su cesta está vacía</td></tr>';
                 
                
	}
	
    ?>
</tbody>
 </table>
 <p class="pull-right">
        Subtotal: RD$<?php echo $subtotal; ?>
 </p> <br><br>
        <p style="float:right;">
                 Total: RD$<?php echo $total; ?>
             </p>
             <div id="inlineeditkolagi1">
                 
             </div>