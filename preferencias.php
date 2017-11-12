<?php
require_once('funciones.php');
require_once('classes/Usuario.php');

$usuario = $_SESSION['usuario'];




if(!empty($_POST)) {
  $user = new \App\Usuario();
  
  $user->editarDatos( $_POST, $_SESSION );
  $errores = $user->getErrores();
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
        <form id="form1" class="preferencias" action="preferencias.php" method="post">
          <h2>Cambiar datos personales</h2>
          <label for="username">Nombre de Usuario</label>
          <br>
          <input id="username" type="text" name="usuario" value="" placeholder="<?php echo $_SESSION['usuario'] ?>">
          <br>
          <label for="email">E-mail</label>
          <br>
          <input type="email" name="email" value="" placeholder="<?php echo $_SESSION['email'] ?>">
          <br>
          <label for="oldpassword">Contraseña Actual</label>
          <br>
          <input id="oldpassword" type="password" name="clave" value="" required>
          <br>
          <label for="password">Nueva Contraseña</label>
          <br>
          <input id="password" type="password" name="claveNueva" value="">
          <br>
          <button form="form1" class="boton" type="submit" name="form">Registrar cambios</button>
          <?php 
          foreach ($errores as $error) {
            echo "<li>" . $error . "</li>";
          }
          ?>
        </form>
        <div class="avatar-wrap">
          <div class="avatar">
            <img src="<?php 
            echo 'avatar/'.$_SESSION['imagen'];
            ?>" alt="" width="150px">
          </div> <!-- .avatar -->
          <form class="cambiar_avatar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <br>
            <label for="cambiar-avatar">Cambiar avatar</label>
            <br>
            <input class="boton" type="file" name="avatar" accept="image/*" />
            <br>
            <button class="boton" type="submit" name="cambiar_avatar">Subir Avatar</button>
          </form>
        </div> <!-- .avatar-wrap -->
      </div> <!-- .wrap -->
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
