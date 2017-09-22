<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/contacto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Contacto</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php include('header/header.html') ?>
      <div class="contacto">
        <div class="form">
          <div class="backgroundColor">
            <h2>Envianos tus inquietudes</h2>
            <form class="contacto" action="index.html" method="post">
              <label for="name">Tu Nombre</label>
              <input id="name" type="text" name="name" value="">
              <br>
              <label for="email">Tu E-mail</label>
              <input id="email" type="text" name="email" value="">
              <br>
            </form>
            <label class="comment" for="comment">Comentario</label>
            <textarea name="comment" rows="8" cols="80"></textarea>
            <button type="submit" name="button">Enviar</button>
          </div> <!-- .backgroundColor -->
        </div>
      </div>
      <footer class="footerIndex">
        <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
        <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
        <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
      </footer>
    </div>
  </body>
</html>
