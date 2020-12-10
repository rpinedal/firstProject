<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar Contraseña</title>
    <meta name="description" content="Memedone es el hogar de la diversion, el lugar indicado para compartir memes y contenido divertido con el mundo."/>
    
    <meta name="keywords" content="memes,meme,chistoso,imagenes chistosas, diversion, entretenimiento, Memedone, Memedone.com,chistosos,chistoso, en espanol,en espa単ol,espanol,espa単ol,latino">
    
    <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>
    
     

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/main.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158039347-1"></script> 
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-158039347-1');
    </script>
</head>
<body>
<?php 
session_start();
include 'Menu/indexMenu.php'; 
include 'Database/dbConnect.php';
$oldPass = mysqli_real_escape_string($db, $_GET['QtXPssd']);
$passEmail = mysqli_real_escape_string($db, $_GET['nNchE']);
$endQuery = "SELECT * FROM users WHERE BINARY email = '".$passEmail."' AND password = '".$oldPass."'";
$runQuery = mysqli_fetch_assoc(mysqli_query($db, $endQuery));
$userEmailId = mysqli_real_escape_string($db, $runQuery['user_id']);




include 'ParteRecoverPassword.php';

?>


<script type="text/javascript" src="scripts/navBar.js">
</script>
    <script type="text/javascript" src="scripts/passwordchange.js"></script>
</body>
</html>