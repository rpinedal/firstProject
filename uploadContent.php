
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memedone</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body> 
<?php 
session_start(); 
include 'Menu/indexMenu.php'; ?>

    <?php
// incluir archivo para coenctarse a la base de datos
include 'Database/dbConnect.php';


  if (isset($_GET['logout'])) {
  	session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['id']);
  	header("location: new.php");
  }

$statusMsg = '';

// de donde
$appleDir = "apple/";
$targetDir = "uploads/";
$temp = 'meme.memedone';
$fileName = basename($temp.$_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$forApple = $appleDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$uploaderID = mysqli_real_escape_string($db, $_SESSION['username']);
$title = mysqli_real_escape_string($db,$_POST['title']);
$category = mysqli_real_escape_string($db, $_POST['categoria']);
$creditos = mysqli_real_escape_string($db, $_POST['credits']);
$query = $db->query("SELECT user_id FROM users WHERE BINARY username= '".$_SESSION['username']."'");
$file_tmp = $_FILES["file"]["tmp_name"];
if($query->num_rows > 0){
   
    while($row = $query->fetch_assoc())
    {
        $userID = mysqli_real_escape_string($db,$row['user_id']);
        
    }
}

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // restringinr tipo de archivo
    
    $allowTypes = array('jpg','png','jpeg', 'gif', 'GIF', 'mp4', 'webm', 'webp', 'WEBM', 'WEBP');
    $imgArray = array('jpg','jpeg','png');
    $pngArray = array('png');
    if(in_array($fileType, $allowTypes)){
        // subir imagen
        
        if(move_uploaded_file($file_tmp, $targetFilePath)){
            if (copy($targetFilePath, $forApple)) {
            $insert2 = $db->query("INSERT into apple (text, uploaded_on, uploader_id, title, date, Category, creditos) VALUES ('".$fileName."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$creditos."')");
            }
if (in_array($fileType, $imgArray)){
    $file = $targetFilePath;             
    $image=  imagecreatefromstring(file_get_contents($file));
    ob_start();
    imagejpeg($image,NULL,50);
    $cont=  ob_get_contents();
    ob_end_clean();
    imagedestroy($image);
    $content =  imagecreatefromstring($cont);
    $noExt = pathinfo($file, PATHINFO_FILENAME);
    $newFilename = $noExt . '.webp';
    $output = $targetDir . $newFilename;
    imagewebp($content, $output);
    imagedestroy($content); 
    unlink($file);

 //FALTA ERROR HANDLING PARA TITLE
            $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, creditos) VALUES ('".$newFilename."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$creditos."')");

            

} else {
            //FALTA ERROR HANDLING PARA TITLE
            $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, creditos) VALUES ('".$fileName."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$creditos."')");
}
        
            if($insert && $insert2){
                $statusMsg = "El Archivo Fue Agregado Exitosamente!";
                
            }else{
                $statusMsg = "Ha Ocurrido un Error, Intentar Otra Vez.";
            } 
        }else{
            $statusMsg = "Lo Sentimos, Hubo un Error al Subir el Archivo.";
        }
    }else{
        $statusMsg = 'Lo Sentimos, Estas intentando Subir un Archivo que NO es JPG, JPEG, PNG, WEBm, WEBp.';
    }
} else{
    $statusMsg = 'Error, Intentelo de Nuevo!';
}

// mensaje de error 

echo ("<div <div class='container' style='text-align: center;'");
echo ("<div class='seleccionarArchivo'>");
echo $statusMsg;
echo ("<br><br><a class='btn btn-success' href='new.php'>Regresar</a>");
echo ("</div>");
echo ("</div>");

?>
</div>
<script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>

