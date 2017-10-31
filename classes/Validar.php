<?php

namespace App;

trait Validate
{
  private $errores = [];

  public function validarEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
  }

  public function validarClave( $var ){
    return strlen($var) >= 6;
  }

  public function confirmarClave( $clave1, $clave2 ){
    return ($clave1==$clave2);
  }

  public function validarUsername($username) {
    return (empty($username) && !filter_var($username, FILTER_SANITIZE_STRING))
  }

  public function validarImagen( $avatar ){
    if(isset($avatar)) {
      $file = $avatar['photo']['tmp_name'];
    $file_size = $avatar['photo']['size'];
    if (getimagesize($file_size )> 5242880) {
      return true;
    } else {
      return true;
    }
  }

  public function getErrores(){
    return $this->errores;
  }

}
}
