<?php
require_once 'models/Portfolio.php';

class PortfolioController {
    private $model;

    public function __construct() {
        $this->model = new Portfolio();
    }

    public function index() {
        $projetos = $this->model->listarTodos();
        require_once 'views/portfolio/index.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->criar($_POST['titulo'], $_POST['descricao'], $_FILES['imagem']['name']);
            move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/uploads/' . $_FILES['imagem']['name']);
            header('Location: /portfolio/admin');
        }
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->atualizar($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_FILES['imagem']['name'] ?? $_POST['imagem_atual']);
            move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/uploads/' . $_FILES['imagem']['name']);
            header('Location: /portfolio/admin');
        }
    }

    public function excluir() {
        if (isset($_GET['id'])) {
            $this->model->excluir($_GET['id']);
            header('Location: /portfolio/admin');
        }
    }
}