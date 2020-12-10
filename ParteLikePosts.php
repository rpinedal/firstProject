<?php
if(isset($_SESSION['username'])) {
 $cromUserQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
                    $runCromQuery = mysqli_fetch_assoc(mysqli_query($db, $cromUserQuery));
                    $LoginID = mysqli_real_escape_string($db, $runCromQuery['user_id']);
              $cromQuery = "SELECT * FROM rating_info WHERE user_id = $LoginID AND post_id = $imageID";
                    $runRow = mysqli_fetch_assoc(mysqli_query($db, $cromQuery));
                    if ($runRow) {
                    $ratingStatus = mysqli_real_escape_string($db, $runRow['rating_action']);
                    } else {
                      $ratingStatus = false;
                    }
        
  if ($ratingStatus == 'like') {  
   ?>
  
   <!-- LIKED-->
<div style="text-align:center;">

    <a role="button" id="comentar<?php echo $imageID ?>" onclick="openModal(<?php echo $imageID ?>)">
      <li class="fa fa-comments commentsButton" ></li>
    </a>

  <span id="clickedLike<?php echo $imageID ?>" onclick="dislike(<?php echo $imageID ?>,<?php echo $userID ?>)" >
      <i class="fa fa-heart liked" id="ilike<?php echo $imageID ?>"></i>
  </span>

    <span id="like<?php echo $imageID ?>" class="points" >
      <?php echo $totalLikes ?> Fama
    </span>

</div>
<br>
<?php 
  } else if ($ratingStatus == 'dislike' || !$ratingStatus) { ?>
  <!-- NOT LIKED -->
<div style="text-align:center;">

    <a role="button" id="comentar<?php echo $imageID ?>" onclick="openModal(<?php echo $imageID ?>)">
      <li class="fa fa-comments commentsButton" ></li>
    </a>

  <span id="clickedLike<?php echo $imageID ?>" onclick="like(<?php echo $imageID ?>,<?php echo $userID ?>)" >
      <i class="fa fa-heart notLiked" id="ilike<?php echo $imageID ?>"></i>
  </span>

    <span id="like<?php echo $imageID ?>" class="points" >
      <?php echo $totalLikes ?> Fama
    </span>

</div>
<br>

<?php }

} else { ?>  <!-- NO ESTA CONECTADO -->



<div style="text-align:center;">

    <a role="button" id="comentar<?php echo $imageID ?>" onclick="openModal(<?php echo $imageID ?>)">
      <li class="fa fa-comments commentsButton" ></li>
    </a>

  <span id="clickedLike<?php echo $imageID ?>" onclick="loginNeeded(<?php echo $imageID ?>,<?php echo $userID ?>)" >
      <i class="fa fa-heart notLiked" id="ilike<?php echo $imageID ?>"></i>
  </span>

    <span id="like<?php echo $imageID ?>" class="points" >
      <?php echo $totalLikes ?> Fama
    </span>

</div>
<br>
 
<?php } ?>