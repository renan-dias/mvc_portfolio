<?php
require_once 'config/banco.php';

class Portfolio {
    private $conn;

    public function __construct() {
        $this->conn = conectar();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM projetos";
        $result = $this->conn->query($sql);
        // Retorna array vazio se não houver resultados
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function criar($titulo, $descricao, $imagem) {
        $sql = "INSERT INTO projetos (titulo, descricao, imagem) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $titulo, $descricao, $imagem);
        return $stmt->execute();
    }

    public function atualizar($id, $titulo, $descricao, $imagem) {
        $sql = "UPDATE projetos SET titulo=?, descricao=?, imagem=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $titulo, $descricao, $imagem, $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM projetos WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}