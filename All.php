
    <?php
// incluir archivo para coenctarse a la base de datos
include 'Database/dbConnect.php';


// de donde
$sql = $db->query("SELECT * FROM apple WHERE id >= 1849  ORDER BY id ASC Limit 500");
        

    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_array()) {

    $targetDir = "apple/";
    $text =$row['text'];
    $id = $row['id'];
    $fileName = basename($text);
    $targetFilePath = $targetDir . $text;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $imgArray = array('webp');
    
if(file_exists($targetFilePath)){
if (in_array($fileType, $imgArray)){
    $file = $targetFilePath;             
    $image=  imagecreatefromstring(file_get_contents($file));
    ob_start();
    imagejpeg($image,NULL,80);
    $cont=  ob_get_contents();
    ob_end_clean();
    imagedestroy($image);
    $content =  imagecreatefromstring($cont);
    $noExt = pathinfo($file, PATHINFO_FILENAME);
    $newFilename = $noExt . '.jpeg';
    $output = $targetDir . $newFilename;
    imagejpeg($content, $output);
    imagedestroy($content); 
    unlink($file);

 
//FALTA ERROR HANDLING PARA TITLE
$insert = $db->query("UPDATE apple SET text = '".$newFilename."' WHERE id = $id");
if ($insert) {
    echo 'Old Name = '.$fileName;
    echo '<br>Extention = '.$fileType;
    echo '<br>New Name ='.$newFilename;
    echo '<br>';
    echo $id.' Change Complete<br><br> ';
} else {
    echo 'Old Name = '.$fileName;
    echo '<br>Extention = '.$fileType;
    echo '<br>New Name ='.$newFilename;
    echo '<br>';
    echo $id.'No se pudo Completar!';
}


} else {
    echo 'Old Name = '.$fileName;
    echo '<br>Extention = '.$fileType;
    
    echo '<br>';
    echo $id.'NO ERA IMAGEN o NO NECESITABA CAMBIO<br><br> ';
}
} else {
    echo 'Old Name = '.$fileName;
    echo '<br>Extention = '.$fileType;
    echo '<br>';
    echo $id.'No EXISTE IMAGEN<br><br>';
}
        } 
    }
        