

<?php
         if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   $allpermissioninfo = $adminmodulepermission;
            }
   

}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
         <?php echo lang('lang_menu_third');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_third');?></a></li>
            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            <?php 
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#partneradd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Partner"><i class="fa fa-plus"></i> Add Partner</button>';
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[17]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="partnerdatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Name </th> 
                                    <th>Username </th> 
                                     <th>Email </th> 
                                       <th>Address </th>
                                       <th>Country </th>
                                        <th>Phone </th>
                                        <th>Postal Code </th>
                                        <th>Icon</th>
                                    <th>Actions</th>
                                </tr>



                            </thead>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->




</div>
<div class="modal fade" id="partneredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Partner Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/partner/updatebusinesspartner" onsubmit="return businesspartnerinfoupdate(event)" id="businesspartnerupdateform" method="post">

                <div class="modal-body">
                    <span id="businesspartnereditpromptspan">

</span>
                    <div class="box-body">
                         <div class="form-group">
                            <label >Name</label>
                             <input type="text" class="form-control" name="gamname" id="businesspartnername" required >
      
                        </div>
                         <div class="form-group">
                            <label >Username</label>
                            <input type="text" class="form-control" name="businesspartnerusernamewhileadd" id="businesspartnerusername" required >
      
                        </div>
                         <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="gamname" id="businesspartnerpassword"  >
      
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                           <input type="email" class="form-control" name="gamname" id="businesspartneremail" required >
      
                        </div>
                         <div class="form-group">
                            <label >Address</label>
                           <input type="text" class="form-control" name="gamname" id="businesspartneraddress" required >
      
                        </div>
                       
                        <div class="form-group">
                            <label >Icon</label>
                           <input id="partnericonfile" type="file" name="partnerfile" size="20"  />
                           <input type="hidden" name="previouspartnericon" value=""/>
                                 
                        </div>
                         <div class="form-group">
                            <label >Preview</label>
                          <img id="partnericonforpartner" width="100" height="100" src="" alt="image preview">
                                  
                                 
                        </div>
                         <div class="form-group">
                            <label >Country</label>
 <select required="" id="bpcountry" class="form-control" name="sel_country">

