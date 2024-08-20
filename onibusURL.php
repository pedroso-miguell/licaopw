<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ônibus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Lista de Ônibus</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'class/Onibus.php';
                $on = new Onibus();
                $dados = $on->listar(NULL);
                if (!empty($dados)) {
                    foreach ($dados as $onibus) {
                        ?>
                        <tr>
                            <th scope="row"><?= $onibus['id'] ?></th>
                            <td><?= $onibus['placa'] ?></td>
                            <td>
                                <a href="detalhesOnibus.php?id=<?= $onibus['id'] ?>" class="btn btn-info">
                                    <i class="fas fa-search"></i> Detalhes
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
