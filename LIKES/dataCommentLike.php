<?php
$commentQuery = $db->query("SELECT * FROM comment WHERE image_pid = $imageID ORDER BY date DESC LIMIT 3");
if($commentQuery->num_rows > 0){
  while($rowC = $commentQuery->fetch_assoc()){
    $date = mysqli_real_escape_string($db, $rowC["date"]);
     $postID = mysqli_real_escape_string($db, $rowC["image_pid"]);
       $comments = mysqli_real_escape_string($db, $rowC["comment"]);
         $commentedBy = mysqli_real_escape_string($db, $rowC["sender"]);
           $numberTabs = $numberTabs + 1;
          $comID = mysqli_real_escape_string($db, $rowC['id']);
          $commentLike = mysqli_real_escape_string($db, $rowC['comlike']);
          
$response .= '           
<div class="container">  
        <div class="indexcard spaces'.$numberTabs.'">
          <div class="card-body">
            <span id="comments'.$imageID.'"></span>
             <span class="CPcommentBy2"> <strong class="postedby">@'.$commentedBy.'</strong></span>
               <p class="CPcommentBy2">'.$date.'</p>
                  <div class="nonewline">'.$comments.'</div>';

                  
         if (isset($_SESSION['username'])) {
 $crommUserQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."' ";
                    $runnCromQuery = mysqli_fetch_assoc(mysqli_query($db, $crommUserQuery));
                    $LoginIDD = mysqli_real_escape_string($db, $runnCromQuery['user_id']);
                    $ccromQuery = "SELECT * FROM crating_info WHERE user_id = $LoginIDD AND comment_id = $comID";
                    $runCRow = mysqli_fetch_assoc(mysqli_query($db, $ccromQuery));
                  if ($runCRow) {
                    $CratingStatus = mysqli_real_escape_string($db, $runCRow['rating_action']);
 if ($CratingStatus) {
   if ($CratingStatus == "like") { 
     
       $response .= '
<!--  LIKE 1 -->
<span id="clickedcLike'.$comID.'" onclick="likeCOMTwo('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="lkdc'.$comID.'" src="PIconv2.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedcDislike'.$comID.'" onclick="dislikeCOMTwo('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="dlkdc'.$comID.'" src="dislikeIDLE.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px;display: inline">
  &nbsp;
</span>
<!--  *LIKE O DISLIKE  -->
<!--  PUNTOS  -->
<span class="pointsO" style="font-size: 9px;">
  Fama: 
</span>
  <span id="likeCOM'.$comID.'" class="points" style="font-size: 9px;">
    '.$commentLike.' 
  </span>
<br>
<br>
</div>
<!--  *PUNTOS  -->
 <!--  *LIKEd  -->      
        </div>
        </div><br>';
} else if ($CratingStatus == "dislike") {
  // DISLIKE com
  $response .= '
  <!--  LIKE 2 -->
<span id="clickedcLike'.$comID.'" onclick="likeCOMTwo('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="lkdc'.$comID.'" src="likeidle.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedcDislike'.$comID.'" onclick="dislikeCOMTwo('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="dlkdc'.$comID.'" src="DIconv2.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px;display: inline">
  &nbsp;
</span>
<!--  *LIKE O DISLIKE  -->
<!--  PUNTOS  -->
<span class="pointsO" style="font-size: 9px;">
  Fama: 
</span>
  <span id="likeCOM'.$comID.'" class="points" style="font-size: 9px;">
    '.$commentLike.' 
  </span>
<br>
<br>
</div>
<!--  *PUNTOS  -->
 <!--  *DISLIKEd  -->      
        </div>
        </div><br>';
} } } else {
  $response .= '
  <!--  LIKE 3 -->
<span id="clickedcLike'.$comID.'" onclick="likeCOM('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="lkdc'.$comID.'" src="likeidle.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedcDislike'.$comID.'" onclick="dislikeCOM('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="dlkdc'.$comID.'" src="dislikeIDLE.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px;display: inline">
  &nbsp;
</span>
<!--  *LIKE O DISLIKE  -->
<!--  PUNTOS  -->
<span class="pointsO" style="font-size: 9px;">
  Fama: 
</span>
  <span id="likeCOM'.$comID.'" class="points" style="font-size: 9px;">
    '.$commentLike.' 
  </span>
<br>
<br>
</div>
<!--  *PUNTOS  -->
 <!--  *DISLIKEd  -->      
        </div>
        </div><br>';
}
   } else {
   $response .= '
   <!--  LIKE NO LOG IN -->
<span id="clickedcLike'.$comID.'" onclick="likeCOM('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="lkdc'.$comID.'" src="likeidle.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px; display: inline;" >
  &nbsp;&nbsp;
</span>
&nbsp;
<!--  DISLIKE  -->
<span id="clickedcDislike'.$comID.'" onclick="dislikeCOM('.$comID.', '.$postID.')" >
  &nbsp;&nbsp; 
    <img id="dlkdc'.$comID.'" src="dislikeIDLE.png" style="width: 15px; height: 15px; padding: 0px; margin: 0px;display: inline">
  &nbsp;
</span>
<!--  *LIKE O DISLIKE  -->
<!--  PUNTOS  -->
<span class="pointsO" style="font-size: 9px;">
  Fama: 
</span>
  <span id="likeCOM'.$comID.'" class="points" style="font-size: 9px;">
    '.$commentLike.' 
  </span>
<br>
<br>
</div>
<!--  *PUNTOS  -->
 <!--  *DISLIKEd  -->      
        </div>
        </div><br>';
 }

} } else  { 
       $response .= '
    <div class="container elseErrorIndex">
      Se el primero en comentar!
    </div>
    '; }