<?php include '../app/views/partials/header.php'; ?>
<div class="container mt-4 animate__fadeInDown">
    <h2>Bem-vindo, <?= $_SESSION['nome'] ?></h2>
    <p>Total de Visitas: <?= $visitas['total'] ?></p>
    <h3>Seus Projetos</h3>
    <ul>
        <?php foreach ($projetos as $p): ?>
            <li><?= $p['titulo'] ?> - <a href="editarProjeto/<?= $p['id'] ?>">Editar</a></li>
        <?php endforeach; ?>
    </ul>

    <h3>Vagas Recentes</h3>
    <?php foreach ($vagas as $vaga): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5><?= $vaga['titulo'] ?> - <?= $vaga['empresa'] ?></h5>
                <p><?= $vaga['descricao'] ?></p>
                <a href="<?= $vaga['link_vaga'] ?>" target="_blank">Ver Vaga</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include '../app/views/partials/footer.php'; ?>
