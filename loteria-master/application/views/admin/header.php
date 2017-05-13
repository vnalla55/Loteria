

<?php if(isset($adminmodulepermission)){
   
     $allpermissioninfo=$adminmodulepermission;
    
   
     
}
 
?>
<html>
    <head>
        <title>
           <?php echo $pagetitle; ?>
        </title>
		 
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Tu Banquita" />
    <meta name="description" content="Tu Banquita">
    <meta name="author" content="JR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- summernote - text editor -->
      <link href="<?php echo base_url();?>resource/summernote-master/dist/summernote.css" rel="stylesheet">
       <!-- Bootstrap time Picker -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
  
       
        <!-- DATA TABLES -->
    <link href="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
   
     <!-- IOS Overlay -->
  <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/iosOverlay.css">
  <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/prettify.css">
   <!-- bootstrap datetimepicker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/css/bootstrap3-datetimepicker.min.css" type="text/css"/>
    
      <!-- bootstrap select2 -->
        <link rel="stylesheet" href="<?php echo base_url();?>resource/select2/dist/css/select2.min.css" type="text/css"/>
       
        <!-- custom css -->
   <link rel="stylesheet" href="<?php echo base_url();?>css/admin/admincss.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    
    
    
	<script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <!script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>resource/newthemebootstrap/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/dist/js/app.min.js" type="text/javascript"></script>
 <!-- summernote -->
    <script src="<?php echo base_url();?>resource/summernote-master/dist/summernote.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>resource/newthemebootstrap/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    
    
     <!-- ios overlay -->
    <script src="<?php echo base_url();?>resource/iosoverlay/iosOverlay.js"></script>
  <script src="<?php echo base_url();?>resource/iosoverlay/spin.min.js"></script>
  <script src="<?php echo base_url();?>resource/iosoverlay/prettify.js"></script>
  
   <!-- bootstrap datetimepicker -->
   <script  src="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js"></script>
   <script  src="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/js/moment.js"></script>
    <script  src="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/js/bootstrap3-datetimepicker.min.js"></script>
         
    <!-- bootstrap select2 -->
             <script src="<?php echo base_url();?>resource/select2/dist/js/select2.min.js"></script>
 
    <!-- custom js1 -->
    <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/adminjs.js"></script>
     <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/role.js"></script>
       <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/roleassignment.js"></script>
         <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/administrators.js"></script>
         <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/user.js"></script>
         <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/partner.js"></script>
           <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/withdrawal.js"></script>
             <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/deposit.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/bonus.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/configuration.js"></script>
             <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/webpage.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/faq.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/gametype.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/lotterygame.js"></script>
             <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/lotogroup.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/lotteryannouncement.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/bethistory.js"></script>
             <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/winner.js"></script>
               <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/result.js"></script>
                 <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/subscription.js"></script>
                  <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/changepassword.js"></script>
                  <script type ="text/javascript" src="<?php echo base_url(); ?>js/adminjs/partnerbethistory.js"></script>
                  

        <script type="text/javascript">

            $(document).ready(function () {

                baseurlforjsfile('<?php echo base_url(); ?>'); 
          
            });
        </script><!-- Base URL to be used in js file -->
    </head>
    <body onload="" class="skin-yellow">

