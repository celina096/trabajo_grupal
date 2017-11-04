<?php 
require_once('../funciones.php');

class UsuarioJson extends Usuario{
	use Validar;

	private function prepararJson(){

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
        
        array_push ($data['usuario']=$usuario);
        $json=$data;
        $escribo=json_encode ($json);
        $recurso= existe ($bd);
        $archivo = $bd;
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);

   }
   

}


}