
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
                            <li><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
                            </li>
                            <li class="active"><a href="<?php echo base_url();?>frontuser/lottouserbankaccount"><?php echo lang('lang_dashboard_bank_account_link_name'); ?></a>
                            </li>
                            
                        </ul>
</br>
</br>
</br>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div id="edit-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix" style="margin-top: 0px;">
                        <form action="<?php echo base_url(); ?>index.php/frontuser/updatelottouserbankaccount" onsubmit="return bankaccountinfoupdate(event)" id="lotouserbankaccounteditform" method="post">
                            <div class="form-group">
                                <label>Bank Name:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountbankname" required />
                            </div>
                            <div class="form-group">
                                <label>BIC(Swift Code):</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountswiftcode" required/>
                            </div>
                            <div class="form-group">
                                <label>Bank Address: </label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountbankaddress" required/>
                            </div>
                            <div class="form-group">
                                <label>Account No:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccountno" required/>
                            </div>
                            <div class="form-group">
                                <label>Account Type:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccounttype" required/>
                            </div>
                                     <div class="form-group">
                                <label>Customer Account Name:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccountname" required/>
                            </div>
                                      <div class="form-group">
                                <label>Customer Physical Address:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountphysicaladdress" required/>
                            </div>
                                     <div class="form-group">
                                <label>Customer Telephone:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccounttelephone" required/>
                            </div>
                            
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"  id="lotomainbankaccountflag"/>Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Aceptar Cambios" />
                        </form>
                    </div>
                    <div id="add-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix" style="margin-top: 0px;">
                        <form action="<?php echo base_url(); ?>index.php/frontuser/addlottouserbankaccount" onsubmit="return bankaccountinfoadd(event)" id="lotouserbankaccountaddform" method="post">
                           
                            <div class="form-group">
                                <label>Bank Name:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountbankname1" required />
                            </div>
                            <div class="form-group">
                                <label>BIC(Swift Code):</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountswiftcode1" required/>
                            </div>
                            <div class="form-group">
                                <label>Bank Address: </label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountbankaddress1" required/>
                            </div>
                            <div class="form-group">
                                <label>Account No:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccountno1" required/>
                            </div>
                            <div class="form-group">
                                <label>Account Type:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccounttype1" required/>
                            </div>
                                     <div class="form-group">
                                <label>Customer Account Name:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountaccountname1" required/>
                            </div>
                                      <div class="form-group">
                                <label>Customer Physical Address:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccountphysicaladdress1" required/>
                            </div>
                                     <div class="form-group">
                                <label>Customer Telephone:</label>
                                <input type="text" class="form-control smallheight" id="lotobankaccounttelephone1" required/>
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked class="i-check" id="lotomainbankaccountflag1" />Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add Bank Account" />
                        </form>
                    </div>
                    <div class="row row-wrap">
                        <?php 
foreach($result->result() as $row){


?>
                         <div class="col-md-4">
                            <div class="address-box">
                                <a class="address-box-remove lfbankaccountkodelete" alt="<?php echo $row->bank_account_serial_id;?>" href="javascript:deletelotobankaccount()" data-toggle="tooltip" data-placement="right" title="Remove"></a>
                                <a class="address-box-edit popup-text lfbankaccountkoedit" alt="<?php echo $row->bank_account_serial_id;?>" href="#edit-address-dialog" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="right" title="Edit"></a>
                                <ul>
                                    <li>Bank Name: <?php echo $row->bank_name;?></li>
                                     <li>BIC(Swift Code): <?php echo $row->swift_code;?></li>
                                    <li>Bank Address: <?php echo $row->bank_address;?></li>
                                    <li>Account No: <?php echo $row->account_no;?> </li>
                                    <li>Account Type: <?php echo $row->account_type;?> </li>
                                     <li>Customer Account Name: <?php echo $row->customer_account_name;?> </li>
                                     <li>Customer Physical Address: <?php echo $row->customer_physical_address;?> </li>
                                     <li>Customer Telephone: <?php echo $row->customer_telephone;?> </li>
                                </ul>
                                <div class="radio">
                                    <label>
                                        <input  type="radio" class="i-radio" name="primaryAddressOption" <?php if($row->primary_bankaccount_flag==1) echo 'checked';?>/>Cuenta Bancaria Primaria</label>
                                </div>
                            </div>
                        </div>
                        
                       <?php 
}
?>
                        <div class="col-md-4">
                            <a class="address-box address-box-new popup-text" href="#add-address-dialog" data-effect="mfp-move-from-top">
                                <div class="vert-center"><i class="fa fa-plus address-box-new-icon"></i>
                                    <p>Añadir nueva cuenta bancaria</p>
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

<div id="deleteyesnoforlotobankaccount" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >Are you sure you want to Delete?</h1>  
            <input type="button" id="yesforlotobankaccount" value="Yes" /> 
            <input type="button" id="noforlotobankaccount" value="No" /> 
        </div> 