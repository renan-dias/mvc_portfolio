<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Total de Visitantes: <?= $totalVisitantes ?></p>
    <canvas id="graficoVisitantes"></canvas>
    <h2>Vagas de Emprego</h2>
    <ul>
        <?php foreach ($vagas as $vaga): ?>
            <li><?= $vaga['titulo'] ?> - <?= $vaga['empresa'] ?> (<a href="<?= $vaga['link'] ?>">Link</a>)</li>
        <?php endforeach; ?>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoVisitantes').getContext('2d');
        const dados = {
            labels: [<?php foreach ($visitasPorDia as $visita) echo "'{$visita['dia']}',"; ?>],
            datasets: [{
                label: 'Visitantes por Dia',
                data: [<?php foreach ($visitasPorDia as $visita) echo "{$visita['total']},"; ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        new Chart(ctx, {
            type: 'bar',
            data: dados,
            options: { scales: { y: { beginAtZero: true } } }
        });
    </script>
</body>
</html>