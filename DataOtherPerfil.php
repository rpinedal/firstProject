<?php 
session_start();
 
    if (isset($_POST['getData'])) {
      
    include 'Database/dbConnect.php';
    $start = $db->real_escape_string($_POST['start']);
    $limit = $db->real_escape_string($_POST['limit']);
    $id = mysqli_real_escape_string($db, $_POST['uId']);

$directory = '';
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$iMac    = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
      if ($iPod || $iPhone || $iPad) {
      $sql = $db->query("SELECT * FROM apple, users WHERE uploader_id = $id AND user_id = $id ORDER BY uploaded_on DESC LIMIT $start, $limit"); 
      $directory = 'apple/';
    } else {    
      $sql = $db->query("SELECT * FROM images, users WHERE uploader_id = $id AND user_id = $id ORDER BY uploaded_on DESC LIMIT $start, $limit");
      $directory = 'uploads/';
    }

        if ($sql->num_rows > 0) {
          $response = "";

            while ($row = $sql->fetch_array()) {
                $imageURL = mysqli_real_escape_string($db, $directory.$row["text"]);
            $imageTitle = mysqli_real_escape_string($db, $row["title"] );
            $imageID = mysqli_real_escape_string($db, $row["id"]);
            $userID = mysqli_real_escape_string($db, $row['user_id']);
            $totalLikes = mysqli_real_escape_string($db, $row['like_num']);
            $totalDislikes = mysqli_real_escape_string($db, $row ['dislike_num']);
            $postedBY = mysqli_real_escape_string($db, $row ['username']);
            
            $numberTabs = 0;
            $mdusername = md5($postedBY); 
            $creditos = mysqli_real_escape_string($db, $row['creditos']);
if (file_exists($imageURL)){
  
            $fileType = mime_content_type($imageURL);
            
  
            ?>
<?php
 
  
  include 'ParteImagenPerfil.php'; // Contenido del POST - VIDEO, IMG, GIF
  
?>
<?php

        } 
      } 
      
    } else {
      echo '<p class="CPcommentBy" style="text-align: center; margin-top: 10px;"> No hay mas Contenido.</p>'; 
    
    } 
}
          
?>
     