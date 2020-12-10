<?php 
session_start();
include 'Database/dbConnect.php';
if (isset($_SESSION['username'])) { 

$commentID = mysqli_real_escape_string($db, $_POST['cid']);


$queryDel = "DELETE FROM comment WHERE id = $commentID";

if($db->query($queryDel) === true){ 
    echo "<span style='font-size: 13px; color: red;' >Todo fue Borrado con Exito. Favor refresque la pagina. </span>"; 
} else{ 
    echo "ERROR: No se puede ejecutar accion. $sql. "  
                                         . $mysqli->error; 
} 
}
?>