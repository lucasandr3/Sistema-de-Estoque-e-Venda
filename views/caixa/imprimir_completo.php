<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<title>Relatório</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-12 text-center">
                <h1>SLD Nutrição Esportiva</h1>
                <h5>Lista de Vendas do dia <?=Data($viewData['data_venda'])?></h5>
            </div>
        </div>

		<br>

		<div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID da Venda</th>
                            <th>Total</th>
                            <th>Total Taxa</th>
                            <th>Total Desc</th>
                            <th>Tax. Venda</th>
                            <th>Desconto</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($vendas_rel as $venda): ?>
                        <tr>
                            <td>#<?=$venda['id_lista']?></td>
                            <td><?=real($venda['total'])?></td>
                            <td><?=real($venda['total_tax'])?></td>
                            <td>######</td>
                            <td><?=real($venda['total_tax'] - $venda['total'])?></td>
                            <td><?=real($venda['desconto'])?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
					<tfoot>
						<tr>
							<th class="td-total-gray">Qtd</th>
							<th class="td-total-gray">Total</th>
							<th class="td-total-gray">Total Taxa</th>
							<th class="td-total-gray">Total Desc.</th>
							<th class="td-total-gray">Total Tax</th>
							<th class="td-total-gray">Total de Desc</th>
						</tr>
						<tr>
							<td class="td-total"><?=$total_number_vendas?> vendas</td>
							<td class="td-total"><?=real($totais['total'])?></td>
							<td class="td-total"><?=real($totais['total_tax'])?></td>
							<td class="td-total"><?=real($totais['total_tax'] - $totais['total_desconto'])?></td>
							<td class="td-total"><?=real($totais['total_tax'] - $totais['total'])?></td>
							<td class="td-total"><?=real($totais['total_desconto'])?></td>
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
		.td-total-gray {
			background-color: #ccc;
			color: black;
			font-weight: bold;
			text-align:center;
		}
		.td-total {
			background-color: #0080009c;
			color: white;
			font-weight: bold;
			text-align:center;
		}
	</style>
</body>
</html>