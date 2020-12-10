<?php
session_start();
include 'Database/dbConnect.php';   

if (isset($_SESSION['username'])) {
$query2 = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
$row2 = mysqli_fetch_assoc( mysqli_query($db, $query2));
$uID =  mysqli_real_escape_string($db,$row2['user_id']);
 $image = mysqli_real_escape_string($db, $_POST['pid']);



if ($_SESSION['username'] == "Admin") {
    $insert22 = "UPDATE images SET like_num = like_num - 49 WHERE id= '".$image."' ";
    $update22 = mysqli_query($db, $insert22);
    
    $sql22 = "SELECT * FROM images WHERE id = '".$image."' ";
    $row22 = mysqli_fetch_assoc( mysqli_query($db, $sql22) );
    $totalLikes22 = mysqli_real_escape_string($db,$row22['like_num']);
    echo $totalLikes22;
    
} else if ($_SESSION['username'] != "Admin") {
$check_query = "SELECT COUNT(*) AS Total from rating_info WHERE BINARY user_id = '".$uID."' AND post_id = '".$image."'"; 
$run_check = mysqli_fetch_assoc( mysqli_query($db, $check_query));
$alreadyLiked = mysqli_real_escape_string($db,$run_check['Total']);


if (!$alreadyLiked) {
    
       
$insert1 = "INSERT INTO rating_info (user_id, post_id, rating_action) VALUES ('".$uID."', '".$image."','dislike')";
$doInsert1 = mysqli_query($db, $insert1);
$insert = "UPDATE images SET like_num = like_num - 1 WHERE id= '".$image."' ";
$update = mysqli_query($db, $insert);
$sql2 = "SELECT * FROM images WHERE id = '".$image."' ";
$row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
$totalLikes = mysqli_real_escape_string($db,$row['like_num']);
echo $totalLikes;
} else if ($alreadyLiked) {
// $insert = "UPDATE images SET like_num = like_num + 1 WHERE id= '".$image."' ";
// $update = mysqli_query($db, $insert);

$sql2 = "SELECT * FROM images WHERE id = '".$image."' ";
$row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
$totalLikes = mysqli_real_escape_string($db,$row['like_num']);

$sql2 = "SELECT * FROM rating_info WHERE post_id = '".$image."' AND user_id = '".$uID."'";
$row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
$rating = mysqli_real_escape_string($db,$row['rating_action']);


if ($rating == "like") {
    $insert = "UPDATE images SET like_num = like_num - 1 WHERE id= '".$image."' ";
    $update = mysqli_query($db, $insert);
    $insert = "DELETE FROM rating_info WHERE post_id= '".$image."' AND  user_id = '".$uID."'  ";
    $update = mysqli_query($db, $insert);
    $sql2 = "SELECT * FROM images WHERE id = '".$image."' ";
    $row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
    $totalLikes = mysqli_real_escape_string($db,$row['like_num']);
    echo $totalLikes;


    
} else if ($rating == "dislike") {
    $insert = "UPDATE images SET like_num = like_num + 1 WHERE id= '".$image."' ";
    $update = mysqli_query($db, $insert);
    $insert = "DELETE FROM rating_info WHERE post_id= '".$image."' AND  user_id = '".$uID."'  ";
    $update = mysqli_query($db, $insert);
    $sql2 = "SELECT * FROM images WHERE id = '".$image."' ";
    $row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
    $totalLikes = mysqli_real_escape_string($db,$row['like_num']);
    echo $totalLikes;
    
    
}
}
} }else { ?>
  <p class="likeError">Necesita Iniciar Sesion para dar No Me Gusta.</p>
<?php 
}  ?>






