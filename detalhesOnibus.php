<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Ônibus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Detalhes do Ônibus</h3>
        <?php
        include_once 'class/Onibus.php';
        $on = new Onibus();
        $onibus = $on->listar($_GET['id'])[0]; // Busca ônibus por ID
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Placa: <?= $onibus['placa'] ?></h5>
                <p class="card-text">Modelo: <?= $onibus['modelo'] ?></p>
            </div>
        </div>
        <a href="onibusURL.php" class="btn btn-primary mt-3">Voltar</a>
    </div>
</body>
</html>
