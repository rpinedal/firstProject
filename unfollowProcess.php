<?php
include 'Database/dbConnect.php';
session_start();


if ($_SESSION['username']) {
    $follow_id = mysqli_real_escape_string($db, $_POST['fid']);
$fQuery = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
$getFQuery = mysqli_fetch_assoc(mysqli_query($db, $fQuery));
$follower_id = mysqli_real_escape_string($db, $getFQuery['user_id']);
$follower_name = mysqli_real_escape_string($db, $getFQuery['username']);
$postName = "SELECT * FROM users WHERE user_id = $follow_id";
$runName = mysqli_fetch_assoc(mysqli_query($db, $postName));
$follow_name = mysqli_real_escape_string($db, $runName['username']);


$followQuery = "DELETE FROM follow WHERE followerID = $follower_id AND followID = $follow_id";
$folllowQueryProcess = mysqli_query($db, $followQuery);

echo '<span class="F1">  Seguir </span>';
} else {
    echo '<span class="F1"> No esta Conectado </span>';
}