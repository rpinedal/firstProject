<?php
  if (isset($_SESSION['username'])) {
    $logInQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
      $getLoginID = mysqli_fetch_assoc(mysqli_query($db, $logInQuery));
        $LoginID = mysqli_real_escape_string($db, $getLoginID["user_id"]);
    $followingQuery = "SELECT * FROM follow WHERE followerID = $LoginID AND followID = $userID";
      $runFollowingQuery = mysqli_fetch_assoc(mysqli_query($db, $followingQuery));
      if (isset($imageID)) {
        if ($LoginID != $userID) {
          if ($runFollowingQuery == True) {
  ?>
  <a id="F1U<?php echo $imageID ?>" onclick="unfollow(<?php echo $userID ?>, <?php echo $imageID ?>)" >  
     <span class="F1 postedby">  Siguiendo </span>
  </a>
<br>
    <?php } else if ($runFollowingQuery == FALSE) { ?>
<a id="F1C<?php echo $imageID ?>" onclick="follow(<?php echo $userID ?>, <?php echo $imageID ?>)" >
      
      <span class="F1">  Seguir </span>
      
    </a>
    <br>
    <?php
} // else if no existe   
} else if ($LoginID == $userID) { ?>
  <br>
  <?php
}// if user not igual a post
} else if (!isset($_SESSION['username'])) { 
?>
<!--  IMAGEN O VIDEO  -->
<a id="F1C<?php echo $imageID ?>" onclick="follow(<?php echo $userID ?>, <?php echo $imageID ?>)" >
      
        <span class="F1">  Seguir </span>
      
    </a>
    <br>
<?php } }  






  if(!isset($imageID) ) { 
    if ($LoginID != $userID) {
          if ($runFollowingQuery == True) {
    
    ?>
<a id="F1U" onclick="unfollow(<?php echo $userID ?>, <?php echo $imageID ?>)" >  
     <span class="F1 postedby">  Siguiendo </span>
  </a>
<br>
    <?php } else if ($runFollowingQuery == FALSE) { ?>
<a id="F1C" onclick="follow(<?php echo $userID ?>, <?php echo $imageID ?>)" >
      
      <span class="F1">  Seguir </span>
      
    </a>
    <br>
    <?php
} // else if no existe   
} else if ($LoginID == $userID) { ?>
  <br>
  <?php
}// if user not igual a post
} else if (!isset($_SESSION['username'])) { 
?>
<!--  IMAGEN O VIDEO  -->
<a id="F1C" onclick="follow(<?php echo $userID ?>, <?php echo $imageID ?>)" >
      
        <span class="F1">  Seguir </span>
      
    </a>
    <br>


 <?php 
}
  ?>