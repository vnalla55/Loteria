


<!DOCTYPE HTML>
<html>

<head>
    <!-- meta info -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Tu Banquita" />
    <meta name="description" content="Tu Banquita">
    <meta name="author" content="JR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
    <!-- Bootstrap styles -->
   <link rel="stylesheet" href="<?php echo base_url();?>resource/bootstrap-3.2.0-dist/css/bootstrap.min.css" type="text/css"/>
    <!-- Font Awesome styles (icons) -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/font_awesome.css">
    <!-- Main Template styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
    <!-- IE 8 Fallback -->
    <!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
    <link rel="stylesheet" href="<?php echo base_url();?>resource/morrischart/morris.css">

    <!-- Custom -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/mystyles.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/nonadmincss.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/jquery-ui/jquery-ui.min.css">
    

    <link rel="stylesheet" href="<?php echo base_url();?>resource/bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css" type="text/css"/>
     <link rel="stylesheet" href="<?php echo base_url();?>resource/lotofrontdatepicker/bootstrap-datepicker.min.css">
          <link rel="stylesheet" href="<?php echo base_url();?>resource/lotofrontdatepicker/bootstrap-datepicker3.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>resource/bootstrap-daterangepicker-master/daterangepicker-bs3.css">

            <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/iosOverlay.css">
  <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/prettify.css">

   
        <!-- Scripts queries -->


   <title><?php if(isset($pageno))
    {
      if($pageno==lang('lang_index_id')) echo lang('lang_index_title'); else if($pageno==lang('lang_loteria_id')) echo lang('lang_loteria_title');
    else if($pageno==lang('lang_aboutus_id')) echo lang('lang_aboutus_title');else if($pageno==lang('lang_faq_id')) echo lang('lang_faq_title');else if($pageno==lang('lang_team_id')) echo lang('lang_team_title');
    else if($pageno==lang('lang_results_id')) echo lang('lang_results_title');else if($pageno==lang('lang_contactus_id')) echo lang('lang_contactus_title');else if($pageno==lang('lang_dashboard_id')) echo lang('lang_dashboard_title');else echo 'Lotto';  
    }
    else 
        echo 'Lotto';
    //echo $pageno;
    ?></title>
     
       
</head>

<body class="sticky-header">

    <div class="global-wrap">
      

        <!-- //////////////////////////////////

    //////////////MAIN HEADER///////////// 

    ////////////////////////////////////-->
    
