<?php

class User {

  private $username;
  private $password;
  private $email;



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


  public function register{
    echo " Se ha registrado";
  }
  public function login (){

    $this->auth_user($username,$password);
  }
  public function auth_user (){
    echo $this->username. "ha sido autenticado";
  }


}


$User=new User();
 $User->register();
$User->username= 'JohnDoe';
$User->password='1234';
$User->email='johndoe@gmail.com';
