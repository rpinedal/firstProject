<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$header = "";

//Conectarse a bd
include 'Database/dbConnect.php';

// REGISTRAR USUARIO
if (isset($_POST['reg_user'])) {
  // Sacar toda la info del formulario
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // errores si no esta bien llenado
  if (empty($username)) { array_push($errors, "Usuario*"); }
  if (empty($email)) { array_push($errors, "Correo Electronico*"); }
  if (empty($password_1)) { array_push($errors, "Contraseña*"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las contraseñas no son iguales");
  }

  // revisar base de datos si existe o no 
  $user_check_query = "SELECT * FROM users WHERE BINARY username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe hacer esto
    if ($user['username'] === $username) {
      array_push($errors, "El Usuario ya se encuentra registrado");
    }

    if ($user['email'] === $email) {
      array_push($errors, "El Correo ya se encuentra registrado");
    }
  }

  // Si no hay errores registrar el usuario
  if (count($errors) == 0) {
  	$password = md5($password_1);// encriptar funciona?
    $avatar = 'default-avatarPNG.png';
           
  	$query = "INSERT INTO users (username, email, password, Avatar) 
  			  VALUES('$username', '$email', '$password', '$avatar')";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $uname = md5($username);
  	$_SESSION['success'] = "Ya esta Conectado.";
  	header('location: perfil.php?op='.$uname.'');
  }
}


// INICIAR SESIONES
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  
  if (empty($username)) {
  	array_push($errors, "Usuario*");
  }
  if (empty($password)) {
  	array_push($errors, "Contraseña*");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE BINARY username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    
    
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "";
       
        
        
        header('location: index.php');
      }else {
        array_push($errors, "Error, Usuario/Contraseña Incorrecto");
      }
  }
}

if (isset($_POST['modal_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
$header = mysqli_real_escape_string($db, $_POST['header']);
  
  if (empty($username)) {
  	array_push($errors, "Usuario*");
  }
  if (empty($password)) {
  	array_push($errors, "Contraseña*");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE BINARY username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    
    
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "";
       
        
        
        header('location: '.$header.'');
      }else {
        array_push($errors, "Error, Usuario/Contraseña Incorrecto");
      }
  }
}

if (isset($_POST['EditName'])) { // UPDATE USERNAME AND LOG IN
$newName = mysqli_real_escape_string($db, $_POST['NewName']);
$oldName = mysqli_real_escape_string($db, $_POST['OldName']);
$header = md5($newName);
if (isset($newName)) {
$user_check_query = "SELECT * FROM users WHERE BINARY username='$newName' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe hacer esto
    if ($user['username'] === $newName) {
      echo "El Usuario ya se encuentra registrado";
    }

  } else {

$nameQuery = "UPDATE users SET username = '$newName' WHERE BINARY username = '$oldName' LIMIT 1";
$followQuery = "UPDATE follow SET followerName = '$newName' WHERE BINARY followerName = '$oldName'";
$runFollowQuery = mysqli_query($db, $followQuery); 
$followerQuery = "UPDATE follow SET followName = '$newName' WHERE BINARY followName = '$oldName'";
$runFollowerQuery = mysqli_query($db, $followerQuery);
if ($db->query($nameQuery) === TRUE) {
  

$_SESSION['username'] = $newName;
$_SESSION['success'] = "";
       
        header('location: perfil.php?op='.$header.'');


} else {
     echo '<span class="CPcommentBy" style="color: red;">ERROR</span>';
}
  }

} else { // ERROR 02 NO HAY NUEVO NOMBRE
    echo '<span class="CPcommentBy" style="color: red;">ERROR 02</span>';
}

}



if (isset($_POST['EditEmail'])) { // UPDATE EMAIL AND LOG IN
$newEmail = mysqli_real_escape_string($db, $_POST['NewEmail']);
$oldEmail = mysqli_real_escape_string($db, $_POST['OldEmail']);
$oldName = mysqli_real_escape_string($db, $_POST['OldName']);
$header = md5($oldName);
if (isset($newEmail)) {
$user_check_query = "SELECT * FROM users WHERE BINARY email='$newEmail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe hacer esto
    if ($user['email'] === $newEmail) {
      echo "El Correo ya se encuentra en uso";
    }

  } else {

$nameQuery = "UPDATE users SET email = '$newEmail' WHERE BINARY email = '$oldEmail' LIMIT 1"; 
if ($db->query($nameQuery) === TRUE) {

       
        header('location: perfil.php?op='.$header.'');


} else {
     echo '<span class="CPcommentBy" style="color: red;">ERROR</span>';
}
  }

} 

}

if (isset($_POST['EditPassword'])) { // UPDATE EMAIL AND LOG IN
$newPassword = mysqli_real_escape_string($db, $_POST['NewPassword']);
$userID = mysqli_real_escape_string($db, $_POST['UserId']);
$oldName = mysqli_real_escape_string($db, $_POST['OldName']);
$header = md5($oldName);
$password = md5($newPassword);
if (isset($newPassword)) {


$nameQuery = "UPDATE users SET password = '$password' WHERE user_id = '$userID' LIMIT 1"; 
if ($db->query($nameQuery) === TRUE) {

       
        header('location: perfil.php?op='.$header.'');


} else {
     echo '<span class="CPcommentBy" style="color: red;">ERROR</span>';
}
  }

} 

if (isset($_POST['EditProfilePic'])) { // UPDATE PROFILE PICTURE
$targetDir = "Avatars/";
$temp = 'MemedoneAvatar-';
$fileName = basename($temp.$_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$userID = mysqli_real_escape_string($db, $_POST['UserId']);
$oldName = mysqli_real_escape_string($db, $_POST['OldName']);
$header = md5($oldName);
$lookUsers = 'SELECT * FROM users WHERE user_id = $userID LIMIT 1';
$queryu = mysqli_fetch_assoc(mysqli_query($db, $lookUsers));
$myAvatar = mysqli_real_escape_string($db, $queryu['Avatar']);

if (isset($fileName)) {
$imgArray = array('jpg','jpeg','png', 'webp');
if(in_array($fileType, $imgArray)){
if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
  if (!isset($myAvatar)) {
    $insertAvatar = "INSERT into users (Avatar) VALUES ('".$fileName."') WHERE user_id = $userID";
    if ($db->query($insertAvatar) === TRUE) {
      header('location: perfil.php?op='.$header.'');
    }
  } else {
    $updateAvatar ="UPDATE users SET Avatar = '".$fileName."' WHERE user_id= $userID";
    if ($db->query($updateAvatar) === TRUE) {
      header('location: perfil.php?op='.$header.'');
    }
  }
    }
  }
}
}






?>
