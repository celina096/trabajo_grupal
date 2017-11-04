<?php

require_once('funciones.php');
require_once('classes/Usuario.php');

if($_POST){

$user = new \App\Usuario();

$user->registrate( $_POST, $_FILES );
$errores = $user->getErrores();

}

// if (isset($_SESSION['usuario'])){
//   header('Location: ingresos.php');
//
// }else {
//
//     $usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
//     $clave= isset ($_POST['clave'])? $_POST['clave'] : null;
//     $clave2= isset ($_POST['clave2'])? $_POST['clave2'] : null;
//
//     $errores= array();
//
//     if (isset($_POST['enviar'])) {
//
//         if (!requerido($usuario)){
//           $errores['usuario']="el campo USUARIO es requerido";
//         }
//         if (!requerido($clave)){
//           $errores['clave']="el campo PASSWORD es requerido";
//         }
//         if (!requerido($clave2)){
//           $errores['clave2']="el campo REPETIR PASSWORD es requerido";
//         }
//         if ($clave !==$clave2) {
//           $errores['claves_distintas']="Las contraseñas no son iguales";
//         }
//         if (buscar_usuario($usuario,"usuarios.json")) {
//           $errores['usuario_existe']="El usuario ya existe en la Base de datos!!";
//         }
//         if (empty($_FILES['avatar']['name'])) {
//           $respuesta['avatar'] = "Debe subir una imagen";
//         }
//
//         if (count($errores)==0){
//           if(!empty($_FILES['avatar']['name'])){
//               print_r($_FILES);
//               $ruta=__DIR__.'/avatar/';
//               crearDirectorio($ruta);
//               $archivo = guardarImagen($ruta, 'avatar', md5($_FILES['avatar']['name'].time()) );
//               //print_r($archivo);
//               if(isset($archivo['error'])){
//                 $respuesta['avatar'] = $archivo['error'];
//               }
//               $_POST['avatar'] = (isset($archivo['ruta']) ? $archivo['ruta'] : null);
//             }
//             guardar($_POST,"usuarios.json");
//             session_start();
//             $_SESSION['login']="ok";
//             $_SESSION['usuario']=$_POST['usuario'];
//             header('Location: perfil.php');
//         }
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
    <title>REGISTRATE</title>
  </head>
  <body>
    <div class="container ">
      <?php include('header/header.html') ?>

      <div class="registro">
        <div class="form">
        <div class= "backgroundColor">


            <p class= 'registrate'>REGISTRATE</p>

          <form class="container" action="registrate.php" method="post" enctype="multipart/form-data" >

              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario"  placeholder="Escriba su usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
              <?php if (isset($errores['usuario'])){echo $errores['usuario'];}else{ echo "";} ?><br/>
              <label class="control-label" for="email"> E-mail </label><br/>
              <input type="email" class="form-control" id="email" name="email" placeholder=" Ingrese su Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email']: '' ?>">
              <p class="text-danger">
                <?php if(isset($errores['email'])){
                    foreach($errores['email'] as $lista){
                      echo $lista.'<br>';
                    } } ?>
              </p>
              <label for="clave" >Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" value="" required>
              <br>
              <label for="clave2">Repetir Contraseña</label>
              <br>
              <input id="clave2" type="password" name="clave2" value="">
              <?php if (isset($errores['clave'])){echo $errores['clave'];}else{ echo "";} ?><br/>
              <?php echo (isset($errores['email'])) ? $errores['email'] : '' ?>

              <div class="avatar" <?php echo (isset($errores['avatar'])) ? $errores['avatar'] : '' ?>>
              <label class="control-label"  for="avatar">Avatar : </label>
              <input type="file" id="avatar" name="avatar"  accept="image/*">
              <p class="text-danger">
              </div> <!-- .avatar -->


              <br>

            <br>
            <button  type="submit" name="enviar" value="">Iniciar</button>


          </form>
        </div> <!-- .backgroundColor -->
    </div> <!-- .container -->
    <?php include('footer/footer.html') ?>
  </body>
</html>
