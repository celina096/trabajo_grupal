<?php

namespace App;

trait Validar
{
  private $errores = [];

  public function validarEmail($email){

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->errores['email'] = 'Debe ser un email válido';
    }
  }

  public function validarClave( $clave ){

    if (strlen($clave)){
      $this->errores['clave']= 'La clave debe tener al menos 6 dígitos';
    }
  }

  public function confirmarClave( $clave1, $clave2 ){
    return ($clave1==$clave2);
  }

  public function validarUsuario($usuario) {
    return (strlen($usuario) <= 45);
  }

  public function getErrores(){
    return $this->errores;
  }

}
