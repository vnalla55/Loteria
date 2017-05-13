<html>
    
    <head>
        <title>
            Admin login
        </title>
        <!-- Bootstrap -->
            <meta name="viewport" content="width=device-width, initial-scale=1">	
            <link rel="stylesheet" href="<?php echo base_url();?>resource/bootstrap-3.2.0-dist/css/bootstrap.min.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>resource/bootstrap-3.2.0-dist/js/bootstrap.min.js" type="text/javascript"/>
         <!-- jQuery -->

    <script type ="text/javascript" src="<?php echo base_url();?>resource/jquery-1.11.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/admincss.css">
    </head>
    <body>
        
      <div class="container" style="width:400px;">
	
      <form class="form-signin" role="form" action="<?php echo base_url();?>admin/adminloginvalidate" method="post" id="signin">
        <center><h3 class="form-signin-heading" style="margin-top:5px; color:#2094DF">Por favor ingrese</h3></center>
        <input type="text" class="form-control" placeholder="Nombre de usuario" required autofocus name="username">
        <input type="password" class="form-control" placeholder="Contrase&ntilde;a" required name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Recordarme en este ordenador 
        </label>
        <button class="btn btn-primary" type="submit">Entrar</button>
      </form>
      <?php if(isset($error_message)) {
          echo '<div class="alert alert-danger" role="alert">Invalid Username or Password!!!</div>';
	  }
		?>
               
                	
    </div> <!-- /container -->
      
    </body>
</html>
