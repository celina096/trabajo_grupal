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
    <title> RECUPERA TU CONTRASEÑA </title>
  </head>
  <body>
    <div class="container ">
      <?php include('header/header.html') ?>

      <div class="registro">
        <div class="form">
        <div class= "backgroundColor">


            <p class= 'registrate'> ¿ Deseas recuperar tu contraseña ? </p>
            <p> Danos la dirección de correo electrónico asociada a tu cuenta para que te enviemos un correo electrónico y puedas restablecer tu contraseña.</p>
          <form class="container" action="registrate.php" method="post" enctype="multipart/form-data" >

              <br>

              <input type="email" class="form-control" id="email" name="email" placeholder=" Ingrese su Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email']: '' ?>">
              <p class="text-danger">
                <?php if(isset($errores['email'])){
                    foreach($errores['email'] as $lista){
                      echo $lista.'<br>';
                    } } ?>
              </p>
            

              <br>

            <button  type="submit" name="enviar" value=""> Enviar </button>


          </form>
        </div> <!-- .backgroundColor -->
      </div> <!-- .container -->
      <?php include('footer/footer.html') ?>







  </body>
</html>
