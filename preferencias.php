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
          <label for="username">Nombre de Usuario</label>
          <input id="username" type="text" name="username" value="'USER_NAME'">
          <br>
          <label for="nombre">Nombre</label>
          <input id="nombre" type="text" name="" value="">
        </form>
      </div> <!-- .contenido -->
    </div> <!-- .container -->
  </body>
</html>
