
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
                            
                            <li><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest">Depósito Solicitud</a>
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
                           <legend>Solicitud de Retiro</legend>

                            <form action="<?php echo base_url();?>lottofront/sendwithdrawrequest" onsubmit="return sendwithdrawrequest(event)" id="lottowithdrawrequest">
                              
                                
                                <div class="form-group">
                                    <label for="">Retirar Monto</label>
                                    <input id="lfwithdrawamount" type="number" value="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Metodo de Deposito</label>
                                    <!input id="lfwithdrawmethod" type="number" value="" class="form-control" required>
                                    <select id="lfwithdrawmethod" class="form-control" required>
                                        <option value="bankaccountdeposit">
                                            Depósito en cuenta bancaria
                                        </option>
                                        <option value="check">
                                           Recibe un cheque
                                        </option>
                                    </select>
                                </div>
                               

                                <input type="submit" value="Enviar Solicitud" class="btn btn-primary">
                               

                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
           
 <div id="withdrawrequestyesno" style="display:none; cursor: default; "> 
            <h1 style="font-size: 16px;" >¿Seguro que desea enviar la solicitud de retiro?</h1>  
            <input type="button" id="yesforwithdrawrequest" value="Yes" /> 
            <input type="button" id="noforwithdrawrequest" value="No" /> 
        </div> 