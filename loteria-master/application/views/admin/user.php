

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
          <?php echo lang('lang_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_second');?></a></li>
            
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#memberadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Role"><i class="fa fa-plus"></i> Add Member</button>';
                                                if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[3]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="memberdatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Username</th> 
                                    <th>Name</th>
                                    <th>Gender</th>
                                     <th>Email</th>
                                      <th>Phone</th>
                                       <th>Residence Address</th>
                                        <th>Postal Code</th>
                                         <th>Country</th>
                                         <th>Wallet Balance</th>
                                         <th>Bonus Balance</th>
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
<div class="modal fade" id="memberedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Member Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/user/updateuser" onsubmit="return userinfoupdate(event)" id="userupdateform" method="post">

                <div class="modal-body">
                       <span id="useraddpromptspan"></span>
                    <div class="box-body">
                        <div class="form-group">
                            <label >Username </label>
                          <input type="text" class="form-control" name="username" id="username" required>
                                
                                 <input type="hidden" id="hiddenusername">
                        </div>
                         <div class="form-group">
                            <label >Name </label>
                           <input type="text" class="form-control" name="name" id="name" >
                        </div>
                        <div class="form-group">
                            <label >Last Name </label>
                          <input type="text" class="form-control" name="lastname" id="lastname"  >
                        </div>
                         <div class="form-group">
                            <label >Gender </label>
                      <div class="radio">
                        <label>
                           <input type="radio"  name="gender" value="male" id="male" >Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                           <input type="radio"  name="gender" value="female" id="female" >Female
                        </label>
                      </div>
                     
                    </div>
                        
                        <div class="form-group">
                            <label >Email </label>
                         <input type="email" class="form-control" name="email" id="email" required>
                                <input type="hidden" id="hiddenemail">
                        </div>
                          <div class="form-group">
                            <label >Password </label>
                         <input type="password" class="form-control" name="password" id="password" required >
                        </div>
                        <div class="form-group">
                            <label >Phone </label>
                         <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label >Residence Address </label>
                        <input type="text" class="form-control" name="street" id="residenceaddress"  required>
                        </div>
                         <div class="form-group">
                            <label >Postal Code </label>
                       <input type="text" class="form-control" name="city" id="postalcode"  required>
                        </div>
                        <div class="form-group">
                            <label >Country </label>
                        <select name="sel_country" class="form-control" id="country" >

                                        <?php
                                        $the_key = 'selectcountry'; // or whatever you want
                                        foreach (array(
                                    'selectcountry' => '--- Select Your Country Name ---',
                                    'Afghanistan' => 'Afghanistan',
                                    'Albania' => 'Albania',
                                    'Algeria' => 'Algeria',
                                    'American Samoa' => 'American Samoa',
                                    'Andorra' => 'Andorra',
                                    'Angola' => 'Angola',
                                    'Anguilla' => 'Anguilla',
                                    'Antigua and Barbuda' => 'Antigua and Barbuda',
                                    'Argentina' => 'Argentina',
                                    'Armenia' => 'Armenia',
                                    'Aruba' => 'Aruba',
                                    'Australia' => 'Australia',
                                    'Austria' => 'Austria',
                                    'Azerbaijan' => 'Azerbaijan',
                                    'Bahamas' => 'Bahamas',
                                    'Bahrain' => 'Bahrain',
                                    'Bangladesh' => 'Bangladesh',
                                    'Barbados' => 'Barbados',
                                    'Belarus' => 'Belarus',
                                    'Belgium' => 'Belgium',
                                    'Belize' => 'Belize',
                                    'Benin' => 'Benin',
                                    'Bermuda' => 'Bermuda',
                                    'Bhutan' => 'Bhutan',
                                    'Bolivia' => 'Bolivia',
                                    'Bosnia-Herzegovina' => 'Bosnia-Herzegovina',
                                    'Botswana' => 'Botswana',
                                    'Bouvet Island' => 'Bouvet Island',
                                    'Brazil' => 'Brazil',
                                    'Brunei' => 'Brunei',
                                    'Bulgaria' => 'Bulgaria',
                                    'Burkina Faso' => 'Burkina Faso',
                                    'Burundi' => 'Burundi',
                                    'Cambodia' => 'Cambodia',
                                    'Cameroon' => 'Cameroon',
                                    'Canada' => 'Canada',
                                    'Cape Verde' => 'Cape Verde',
                                    'Cayman Islands' => 'Cayman Islands',
                                    'Central African Republic' => 'Central African Republic',
                                    'Chad' => 'Chad',
                                    'Chile' => 'Chile',
                                    'China' => 'China',
                                    'Christmas Island' => 'Christmas Island',
                                    'Cocos (Keeling) Islands' => 'Cocos (Keeling) Islands',
                                    'Colombia' => 'Colombia',
                                    'Comoros' => 'Comoros',
                                    'Congo, Democratic Republic of the (Zaire)' => 'Congo, Democratic Republic of the (Zaire)',
                                    'Congo, Republic of' => 'Congo, Republic of',
                                    'Cook Islands' => 'Cook Islands',
                                    'Costa Rica' => 'Costa Rica',
                                    'Croatia' => 'Croatia',
                                    'Cuba' => 'Cuba',
                                    'Cyprus' => 'Cyprus',
                                    'Czech Republic' => 'Czech Republic',
                                    'Denmark' => 'Denmark',
                                    'Djibouti' => 'Djibouti',
                                    'Dominica' => 'Dominica',
                                    'Dominican Republic' => 'Dominican Republic',
                                    'Ecuador' => 'Ecuador',
                                    'Egypt' => 'Egypt',
                                    'El Salvador' => 'El Salvador',
                                    'Equatorial Guinea' => 'Equatorial Guinea',
                                    'Eritrea' => 'Eritrea',
                                    'Estonia' => 'Estonia',
                                    'Ethiopia' => 'Ethiopia',
                                    'Falkland Islands' => 'Falkland Islands',
                                    'Faroe Islands' => 'Faroe Islands',
                                    'Fiji' => 'Fiji',
                                    'Finland' => 'Finland',
                                    'France' => 'France',
                                    'French Guiana' => 'French Guiana',
                                    'Gabon' => 'Gabon',
                                    'Gambia' => 'Gambia',
                                    'Georgia' => 'Georgia',
                                    'Germany' => 'Germany',
                                    'Ghana' => 'Ghana',
                                    'Gibraltar' => 'Gibraltar',
                                    'Greece' => 'Greece',
                                    'Greenland' => 'Greenland',
                                    'Grenada' => 'Grenada',
                                    'Guadeloupe (French)' => 'Guadeloupe (French)',
                                    'Guam (USA)' => 'Guam (USA)',
                                    'Guatemala' => 'Guatemala',
                                    'Guinea' => 'Guinea',
                                    'Guinea Bissau' => 'Guinea Bissau',
                                    'Guyana' => 'Guyana',
                                    'Haiti' => 'Haiti',
                                    'Holy See' => 'Holy See',
                                    'Honduras' => 'Honduras',
                                    'Hong Kong' => 'Hong Kong',
                                    'Hungary' => 'Hungary',
                                    'Iceland' => 'Iceland',
                                    'India' => 'India',
                                    'Indonesia' => 'Indonesia',
                                    'Iran' => 'Iran',
                                    'Iraq' => 'Iraq',
                                    'Ireland' => 'Ireland',
                                    'Israel' => 'Israel',
                                    'Italy' => 'Italy',
                                    'Ivory Coast (Cote D`Ivoire)' => 'Ivory Coast (Cote D`Ivoire)',
                                    'Jamaica' => 'Jamaica',
                                    'Japan' => 'Japan',
                                    'Jordan' => 'Jordan',
                                    'Kazakhstan' => 'Kazakhstan',
                                    'Kenya' => 'Kenya',
                                    'Kiribati' => 'Kiribati',
                                    'Kuwait' => 'Kuwait',
                                    'Kyrgyzstan' => 'Kyrgyzstan',
                                    'Laos' => 'Laos',
                                    'Latvia' => 'Latvia',
                                    'Lebanon' => 'Lebanon',
                                    'Lesotho' => 'Lesotho',
                                    'Liberia' => 'Liberia',
                                    'Libya' => 'Libya',
                                    'Liechtenstein' => 'Liechtenstein',
                                    'Lithuania' => 'Lithuania',
                                    'Luxembourg' => 'Luxembourg',
                                    'Macau' => 'Macau',
                                    'Macedonia' => 'Macedonia',
                                    'Madagascar' => 'Madagascar',
                                    'Malawi' => 'Malawi',
                                    'Malaysia' => 'Malaysia',
                                    'Maldives' => 'Maldives',
                                    'Mali' => 'Mali',
                                    'Malta' => 'Malta',
                                    'Marshall Islands' => 'Marshall Islands',
                                    'Martinique (French)' => 'Martinique (French)',
                                    'Mauritania' => 'Mauritania',
                                    'Mauritius' => 'Mauritius',
                                    'Mayotte' => 'Mayotte',
                                    'Mexico' => 'Mexico',
                                    'Micronesia' => 'Micronesia',
                                    'Moldova' => 'Moldova',
                                    'Monaco' => 'Monaco',
                                    'Mongolia' => 'Mongolia',
                                    'Montenegro' => 'Montenegro',
                                    'Montserrat' => 'Montserrat',
                                    'Morocco' => 'Morocco',
                                    'Mozambique' => 'Mozambique',
                                    'Myanmar' => 'Myanmar',
                                    'Namibia' => 'Namibia',
                                    'Nauru' => 'Nauru',
                                    'Nepal' => 'Nepal',
                                    'Netherlands' => 'Netherlands',
                                    'Netherlands Antilles' => 'Netherlands Antilles',
                                    'New Caledonia (French)' => 'New Caledonia (French)',
                                    'New Zealand' => 'New Zealand',
                                    'Nicaragua' => 'Nicaragua',
                                    'Niger' => 'Niger',
                                    'Nigeria' => 'Nigeria',
                                    'Niue' => 'Niue',
                                    'Norfolk Island' => 'Norfolk Island',
                                    'North Korea' => 'North Korea',
                                    'Northern Mariana Islands' => 'Northern Mariana Islands',
                                    'Norway' => 'Norway',
                                    'Oman' => 'Oman',
                                    'Pakistan' => 'Pakistan',
                                    'Palau' => 'Palau',
                                    'Panama' => 'Panama',
                                    'Papua New Guinea' => 'Papua New Guinea',
                                    'Paraguay' => 'Paraguay',
                                    'Peru' => 'Peru',
                                    'Philippines' => 'Philippines',
                                    'Pitcairn Island' => 'Pitcairn Island',
                                    'Poland' => 'Poland',
                                    'Polynesia (French)' => 'Polynesia (French)',
                                    'Portugal' => 'Portugal',
                                    'Puerto Rico' => 'Puerto Rico',
                                    'Qatar' => 'Qatar',
                                    'Reunion' => 'Reunion',
                                    'Romania' => 'Romania',
                                    'Russia' => 'Russia',
                                    'Rwanda' => 'Rwanda',
                                    'Saint Helena' => 'Saint Helena',
                                    'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
                                    'Saint Lucia' => 'Saint Lucia',
                                    'Saint Pierre and Miquelon' => 'Saint Pierre and Miquelon',
                                    'Saint Vincent and Grenadines' => 'Saint Vincent and Grenadines',
                                    'Samoa' => 'Samoa',
                                    'San Marino' => 'San Marino',
                                    'Sao Tome and Principe' => 'Sao Tome and Principe',
                                    'Saudi Arabia' => 'Saudi Arabia',
                                    'Senegal' => 'Senegal',
                                    'Serbia' => 'Serbia',
                                    'Seychelles' => 'Seychelles',
                                    'Sierra Leone' => 'Sierra Leone',
                                    'Singapore' => 'Singapore',
                                    'Slovakia' => 'Slovakia',
                                    'Slovenia' => 'Slovenia',
                                    'Solomon Islands' => 'Solomon Islands',
                                    'Somalia' => 'Somalia',
                                    'South Africa' => 'South Africa',
                                    'South Georgia and South Sandwich Islands' => 'South Georgia and South Sandwich Islands',
                                    'South Korea' => 'South Korea',
                                    'South Sudan' => 'South Sudan',
                                    'Spain' => 'Spain',
                                    'Sri Lanka' => 'Sri Lanka',
                                    'Sudan' => 'Sudan',
                                    'Suriname' => 'Suriname',
                                    'Svalbard and Jan Mayen Islands' => 'Svalbard and Jan Mayen Islands',
                                    'Swaziland' => 'Swaziland',
                                    'Sweden' => 'Sweden',
                                    'Switzerland' => 'Switzerland',
                                    'Syria' => 'Syria',
                                    'Taiwan' => 'Taiwan',
                                    'Tajikistan' => 'Tajikistan',
                                    'Tanzania' => 'Tanzania',
                                    'Thailand' => 'Thailand',
                                    'Timor-Leste (East Timor)' => 'Timor-Leste (East Timor)',
                                    'Togo' => 'Togo',
                                    'Tokelau' => 'Tokelau',
                                    'Tonga' => 'Tonga',
                                    'Trinidad and Tobago' => 'Trinidad and Tobago',
                                    'Tunisia' => 'Tunisia',
                                    'Turkey' => 'Turkey',
                                    'Turkmenistan' => 'Turkmenistan',
                                    'Turks and Caicos Islands' => 'Turks and Caicos Islands',
                                    'Tuvalu' => 'Tuvalu',
                                    'Uganda' => 'Uganda',
                                    'Ukraine' => 'Ukraine',
                                    'United Arab Emirates' => 'United Arab Emirates',
                                    'United Kingdom' => 'United Kingdom',
                                    'United States' => 'United States',
                                    'Uruguay' => 'Uruguay',
                                    'Uzbekistan' => 'Uzbekistan',
                                    'Vanuatu' => 'Vanuatu',
                                    'Venezuela' => 'Venezuela',
                                    'Vietnam' => 'Vietnam',
                                    'Virgin Islands' => 'Virgin Islands',
                                    'Wallis and Futuna Islands' => 'Wallis and Futuna Islands',
                                    'Yemen' => 'Yemen',
                                    'Zambia' => 'Zambia',
                                    'Zimbabwe' => 'Zimbabwe'
                                        ) as $key => $val) {
                                            ?><option value="<?php echo $key; ?>"<?php if ($key == $the_key) echo ' selected="selected"'; ?> > <?php echo $val; ?></option><?php
                                        }
                                        ?>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label >Wallet Balance </label>
                            <input type="number" class="form-control" name="wallet_balance" id="wallet_balance"  >
                        </div>
                        <div class="form-group">
                            <label >Bonus Balance </label>
                            <input type="number" class="form-control" name="bonus_balance" id="bonus_balance" >
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
<div class="modal fade" id="memberadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Member Add Form</h4>
            </div>
           <form  action="<?php echo base_url(); ?>index.php/user/adduser" onsubmit="return userinfoadd(event)" id="useradditionform" method="post">

                <div class="modal-body">
                    <span id="useraddpromptspan1"></span>
                    <div class="box-body">
                        <div class="form-group">
                            <label >Username </label>
                          <input type="text" class="form-control" name="username" id="username1" required>
                                
                                 <input type="hidden" id="hiddenusername">
                        </div>
                         <div class="form-group">
                            <label >Name </label>
                           <input type="text" class="form-control" name="name" id="name1" >
                        </div>
                        <div class="form-group">
                            <label >Last Name </label>
                          <input type="text" class="form-control" name="lastname" id="lastname1"  >
                        </div>
                        <div class="form-group">
                            <label >Gender </label>
                      <div class="radio">
                        <label>
                           <input type="radio"  name="gender1" value="male" id="male1" >Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                           <input type="radio"  name="gender1" value="female" id="female1" >Female
                        </label>
                      </div>
                     
                    </div>
                       
                        <div class="form-group">
                            <label >Email </label>
                         <input type="email" class="form-control" name="email" id="email1" required>
                                <input type="hidden" id="hiddenemail">
                        </div>
                          <div class="form-group">
                            <label >Password </label>
                         <input type="password" class="form-control" name="password" id="password1"  required>
                        </div>
                        <div class="form-group">
                            <label >Phone </label>
                         <input type="text" class="form-control" name="phone" id="phone1">
                        </div>
                        <div class="form-group">
                            <label >Residence Address </label>
                        <input type="text" class="form-control" name="street" id="residenceaddress1"  required>
                        </div>
                         <div class="form-group">
                            <label >Postal Code </label>
                       <input type="text" class="form-control" name="city" id="postalcode1"  required>
                        </div>
                        <div class="form-group">
                            <label >Country </label>
                        <select name="sel_country" class="form-control" id="country1" >

                                        <?php
                                        $the_key = 'selectcountry'; // or whatever you want
                                        foreach (array(
                                    'selectcountry' => '--- Select Your Country Name ---',
                                    'Afghanistan' => 'Afghanistan',
                                    'Albania' => 'Albania',
                                    'Algeria' => 'Algeria',
                                    'American Samoa' => 'American Samoa',
                                    'Andorra' => 'Andorra',
                                    'Angola' => 'Angola',
                                    'Anguilla' => 'Anguilla',
                                    'Antigua and Barbuda' => 'Antigua and Barbuda',
                                    'Argentina' => 'Argentina',
                                    'Armenia' => 'Armenia',
                                    'Aruba' => 'Aruba',
                                    'Australia' => 'Australia',
                                    'Austria' => 'Austria',
                                    'Azerbaijan' => 'Azerbaijan',
                                    'Bahamas' => 'Bahamas',
                                    'Bahrain' => 'Bahrain',
                                    'Bangladesh' => 'Bangladesh',
                                    'Barbados' => 'Barbados',
                                    'Belarus' => 'Belarus',
                                    'Belgium' => 'Belgium',
                                    'Belize' => 'Belize',
                                    'Benin' => 'Benin',
                                    'Bermuda' => 'Bermuda',
                                    'Bhutan' => 'Bhutan',
                                    'Bolivia' => 'Bolivia',
                                    'Bosnia-Herzegovina' => 'Bosnia-Herzegovina',
                                    'Botswana' => 'Botswana',
                                    'Bouvet Island' => 'Bouvet Island',
                                    'Brazil' => 'Brazil',
                                    'Brunei' => 'Brunei',
                                    'Bulgaria' => 'Bulgaria',
                                    'Burkina Faso' => 'Burkina Faso',
                                    'Burundi' => 'Burundi',
                                    'Cambodia' => 'Cambodia',
                                    'Cameroon' => 'Cameroon',
                                    'Canada' => 'Canada',
                                    'Cape Verde' => 'Cape Verde',
                                    'Cayman Islands' => 'Cayman Islands',
                                    'Central African Republic' => 'Central African Republic',
                                    'Chad' => 'Chad',
                                    'Chile' => 'Chile',
                                    'China' => 'China',
                                    'Christmas Island' => 'Christmas Island',
                                    'Cocos (Keeling) Islands' => 'Cocos (Keeling) Islands',
                                    'Colombia' => 'Colombia',
                                    'Comoros' => 'Comoros',
                                    'Congo, Democratic Republic of the (Zaire)' => 'Congo, Democratic Republic of the (Zaire)',
                                    'Congo, Republic of' => 'Congo, Republic of',
                                    'Cook Islands' => 'Cook Islands',
                                    'Costa Rica' => 'Costa Rica',
                                    'Croatia' => 'Croatia',
                                    'Cuba' => 'Cuba',
                                    'Cyprus' => 'Cyprus',
                                    'Czech Republic' => 'Czech Republic',
                                    'Denmark' => 'Denmark',
                                    'Djibouti' => 'Djibouti',
                                    'Dominica' => 'Dominica',
                                    'Dominican Republic' => 'Dominican Republic',
                                    'Ecuador' => 'Ecuador',
                                    'Egypt' => 'Egypt',
                                    'El Salvador' => 'El Salvador',
                                    'Equatorial Guinea' => 'Equatorial Guinea',
                                    'Eritrea' => 'Eritrea',
                                    'Estonia' => 'Estonia',
                                    'Ethiopia' => 'Ethiopia',
                                    'Falkland Islands' => 'Falkland Islands',
                                    'Faroe Islands' => 'Faroe Islands',
                                    'Fiji' => 'Fiji',
                                    'Finland' => 'Finland',
                                    'France' => 'France',
                                    'French Guiana' => 'French Guiana',
                                    'Gabon' => 'Gabon',
                                    'Gambia' => 'Gambia',
                                    'Georgia' => 'Georgia',
                                    'Germany' => 'Germany',
                                    'Ghana' => 'Ghana',
                                    'Gibraltar' => 'Gibraltar',
                                    'Greece' => 'Greece',
                                    'Greenland' => 'Greenland',
                                    'Grenada' => 'Grenada',
                                    'Guadeloupe (French)' => 'Guadeloupe (French)',
                                    'Guam (USA)' => 'Guam (USA)',
                                    'Guatemala' => 'Guatemala',
                                    'Guinea' => 'Guinea',
                                    'Guinea Bissau' => 'Guinea Bissau',
                                    'Guyana' => 'Guyana',
                                    'Haiti' => 'Haiti',
                                    'Holy See' => 'Holy See',
                                    'Honduras' => 'Honduras',
                                    'Hong Kong' => 'Hong Kong',
                                    'Hungary' => 'Hungary',
                                    'Iceland' => 'Iceland',
                                    'India' => 'India',
                                    'Indonesia' => 'Indonesia',
                                    'Iran' => 'Iran',
                                    'Iraq' => 'Iraq',
                                    'Ireland' => 'Ireland',
                                    'Israel' => 'Israel',
                                    'Italy' => 'Italy',
                                    'Ivory Coast (Cote D`Ivoire)' => 'Ivory Coast (Cote D`Ivoire)',
                                    'Jamaica' => 'Jamaica',
                                    'Japan' => 'Japan',
                                    'Jordan' => 'Jordan',
                                    'Kazakhstan' => 'Kazakhstan',
                                    'Kenya' => 'Kenya',
                                    'Kiribati' => 'Kiribati',
                                    'Kuwait' => 'Kuwait',
                                    'Kyrgyzstan' => 'Kyrgyzstan',
                                    'Laos' => 'Laos',
                                    'Latvia' => 'Latvia',
                                    'Lebanon' => 'Lebanon',
                                    'Lesotho' => 'Lesotho',
                                    'Liberia' => 'Liberia',
                                    'Libya' => 'Libya',
                                    'Liechtenstein' => 'Liechtenstein',
                                    'Lithuania' => 'Lithuania',
                                    'Luxembourg' => 'Luxembourg',
                                    'Macau' => 'Macau',
                                    'Macedonia' => 'Macedonia',
                                    'Madagascar' => 'Madagascar',
                                    'Malawi' => 'Malawi',
                                    'Malaysia' => 'Malaysia',
                                    'Maldives' => 'Maldives',
                                    'Mali' => 'Mali',
                                    'Malta' => 'Malta',
                                    'Marshall Islands' => 'Marshall Islands',
                                    'Martinique (French)' => 'Martinique (French)',
                                    'Mauritania' => 'Mauritania',
                                    'Mauritius' => 'Mauritius',
                                    'Mayotte' => 'Mayotte',
                                    'Mexico' => 'Mexico',
                                    'Micronesia' => 'Micronesia',
                                    'Moldova' => 'Moldova',
                                    'Monaco' => 'Monaco',
                                    'Mongolia' => 'Mongolia',
                                    'Montenegro' => 'Montenegro',
                                    'Montserrat' => 'Montserrat',
                                    'Morocco' => 'Morocco',
                                    'Mozambique' => 'Mozambique',
                                    'Myanmar' => 'Myanmar',
                                    'Namibia' => 'Namibia',
                                    'Nauru' => 'Nauru',
                                    'Nepal' => 'Nepal',
                                    'Netherlands' => 'Netherlands',
                                    'Netherlands Antilles' => 'Netherlands Antilles',
                                    'New Caledonia (French)' => 'New Caledonia (French)',
                                    'New Zealand' => 'New Zealand',
                                    'Nicaragua' => 'Nicaragua',
                                    'Niger' => 'Niger',
                                    'Nigeria' => 'Nigeria',
                                    'Niue' => 'Niue',
                                    'Norfolk Island' => 'Norfolk Island',
                                    'North Korea' => 'North Korea',
                                    'Northern Mariana Islands' => 'Northern Mariana Islands',
                                    'Norway' => 'Norway',
                                    'Oman' => 'Oman',
                                    'Pakistan' => 'Pakistan',
                                    'Palau' => 'Palau',
                                    'Panama' => 'Panama',
                                    'Papua New Guinea' => 'Papua New Guinea',
                                    'Paraguay' => 'Paraguay',
                                    'Peru' => 'Peru',
                                    'Philippines' => 'Philippines',
                                    'Pitcairn Island' => 'Pitcairn Island',
                                    'Poland' => 'Poland',
                                    'Polynesia (French)' => 'Polynesia (French)',
                                    'Portugal' => 'Portugal',
                                    'Puerto Rico' => 'Puerto Rico',
                                    'Qatar' => 'Qatar',
                                    'Reunion' => 'Reunion',
                                    'Romania' => 'Romania',
                                    'Russia' => 'Russia',
                                    'Rwanda' => 'Rwanda',
                                    'Saint Helena' => 'Saint Helena',
                                    'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
                                    'Saint Lucia' => 'Saint Lucia',
                                    'Saint Pierre and Miquelon' => 'Saint Pierre and Miquelon',
                                    'Saint Vincent and Grenadines' => 'Saint Vincent and Grenadines',
                                    'Samoa' => 'Samoa',
                                    'San Marino' => 'San Marino',
                                    'Sao Tome and Principe' => 'Sao Tome and Principe',
                                    'Saudi Arabia' => 'Saudi Arabia',
                                    'Senegal' => 'Senegal',
                                    'Serbia' => 'Serbia',
                                    'Seychelles' => 'Seychelles',
                                    'Sierra Leone' => 'Sierra Leone',
                                    'Singapore' => 'Singapore',
                                    'Slovakia' => 'Slovakia',
                                    'Slovenia' => 'Slovenia',
                                    'Solomon Islands' => 'Solomon Islands',
                                    'Somalia' => 'Somalia',
                                    'South Africa' => 'South Africa',
                                    'South Georgia and South Sandwich Islands' => 'South Georgia and South Sandwich Islands',
                                    'South Korea' => 'South Korea',
                                    'South Sudan' => 'South Sudan',
                                    'Spain' => 'Spain',
                                    'Sri Lanka' => 'Sri Lanka',
                                    'Sudan' => 'Sudan',
                                    'Suriname' => 'Suriname',
                                    'Svalbard and Jan Mayen Islands' => 'Svalbard and Jan Mayen Islands',
                                    'Swaziland' => 'Swaziland',
                                    'Sweden' => 'Sweden',
                                    'Switzerland' => 'Switzerland',
                                    'Syria' => 'Syria',
                                    'Taiwan' => 'Taiwan',
                                    'Tajikistan' => 'Tajikistan',
                                    'Tanzania' => 'Tanzania',
                                    'Thailand' => 'Thailand',
                                    'Timor-Leste (East Timor)' => 'Timor-Leste (East Timor)',
                                    'Togo' => 'Togo',
                                    'Tokelau' => 'Tokelau',
                                    'Tonga' => 'Tonga',
                                    'Trinidad and Tobago' => 'Trinidad and Tobago',
                                    'Tunisia' => 'Tunisia',
                                    'Turkey' => 'Turkey',
                                    'Turkmenistan' => 'Turkmenistan',
                                    'Turks and Caicos Islands' => 'Turks and Caicos Islands',
                                    'Tuvalu' => 'Tuvalu',
                                    'Uganda' => 'Uganda',
                                    'Ukraine' => 'Ukraine',
                                    'United Arab Emirates' => 'United Arab Emirates',
                                    'United Kingdom' => 'United Kingdom',
                                    'United States' => 'United States',
                                    'Uruguay' => 'Uruguay',
                                    'Uzbekistan' => 'Uzbekistan',
                                    'Vanuatu' => 'Vanuatu',
                                    'Venezuela' => 'Venezuela',
                                    'Vietnam' => 'Vietnam',
                                    'Virgin Islands' => 'Virgin Islands',
                                    'Wallis and Futuna Islands' => 'Wallis and Futuna Islands',
                                    'Yemen' => 'Yemen',
                                    'Zambia' => 'Zambia',
                                    'Zimbabwe' => 'Zimbabwe'
                                        ) as $key => $val) {
                                            ?><option value="<?php echo $key; ?>"<?php if ($key == $the_key) echo ' selected="selected"'; ?> > <?php echo $val; ?></option><?php
                                        }
                                        ?>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label >Wallet Balance </label>
                       <input type="number" class="form-control" name="wallet_balance" id="wallet_balance1"  >
                        </div>
                        <div class="form-group">
                            <label >Bonus Balance </label>
                      <input type="number" class="form-control" name="bonus_balance" id="bonus_balance1" >
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


<div class="modal fade" id="memberdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforuser' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#memberdatatable').DataTable({
		"sScrollY": "400px",
                "sScrollX": "100%",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"user/getuserfordatatable",
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
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
    $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_for_user($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_for_user($(this))
            });
           
  }
	});









    });

</script>