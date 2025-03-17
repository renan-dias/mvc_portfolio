<?php
class PortfolioController {
    public function exibirPortfolio($usuario_url) {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario_url = ?");
        $stmt->execute([$usuario_url]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            // Contar visita
            $ip = $_SERVER['REMOTE_ADDR'];
            $pdo->prepare("INSERT INTO visitas (usuario_id, ip) VALUES (?, ?)")
                ->execute([$usuario['id'], $ip]);

            // Buscar projetos
            $stmt = $pdo->prepare("SELECT * FROM projetos WHERE usuario_id = ?");
            $stmt->execute([$usuario['id']]);
            $projetos = $stmt->fetchAll();

            include '../app/views/pages/portfolio.php';
        } else {
            echo "Usuário não encontrado.";
        }
    }
}
?>