<div class="wrapper">
      
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>admin/dashboard" class="logo"><h4>TuBanquita|Administración</h4></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
               <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                  
                </a>
                <ul class="dropdown-menu">
                   <li class="header"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-user fa-fw"></i>Bienvenido 
                                <?php  
                                    echo $_SESSION['lottobackendusername'] ;
                                
                                ?>!</a></li>
                    <li class="header"><a href="<?php echo base_url(); ?>admin/adminlogout"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
                  
                 
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    
      <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php 
                      if($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                          {
                          ?>
                    <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='administration') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-gears"></i> <span><?php echo lang('lang_menu_first');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'block';else echo 'none';?>">
               
                <li>
                  <a href="#"><i class="fa fa-user-md"></i> <?php echo lang('lang_menu_first_submenu_first');?> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'block';else echo 'none';?>" >
                   
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='role') echo 'active'; ?>"><a href="<?php echo base_url(); ?>role"><i class="fa fa-eye"></i><?php echo lang('lang_menu_first_submenu_first_sub_menu_first');?></a></li>     
                     
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='roleassignment') echo 'active'; ?>"><a href="<?php echo base_url(); ?>role/roleassignment"><i class="fa fa-pencil"></i> <?php echo lang('lang_menu_first_submenu_first_sub_menu_second');?></a></li>
                    
                   
                       
                      
                   
                  </ul>
                </li>
                <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='administrators') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>admin/administrators"><i class="fa fa-male"></i> <?php echo lang('lang_menu_first_submenu_second');?> <i class="pull-right"></i></a>
                      </li>  
               
               
              </ul>
            </li>
             <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='members') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>user"><i class="fa fa-users"></i> <?php echo lang('lang_menu_second');?> <i class="pull-right"></i></a>
              </li>   
               <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='partner') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>partner"><i class="fa fa-briefcase"></i> <?php echo lang('lang_menu_third');?> <i class="pull-right"></i></a>
                      </li>  
                       <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='accounting') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-book"></i> <span><?php echo lang('lang_menu_fourth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='accounting') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='accounting') echo 'block';else echo 'none';?>">
               
                
                
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='withdrawal') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>withdrawal"><i class="fa fa-minus"></i> <?php echo lang('lang_menu_fourth_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='deposit') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>deposit"><i class="fa fa-plus"></i>  <?php echo lang('lang_menu_fourth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='bonus') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bonus"><i class="fa fa-plus-square-o"></i> <?php echo lang('lang_menu_fourth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
               
               
              </ul>
            </li>
            
            
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='cms') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-html5"></i> <span><?php echo lang('lang_menu_fifth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='cms') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='cms') echo 'block';else echo 'none';?>">
               
                
                
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='configuration') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>configuration"><i class="fa fa-wrench"></i> <?php echo lang('lang_menu_fifth_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='webpage') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>webpage"><i class="fa fa-globe"></i>  <?php echo lang('lang_menu_fifth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='faq') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>faq"><i class="fa fa-question-circle"></i> <?php echo lang('lang_menu_fifth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
               
               
              </ul>
            </li>
            
            
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='loteria') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-money"></i> <span><?php echo lang('lang_menu_sixth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='loteria') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='loteria') echo 'block';else echo 'none';?>">
               
                
                
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='gametype') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>gametype"><i class="fa fa-puzzle-piece"></i> <?php echo lang('lang_menu_sixth_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                   
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotterygame') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotterygame"><i class="fa fa-gamepad"></i>  <?php echo lang('lang_menu_sixth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                  
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotteryannouncement') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotteryannouncement"><i class="fa fa-bullhorn"></i> <?php echo lang('lang_menu_sixth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotogroup') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotogroup"><i class="fa fa-institution"></i> <?php echo lang('lang_menu_sixth_sub_menu_fourth');?> <i class="pull-right"></i></a>
                      </li>     
                     
                  
               
              </ul>
            </li>
            
            
            <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='historialdejugadas') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-history"></i> <span> <?php echo lang('lang_menu_seventh');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'block';else echo 'none';?>">
               
                
               
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='bethistory') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bethistory"><i class="fa fa-archive"></i> <?php echo lang('lang_menu_seventh_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='winner') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>winner"><i class="fa fa-won"></i>  <?php echo lang('lang_menu_seventh_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='result') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>result"><i class="fa fa-ticket"></i> <?php echo lang('lang_menu_seventh_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
               
               
              </ul>
            </li>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='promotion') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-film"></i> <span> <?php echo lang('lang_menu_eight');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='promotion') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='promotion') echo 'block';else echo 'none';?>">
               
                
               
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='subscriber') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>subscription/subscriber"><i class="fa fa-user"></i> <?php echo lang('lang_menu_eight_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                    
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='subscription') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>subscription"><i class="fa fa-envelope"></i>  <?php echo lang('lang_menu_eight_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                    
               
               
              </ul>
            </li>
            
            
            
            
            
             <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='password') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>admin/password"><i class="fa fa-lock"></i> <?php echo lang('lang_menu_ninth');?><i class="pull-right"></i></a>
                      </li>  
            
            
            
            
            
            
            
            
            
            
            
            
            
                          <?php }
                          else if($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin'){
                              ?>
            
             <?php 
                      if(
                              !($allpermissioninfo[13]['viewtask'] == 0&&$allpermissioninfo[13]['others'] == 0&&$allpermissioninfo[2]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='administration') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-gears"></i> <span><?php echo lang('lang_menu_first');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'block';else echo 'none';?>">
               
                <li>
                  <a href="#"><i class="fa fa-user-md"></i> <?php echo lang('lang_menu_first_submenu_first');?> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='rolemgmt') echo 'block';else echo 'none';?>" >
                   
                     
                     
                     <?php 
                      if(
                              ($allpermissioninfo[13]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='role') echo 'active'; ?>"><a href="<?php echo base_url(); ?>role"><i class="fa fa-eye"></i><?php echo lang('lang_menu_first_submenu_first_sub_menu_first');?></a></li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                        <?php 
                      if(
                              ($allpermissioninfo[13]['others'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='roleassignment') echo 'active'; ?>"><a href="<?php echo base_url(); ?>role/roleassignment"><i class="fa fa-pencil"></i> <?php echo lang('lang_menu_first_submenu_first_sub_menu_second');?></a></li>
                     <?php }
                                                          
                   
                            ?> 
                      
                   
                  </ul>
                </li>
                <?php 
                      if(
                              ($allpermissioninfo[2]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='administrators') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>admin/administrators"><i class="fa fa-male"></i> <?php echo lang('lang_menu_first_submenu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
                <?php 
                      if(
                              ($allpermissioninfo[3]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='members') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>user"><i class="fa fa-users"></i> <?php echo lang('lang_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                      
                      
                       <?php 
                      if(
                              ($allpermissioninfo[17]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='partner') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>partner"><i class="fa fa-briefcase"></i> <?php echo lang('lang_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                      
                      
                      
                      <?php 
                      if(
                              !($allpermissioninfo[9]['viewtask'] == 0&&$allpermissioninfo[10]['viewtask'] == 0&&$allpermissioninfo[11]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='accounting') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-book"></i> <span><?php echo lang('lang_menu_fourth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='accounting') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='accounting') echo 'block';else echo 'none';?>">
               
                
                <?php 
                      if(
                              ($allpermissioninfo[9]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='withdrawal') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>withdrawal"><i class="fa fa-minus"></i> <?php echo lang('lang_menu_fourth_sub_menu_first');?>  <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[10]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='deposit') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>deposit"><i class="fa fa-plus"></i>  <?php echo lang('lang_menu_fourth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[11]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='bonus') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bonus"><i class="fa fa-plus-square-o"></i> <?php echo lang('lang_menu_fourth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
            
            <?php 
                      if(
                              !($allpermissioninfo[0]['viewtask'] == 0&&$allpermissioninfo[1]['viewtask'] == 0&&$allpermissioninfo[12]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='cms') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-html5"></i> <span><?php echo lang('lang_menu_fifth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='cms') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='cms') echo 'block';else echo 'none';?>">
               
                
                <?php 
                      if(
                              ($allpermissioninfo[0]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='configuration') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>configuration"><i class="fa fa-wrench"></i> <?php echo lang('lang_menu_fifth_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[1]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='webpage') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>webpage"><i class="fa fa-globe"></i>  <?php echo lang('lang_menu_fifth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[12]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='faq') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>faq"><i class="fa fa-question-circle"></i> <?php echo lang('lang_menu_fifth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
            
            
            <?php 
                      if(
                              !($allpermissioninfo[5]['viewtask'] == 0&&$allpermissioninfo[4]['viewtask'] == 0&&$allpermissioninfo[18]['viewtask'] == 0&&$allpermissioninfo[19]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='loteria') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-money"></i> <span><?php echo lang('lang_menu_sixth');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='loteria') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='loteria') echo 'block';else echo 'none';?>">
               
                
                <?php 
                      if(
                              ($allpermissioninfo[4]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='gametype') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>gametype"><i class="fa fa-puzzle-piece"></i> <?php echo lang('lang_menu_sixth_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[18]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotterygame') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotterygame"><i class="fa fa-gamepad"></i>  <?php echo lang('lang_menu_sixth_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[5]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotteryannouncement') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotteryannouncement"><i class="fa fa-bullhorn"></i> <?php echo lang('lang_menu_sixth_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                         <?php 
                      if(
                              ($allpermissioninfo[19]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='lotogroup') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>lotogroup"><i class="fa fa-institution"></i> <?php echo lang('lang_menu_sixth_sub_menu_fourth');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
               <?php 
                      if(
                              !($allpermissioninfo[6]['viewtask'] == 0&&$allpermissioninfo[7]['viewtask'] == 0&&$allpermissioninfo[8]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='historialdejugadas') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-history"></i> <span> <?php echo lang('lang_menu_seventh');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'block';else echo 'none';?>">
               
                
                <?php 
                      if(
                              ($allpermissioninfo[8]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='bethistory') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bethistory"><i class="fa fa-archive"></i> <?php echo lang('lang_menu_seventh_sub_menu_first');?><i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[7]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='winner') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>winner"><i class="fa fa-won"></i>  <?php echo lang('lang_menu_seventh_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[6]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='result') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>result"><i class="fa fa-ticket"></i> <?php echo lang('lang_menu_seventh_sub_menu_third');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
              <?php 
                      if(
                              !($allpermissioninfo[16]['viewtask'] == 0&&$allpermissioninfo[15]['viewtask'] == 0))
                          {
                          ?>
             <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='promotion') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-film"></i> <span> <?php echo lang('lang_menu_eight');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='promotion') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='promotion') echo 'block';else echo 'none';?>">
               
                
                <?php 
                      if(
                              ($allpermissioninfo[16]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='subscriber') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>subscription/subscriber"><i class="fa fa-user"></i> <?php echo lang('lang_menu_eight_sub_menu_first');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                       <?php 
                      if(
                              ($allpermissioninfo[15]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='subscription') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>subscription"><i class="fa fa-envelope"></i>  <?php echo lang('lang_menu_eight_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                     
                     <?php }
                                                          
                   
                            ?> 
                     
               
               
              </ul>
            </li>
             <?php 
                          }
                          ?>
            
                 
              <?php 
                      if(
                              ($allpermissioninfo[14]['viewtask'] == 1))
                          {
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='password') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>admin/password"><i class="fa fa-lock"></i> <?php echo lang('lang_menu_ninth');?><i class="pull-right"></i></a>
                      </li>  
              
                     
                     <?php }
                                                          
                   
                            ?> 
            
            
            
                                  <?php
                          }
                          else if($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner'){
                              ?>
                 <li class="treeview  <?php if(trim(explode('-',$menuactiveornot)[0])=='historialdejugadas') echo 'active';?>" >
              <a href="#">
                <i class="fa  fa-history"></i> <span> <?php echo lang('lang_partner_menu_first');?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu  <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'menu-open';?>" style="display: <?php if(trim(explode('-',$menuactiveornot)[1])=='historialdejugadas') echo 'block';else echo 'none';?>">
               
                
              
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='currentpartnerhistory') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bethistory/currentpartnerhistory"><i class="fa fa-level-up"></i><?php echo lang('lang_partner_menu_first_sub_menu_first');?>  <i class="pull-right"></i></a>
                      </li>     
                     
                  
                       
                          ?>
                      <li class="<?php if(trim(explode('-',$menuactiveornot)[2])=='passedpartnerhistory') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>bethistory/passedpartnerhistory"><i class="fa fa-level-down"></i>  <?php echo lang('lang_partner_menu_first_sub_menu_second');?> <i class="pull-right"></i></a>
                      </li>     
                    
                     
               
               
              </ul>
            </li>
             <li class="<?php if(trim(explode('-',$menuactiveornot)[1])=='password') echo 'active'; ?>">
                         
                           <a href="<?php echo base_url(); ?>admin/password"><i class="fa fa-lock"></i> <?php echo lang('lang_menu_ninth');?><i class="pull-right"></i></a>
                      </li>  
            
                             <?php
                          }
                          
                          
                          ?>
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
     