<?php
session_start();
include 'Database/dbConnect.php';       

$query2 = "SELECT * FROM users WHERE BINARY username = '".$_SESSION['username']."'";
$row2 = mysqli_fetch_assoc( mysqli_query($db, $query2));
$uID =  mysqli_real_escape_string($db,$row2['user_id']);
$avatar = mysqli_real_escape_string($db, $row2['Avatar']);
$image = mysqli_real_escape_string($db, $_POST['pid']);
$comment = mysqli_real_escape_string($db, $_POST['comm']);
$userID = $uID;
$postedBy = $_SESSION['username'];

if ($postedBy) {
    $insert1 = "INSERT INTO comment (image_pid, comment, sender, date) VALUES ('".$image."','".$comment."', '".$postedBy."', NOW())";
$doInsert1 = mysqli_query($db, $insert1);

$sql2 = "SELECT * FROM comment WHERE image_pid = '".$image."' ORDER BY date DESC";
$row = mysqli_fetch_assoc( mysqli_query($db, $sql2) );
$allComm = mysqli_real_escape_string($db,$row['comment']);
$date = mysqli_real_escape_string($db, $row['date']);
$postID = mysqli_real_escape_string($db, $row['image_pid']);
$comments = mysqli_real_escape_string($db, $row['comment']);
$commentID = mysqli_real_escape_string($db, $row['id']);
$commentedBy = mysqli_real_escape_string($db, $row['sender']);
$numberTabs = 1;

echo  "

<div class='card spaces$numberTabs' >
<div class='card-body'>
&nbsp;&nbsp;&nbsp;&nbsp;<div style='margin-top: -25px; padding:0px;' id='delete$image'><span style='color:red; float: right;font-weight: 100; ' onclick='commentDelete($commentID)' type='button' >Eliminar</span>
</div>
<div id='comdelete'></div>
 
            <span class='CPcommentBy'><strong class='postedby'>$commentedBy</strong></span>
            <p class='CPcommentBy'>$date</p>
            <div class='nonewline'>$comments</div>
        </div>
        </div>
        <br>"; ?>
 <?php } else { ?>
    <span style='color:red;'>Inicie Sesion para Comentar.</span>

    <?php
} ?>

