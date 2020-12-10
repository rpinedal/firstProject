<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memedone Mi Perfil</title>
    <meta name="description" content="Memedone es el hogar de la diversion, el lugar indicado para compartir memes y contenido divertido con el mundo."/>
    <meta name="keywords" content="memes, meme, chistoso, imagenes chistosas, diversion, entretenimiento, Memedone, Memedone.com, en español, meme gracioso, meme gato, meme del gato, memes de amor, memes 2019, memes 2020">
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


include 'Database/dbConnect.php';
session_start();
include 'Menu/indexMenu.php'; 

if (isset($_SESSION['username'])) {
    $linkmd = mysqli_real_escape_string($db, $_GET['op']);
    $mduser = md5($_SESSION['username']);
    if ($linkmd == $mduser) {
            
        $perfilQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
            $processQuery = mysqli_fetch_assoc(mysqli_query($db, $perfilQuery));
            $name = mysqli_real_escape_string($db, $processQuery['username']);
            $id = mysqli_real_escape_string($db, $processQuery['user_id']);
            $email = mysqli_real_escape_string($db, $processQuery['email']);
            $avatar = mysqli_real_escape_string($db, $processQuery['Avatar']);
            $avatarSpace = 'Avatars/'.$avatar;
        $queryTot = "SELECT count(text) AS POSTS FROM `images` WHERE uploader_id = $id";
            $runTot = mysqli_fetch_assoc(mysqli_query($db, $queryTot));
            $postNum = mysqli_real_escape_string($db, $runTot['POSTS']);
        $queryPuntos = "SELECT SUM(like_num) AS SCORE FROM images WHERE uploader_id = $id";
            $runPuntos = mysqli_fetch_assoc(mysqli_query($db, $queryPuntos));
            $totalPoints = mysqli_real_escape_string($db, $runPuntos['SCORE']);
            $userID = mysqli_real_escape_string($db, $processQuery['user_id']);
            $userEmailId = mysqli_real_escape_string($db, $processQuery['user_id']);
        $querySeguidores = "SELECT count(followID) AS TOTALFOLLOW FROM follow WHERE followID = $id";
            $runSeguidores = mysqli_fetch_assoc(mysqli_query($db, $querySeguidores));
            $totalSeguidores = mysqli_real_escape_string($db, $runSeguidores['TOTALFOLLOW']);
        $querySiguiendo = "SELECT count(followerID) AS TOTALFOLLOWING FROM follow WHERE followerID = $id";
            $runSiguiendo = mysqli_fetch_assoc(mysqli_query($db, $querySiguiendo));
            $totalSiguiendo = mysqli_real_escape_string($db, $runSiguiendo['TOTALFOLLOWING']);
        $defaultAvatar = 'Avatars/default-avatarPNG.png';

        ?>

<div class="container contentPerf topdiv" >
<?php if ($avatar) { ?>
  <picture class="avatar">
    <source class="avatar" srcset="<?php echo $avatarSpace ?>" type="image/webp" alt="Meme">
    <source class="avatar" srcset="<?php echo $avatarSpace ?>" type="image/png" alt="Meme"> 
    <img class="avatar" src="<?php echo $avatarSpace ?>" alt="Meme" srcset="<?php echo $avatarSpace ?>" style="margin-top: 0px; padding: 2px;"> 
  </picture>
  <br>
  
 <?php } else { ?>
 <picture class="avatar">
    <source class="avatar" srcset="<?php echo $defaultAvatar ?>" type="image/webp" alt="Meme">
    <source class="avatar" srcset="<?php echo $defaultAvatar ?>" type="image/png" alt="Meme"> 
    <img class="avatar" src="<?php echo $defaultAvatar ?>" alt="Meme" srcset="<?php echo $defaultAvatar ?>" style="margin-top: 0px; padding: 2px;"> 
  </picture>
  
 
 <?php }
 ?> 
<div class="" style="border-left: 1px solid grey; padding-left: 15px; margin-left: 6px;">

    <h1 class="perfilName"><strong class="postedby" id="newCover"><?php echo $name ?></strong></h1>
    <h5 class="CPcommentBy"><?php echo $email ?></h5>
    <h5 class="CPcommentBy"> <strong class="postedby"><?php echo $totalSeguidores ?></strong> Seguidores</h5>
    <h5 class="CPcommentBy"> <strong class="postedby"><?php echo $totalSiguiendo ?></strong> Siguiendo</h5>
    <h5 class="CPcommentBy"> <strong class="postedby"><?php echo $postNum ?></strong> Publicaciones </h5>
    
 <?php   if ($totalPoints > 0) { ?>
    <h5 class="CPcommentBy"> <strong class="postedby"><?php echo $totalPoints ?></strong> Fama</h5>
 <?php } else { ?>
    <h5 class="CPcommentBy"> <strong class="postedby">0</strong> Fama</h5>
 <?php } ?>
<br>
    <h7>
      <a onclick="Editar(<?php echo $userID ?>)" style="text-decoration: none;">
        <strong class="F1">
          Editar Perfil
        </strong>
      </a>
    </h7>
    
  </div>
</div>
 

<div class="container">
  <div class="row">
    <div class="results">
    
    </div>
  </div>
</div>

 <?php include 'ParteModalPerfiles.php'; ?>

 <script type="text/javascript" src="scripts/EditProfile.js">
</script>
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
<script type="text/javascript" src="scripts/passwordchange.js"></script>
<script type="text/javascript">

function nospaces(t){

if(t.value.match(/\s/g)){

alert('Lo sentimos, no puede usar espacios en esta parte.');

t.value=t.value.replace(/\s/g,'');

}

}

</script>



<script type='text/javascript'>
  var start = 0;
  var limit = 9;
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
      url: 'DataPerfil.php',
      method: 'POST',
      dataType: "text",
      data: {
        getData: 1,
        start: start,
        limit: limit,
        <?php echo "uId:'{$userID}'"; ?>
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
<?php } 
} 
 ?>
</html>