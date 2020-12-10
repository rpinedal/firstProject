<?php
// Acceso a base datos
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "new";

// conectarse
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// si no se conecta
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>