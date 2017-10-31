<?php
namespace App;
class User extends Conexion{

  private $username;
  private $password;
  private $email;

  use Validar;

  public function __construct(){
    parent::__construct();
  }

  public function __construct($username,$email,$password){
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }


  public function setUsername($username){
  $this->username = $username;
}
  public function getUsername(){
  return $this->username;
}

  public function setEmail($email){
  $this->email = $email;
}
  public function getEmail(){
  return $this->email;
}
  public function setPassword($password){
  $this->password = $password;
}
  public function getPassword(){
  return $this->password;
}


  public function register($valores){
    if( !$this->validarEmail( $valores['email'] ) ){
      $this->errores['email'][] = 'El Email es inválido';
    }else if( $this->buscarUsuarioEmail( $valores['email'] ) ){
      $this->errores['email'][] = 'El Email está repetido';
    }

    if( !$this->validarClave($valores['password']) ){
      $this->errores['password'][] =
       'El Password debe contener mínimo 6 caracteres';
    }else if( !$this->confirmarClave( $valores['password'],
            $valores['c_password'] )  ){
      $this->errores['c_password'][] = 'Las Passwords no coinciden';
    }

    if( count($this->errores)==0 ){
      $Sql = "INSERT INTO users ( email, password) VALUES (:email, :password) ";

      $stmt = $this->getConexion()->prepare( $Sql );
      $stmt->bindParam(':email', $valores['email']);
      $stmt->bindValue(':password',
        password_hash($valores['password'], PASSWORD_DEFAULT)
      );
      $stmt->execute();

      //logearme
      $_SESSION['usuario']['email']=$valores['email'];

      //redirigir a la pagina de bienvenidos
      header('location:perfil.php');
    }

  }
  // public function login (){
  //
  //   $this->auth_user($username,$password);
  // }
  // public function auth_user (){
  //   echo $this->username. "ha sido autenticado";
  // }


}
