
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                        
                            <li ><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li class="active"><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
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
                            <span id="lottouseruserprompt"></span>
                            <form action="<?php echo base_url();?>frontuser/userinfoupdate" onsubmit="return userinfoupdate1(event)" id="lottouserupdateform">
                                 <?php 
foreach($result->result() as $row){
?>
                                <fieldset>
							<legend>Información Personal</legend>
							
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input id="lfname" type="text" value="<?php echo $row->name;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Apellido</label>
                                    <input id="lflastname" type="text" value="<?php echo $row->lastname;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo electrónico</label>
                                    <input id="lfemail" type="text" value="<?php echo $row->email;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Su Teléfono</label>
                                    <input id="lfphone" type="text" value="<?php echo $row->phone;?>" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label for="">Fecha de Nacimiento: </label>
                                    <input id="lfdateofbirth" type="text" value="<?php echo $row->date_of_birth;?>" class="form-control">
                                </div>
                                <div class="form-group" >
                                    <label for="">Género: </label>
                                    <select id="lfgender" class="form-control">
                                        <option  value="male" <?php if($row->gender=='male')echo 'selected'; ?>>Male</option><option value="female" <?php if($row->gender=='female')echo 'selected'; ?>>Female</option>
                                    </select>
                                   
                                </div>
                                  <div class="form-group">
                                    <label for="">Sector donde Reside: </label>
                                    <input id="lfresidence" type="text" value="<?php echo $row->residenceaddress;?>" class="form-control">
                                      </div>
                                      
                                        <div class="form-group">
                                    <label for="">Banca Favorita: </label>
                                    <select id="lffavbanca" class="form-control">
                                         <?php 
foreach($partnerinfo->result() as $rowforpartner){
    ?>
                                        <option value="<?php echo $rowforpartner->id; ?>" <?php if($rowforpartner->id==$row->fav_banca) echo 'selected'; ?>><?php echo $rowforpartner->partner_name; ?></option>
        <?php
}
?>
                                        
                                    </select>
                                   
                                </div>
                            
                                 </fieldset>
                                  <div class="gap-small"></div>
                                          <fieldset>
							<legend>Iniciar Sesión Detalle</legend>
                                 <div class="form-group">
                                    <label for="">Nombre de usuario</label>
                                    <input id="lfusername" type="text" value="<?php echo $row->username;?>" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label for="">Contraseña: </label>
                                    <input id="lfpassword" type="password" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Verificar contraseña: </label>
                                    <input id="lfverifypassword" type="password" value="" class="form-control">
                                </div>
                            
                            
                                </fieldset>
                               <div class="gap-small"></div>
                                
                                          <fieldset>
							<legend>Preferencias de La Cuenta</legend>
                               
                                  <div class="checkbox">
                                <label>
                                    <input type="checkbox" <?php if($row->auto_deposit_to_bank==1) echo 'checked';?> id="lfautomaticallydepositinbank" />Depositar automaticamente mis ganancias en mi cuenta bancaria</label>
                            </div>
                                                         <div class="checkbox">
                                <label>
                                    <input type="checkbox" <?php if($row->otherpreference==1) echo 'checked';?> id="lfsomeotherpreference" />Preferencia de los usuarios</label>
                            </div>
                                  </fieldset>
                                                                 <div class="gap-small"></div>
                                

                                <input type="submit" value="Aceptar Cambios" class="btn btn-primary">
                                <?php
}
?>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
           
