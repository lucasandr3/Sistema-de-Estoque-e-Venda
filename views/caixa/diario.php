	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <div class="row">
	        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
	            <ul class="breadcrumb">
	                <li><a href="<?=BASE_URL?>" style="color:#555;">Receitas</a></li>
	                <li><a href="" style="color:#555;">Nova Receita</a></li>
	            </ul>
	        </div>
	    </div>
	</section>

	<!-- Main content -->
	<section class="content"> 
	    <!-- Default box -->

	    <div class="box">
			<div class="box-header with-border">
              <div class="row">
                <div class="col-md-9">
                    <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
                </div>
                <div class="col-md-3">
                    <form action="" method="get">
                        <input type="date" name="filter_date" value="<?=($dtfc !== "")?$dtfc:date('Y-m-d')?>" style="height: 33px;"/>
                        <input type="submit" value="Filtrar Data" class="btn btn-success" style="margin-top:-5px;"/>
                    </form>
                </div>
              </div>
          	</div>
	        <div class="box-body">
	            <table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="9" class="td-total-gray">Resumo financeiro Loja do dia - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
	                    </tr>
						<tr>
							<th width="400">Operação</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Tax</th>
	                    </tr>
						<tr>
							<td colspan="">Venda em Dinheiro</td>
							<td><?=real($totais_paids['dinheiro'])?></td>
							<td class="text-success"><?=real($totais_paids['dinheiro'])?></td>
							<td class="text-danger">R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Loja</td>
							<td><?=real($totais_paids['cartao_c_lh'])?></td>
							<td class="text-success"><?=real($totais_paids['cartao_c_loja'])?></td>
							<td class="text-danger"><?=real($totais_paids['cartao_c_loja'] - $totais_paids['cartao_c_lh'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Débito Loja</td>
							<td><?=real($totais_paids['cartao_d_lh'])?></td>
							<td class="text-success"><?=real($totais_paids['cartao_d_loja'])?></td>
							<td class="text-danger"><?=real($totais_paids['cartao_d_loja'] - $totais_paids['cartao_d_lh'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Pix</td>
							<td><?=real($totais_paids['pix'])?></td>
							<td class="text-success"><?=real($totais_paids['pix'])?></td>
							<td class="text-danger">R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">PicPay</td>
							<td><?=real($totais_paids['picpay_hist'])?></td>
							<td class="text-success"><?=real($totais_paids['picpay'])?></td>
							<td class="text-danger"><?=real($totais_paids['picpay'] - $totais_paids['picpay_hist'])?></td>
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
							<th class="td-total-gray">Total</th>
							<td class="td-total-gray"><?=real($totalhist1)?></td>
							<td class="td-total-gray"><?=real($totall)?></td>
							<td class="td-total-gray"><?=real($totallt)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="11" class="td-total-gray">Resumo Financeiro Fornecedor do dia - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
	                    </tr>
						<tr>
							<th width="400">Operação</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Tax</th>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Fornecedor</td>
							<td><?=real($totais_paids['cartao_c_ph'])?></td>
							<td class="text-success"><?=real($totais_paids['cartao_c_parc'])?></td>
							<td class="text-danger"><?=real($totais_paids['cartao_c_parc'] - $totais_paids['cartao_c_ph'])?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Dédito Fornecedor</td>
							<td><?=real($totais_paids['cartao_d_ph'])?></td>
							<td class="text-success"><?=real($totais_paids['cartao_d_parc'])?></td>
							<td class="text-danger"><?=real($totais_paids['cartao_d_parc'] - $totais_paids['cartao_d_ph'])?></td>
	                    </tr>
						<tr>
							<?php
								$totalphist2 = $totais_paids['cartao_c_ph'] + $totais_paids['cartao_d_ph'];
								$totalp = $totais_paids['cartao_c_parc'] + $totais_paids['cartao_d_parc'];
								$totappt = $totais_paids['cartao_c_parc'] - $totais_paids['cartao_c_ph'] +
								$totais_paids['cartao_d_parc'] - $totais_paids['cartao_d_ph'];
							?>
							<th class="td-total-gray">Total</th>
							<td class="td-total-gray"><?=real($totalphist2)?></td>
							<td class="td-total-gray"><?=real($totalp)?></td>
							<td class="td-total-gray"><?=real($totappt)?></td>
						</tr>
	                </thead>
	            </table>


				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="9" class="td-total-gray">Bandeiras Cartão de Crédito Loja - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
	                    </tr>
						<tr>
							<th width="400">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Taxa</th>
	                    </tr>
						<tr>
							<td colspan="">Mastercard</td>
							<td><?=real($cmaster['cartao_master_hist'])?></td>
							<td class="text-success"><?=real($cmaster['cartao_master'])?></td>
							<td class="text-danger"><?=real($cmaster['cartao_master'] - $cmaster['cartao_master_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<td><?=real($cvisa['cartao_visa_hist'])?></td>
							<td class="text-success"><?=real($cvisa['cartao_visa'])?></td>
							<td class="text-danger"><?=real($cvisa['cartao_visa'] - $cvisa['cartao_visa_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<td><?=real($chiper['cartao_hiper_hist'])?></td>
							<td class="text-success"><?=real($chiper['cartao_hiper'])?></td>
							<td class="text-danger"><?=real($chiper['cartao_hiper'] - $chiper['cartao_hiper_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<td><?=real($celo['cartao_elo_hist'])?></td>
							<td class="text-success"><?=real($celo['cartao_elo'])?></td>
							<td class="text-danger"><?=real($celo['cartao_elo'] - $celo['cartao_elo_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<td><?=real($ccabal['cartao_cabal_hist'])?></td>
							<td class="text-success"><?=real($ccabal['cartao_cabal'])?></td>
							<td class="text-danger"><?=real($ccabal['cartao_cabal'] - $ccabal['cartao_cabal_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<td><?=real($camex['cartao_amex_hist'])?></td>
							<td class="text-success"><?=real($camex['cartao_amex'])?></td>
							<td class="text-danger"><?=real($camex['cartao_amex'] - $camex['cartao_amex_hist'])?></td>
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
							<th class="td-total-gray">Total</th>
							<td class="td-total-gray"><?=real($totalbrands1)?></td>
							<td class="td-total-gray"><?=real($totalbrands)?></td>
							<td class="td-total-gray"><?=real($totallbrands)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="9" class="td-total-gray">Bandeiras Cartão de Débito Loja - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
	                    </tr>
						<tr>
							<th width="400">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">total Taxa</th>
	                    </tr>
						<tr>
							<td colspan="">Mastercard</td>
							<td><?=real($cdmaster['cartao_masterd_hist'])?></td>
							<td class="text-success"><?=real($cdmaster['cartao_masterd'])?></td>
							<td class="text-danger"><?=real($cdmaster['cartao_masterd'] - $cdmaster['cartao_masterd_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<td><?=real($cdvisa['cartao_visad_hist'])?></td>
							<td class="text-success"><?=real($cdvisa['cartao_visad'])?></td>
							<td class="text-danger"><?=real($cdvisa['cartao_visad'] - $cdvisa['cartao_visad_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<td><?=real($cdhiper['cartao_hiperd_hist'])?></td>
							<td class="text-success"><?=real($cdhiper['cartao_hiperd'])?></td>
							<td class="text-danger"><?=real($cdhiper['cartao_hiperd'] - $cdhiper['cartao_hiperd_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<td><?=real($cdelo['cartao_elod_hist'])?></td>
							<td class="text-success"><?=real($cdelo['cartao_elod'])?></td>
							<td class="text-danger"><?=real($cdelo['cartao_elod'] - $cdelo['cartao_elod_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<td><?=real($cdcabal['cartao_cabald_hist'])?></td>
							<td class="text-success"><?=real($cdcabal['cartao_cabald'])?></td>
							<td class="text-danger"><?=real($cdcabal['cartao_cabald'] - $cdcabal['cartao_cabald_hist'])?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<td><?=real($cdamex['cartao_amexd_hist'])?></td>
							<td class="text-success"><?=real($cdamex['cartao_amexd'])?></td>
							<td class="text-danger"><?=real($cdamex['cartao_amexd'] - $cdamex['cartao_amexd_hist'])?></td>
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
							<th class="td-total-gray">Total</th>
							<td class="td-total-gray"><?=real($totalbrands2)?></td>
							<td class="td-total-gray"><?=real($totaldbrands)?></td>
							<td class="td-total-gray"><?=real($totalldbrands)?></td>
						</tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="11" class="td-total-gray">Despesas do dia - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
	                    </tr>
						<tr>
							<th width="300">Operação</th>
							<th width="150">Montante</th>
	                    </tr>
						<?php foreach($despesas as $d): ?>
						<tr>
							<td colspan=""><?=$d['descricao']?></td>
							<td class="text-danger"> - <?=real($d['valor'])?></td>
	                    </tr>
						<?php endforeach; ?>
						<tr>
							<th class="td-total-gray">Total</th>
							<td class="td-total-gray"><?=real($despesas_total['total'])?></td>
	                    </tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="2" class="td-total-gray">Fechamento do dia - <?=($dtfc === "")?date('d/m/Y'):date('d/m/Y', strtotime($dtfc))?></th>
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
							<td class="text-danger" style="font-weigth:bold;"><?=real($totais['total_tax'] - $totais['total'])?></td>
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
							<td class="text-danger" style="font-weigth:bold;"> - <?=real($despesas_total['total'])?></td>
	                    </tr>
						<tr>
							<td>Fechou Caixa Com</td>
							<td class="text-success" style="font-weigth:bold;"><?=(isset($caixa['valor_open']))?real($totais['total_tax'] + $caixa['valor_open']):'$ 0,00'?></td>
	                    </tr>
						<tr>
							<td class="td-total" style="text-align:left;">Fechamento do Caixa</td>
							<td class="td-total" style="text-align:left;"><?=(isset($caixa['valor_open']))?real($totais['total_tax'] + $caixa['valor_open'] - $despesas_total['total'] - $totais['total_desconto']):'$ 0,00'?></td>
	                    </tr>
	                </thead>
	            </table>

				<table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
						<tr>
							<th colspan="2">Abriu Caixa Com <i class="fa fa-arrow-down"></i></th>
							<th colspan="">Total em vendas<i class="fa fa-arrow-down"></i></th>
							<th colspan="">Total em vendas com Taxa <i class="fa fa-arrow-down"></i></th>
							<th colspan="">Total de Taxa <i class="fa fa-arrow-down"></i></th>
							<th colspan="">Fechou Caixa com <i class="fa fa-arrow-down"></i></th>
							<th colspan="">Imprimir <i class="fa fa-arrow-down"></i></th>
	                    </tr>
						<tr>
							<td colspan="2" class="td-total"><?=(isset($caixa['valor_open']))?real($caixa['valor_open']):'$0,00'?></td>
							<td class="td-total"><?=real($totais['total'])?></td>
							<td class="td-total"><?=real($totais['total_tax'])?></td>
							<td class="td-total"><?=real($totais['total_tax'] - $totais['total'])?></td>
							<td class="td-total"><?=(isset($caixa['valor_open']))?real($totais['total_tax'] + $caixa['valor_open']):'$ 0,00'?></td>
							<td class="td-total" style="padding:0px;">
								<?php if($dtfc): ?>
									<a href="<?=url('relatorios/imprimir_reduzido/'.$dtfc)?>" target="_blank" class="btn btn-primary btn-xs btn-block btn-flat" style="padding:9px;"><i class="fa fa-print"></i> imprimir</a>
								<?php else: ?>
									<a href="<?=url('relatorios/imprimir_reduzido/'.date('Y-m-d'))?>" target="_blank" class="btn btn-primary btn-xs btn-block btn-flat" style="padding:9px;"><i class="fa fa-print"></i> imprimir</a>
								<?php endif; ?>
							</td>
	                    </tr>
	                </thead>
	            </table>
	        </div>
	        <!-- /.box-body -->
	        <div class="overlay hide" id="load">
	            <i class="fa fa-refresh fa-spin"></i>
	        </div>
	    </div>
	    <!-- /.box -->

	</section>
	<!-- /.content -->
	<div class="modal fade" id="modal-default">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header" style="background-color:#2e4158;">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true" style="color:white">x</span></button>
	                <h4 class="modal-title text-center" style="color:white">Cadastro de Receitas</h4>
	            </div>
	            <div class="modal-body">
	                <form action="<?php echo BASE_URL ?>receitas/add" method="POST">
	                    <div class="row">
	                        <div class="form-group col-md-12">
	                            <label>Descrição:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-pencil"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="descricao" autofocus required>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row">
	                        <div class="form-group col-md-6">
	                            <label>Valor:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-money"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="valor" id="valorrec"
	                                    placeholder="0.00" required>
	                            </div>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label>Data:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-calendar"></i>
	                                </div>
	                                <input type="date" class="form-control pull-right" name="data_d" id=""
	                                    placeholder="00/00/0000" required>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row">
	                        <div class="form-group col-md-6">
	                            <label>Conta:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-bank"></i>
	                                </div>
	                                <select name="conta" class="form-control">
	                                    <option>Escolha uma Conta</option>
	                                    <option value="Conta Inicial">Conta Inicial</option>
	                                </select>
	                            </div>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label>Categoria:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-sitemap"></i>
	                                </div>
	                                <select name="id_cat" class="form-control">
	                                    <option value="">Categorias</option>
	                                    <?php foreach($cat_rec as $cat):?>
	                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
	                                    <?php endforeach ?>
	                                </select>
	                            </div>
	                        </div>

	                        <input class="hidden" type="text" name="id_user" value="<?php echo $info['id'] ?>">
	                    </div>

	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
	                <button type="submit" class="btn btn bg-purple pull-left">Salvar</button>
	            </div>
	            </form>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<style>
		.td-total {
			background-color: #0080009c;
			color: white;
			font-weight: bold;
		}
		.td-total-gray {
			background-color: #ccc;
			color: black;
			font-weight: bold;
		}
	</style>
	<script type="text/javascript">
var dt_inicial = <?php echo json_encode($viewData['data_inicial']); ?>;
var dt_final = <?php echo json_encode($viewData['data_final']); ?>;
	</script>