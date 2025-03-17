<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <title>Portfólio</title>
</head>
<body>
    <header>
        <h1>Meu Portfólio</h1>
        <nav>
            <a href="/portfolio/admin">Admin</a>
            <a href="/portfolio/dashboard">Dashboard</a>
        </nav>
    </header>
    <section class="projetos">
        <?php if (!empty($projetos)): ?>
            <?php foreach ($projetos as $projeto): ?>
                <div class="projeto-card">
                    <img src="/assets/uploads/<?= $projeto['imagem'] ?>" alt="<?= $projeto['titulo'] ?>">
                    <h2><?= $projeto['titulo'] ?></h2>
                    <p><?= $projeto['descricao'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum projeto encontrado.</p>
        <?php endif; ?>
    </section>
    <script src="/assets/js/script.js"></script>
</body>
</html>