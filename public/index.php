<?php
require_once '../config/config.php';

// URL amigável (ex: site.com/usuario)
$url = $_GET['url'] ?? 'home';
$urlParts = explode('/', $url);

// Checa se o usuário existe e exibe portfólio
if (count($urlParts) == 1 && $urlParts[0] !== 'admin') {
    require '../app/controllers/PortfolioController.php';
    $controller = new PortfolioController();
    $controller->exibirPortfolio($urlParts[0]);
    exit;
}

// Área admin
switch ($urlParts[0]) {
    case 'admin':
        require '../app/controllers/AdminController.php';
        $controller = new AdminController();
        $action = $urlParts[1] ?? 'dashboard';
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Página não encontrada.";
        }
        break;
    default:
        echo "Página não encontrada.";
}
?>
