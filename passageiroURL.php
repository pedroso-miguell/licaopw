<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Passageiros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Lista de Passageiros</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'class/Passageiro.php';
                $ps = new Passageiro();
                $dados = $ps->listar(NULL);
                if (!empty($dados)) {
                    foreach ($dados as $passageiro) {
                        ?>
                        <tr>
                            <th scope="row"><?= $passageiro['id'] ?></th>
                            <td><?= $passageiro['nome'] ?></td>
                            <td>
                                <a href="detalhesPassageiro.php?id=<?= $passageiro['id'] ?>" class="btn btn-info">
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
