<?php

namespace App;
require_once('Conexion.php');
require_once('Validar.php');
//require_once('../funciones.php');

class Usuario extends Conexion{
  private $rutaAvatar='../trabajo_grupal/avatar/';
  private $nombreAvatar;
  

  use Validar;


  public function __construct(){
    parent::__construct();
  }

  public function prepararJson(){
    
          $usuariosJSON = [];
          //paso todo el archivo json para manipularlo despues
          $usuariosJSON = file_get_contents("usuarios.json");
    
          //divido el archivo en lineas para contarlas
          $handler = json_decode($usuariosJSON, true);
          //$Sql = "INSERT INTO usuarios (email, usuario, clave, ruta_imagen) VALUES (:email, :usuario, :clave, :ruta_imagen)";
          return $handler;
       }
    
       public function guardarUsuariosJson($data){
         $bd = 'usuarios.json';
          $data['clave'] = password_hash($data['clave'],PASSWORD_DEFAULT);
          $json=json_encode($data);
          $json['ruta_imagen'] = $this->nombreAvatar;
          $escribo= $json;
          $archivo = $bd;
          $escribo = $escribo."\n";
          fwrite ($recurso,$escribo);
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



  function crearDirectorio($destino){
    if(!file_exists($destino)){
      mkdir($destino, 0777, true);
    }
}

  public function guardarAvatar($datos) {
    $this->crearDirectorio($this->rutaAvatar);
    $imgFile = $datos['avatar']['name'];
    $tmp_dir = $datos['avatar']['tmp_name'];
    $imgSize = $datos['avatar']['size'];
    $avatar = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $userpic = rand(1000,1000000).".".$avatar;
    $destino = $this->rutaAvatar;
    $this->crearDirectorio($destino);
    move_uploaded_file($tmp_dir, $destino.$userpic);
    $this->nombreAvatar = $userpic;
    return $userpic;
  }


  public function login($usuario, $clave) {
    $Sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    //$this->errores['usuario'] = 'El usuario o contraseña son inválidos';
        $stmt = $this->getConexion()->prepare($Sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
    
        $resultados = $stmt->fetch( \PDO::FETCH_ASSOC );
        if($stmt->rowCount() > 0)
        {
           if(password_verify($clave, $resultados['clave']))
           {
              $_SESSION['usuario'] = $resultados['usuario'];
              $_SESSION['email']=$resultados['email'];
              $_SESSION['imagen'] = $resultados['ruta_imagen'];
              $_SESSION['login'] = true;
             
              header('Location: preferencias.php');
           }
           else
           {
            
           }
           $this->errores['usuario'] = 'El usuario o contraseña son inválidos';
        }
        $this->errores['usuario'] = 'El usuario o contraseña son inválidos';
 }


 public function editarDatos($datos) {
  
 }

 public function editarImagen() {

 }

  public function registrate($valores, $avatar) {
    $this->prepararJson();
    
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

      $this->validarAvatar($avatar);
     

      if (count($this->errores) == 0) {

        try {
          $Sql = "INSERT INTO usuarios ( email, usuario, clave, ruta_imagen) VALUES ( :email, :usuario, :clave, :ruta_imagen) ";
          
                $stmt = $this->getConexion()->prepare( $Sql );
                $stmt->bindParam(':email', $valores['email']);
                $stmt->bindParam(':usuario', $valores['usuario']);
                $stmt->bindValue(':clave',
                  password_hash($valores['clave'], PASSWORD_DEFAULT)
                );
                $stmt->bindValue(':ruta_imagen',
              $rutaImagen = $this->guardarAvatar($avatar));
                $stmt->execute();
          
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
              //logearme
              $_SESSION['email']=$valores['email'];
              $_SESSION['usuario']=$valores['usuario'];
              $_SESSION['imagen'] = $this->nombreAvatar;
              $_SESSION['login'] = true;

              $this->guardarUsuariosJson($valores);
        
        
        
        
        
              //redirigir a la pagina de bienvenidos
              header('location:preferencias.php');

      }

  	}
}
