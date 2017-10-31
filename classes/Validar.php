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

  public function validarUsername() {
    // empy | inyectart | duplicado
  }

  public function validarImagen(){
//tarea
  }

  public function getErrores(){
    return $this->errores;
  }

}
}
