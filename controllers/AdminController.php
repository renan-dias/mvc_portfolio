<?php
require_once 'models/Portfolio.php';

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new Portfolio();
    }

    public function index() {
        $projetos = $this->model->listarTodos();
        require_once 'views/portfolio/admin.php';
    }
}