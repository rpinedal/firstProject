<?php 
session_start();
 include 'Database/dbConnect.php';
    if (isset($_POST['getData'])) {
      
       
    $start = $db->real_escape_string($_POST['start']);
    $limit = $db->real_escape_string($_POST['limit']);
    
        $getName = "SELECT * FROM follow WHERE BINARY followerName = '".$_SESSION['username']."'";
        
        $runGetName = mysqli_fetch_assoc(mysqli_query($db, $getName));
        if ($runGetName) {
        $followerID = mysqli_real_escape_string($db, $runGetName['followerID']);
        $directory = '';
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$iMac    = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
      if ($iPod || $iPhone || $iPad || $iMac) {
      $sql = $db->query("SELECT * FROM apple INNER JOIN follow ON follow.followID = apple.uploader_id WHERE follow.followerID = $followerID ORDER BY uploaded_on DESC LIMIT $start, $limit");
      $directory = 'apple/';
    } else {    
      $sql = $db->query("SELECT * FROM images INNER JOIN follow ON follow.followID = images.uploader_id WHERE follow.followerID = $followerID ORDER BY uploaded_on DESC LIMIT $start, $limit");
      $directory = 'uploads/';
    }

        
     
        if ($sql->num_rows > 0) {
          $response = "";
          $adcounter = 0;
            while ($row = $sql->fetch_array()) {
                $imageURL = mysqli_real_escape_string($db, $directory.$row["text"]);
                $imageTitle = mysqli_real_escape_string($db, $row["title"] );
                $imageID = mysqli_real_escape_string($db, $row["id"]);
                $imageUploaderId = mysqli_real_escape_string($db, $row["uploader_id"]);
                $totalLikes = mysqli_real_escape_string($db, $row['like_num']);
                $totalDislikes = mysqli_real_escape_string($db, $row['dislike_num']);
                $fileType = mime_content_type($imageURL);
                $date = mysqli_real_escape_string($db, $row['date']);
                $category = mysqli_real_escape_string($db, $row['Category']);
$creditos = mysqli_real_escape_string($db, $row['creditos']);
            $userQuery = "SELECT * FROM users WHERE user_id = '".$imageUploaderId."' ";
                    $rowU = mysqli_fetch_assoc(mysqli_query($db, $userQuery));
                    $userID = mysqli_real_escape_string($db, $rowU['user_id']);
                    $postedBY = mysqli_real_escape_string($db, $rowU['username']);
                    $numberTabs = 0;
                    $mdusername = md5($postedBY);
  
              ?>
<section>
  <div class="col-sm-8">
    <article class="card-body">

<?php
  include 'ParteTitulo.php'; // Titulo de la imagen, Subido Por y DELETE POST
  include 'ParteSeguir.php';  // Proceso de SEGUIR
 // include 'ParteCategoria.php'; // PARTE Categoria
  include 'ParteImagen.php'; // Contenido del POST - VIDEO, IMG, GIF
  include 'ParteCredits.php'; // Creditos
  include 'ParteModal.php'; // MODAL CON BOTON COMENTARIOS Y LIKES
  include 'ParteLikePosts.php'; // Likes de POST
  include 'ParteComentar.php'; // Comentarios
?>

    </article>
  </div>
</section>
  

<br>  


<div>
  <?php
  $adcounter++;
  if ($adcounter == 6) { $adcounter = 0; ?>
  <section>
      <div class="col-sm-8" style="height: auto; width: auto">
        <article class="card-body">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6q+ek+16-3w+4d"
     data-ad-client="ca-pub-3187893082972835"
     data-ad-slot="1609320982"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
      </article>
    </div>
  </section>
  <?php } ?>
</div>


<?php

        }
      } 
    } else {
      echo '<p class="CPcommentBy" style="text-align: center; margin-top: 10px;"> No hay mas Contenido para esta Categoria!</p>'; 
    }
  }
          
?>