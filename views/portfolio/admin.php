<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <title>Administração</title>
</head>
<body>
    <h1>Administração</h1>
    <form action="/portfolio/criar" method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <input type="file" name="imagem" required>
        <button type="submit">Adicionar</button>
    </form>
    <section class="projetos">
        <?php foreach ($projetos as $projeto): ?>
            <div class="projeto-card">
                <img src="/assets/uploads/<?= $projeto['imagem'] ?>" alt="<?= $projeto['titulo'] ?>">
                <h2><?= $projeto['titulo'] ?></h2>
                <p><?= $projeto['descricao'] ?></p>
                <form action="/portfolio/atualizar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $projeto['id'] ?>">
                    <input type="hidden" name="imagem_atual" value="<?= $projeto['imagem'] ?>">
                    <input type="text" name="titulo" value="<?= $projeto['titulo'] ?>" required>
                    <textarea name="descricao" required><?= $projeto['descricao'] ?></textarea>
                    <input type="file" name="imagem">
                    <button type="submit">Atualizar</button>
                </form>
                <a href="/portfolio/excluir?id=<?= $projeto['id'] ?>" class="btn-excluir">Excluir</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>