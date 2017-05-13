 <script src="<?php echo base_url();?>js/nonadminjs/jquery.js"></script>
<script type="text/javascript">
   
 productloteria=1;
</script>
                                        
        <div class="container" style='margin-left:0px; width:100%;margin-top:-46px;'>
            <div class="row">
                <div class="proxima col-md-2 col-sm-12" style="margin-bottom:10px">
                    <div class="product-page-meta box">
                        <h4>Próxima Lotería</h4>
                        <p>Juegue En Tu Banca Favorita</p>
               <ul class="list product-page-meta-info">
                               <button class="btn btn-primary btn-lg btn-block" style="line-height: 2.0;" id="" value=""onclick="getrandomfiveno('<?php echo base_url();?>admin/getfiverandomnos')" >Juegue Ahora</button>
                             
                            <li><span class="product-page-meta-title">Tiempo para Jugar</span>
                                <!-- COUNTDOWN -->
                                <div data-countdown="Aug 25, 2012 10:45:00" class="countdown countdown-inline"></div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <div class="tipo col-md-5 col-sm-7 ">
                     <div id="numpicker" class="box" style="">
            <div class="content-secondary " >
                                   <!form class=""action="<?php echo base_url();?>lottofront/playgame" onsubmit="return playthegame5(event)" id="gameplayform" method="post">

                   
                 <div class="row" id="" style="margin-top:-10px">
              
                    
                        <table style="width:100%;">
                            <tr>
                                <td>
                                    <label><?php echo lang('lang_loteria_page_num_picker_div_label1'); ?>: &nbsp;&nbsp; </label>  
                                </td>
                                <td>
                                    <select name="lotterygamelotogroup[]" class="" id="example-enableClickableOptGroups"  required style="" multiple="multiple" size="5" onmouseover="">
                                          <?php
                                         
                                                      
                                        
                                       // print_r($lotogroupresult);
                                       //print_r($lotteryresult);
                                            $i=0;
                                            $ajaxgarnunaparneinfovayekoarray = array();
                                         foreach($lotogroupresult->result() as $row1){
                                              $j = 0;
                    // echo '<br>****************************value of j at the time of comparision:**************'.$j;
                                       $tempnoofgroup=$row1->noofgroup;
                          $templotogroupid=$row1->lottogroup_id;
                        //  echo '<br>count from the first table: '.$tempnoofgroup;
                         // echo '<br>Loto group id from first table '.$templotogroupid;
                                             
        echo '<optgroup label="'.$row1->lotto_group_name.'">';
              //echo '<input type="hidden" value="'.$templotogroupid.'" id="lotogroup"'.$i.'/>';     
              $lotterygameunderlotogroup= array();
                  
                                             
             foreach($lotteryresult->result() as $row){
                 $templotogroupid2=$row->lottogroup_id;
                 //echo '<br>lotto group id from the second table: '.$templotogroupid2;
                    $ampmflag=0;
                     
                 if(($j < $tempnoofgroup) && ($templotogroupid2== $templotogroupid))
                 {
                    
                     $displaygarnegametype='';
                     
                     
                    //echo '<br>*********************************************************************** crux:'.$j;
             $displaygarneampmtype = $row->ampmtype;
if (!in_array($row->game_name.$row->ampmtype, $lotterygameunderlotogroup)) {
    echo '<option alt="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'/'.$row->gameicon.'" value="'.$templotogroupid.'/'.$row->game_id.'/'.getthedrawingdatedetailsofthisgametype($templotogroupid,$row->game_id,$row->ampmtype).'/'.$row->ampmtype.'/'.$row->game_name.' '.$row->ampmtype.'/'.$row1->lotto_group_name.'/'.$row->drawing_type.'">'.$row->game_name.'  '.$row->ampmtype.' </option>'; 
      $lotterygameunderlotogroup[]=   $row->game_name.$row->ampmtype;    
       for ($i=0; $i < 7; $i++)
                                        {
                                             $format = 'Y-m-d';
                                           $therawdate = date($format, strtotime('+'.$i.'day',strtotime(explode(' ',$_SESSION['aajakodatetime'])[0])));
                                        // $ajaxgarnunaparneinfovayekoarray[]= array('a'.$templotogroupid.'_'.$row->game_id.'_'.$therawdate.'_'.$displaygarneampmtype => getthedamnlotodetailshoney($templotogroupid,$row->game_id,$therawdate,$displaygarneampmtype));;
                                          $ajaxgarnunaparneinfovayekoarray[$templotogroupid.'/'.$row->game_id.'/'.$therawdate.'/'.$row->ampmtype]=getthedamnlotodetailshoney($templotogroupid,$row->game_id,$therawdate,$row->ampmtype);
                                              
                                        }
     
}
                    
                     $j++;
                 }
                
             //echo '<br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$value of j after increment inside second loop: '.$j;
             }
             
            echo '<optgroup/>';  
                                           
        $i++;
                                         }
                                         // $print_r($lotogrouparray);
                                          
                                         
                                        
                        
                                        ?>
                                       
                                    </select> 
                                </td>
                                <td style="">
                                  <label > &nbsp;&nbsp;<?php echo lang('lang_loteria_page_num_picker_div_label3'); ?>: &nbsp;&nbsp;</label>  
                                </td>
                                <td style="float:right;">
                                    <select  name="gametype" style="width:100%; padding-left:3px; height:32px;" class="" id="gametype"  required  >
                                        <?php
                                        foreach($gametyperesult->result() as $row){
                                            echo '<option gametypename="'.$row->gametype_name.'" id="gametype'.$row->game_id.'" alt="'.$row->no_of_picks.'" value="'.$row->game_id.'">'.$row->gametype_name.'</option>';
                                        }
                                        ?>
                                    </select> 
                                    
                                    <input type="hidden" id="kungametyperateskoid" noofpicks="
                                           <?php
                                        foreach($gametyperesult->result() as $row){
                                            echo $row->no_of_picks.'/';
                                        }
                                        ?>
                                           " gametypename="
                                           <?php
                                        foreach($gametyperesult->result() as $row){
                                            echo $row->gametype_name.'/';
                                        }
                                        ?>
                                          
                                           "
                                            gametypeid="
                                            <?php
                                        foreach($gametyperesult->result() as $row){
                                            echo $row->game_id.'/';
                                        }
                                        ?>
                                            "
                                           />
                                </td>
                                
                                
                            </tr>
                        </table>
                         
                   
                       
                                     
                    
                    
                    
                    
                    
                    
               
            </div>
                <div id="" class="row" style="margin-top:3px; " >
                    <div class="col-12" style="overflow: hidden; margin-bottom: 5px; margin-right: 0px;" >
                         <h5 id="lottogamenumberofnoprompt" style="float: left; line-height: 29px;" ><?php echo lang('lang_loteria_no_of_picks_message'); ?></h5> 
                         <table style="float: right;">
                             <tr>
                                 <td  style="padding-top:20px;">
                                     <h5><?php echo lang('lang_loteria_page_num_picker_div_label2'); ?>:&nbsp; </h5>
                                 </td>
                                 <td>
                                    <select id="betgarnekundatehota" style="width:100%; padding-left:3px; height:32px;"  name="gametype" class=""   required  >
                                        <?php
                                        for ($i=0; $i < 7; $i++)
                                        {
                                             $format = 'Y-m-d';
                                           $therawdate = date($format, strtotime('+'.$i.'day',strtotime(explode(' ', $_SESSION['aajakodatetime'])[0])));
                                           
                                            echo '<option value="'.$therawdate.'">'.$therawdate.'</option>';
                                        }
                                        ?>
                                    </select> 
                                 </td>
                             </tr>
                         </table>
                         
                       
                    </div>
                </div>
                                   <div>
                                       <ul class="lottery-jenish">
                                            <?php
       for($i=1;$i<=100;$i++)
       {
           ?>
                                   
                                           <li>
                                       
                                  
         <button class="btn btn-default btn-circle" style="border-radius: 0px;width: 38px; height: 38px;line-height: 1;" id="number<?php if($i<10) echo '0'; echo $i; ?>" value="<?php if($i<10) echo '0'; echo $i; ?>" onclick="getnumberforgame(this.id)"> <?php if($i<10) echo '0'; echo $i; ?></button>
                                           </li>
                                     
 <?php }
       ?>           
                                        </ul> 
                                   </div>

                  <div class="" id="numberpickerrow" style=" margin-top: 1%;">
                <div class="no-padding-jenis col-12" style="">
                    <!input onfocus="this.blur()"  type="text" readonly class="btn btn-default btn-circle" style="background: #2049DF; color:white; border-radius: 5px;width: 50px; height: 31px; float:left;" id="pick1"/>
                    <input   type="text"  class="btn btn-default btn-circle" style="background: #2049DF; color:white; border-radius: 5px;width: 50px; height: 31px; float:left;" id="pick1"/>
                    
                    <input   type="text"  class="btn btn-default btn-circle" style="background: #2049DF;color:white; border-radius: 5px;width: 50px; height: 31px;float:left;" id="pick2"/>
                    <input   type="text"  class="btn btn-default btn-circle" style="background: #2049DF;color:white; border-radius: 5px;width: 50px; height: 31px;float:left;" id="pick3"/>
                    <input  type="text"  class="btn btn-default btn-circle" style="background: #2049DF;color:white; border-radius: 5px;width: 50px; height: 31px;float:left;display:none;" id="pick4"/>
                    <input   type="text"  class="btn btn-default btn-circle" style="background: #2049DF;color:white; border-radius: 5px;width: 50px; height: 31px;float:left; display:none;" id="pick5"/>
                    <button  class="btn btn-primary" style="line-height: 2.0;" id="" value=""onclick="getrandomfiveno('<?php echo base_url();?>admin/getfiverandomnos')" >Auto</button>
                    <a  href="javascript:resetnumgameanddate()" ><?php echo lang('lang_loteria_page_num_picker_div_label4'); ?></a>
              

                </div>

            </div>
                   <div class="row" style=" margin-top: 1%;">
                       <table >
                           <tr><td>
                                   <label> &nbsp;&nbsp;<?php echo lang('lang_loteria_page_num_picker_div_label5'); ?> (RD$): &nbsp;&nbsp;</label> 
                               </td>
                               <td>
                                   <input type="radio" value="1" name="montoradio"/>1&nbsp;
                               </td>
                                <td>
                                  <input type="radio" value="2" name="montoradio"/>2&nbsp; 
                               </td>
                          
                                <td>
                                  <input type="radio" value="20" name="montoradio"/>20&nbsp; 
                               </td>
                                <td>
                                  <input type="radio" value="30" name="montoradio"/>30&nbsp; 
                               </td>
                                <td>
                                  <input type="radio" value="50" name="montoradio"/>50 
                               </td>
                               <td>
                                <input type="number" class="form-control" id="betamount" style="width:90px;" required>  
                               </td>
                               <td>
                                  &nbsp;<button  email="<?php if(isset($_SESSION['lotteryuser']))echo $_SESSION['lotteryuser'];?>" type="submit" class="btn btn-success" style="" id="playthelotto" value=""onclick="playthegame5()"><?php echo lang('lang_loteria_page_num_picker_div_label6'); ?></button>  
    
                               </td>
                           </tr>
                       </table>
                       
                        
 
 
                 </div>
                    <!--/form-->
                </div><!-- END of content secondary -->

        </div><!-- END of container -->


                    
                        
                    
                    
                    
                    
                    
                    
              
                   

                </div>
                <div class="col-md-5 col-sm-5  " style='' >
                    <div class="box">
                        <div id='temporarycartchangingdiv' class="no-padding col-md-12">
         <table  id='temporarycart' class="table table-striped">
             <thead>
                    <tr>
                        <th>
                            Loteria &nbsp;&nbsp;
                        </th>
                        <th>
                            Lottery Game
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
             <td>RD$<?php echo $cart_itm["bet_amount"] ;  ?></td>
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
                
               
    	
		               

		
    }else{
       echo '<tr><td colspan="5">Su cesta está vacía</td></tr>'; 
    }
    
                }else{
		//echo 'Your Cart is empty';
        echo '<tr><td colspan="5">Su cesta está vacía</td></tr>';
                 
                
	}
	
    ?>
         </tbody>
 </table>
                        <p class="pull-right">
        Subtotal: RD$<?php echo $subtotal; ?>
                        </p>
                        <br><br>
        <p style="float:right;">
                 Total: RD$<?php echo $total; ?>
             </p>
                    </div>
                    <div class="row">
                        <table style="margin-left: 10%;">
                            <tr>
                                 <td>
                                <?php echo lang('lang_loteria_selec_partner_label'); ?>  &nbsp;&nbsp;&nbsp;
                            </td>
                            <td>
                              <select  name="partnertcart"  id="partnertc"  required  >
                                        <?php
                                        foreach($partnerresult->result() as $row){
                                            if($favbanca==$row->id)
                                            echo '<option selected data-imagesrc="'.base_url().'partnericons/'.$row->partner_icon.'" data-description="'.$row->address.'"   value="'.$row->id.'/'.$row->partner_name.'">'.$row->partner_name.'</option>';
                                            else
                                            echo '<option data-imagesrc="'.base_url().'partnericons/'.$row->partner_icon.'" data-description="'.$row->address.'"   value="'.$row->id.'/'.$row->partner_name.'">'.$row->partner_name.'</option>';
                                      
                                            }
                                        ?>
                             </select>   
                            </td>
                            </tr>
                            
                        </table>
                        
                    </div>
                    <div class="row" style="margin-top:6px;">
                        <table  style="margin-left: 34%;">
                            <tr>   <br>
                                <td ><?php if(isset($_SESSION['lotteryusername'])) echo $_SESSION['lotteryusername'];  ?>&nbsp;Saldo de la cuenta: RD$<?php if(isset($_SESSION['lotteryusername'])) echo $walletbalance;?></td>
                               
                            </tr>
                            <tr>
                           
                            <td>   <br>
                                <a id="proceedtocheckoutbutton" class="btn btn-primary" <?php 
                                if(!isset($_SESSION["betinfo"]))
    {
                                     
     echo 'disabled';                               
    }
    else 
    {
     if(count($_SESSION["betinfo"])==0)                               
     echo 'disabled';   
    }?>  href="javascript:maincartaftertemp()">Pasar por la caja</a>  &nbsp;&nbsp;&nbsp;
                           
                                
                            </td> 
                            </tr>
                          
                        </table>
                      
                    </div>
                </div>
               </div>
            </div>
            <div class="row">
                
                     <div class="gap gap-small"></div>
                    
                        </div>
                    </div>
            </div>

        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

     
        
        
        
        
        
       
            <div id="temporarycart-dialog" class="mfp-dialog clearfix" style="display:none;">
           

            <h3 style="margin-top: -49px;"> Editar Cesta </h3>

            
        <span id="temporrarcartspanpromt"></span>
            <form class="dialog-form" action="<?php echo base_url();?>lottofront/updatetemporarycart" onsubmit="return temporarycartupdate(event)" id="temporarycartupdateform" >
                <div class="form-group">
                    <label>Loteria</label>
                    <select name="lotterygamelotogroup1[]" class="" id="example-enableClickableOptGroups1"  style="" multiple="multiple" size="5" >
                                          <?php
                                         
                                                      
                                        
                                       // print_r($lotogroupresult);
                                       //print_r($lotteryresult);
                                            $i=0;
                                         foreach($lotogroupresult->result() as $row1){
                                              $j = 0;
                    // echo '<br>****************************value of j at the time of comparision:**************'.$j;
                                       $tempnoofgroup=$row1->noofgroup;
                          $templotogroupid=$row1->lottogroup_id;
                        //  echo '<br>count from the first table: '.$tempnoofgroup;
                         // echo '<br>Loto group id from first table '.$templotogroupid;
                                             
        echo '<optgroup label="'.$row1->lotto_group_name.' "  >';
              //echo '<input type="hidden" value="'.$templotogroupid.'" id="lotogroup"'.$i.'/>';     
              
                    $lotterygameunderlotogroup= array();      
                                             
             foreach($lotteryresult->result() as $row){
                  $ampmflag=0;
                 $templotogroupid2=$row->lottogroup_id;
                 //echo '<br>lotto group id from the second table: '.$templotogroupid2;
                 if(($j < $tempnoofgroup) && ($templotogroupid2== $templotogroupid))
                 {
                  // echo '<option  value="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'">'.$row->game_name.'</option>'; 
                    //echo '<br>*********************************************************************** crux:'.$j;
                  

$displaygarnegametype='';
                     $displaygarneampmtype='';
                     if($row->drawing_type=='ampm')
                     {
                       $displaygarnegametype= 'AMPM';  
                       
                     }
                     else if($row->drawing_type=='onetime')
                     {
                       $displaygarnegametype= 'ONE TIME';   
                        $aajakodatetime = new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' 12:00:00');
                                            $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.explode(' ',$row->onetimedatetime)[1]);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                                $ampmflag=0;
                                           }
                                           else 
                                           {
                                               $ampmflag=1;
                                           }
                     }
                      
                     else if($row->drawing_type=='weekly')
                     {
                       $displaygarnegametype= 'WEEKLY';
                      $aajakodatetime = new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' 12:00:00');
                                              $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->weeklytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
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
                        $aajakodatetime = new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' 12:00:00');
                                           $announceddatetime=new DateTime(explode(' ',$_SESSION['aajakodatetime'])[0].' '.$row->dailytime);
                                           if($aajakodatetime > $announceddatetime){
                                             //echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
                                               //echo 'if ma aayo';
                                              // echo explode(' ',$_SESSION['aajakodatetime'])[0]; 
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
                    //echo '<br>*********************************************************************** crux:'.$j;
                 $displaygarneampmtype = $row->ampmtype;
if (!in_array($row->game_name.$displaygarneampmtype, $lotterygameunderlotogroup)) {
    echo '<option alt="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'/'.$row->gameicon.'" value="'.$templotogroupid.'/'.$row->game_id.'/'.getthedrawingdatedetailsofthisgametype($templotogroupid,$row->game_id,$displaygarneampmtype).'/'.$displaygarneampmtype.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->drawing_type.'">'.$row->game_name.'  '.$displaygarneampmtype.' </option>'; 
      $lotterygameunderlotogroup[]=   $row->game_name.$displaygarneampmtype;            
}
       
                     $j++;
                 }
                
             //echo '<br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$value of j after increment inside second loop: '.$j;
             }
             
            echo '<optgroup/>';  
                                           
        $i++;
                                         }
                                         // $print_r($lotogrouparray);
                                          
                                         
                                        
                         
                                        ?>
                                       
                                    </select> 
                    
                </div>
                <div class="form-group">
                              <label>Fecha del Sorteo </label>
                                <select id="fdrawingdate" class="form-control" style="width:144px;" required  >
                                        <?php
                                        for ($i=0; $i < 7; $i++)
                                        {
                                             $format = 'Y-m-d';
                                           $therawdate = date($format, strtotime('+'.$i.'day',strtotime(explode(' ',$_SESSION['aajakodatetime'])[0])));
                                           
                                            echo '<option value="'.$therawdate.'">'.$therawdate.'</option>';
                                        }
                                        ?>
                                    </select> 
                </div>
                <div class="form-group">
                    <label>#'s Jugados</label>
                     <div class="row">
                         
                         <div class="col-md-2" style="width:85px;">
                            <input id="temppick1" type="text"  class="form-control" required> 
                         </div>
                         <div class="col-md-2" style="width:85px;">
                               <input id="temppick2" type="text"  class="form-control" required>
                         </div>
                         <div class="col-md-2" style="width:85px;">
                            <input id="temppick3" type="text"  class="form-control" required>  
                         </div>
                         <div class="col-md-2" style="width:85px;">
                             <input id="temppick4" type="text"  class="form-control" required> 
                         </div>
                         <div class="col-md-2" style="width:85px; margin-top:3px;">
                              <input id="temppick5" type="text"  class="form-control" required>
                         </div>
                             
                     </div>
                    
                   
              
              
              
                </div>
                 
                
                
                
                <div class="form-group">
                              <label>Valor </label>
                              <input name="valor" id="fvalor" type="number"  class="form-control" style="width:144px;" required>
                     </div>
                <input type="hidden" id="selectededitidoftempcartupdateform" value=""/>
                <input id="" type="submit" value="Update" class="btn btn-primary"  >
                <input id="canceloftemporaryeditform" type="button" value="Cancel" class="btn btn-warning" >
            </form>
          
        </div>

      
 
 
        <p>
            <!input id="ajaxgarnunaparneinfovayekoarray" type="hidden" value="<?php //echo $ajaxgarnunaparneinfovayekoarray;  ?>"
            <?php 
             //print_r($ajaxgarnunaparneinfovayekoarray);
            ?>
          
        </p>
         <script type="text/javascript">
      $(document).ready(function(){
     
   ajaxgarnunaparneinfovayekoarray = <?php echo json_encode($ajaxgarnunaparneinfovayekoarray); ?>; 
                      
  
  
}); 
                       
                       </script>