<div class="top-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a class="logo mt5" href="<?php echo base_url();?>lottofront/pages/home">
                            <img title="Tu Banquita" alt="Tu Banquita" src="<?php echo base_url();?>img/tulogo.png">
                        </a>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="pull-right">
                        
                            <ul class="login-register">
                            <li><a data-effect="mfp-move-from-top" href="<?php echo base_url();?>lottofront/pagehow" ><i class="fa fa-star "></i><?php echo lang("lang_howtoplay"); ?></a>
                                </li>
                                <li class="shopping-cart shopping-cart-white"><a href="<?php echo base_url();?>frontcart/usercart"><i class="fa fa-shopping-cart"></i><?php echo lang("lang_cart"); ?></a>
                                    <div class="shopping-cart-box">
                                        <ul class="shopping-cart-items">
                                            <?php  if(isset($_SESSION["betinfowithpartner"]))
                                  {
                                                if(count($_SESSION["betinfowithpartner"])>0){?> 
                                                    <?php 
                       $i=0;
                            foreach($_SESSION["betinfowithpartner"] as $cart_itm){
                                   
                                    ?>
                               
                                 <li>
                                                <a href="<?php echo base_url();?>frontcart/usercart">
                                                    <img title="<?php echo $cart_itm["lotogamename"]; ?>" alt="<?php echo $cart_itm["lotogamename"]; ?>" src="<?php echo base_url();?>lotterygameicons/<?php echo $cart_itm["lotogameicon"];?>">
                                                    <h5><?php echo $cart_itm["lotogamename"]; ?></h5><span class="shopping-cart-item-price">RD<?php echo $cart_itm["bet_amount"];?></span>
                                                </a>
                                            </li>
                                
                                 <?php
                                 if($i==2)
                                 {
                                     break;
                                 }
$i++;                       
}
?>
     
                                    
                                      
                                      
                                                <?php }else{
                                                 echo '<li><h5>'.lang('lang_cart_empty_message').'<h5></li>';   
                                                }
                                                
                                 }
                                      else{
                                          echo '<li><h5>'.lang('lang_cart_empty_message').'<h5></li>';
                                      }
                                 
                                ?>
                                        </ul>
                                        <ul class="list-inline text-center">
                                            <li><a href="<?php echo base_url();?>frontcart/usercart"><i class="fa fa-shopping-cart"></i> <?php echo lang('lang_main_cart_link_name');?></a>
                                            </li>
                                            <li><a href="<?php echo base_url();?>lottofront/pagecheckout"><i class="fa fa-check-square"></i> <?php  echo lang('lang_checkout_link_name');?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php 
                                  if(isset($_SESSION['lotteryuser']))
                                  {
                                 ?> 
                                 
                                 <li><a href="<?php echo base_url();?>frontuser/dashboard"></span> <i class="fa fa-user"></i> <?php echo $_SESSION['lotteryusername']; ?></a>
                                </li>
                                <li><a href="<?php echo base_url();?>lottofront/lotterylogout"><i class="fa fa-sign-out"></i><?php echo lang('lang_signout_link_name'); ?></a>
                                </li>  
                               
                               
                                <?php  
                                 }
                                  else
                                      {
                                      ?>
                                
                                 <li><a id="lflogindialog" data-effect="mfp-move-from-top" href="#login-dialog" class="popup-text"><i class="fa fa-sign-in"></i><?php echo lang("lang_login"); ?></a>
                                </li>
                                <li><a data-effect="mfp-move-from-top" href="#register-dialog" class="popup-text"><i class="fa fa-edit"></i><?php echo lang("lang_signup"); ?></a>
                                </li>
                                <?php
                                      }   
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <header class="main main-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
                        <nav>
                            <ul class="nav nav-pills flexnav lg-screen" id="flexnav" data-breakpoint="800">
                                  <?php 
                        $i=1;
                        
                            foreach($result->result() as $row){
                                    ?>
                                <li   class="focuscolor <?php if(isset($pageno)){check_active_or_not($row->page_id,$pageno);} ?>">
                                    
                                  
                                    <?php if($row->page_id==lang("lang_loteria_id") &&(!isset($_SESSION['lotteryuser']))){
                                        ?>
                        <a  id= "pageid3loteria" href="<?php echo base_url().'lottofront/pages/'.$row->alias;?>"><?php echo $row->page_name;?></a>

                                    <?php
                                    }else { ?>
                                      <a  href="<?php echo base_url().'lottofront/pages/'.$row->alias;?>"><?php echo $row->page_name;?></a>
                                    <?php 
                                    }
                                    ?>
                                </li>
                               
                                
                                 <?php
                       $i++;
}
?>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="pull-right">
                                <!input type="text" placeholder="escribir algo..." />
                                <script>
                                    (function() {
                                      var cx = '004609347437038418040:3kabtpnjeoo';
                                      var gcse = document.createElement('script');
                                      gcse.type = 'text/javascript';
                                      gcse.async = true;
                                      gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                                          '//www.google.com/cse/cse.js?cx=' + cx;
                                      var s = document.getElementsByTagName('script')[0];
                                      s.parentNode.insertBefore(gcse, s);
                                    })();
                                </script>
                                <gcse:search></gcse:search>
                           
                        </div>
                    </div>
                </div>
            </div>
        </header>
         
        <!-- LOGIN REGISTER LINKS CONTENT -->
        <div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="fa fa-sign-in dialog-icon"></i>

            <h3><?php echo lang('lang_login_dialog_top_message1'); ?></h3>

            <h5><?php echo lang('lang_login_dialog_top_message2'); ?></h5>

            <form class="dialog-form" action="<?php echo base_url();?>frontuser/userlogin" onsubmit="return userlogin(event)" id="userloginform">
                <span id="loginspantag"></span>
                <div class="form-group">
                    <label><?php echo lang('lang_login_dialog_label1'); ?></label>
                    <input id="lemail" type="email" placeholder="email@domain.com" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><?php echo lang('lang_login_dialog_label2'); ?></label>
                    <input id="lpassword" type="password" placeholder="<?php echo lang('lang_login_dialog_label2_placeholder'); ?>" class="form-control" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"><?php echo lang('lang_login_dialog_label3'); ?>
                    </label>
                </div>
                <input type="submit" value="<?php echo lang('lang_login_dialog_submit_label'); ?>" class="btn btn-primary">
            </form>
            <ul class="dialog-alt-links">
                <li><a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_login_dialog_registration_link'); ?></a>
                </li>
                <li><a class="popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_login_dialog_forgot_password_link'); ?></a>
                </li>
            </ul>
        </div>


        <div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix topzero" >
            <i class="fa fa-edit dialog-icon"></i>

            <h3><?php echo lang('lang_registration_dialog_top_message1'); ?></h3>

            <h5><?php echo lang('lang_registration_dialog_top_message2'); ?></h5>
        <span id="registrationsuccessfulspantag"></span>
            <form class="dialog-form" action="<?php echo base_url();?>frontuser/registeruser" onsubmit="return userregister(event)" id="userregistrationform" >
                <div class="form-group">
                    <label><?php echo lang('lang_registration_dialog_label1'); ?></label>
                    <input id="femail" type="email" placeholder="email@domain.com" class="form-control" required>
                    <span id="emailalreadyexistspantag"></span>
                </div>
                <div class="form-group">
                    <label><?php echo lang('lang_registration_dialog_label2'); ?></label>
                    <input name="username" id="fusername" type="text" placeholder="<?php echo lang('lang_registration_dialog_label2_placeholder'); ?>" class="form-control" required>
               <span id="usernamealreadyexistspantag"></span>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                              <label><?php echo lang('lang_registration_dialog_label3'); ?></label>
                    <input name="password" id="fpassword" type="password" placeholder="<?php echo lang('lang_registration_dialog_label3_placeholder'); ?>" class="form-control" required>
                     </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo lang('lang_registration_dialog_label4'); ?></label>
                    <input name="confirmPassword" id="frepassword" type="password" placeholder="<?php echo lang('lang_registration_dialog_label4_placeholder'); ?>" class="form-control" required>
                   </div>
                    </div>
                      <span id="passwordnotmatchspantag"></span>
                </div>
                
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><?php echo lang('lang_registration_dialog_label5'); ?></label>
                            <input id="fresidence" type="text" placeholder="<?php echo lang('lang_registration_dialog_label5_placeholder'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo lang('lang_registration_dialog_label6'); ?></label>
                            <input id="fpostalcode" type="text" placeholder="<?php echo lang('lang_registration_dialog_label6_placeholder'); ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required><?php echo lang('lang_registration_dialog_label7'); ?>  
                        <a class="popup-text" href="#condiciones-terminos-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_registration_dialog_label9'); ?></a> 
                            <?php echo lang('lang_registration_dialog_label10'); ?>
                        <a class="popup-text" href="#politica-privacidad-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_registration_dialog_label11'); ?></a>.
                    </label>
                    </div>
              <div class="checkbox">
                    <label>
                        <input type="checkbox" required><?php echo lang('lang_registration_dialog_label8'); ?>
                    </label>
                      
                </div>
                <input id="registerusersubmitbutton" type="submit" value="<?php echo lang('lang_registration_dialog_submit_label'); ?>" class="btn btn-primary">
            </form>
           <div class="form-group" >
             <a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_registration_dialog_login_link'); ?></a>
        </div>
        </div>


        <div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="icon-retweet dialog-icon"></i>

            <h3><?php echo lang('lang_forgot_password_dialog_top_message1'); ?></h3>

            <h5><?php echo lang('lang_forgot_password_dialog_top_message2'); ?></h5>

            <form class="dialog-form" action="<?php echo base_url();?>frontuser/forgotpassword" onsubmit="return forgotpassword(event)" id="forgotpasswordform">
                <span id="forgotmessagespan"></span>
                <label><?php echo lang('lang_forgot_password_dialog_label1'); ?></label>
                <input id="forgotemail" type="email" placeholder="email@domain.com" class="span12" required>
                <input type="submit" value="<?php echo lang('lang_forgot_password_dialog_submit_label'); ?>" class="btn btn-primary">
            </form>
        </div>
                   <div id="politica-privacidad-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="icon-retweet dialog-icon"></i>

            <h3>Política De Privacidads</h3>
            <h5>POLITICA DE PRIVACIDAD ABSOLUTA</h5>

            <form class="dialog-form">
            
               <div class="modal-content">
                <br>
             <h6>Tubanquita.com (TUBANQUITA), gestiona este sitio web y se compromete a respetar su privacidad y a cumplir con las leyes aplicables relativas a privacidad y protección de datos. Nuestra empresa se encuentra constituida bajo las leyes de República Dominicana. Esta Política de Privacidad tiene la finalidad de ayudar al usuario a comprender cómo recopilamos, utilizamos y protegemos su información con el propósito de gestionar nuestra Lotería virtual en Internet. Le sugerimos leer este aviso además de los Términos de Uso perteneciente a la 'Advertencia Legal' para este sitio web, que pueden obtenerse haciendo clic aquí en Condiciones y Términos</h6>
 <br>
