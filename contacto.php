<?php
require_once('./funciones.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$enviar_a = "misfinanzasDH@gmail.com";
$asunto = "Consulta - Mis Finanzas";
$errores=[];
//
if($_POST) {
  if (empty($_POST['name']) || preg_match('/[^A-Za-z0-9]/', $_POST['name'])) {
    $errores['name'] = 'Debe ingresar un nombre válido';
  }
  if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Debe ingresar un e-mail válido';
  }
  if (empty($_POST['comment'])) {
    $errores['comment'] = 'Por favor ingrese una consulta';
  } else {
    $mensaje = htmlspecialchars($_POST['comment']);
    $mensaje = trim($mensaje);
    $mensaje = stripslashes($mensaje);
  }
  $name = $_POST['name'];
  $from = $_POST['email'];
  if (empty($errores)) {
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
      $mail->setFrom($_POST['email'], $_POST['email']);
      $mail->addAddress("misfinanzasDH@gmail.com", 'Mis Finanzas');     // Add a recipient             // Name is optional
      $mail->addReplyTo($_POST['email'], 'Information');


      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $asunto;
      $mail->Body    = $mensaje;
      $mail->AltBody = $mensaje;

      $mail->send();
      echo 'Message has been sent';
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
    <link rel="stylesheet" href="css/contacto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Contacto</title>
  </head>
  <body>
    <div class="container">
      <?php if (!isset($_SESSION['login'])){
        include('./header/header.html');
      } else {
        include('header/header.php');
      }?>
      <div class="contacto">
        <div class="form">
          <div class="backgroundColor">
            <h2>Envianos tus inquietudes</h2>
            <form class="contacto" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <label for="name">Tu Nombre</label>
              <input id="name" type="text" name="name" value="">
              <br>
              <label for="email">Tu E-mail</label>
              <input id="email" type="text" name="email" value="">
              <br>
            <label class="comment" for="comment">Comentario</label>
            <textarea name="comment" rows="8" cols="80"></textarea>
            <button type="submit" name="button">Enviar</button>
          </form>
          <?php
            if (!empty($errores)) {
              foreach ($errores as $key => $value) {
                echo $value.'<br>';
              }
            }
           ?>
          </div> <!-- .backgroundColor -->
        </div> <!-- .form -->
    </div> <!-- .container -->
      <?php include('footer/footer.html') ?>
  </body>
</html>
