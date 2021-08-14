	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <div class="row">
	        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
	            <ul class="breadcrumb">
	                <li><a href="<?=BASE_URL?>" style="color:#555;">Relatórios</a></li>
	                <li><a href="" style="color:#555;">Vendas por Vendedor</a></li>
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
							<th colspan="9" class="td-total-gray">Resumo de Vendas por Vendedores</th>
	                    </tr>
						<tr>
							<th width="720">Vendedor</th>
							<th width="150" style="text-align:center;">Número de Vendas</th>
							<th width="160" style="text-align:center;">Total em Vendas</th>
	                    </tr>
						<?php foreach($list as $l): ?>
						<tr>
							<td colspan=""><?=$l['name']?></td>
							<td style="text-align:center"><?=$l['vendas'][0]['quantidade']?> Vendas</td>
							<td class="text-success" style="text-align:center"><?=real($l['vendas'][0]['total_vendas'])?></td>
	                    </tr>
						<?php endforeach; ?>	
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