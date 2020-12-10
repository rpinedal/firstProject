
<!-- The Modal de Comentarios -->
<div id="myModal<?php echo $imageID ?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  
    <h1 style="text-align: center;">Comentarios</h1>
        
<br>
<div id="comments<?php echo $imageID ?>"></div>
    
    <?php include 'LIKES/commentPageCommentLike.php';
echo $responseC;
?>
  </div>
<div id="comments<?php echo $imageID ?>"></div>
</div>
<!-- MODAL ENDING -->



<!-- The Modal de LOGIN -->

<div id="LoginModal<?php echo $imageID ?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <?php include 'ParteLogIn.php'; ?>
        
  </div>
</div>
<!-- MODAL ENDING -->