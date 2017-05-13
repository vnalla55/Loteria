
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                        <li><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
                            </li>
                            <li class="active"><a href="<?php echo base_url();?>frontuser/myaccountaddresses">Libreta de Direcciones</a>
                            </li>
                            <li><a href="<?php echo base_url();?>frontuser/lottouserbethistory"><?php echo lang('lang_dashboard_game_history_link_name'); ?></a>
                            </li>
                            
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div id="edit-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <form>
                            <div class="form-group">
                                <label>País</label>
                                <input value="Dominican Republic" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input value="Santo Domingo" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input value="Av Circunvalacion #001" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Código Postal</label>
                                <input value="10101" type="text" class="form-control" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="i-check" />Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Aceptar Cambios" />
                        </form>
                    </div>
                    <div id="add-address-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <form>
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Código Postal</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked class="i-check" />Programar Primario</label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Añadir Dirección" />
                        </form>
                    </div>
                    <div class="row row-wrap">
                        <div class="col-md-4">
                            <div class="address-box">
                                <a class="address-box-remove" href="#" data-toggle="tooltip" data-placement="right" title="Remove"></a>
                                <a class="address-box-edit popup-text" href="#edit-address-dialog" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="right" title="Edit"></a>
                                <ul>
                                    <li>País: Dominican Republic</li>
                                    <li>Ciudad: Santo Domingo</li>
                                    <li>Dirección: Av Circunvalacion #001</li>
                                    <li>Código Postal: 10101</li>
                                </ul>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="i-radio" name="primaryAddressOption" />Dirección Principal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="address-box">
                                <a class="address-box-remove" href="#" data-toggle="tooltip" data-placement="right" title="Remove"></a>
                                <a class="address-box-edit popup-text" href="#edit-address-dialog" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="right" title="Edit"></a>
                                <ul>
                                   <li>País: Dominican Republic</li>
                                    <li>Ciudad: Santo Domingo</li>
                                    <li>Dirección: Av Circunvalacion Sur</li>
                                    <li>Código Postal: 10101</li>
                                </ul>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="i-radio" name="primaryAddressOption" />Dirección Principal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="address-box">
                                <a class="address-box-remove" href="#" data-toggle="tooltip" data-placement="right" title="Remove"></a>
                                <a class="address-box-edit popup-text" href="#edit-address-dialog" data-effect="mfp-move-from-top" data-toggle="tooltip" data-placement="right" title="Edit"></a>
                                <ul>
                                     <li>País: Dominican Republic</li>
                                    <li>Ciudad: Santo Domingo</li>
                                    <li>Dirección: Av Circunvalacion #000</li>
                                    <li>Código Postal: 10101</li>
                                </ul>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="i-radio" name="primaryAddressOption" />Dirección Principal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a class="address-box address-box-new popup-text" href="#add-address-dialog" data-effect="mfp-move-from-top">
                                <div class="vert-center"><i class="fa fa-plus address-box-new-icon"></i>
                                    <p>Añadir Nueva Dirección</p>
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