<h5>¿Cómo obtenemos la información personal?</h5>
 <br>
<h6>Nuestra empresa recopila información personal cuando el usuario utiliza nuestros servicios de juegos de azar en línea, realiza consultas, se registra para obtener información u otros servicios, o cuando responde a comunicaciones enviadas por nosotros (tales como cuestionarios o encuestas). También podemos obtener información personal del usuario a través de terceras partes determinadas, a quienes el usuario haya elegido para proporcionar información personal. La información personal que recopilamos puede incluir, por ejemplo, el nombre y la dirección de correo electrónico del usuario, su dirección postal, número teléfono, datos sobre la tarjeta de crédito o débito, y estilo de vida, así como otros datos recabados al registrarse o a través de encuestas.</h6>
<br>
<h5>¿Cómo se procesa la información del usuario?</h5>
<br>
<h6>Si el usuario decide suministrarnos su información personal, esta se utilizará para su proceso con los propósitos siguientes: permitirnos brindarle los servicios de juegos de azar en línea al objeto de procesar cualquier solicitud de información que usted realice; proporcionar servicios de asistencia al cliente; comercializar nuestros productos o servicios, o aquellos de TUBANQUITA; mejorar el contenido de nuestro sitio web; informarle acerca de las actualizaciones del mismo, así como de actualizaciones de software y/o de los servicios; y respaldar cualquiera de las finalidades establecidas cuando se recopiló su información, y sujeta a cualquier preferencia que el usuario indique.</h6>
<br>
<h5>¿A quién se suministra la información del usuario?</h5>
<br>
<h6>La información puede suministrarse para su procesamiento a los siguientes Receptores: cualquier otra empresa de TUBANQUITA, incluyendo sus empleados; cualquier otro proveedor de servicios que use la información personal del usuario para brindarnos servicios; o cualquier auditor o contratista, u otro asesor que controle cualquiera de los procesos de negocios de TUBANQUITA, compradores potenciales o inversores de cualquier empresa de TUBANQUITA. Todo procesamiento llevado a cabo por cualquier Receptor estará, cuando la ley así lo estipule, regido por un acuerdo de procesamiento de datos bajo la forma que la ley establezca, preservándose todo y cualquier derecho reglamentario de protección de datos detentado por el usuario. Nosotros aseguramos que la información del usuario no se suministrará ni a instituciones gubernamentales ni a las autoridades, excepto cuando la ley así lo estipule.</h6>
<br>
<h5>¿Cómo el usuario puede rechazar la recepción de ofertas?</h5>
<br>
<h6>Proporcionamos al usuario una forma fácil de rechazar la recepción de ofertas enviadas por nosotros o por cualquiera de las empresas de TUBANQUITA por correo electrónico. Si el usuario no desea recibir dichas ofertas nunca más, tan sólo debe enviar, cuando lo considere oportuno, un mensaje en blanco a info@tubanquita.com incluyendo la palabra "Rechazar" en el área del mensaje destinada al asunto. Se solicita a aquellos usuarios que no deseen recibir nuestras ofertas por correo o vía telefónica , llamar o escribirnos a las siguientes direccion:</h6>
<br>
<h6>Tubanquita.com</h6>
<h6>Apartado Posta (P.O. Box) 1234</h6>
<h6>Santiago, Republica Dominicana Zip Code 51000</h6>
<h6>Teléfono: (809)555-1234</h6>
<h6>info@tubanquita.com</h6>
<br>
<h5>¿Cuáles son los derechos del usuario con respecto a su información?</h5>
<br>
<h6>El usuario puede escribirnos en cualquier momento para obtener una copia de su información y hacer que se corrija cualquier dato exacto. Cuando sea apropiado, podrá hacer que su información personal sea rectificada, enmendada o completada. Para ello, deberá enviarnos un mensaje a nuestra dirección de correo electrónico: info@tubanquita.com. Es posible que cobremos un pequeño importe para cubrir gastos administrativos.</h6>
<br>
<h5>¿En qué consisten nuestros sistemas de seguridad?</h5>
<br>
<h6>Hemos implementado políticas de seguridad, reglas y medidas técnicas adecuadas para proteger y salvaguardar la información personal bajo nuestro control del acceso no autorizado, el uso o la divulgación indebida, las modificaciones no autorizadas, la destrucción ilegal o la pérdida accidental. Todos nuestros empleados y procesadores de datos con acceso y relacionados con el procesamiento de la información personal del usuario, están obligados a respetar la confidencialidad de su información.</h6>
<br>
<h5>¿Cuál es el uso de las "Cookies"?</h5>
<br>
<h6>Al registrase con nosotros el usuario puede recibir un cookie permanente en su equipo informático. Un cookie es un pequeño archivo que se coloca en el disco duro de su ordenador a fin de almacenar registros. Los cookies nos ayudan a reconocer al usuario cuando realiza la siguiente visita a nuestro sitio web y registra los anuncios sobre los que hace clic así como otros sitios a los que accede a través de un enlace en nuestro sitio. Esto nos permite adaptar a sus preferencias el servicio que le brindamos. También podemos utilizar los datos generados a partir de los cookies para compilar datos estadísticos sobre el uso que el usuario hace de nuestro sitio. El usuario no está obligado a aceptar cookies por nuestra parte o por parte de cualquier otro sitio Web, y puede modificar su navegador (browser) de manera tal que no las acepte. Solicitamos al usuario se sirva consultar la sección "Ayuda" de su navegador para recibir instrucciones respecto a cómo hacerlo correctamente. No obstante, por razones de legítima seguridad, podremos denegar el acceso a cierto contenido específico del sitio Web a no ser que el usuario acepte usar un cookie o dispositivo similar.</h6>
<br>
<h5>Publicidad</h5>
<br>
<h6>Nosotros utilizamos una tecnología de publicidad, responsabilidad de terceras partes, para enviar avisos publicitarios cuando usted visita nuestro sitio web. Dicha tecnología se basa en el uso de información sobre usted durante sus visitas al sitio web para enviarle nuestra publicidad (sin incluir su nombre, dirección, ni otra información personal). En el curso de nuestro envío de publicidad a usted, únicamente puede ubicarse o reconocerse un cookie en su equipo informático servidor. También transmitimos información respecto al uso del sitio web sobre los visitantes de nuestro sitio a servidores fiables, terceras partes, con el propósito de concentrar nuestros avisos publicitarios de Internet en éste y otros sitios. Con este propósito utilizamos "web beacons" y "cookies" generadas por nuestro servidor de publicidad responsabilidad de terceras partes en este sitio web. La información recopilada y utilizada en nuestro nombre mediante esta tecnología no es personalizada ni identificable. Si Usted no desea que su información no-personalizada se utilice para enviarle publicidad, contactanos a info@tubanquita.com.</h6>
<br>
<h5>¿Cómo protegemos al menor?</h5>
<br>
<h6>Los servicios ofrecidos en este sitio web no están dirigidos a menores o a personas que no alcancen la edad legal autorizada en su jurisdicción. Cualquier persona que nos haga llegar su información, representa para nosotros un individuo de 18 años o con edad suficiente para acceder legalmente a nuestros servicios conforme a la ley aplicable en su jurisdicción. Nos reservamos el derecho a acceder y verificar cualquier información personal enviada por usted o recopilada de usted. En caso de tener constancia de que un menor ha intentado enviar o ha o enviado información personal mediante este sitio web, podremos no aceptar esta información y emprender las acciones oportunas para eliminar dicha información de nuestros registros.</h6>
<br>
<h5>¿Cómo protegemos los datos en la Transferencia Internacional?</h5>
<br>
<h6>Dado que operamos globalmente, puede ser necesario transferir información personal del usuario a otras empresas dentro de TUBANQUITA en países que se encuentran fuera de la Republica Dominicana. Esto puede suceder si nuestros servidores o dichas empresas tienen su base fuera de la Republica Dominicana, si usted utiliza nuestros productos y servicios mientras se encuentra visitando países fuera de la Republica Dominicana, o si nosotros transferimos su información personal a tales empresas con fines con respecto a los cuales se le informará de antemano. Las leyes de protección de datos y otras leyes de estos países pueden no ser tan amplias como las de la Republica Dominicana - en estos casos nosotros tomaremos las medidas necesarias para asegurar que su información goce de un nivel similar de protección.</h6>
<br>
<h5>¿Cuál es el tiempo de recopilación y conservación de los datos del usuario?</h5>
<br>
<h6>La información personal del usuario no se conservará durante más tiempo que el necesario para los propósitos a efectos de los cuales se ha recopilado dicha información. La información personal del usuario no se guardará por más tiempo que el necesario para los propósitos para los cuales ha sido reunida.</h6>
<br>
<h6>Esta política de privacidad está sujeta a cambios, por lo que solicitamos al usuario verificarla regularmente. Nos reservamos el derecho de enmendar o modificar esta Política de Privacidad en cualquier momento y de acuerdo con los cambios en las leyes de protección de datos y privacidad aplicables. En caso de cambiar los propósitos, lo notificaremos al usuario tan pronto como sea posible y, siempre que se requiera, solicitaremos su consentimiento cuando tal notificación se refiera a un nuevo propósito adicional para el procesamiento. Los usuarios que deseen formular, hacer cualquier consulta sobre nuestra política o prácticas de protección de datos y privacidad, deberán dirigirse por escrito a info@tubanquita.com.</h6>
<br>
<h6>Última Revisión: 28 de Septiembre de 2014.</h6>
<br>          
         </div>
                <a class="popup-text btn btn-primary btn-small" href="#register-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_privacy_policy_dialog_submit_label'); ?></a>
               
            </form>
        </div>
        
        <div id="condiciones-terminos-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="icon-retweet dialog-icon"></i>

            <h3>Condiciones y Terminos</h3>

            <form class="dialog-form">
            <div class="modal-content">
     
