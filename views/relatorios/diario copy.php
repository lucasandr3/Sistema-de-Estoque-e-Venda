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
                    <form action="" method="post">
                        <input type="date" name="filter_date" value="<?=($dtfc !== "")? $dtfc : '' ?>" style="height: 33px;"/>
                        <input type="submit" value="Filtrar Data" class="btn btn-success" style="margin-top:-5px;"/>
                    </form>
                </div>
              </div>
          	</div>
	        <div class="box-body">
	            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
	                <thead>
	                    <tr>
							<th>Abertura de Caixa</th>
	                        <th>Total</th>
	                        <th>Total com Taxa</th>
							<th>Fechou Caixa</th>	
	                        <th style="text-align:right;">Imprimir</th>
	                    </tr>
	                </thead>

	                <tbody id="bodytable">
						<tr>
							<td class="text-green"><strong><?=Real($caixa[0]['valor_open'])?></strong></td>
							<td class="text-green"><strong><?=Real($totais[0]['total'])?></strong></td>
							<td class="text-green"><strong><?=Real($totais[0]['total_tax'])?></strong></td>
							<?php $close_box = $totais[0]['total_tax'] + $caixa[0]['valor_open']; ?>
							<td class="text-green"><strong><?=Real($close_box)?></strong></td>
							<td style="text-align:right;">
								<div class='btn-group'>
								<a href='#' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Loja</a>
								<a href='#' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Parceiro</a>
								</div>
							</td>
						</tr>
	                </tbody>
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
	<script type="text/javascript">
var dt_inicial = <?php echo json_encode($viewData['data_inicial']); ?>;
var dt_final = <?php echo json_encode($viewData['data_final']); ?>;
	</script>