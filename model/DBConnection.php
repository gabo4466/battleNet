<?php
require_once ("User.php");
class DBConnection {
    private $server     = "localhost";
    private $usuario    = "root";
    private $pass       = "1234";
    private $bd         = "battlenet";
    private $port       = "3360";
    private $connection;

    public function __construct(){
        $this->connection = new mysqli($this->server, $this->usuario, $this->pass, $this->bd, $this->port);
        $this->connection->select_db($this->bd);
        $this->connection->query("SET NAMES 'utf8';");
        if (!$this->connection){
            die("Conexion fallida". mysqli_connect_error());
        }
    }

    public function insertUser(User $user){

    }
}