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

function leer($ano,$mes,$ingreso,$importe,$comentario,$cobranza){
  $recurso = existe("bd.json");
  while( $linea = fgets($recurso) ){
    $usuario = json_decode($linea, true);
    echo "Año: ".$usuario [$ano]." MES: ".$usuario [$mes]." ".$usuario [$ingreso].": $".$usuario[$importe]." COMENTARIO: ".$usuario [$comentario]." TIPO DE COBRANZA: ".$usuario[$cobranza]."<br>";
  }
  return false;
}

// NOTE: funciones de register!!!
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


// function buscar_usu($usuario){
//   $recurso = existe("usuarios.json");
//   while( $linea = fgets($recurso) ){
//     $linea = json_decode($linea, true);
//         if ($linea["usuario"]==$usuario) {
//         //  echo '-->Lo encontré<--';
//           return true;
//         }
//   }
//   return false;
// }
//
// function buscar_clave($clave){
//   $recurso = existe("usuarios.json");
//   while( $linea = fgets($recurso) ){
//     //echo 'linea->'.$linea.'<br>';
//     $linea = json_decode($linea, true);
//     //var_dump($linea);
//         if ($linea["clave"]==$clave) {
//         //  echo '-->Lo encontré<--';
//           return true;
//         }
//   }
//   return false;
// }
?>
