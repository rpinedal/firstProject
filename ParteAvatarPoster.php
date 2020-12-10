<?php 


            
            
            
           
if ($avatar) {
?>
<!-- Profile Pic-->
<a href="otherPerfil.php?op=<?php echo $userID ?>" target="_blank" style="text-decoration: none;">
    <picture class="avatarPoster">
    <source class="avatarPoster" srcset="<?php echo $avatarSpace ?>" type="image/webp" alt="Meme">
    <source class="avatarPoster" srcset="<?php echo $avatarSpace ?>" type="image/png" alt="Meme"> 
    <img class="avatarPoster" src="<?php echo $avatarSpace ?>" alt="Meme" srcset="<?php echo $avatarSpace ?>" style="margin: 0px 0px 0px 0px; width: 35px; height: 36px; display: inline-block"> 
  </picture> 
</a>
<?php } else { ?>
  <!-- DEFAULT -->
<a href="otherPerfil.php?op=<?php echo $userID ?>" target="_blank" style="text-decoration: none;">
    <picture class="avatarPoster">
    <source class="avatarPoster" srcset="<?php echo $default ?>" type="image/webp" alt="Meme">
    <source class="avatarPoster" srcset="<?php echo $default ?>" type="image/png" alt="Meme"> 
    <img class="avatarPoster" src="<?php echo $default ?>" alt="default avatar" srcset="<?php echo $default ?>" style="margin: 0px 0px 0px 0px; width: 35px; height: 36px; display: inline-block;"> 
  </picture> 
</a>
    <?php

}  ?>