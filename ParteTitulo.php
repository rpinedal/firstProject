 <?php
      if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == $postedBY or $_SESSION['username'] == "Admin" ) {  
      ?>
<!--  DELETE  -->
          <div style="padding:0px;" id="delete<?php echo $imageID ?>">
            <a href="">
              <span style="color:red; float: right;" onclick="forDelete(<?php echo $imageID ?>, <?php echo $userID ?>)" >
                  Eliminar
              </span>
            </a>
          </div>

      <?php } } ?>

<?php 
if ($imageTitle) { ?>
  <h1 class="card-title">
    <?php echo $imageTitle ?>
  </h1>
<?php  } else { ?>
    <h5 class="card-title" hidden>
    Meme <?php echo $category ?>
  </h5>
  <?php
}
  ?>
<!--  *TITLE  -->

<!--  SUBIDO POR (USER)  -->
<span class="CPcommentBy">
  <?php include 'ParteAvatarPoster.php'; ?>
    <a href="otherPerfil.php?op=<?php echo $userID ?>" target="_blank">
      <strong class="postedby">
         <?php echo $postedBY ?>
      </strong> 
    </a>
</span>
