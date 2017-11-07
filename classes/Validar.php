<?php

namespace App;

trait Validar
{
  private $errores = [];

  public function validarEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $this->errores['email'] = 'El email es inválido';
  }
  }

  public function validarClave($clave){

    if (strlen($clave) < 6){
      $this->errores['clave']= 'La clave debe tener al menos 6 dígitos';
    }
  }

  public function confirmarClave( $clave1, $clave2 ){
    if ($clave1 != $clave2) {
      $this->errores['clave'] = 'Las claves no coinciden';
    }
  }

  public function validarUsuario($usuario) {

    if (strlen($usuario) > 45) {
      $this->errores['usuario'] = 'El usuario no debe tener mas de 45 caracteres';
    } 
    if (!filter_var($usuario, FILTER_SANITIZE_STRING)) {
      $this->errores['usuario'] = 'El usuario debe tener solo letras y números';
    }
  }

  public function validarAvatar($datos) {

    $imgFile = $datos['avatar']['name'];
  //$tmp_dir = $avatar['user_image']['tmp_name'];
  $imgSize = $datos['avatar']['size'];
    $avatar = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$avatar;
   $imgExt =strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
   // allow valid image file formats
   if(in_array($imgExt,$valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     //move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $this->errores['avatar'] = "La imagen es muy pesada";
    }
   }
   else{
    $this->errores['avatar'] = "La imagen debe ser JPEG, JPG, PNG o GIF";  
   }
  }

  public function getErrores(){
    return $this->errores;
  }

}
