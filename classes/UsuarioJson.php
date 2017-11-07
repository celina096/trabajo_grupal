<?php
require_once('Usuario.php');


trait UsuarioJson{

   public function prepararJson(){

      $usuariosJSON = [];
      //paso todo el archivo json para manipularlo despues
      $usuariosJSON = file_get_contents("usuarios.json");

      //divido el archivo en lineas para contarlas
      $usuariosJSON = explode("\n", $usuariosJSON);

      //cuento la cantidad de lineas
      $cantidadUsuarios = count($usuariosJSON);

      //borro la ultima linea que esta vacia y retorno
      $lineaVacia = ($cantidadUsuarios - 1);
      unset($usuariosJSON[$lineaVacia]);

      return $usuariosJSON;

   }

   public function guardarUsuariosJson($data){
      $data['clave'] = password_hash($data['clave'],PASSWORD_DEFAULT);
      $json=$data;
      $json['ruta_imagen'] = 'hola';
      $escribo=json_encode ($json);
      $recurso= existe ($bd);
      $archivo = $bd;
      $escribo = $escribo."\n";
      fwrite ($recurso,$escribo);
   }


}

