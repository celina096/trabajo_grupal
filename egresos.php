<?php
require_once('./funciones.php');

$usuario = $_SESSION['usuario'];

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Roboto+Slab" rel="stylesheet">
    <title>Mi Perfil</title>
  </head>
  <body>
    <div class="container">
      <?php include('header/header.php') ?>
      <div class="contenido">
        <?php include('./profile_menu/profile_menu.php') ?>
        <h1>EGRESOS</h1>
        <h1>En construcción</h1>
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
