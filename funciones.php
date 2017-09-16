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

        // echo "Esto es el POST<br>";
        //$data['clave'] = password_hash($data['clave'],PASSWORD_DEFAULT);

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
    return $usuario;
          }
          return false;
        }








?>
