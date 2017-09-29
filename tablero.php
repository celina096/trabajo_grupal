<?php
require_once('./funciones.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/ingresos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Tu Tablero</title>
  </head>
  <body>
    <div class="contenedor">
    <?php include_once('header/header.php') ?>
      <section class="parte1">
          <h2>Tu Tablero</h2>
      <nav class="menu">
        <ul class=>
          <li class=>
            <img class="submenu" src="images/tablet.svg" alt="" width="40px">
            <a class="hvr-grow" href="tablero.html">TABLERO</a>
          </li>
          <li class=>
            <img class="submenu" src="images/profits.svg" alt="" width="40px">
            <a class="hvr-grow" href="ingresos.html">INGRESOS</a>
          </li>
          <li class=>
            <img class="submenu" src="images/loss.svg" alt="" width="40px">
            <a class="hvr-grow" href="#">EGRESOS</a>
          </li>
          <li class="">
            <img class="submenu" src="images/bank.svg" alt="" width="40px">
            <a class="hvr-grow" href="#">BANCOS</a>
          </li>
        </ul>
      </nav> <!-- .menu -->
    </section> <!-- .parte1 -->
    <div class="parte2">
      <div class="periodo">
        <div class="ano">Año
          <select class="" name="">
            <option value="">2015</option>
            <option value="">2016</option>
            <option value="">2017</option>
            <option value="">2018</option>
            <option value="">2019</option>
          </select>
        </div>
        <div class="mes">MES
          <select class="" name="">
            <option value="">ENERO</option>
            <option value="">FEBRERO</option>
            <option value="">MARZO</option>
            <option value="">ABRIL</option>
            <option value="">MAYO</option>
            <option value="">JUNIO</option>
            <option value="">JULIO</option>
            <option value="">AGOSTO</option>
            <option value="">SEPTIEMBRE</option>
            <option value="">OCTUBRE</option>
            <option value="">NOVIEMBRE</option>
            <option value="">DICIEMBRE</option>
          </select>
        </div>
      </div>

      <section>
      <div class="generales-ingresos">
          <article class="">
            <p class="encabezado">RESULTADO: $1000</p>
          </article>
        <div class="generales-ingresos">
          <p class="encabezado">INGRESOS: $12.000</p>
        </div>
        <div class="generales-ingresos">
          <p class="encabezado">EGRESOS:$10.000</p>

        </div>
        <div class="generales-ingresos">
          <p class="encabezado">BANCO SANTANDER RIO: $1.000</p>
        </div>
      </section>
    </div> <!-- .parte2 -->
      <footer class="footerIndex">
        <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
        <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
        </div>
        <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
      </footer>
    </div>
  </body>
</html>
