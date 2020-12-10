<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- TITLE -->
    <title>Memedone - Highscores</title> 
<!-- META -->
<meta name="description" content="Los mejores creadores de memes. Top 13"/>
<meta name="keywords" content="memes,meme,chistoso,imagenes chistosas, diversion, entretenimiento, Memedone, Memedone.com,chistosos,chistoso, en espanol,en espa単ol,espanol,espa単ol,latino">

<!-- LINKS -->
<link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/menucss.css">
<link rel="stylesheet" href="css/main.css">
<!-- <script data-ad-client="ca-pub-3187893082972835" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Global site tag -->
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
include "Database/dbConnect.php";
session_start();
include "Menu/indexMenu.php";
?>

<div class="container">

<br><br><br><br>
<h1 class="h1HqResp">Highscores - Top 13</h1>
<p class="hqscores">*la suma de los <strong class="postedby">Me Gusta</strong> de todos los memes subidos por cada <strong class="postedby";>Usuario.</strong></p>
<br><br>    
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Rango</th>
      <th scope="col">Usuario</th>
      <th scope="col">Fama</th>
    </tr>
  </thead>
  <tbody>

<?php
$rank = 1;
$queryHQ = $db-> query('SELECT users.user_id, users.username, images.uploader_id, SUM(images.like_num) AS SCORE FROM users, images WHERE users.user_id = images.uploader_id GROUP BY BINARY users.username ORDER BY SCORE DESC LIMIT 13');
if($queryHQ->num_rows > 0){
  while($rowHQ = $queryHQ->fetch_assoc()){
    $score = mysqli_real_escape_string($db, $rowHQ['SCORE']);
     $username = mysqli_real_escape_string($db, $rowHQ['username']);
?>

    <tr>
    <?php if ($rank <= 3) { ?>
      <th scope="row" class="postedby"><strong class="postedby"><?php echo $rank; ?></strong></th>
      <td class="postedby"><strong class="postedby"><?php echo $username; ?></strong></td>
      <td class="postedby"><strong class="postedby"><?php echo $score; ?></strong></td>
    <?php } else {?>
      <th scope="row"><?php echo $rank; ?></th>
      <td><?php echo $username; ?></td>
      <td><?php echo $score; ?></td>
    <?php } ?>
    </tr>
  

  <?php 
  $rank = $rank + 1;
   }
     } ?>
</tbody>
</table>
</div>

<footer id="sticky-footer" style="margin-top: 80px;" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
       
      <a class="nav-link" href="nosotros.php">Sobre Nosotros</a>
      
      <small>Copyright&copy; memedone.com</small>
      
    </div>
  </footer>
<script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>