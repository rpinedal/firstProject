<?php

    $pageno = $_POST['pageno'];

    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    include 'Database/dbConnect.php';
    
    $adcounter = 0;
    $directory = '';
    $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $iMac    = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
    $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
      if ($iPod || $iPhone || $iPad || $iMac) {
      $sql = "SELECT * FROM apple LIMIT $offset, $no_of_records_per_page"; 
      $directory = 'apple/';
    } else {    
      $sql = "SELECT * FROM images LIMIT $offset, $no_of_records_per_page";
      $directory = 'uploads/';
    }

    
    $res_data = mysqli_query($db,$sql);

    while($row = mysqli_fetch_array($res_data)){
        $imageURL = mysqli_escape_string($db, $directory.$row["text"]);
                $imageTitle = mysqli_escape_string($db, $row["title"] );
                $imageID = mysqli_escape_string($db, $row["id"]);
                $imageUploaderId = mysqli_escape_string($db, $row["uploader_id"]);
                $totalLikes = mysqli_escape_string($db, $row['like_num']);
                $totalDislikes = mysqli_escape_string($db, $row['dislike_num']);
                $fileType = mime_content_type($imageURL);
                $category = mysqli_escape_string($db, $row['Category']);
                $date = mysqli_escape_string($db, $row['date']);
$creditos = mysqli_escape_string($db, $row['creditos']);
            $userQuery = "SELECT * FROM users WHERE user_id = '".$imageUploaderId."' ";
                    $rowU = mysqli_fetch_assoc(mysqli_query($db, $userQuery));
                    $userID = mysqli_escape_string($db, $rowU['user_id']);
                    $postedBY = mysqli_escape_string($db, $rowU['username']);
                    $numberTabs = 0;
                    $mdusername = md5($postedBY);

        include 'ParteTitulo.php'; // Titulo de la imagen, Subido Por y DELETE POST
  include 'ParteSeguir.php';  // Proceso de SEGUIR
  
  include 'ParteImagen.php'; // Contenido del POST - VIDEO, IMG, GIF
  include 'ParteCredits.php'; // Creditos
  include 'ParteModal.php'; // MODAL CON BOTON COMENTARIOS Y LIKES
  include 'ParteLikePosts.php'; // Likes de POST
  // include 'ParteAvatarUser.php'; ESTO ESTA DENTRO DE PARTECOMETNAR.PHP
  // include 'ParteAvatarUser.php'; ESTO ESTA DENTRO DE PARTE TITULO.PHP
  include 'ParteComentar.php'; // Comentarios

    }

    mysqli_close($db);

?>