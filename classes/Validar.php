<?php

namespace App;

trait Validar
{
  private $errores = [];

  public function validarEmail($email){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->errores['email'] = 'Debe ser un email válido';
    }
  }

  public function validarClave($clave){

    if (strlen($clave)){
      $this->errores['clave']= 'La clave debe tener al menos 6 dígitos';
    }
  }

  public function confirmarClave( $clave1, $clave2 ){
    if ($clave1 != $clave2) {
      $this->errores['clave'] = 'Las claves no coinciden';
    }
  }

  public function validarUsuario($usuario) {

    if (strlen($usuario) <= 45) {
      $this->errores['usuario'] = 'El usuario no debe tener mas de 45 caracteres';
    } elseif (filter_var($usuario, FILTER_SANITIZE_STRING)) {
      $this->errores['usuario'] = 'El usuario debe tener solo letras y números';
    }
  }

  public function getErrores(){
    return $this->errores;
  }

}
