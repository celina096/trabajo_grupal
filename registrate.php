<?php
require_once('funciones.php');

if (isset($_SESSION['usuario'])){
  header('Location: ingresos.php');

}else {

    $usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
    $clave= isset ($_POST['clave'])? $_POST['clave'] : null;
    $clave2= isset ($_POST['clave2'])? $_POST['clave2'] : null;

    $errores= array();

    if (isset($_POST['enviar'])) {

        if (!requerido($usuario)){
          $errores['usuario']="el campo USUARIO es requerido";
        }
        if (!requerido($clave)){
          $errores['clave']="el campo PASSWORD es requerido";
        }
        if (!requerido($clave2)){
          $errores['clave2']="el campo REPETIR PASSWORD es requerido";
        }
        if ($clave !==$clave2) {
          $errores['claves_distintas']="Las contraseñas no son iguales";
        }
        if (buscar_usuario($usuario,"usuarios.json")) {
          $errores['usuario_existe']="El usuario ya existe en la Base de datos!!";
        }

        if (count($errores)==0){
          guardar($_POST,"usuarios.json");

          header('Location: index.php');
        }

    }
}



 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/profile_menu.css">
    <link rel="stylesheet" href="css/registrate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>REGISTRATE</title>
  </head>
  <body>
    <div class="container ">
      <?php include('header/header.html') ?>

      <div class="registro">
        <div class="form">
        <div class= "backgroundColor">


          <p class= 'registrate'>REGISTRATE</p>
          <form class="container" action="registrate.php" method="post">

              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" value='<?php echo $usuario ?>'>
              <?php if (isset($errores['usuario'])){echo $errores['usuario'];}else{ echo "";} ?><br/>
              <?php if (isset($errores['usuario_existe'])){echo $errores['usuario_existe'];}else{ echo "";} ?>
              <label for="clave">Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" value="">
              <br>
              <label for="clave2">Repetir Contraseña</label>
              <br>
              <input id="clave2" type="password" name="clave2" value="">
              <?php if (isset($errores['claves_distintas'])){echo $errores['claves_distintas'];}else{ echo "";} ?><br/>

            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br>
            <button  type="submit" name="enviar" value="">Iniciar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
            <br>
            <a href="#">¿No estás registrado? Crea tu cuenta.</a>
          </form>
        </div> <!-- .backgroundColor -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
