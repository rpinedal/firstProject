<!DOCTYPE HTML>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<!-- DOC META -->  
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- TAB TITLE -->
    <title>Memedone Memes</title>

<!-- META DATA -->
    <meta name="description" content="El lugar indicado para compartir y encontrar memes ."/>
    <meta name="keywords" content="memes">

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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158039347-1"></script>
 <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158039347-1');
</script> 
<!-- ADSENSE -->

<script data-ad-client="ca-pub-3187893082972835" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
</head>

<body>
<!-- MENU / DATABASE INCLUDE -->
<?php
include 'Database/dbConnect.php';
  session_start();
    

 
        if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['username']);
          unset($_SESSION['id']);
          header("location: index.php");
        }
        include 'Menu/indexMenu.php'; 
        
        ?>
        
        <?php
        include 'Menu/sideBar.php'; 
        include 'Menu/sideBarRight.php';  
?>







  

<div class="container container2">
  <div class="results">



  </div>
  <p class='CPcommentBy' style="text-align: center; margin-top: 10px;">Cargando Contenido...</p>

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
  var limit = 10;
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
      url: 'DataMemes.php',
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
