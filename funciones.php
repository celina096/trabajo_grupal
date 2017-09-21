<?php
function existe ($archivo){

if (file_exists($archivo)){
  $recurso=fopen ($archivo,'a+');
  }
  else {
  $recurso=fopen ($archivo,'w+');
  }
  return $recurso;
}

// NOTE: funciones de ingresos.php
// esta funcion de guardar, sirve tanto para guardar ingresos como los registros de usuarios
function guardar_ingreso($data,$bd){
if ($data) {
//$data es el post entero

        $json=$data;
        $escribo=json_encode ($json);
        $recurso= existe ($bd);
        $archivo = $bd;
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);
  }
}

function leer(){
  $recurso = existe("bd.json");
  while( $linea = fgets($recurso) ){
    $usuario = json_decode($linea, true);
    echo "Año: ".$usuario ['ano']." MES: ".$usuario ['mes']." ".$usuario ['ingreso'].": $".$usuario['importe']." COMENTARIO: ".$usuario ['comentario']." TIPO DE COBRANZA: ".$usuario['cobranza']."<br>";
  }
  return false;
}

function sumar(){
  $recurso = existe("bd.json");
  $suma =0;
  while( $linea = fgets($recurso) ){
    $usuario = json_decode($linea, true);
    $suma+=$usuario["importe"];

}

  return $suma;

}

// NOTE: funciones de register!!!
function guardar($data,$bd){
if ($data) {
//$data es el post entero

        $data['clave'] = password_hash($data['clave'],PASSWORD_DEFAULT);
        $json=$data;
        $escribo=json_encode ($json);
        $recurso= existe ($bd);
        $archivo = $bd;
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);
  }
}

function requerido($campo){
    if (trim($campo) == '') {
      return false;
    }else {
      return true;
          }

    }
function buscar_usuario($usuario_buscado,$bd){
$recurso = existe($bd);
    while( $linea = fgets($recurso) ){
      $usuario = json_decode($linea, true);
        if ($usuario["usuario"]==$usuario_buscado) {

          return $usuario;
          }
        }
      return false;
}




// FUNCIONES DE INDEX.PHP
function buscar_usu($buscar_usuario,$clave){
$recurso = existe("usuarios.json");
    while( $linea = fgets($recurso) ){
      $usuario = json_decode($linea, true);
        if ($usuario["usuario"]==$buscar_usuario && password_verify($clave , $usuario["clave"])) {
          return $usuario;
          }
        }
      return false;
}

?>
