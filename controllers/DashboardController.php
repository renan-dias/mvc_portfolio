<?php
require_once 'models/Visitantes.php';
require_once 'models/Vagas.php';

class DashboardController {
    private $visitantesModel;
    private $vagasModel;

    public function __construct() {
        $this->visitantesModel = new Visitantes();
        $this->vagasModel = new Vagas();
    }

    public function index() {
        $totalVisitantes = $this->visitantesModel->contarTotal();
        $visitasPorDia = $this->visitantesModel->contarPorDia();
        $vagas = $this->vagasModel->listarTodas();
        require_once 'views/portfolio/dashboard.php';
    }
}