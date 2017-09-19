<?php


require_once 'funciones.php';

$tipo_de_ingresos= array(
                  'sueldo'=>'Sueldo',
                  'clases'=>'Clases Particulares',
                  'horas'=>'Horas de Programacion',
                  'cliente1' =>'Cliente 1',
                  'cliente2' =>'Cliente 2',
                  'cliente3' =>'Cliente 3',
                  'cliente4' =>'Cliente 4',
                  'cliente5' =>'Cliente 5'
                  );

$forma_cobro= array(
                  'efectivo'=>'EFECTIVO',
                  'banco'=>'BANCO',
                  'cheque'=>'CHEQUE',
                  'visa' =>'TARJETA VISA '
                  );

$meses= array(
                  'enero'=>'ENERO',
                  'febrer'=>'FEBRERO',
                  'marzo'=>'MARZO',
                  'abril' =>'ABRIL',
                  'mayo' =>'MAYO',
                  'junio' =>'JUNIO',
                  'julio' =>'JULIO',
                  'agosto' =>'AGOSTO',
                  'septiembre' =>'SEPTIEMBRE',
                  'octubre' =>'OCTUBRE',
                  'noviembre' =>'NOVIEMBRE',
                  'diciembre' =>'DICIEMBRE'
                );
$periodo= array(
                  '2017'=>'2017',
                  '2018'=>'2018',
                  '2019' =>'2019'
                );



$ingreso = isset($_POST['ingreso']) ? $_POST['ingreso'] : null;
$importe = isset($_POST['importe']) ? $_POST['importe'] : null;
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
$cobranza = isset($_POST['cobranza']) ? $_POST['cobranza'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;


$errores= array();
if ($_POST['enviar']) {

  if (!requerido($importe)){
    $errores['importe']="el campo importe es requerido";
    }

    if (count($errores)==0){
      guardar($_POST);
    }


}



// if ($_POST['submit']) {
//   echo "entro!!";
// }

?>


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
     <title>INGRESOS</title>
   </head>
   <body>
     <div class="contenedor">
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
       <div class="contenido">
         <section class="parte1">
             <h2>Tus Ingresos</h2>
         <nav class="menu">
           <ul class=>
             <li class=>
               <a class="hvr-grow" href="tablero.html"><img class="submenu" src="images/tablet.svg" alt="" width="40px">TABLERO</a>
             </li>
             <li class=>
               <a class="hvr-grow" href="ingresos.html">  <img class="submenu" src="images/profits.svg" alt="" width="40px">INGRESOS</a>
             </li>
             <li class=>
               <a class="hvr-grow" href="#"><img class="submenu" src="images/loss.svg" alt="" width="40px">EGRESOS</a>
             </li>
             <li class="">
               <a class="hvr-grow" href="#"><img class="submenu" src="images/bank.svg" alt="" width="40px">BANCOS</a>
             </li>
           </ul>
         </nav> <!-- .menu -->
       </section> <!-- .parte1 -->
       <section>

             <div class="generales-ingresos">
            <form action="ingresos.php" method="post">
              <div class="parte2">
                <div class="periodo">
                  <div class="ano">Año
                    <select class="" name="ano">
                      <?php foreach ($periodo as $key => $value) {?>
                        <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mes">Mes
                    <select class="" name="mes">
                      <?php foreach ($meses as $key => $value) {?>
                        <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                      <?php } ?>

                   </select>
                  </div>
                </div>
                <div class="generales-ingresos">
                  <article class="">
                    <p class="encabezado">INGRESOS: <?php echo "$".sumar(); ?></p>
                  </article>

                </div>


                 <div>
                 <label for="ingreso">Ingreso</label>
                 <select class="" name="ingreso" id="ingresos">
                   <?php foreach ($tipo_de_ingresos as $key => $value) {?>
                     <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                   <?php } ?>

                 </select>
                 <label for="importe">Importe</label>
                 <input type="text" name="importe" class="" id="importe" value='<?php echo $importe ?>' placeholder="1000">
                 <?php if (isset($errores['importe'])){echo $errores['importe'];}else{ echo "";} ?><br/>


                   <label for="comentarios">COMENTARIOS</label>
                   <textarea class="" name="comentario" id="comentarios" rows="3"></textarea>
                 </div>

                 <div class="">
                   <label>
                     <?php foreach ($forma_cobro as $key => $value) {?>
                       <input type="radio" name="cobranza" id="optionsRadios1" value="<?php echo $key ?> " checked><?php echo
                       $value ?><br>
                     <?php }  ?>
                  </label>
                 </div>

                 <div class="">
                   <label>
                     <input type="checkbox">COBRADO?
                   </label>
                 </div>
                 <div class="boton">
                 <button type="submit" class="" name="enviar">GRABAR</button>
                 <button type="submit" name="buscar">BUSCAR</button>
                 <?php if (count($errores)==0) { ?>
                   <p>REGISTRO INGRESADO CON EXITO!!!</p>
                 <?php } ?>
                 </div>
                 <?php var_dump($errores) ?>
                 <?php var_dump($_POST['enviar']); ?>
            </form>

                <div class="generales-ingresos">
                  <?php if (isset($_POST['buscar'])) { ?>
                    <article class="">
                    <p class="encabezado">INGRESOS YA REGISTRADOS:</p>
                    </article>
                    <ol>
                        <li><?php leer() ?></li>
                  <?php } ?>
                  </ol>
                </div>
             </div>




           </section>
           <div class="grafico" id="grafico">
             <p class="encabezado">GRAFICO</p>
             <img src="images/ingresos.png" alt="grafico" width="60%">
           </div>

         </div> <!-- .parte2 -->
         <footer class="footerIndex">
           <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
           <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
           </div>
           <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
         </footer>
       </div> <!-- .contenido -->
 </div>
   </body>
 </html>
