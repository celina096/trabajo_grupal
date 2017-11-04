<?php 

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



   public function guardarUsuariosJson(){
      $errorJson;
      $archivo = $this->prepararJson();
      if (count($archivo) > 0) {

         foreach ($archivo as $user) {
            $userArray = json_decode($user, true);
            $existe = $this->buscarEmail($userArray['email']);
            if ($existe['email'] == $userArray['email']) {
               $errorJson = "El usuario ". $userArray['email'] .  " ya existe en la db";
               echo $errorJson."<br>";
            }else {
               $this->guardar($userArray);
            }
         }
      }
   }
   
}


}