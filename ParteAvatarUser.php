<?php 

include 'Database/dbConnect.php';
$perfilQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
            $processQuery = mysqli_fetch_assoc(mysqli_query($db, $perfilQuery));
            $avatar = mysqli_real_escape_string($db, $processQuery['Avatar']);
            $avatarSpace = 'Avatars/'.$avatar;
            $default = 'Avatars/default-avatarPNG.png';
             $username = md5($_SESSION['username']);
if ($avatar) {
?>
<a href="perfil.php?op=<?php echo $username; ?>" target="_blank" style="text-decoration: none;">
    <picture class="avatar">
    <source class="avatar" srcset="<?php echo $avatarSpace ?>" type="image/webp" alt="Meme">
    <source class="avatar" srcset="<?php echo $avatarSpace ?>" type="image/png" alt="Meme"> 
    <img class="avatar" src="<?php echo $avatarSpace ?>" alt="Meme" srcset="<?php echo $avatarSpace ?>" style="margin: 0px 0px 0px 0px; width: 38px; height: 38px; display: inline-block"> 
  </picture> 
</a>
<?php } else { ?>
<a href="perfil.php?op=<?php echo $username; ?>" target="_blank" style="text-decoration: none;">
    <picture class="avatar">
    <source class="avatar" srcset="<?php echo $default ?>" type="image/webp" alt="Meme">
    <source class="avatar" srcset="<?php echo $default ?>" type="image/png" alt="Meme"> 
    <img class="avatar" src="<?php echo $default ?>" alt="default avatar" srcset="<?php echo $default ?>" style="margin: 0px 0px 0px 0px; width: 38px; height: 38px; display: inline-block;"> 
  </picture> 
</a>
    <?php

}  ?>