<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Produtos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <link rel="icon" href="<?=BASE_URL?>assets/img/logo_mini.jpg" type="image/gif" sizes="16x16">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Maville</h1>
                <h5>Moda</h5>
            </div>
        </div>

        <hr />

        <h5 class="text-center">Lista de Produtos <b> - <?= date('d/m/Y', strtotime($vendor_list['data_lista'])); ?></b></h5><br>

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
                        <?php foreach($list_s as $l): ?>
                        <tr>
                            <td><?=$l['id_produto']?></td>
                            <td class="text-capitalize"><?=$l['nome_prod']?></td>
                            <td>R$ <?=number_format($l['preco'],2,",",".")?></td>
                            <td>
                                <?php if($l['quant'] == '1'): ?>
                                     <?=$l['quant']?> Peça       
                                <?php else: ?>
                                    <?=$l['quant']?> Peças  
                                <?php endif; ?>
                            </td>
                            <td>R$ <?=number_format($l['valor'],2,",",".")?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="0" class="text-left" style="font-size:14px;font-weight:bold;"><b>Total Produtos</b></td>
                            <td>R$ <?=number_format($list_total['total'],2,",",".")?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
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