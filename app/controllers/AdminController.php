<?php
class AdminController {
    public function dashboard() {
        global $pdo;
        session_start();
        $usuario_id = $_SESSION['usuario_id'] ?? null;

        if (!$usuario_id) {
            echo "Acesso negado.";
            return;
        }

        $stmt = $pdo->prepare("SELECT * FROM projetos WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        $projetos = $stmt->fetchAll();

        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM visitas WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        $visitas = $stmt->fetch();

        $stmt = $pdo->query("SELECT * FROM vagas_emprego ORDER BY data_postagem DESC LIMIT 5");
        $vagas = $stmt->fetchAll();

        include '../app/views/pages/dashboard.php';
    }
}
?>
