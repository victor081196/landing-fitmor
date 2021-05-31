<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/Phpmailer/Exception.php';
require 'libs/Phpmailer/PHPMailer.php';
require 'libs/Phpmailer/SMTP.php';
//hola@ifixitmor.com

if (isset($_POST)) {

  //Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alberto@softmor.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alberto@softmor.com', 'Fitmor');
    $mail->addAddress('alberto@softmor.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Solicitud de prueba de fitmor';
    $mail->Body    = 'Nombre: ' . $_POST['nombre'] . '<br/> Correo: ' . $_POST['correo'] . '<br /> Telefono: ' . $_POST['tel'] . ' <br /> Mensaje: ' . $_POST['mensaje'];

    $mail->send();
    echo '1';
  } catch (Exception $e) {
    echo '0';
  }
}
