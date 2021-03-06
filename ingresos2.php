<?php
require_once('./funciones.php');
// NOTE: preguntas: como meto todo esto de php en una funcion?

if (!isset($_SESSION['login'])){
  header('Location: index.php');
}


$usuario=$_SESSION['usuario'];
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
if (isset($_POST['enviar'])) {

  if (!requerido($importe)){
    $errores['importe']="el campo importe es requerido";
    }

    if (count($errores)==0){
      guardar_ingreso($_POST,"bd.json",$usuario);
    }


}

?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="images/favicon.ico" type="image/gif">
     <link rel="stylesheet" href="css/ingresos2.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/hover.css" rel="stylesheet" media="all">
     <link href="css/animate.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
     <title>INGRESOS</title>
   </head>
   <body>
     <div class="contenedor">
        <?php include('header/header.php') ?>
       <div class="contenido">
        <?php include('./profile_menu/profile_menu.php') ?>
       <section>
          <div class="generales-ingresos">
            <form action="ingresos.php" method="post">
              <div class="parte2">
                <div class="periodo">
                  <div class="generales-ingresos">
                    <h1 class="title">INGRESOS</h1>
                    <article class="">
                      <p class="encabezado">USUARIO: <?php echo $usuario ?></p>
                    </article>
                    <article class="">
                      <p class="encabezado">INGRESOS POR $: <?php echo sumar($usuario); ?></p>
                    </article>

                  </div>
                  <div class="ano">Año
                    <select class="" name="ano">
                      <?php foreach ($periodo as $key => $value) {?>
                        <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                      <?php } ?>
                    </select>
                  </div> <!-- .ano -->
                  <div class="mes">
                    <h2>Mes</h2>
                    <select class="" name="mes">
                      <?php foreach ($meses as $key => $value) {?>
                        <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                      <?php } ?>

                   </select>
                 </div> <!-- .mes -->
               </div> <!-- .periodo -->
                <div>
                 <label for="ingreso">Ingreso</label>
                 <select class="" name="ingreso" id="ingresos">
                   <?php foreach ($tipo_de_ingresos as $key => $value) {?>
                     <option value="<?php echo $key ?>"><?php echo "$value"; ?></option>
                   <?php } ?>

                 </select>
                 <label for="importe">Importe</label>
                 <input type="number" name="importe" class="" id="importe" value='<?php echo $importe ?>' placeholder="1000" step="any">
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
                 <button type="submit" class="" name="enviar" value="true">GRABAR</button>
                 <button type="submit" name="buscar">BUSCAR</button>
                 <?php if (count($errores)==0) { ?>
                   <p>REGISTRO INGRESADO CON EXITO!!!</p>
                 <?php } ?>
                 </div>

            </form>

                <div class="generales-ingresos">
                  <?php if (isset($_POST['buscar'])) { ?>
                    <article class="">
                    <p class="encabezado">INGRESOS YA REGISTRADOS:</p>
                    </article>
                    <ol>
                        <li><?php leer($usuario) ?></li>
                  <?php } ?>
                  </ol>
                </div>
             </div>
           </section>
           <div class="grafico" id="grafico">
             <p class="encabezado">GRAFICO</p>
             <img src="images/ingresos.png" alt="grafico" width="500px">
           </div>
         </div> <!-- .parte2 -->
       </div> <!-- .contenido -->
     </div> <!-- .contenedor -->
     <?php include('footer/footer.html') ?>
   </body>
 </html>
