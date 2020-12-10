<?php 
include "Database/dbConnect.php";
$sql = $db->query("SELECT * FROM images WHERE id > 1447 ORDER BY id DESC");
if ($sql->num_rows > 0) {


while ($row = $sql->fetch_array()) {

$imageID = mysqli_escape_string($db, $row["id"]);






echo htmlspecialchars('<url>');
echo '<br>';
echo htmlspecialchars('<loc>http://www.memedone.com/commentPage.php?id='.$imageID.'</loc>');
echo '<br>';
echo htmlspecialchars('<lastmod>2020-07-01T21:01:27+00:00</lastmod>');
echo '<br>';
echo htmlspecialchars('<priority>0.80</priority>');
echo '<br>';
echo htmlspecialchars('</url>');
echo '<br>';
    } 
}   