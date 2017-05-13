
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
                            
                            <li><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest"><?php echo lang('lang_dashboard_deposit_application_link_name'); ?></a>
                            </li>
                           <li><a href="<?php echo base_url();?>frontuser/lottouserpendingtickets"><?php echo lang('lang_dashboard_pending_tickets_link_name'); ?></a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottouserbankaccount"><?php echo lang('lang_dashboard_bank_account_link_name'); ?></a>
                            </li>
                        </ul>
                    </aside>

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                           <legend>Confirmar un depósito bancario existente</legend>

                            <form action="<?php echo base_url();?>lottofront/senddepositrequestforapprovalordisapproval" onsubmit="return senddepositrequestforapprovalordisapproval(event)" id="lottoconfirmdepositrequest">
                                                             <div class="form-group">
                                    <label for="">Monto del depósito</label>
                                    <input id="depositamount" type="number" value="" class="form-control" required>
                                </div>

 					<div class="form-group">
                                    <label for="">Nombre del banco</label>
                                    <input id="banco" type="text" value="" class="form-control" required>
                               		 </div>

				<div class="form-group">
                                    <label for="">Identificación de la transacción</label>
                                    <input id="transid" type="text" value="" class="form-control" required>
                               		 </div>
                              <div class="form-group">
                                    <label for="">Fecha de depósito</label>
                                    <input id="dateofdeposit" type="text" value="" class="form-control" required="" >
                                </div>
                                 <div class="form-group">
                                    <label for="">Clerk Name</label>
                                    <input id="clerkname" type="text" value="" class="form-control">
                               		 </div>
				
                                  <div class="form-group">
                                    <label for=""> Cashier </label>
                                    <input id="cashier" type="text" value="" class="form-control">
                               		 </div>
                                <div class="form-group">
                                    <label for=""> Upload picture receipt </label>
                                    <input name="receiptpic" id="receiptpicture" type="file" value="" class="form-control">
                               		 </div>
                               



                                

                                <input type="submit" value="Enviar Solicitud" class="btn btn-primary">
                               

                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
           
 <div id="depositrequestforapprovaldisapprovalyesno" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >¿Seguro que desea enviar la confirmación de depósito?</h1>  
            <input type="button" id="yesfordepositconfirm" value="Yes" /> 
            <input type="button" id="nofordepositconfirm" value="No" /> 
        </div> 