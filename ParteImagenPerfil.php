<?php
$imgArray = array('image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image');
$vidArray = array('video/mp4', 'video/webm', 'video');

if (in_array($fileType, $imgArray)) { ?> <!-- IMAGENES -->

  <a href="commentPage.php?id=<?php echo $imageID ?>" target="_blank">
      <picture class="figure">
        <source  srcset="<?php echo $imageURL ?>" type="image/webp" alt="Meme">
        <source  srcset="<?php echo $imageURL ?>" type="image/jpeg" alt="Meme">
        <img  src="<?php echo $imageURL ?>" alt="Meme">
      </picture>
  </a>

  <?php } else if (in_array($fileType, $vidArray)) { ?>  <!-- VIDEOS -->

  <video class="figure" controls alt="Meme" >
    <source src="<?php echo $imageURL ?>" type="video/mp4" >
    <source src="<?php echo $imageURL ?>" type="video/webm" >
  </video>

  <?php } ?>