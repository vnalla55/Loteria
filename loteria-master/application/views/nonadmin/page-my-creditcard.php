
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                        <li ><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
                            </li>
                           
                            <li ><a href="<?php echo base_url();?>frontuser/lottouserbethistory"><?php echo lang('lang_dashboard_game_history_link_name'); ?></a>
                            </li>
                           
                            <li><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest"><?php echo lang('lang_dashboard_deposit_application_link_name'); ?></a>
                            </li>
     <li><a href="<?php echo base_url();?>frontuser/lottouserpendingtickets"><?php echo lang('lang_dashboard_pending_tickets_link_name'); ?></a>
                            </li>
                            <li class="active"><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
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
                    <div id="edit-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <form action="<?php echo base_url(); ?>index.php/frontuser/updatelottousercreditcard" onsubmit="return creditcardinfoupdate(event)" id="lotousercreditcardeditform" method="post">
                            <div class="form-group">
                                <label> Apodo Tarjeta:</label>
                                <input type="text" class="form-control" id="lotocreditcardnickname" required />
                            </div>
                            <div class="form-group">
                                <label>Nombre Tarjeta de Crédito</label>
                                <input type="text" class="form-control" required id="lotocreditcardname" />
                            </div>
                            <div class="form-group">
                                <label>Número Tarjeta de Crédito:</label>
                                <input type="text" class="form-control" id="lotocreditcardno" />
                            </div>
                            <div class="form-group">
                                <label>CVV:</label>
                                <input type="text" class="form-control" id="lotocvv"/>
                            </div>
                            <div class="form-group">
                                <label>Expiración:</label>
                                <input type="text" placeholder="mmyy" class="form-control" id="lotoexpirydate" />
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"  id="lotomaincreditcardflag"/>Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Aceptar Cambios" />
                        </form>
                    </div>
                    <div id="add-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <form action="<?php echo base_url(); ?>index.php/frontuser/addlottousercreditcard" onsubmit="return creditcardinfoadd(event)" id="lotousercreditcardaddform" method="post">
                          
                           <div class="form-group">
                                <label> Apodo Tarjeta:</label>
                                <input type="text" class="form-control" id="lotocreditcardnickname1" required />
                            </div>
                            <div class="form-group">
                                <label>Nombre Tarjeta de Crédito</label>
                                <input type="text" class="form-control" id="lotocreditcardname1" required />
                            </div>
                            <div class="form-group">
                                <label>Número Tarjeta de Crédito:</label>
                                <input type="text" class="form-control" id="lotocreditcardno1" required/>
                            </div>
                            <div class="form-group">
                                <label>CVV:</label>
                                <input type="text" class="form-control" id="lotocvv1" required/>
                            </div>
                            <div class="form-group">
                                <label>Expiración:</label>
                                <input type="text" placeholder='mmyy' class="form-control" id="lotoexpirydate1" required/>
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked class="i-check" id="lotomaincreditcardflag1" />Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add Credit Card" />
                        </form>
                    </div>
                    <div class="row row-wrap">
                        <?php 
foreach($result->result() as $row){


?>
                         <div class="col-md-4">
                            <div class="address-box">
                                <a class="address-box-remove lfcreditcardkodelete" alt="<?php echo $row->credit_card_serial_id;?>" href="javascript:deletelotocreditcard()" data-toggle="tooltip" data-placement="right" title="Remove"></a>
                                <a class="address-box-edit popup-text lfcreditcardkoedit" alt="<?php echo $row->credit_card_serial_id;?>" href="#edit-address-dialog" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="right" title="Edit"></a>
                                <ul>
                                    <li>Apodo Tarjeta: <?php echo $row->card_nickname;?></li>
                                    <li>Nombre Tarjeta de Crédito: <?php echo $row->credit_cardname;?></li>
                                     <li>Número Tarjeta de Crédito: <?php echo $row->credit_cardno;?></li>
                                    <li>CVV: <?php echo $row->cvv;?></li>
                                    <li>Expiración: <?php echo $row->expiry_date;?> </li>
                                    
                                </ul>
                                <div class="radio">
                                    <label>
                                        <input  type="radio" class="i-radio" name="primaryAddressOption" <?php if($row->primary_card_flag==1) echo 'checked';?>/>Tarjeta de crédito Primaria</label>
                                </div>
                            </div>
                        </div>
                        
                       <?php 
}
?>
                        <div class="col-md-4">
                            <a class="address-box address-box-new popup-text" href="#add-address-dialog" data-effect="mfp-move-from-top">
                                <div class="vert-center"><i class="fa fa-plus address-box-new-icon"></i>
                                    <p>Añadir nueva tarjeta de crédito</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
            </div>

        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

<div id="deleteyesnoforlotocreditcard" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >Are you sure you want to Delete?</h1>  
            <input type="button" id="yesforlotocreditcard" value="Yes" /> 
            <input type="button" id="noforlotocreditcard" value="No" /> 
        </div> 
       