<?php 


include "Database/dbConnect.php";


$newPass = mysqli_real_escape_string($db, $_POST['nPass']);
$confirmPass = mysqli_real_escape_string($db, $_POST['cPass']);
$uID = mysqli_real_escape_string($db, $_POST['uId']);
$queryChange = "SELECT * FROM users WHERE user_id = '".$uID."' ";
$runChange = mysqli_fetch_assoc(mysqli_query($db, $queryChange));
$passwordRow = mysqli_real_escape_string($db, $runChange['password']);
$userRow = mysqli_real_escape_string($db, $runChange['username']);
if ($newPass) {
if ($newPass == $confirmPass) {
$mdPass = md5($newPass);

$updateQuery = "UPDATE users SET password = '".$mdPass."' WHERE BINARY user_id = '".$uID."' ";
$ConfirmChange = mysqli_query($db, $updateQuery);

echo "<h6 style='color: green;'>Cambio de Contrase&ntilde;a Exitoso.</h6>";
} } else {
    echo '<h6 style="color: red;">Error al cambiar Contrase&ntilde;a.</h6>';
    
}