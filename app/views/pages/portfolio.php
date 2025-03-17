<?php include '../app/views/partials/header.php'; ?>
<div class="container mt-4 animate__fadeInDown">
    <div class="text-center">
        <img src="<?= BASE_URL ?>img/<?= $usuario['foto_perfil'] ?>" class="rounded-circle" width="150">
        <h2><?= $usuario['nome'] ?></h2>
        <p><?= $usuario['bio'] ?></p>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($projetos as $p): ?>
            <div class="col-md-4">
                <div class="card card-hover mb-3 animate__fadeInDown">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['titulo'] ?></h5>
                        <p class="card-text"><?= $p['descricao'] ?></p>
                        <a href="<?= $p['link'] ?>" class="btn btn-primary" target="_blank">Ver Projeto</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include '../app/views/partials/footer.php'; ?>
