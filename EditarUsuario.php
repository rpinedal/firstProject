<?php
include 'Database/dbConnect.php';
$newName = mysqli_real_escape_string($db, $_POST['new']);
$oldName = mysqli_real_escape_string($db, $_POST['old']);

if (isset($newName)) {
$user_check_query = "SELECT * FROM users WHERE BINARY username='$newName' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe hacer esto
    if ($user['username'] === $username) {
      echo "El Usuario ya se encuentra registrado";
    }
  } else {
$nameQuery = 'UPDATE users SET username = "'.$newName.'" WHERE BINARY username = "'.$oldName.'" LIMIT 1'; 
if ($db->query($nameQuery) === TRUE) {
   $_SESSION['username'] = $newName;
   $newMD5Name = md5($newName);
   echo $newMD5Name;
} else {
     echo '<span class="CPcommentBy" style="color: red;">ERROR</span>';
}
  }

} else { // ERROR 02 NO HAY NUEVO NOMBRE
    echo '<span class="CPcommentBy" style="color: red;">ERROR 02</span>';
}
