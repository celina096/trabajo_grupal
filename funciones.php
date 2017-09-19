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

function guardar($data){
    //si post esta con datos:
    if ($data) {


        $json=$data;
        $escribo=json_encode ($json);
        $recurso= existe ("bd.json");
        $archivo = "bd.json";
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);

    //lo redirijo a que lo guardo y esta validado
    //header('Location: validado.php');
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
    $suma=number_format($usuario ['importe'],2, ',', ' ');
    $suma+=$suma;
  }
  return $suma;
}

function requerido($campo){
    if (trim($campo) == '') {
      return false;
    }else {
      return true;
          }

    }

?>
