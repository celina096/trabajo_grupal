<?php


require_once 'funciones.php';
require_once('classes/Usuario.php');

if (isset($_SESSION['login'])){
  header('Location: preferencias.php');
}
if($_POST){

  $user = new \App\Usuario();
  
  echo $user->login( $_POST['usuario'], $_POST['clave']);

  $errores = $user->getErrores();


  }


// $usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
// $clave= isset ($_POST['clave'])? $_POST['clave'] : null;

// $errores= array();


// if (isset($_POST['enviar'])) {

//     if (!requerido($usuario)){
//       $errores['usuario']="el campo USUARIO es requerido";
//     }
//     if (!requerido($clave)){
//       $errores['clave']="el campo CLAVE es requerido";
//     }
//     if (!buscar_usu($usuario,$clave)){
//       $errores['usuario_error']="Usuario o clave incorrecto";
//     }
//     $linea=buscar_usu($usuario,$clave);

//     if (count($errores)==0){
//       session_start();
//       $_SESSION['login']="ok";
//       $_SESSION['usuario']=$linea['usuario'];
//       header('Location: perfil.php');
//     }

// }
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="css/profile_menu.css">
    <link rel="stylesheet" href="css/registrate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title> INICIA SESIÓN </title>
  </head>
  <body>
    <div class="container ">
      <?php include('header/header.html') ?>

      <div class="registro">
        <div class= "backgroundColor">


            <p class='registrate'> INICIA SESIÓN </p>

          <form class="container" action="login.php" method="post">

              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario"  placeholder="Escriba su usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
              <?php echo (isset($errores['usuario'])) ? $errores['usuario'] : '' ?><br/>
             


              <label for="clave" >Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" value="" required>
              <br>




            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme"> Recordarme </label>
            <br>
            <button  type="submit" name="enviar" value="">Iniciar</button>

            <br>
            <br>
            <a  href="recupera.php">¿Has olvidado tu contraseña?</a>
            <br>
            <br>
            <a  href="registrate.php">¿No estás registrado? Crea tu cuenta.</a>

          </form>
        </div> <!-- .backgroundColor -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
