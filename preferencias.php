<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Roboto+Slab" rel="stylesheet">

    <title>Mis Preferencias</title>
  </head>
  <body>
    <div class="container">
      <?php include('./header/header.html') ?>
      <div class="contenido">
        <?php include('./profile_menu/profile_menu.php') ?>
      <h1>PREFERENCIAS</h1>
        <form class="preferencias" action="preferencias.php" method="post">
          <h2>Cambiar datos personales</h2>
          <label for="username">Nombre de Usuario</label>
          <input id="username" type="text" name="username" value="'USER_NAME'">
          <br>
          <label for="nombre">Nombre</label>
          <input id="nombre" type="text" name="" value="">
          <br>
          <label for="apellido">Apellido</label>
          <input id="apellido" type="text" name="" value="">
          <br>
          <label for="oldpassword">Contraseña Actual</label>
          <input id="oldpassword" type="password" name="oldpassword" value="">
          <br>
          <label for="password">Nueva Contraseña</label>
          <input id="password" type="password" name="password" value="">
          <br>
          <label for="confirmpassword">Confirmar Contraseña</label>
          <input id="confirmpassword" type="password" name="" value="">
          <br>
          <button type="submit" name="button">Editar datos</button>
        </form>
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
