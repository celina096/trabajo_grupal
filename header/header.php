<!-- ESTE ES EL HEADER LOGEADO -->

<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Roboto+Slab" rel="stylesheet">
<meta charset="utf-8">
<link rel="stylesheet" href="css/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="header">
  <header class="index">

    <input class="menu-btn" type="checkbox" id="menu-btn" />
<label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <a class="nombrelogo" href="perfil.php"><h1><img class="logo" src="images/logonuevo.png" alt="" width="50vh">Mis Finanzas</h1></a>
    <nav class="menu">
      <ul>
        <li class="hvr-underline-from-center"><a href="contacto.php">Contacto</a></li>
        <li class="hvr-underline-from-center"><a href="faqs.php">FAQs</a></li>
        <li class="hvr-underline-from-center"><a href="perfil.php">Perfil</a></li>
        <li class="hvr-underline-from-center"><a href="perfil.php"><?php echo $_SESSION['usuario'] ?></a></li>
        <a class="user-avatar" href="perfil.php">
          <img class="user-avatar" src="<?php
          $nombreimagen = buscarAvatar($_SESSION['usuario']);
           echo 'avatar/'.$_SESSION['imagen']; ?>" alt="avatar del usuario" width="50px">
        </a>
        <div class="user-menu ">
          <h3>mimail@gmail.com</h3>
          <ul>
            <a href="tablero.php">
              <img src="images/notepad.svg" alt="" width="50px">
              <li>Tablero</li>
            </a>
            <a href="ingresos.php">
              <img src="images/profits.svg" alt="" width="50px">
              <li>Ingresos</li>
            </a>
            <a href="egresos.php">
              <img src="images/loss.svg" alt="" width="50px">
              <li>Egresos</li>
            </a>
            <a href="bancos.php">
              <img src="images/bank.svg" alt="" width="50px">
              <li>Bancos</li>
            </a>
          </ul>
        </div> <!-- .user-menu -->
      </ul>
    </nav> <!-- .menu -->
    <nav class="menu-movil">
      <ul>
        <h3>MIS CONTENIDOS</h3>
        <li><a href="tablero.php">Tablero</a></li>
        <li><a href="ingresos.php">Ingresos</a></li>
        <li><a href="egresos.php">Egresos</a></li>
        <li><a href="#">Bancos</a></li>
        <h3>AJUSTES DE USUARIO</h3>
        <li><a href="perfil.php">Datos Personales</a></li>
        <li><a href="preferencias.php">Tus Preferencias</a></li>
        <li><a href="safety.php">Privacidad y Seguridad</a></li>
        <li><a href="#">Notificaciones</a></li>
        <li><a href="cerrar_sesion.php">Log Out</a></li>
      </ul>
    </nav>

  </header>
</div> <!-- .header -->
