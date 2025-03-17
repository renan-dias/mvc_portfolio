<?php
require_once 'config/banco.php';

class Vagas {
    private $conn;

    public function __construct() {
        $this->conn = conectar();
    }

    public function listarTodas() {
        $sql = "SELECT * FROM vagas";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}