<h5>Condiciones y Terminos</h5>
<h6>Tubanquita.com (TUBANQUITA) opera bajo licencia  regulada por las leyes que rigen los Juegos de Lotería Nacional de la República Dominicana con el proposito de vender Loterías en Internet bajo el nombre de: TUBANQUITA.</h6>
<h6>Apostar en algunos paises esta  puede no ser legal bajo determinadas condiciones, en otras, puede no ser legal en ningún caso. TUBANQUITA (Republica Dominicana) no guarda representación alguna sobre la legalidad de sus servicios en otros paises. Compruebe la legislación correspondiente a su pais antes de registrarse y lea detenidamente nuestros términos y condiciones:</h6>
<h5>Contrato con el usuario</h5>
<h6> 1- Cuando usted acepta los Términos y Condiciones de nuestra Empresa, este Acuerdo con el Usuario, por su condición de acuerdo legal entre usted y TUBANQUITA (Republica Dominicana) Tubanquita.com.(la "Empresa"), actualizado regularmente, regirá su uso del sitio en Internet Tubanquita.com</h6>
<h6> 2-  Nuestro software permite   apostar en Internet (el "Servicio"). Nos reservamos el derecho de suspender, modificar, quitar o añadir el Servicio a su total discreción y de forma inmediata, sin previo aviso y no se nos considerará responsable de las pérdidas sufridas en consecuencia de alguna de tales modificaciones.</h6>
<h6> 3- No se permiten ningun  menor de 18 años ni tampoco menor a la edad requerida para participar en las actividades incluidas en el Servicio según la Ley del Pais que aplique a su caso, toda persona menor de 18 años o del límite de edad legal autorizado para participar en actividades relativas a los juegos de apuestas bajo la Ley de cualquier pais que se aplique a su caso, cualquiera sea mayor,  utilice el Servicio se estará cometiendo una infracción contra los términos de este Acuerdo. Nos reservamos el derecho de requerir documentación que compruebe la edad del usuario en cualquier instancia, para comprobar que no haya menores utilizando el Servicio. Si no se proporcionase la documentación requerida o si la Empresa sospechase que la persona que utiliza el software es menor de edad, la Cuenta podrá cancelarse o se impedirá a dicha persona usar el Software o el Servicio.</h6>
<h6> 4- No esta permitido que ningun  empleado, consultor, accionista, familiar  o sus proveedores o vendedores, utilizar el servicio directa o indirectamente. Esta restricción también se aplica a familiares de estas personas y a este efecto el término "familiar" incluye, pero sin limitar, a cualquiera de los cónyuges, compañero, padre, hijo o hermano</h6>
<h6> 5- El usuario no podrá tener mas de una sola cuenta, para la cual deberá registrarse usando su propio nombre, correctamente escrito. Usted no podrá are o usar el Servicio mediante la cuenta de otra persona. Si usted intentara abrir más de una cuenta, ya sea bajo su nombre o bajo el nombre de un tercero, o si intentara usar el Servicio a través de la cuenta de otra persona, estaremos facultados para cerrar inmediatamente todas sus cuentas e impedir su uso del Servicio en el futuro.</h6>
<h6> 6- Al hacer uso del Servicio usted acepta haber leído y comprendido los Términos y Condiciones del presente Acuerdo y reconoce que tales Términos y Condiciones le serán aplicables.</h6>
<h5>El Acuerdo</h5>
<h6> 1- La empresa se reserva el derecho a corregir, modificar, actualizar o cambiar cualquiera de los Términos y Condiciones del presente Acuerdo en cualquier momento; es su responsabilidad asegurarse que Usted está al corriente de la versión correcta y actualizada de los Términos y Condiciones de este Acuerdo y le sugerimos comprobar las actualizaciones con regularidad. Usted será responsable de familiarizarse con los contenidos del servicio en todo momento.</h6>
<h5>De acuerdo con la ley</h5>
<h6>Los juegos de azar en Internet pueden no ser legales en algunos paises. Usted entiende y acepta que la compañía no puede proveerle ningún tipo de asesoramiento legal o de seguridad y de que usted es el único responsable de comprobar y cumplir con la ley en cualquier pais que se aplique a su caso antes de registrarse.</h6>
<h5>Propiedad Intelectual</h5>
<h6>Este software está protegidos por derechos de propiedad intelectual y esta  prohibido: Copiar, modificar, traducir a otros idiomas, hacer versiones similares de la version originar, ponerlo a disposición de terceros y ser usados en otros paises y cualquier daño ocasionado al software usted sera responsable de los mismos.</h6>
<h6>Los nombres de Lotería Dominicana Online y TUBANQUITA,  el software, imágenes, animaciones, musica, video, sonidos son propiedad unica y exclusivamente de la empresa y por lo tanto  uso del servicio no le da ningun derecho sobre las marcas y el contenido del sitio.</h6>
<h5>Usted se compromete</h5>
<h6>Al usar el Servicio, Usted declara, garantiza y acuerda aceptar que:
<h6> 1-Usted es mayor de 18 años de edad, o de la edad legalmente exigida para apostar dentro de su pais y que pleno domino de sus facultades mentales.</h6>
<h6> 2- Todos los datos enviados en su Formulario de Registro son verdaderos, actualizados y correctos; son los mismos de su  tarjeta de crédito/débito u otras cuentas de pago que se utilizarán para depositar o recibir ganancias en su cuenta.</h6>
<h6>Si usted utiliza una tarjeta de crédito/debido o cualquier otra forma de pago que no este registrado a su nombre, usted habrá recibido previo y pleno consentimiento para utilizar dicho método de pago para tales fines, del titular y/o utilizar el nombre del titular de la tarjeta, por lo tanto no tenemos ninguna responsabilidad de sus ejecutorias y No estaremos obligados a examinar el contenido, por lo que no nos haremos responsable de sus representaciones a continuación citadas</h6>
<h6> 3- Usted sera responsable de la utilización de terceros de su cuenta, contraseña o identidad de acceso, ni utilización del Servicio ni Software y Usted será responsable de cualquier actividad llevada a cabo en su cuenta por terceros.</h6>
<h6> 4- Antes de usar el servicio usted verificara que este no infringe la ley o reglamento del pais correspondiente.</h6>
<h6> 5- Usted esta seguro de que existe el  riesgo de perder dinero al apostar por medio del Servicio y asumira la responsabilidad de sus perdidas.</h6>
<h6> 6-  Acepta usted proporcionar algunos datos personales al momento de registrarse y que  prodemos revelar algunos datos a terceros.</h6>
<h5>Prohibiciones  Sitio en Internet y del Servicio</h5>
<h6> 1- Estan prohibidos el uso de fondos ilegales  y actividades ilícitas Por lo que:  declara usted que el origen de los fondos que usa para apostar en el Sitio no es ilegal y que no usara el sitio en Internet para lavado de dinero o cualquier otra forma que fraudulenta que violen las leyes de la Republica Dominicana o de cualquier pais que se este ejecutando la transacción. Al incurrir en esta violacion, su acceso al Servicio podrá ser inmediatamente dado por terminado y/o su cuenta bloqueada  y la Empresa no estará obligada a reembolsarle los fondos de su cuenta. La Empresa estará facultada para informar a las autoridades pertinentes o cualquier otra institución que asi lo requiera.</h6>
<h6> 2- Cualquier intento de fraude al software o a las medidas de seguridad de la empresa podremos cancelar inmediatamente su acceso al Servicio o bloquear su Cuenta y  podremos informar a los terceros interesados respecto a su infracción.</h6>
<h5>Su cuenta</h5>
<h6> 1-    Es su responsabilidad uso de su cuenta, no pudiendo usarla para negocios o ningun otro uso, ademas no seremos responsables por el acceso y perdidas de  terceros a su cuenta como consecuencia del uso no autorizado de su contraseña por cualquier otra persona.</h6>
<h6> 2-     No pagaremos intereses por el dinero acumulado en su cuanta y la utilización de esta por periodo de 6 meses se considerara inactiva, este tiempo se considerara desde su ultimo acceso a su cuenta y a partir de ese tiempo se descontara un 10% mensual del balance hasta que el balance quede en  $0. La empresa no tiene obligación  de devolver el monto descontado durante ese tiempo. </h6>
<h6> 3-    La empresa tiene derecho a restringir o rechazar o rechazar cualquier          apuesta, sin tener que dar ninguna explicación al usuario.</h6>
<h6> 4-    La empresa tiene derecho a retiarar de su cuenta los fondos ganados como resultado de errores humanos intencionales o no y por errores automaticos del software.</h6>
<h5>Transacciones y  fraudes</h5>
<h6> 1- La empresa se reserva derecho de realizar comprobaciones del crédito de un usuario  basados en la información  suministrada en su registro.</h6>
<h6> 2- La empresa tiene derecho a utilizar procesadores de pagos electronicos de terceros o instituciones financieras y Usted debe aceptar los términos y condiciones de dichas instituciones.</h6>
<h6> 3- Si  existiera pago fraudulento, a travez del uso de tarjetas de crédito robadas o cualquier otra actividad fraudulenta, la empresa tiene derecho de bloquear la cuenta del usuario, revertir cualquier pago y recuperar cualquier suma ganada en el juego por él.</h6>
<h6> 4- Todos los pagos destinados a su cuenta de loterias deben surgir de una única fuente de pago, como por ejemplo una tarjeta de crédito o de débito, transferencia bancaria en la cual Usted figure como titular de la cuenta.</h6>
<h5>Compromisos de la Empresa</h5>
<h6>La Empresa no tiene obligación de mantener nombres de cuentas o contraseñas. Si Usted no encontrara, olvidara o perdiera su nombre de cuenta o contraseña por cualquier otra razón excepto un error de la Empresa, la Empresa no será considerada responsable.</h6>
<h5>Limites de responsabilidad</h5>
<h6>Acepta usted de que en caso el software o servicio fallen o no funcionen correctamente como resultados de interrupción en la transmisión sin importar la causa o cualquier otro factor fuera de nuestro control, no nos haremos responsables de ninguna perdida que se pudiera ocacionar incluyendo perdida de ganancias y no tendra derecho a tales ganancias obtenidas. </h6>
<h5>Violacion términos y condiciones del contrato</h5>
<h6>Acepta usted  indemnizar completamente, defender y amparar a la Empresa y a nuestros proveedores, inmediatamente, si así lo solicitaran, frente a cualquier demanda, obligación, daño y perjuicio, pérdida, costos y gastos, incluyendo costes legales y cualquier otros cargos posibles causados, que pudieran resultar como resultado de la violación de cualquier parte del contrato.</h6>
<h5>Duración y finalización</h5>
<h6>El presente Acuerdo entrará en vigor inmediatamente después de que Usted marque el cuadro "Acepto los términos y condiciones" como parte del proceso de registro y continuará vigente hasta su finalización conforme a los términos aquí expresados y la empresa puede finalizar este acuerdo sin previo aviso.</h6>
<h5>Generales</h5>
<h6> 1- La Empresa podra  transferir la licencia total o parcialmente sin previa notificación y se considerará que Usted ha dado su consentimiento a ello.</h6>
<h6> 2- El usuario podrá transferir a terceros su cuenta total o parcialmente de manera que  los derechos u obligaciones que le corresponden en virtud de este Acuerdo sean traspasado a terceros.</h6>
<h6> 3- La Empresa está regulada por las disposiciones legales relativas a los juegos loterias de la República Dominicana. Usted acepta  que la Empresa puede  revelar cierta información sobre usted y su cuenta a las autoridades de República Dominicana conforme a dichas regulaciones.</h6>
<h6> 4- Cualquier discrepancia en el contenido de cualquiera de las versiones traducidas del presente Acuerdo, prevalecerá la versión en idioma español.</h6>
<h6> 5- La empresa podra grabar las llamadas que se realicen en el servicio de atención al cliente para asegurar la calidad este.</h6>
<h5>Jurisdicción</h5>
<h6>Este Acuerdo y las relaciones entre las partes se regirán por las leyes de República Dominicana y se interpretarán de acuerdo a ellas y usted se someterá, por el bien de la Empresa, a la jurisdicción exclusiva de los Tribunales de República Dominicana para resolver cualquier disputa (incluyendo demandas y contra-demandas) que pudieran surgir en relación con la creación, validez, efecto, interpretación o prestación, o las relaciones jurídicas establecidas por el presente Acuerdo o de cualquier otra forma que surja a raíz de este Acuerdo.</h6>
                 </div>
        
                  <a class="popup-text btn btn-primary btn-small" href="#register-dialog" data-effect="mfp-zoom-out"><?php echo lang('lang_terms_and_condition_dialog_submit_label'); ?></a>
            </form>
        </div>
        
        <!-- END LOGIN REGISTER LINKS CONTENT -->



        <div class="gap"></div>


        <!-- //////////////////////////////////

    //////////////END MAIN HEADER////////// 

    ////////////////////////////////////-->
        