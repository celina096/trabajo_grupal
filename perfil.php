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
        <h1>MI PERFIL</h1>
        <div class="miPerfil">
          <div class='perfil'>
            <img src="images/man.svg" alt="" width="100px">
            <div class="datosPerfil">
              <h3>Nombre de Usuario</h3>
              <p>'NOMBRE_USUARIO'</p>
              <br>
              <h3>E-mail</h3>
              <p>'USER_EMAIL'</p>
            </div> <!-- .datosPerfil -->
            <form class="" action="preferencias.php" method="post">
              <button class="hvr-pop" type="submit" name="button"> Editar</button>
            </form>
        </div> <!-- .perfil -->
      </div> <!-- .miPerfil -->
      </div> <!-- .contenido -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
