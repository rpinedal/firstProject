<?php 
session_start();
include 'Database/dbConnect.php';
if (isset($_SESSION['username'])) { 

$image = mysqli_real_escape_string($db, $_POST['pid']);

$queryDel = "DELETE FROM images WHERE id = $image";

if($db->query($queryDel) === true){ 
    echo "<span style='font-size: 13px; color: red;' >Todo fue Borrado con Exito. Favor refresque la pagina. </span>"; 
} else{ 
    echo "ERROR: No se puede ejecutar accion. $sql. "  
                                         . $mysqli->error; 
} 
}


?>