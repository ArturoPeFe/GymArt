<?php
namespace Clases;
use PDO;
use PDOException;

class Conexion{
    private $host;
    private $bd;
    private $user;
    private $pass;
    private $dsn;
    protected $conexion;

    public function __construct(){
        $this->host = "localhost";
        $this->bd = "gimnasio";
        $this->user = "root";
        $this->pass;
        $this->dsn = "mysql:host={$this->host}; dbname={$this->bd}; charset=utf8mb4";
        $this->crearConexion();
    }

    public function crearConexion(){
        try {
            $this->conexion = new PDO($this->dsn, $this->user);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión: mensaje: " . $e->getMessage());
        }
        return $this->conexion;
    }
}

?>