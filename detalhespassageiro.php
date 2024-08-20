<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Passageiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Detalhes do Passageiro</h3>
        <?php
        include_once 'class/Passageiro.php';
        $ps = new Passageiro();
        $passageiro = $ps->listar($_GET['id'])[0]; // Busca passageiro por ID
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $passageiro['nome'] ?></h5>
                <p class="card-text">Email: <?= $passageiro['email'] ?></p>
            </div>
        </div>
        <a href="passageiroURL.php" class="btn btn-primary mt-3">Voltar</a>
    </div>
</body>
</html>
