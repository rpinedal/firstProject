<?php
// Acceso a base datos
$dbHost     = "localhost";
$dbUsername = "z9wju1zqs3zs";
$dbPassword = "rPineda34!";
$dbName     = "new";

// conectarse
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// si no se conecta
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM images, users WHERE like_num > 130 AND images.uploader_id = users.user_id ORDER BY id DESC";
$result = $db->query($sql);
$response = array();
if ($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc()) {
        array_push($response,$row);
        
    }
}
$db->close();

header('Content-Type: application/json');
echo json_encode($response);
?>


