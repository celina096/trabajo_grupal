<?php
session_start();


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
function guardar_ingreso($data,$bd,$usuario){
if ($data) {
//$data es el post entero, $sesion es $_SESSION
        array_push ($data['usuario']=$usuario);
        $json=$data;
        $escribo=json_encode ($json);
        $recurso= existe ($bd);
        $archivo = $bd;
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);
  }
}

function leer($usu){
  $recurso = existe("bd.json");
  while( $linea = fgets($recurso) ){
    $usuario = json_decode($linea, true);
    if ($usuario['usuario']==$usu) {
    echo "Año: ".$usuario ['ano']." MES: ".$usuario ['mes']." ".$usuario ['ingreso'].": $".$usuario['importe']." COMENTARIO: ".$usuario ['comentario']." TIPO DE COBRANZA: ".$usuario['cobranza']."<br>";
    }
  }
  return false;
}


function reemplazar($oldData, $newData) {
  $handler = file_get_contents('usuarios.json');
  $handler = str_replace("$oldData", "$newData", $handler);
  file_put_contents('usuarios.json', $handler);
  $_SESSION['usuario'] = $newData;
}

function sumar($usu){

  $recurso = existe("bd.json");
  $suma =0;
  while( $linea = fgets($recurso) ){
    $usuario = json_decode($linea, true);
      if ($usuario['usuario']==$usu) {
        $suma+=$usuario["importe"];
      }
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

function buscar_email($email_buscado,$bd){
$recurso = existe($bd);
    while( $linea = fgets($recurso) ){
      $usuario = json_decode($linea, true);
        if ($usuario["email"]==$email_buscado) {

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

// MENSAJE DE RECUPERACION
$asunto_recupera = "Recupera tu contraseña";
$mensaje_recupera = "Su contraseña de recuperación es: ";


function buscar_clave($buscar_mail){
$recurso = existe("usuarios.json");
    while( $linea = fgets($recurso) ){
      $usuario = json_decode($linea, true);
        if ($usuario["email"]==$buscar_mail) {
          return $usuario['clave2'];
          }
        }
      return false;
}

function crearDirectorio($ruta){
    if(!file_exists($ruta)){
      mkdir($ruta, 0777);
    }
}

function guardarImagen($ruta, $input, $nombreDeseado) {
  if ($_FILES[$input]["error"] == UPLOAD_ERR_OK)
	{
		$nombre=$_FILES[$input]["name"];
		$archivo=$_FILES[$input]["tmp_name"];

		$ext = pathinfo($nombre, PATHINFO_EXTENSION);
		$miArchivo = $ruta;
		$miArchivo = $miArchivo . $nombreDeseado . '.' . $ext;
		move_uploaded_file($archivo, $miArchivo);
    return ['ruta' => $nombreDeseado . '.' . $ext ];
	}else{
    return ['error' => $_FILES[$input]['error']];
  }
}


function buscarAvatar($nombre_usuario) {
  $recurso = existe("usuarios.json");
      while( $linea = fgets($recurso) ){
        $usuario = json_decode($linea, true);
          if ($usuario["usuario"]==$nombre_usuario) {
            return $usuario['avatar'];
            }
          }
        return false;
}

?>
