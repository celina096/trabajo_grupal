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
    if (empty($this->errores['email'])) {
      if ($this->buscarUsuarioEmail($valores['email'])) {
        $this->errores['email'] = 'El email ya está registrado';
      }
    }

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
        $this->validarClave($valores['clave']);
      }

      //$this->validarAvatar($avatar);
      
      if( count($this->errores)==0 ) {
        $Sql = "INSERT INTO users ( email, usuario,clave) VALUES (:email, :usuario, :clave) ";

         $stmt = $this->getConexion()->prepare( $Sql );
      $stmt->bindParam(':email', $valores['email']);
      $stmt->bindParam(':usuario', $valores['usuario']);
      $stmt->bindValue(':clave',
        password_hash($valores['clave'], PASSWORD_DEFAULT)
      );
      $stmt->execute();

      //logearme
      $_SESSION['email']=$valores['email'];
      $_SESSION['usuario']=$valores['usuario'];

      //redirigir a la pagina de bienvenidos
      header('location:perfil.php');
      }

  	}
}
