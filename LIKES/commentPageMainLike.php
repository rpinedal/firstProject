<?php
 $response = "";
if (isset($_SESSION['username'])) {
 $cromUserQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."' ";

                    $runCromQuery = mysqli_fetch_assoc(mysqli_query($db, $cromUserQuery));
                    $LoginID = mysqli_real_escape_string($db, $runCromQuery['user_id']);
              $cromQuery = "SELECT * FROM rating_info WHERE user_id = $LoginID AND post_id = $imageID";
                    $runRow = mysqli_fetch_assoc(mysqli_query($db, $cromQuery));
                    if ($runRow) {
                    $ratingStatus = mysqli_real_escape_string($db, $runRow['rating_action']);
                    
        if ($ratingStatus) {
            if ($ratingStatus == "like") { 
    // LIKED

   $response .= '
   <!--  LIKE 1 -->
<span id="clickedLike'.$imageID.'" onclick="likeTwo('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="lkd'.$imageID.'" src="PIconv2.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->

<span id="clickedDislike'.$imageID.'" onclick="dislikeTwo('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="dlkd'.$imageID.'" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like'.$imageID.'" class="points" >
    '.$totalLikes.' 
  </span>
<br>
<br>
<!--  *PUNTOS  -->
'; 

  } else if ($ratingStatus == "dislike") { 
    // DISLIKED
    $response .= '
    <!--  LIKE 2 -->
<span id="clickedLike'.$imageID.'" onclick="likeTwo('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="lkd'.$imageID.'" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedDislike'.$imageID.'" onclick="dislikeTwo('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="dlkd'.$imageID.'" src="DIconv2.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like'.$imageID.'" class="points" >
    '.$totalLikes.' 
  </span>
<br>
<br>
<!--  *PUNTOS  -->
'; 
} } }  else if (!$runRow or !isset($_SESSION['username'])) {

$response .= '
<!--  LIKE 3 -->
<span id="clickedLike'.$imageID.'" onclick="like('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="lkd'.$imageID.'" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->

<span id="clickedDislike'.$imageID.'" onclick="dislike('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="dlkd'.$imageID.'" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like'.$imageID.'" class="points" >
    '.$totalLikes.' 
  </span>
<br>
<br>
<!--  *PUNTOS  -->';
} } else {
$response .= '
<!--  LIKE 4 -->
<span id="clickedLike'.$imageID.'" onclick="like('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="lkd'.$imageID.'" src="likeidle.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedDislike'.$imageID.'" onclick="dislike('.$imageID.', '.$userID.')" >
  &nbsp;&nbsp; 
    <img id="dlkd'.$imageID.'" src="dislikeIDLE.png" style="width: 25px; height: 25px; padding: 0px; margin: 0px;display: inline">
  &nbsp;&nbsp;
</span>
<!--  *LIKE O DISLIKE  -->

<!--  PUNTOS  -->
<span class="pointsO">
  Fama: 
</span>
  <span id="like'.$imageID.'" class="points" >
    '.$totalLikes.' 
  </span>
<br>
<br>
<!--  *PUNTOS  -->' ; }