<option selected="selected" value="selectcountry"> --- Select Your Country Name ---</option><option value="Afghanistan"> Afghanistan</option><option value="Albania"> Albania</option><option value="Algeria"> Algeria</option><option value="American Samoa"> American Samoa</option><option value="Andorra"> Andorra</option><option value="Angola"> Angola</option><option value="Anguilla"> Anguilla</option><option value="Antigua and Barbuda"> Antigua and Barbuda</option><option value="Argentina"> Argentina</option><option value="Armenia"> Armenia</option><option value="Aruba"> Aruba</option><option value="Australia"> Australia</option><option value="Austria"> Austria</option><option value="Azerbaijan"> Azerbaijan</option><option value="Bahamas"> Bahamas</option><option value="Bahrain"> Bahrain</option><option value="Bangladesh"> Bangladesh</option><option value="Barbados"> Barbados</option><option value="Belarus"> Belarus</option><option value="Belgium"> Belgium</option><option value="Belize"> Belize</option><option value="Benin"> Benin</option><option value="Bermuda"> Bermuda</option><option value="Bhutan"> Bhutan</option><option value="Bolivia"> Bolivia</option><option value="Bosnia-Herzegovina"> Bosnia-Herzegovina</option><option value="Botswana"> Botswana</option><option value="Bouvet Island"> Bouvet Island</option><option value="Brazil"> Brazil</option><option value="Brunei"> Brunei</option><option value="Bulgaria"> Bulgaria</option><option value="Burkina Faso"> Burkina Faso</option><option value="Burundi"> Burundi</option><option value="Cambodia"> Cambodia</option><option value="Cameroon"> Cameroon</option><option value="Canada"> Canada</option><option value="Cape Verde"> Cape Verde</option><option value="Cayman Islands"> Cayman Islands</option><option value="Central African Republic"> Central African Republic</option><option value="Chad"> Chad</option><option value="Chile"> Chile</option><option value="China"> China</option><option value="Christmas Island"> Christmas Island</option><option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands</option><option value="Colombia"> Colombia</option><option value="Comoros"> Comoros</option><option value="Congo, Democratic Republic of the (Zaire)"> Congo, Democratic Republic of the (Zaire)</option><option value="Congo, Republic of"> Congo, Republic of</option><option value="Cook Islands"> Cook Islands</option><option value="Costa Rica"> Costa Rica</option><option value="Croatia"> Croatia</option><option value="Cuba"> Cuba</option><option value="Cyprus"> Cyprus</option><option value="Czech Republic"> Czech Republic</option><option value="Denmark"> Denmark</option><option value="Djibouti"> Djibouti</option><option value="Dominica"> Dominica</option><option value="Dominican Republic"> Dominican Republic</option><option value="Ecuador"> Ecuador</option><option value="Egypt"> Egypt</option><option value="El Salvador"> El Salvador</option><option value="Equatorial Guinea"> Equatorial Guinea</option><option value="Eritrea"> Eritrea</option><option value="Estonia"> Estonia</option><option value="Ethiopia"> Ethiopia</option><option value="Falkland Islands"> Falkland Islands</option><option value="Faroe Islands"> Faroe Islands</option><option value="Fiji"> Fiji</option><option value="Finland"> Finland</option><option value="France"> France</option><option value="French Guiana"> French Guiana</option><option value="Gabon"> Gabon</option><option value="Gambia"> Gambia</option><option value="Georgia"> Georgia</option><option value="Germany"> Germany</option><option value="Ghana"> Ghana</option><option value="Gibraltar"> Gibraltar</option><option value="Greece"> Greece</option><option value="Greenland"> Greenland</option><option value="Grenada"> Grenada</option><option value="Guadeloupe (French)"> Guadeloupe (French)</option><option value="Guam (USA)"> Guam (USA)</option><option value="Guatemala"> Guatemala</option><option value="Guinea"> Guinea</option><option value="Guinea Bissau"> Guinea Bissau</option><option value="Guyana"> Guyana</option><option value="Haiti"> Haiti</option><option value="Holy See"> Holy See</option><option value="Honduras"> Honduras</option><option value="Hong Kong"> Hong Kong</option><option value="Hungary"> Hungary</option><option value="Iceland"> Iceland</option><option value="India"> India</option><option value="Indonesia"> Indonesia</option><option value="Iran"> Iran</option><option value="Iraq"> Iraq</option><option value="Ireland"> Ireland</option><option value="Israel"> Israel</option><option value="Italy"> Italy</option><option value="Ivory Coast (Cote D`Ivoire)"> Ivory Coast (Cote D`Ivoire)</option><option value="Jamaica"> Jamaica</option><option value="Japan"> Japan</option><option value="Jordan"> Jordan</option><option value="Kazakhstan"> Kazakhstan</option><option value="Kenya"> Kenya</option><option value="Kiribati"> Kiribati</option><option value="Kuwait"> Kuwait</option><option value="Kyrgyzstan"> Kyrgyzstan</option><option value="Laos"> Laos</option><option value="Latvia"> Latvia</option><option value="Lebanon"> Lebanon</option><option value="Lesotho"> Lesotho</option><option value="Liberia"> Liberia</option><option value="Libya"> Libya</option><option value="Liechtenstein"> Liechtenstein</option><option value="Lithuania"> Lithuania</option><option value="Luxembourg"> Luxembourg</option><option value="Macau"> Macau</option><option value="Macedonia"> Macedonia</option><option value="Madagascar"> Madagascar</option><option value="Malawi"> Malawi</option><option value="Malaysia"> Malaysia</option><option value="Maldives"> Maldives</option><option value="Mali"> Mali</option><option value="Malta"> Malta</option><option value="Marshall Islands"> Marshall Islands</option><option value="Martinique (French)"> Martinique (French)</option><option value="Mauritania"> Mauritania</option><option value="Mauritius"> Mauritius</option><option value="Mayotte"> Mayotte</option><option value="Mexico"> Mexico</option><option value="Micronesia"> Micronesia</option><option value="Moldova"> Moldova</option><option value="Monaco"> Monaco</option><option value="Mongolia"> Mongolia</option><option value="Montenegro"> Montenegro</option><option value="Montserrat"> Montserrat</option><option value="Morocco"> Morocco</option><option value="Mozambique"> Mozambique</option><option value="Myanmar"> Myanmar</option><option value="Namibia"> Namibia</option><option value="Nauru"> Nauru</option><option value="Nepal"> Nepal</option><option value="Netherlands"> Netherlands</option><option value="Netherlands Antilles"> Netherlands Antilles</option><option value="New Caledonia (French)"> New Caledonia (French)</option><option value="New Zealand"> New Zealand</option><option value="Nicaragua"> Nicaragua</option><option value="Niger"> Niger</option><option value="Nigeria"> Nigeria</option><option value="Niue"> Niue</option><option value="Norfolk Island"> Norfolk Island</option><option value="North Korea"> North Korea</option><option value="Northern Mariana Islands"> Northern Mariana Islands</option><option value="Norway"> Norway</option><option value="Oman"> Oman</option><option value="Pakistan"> Pakistan</option><option value="Palau"> Palau</option><option value="Panama"> Panama</option><option value="Papua New Guinea"> Papua New Guinea</option><option value="Paraguay"> Paraguay</option><option value="Peru"> Peru</option><option value="Philippines"> Philippines</option><option value="Pitcairn Island"> Pitcairn Island</option><option value="Poland"> Poland</option><option value="Polynesia (French)"> Polynesia (French)</option><option value="Portugal"> Portugal</option><option value="Puerto Rico"> Puerto Rico</option><option value="Qatar"> Qatar</option><option value="Reunion"> Reunion</option><option value="Romania"> Romania</option><option value="Russia"> Russia</option><option value="Rwanda"> Rwanda</option><option value="Saint Helena"> Saint Helena</option><option value="Saint Kitts and Nevis"> Saint Kitts and Nevis</option><option value="Saint Lucia"> Saint Lucia</option><option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon</option><option value="Saint Vincent and Grenadines"> Saint Vincent and Grenadines</option><option value="Samoa"> Samoa</option><option value="San Marino"> San Marino</option><option value="Sao Tome and Principe"> Sao Tome and Principe</option><option value="Saudi Arabia"> Saudi Arabia</option><option value="Senegal"> Senegal</option><option value="Serbia"> Serbia</option><option value="Seychelles"> Seychelles</option><option value="Sierra Leone"> Sierra Leone</option><option value="Singapore"> Singapore</option><option value="Slovakia"> Slovakia</option><option value="Slovenia"> Slovenia</option><option value="Solomon Islands"> Solomon Islands</option><option value="Somalia"> Somalia</option><option value="South Africa"> South Africa</option><option value="South Georgia and South Sandwich Islands"> South Georgia and South Sandwich Islands</option><option value="South Korea"> South Korea</option><option value="South Sudan"> South Sudan</option><option value="Spain"> Spain</option><option value="Sri Lanka"> Sri Lanka</option><option value="Sudan"> Sudan</option><option value="Suriname"> Suriname</option><option value="Svalbard and Jan Mayen Islands"> Svalbard and Jan Mayen Islands</option><option value="Swaziland"> Swaziland</option><option value="Sweden"> Sweden</option><option value="Switzerland"> Switzerland</option><option value="Syria"> Syria</option><option value="Taiwan"> Taiwan</option><option value="Tajikistan"> Tajikistan</option><option value="Tanzania"> Tanzania</option><option value="Thailand"> Thailand</option><option value="Timor-Leste (East Timor)"> Timor-Leste (East Timor)</option><option value="Togo"> Togo</option><option value="Tokelau"> Tokelau</option><option value="Tonga"> Tonga</option><option value="Trinidad and Tobago"> Trinidad and Tobago</option><option value="Tunisia"> Tunisia</option><option value="Turkey"> Turkey</option><option value="Turkmenistan"> Turkmenistan</option><option value="Turks and Caicos Islands"> Turks and Caicos Islands</option><option value="Tuvalu"> Tuvalu</option><option value="Uganda"> Uganda</option><option value="Ukraine"> Ukraine</option><option value="United Arab Emirates"> United Arab Emirates</option><option value="United Kingdom"> United Kingdom</option><option value="United States"> United States</option><option value="Uruguay"> Uruguay</option><option value="Uzbekistan"> Uzbekistan</option><option value="Vanuatu"> Vanuatu</option><option value="Venezuela"> Venezuela</option><option value="Vietnam"> Vietnam</option><option value="Virgin Islands"> Virgin Islands</option><option value="Wallis and Futuna Islands"> Wallis and Futuna Islands</option><option value="Yemen"> Yemen</option><option value="Zambia"> Zambia</option><option value="Zimbabwe"> Zimbabwe</option>                                   
      </select>                                  
                                 
                        </div>
                         <div class="form-group">
                            <label >Phone No</label>
  <input type="text" class="form-control" name="gamname" id="businesspartnerphoneno" required >
                                       
                                 
                        </div>
                        <div class="form-group">
                            <label >Postal Code</label>
<input type="text" class="form-control" name="gamname" id="businesspartnerpostalcode" required >
                                             
                                 
                        </div>

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="partneradd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Partner Add Form</h4>
            </div>
                    <form  action="<?php echo base_url(); ?>index.php/partner/addbusinesspartner" onsubmit="return businesspartnerinfoadd(event)" id="businesspartneraddform" method="post">

                <div class="modal-body">
                                    <span id="businesspartneraddpromptspan">

</span>
                    <div class="box-body">
                        <div class="form-group">
                            <label >Name</label>
                             <input type="text" class="form-control" name="gamname" id="businesspartnername1" required >
      
                        </div>
                         <div class="form-group">
                            <label >Username</label>
                            <input type="text" class="form-control" name="businesspartnerusernamewhileadd" id="businesspartnerusername1" required >
      
                        </div>
                         <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="gamname" id="businesspartnerpassword1" required >
      
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                           <input type="email" class="form-control" name="gamname" id="businesspartneremail1" required >
      
                        </div>
                         <div class="form-group">
                            <label >Address</label>
                           <input type="text" class="form-control" name="gamname" id="businesspartneraddress1" required >
      
                        </div>
                       
                        <div class="form-group">
                            <label >Icon</label>
                           <input id="partnericonfile1" type="file" name="partnerfile1" size="20"  required/>
                                 
                        </div>
                         <div class="form-group">
                            <label >Preview</label>
                          <img id="partnericonforpartner1" width="100" height="100" src="" alt="image preview">
                                  
                                 
                        </div>
                         <div class="form-group">
                            <label >Country</label>
 <select required="" id="bpcountry1" class="form-control" name="sel_country1">

<option selected="selected" value="selectcountry"> --- Select Your Country Name ---</option><option value="Afghanistan"> Afghanistan</option><option value="Albania"> Albania</option><option value="Algeria"> Algeria</option><option value="American Samoa"> American Samoa</option><option value="Andorra"> Andorra</option><option value="Angola"> Angola</option><option value="Anguilla"> Anguilla</option><option value="Antigua and Barbuda"> Antigua and Barbuda</option><option value="Argentina"> Argentina</option><option value="Armenia"> Armenia</option><option value="Aruba"> Aruba</option><option value="Australia"> Australia</option><option value="Austria"> Austria</option><option value="Azerbaijan"> Azerbaijan</option><option value="Bahamas"> Bahamas</option><option value="Bahrain"> Bahrain</option><option value="Bangladesh"> Bangladesh</option><option value="Barbados"> Barbados</option><option value="Belarus"> Belarus</option><option value="Belgium"> Belgium</option><option value="Belize"> Belize</option><option value="Benin"> Benin</option><option value="Bermuda"> Bermuda</option><option value="Bhutan"> Bhutan</option><option value="Bolivia"> Bolivia</option><option value="Bosnia-Herzegovina"> Bosnia-Herzegovina</option><option value="Botswana"> Botswana</option><option value="Bouvet Island"> Bouvet Island</option><option value="Brazil"> Brazil</option><option value="Brunei"> Brunei</option><option value="Bulgaria"> Bulgaria</option><option value="Burkina Faso"> Burkina Faso</option><option value="Burundi"> Burundi</option><option value="Cambodia"> Cambodia</option><option value="Cameroon"> Cameroon</option><option value="Canada"> Canada</option><option value="Cape Verde"> Cape Verde</option><option value="Cayman Islands"> Cayman Islands</option><option value="Central African Republic"> Central African Republic</option><option value="Chad"> Chad</option><option value="Chile"> Chile</option><option value="China"> China</option><option value="Christmas Island"> Christmas Island</option><option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands</option><option value="Colombia"> Colombia</option><option value="Comoros"> Comoros</option><option value="Congo, Democratic Republic of the (Zaire)"> Congo, Democratic Republic of the (Zaire)</option><option value="Congo, Republic of"> Congo, Republic of</option><option value="Cook Islands"> Cook Islands</option><option value="Costa Rica"> Costa Rica</option><option value="Croatia"> Croatia</option><option value="Cuba"> Cuba</option><option value="Cyprus"> Cyprus</option><option value="Czech Republic"> Czech Republic</option><option value="Denmark"> Denmark</option><option value="Djibouti"> Djibouti</option><option value="Dominica"> Dominica</option><option value="Dominican Republic"> Dominican Republic</option><option value="Ecuador"> Ecuador</option><option value="Egypt"> Egypt</option><option value="El Salvador"> El Salvador</option><option value="Equatorial Guinea"> Equatorial Guinea</option><option value="Eritrea"> Eritrea</option><option value="Estonia"> Estonia</option><option value="Ethiopia"> Ethiopia</option><option value="Falkland Islands"> Falkland Islands</option><option value="Faroe Islands"> Faroe Islands</option><option value="Fiji"> Fiji</option><option value="Finland"> Finland</option><option value="France"> France</option><option value="French Guiana"> French Guiana</option><option value="Gabon"> Gabon</option><option value="Gambia"> Gambia</option><option value="Georgia"> Georgia</option><option value="Germany"> Germany</option><option value="Ghana"> Ghana</option><option value="Gibraltar"> Gibraltar</option><option value="Greece"> Greece</option><option value="Greenland"> Greenland</option><option value="Grenada"> Grenada</option><option value="Guadeloupe (French)"> Guadeloupe (French)</option><option value="Guam (USA)"> Guam (USA)</option><option value="Guatemala"> Guatemala</option><option value="Guinea"> Guinea</option><option value="Guinea Bissau"> Guinea Bissau</option><option value="Guyana"> Guyana</option><option value="Haiti"> Haiti</option><option value="Holy See"> Holy See</option><option value="Honduras"> Honduras</option><option value="Hong Kong"> Hong Kong</option><option value="Hungary"> Hungary</option><option value="Iceland"> Iceland</option><option value="India"> India</option><option value="Indonesia"> Indonesia</option><option value="Iran"> Iran</option><option value="Iraq"> Iraq</option><option value="Ireland"> Ireland</option><option value="Israel"> Israel</option><option value="Italy"> Italy</option><option value="Ivory Coast (Cote D`Ivoire)"> Ivory Coast (Cote D`Ivoire)</option><option value="Jamaica"> Jamaica</option><option value="Japan"> Japan</option><option value="Jordan"> Jordan</option><option value="Kazakhstan"> Kazakhstan</option><option value="Kenya"> Kenya</option><option value="Kiribati"> Kiribati</option><option value="Kuwait"> Kuwait</option><option value="Kyrgyzstan"> Kyrgyzstan</option><option value="Laos"> Laos</option><option value="Latvia"> Latvia</option><option value="Lebanon"> Lebanon</option><option value="Lesotho"> Lesotho</option><option value="Liberia"> Liberia</option><option value="Libya"> Libya</option><option value="Liechtenstein"> Liechtenstein</option><option value="Lithuania"> Lithuania</option><option value="Luxembourg"> Luxembourg</option><option value="Macau"> Macau</option><option value="Macedonia"> Macedonia</option><option value="Madagascar"> Madagascar</option><option value="Malawi"> Malawi</option><option value="Malaysia"> Malaysia</option><option value="Maldives"> Maldives</option><option value="Mali"> Mali</option><option value="Malta"> Malta</option><option value="Marshall Islands"> Marshall Islands</option><option value="Martinique (French)"> Martinique (French)</option><option value="Mauritania"> Mauritania</option><option value="Mauritius"> Mauritius</option><option value="Mayotte"> Mayotte</option><option value="Mexico"> Mexico</option><option value="Micronesia"> Micronesia</option><option value="Moldova"> Moldova</option><option value="Monaco"> Monaco</option><option value="Mongolia"> Mongolia</option><option value="Montenegro"> Montenegro</option><option value="Montserrat"> Montserrat</option><option value="Morocco"> Morocco</option><option value="Mozambique"> Mozambique</option><option value="Myanmar"> Myanmar</option><option value="Namibia"> Namibia</option><option value="Nauru"> Nauru</option><option value="Nepal"> Nepal</option><option value="Netherlands"> Netherlands</option><option value="Netherlands Antilles"> Netherlands Antilles</option><option value="New Caledonia (French)"> New Caledonia (French)</option><option value="New Zealand"> New Zealand</option><option value="Nicaragua"> Nicaragua</option><option value="Niger"> Niger</option><option value="Nigeria"> Nigeria</option><option value="Niue"> Niue</option><option value="Norfolk Island"> Norfolk Island</option><option value="North Korea"> North Korea</option><option value="Northern Mariana Islands"> Northern Mariana Islands</option><option value="Norway"> Norway</option><option value="Oman"> Oman</option><option value="Pakistan"> Pakistan</option><option value="Palau"> Palau</option><option value="Panama"> Panama</option><option value="Papua New Guinea"> Papua New Guinea</option><option value="Paraguay"> Paraguay</option><option value="Peru"> Peru</option><option value="Philippines"> Philippines</option><option value="Pitcairn Island"> Pitcairn Island</option><option value="Poland"> Poland</option><option value="Polynesia (French)"> Polynesia (French)</option><option value="Portugal"> Portugal</option><option value="Puerto Rico"> Puerto Rico</option><option value="Qatar"> Qatar</option><option value="Reunion"> Reunion</option><option value="Romania"> Romania</option><option value="Russia"> Russia</option><option value="Rwanda"> Rwanda</option><option value="Saint Helena"> Saint Helena</option><option value="Saint Kitts and Nevis"> Saint Kitts and Nevis</option><option value="Saint Lucia"> Saint Lucia</option><option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon</option><option value="Saint Vincent and Grenadines"> Saint Vincent and Grenadines</option><option value="Samoa"> Samoa</option><option value="San Marino"> San Marino</option><option value="Sao Tome and Principe"> Sao Tome and Principe</option><option value="Saudi Arabia"> Saudi Arabia</option><option value="Senegal"> Senegal</option><option value="Serbia"> Serbia</option><option value="Seychelles"> Seychelles</option><option value="Sierra Leone"> Sierra Leone</option><option value="Singapore"> Singapore</option><option value="Slovakia"> Slovakia</option><option value="Slovenia"> Slovenia</option><option value="Solomon Islands"> Solomon Islands</option><option value="Somalia"> Somalia</option><option value="South Africa"> South Africa</option><option value="South Georgia and South Sandwich Islands"> South Georgia and South Sandwich Islands</option><option value="South Korea"> South Korea</option><option value="South Sudan"> South Sudan</option><option value="Spain"> Spain</option><option value="Sri Lanka"> Sri Lanka</option><option value="Sudan"> Sudan</option><option value="Suriname"> Suriname</option><option value="Svalbard and Jan Mayen Islands"> Svalbard and Jan Mayen Islands</option><option value="Swaziland"> Swaziland</option><option value="Sweden"> Sweden</option><option value="Switzerland"> Switzerland</option><option value="Syria"> Syria</option><option value="Taiwan"> Taiwan</option><option value="Tajikistan"> Tajikistan</option><option value="Tanzania"> Tanzania</option><option value="Thailand"> Thailand</option><option value="Timor-Leste (East Timor)"> Timor-Leste (East Timor)</option><option value="Togo"> Togo</option><option value="Tokelau"> Tokelau</option><option value="Tonga"> Tonga</option><option value="Trinidad and Tobago"> Trinidad and Tobago</option><option value="Tunisia"> Tunisia</option><option value="Turkey"> Turkey</option><option value="Turkmenistan"> Turkmenistan</option><option value="Turks and Caicos Islands"> Turks and Caicos Islands</option><option value="Tuvalu"> Tuvalu</option><option value="Uganda"> Uganda</option><option value="Ukraine"> Ukraine</option><option value="United Arab Emirates"> United Arab Emirates</option><option value="United Kingdom"> United Kingdom</option><option value="United States"> United States</option><option value="Uruguay"> Uruguay</option><option value="Uzbekistan"> Uzbekistan</option><option value="Vanuatu"> Vanuatu</option><option value="Venezuela"> Venezuela</option><option value="Vietnam"> Vietnam</option><option value="Virgin Islands"> Virgin Islands</option><option value="Wallis and Futuna Islands"> Wallis and Futuna Islands</option><option value="Yemen"> Yemen</option><option value="Zambia"> Zambia</option><option value="Zimbabwe"> Zimbabwe</option>                                   
      </select>                                  
                                 
                        </div>
                         <div class="form-group">
                            <label >Phone No</label>
  <input type="text" class="form-control" name="gamname" id="businesspartnerphoneno1" required >
                                       
                                 
                        </div>
                        <div class="form-group">
                            <label >Postal Code</label>
<input type="text" class="form-control" name="gamname" id="businesspartnerpostalcode1" required >
                                             
                                 
                        </div>
                        
                         

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="partnerdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforbusinesspartner' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#partnerdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"partner/getpartnerfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
                       { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforpartner($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_for_partner($(this))
            });
           
  }
	});









    });

</script>