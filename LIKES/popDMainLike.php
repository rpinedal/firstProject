<?php
if (isset($_SESSION['username'])) {
 $cromUserQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."' ";
                    $runCromQuery = mysqli_fetch_assoc(mysqli_query($db, $cromUserQuery));
                    $LoginID = mysqli_escape_string($db, $runCromQuery['user_id']);
              $cromQuery = "SELECT * FROM rating_info WHERE user_id = $LoginID AND post_id = $imageID";
                    $runRow = mysqli_fetch_assoc(mysqli_query($db, $cromQuery));
                    if ($runRow) {
                    $ratingStatus = mysqli_escape_string($db, $runRow['rating_action']);
                    
        if ($ratingStatus) {
            if ($ratingStatus == "like") { 
    // LIKED

   ?>
   <!--  LIKE 1 -->
<span id="clickedLike<?php echo $imageID ?>" onclick="likeTwo(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="lkd<?php echo $imageID ?>" src="PIconv2.png" style="width: 45px; height: 45px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->

<span id="clickedDislike<?php echo $imageID ?>" onclick="dislikeTwo(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="dlkd<?php echo $imageID ?>" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like<?php echo $imageID ?>" class="points" >
    <?php echo $totalLikes ?>
  </span>
<br>
<br>
<!--  *PUNTOS  -->
 <?php

  } else if ($ratingStatus == "dislike") { 
    // DISLIKED
    ?>
    <!--  LIKE 2 -->
<span id="clickedLike<?php echo $imageID ?>" onclick="likeTwo(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="lkd<?php echo $imageID ?>" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedDislike<?php echo $imageID ?>" onclick="dislikeTwo(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="dlkd<?php echo $imageID ?>" src="DIconv2.png" style="width: 45px; height: 45px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like<?php echo $imageID ?>" class="points" >
    <?php echo $totalLikes ?>
  </span>
<br>
<br>
<!--  *PUNTOS  -->
 <?php
} } }  else if (!$runRow or !isset($_SESSION['username'])) {
?>

<!--  LIKE 3 -->
<span id="clickedLike<?php echo $imageID ?>" onclick="like(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="lkd<?php echo $imageID ?>" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->

<span id="clickedDislike<?php echo $imageID ?>" onclick="dislike(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="dlkd<?php echo $imageID ?>" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like<?php echo $imageID ?>" class="points" >
    <?php echo $totalLikes ?>
  </span>
<br>
<br>
<!--  *PUNTOS  -->
<?php
} } else {
?>
<!--  LIKE 4 -->
<span id="clickedLike<?php echo $imageID ?>" onclick="like(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="lkd<?php echo $imageID ?>" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedDislike<?php echo $imageID ?>" onclick="dislike(<?php echo $imageID ?>, <?php echo $userID ?>)" >
  &nbsp;&nbsp; 
    <img id="dlkd<?php echo $imageID ?>" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like<?php echo $imageID ?>" class="points" >
    <?php echo $totalLikes ?>
  </span>
<br>
<br>
<?php }  ?>