<?php
require_once('./funciones.php');

$usuario = $_SESSION['usuario'];
$datos = buscar_usuario($_SESSION['usuario'], 'usuarios.json');


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $newUsername = $_POST['username'];
  reemplazar($usuario, $newUsername);
  $_SESSION['usuario'] = $newUsername;
  header("Location: preferencias.php");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="css/preferencias.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Roboto+Slab" rel="stylesheet">

    <title>Mis Preferencias</title>
  </head>
  <body>
    <div class="container">
      <?php include('./header/header.php') ?>
      <div class="contenido">
        <?php include('./profile_menu/profile_menu.php') ?>
      <h1>PREFERENCIAS</h1>
      <div class="wrap">
        <form id="form1" class="preferencias" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <h2>Cambiar datos personales</h2>
          <label for="username">Nombre de Usuario</label>
          <br>
          <input id="username" type="text" name="username" value="<?php echo $usuario ?>">
          <br>
          <label for="email">E-mail</label>
          <br>
          <input type="email" name="email" value="<?php echo $datos['email'] ?>">
          <br>
          <label for="oldpassword">Contraseña Actual</label>
          <br>
          <input id="oldpassword" type="password" name="oldpassword" value="" >
          <br>
          <label for="password">Nueva Contraseña</label>
          <br>
          <input id="password" type="password" name="password" value="">
          <br>
          <button form="form1" class="boton" type="submit" name="form">Registrar cambios</button>
        </form>
        <div class="avatar-wrap">
          <div class="avatar">
            <img src="<?php
            $nombreimagen = buscarAvatar($_SESSION['usuario']);
             echo 'avatar/'.$nombreimagen; ?>" alt="" width="150px">
          </div> <!-- .avatar -->
          <form class="cambiar-avatar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <br>
            <label for="cambiar-avatar">Cambiar avatar</label>
            <br>
            <input class="boton" type="file" name="avatar" accept="image/*" />
            <br>
            <button class="boton" type="submit" name="changeAvatar">Subir Avatar</button>
          </form>
        </div> <!-- -avatar-wrap -->
      </div> <!-- .wrap -->
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
