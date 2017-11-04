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

  public function registrate($valores) {
    //EMAIL
    $this->validarEmail($valores['email']);
    if (empty($this->errores ['email'])){
      if ($this->buscarUsuarioEmail($valores ['email'])) {
        $this->errores['email']='El email ya esta en uso';
      }
    }



  	}
}
