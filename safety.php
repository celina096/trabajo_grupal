<?php
require_once('funciones.php');

if (!isset($_SESSION['login'])){
  header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="css/safety.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Roboto+Slab" rel="stylesheet">

    <title>Privacy & Safety</title>
  </head>
  <body>
    <div class="container">
      <?php include('header/header.php') ?>
      <div class="contenido privacy">
        <?php include('./profile_menu/profile_menu.php') ?>
        <!-- ACA VA EL CONTENIDO -->
        <h1>PRIVACY & SAFETY</h1>
        <div class="seguridad">
          <ul>
            <li><a href="#">Establecer preguntas de seguridad</a></li>
            <li><a href="#">Verificar mi cuenta</a></li>
          </ul>
        </div> <!-- .seguridad -->
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
