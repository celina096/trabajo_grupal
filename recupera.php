<?php
require_once('./funciones.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$errores = [];
$exito ='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = '*El e-mail no es válido';
  }
  if (empty($errores)) {
    $handler = buscar_email($_POST['email'], 'usuarios.json');
    if ($handler) {
      $exito = 'Se envió correctamente';
    } else {
      $errores['email'] = 'El e-mail no está en la base de datos';
    }
  }
if(isset($exito)) {
  $claverecuperada = buscar_clave($_POST['email']);
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "misfinanzasDH@gmail.com";                 // SMTP username
    $mail->Password = 'tiburones2017';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom("misfinanzasDH@gmail.com", 'Mis Finanzas');
    $mail->addAddress($_POST['email'], $_POST['email']);     // Add a recipient             // Name is optional
    $mail->addReplyTo("misfinanzasDH@gmail.com", 'Information');


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto_recupera;
    $mail->Body    = $mensaje_recupera.$claverecuperada;
    $mail->AltBody = $mensaje_recupera.$claverecuperada;

    $mail->send();
    //echo 'Message has been sent';
  } catch (Exception $e) {
    echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}
}



 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="css/profile_menu.css">
    <link rel="stylesheet" href="css/registrate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title> RECUPERA TU CONTRASEÑA </title>
  </head>
  <body>
    <div class="container ">
      <?php include('header/header.html') ?>

      <div class="registro">
        <div class="form">
        <div class= "backgroundColor">


            <p class= 'registrate'> ¿ Deseas recuperar tu contraseña ? </p>
            <p> Danos la dirección de correo electrónico asociada a tu cuenta para que te enviemos un correo electrónico y puedas restablecer tu contraseña.</p>
          <form class="container" action="recupera.php" method="post" enctype="multipart/form-data" >

              <br>

              <input type="email" class="form-control" id="email" name="email" placeholder=" Ingrese su Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email']: '' ?>">
              <p class="text-danger">
                <?php if(isset($errores['email'])){
                      echo $errores['email'];
                   } ?>
                   <?php if(isset($exito)) {
                     echo $exito;
                   } ?>
              </p>


              <br>

            <button  type="submit" name="enviar" value=""> Enviar </button>


          </form>
        </div> <!-- .backgroundColor -->
      </div> <!-- .container -->
      <?php include('footer/footer.html') ?>







  </body>
</html>
