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
                <div class="col-md-7">
                    <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
                </div>
                <div class="col-md-5">
                    <form action="" method="get">
                        <input type="date" name="date_ini" value="<?=($dt_ini !== "")?$dt_ini:date('Y-m-d')?>" style="height: 33px;"/>
                        <input type="date" name="date_end" value="<?=($dt_end !== "")?$dt_end:date('Y-m-d')?>" style="height: 33px;"/>
                        <input type="submit" value="Filtrar Mês" class="btn btn-success" style="margin-top:-5px;"/>
                    </form>
                </div>
              </div>
          	</div>
	        <div class="box-body">
	            <table class="table table-bordered table-striped dt-responsive" width="100%">
	                <thead>
	                    <tr>
							<th colspan="9" class="td-total-gray">Resumo financeiro Loja do Mês de - <?=mesRel($dt_ini);?></th>
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
							<td><?=real($totais_paids['dinheiro'])?></td>
							<td class="text-danger">R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Loja</td>
							<?php
								$cartaoCL = $totais_paids['cartao_c_lh'] + $totais_paids['cartao_c_lh2'];
								$cartaoCLT = $totais_paids['cartao_c_loja'] + $totais_paids['cartao_c_loja2'];
							?>
							<td><?=real($cartaoCL)?></td>
							<td><?=real($cartaoCLT)?></td>
							<td class="text-danger"><?=real($cartaoCL - $cartaoCLT)?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Débito Loja</td>
							<?php
								$cartaoDL = $totais_paids['cartao_d_lh'] + $totais_paids['cartao_d_lh2'];
								$cartaoDLT = $totais_paids['cartao_d_loja'] + $totais_paids['cartao_d_loja2'];
							?>
							<td><?=real($cartaoDL)?></td>
							<td><?=real($cartaoDLT)?></td>
							<td class="text-danger"><?=real($cartaoDL - $cartaoDLT)?></td>
	                    </tr>
						<tr>
							<td colspan="">Pix</td>
							<td><?=real($totais_paids['pix'])?></td>
							<td><?=real($totais_paids['pix'])?></td>
							<td class="text-danger">R$ 0,00</td>
	                    </tr>
						<tr>
							<td colspan="">PicPay</td>
							<td><?=real($totais_paids['picpay_hist'])?></td>
							<td><?=real($totais_paids['picpay'])?></td>
							<td class="text-danger"><?=real($totais_paids['picpay_hist'] - $totais_paids['picpay'])?></td>
	                    </tr>
						<tr>
							<?php
								$totalhist1 = $totais_paids['dinheiro'] + 
								$totais_paids['cartao_c_lh'] + $totais_paids['cartao_c_lh2'] +
								$totais_paids['cartao_d_lh'] + $totais_paids['cartao_d_lh2'] +
								$totais_paids['pix'] + $totais_paids['picpay_hist'];

								$totall = $totais_paids['dinheiro'] + 
								$totais_paids['cartao_c_loja'] + $totais_paids['cartao_c_loja2'] +
								$totais_paids['cartao_d_loja'] + $totais_paids['cartao_d_loja2'] +
								$totais_paids['pix'] + $totais_paids['picpay'];

								$totallt = 
								$totais_paids['cartao_c_lh'] - $totais_paids['cartao_c_loja'] +
								$totais_paids['cartao_c_lh2'] - $totais_paids['cartao_c_loja2'] +
								$totais_paids['cartao_d_lh'] - $totais_paids['cartao_d_loja'] +
								$totais_paids['cartao_d_lh2'] - $totais_paids['cartao_d_loja2'] + 
								$totais_paids['picpay_hist'] - $totais_paids['picpay'];
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
							<th colspan="11" class="td-total-gray">Resumo Financeiro Fornecedor do Mês de - <?=mesRel($dt_ini);?></th>
	                    </tr>
						<tr>
							<th width="400">Operação</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Tax</th>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Crédito Fornecedor</td>
							<?php
								$cartaoParcC1 = $totais_paids['cartao_c_ph'] + $totais_paids['cartao_c_ph2'];
								$cartaoParcC2 = $totais_paids['cartao_c_parc'] + $totais_paids['cartao_c_parc2'];
							?>
							<td><?=real($cartaoParcC1)?></td>
							<td><?=real($cartaoParcC2)?></td>
							<td class="text-danger"><?=real($cartaoParcC2 - $cartaoParcC1)?></td>
	                    </tr>
						<tr>
							<td colspan="">Cartão de Dédito Fornecedor</td>
							<?php
								$cartaoParcD1 = $totais_paids['cartao_d_ph'] + $totais_paids['cartao_d_ph2'];
								$cartaoParcD2 = $totais_paids['cartao_d_parc'] + $totais_paids['cartao_d_parc2'];
							?>
							<td><?=real($cartaoParcD1)?></td>
							<td><?=real($cartaoParcD2)?></td>
							<td class="text-danger"><?=real($cartaoParcD2 - $cartaoParcD1)?></td>
	                    </tr>
						<tr>
							<?php
								$totalphist2 = $totais_paids['cartao_c_ph'] + $totais_paids['cartao_d_ph'] +
								$totais_paids['cartao_c_ph2'] + $totais_paids['cartao_d_ph2'];

								$totalp = $totais_paids['cartao_c_parc'] + $totais_paids['cartao_d_parc'] +
								$totais_paids['cartao_c_parc2'] + $totais_paids['cartao_d_parc2'];

								$totappt = $totais_paids['cartao_c_parc'] - $totais_paids['cartao_c_ph'] +
								$totais_paids['cartao_c_parc2'] - $totais_paids['cartao_c_ph2'] + 
								$totais_paids['cartao_d_parc'] - $totais_paids['cartao_d_ph'] +
								$totais_paids['cartao_d_parc2'] - $totais_paids['cartao_d_ph2'];
								
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
							<th colspan="9" class="td-total-gray">Bandeiras Cartão de Crédito Loja do Mês de - <?=mesRel($dt_ini);?></th>
	                    </tr>
						<tr>
							<th width="400">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">Total Taxa</th>
	                    </tr> 
						<tr>
							<td colspan="">Mastercard</td>
							<?php
								$cartaoMasterC1 = $cmaster['cartao_master_hist'] + $cmaster2['cartao_master_hist2'];
								$cartaoMasterC2 = $cmaster['cartao_master'] + $cmaster2['cartao_master2'];
							?>
							<td><?=real($cartaoMasterC1)?></td>
							<td><?=real($cartaoMasterC2)?></td>
							<td class="text-danger"><?=real($cartaoMasterC2 - $cartaoMasterC1)?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<?php
								$cartaoVisaC1 = $cvisa['cartao_visa_hist'] + $cvisa2['cartao_visa_hist2'];
								$cartaoVisaC2 = $cvisa['cartao_visa'] + $cvisa2['cartao_visa2'];
							?>
							<td><?=real($cartaoVisaC1)?></td>
							<td><?=real($cartaoVisaC2)?></td>
							<td class="text-danger"><?=real($cartaoVisaC2 - $cartaoVisaC1)?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<?php
								$cartaoHiperC1 = $chiper['cartao_hiper_hist'] + $chiper2['cartao_hiper_hist2'];
								$cartaoHiperC2 = $chiper['cartao_hiper'] + $chiper2['cartao_hiper2'];
							?>
							<td><?=real($cartaoHiperC1)?></td>
							<td><?=real($cartaoHiperC2)?></td>
							<td class="text-danger"><?=real($cartaoHiperC2 - $cartaoHiperC1)?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<?php
								$cartaoEloC1 = $celo['cartao_elo_hist'] + $celo2['cartao_elo_hist2'];
								$cartaoEloC2 = $celo['cartao_elo'] + $celo2['cartao_elo2'];
							?>
							<td><?=real($cartaoEloC1)?></td>
							<td><?=real($cartaoEloC2)?></td>
							<td class="text-danger"><?=real($cartaoEloC2 - $cartaoEloC1)?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<?php
								$cartaoCabalC1 = $ccabal['cartao_cabal_hist'] + $ccabal2['cartao_cabal_hist2'];
								$cartaoCabalC2 = $ccabal['cartao_cabal'] + $ccabal2['cartao_cabal2'];
							?>
							<td><?=real($cartaoCabalC1)?></td>
							<td><?=real($cartaoCabalC2)?></td>
							<td class="text-danger"><?=real($cartaoCabalC2 - $cartaoCabalC1)?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<?php
								$cartaoAmexC1 = $camex['cartao_amex_hist'] + $camex2['cartao_amex_hist2'];
								$cartaoAmexC2 = $camex['cartao_amex'] + $camex2['cartao_amex2'];
							?>
							<td><?=real($cartaoAmexC1)?></td>
							<td><?=real($cartaoAmexC2)?></td>
							<td class="text-danger"><?=real($cartaoAmexC2 - $cartaoAmexC1)?></td>
						</tr>
						<tr>
							<?php
								$totalbrands1 = 
								$cmaster['cartao_master_hist'] + $cmaster2['cartao_master_hist2'] +
								$cvisa['cartao_visa_hist'] + $cvisa2['cartao_visa_hist2'] +
								$chiper['cartao_hiper_hist'] + $chiper2['cartao_hiper_hist2'] +
								$celo['cartao_elo_hist'] + $celo2['cartao_elo_hist2'] +
								$ccabal['cartao_cabal_hist'] + $ccabal2['cartao_cabal_hist2'] + 
								$camex['cartao_amex_hist'] + $camex2['cartao_amex_hist2'];

								$totalbrands = 
								$cmaster['cartao_master'] + $cmaster2['cartao_master2'] +
								$cvisa['cartao_visa'] + $cvisa2['cartao_visa2'] + 
								$chiper['cartao_hiper'] + $chiper2['cartao_hiper2'] + 
								$celo['cartao_elo'] + $celo2['cartao_elo2'] + 
								$ccabal['cartao_cabal'] + $ccabal2['cartao_cabal2'] + 
								$camex['cartao_amex'] + $camex2['cartao_amex2'];

								$totallbrands = 
								$cmaster['cartao_master_hist'] - $cmaster['cartao_master'] +
								$cmaster2['cartao_master_hist2'] - $cmaster2['cartao_master2'] +  
								$cvisa['cartao_visa_hist'] - $cvisa['cartao_visa'] +
								$cvisa2['cartao_visa_hist2'] - $cvisa2['cartao_visa2'] +  
								$chiper['cartao_hiper_hist'] - $chiper['cartao_hiper'] +
								$chiper2['cartao_hiper_hist2'] - $chiper2['cartao_hiper2'] + 
								$celo['cartao_elo_hist'] - $celo['cartao_elo'] +
								$celo2['cartao_elo_hist2'] - $celo2['cartao_elo2'] +  
								$ccabal['cartao_cabal_hist'] - $ccabal['cartao_cabal'] +
								$ccabal2['cartao_cabal_hist2'] - $ccabal2['cartao_cabal2'] +  
								$camex['cartao_amex_hist'] - $camex['cartao_amex'] +
								$camex2['cartao_amex_hist2'] - $camex2['cartao_amex2'];
								
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
							<th colspan="9" class="td-total-gray">Bandeiras Cartão de Débito Loja do Mês de - <?=mesRel($dt_ini);?></th>
	                    </tr>
						<tr>
							<th width="400">Bandeira</th>
							<th width="100">Montante</th>
							<th width="100">Montante C/Tax</th>
							<th width="100">total Taxa</th>
	                    </tr>
						<tr>
							<td colspan="">Mastercard</td>
							<?php 
								$cartaoMasterD1 = $cdmaster['cartao_masterd_hist'] + $cdmaster2['cartao_masterd_hist2'];
								$cartaoMasterD2 = $cdmaster['cartao_masterd'] + $cdmaster2['cartao_masterd2'];
							?>
							<td><?=real($cartaoMasterD1)?></td>
							<td><?=real($cartaoMasterD2)?></td>
							<td class="text-danger"><?=real($cartaoMasterD2 - $cartaoMasterD1)?></td>
						</tr>
						<tr>
							<td colspan="">Visa</td>
							<?php 
								$cartaoVisaD1 = $cdvisa['cartao_visad_hist'] + $cdvisa2['cartao_visad_hist2'];
								$cartaoVisaD2 = $cdvisa['cartao_visad'] + $cdvisa2['cartao_visad2'];
							?>
							<td><?=real($cartaoVisaD1)?></td>
							<td><?=real($cartaoVisaD2)?></td>
							<td class="text-danger"><?=real($cartaoVisaD2 - $cartaoVisaD1)?></td>
						</tr>
						<tr>
							<td colspan="">Hipercard</td>
							<?php 
								$cartaoHiperD1 = $cdhiper['cartao_hiperd_hist'] + $cdhiper2['cartao_hiperd_hist2'];
								$cartaoHiperD2 = $cdhiper['cartao_hiperd'] + $cdhiper2['cartao_hiperd2'];
							?>
							<td><?=real($cartaoHiperD1)?></td>
							<td><?=real($cartaoHiperD2)?></td>
							<td class="text-danger"><?=real($cartaoHiperD2 - $cartaoHiperD1)?></td>
						</tr>
						<tr>
							<td colspan="">Elo</td>
							<?php 
								$cartaoEloD1 = $cdelo['cartao_elod_hist'] + $cdelo2['cartao_elod_hist2'];
								$cartaoEloD2 = $cdelo['cartao_elod'] + $cdelo2['cartao_elod2'];
							?>
							<td><?=real($cartaoEloD1)?></td>
							<td><?=real($cartaoEloD2)?></td>
							<td class="text-danger"><?=real($cartaoEloD2 - $cartaoEloD1)?></td>
						</tr>
						<tr>
							<td colspan="">Cabal Vale</td>
							<?php 
								$cartaoCabalD1 = $cdcabal['cartao_cabald_hist'] + $cdcabal2['cartao_cabald_hist2'];
								$cartaoCabalD2 = $cdcabal['cartao_cabald'] + $cdcabal2['cartao_cabald2'];
							?>
							<td><?=real($cartaoCabalD1)?></td>
							<td><?=real($cartaoCabalD2)?></td>
							<td class="text-danger"><?=real($cartaoCabalD2 - $cartaoCabalD1)?></td>
						</tr>
						<tr>
							<td colspan="">Amex</td>
							<?php 
								$cartaoAmexD1 = $cdamex['cartao_amexd_hist'] + $cdamex2['cartao_amexd_hist2'];
								$cartaoAmexD2 = $cdamex['cartao_amexd'] + $cdamex2['cartao_amexd2'];
							?>
							<td><?=real($cartaoAmexD1)?></td>
							<td><?=real($cartaoAmexD2)?></td>
							<td class="text-danger"><?=real($cartaoAmexD2 - $cartaoAmexD1)?></td>
						</tr>
						<tr>
							<?php
								$totalbrands2 = 
								$cdmaster['cartao_masterd_hist'] + $cdmaster2['cartao_masterd_hist2'] + 
								$cdvisa['cartao_visad_hist'] + $cdvisa2['cartao_visad_hist2'] + 
								$cdhiper['cartao_hiperd_hist'] + $cdhiper2['cartao_hiperd_hist2'] + 
								$cdelo['cartao_elod_hist'] + $cdelo2['cartao_elod_hist2'] + 
								$cdcabal['cartao_cabald_hist'] + $cdcabal2['cartao_cabald_hist2'] + 
								$cdamex['cartao_amexd_hist'] + $cdamex2['cartao_amexd_hist2'];

								$totaldbrands = 
								$cdmaster['cartao_masterd'] + $cdmaster2['cartao_masterd2'] + 
								$cdvisa['cartao_visad'] + $cdvisa2['cartao_visad2'] + 
								$cdhiper['cartao_hiperd'] + $cdhiper2['cartao_hiperd2'] + 
								$cdelo['cartao_elod'] + $cdelo2['cartao_elod2'] + 
								$cdcabal['cartao_cabald'] + $cdcabal2['cartao_cabald2'] + 
								$cdamex['cartao_amexd'] + $cdamex2['cartao_amexd2'];

								$totalldbrands = 
								$cdmaster['cartao_masterd_hist'] - $cdmaster['cartao_masterd'] +
								$cdmaster2['cartao_masterd_hist2'] - $cdmaster2['cartao_masterd2'] + 
								$cdvisa['cartao_visad_hist'] - $cdvisa['cartao_visad'] +
								$cdvisa2['cartao_visad_hist2'] - $cdvisa2['cartao_visad2'] + 
								$cdhiper['cartao_hiperd_hist'] - $cdhiper['cartao_hiperd'] +
								$cdhiper2['cartao_hiperd_hist2'] - $cdhiper2['cartao_hiperd2'] + 
								$cdelo['cartao_elod_hist'] - $cdelo['cartao_elod'] +
								$cdelo2['cartao_elod_hist2'] - $cdelo2['cartao_elod2'] +  
								$cdcabal['cartao_cabald_hist'] - $cdcabal['cartao_cabald'] +
								$cdcabal2['cartao_cabald_hist2'] - $cdcabal2['cartao_cabald2'] +  
								$cdamex['cartao_amexd_hist'] - $cdamex['cartao_amexd'] +
								$cdamex2['cartao_amexd_hist2'] - $cdamex2['cartao_amexd2'];
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
							<th colspan="11" class="td-total-gray">Despesas do Mês de - <?=mesRel($dt_ini);?></th>
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
							<th colspan="2" class="td-total-gray">Fechamento do Mês de - <?=mesRel($dt_ini);?></th>
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
								<a href="<?=url('relatorios/imprimir_mes/'.$dt_ini.'/'.$dt_end)?>" target="_blank" class="btn btn-primary btn-xs btn-block btn-flat" style="padding:9px;"><i class="fa fa-print"></i> imprimir</a>
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