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
			<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="4" class="td-total-gray">Resumo financeiro Loja do dia - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="170">Operação</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Tax</th>
	                    </tr>
						<tr>
							<td colspan="">Venda em Dinheiro</td>
							<td><?=real($totais_paids['dinheiro'])?></td>
							<td><?=real($totais_paids['dinheiro'])?></td>
							<td>R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Loja</td>
							<td><?=real($totais_paids['cartao_c_lh'])?></td>
							<td><?=real($totais_paids['cartao_c_loja'])?></td>
							<td><?=real($totais_paids['cartao_c_loja'] - $totais_paids['cartao_c_lh'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Débito Loja</td>
							<td><?=real($totais_paids['cartao_d_lh'])?></td>
							<td><?=real($totais_paids['cartao_d_loja'])?></td>
							<td><?=real($totais_paids['cartao_d_loja'] - $totais_paids['cartao_d_lh'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Pix</td>
							<td><?=real($totais_paids['pix'])?></td>
							<td><?=real($totais_paids['pix'])?></td>
							<td>R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">PicPay</td>
							<td><?=real($totais_paids['picpay_hist'])?></td>
							<td><?=real($totais_paids['picpay'])?></td>
							<td><?=real($totais_paids['picpay'] - $totais_paids['picpay_hist'])?></td>
	                    </tr>
						<tr>
							<?php
								$totalhist1 = $totais_paids['dinheiro'] + $totais_paids['cartao_c_lh'] +
								$totais_paids['cartao_d_lh'] + $totais_paids['pix'] + $totais_paids['picpay_hist'];
								$totall = $totais_paids['dinheiro'] + $totais_paids['cartao_c_loja'] +
								$totais_paids['cartao_d_loja'] + $totais_paids['pix'] + $totais_paids['picpay'];
								$totallt = $totais_paids['cartao_c_loja'] - $totais_paids['cartao_c_lh'] +
								$totais_paids['cartao_d_loja'] - $totais_paids['cartao_d_lh'] + $totais_paids['picpay'] - $totais_paids['picpay_hist'];
							?>
							<th class="td-total-gray-t">Total</th>
							<td class="td-total-gray-t"><?=real($totalhist1)?></td>
							<td class="td-total-gray-t"><?=real($totall)?></td>
							<td class="td-total-gray-t"><?=real($totallt)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="4" class="td-total-gray">Resumo Financeiro Fornecedor do dia - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="170">Operação</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Tax</th>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Fornecedor</td>
							<td><?=real($totais_paids['cartao_c_ph'])?></td>
							<td><?=real($totais_paids['cartao_c_parc'])?></td>
							<td><?=real($totais_paids['cartao_c_parc'] - $totais_paids['cartao_c_ph'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Dédito Fornecedor</td>
							<td><?=real($totais_paids['cartao_d_ph'])?></td>
							<td><?=real($totais_paids['cartao_d_parc'])?></td>
							<td><?=real($totais_paids['cartao_d_parc'] - $totais_paids['cartao_d_ph'])?></td>
	                    </tr>
						<tr>
							<?php
								$totalphist2 = $totais_paids['cartao_c_ph'] + $totais_paids['cartao_d_ph'];
								$totalp = $totais_paids['cartao_c_parc'] + $totais_paids['cartao_d_parc'];
								$totappt = $totais_paids['cartao_c_parc'] - $totais_paids['cartao_c_ph'] +
								$totais_paids['cartao_d_parc'] - $totais_paids['cartao_d_ph'];
							?>
							<th class="td-total-gray-t">Total</th>
							<td class="td-total-gray-t"><?=real($totalphist2)?></td>
							<td class="td-total-gray-t"><?=real($totalp)?></td>
							<td class="td-total-gray-t"><?=real($totappt)?></td>
						</tr>
	                </thead>
	            </table>


				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="4" class="td-total-gray">Bandeiras Cartão de Crédito Loja - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="170">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Taxa</th>
	                    </tr>
						<tr>
							<td colspan="">Mastercard</td>
							<td><?=real($cmaster['cartao_master_hist'])?></td>
							<td><?=real($cmaster['cartao_master'])?></td>
							<td><?=real($cmaster['cartao_master'] - $cmaster['cartao_master_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<td><?=real($cvisa['cartao_visa_hist'])?></td>
							<td><?=real($cvisa['cartao_visa'])?></td>
							<td><?=real($cvisa['cartao_visa'] - $cvisa['cartao_visa_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<td><?=real($chiper['cartao_hiper_hist'])?></td>
							<td><?=real($chiper['cartao_hiper'])?></td>
							<td><?=real($chiper['cartao_hiper'] - $chiper['cartao_hiper_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<td><?=real($celo['cartao_elo_hist'])?></td>
							<td><?=real($celo['cartao_elo'])?></td>
							<td><?=real($celo['cartao_elo'] - $celo['cartao_elo_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<td><?=real($ccabal['cartao_cabal_hist'])?></td>
							<td><?=real($ccabal['cartao_cabal'])?></td>
							<td><?=real($ccabal['cartao_cabal'] - $ccabal['cartao_cabal_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<td><?=real($camex['cartao_amex_hist'])?></td>
							<td><?=real($camex['cartao_amex'])?></td>
							<td><?=real($camex['cartao_amex'] - $camex['cartao_amex_hist'])?></td>
						</tr>
						<tr>
							<?php
								$totalbrands1 = $cmaster['cartao_master_hist'] + $cvisa['cartao_visa_hist'] + 
								$chiper['cartao_hiper_hist'] + $celo['cartao_elo_hist'] + $ccabal['cartao_cabal_hist'] + $camex['cartao_amex_hist'];
								$totalbrands = $cmaster['cartao_master'] + $cvisa['cartao_visa'] + 
								$chiper['cartao_hiper'] + $celo['cartao_elo'] + $ccabal['cartao_cabal'] + $camex['cartao_amex'];
								$totallbrands = $cmaster['cartao_master'] - $cmaster['cartao_master_hist'] + 
								$cvisa['cartao_visa'] - $cvisa['cartao_visa_hist'] + 
								$chiper['cartao_hiper'] - $chiper['cartao_hiper_hist'] + 
								$celo['cartao_elo'] - $celo['cartao_elo_hist'] + 
								$ccabal['cartao_cabal'] - $ccabal['cartao_cabal_hist'] + 
								$camex['cartao_amex'] - $camex['cartao_amex_hist'];
							?>
							<th class="td-total-gray-t">Total</th>
							<td class="td-total-gray-t"><?=real($totalbrands1)?></td>
							<td class="td-total-gray-t"><?=real($totalbrands)?></td>
							<td class="td-total-gray-t"><?=real($totallbrands)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="4" class="td-total-gray">Bandeiras Cartão de Débito Loja - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="170">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">total Taxa</th>
	                    </tr>
						<tr>
							<td colspan="">Mastercard</td>
							<td><?=real($cdmaster['cartao_masterd_hist'])?></td>
							<td><?=real($cdmaster['cartao_masterd'])?></td>
							<td><?=real($cdmaster['cartao_masterd'] - $cdmaster['cartao_masterd_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<td><?=real($cdvisa['cartao_visad_hist'])?></td>
							<td><?=real($cdvisa['cartao_visad'])?></td>
							<td><?=real($cdvisa['cartao_visad'] - $cdvisa['cartao_visad_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<td><?=real($cdhiper['cartao_hiperd_hist'])?></td>
							<td><?=real($cdhiper['cartao_hiperd'])?></td>
							<td><?=real($cdhiper['cartao_hiperd'] - $cdhiper['cartao_hiperd_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<td><?=real($cdelo['cartao_elod_hist'])?></td>
							<td><?=real($cdelo['cartao_elod'])?></td>
							<td><?=real($cdelo['cartao_elod'] - $cdelo['cartao_elod_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<td><?=real($cdcabal['cartao_cabald_hist'])?></td>
							<td><?=real($cdcabal['cartao_cabald'])?></td>
							<td><?=real($cdcabal['cartao_cabald'] - $cdcabal['cartao_cabald_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<td><?=real($cdamex['cartao_amexd_hist'])?></td>
							<td><?=real($cdamex['cartao_amexd'])?></td>
							<td><?=real($cdamex['cartao_amexd'] - $cdamex['cartao_amexd_hist'])?></td>
						</tr>
						<tr>
							<?php
								$totalbrands2 = $cdmaster['cartao_masterd_hist'] + $cdvisa['cartao_visad_hist'] + 
								$cdhiper['cartao_hiperd_hist'] + $cdelo['cartao_elod_hist'] + $cdcabal['cartao_cabald_hist'] + $cdamex['cartao_amexd_hist'];
								$totaldbrands = $cdmaster['cartao_masterd'] + $cdvisa['cartao_visad'] + 
								$cdhiper['cartao_hiperd'] + $cdelo['cartao_elod'] + $cdcabal['cartao_cabald'] + $cdamex['cartao_amexd'];
								$totalldbrands = $cdmaster['cartao_masterd'] - $cdmaster['cartao_masterd_hist'] + 
								$cdvisa['cartao_visad'] - $cdvisa['cartao_visad_hist'] + 
								$cdhiper['cartao_hiperd'] - $cdhiper['cartao_hiperd_hist'] + 
								$cdelo['cartao_elod'] - $cdelo['cartao_elod_hist'] + 
								$cdcabal['cartao_cabald'] - $cdcabal['cartao_cabald_hist'] + 
								$cdamex['cartao_amexd'] - $cdamex['cartao_amexd_hist'];
							?>
							<th class="td-total-gray-t">Total</th>
							<td class="td-total-gray-t"><?=real($totalbrands2)?></td>
							<td class="td-total-gray-t"><?=real($totaldbrands)?></td>
							<td class="td-total-gray-t"><?=real($totalldbrands)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="2" class="td-total-gray">Despesas do dia - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="345">Operação</th>
							<th width="150">Montante</th>
	                    </tr>
						<tr>
							<td colspan="">Despesas</td>
							<td><?=real($despesa['despesas'])?></td>
	                    </tr>
						<tr>
							<th class="td-total-gray-t">Total</th>
							<td class="td-total-gray-t"><?=real($despesa['despesas'])?></td>
	                    </tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="2" class="td-total-gray">Fechamento do dia - <?=Data($data_venda)?></th>
	                    </tr>
						<tr>
							<th width="345">Operação</th>
							<th width="150">Montante</th>
	                    </tr>
						<tr>
							<td>Abriu Caixa Com</td>
							<td class="text-success" style="font-weigth:bold;"><?=(isset($caixa['valor_open']))?real($caixa['valor_open']):'$0,00'?></td>
	                    </tr>
						<tr>
							<td>Total em Vendas</td>
							<td class="text-success" style="font-weigth:bold;"><?=real($totais['total'])?></td>
	                    </tr>
						<tr>
							<td>Total em vendas com Taxa</td>
							<td class="text-success" style="font-weigth:bold;"><?=real($totais['total_tax'])?></td>
	                    </tr>
						<tr>
							<td>Total de Taxa</td>
							<td class="text-success" style="font-weigth:bold;"><?=real($totais['total_tax'] - $totais['total'])?></td>
	                    </tr>
						<tr>
							<td>Total Custo Vendido</td>
							<td class="text-success" style="font-weigth:bold;"><?=real($custo_venda['custo'])?></td>
	                    </tr>
						<tr>
							<td>Total Bruto Vendido</td>
							<td class="text-success" style="font-weigth:bold;"><?=real($totais['total_tax'])?></td>
	                    </tr>
						<tr>
							<td>Total de Desconto</td>
							<td class="text-danger" style="font-weigth:bold;"> - <?=real($totais['total_desconto'])?></td>
	                    </tr>
						<tr>
							<td>Despesas</td>
							<td class="text-danger" style="font-weigth:bold;"> - <?=real($despesa['despesas'])?></td>
	                    </tr>
						<tr>
							<td>Fechou Caixa Com</td>
							<td class="text-success" style="font-weigth:bold;"><?=(isset($caixa['valor_open']))?real($totais['total_tax'] + $caixa['valor_open']):'$ 0,00'?></td>
	                    </tr>
						<tr>
							<td class="td-total" style="text-align:left;">Fechamento do Caixa</td>
							<td class="td-total" style="text-align:left;"><?=(isset($caixa['valor_open']))?real($totais['total_tax'] + $caixa['valor_open'] - $despesa['despesas'] - $totais['total_desconto']):'$ 0,00'?></td>
	                    </tr>
	                </thead>
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
		.td-total-gray-t {
			background-color: #ccc;
			color: black;
			font-weight: bold;
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