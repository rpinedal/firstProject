<!DOCTYPE HTML>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<!-- DOC META -->  
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- TAB TITLE -->
    <title>Memedone Mis Subscripciones</title>

<!-- META DATA -->
    <meta name="description" content="Memedone es el hogar de la diversion, el lugar indicado para compartir memes y contenido divertido con el mundo."/>
    <meta name="keywords" content="memes, meme, chistoso, imagenes chistosas, diversion, entretenimiento, Memedone, Memedone.com, en español, meme gracioso, meme gato, meme del gato, memes de amor, memes 2019, memes 2020">

<!-- TAB ICON -->
    <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>

<!-- SCRIPTS -->
    
    
    
<!-- STYLE LINKS -->    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/main.css">
    
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158039347-1"></script>
 <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158039347-1');
</script>

</head>

<body>
<!-- MENU / DATABASE INCLUDE -->
<?php
include 'Database/dbConnect.php';
  session_start();
    include 'Menu/indexMenu.php'; 
    include 'Menu/sideBar.php'; 

        if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['username']);
          unset($_SESSION['id']);
          header("location: index.php");
        }
?>

<h1 hidden>
  Memedone Beta v1.4
</h1>
  

<div class="container container2">
  <div class="results">



  </div>
    

</div>
<br>
     
   
    

<script type="text/javascript" src="scripts/likeControl.js">
</script>
<script type="text/javascript" src="scripts/delete.js">
</script>
<script type="text/javascript" src="scripts/F1Control.js">
</script>
<script type="text/javascript" src="scripts/commentControl.js">
</script>
<script type="text/javascript" src="scripts/jQuery.js">
</script>
<script type="text/javascript" src="scripts/modalControl.js">
</script>
<script type="text/javascript" src="scripts/navBar.js">
</script>


<script type='text/javascript'>
  var start = 0;
  var limit = 11;
  var reachedMax = false;

        $(window).scroll(function() {
          if ($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight)
          getData();
        });

  $(document).ready(function() {
    getData();
  });

  function getData() {
    
  
    $.ajax ({
      url: 'DataMismemes.php',
      method: 'POST',
      dataType: "text",
      data: {
        getData: 1,
        start: start,
        limit: limit

      }, 
      success: function(response) {
        if (response == "reachedMax") 
          reachedMax = true;
        else {
          start += limit;
          $(".results").append(response);
        }
      }
    });
  }
</script>

</body>
</html>
