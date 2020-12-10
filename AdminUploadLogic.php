<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memedone</title>


    <link rel="stylesheet" href="css/other.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/imagenes.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <?php 

include 'Menu/indexMenu.php'; 
require_once 'Faker-master/src/autoload.php';
    
// incluir archivo para coenctarse a la base de datos
include 'Database/dbConnect.php';


$statusMsg = '';
$faker = Faker\Factory::create();
// de donde
$appleDir = "apple/";
$targetDir = "uploads/";
$temp = 'meme';
$randoPrefix = bin2hex(openssl_random_pseudo_bytes(6));      
$fileName = basename($randoPrefix.$temp.$_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$uploaderID = $faker->lastName;
$email = $uploaderID.'@gmail.com';
$forApple = $appleDir.$fileName;
$title = mysqli_real_escape_string($db,$_POST['title']);
$category = mysqli_real_escape_string($db, $_POST['categoria']);
$user = mysqli_real_escape_string($db, $_POST['user']);
$randomLike = mt_rand(1, 150);
$passwordAd = md5($uploaderID);// encriptar
$avatar = 'default-avatarPNG.png';
$creditos = mysqli_real_escape_string($db, $_POST['credits']);

if (!$user) { 
  	$queryAdminUser = "INSERT INTO users (username, email, password, Avatar) 
                VALUES('$uploaderID', '$email', '$passwordAd', '$avatar')";
    $runQas = mysqli_query($db, $queryAdminUser);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // restringinr tipo de archivo
    $userQuery = "SELECT * FROM users WHERE username = '".$uploaderID."' ";
                    $rowU = mysqli_fetch_assoc(mysqli_query($db, $userQuery));
                    $userID = mysqli_real_escape_string($db, $rowU['user_id']);


    $allowTypes = array('jpg','png','jpeg', 'gif', 'GIF', 'mp4', 'webm', 'webp', 'WEBM', 'WEBP');
    $imgArray = array('jpg','jpeg','png');
    $pngArray = array('png');
    if(in_array($fileType, $allowTypes)){
        // subir imagen
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            if (copy($targetFilePath, $forApple)) {
            $insert2 = $db->query("INSERT into apple (text, uploaded_on, uploader_id, title, date, Category, creditos) VALUES ('".$fileName."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$creditos."')");
            }
            // poner foto donde pertenece en base de datos
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
           $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, like_num, creditos) VALUES ('".$newFilename."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$randomLike."', '".$creditos."')");

} else {
            //FALTA ERROR HANDLING PARA TITLE
            $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, like_num, creditos) VALUES ('".$newFilename."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$randomLike."', '".$creditos."')");
}
            if($insert){
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
}else{
    $statusMsg = 'Error, Intentelo de Nuevo!';
}
} else {

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // restringinr tipo de archivo
    $userQuery = "SELECT * FROM users WHERE BINARY username = '".$user."' ";
                    $rowU = mysqli_fetch_assoc(mysqli_query($db, $userQuery));
                    $userID = mysqli_real_escape_string($db, $rowU['user_id']);


    $allowTypes = array('jpg','png','jpeg', 'gif', 'GIF', 'mp4', 'webm', 'webp', 'WEBM', 'WEBP');
    $imgArray = array('jpg','jpeg','png');
    $pngArray = array('png');
    if(in_array($fileType, $allowTypes)){
        // subir imagen
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // poner foto donde pertenece en base de datos
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
            $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, like_num, creditos) VALUES ('".$newFilename."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$randomLike."', '".$creditos."')");

} else {
            //FALTA ERROR HANDLING PARA TITLE
            $insert = $db->query("INSERT into images (text, uploaded_on, uploader_id, title, date, Category, like_num) VALUES ('".$fileName."', NOW(), '".$userID."', '".$title."', CURRENT_DATE(), '".$category."', '".$randomLike."')");
}
            if($insert){
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
}else{
    $statusMsg = 'Error, Intentelo de Nuevo!';
}



}
// mensaje de error 

echo ("<div <div class='container' style='text-align: center;'");
echo ("<div class='seleccionarArchivo'>");
echo $statusMsg;
echo ("<br><br><a class='btn btn-success' href='AdminUploadDO.php'>Regresar</a>");
echo ("</div>");
echo ("</div>");
?>
    </div>
    <script type="text/javascript" src="scripts/navBar.js">
    </script>
</body>

</html>