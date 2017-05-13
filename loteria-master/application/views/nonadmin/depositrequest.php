
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                        <li ><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li ><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>frontuser/lottouserbethistory"><?php echo lang('lang_dashboard_game_history_link_name'); ?></a>
                            </li>
                            
                            <li class='active'><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest"><?php echo lang('lang_dashboard_deposit_application_link_name'); ?></a>
                            </li>
                           <li><a href="<?php echo base_url();?>frontuser/lottouserpendingtickets"><?php echo lang('lang_dashboard_pending_tickets_link_name'); ?></a>
                            </li>
                            <li ><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottouserbankaccount"><?php echo lang('lang_dashboard_bank_account_link_name'); ?></a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6">
                            <legend>Depósito con tarjeta de crédito</legend> 
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-md-6">
                           
                            <form action="" onsubmit="return senddepositrequest(event)"  id="lottodepositrequest">
                              
                                
                                <div class="form-group">
                                    <label for="">Monto del depósito</label>
                                     
                                    <input id="lfdepositamount" name='x_amount' type="number" value="" class="form-control" required>
                                    
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
                                    
                                    <label for=""> Expiración</label>
                                    <input placeholder="mmyy"  name='x_exp_date' type="text" value="" class="form-control" required>
                                </div>
                               <input type='hidden' name='x_login' value='<?php echo $apiloginidandtransactionkey[0]; ?>' />
	 <input type='hidden' name='x_tran_key' value='<?php echo $apiloginidandtransactionkey[1]; ?>' />
	<input type='hidden' name='x_version' value='3.1' />
	<!input type='hidden' name='x_exp_date' value='03/15' />
        <input type='hidden' name='x_delim_data' value='TRUE' />
        <!input type='hidden' name='x_relay_response' value='False' />
    
	
	

                                <input type="submit" value="Depósito" class="btn btn-primary">
                               

                            </form>
                            </div>
                            </div>
                     <div class="row">
    <div class="gap-small"></div>
                        <div class="col-md-6">
                            <legend>Utilice su tarjeta de crédito existente</legend> 
                        </div>
                        
                        
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <form action="#"onsubmit="return sendexistingdepositrequest(event)"  id="lottoexistingdepositrequest">
                                  
                                <div class="form-group">
                                    <label for="">Monto del depósito</label>
                                     
                                    <input id="lfdepositamountwithexisting" name='x_amount' type="number" value="" class="form-control" required>
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="">Tarjeta existente</label>
                                    <select id='lfexistingcreditcard' class="form-control">
                                         <?php 
foreach($currentcreditcards->result() as $row){


?>
                                         <option id='lfexistingcc<?php echo $row->credit_cardno;?>' <?php if($row->primary_card_flag==1)echo 'selected';?> expirydate='<?php echo $row->expiry_date;?>' value="<?php echo $row->credit_cardno;?>">
                                           <?php echo $row->card_nickname;?>
                                        </option>
                                         
                       <?php 
}
?>
                                       
                                       
                                    </select>
                                </div>
                                <input type='hidden' name='x_login' value='<?php echo $apiloginidandtransactionkey[0]; ?>' />
	 <input type='hidden' name='x_tran_key' value='<?php echo $apiloginidandtransactionkey[1]; ?>' />
	<input type='hidden' name='x_version' value='3.1' />
	
        <input type='hidden' name='x_delim_data' value='TRUE' />
                                <input type="submit" class="btn btn-primary" value="Utilice su tarjeta de crédito existente">
                            </form>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="pull-right">
                            <div class="gap gap-small"></div> 
                                <ul class="list-inline list-payment">
                                     <li>
                                         
                                         <a class="btn btn-primary" href="<?php echo base_url();?>lottofront/confirmdeposit">Enviar Solicitud</a>
                                    </li>
                                     
                                       
                                </ul>
                            </div>
                        </div>
                    </div>
                          <div class="row">
    <div class="gap-small"></div>

                        <div class="col-md-6">
                            <legend>Depósito con PIN</legend> 
                        </div>
                        
                        
                    </div>
                         <div class="row">
                        <div class="col-md-6">
                            <form action="#" onsubmit="return senddepositrequestwithpin(event)"  id="lottopindepositrequest">
                                 <div class="form-group">
                                    <label for="">Introducir número de PIN</label>
                                   <input name="valor" id="lfdepositpinnumber" type="number"  class="form-control"  required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Depósito con PIN">
                            </form>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
           
 <div id="depositrequestyesno" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >¿Seguro que desea enviar la solicitud de depósito?</h1>  
            <input type="button" id="yesfordepositrequest" value="Yes" /> 
            <input type="button" id="nofordepositrequest" value="No" /> 
        </div> 
<div id="depositrequestexistingyesno" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >¿Seguro que desea enviar la solicitud de depósito?</h1>  
            <input type="button" id="yesforexistingdepositrequest" value="Yes" /> 
            <input type="button" id="noforexistingdepositrequest" value="No" /> 
        </div> 
<div id="depositrequestwithpinyesno" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >¿Seguro que desea enviar la solicitud de depósito?</h1>  
            <input type="button" id="yesforpindepositrequest" value="Yes" /> 
            <input type="button" id="noforpindepositrequest" value="No" /> 
        </div> 
