<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memedone - Subir</title>
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
<?php include 'Database/dbConnect.php'; ?>
<div class="container">
<div class="header">
  	<h2>Subir Contenido</h2>
  	</div>
<form class="content2" action="uploadContent.php" method="post" enctype="multipart/form-data" placeholder="Buscar..">
    <div>
  	<p class="elseErrorIndex" style="padding-top:0px;">Puede subir <strong class="postedby">Fotos, Videos y GIFs</strong><br>
      
       </p>
      </div>
<div>
<label class="modalLabel">
  <h5>
    Seleccionar <strong style="color:red;">*</strong>
  </h5>
</label>
<br>

<label for="choosefile" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Buscar Imagen
</label>
<input id="choosefile" type="file" name="file"/>
    <br><br>
  
</div>

<div>
   <label class="modalLabel">
     <h5>
       Titulo 
      </h5>
    </label>
    <br>

  <input class="CommentInput modalInput" style="width: 75%;" maxlength="45" type="text" name="title" placeholder="  Titulo..." ><br><br>

<label class="modalLabel">
  <h5>
    Descripción
  </h5>
</label>
<br>

  <input class="CommentInput modalInput" style="width: 75%; height: 75px;" maxlength="200" type="text" name="credits" placeholder="  Descripción..." ><br>
  <br>

<div style="height: 210px;">
<label class="modalLabel">
  <h5>
    Categoria
  </h5>
</label>
<br>

<input type="radio" id="male" name="categoria" value="divertido">
<label for="divertido">Divertido</label><br>
<input type="radio" id="other" name="categoria" value="juegos">
<label for="juegos">Juegos</label><br>
<input type="radio" id="other" name="categoria" value="nsfw">
<label for="nsfw">NSFW</label><br>
<input type="radio" id="other" name="categoria" value="animales">
<label for="animales">Animales</label><br>
<input type="radio" id="other" name="categoria" value="fracasos">
<label for="fracasos">Fracasos</label><br>
<input type="radio" id="other" name="categoria" value="exitos">
<label for="exitos">Exitos</label><br>
</div>

    <input type="submit" name="submit" value="Subir" class='btn btn-lg btn-block'>
</div> 
<!-- category select -->

</form>
</div>
<!-- FOOTER -->
    
<footer id="sticky-footer" style="margin-top: 200px;" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
       
      <a class="nav-link" href="nosotros.php">Sobre Nosotros</a>
      
      <small>Copyright&copy; memedone.com</small>
      
    </div>
  </footer>
  <script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>

