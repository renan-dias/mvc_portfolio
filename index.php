<?php
require_once 'controllers/PortfolioController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/DashboardController.php';
require_once 'models/Visitantes.php';

$visitantes = new Visitantes();
$visitantes->registrarVisita($_SERVER['REMOTE_ADDR']);

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/portfolio' || $path === '/') {
    $controller = new PortfolioController();
    $controller->index();
} elseif ($path === '/portfolio/admin') {
    $controller = new AdminController();
    $controller->index();
} elseif ($path === '/portfolio/dashboard') {
    $controller = new DashboardController();
    $controller->index();
} elseif ($path === '/portfolio/criar') {
    $controller = new PortfolioController();
    $controller->criar();
} elseif ($path === '/portfolio/atualizar') {
    $controller = new PortfolioController();
    $controller->atualizar();
} elseif ($path === '/portfolio/excluir') {
    $controller = new PortfolioController();
    $controller->excluir();
}