<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olvide Contraseña</title>
    <meta name="description" content="Recuperar tu contrase&ntilde;a."/>
    <meta name="keywords" content="olvide mi contrasena memedone">
    <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/main.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158039347-1"></script> -->
    <!-- <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-158039347-1');
    </script> -->
</head>
<body>
<?php include 'Menu/indexMenu.php'; ?>

<div class="container">
<div class="header">
  	<h1>Recuperar su Contraseña</h1>
  </div>
	 
  <form method="POST" class="content2" action="forgot_password.php">
  
  	<div class="input-group">
  		<label>Correo Electronico: </label><br>
  		<input maxlength="150" type="email" id="forgotpassword" placeholder="Escriba su Correo..." >
  	</div>
  	<div>
  	<p class="elseErrorIndex" style="padding-top:0px;">Favor escriba el <strong style="color:#5510d6;">correo electronico</strong> que uso para <strong style="color:#5510d6;">registrarse.</strong> <br>
      *Le enviaremos un correo electronico para cambiar su contraseña.
       </p>
      </div>
  	<div class="input-group">
  		<a type="submit" class="btn btn-lg btn-block" onclick="recover()"><i id="loading" > </i>Recuperar Contraseña</a>
  	</div>
	<div id="forgot"></div>
	

	  
  </form>
  </div>
    <script type="text/javascript" src="scripts/passwordEmailControl.js"></script>
    <script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>