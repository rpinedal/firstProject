<?php 

include "Database/dbConnect.php";
$email = mysqli_real_escape_string($db, $_POST['umail']);
$queryQ = "SELECT * FROM users WHERE email = '".$email."'";
$runQ = mysqli_fetch_assoc(mysqli_query($db, $queryQ));
$password = mysqli_real_escape_string($db, $runQ['password']);
$user = mysqli_real_escape_string($db, $runQ['username']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
if ($user) {
$mail = new PHPMailer(true);


             
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host    = 'p3plcpnl0980.prod.phx3.secureserver.net';    // Set the SMTP server to send through
    $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
    $mail->SMTPAutoTLS = false; 
    $mail->SMTPSecure = 'tls';
    $mail->Username   = 'noreply@memedone.com';                     // SMTP username
    $mail->Password   = '$}oU8i&*[coW';                               // SMTP password
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply@memedone.com', 'Memedone.com');
    $mail->addAddress($email);     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperacion de su cuenta Memedone';
    $mail->Body    = '<p>Estimado <strong style="color:#5510d6">'.$user.'</strong>,</p>
    <p> Usted solicito cambiar su <strong class="postedby"> Contrase&ntilde;a. </strong></p>
    <p> Favor dar Click en el enlace para crear una nueva.</p>
    <a class="btn btn-success" href="recoverPage.php?QtXPssd='.$password.'&nNchE='.$email.'"> Recuperar Cuenta </a>';
    
    $mail->AltBody = 'Favor Comuniquese con nosotros a memedone@gmail.com';

    $mail->send();
    echo '<p class="elseErrorIndex" style="padding-top:0px;">Enviado <strong style="color:green;">Exitosamente.</strong><br>
    *El <strong style="color:#5510d6;">correo </strong>puede tardar unos minutos en llegar.<br>
     </p>';
} else {
 echo 'Error al enviar mensaje a ';
 echo $email;

}

