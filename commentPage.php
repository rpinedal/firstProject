<!DOCTYPE html>

<html lang="es" prefix="og: http://ogp.me/ns#">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <?php 
include 'Database/dbConnect.php';
    $imageID = mysqli_real_escape_string($db, $_GET['id']); 
    $sql2 = "SELECT * FROM images, users WHERE images.id = '".$imageID."' AND images.uploader_id = users.user_id LIMIT 1 ";
    $row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
    $imageURL = mysqli_real_escape_string($db,'uploads/'.$row["text"]);
    $imageTitle = mysqli_real_escape_string($db, $row["title"] );
    $imageID = mysqli_real_escape_string($db, $row["id"]);
    $totalLikes = mysqli_real_escape_string($db, $row['like_num']);
    $totalDislikes = mysqli_real_escape_string($db, $row ['dislike_num']);
    $postedBY = mysqli_real_escape_string($db, $row ['username']);
    $numberTabs = 0;
    $category = mysqli_real_escape_string($db, $row['Category']);

?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memedone - <?php echo $imageTitle; ?> Subido por <?php echo $postedBY ?> </title> 
    <meta name="description" content="Memedone el lugar indicado para compartir memes de <?php echo $category ?> y contenido de <?php echo $category ?> con el mundo."/>
    
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

<meta property="og:url"           content="commentPage.php?id=<?php echo $imageID; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Memedone - <?php echo $imageTitle; ?>" />

<meta property="og:video"
   content="<?php echo $imageURL; ?>" />

<meta property="og:video:type" 
   content="video/mp4" />

<meta property="og:video:width" content="300" />

<meta property="og:video:height" content="400" />


<meta property="og:image" content="<?php echo $imageURL; ?>" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="200" />
<meta property="og:image:alt" content="<?php echo $imageTitle; ?>" />


<!-- <script data-ad-client="ca-pub-3187893082972835" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

</head>
<body>


<?php
session_start();
include 'Database/dbConnect.php';
include 'Menu/indexMenu.php'; 

include 'Menu/sideBar.php'; 
include 'Menu/sideBarRight.php';

$imageID = mysqli_real_escape_string($db, $_GET['id']); 
    $sql2 = "SELECT * FROM images, users WHERE images.id = '".$imageID."' AND images.uploader_id = users.user_id LIMIT 1 ";
    $row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
    $imageURL = mysqli_real_escape_string($db,'uploads/'.$row["text"]);
    $imageTitle = mysqli_real_escape_string($db, $row["title"] );
    $imageID = mysqli_real_escape_string($db, $row["id"]);
    $totalLikes = mysqli_real_escape_string($db, $row['like_num']);
    $totalDislikes = mysqli_real_escape_string($db, $row ['dislike_num']);
    $postedBY = mysqli_real_escape_string($db, $row ['username']);
    $numberTabs = 0;
    $creditos = mysqli_real_escape_string($db, $row['creditos']);
    $fileType = mime_content_type($imageURL);
    $userID = mysqli_real_escape_string($db, $row['user_id']);
    $category = mysqli_real_escape_string($db, $row['Category']);
  $data = '';

  
$fileType = mime_content_type($imageURL);
?>

<section class="container container2" >

    <div class="row">
  <div class="topa"> 
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
<!-- Top de la Pagina -->
 <ins class="adsbygoogle"
     style="display:inline-block;width:720px;height:120px"
     data-ad-client="ca-pub-3187893082972835"
     data-ad-slot="1682233941"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
 </div> 
        <article class="col-sm-8">
           
            <div class="card-body">


<?php
  include 'ParteTitulo.php'; // Titulo de la imagen, Subido Por y DELETE POST
  include 'ParteSeguir.php';  // Proceso de SEGUIR
  
  include 'ParteImagen.php'; // Contenido del POST - VIDEO, IMG, GIF
  include 'ParteCredits.php'; // Creditos
  include 'ParteModal.php'; // MODAL CON BOTON COMENTARIOS Y LIKES
  include 'ParteLikePosts.php'; // Likes de POST
  include 'ParteComentarCP.php'; // Comentarios



 include 'LIKES/commentPageCommentLike.php';
echo $responseC;

?>



    </article>
  </div>
</section>

<!-- LIKE O DISLIKE -->






    
<script type="text/javascript" src="scripts/navBar.js">
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

</body>
</html>
