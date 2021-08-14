<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Produtos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <link rel="icon" href="../assets/img/logo_mini.jpg" type="image/gif" sizes="16x16">
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Maville</h1>
                <h5>Moda - Lista de Produtos</h5>
            </div>
        </div>

        <hr />

        <h3 class="text-center"><?=$nome?> <b> - <?= date('d/m/Y', strtotime($data)); ?></b></h3><br>

        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código do Produto</th>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($preco as $p): ?>
                        <tr>
                            <td><?=$p['id_prod']?></td>
                            <td class="text-capitalize"><?=$p['nome_prod']?></td>
                            <td><?=number_format($p['preco'],2,",",".")?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="0" class="text-left" style="font-size:17px;"><b>Total em Reais do Produtos</b></td>
                            <td>R$ <?=$total?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <style>
        td {
            text-align: left;
        }
        </style>

    </div>

</body>

</html>