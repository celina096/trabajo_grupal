<?php
//
namespace App;

class Conexion{
    private $conn;
    private $datos = [
      "host" => 'mysql:host=localhost;dbname=finanzas;charset=utf8mb4;port:3306',
      "user" => "root",
      "pass" => 'root',
      "opciones" => [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
    ];

    public function __construct(){
      try{
        $this->conn = new \PDO(
          $this->datos['host'],
           $this->datos['user'],
          $this->datos['pass'],
           $this->datos['opciones']);
      }catch( PDOException $e ){
        return $e->getMessage();
      }
    }

    public function getConexion(){
      return $this->conn;
    }
}
