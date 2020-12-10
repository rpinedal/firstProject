<?php include 'Database/dbConnect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Registrarse para ver memes"/>
    <title>Memedone - Registrarse</title>
    <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>
    
     


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <?php include 'Menu/indexMenu.php'; ?>
<div class="container">
    <div class="header">
  	  <h1>
        Registrarse
      </h1>
    </div>  
  <br>
  <br>
  <form method="post" class="content2" action="register.php">
      <?php include('errors.php'); ?>
          <div class="input-group">

            <label class="modalLabel">
              <h6>  
                Usuario 
              </h6>
            </label>
            <input class="CommentInput modalInput" maxlength="18" type="text" name="username" onkeyup="nospaces(this)">

          </div>
<br>
          <div class="input-group">

            <label class="modalLabel">
              <h6> 
                Correo 
              </h6>
            </label>
            <input class="CommentInput modalInput" maxlength="100" type="email" name="email"  onkeyup="nospaces(this)">

          </div>
<br>
          <div class="input-group">

            <label class="modalLabel">
              <h6> 
                Contraseña 
              </h6>
            </label>
            <input class="CommentInput modalInput" type="password" name="password_1">

          </div>
<br>
          <div class="input-group">

            <label class="modalLabel">
              <h6> 
                Confirmar Contraseña 
              </h6>
            </label>
            <input class="CommentInput modalInput" type="password" name="password_2">

          </div>
<br>
          <br>

          <div class="input-group">
            <button type="submit" class="btn btn-block" name="reg_user">
              Registrarse
            </button>
          </div>
          <p>
            Ya esta Registrado? <a href="login.php">Iniciar Sesión</a>
          </p>
  </form>
</div>
  
  <!-- FOOTER -->
    
<footer id="sticky-footer" style="margin-top: 80px;" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
       
      <a class="nav-link" href="nosotros.php">Sobre Nosotros</a>
      
      <small>Copyright&copy; Memedone.com</small>
      
    </div>
  </footer>
  
  
  
  <script type="text/javascript">

function nospaces(t){

if(t.value.match(/\s/g)){

alert('Lo sentimos, no puede usar espacios en esta parte.');

t.value=t.value.replace(/\s/g,'');

}

}

</script>
<script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>