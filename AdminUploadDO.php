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
  <title>Admin - Subir</title>
  <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png">
  </link>





  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menucss.css">
  <link rel="stylesheet" href="css/main.css">

</head>


<body>
  <?php include 'Menu/indexMenu.php'; ?>
  <?php include 'Database/dbConnect.php'; ?>
  <div class="container">
    <div class="header">
      <h1 class="postedby">Subir Contenido</h1>
    </div>
    <form class="content2" action="AdminUploadLogic.php" method="post" enctype="multipart/form-data"
      placeholder="Buscar..">
      <div>
        <p class="elseErrorIndex" style="padding-top:0px;">Puede subir <strong class="postedby">Fotos, Videos y
            GIFs</strong><br>
          *un maximo de 4mb por archivo.
        </p>
      </div>
      <br>


      <div>
        <label>
          <h5><strong style="color:red;">*</strong>Seleccionar Archivo:</h5>
        </label><br>

        <label for="choosefile" class="custom-file-upload">
          <i class="fa fa-cloud-upload"></i> Buscar Imagen
        </label>
        <input id="choosefile" type="file" name="file[]" multiple /><br><br><br>

      </div>

      <div>
        <label>
          <h5>Titulo: </h5>
        </label><br>
        <input style="width: 75%;" maxlength="45" type="text" name="title" placeholder="  Titulo..."><br><br>
        <br>
        <br>
        <br>
        <br>

        <label class="">
          <h5>
            Descripción
          </h5>
        </label>
        <br>

        <input class="CommentInput modalInput" style="width: 75%; height: 75px;" maxlength="200" type="text"
          name="credits" placeholder="  Descripción..."><br>
        <br>
        <br><br>
        <div style="height: 210px;">
          <label>
            <h5>Selecciona un USUARIO:</h5>
          </label><br>
          <input type="radio" id="male" name="user" value="Xirio">
          <label for="Xirio">Xirio</label><br>
          <input type="radio" id="other" name="user" value="Yubaz">
          <label for="Yubaz">Yubaz</label><br>
          <input type="radio" id="other" name="user" value="SoloMemes">
          <label for="SoloMemes">SoloMemes</label><br>
          <input type="radio" id="other" name="user" value="SamsungS99">
          <label for="SamsungS99">SamsungS99</label><br>
          <input type="radio" id="other" name="user" value="Applewash">
          <label for="Applewash">Applewash</label><br>
          <input type="radio" id="other" name="user" value="Dipper">
          <label for="Dipper">Dipper</label><br>
          <input type="radio" id="other" name="user" value="MemeMasterOver9000">
          <label for="MemeMasterOver9000">MemeMasterOver9000</label><br>
          <input type="radio" id="other" name="user" value="Tillman">
          <label for="Tillman">Tillman</label><br>
          <input type="radio" id="other" name="user" value="DiHoliwudpper">
          <label for="Holiwud">Holiwud</label><br>
          <input type="radio" id="other" name="user" value="Memesongo">
          <label for="Memesongo">Memesongo</label><br>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="height: 210px;">
          <label>
            <h5>Selecciona una categoria:</h5>
          </label><br>
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