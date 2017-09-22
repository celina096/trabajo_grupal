<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Mi Perfil</title>
  </head>
  <body>
    <div class="container">
      <?php include('header/header.html') ?>
      <div class="contenido">
        <div class="leftMenu">
          <h3>Ajustes de Usuario</h3>
          <ul>
            <li>Mi Cuenta</li>
            <li>Seguridad</li>
            <li>Perfil</li>
            <li>Notificaciones</li>
            <li>Log Out</li>
          </ul>
        </div> <!-- .leftMenu -->
        <h1>Mi Perfil</h1>
        <div class="miPerfil">
          <img src="images/man.svg" alt="" width="100px">
          <span>
            <h3>Nombre de Usuario</h3>
            <p>'NOMBRE_USUARIO'</p>
            <h3>E-mail</h3>
            <p>'USER_EMAIL'</p>
        </span>
        </div>
      </div> <!-- .contenido -->
    </div> <!-- .container -->
  </body>
</html>
