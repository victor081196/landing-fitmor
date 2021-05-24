<?php
//hola@ifixitmor.com

if (isset($_POST)) {
  $destinatario = 'boy_america9@hotmail.com';
  $nombre = isset($_POST['Name']) ? $_POST['Name'] : false;
  $tel = isset($_POST['Phone']) ? $_POST['Phone'] : false;

  $asunto = '';
  $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;
  $email = isset($_POST['Email']) ? $_POST['Email'] : false;

  if ($nombre != false && $mensaje != false && $email != false) {
    $header = "From: noreply@fitmor.com" . "\r\n";
    $header .= "Reply-To: noreply@fitmor.com" . "\r\n";

    $mensajeCompleto = $mensaje . "\n Nombre:" . $nombre . "\n Correo:" . $email . "\n Telefono:" . $tel;

    mail($destinatario, $asunto, $mensajeCompleto, $header);

    //echo 'si entro';
    echo "<script>alert('correo enviado exitosamente')</script>";
  } else {
    //$_SESSION['error'] = 'faltan_valores';
    echo '<script>
      </script>';
  }
}
