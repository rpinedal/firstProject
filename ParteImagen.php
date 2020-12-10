<?php
$imgArray = array('image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image');
$vidArray = array('video/mp4', 'video/webm', 'video');

if (in_array($fileType, $imgArray)) { ?> <!-- IMAGENES -->

  <a href="commentPage.php?id=<?php echo $imageID ?>" target="_blank">
      <picture>
        <source srcset="<?php echo $imageURL ?>" type="image/webp" alt="Meme Categoria: <?php echo $category ?>">
        <source srcset="<?php echo $imageURL ?>" type="image/jpeg" alt="Meme Categoria: <?php echo $category ?>">
        <img src="<?php echo $imageURL ?>" alt="Meme Categoria: <?php echo $category ?>">
      </picture>
  </a>

  <?php } else if (in_array($fileType, $vidArray)) { ?>  <!-- VIDEOS -->

  <video class="mainVideo" controls alt="Meme Categoria: <?php echo $category ?>" >
    <source src="<?php echo $imageURL ?>" type="video/mp4" >
    <source src="<?php echo $imageURL ?>" type="video/webm" >
  </video>

  <?php } ?>