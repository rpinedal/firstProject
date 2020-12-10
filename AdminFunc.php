<?php
include 'Database/dbConnect.php';
function AdminRegister ($username, $password, $email) {

$user_check_query = "SELECT * FROM users WHERE BINARY username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe hacer esto
    if ($user['username'] === $username) {
     echo "El Usuario ya se encuentra registrado";
    }

    if ($user['email'] === $email) {
     echo "El Correo ya se encuentra registrado";
    }
  } else {
    $password = md5($password_1);// encriptar
  	$query = "INSERT INTO users (username, email, password) 
                VALUES('$username', '$email', '$password')";

  }
}