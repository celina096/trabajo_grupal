<?php
session_start();
if (isset($_SESSION['login'])){
  header('Location: ingresos.php');
}

require_once 'funciones.php';

$usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
$clave= isset ($_POST['clave'])? $_POST['clave'] : null;

$errores= array();


if (isset($_POST['enviar'])) {

    if (!requerido($usuario)){
      $errores['usuario']="el campo USUARIO es requerido";
    }
    if (!requerido($clave)){
      $errores['clave']="el campo CLAVE es requerido";
    }
    if (!buscar_usu($usuario,$clave)){
      $errores['usuario_error']="Usuario o clave incorrecto";
    }
    $linea = buscar_usuario($usuario,$clave);

    if (count($errores)==0){
      session_start();
      $_SESSION['login']="ok";
      $_SESSION['usuario']=$linea['usuario'];


      header('Location: ingresos.php');
    }

}
 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Mis Finanzas - Argentina</title>
  </head>
  <body>
    <div class="container">
      <div class="background1">
        <div class="header">
          <header class="index">

            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <a href="index.html"><img class="logo" src="images/logo200px.png" alt="" width="250px"></a>
            <nav class="menu">
              <ul>
                <li class="hvr-underline-from-center"><a href="contacto.html">Contacto</a></li>
                <li class="hvr-underline-from-center"><a href="formulario.html"> Log in / Sign up </a></li>
                <li class="hvr-underline-from-center"><a href="faqs.html">FAQs</a></li>
              </ul>
            </nav>
            <nav class="menu-movil">
              <ul>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="formulario.html"> Log in / Sign up </a></li>
                <li><a href="faqs.html">FAQs</a></li>
              </ul>
            </nav>

          </header>
        </div> <!-- .header -->
      </div>
      <section class="section1">
        <div>
          <h2 class="bounceInLeft animated">Administra tus finanzas</h2>
          <h3><spam class="animation1 bounceInLeft animated">Fácil. </spam><spam class="bounceInLeft animated animation2">Rápido.</spam><spam class="bounceInLeft animated animation3"> Gratis.</spam></h3>
          <a href="#queSomos" class="hvr-grow fadeInUp animated saberMas">Saber Más ↓</a>
        </div>
        <div class="formularioIndex fadeInDown animated">
          <p>Inicia Sesion</p>
          <form class="logIn" action="index.php" method="post">
            <div>
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" value='<?php echo $usuario ?>'>
              <?php if (isset($errores['usuario'])){echo $errores['usuario'];}else{ echo "";} ?><br/>
              <?php if (isset($errores['usuario_error'])){echo $errores['usuario_error'];}else{ echo "";} ?><br/>
              <br>
              <label for="clave">Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" value="">
              <?php if (isset($errores['clave'])){echo $errores['clave'];}else{ echo "";} ?><br/>
              <?php if (isset($errores['clave_error'])){echo $errores['clave_error'];}else{ echo "";} ?><br/>

            </div>
            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br>
            <button type="submit" name="enviar" value="">Iniciar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
            <br>
            <a href="registrate.php">¿No estás registrado? Crea tu cuenta.</a>
          </form>
        </div>

      </section>
    </div>
    <section id="queSomos" class="indexParte2">
      <div>
        <h2>¿Quiénes somos?</h2>
        <br>
        <br>
        <p>Somos un grupo de contadores especializados con las herramientas</p>
        <p>para brindarte la solucion a tus problemas financieros.</p>
        <p> Nuestra especialidad es otorgar de forma eficaz y rápida la ayuda que necesites </p>
        <p> para que lleves tus finanzas a su máximo potencial. </p>
        <br>
        <p> Mis Finanzas Accounting Group , Always by your side.</p>
      </div>
    </section>
    <section class="indexParte3">
      <div>
        <h2>Beneficios</h2>
        <ul>
          <li><img src="images/stopwatch.svg" alt="" width="60px"><span>ACCESIBILIDAD</span>  Disponibilidad del servicio las 24 horas</li>
          <li><img src="images/teamwork.svg" alt="" width="60px"><span>ASISTENCIA</span>  Contacto con personas dedicadas al rubro</li>
          <li><img src="images/group.svg" alt="" width="60px"><span>ATENCIÓN</span>  Soporte técnico por expertos</li>
        </ul>
      </div>
    </section>
    <footer class="footerIndex">
      <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
      <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
      </div>
      <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
    </footer>

  </body>
</html>
