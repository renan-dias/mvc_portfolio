<?php
require_once 'config/banco.php';

class Visitantes {
    private $conn;

    public function __construct() {
        $this->conn = conectar();
    }

    public function registrarVisita($ip) {
        $sql = "INSERT INTO visitantes (ip) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $ip);
        $stmt->execute();
    }

    public function contarTotal() {
        $sql = "SELECT COUNT(*) as total FROM visitantes";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function contarPorDia() {
        $sql = "SELECT DATE(data_visita) as dia, COUNT(*) as total FROM visitantes GROUP BY dia";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}