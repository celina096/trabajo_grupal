<?php

namespace App;
require_once('Conexion.php');
require_once('Validar.php');

class Usuario extends Conexion{


  use Validar;

  public function __construct(){
    parent::__construct();
  }


  public function buscarUsuarioEmail($email) {
  	$Sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $this->getConexion()->prepare($Sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $resultados = $stmt->fetch( \PDO::FETCH_ASSOC );
    return $resultados;
  }

  public function buscarUsuario($usuario) {
  	$Sql = "SELECT * FROM usuarios WHERE usuario = :usuario";

  	$stmt = $this->getConexion()->prepare($Sql);
  	$stmt->bindParam(':usuario', $usuario);
  	$stmt->execute();

  	$resultados = $stmt->fetch( \PDO::FETCH_ASSOC );
  	return $resultados;
  }

  public function registrate($valores, $avatar) {
    //EMAIL
    $this->validarEmail($valores['email']);
    if (empty($this->errores ['email'])){
      if ($this->buscarUsuarioEmail($valores ['email'])) {
        $this->errores['email']='El email ya esta en uso';
      }
    }

<<<<<<< Updated upstream
    //USUARIO
      $this->validarUsuario($valores['usuario']);
      if (empty($this->errores['usuario'])) {
        if ($this->buscarUsuario($valores['usuario'])) {
          $this->errores['usuario'] = 'El nombre de usuario ya está en uso';
        }
      }
      //clave
      $this->confirmarClave($valores['clave'], $valores['clave2']);
      if (empty($this->errores['clave'])) {
        $this->validarEmail($valores['clave']);
      }
=======
    $this->validarUsuario($valores['usuario']);
     if (empty($this->errores['usuario'])) {
       if ($this->buscarUsuario($valores['usuario'])) {
         $this->errores['usuario'] = 'El nombre de usuario ya está en uso';
       }
     }
     //clave
     $this->confirmarClave($valores['clave'], $valores['clave2']);
     if (empty($this->errores['clave'])) {
       $this->validarEmail($valores['clave']);
     }



>>>>>>> Stashed changes

      $this->validarAvatar($avatar);
       

  	}
}
