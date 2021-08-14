	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <div class="row">
	        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
	            <ul class="breadcrumb">
	                <li><a href="" style="color:#555;">Despesas</a></li>
	                <li><a href="" style="color:#555;">Nova Despesa</a></li>
	            </ul>
	        </div>
	    </div>
	</section>

	<!-- Main content -->
	<section class="content">

	    <div class="box">
	        <div class="box-header with-border">
	            <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
	        </div>
	        <div class="box-body" style="padding: 0 10px;">
	            <div class="row" style="display:flex;align-items:center;">
	                <div class="col-md-4">
	                    <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
	                        data-target="#modal-default"><i class="fa fa-plus-square"></i> Nova
	                        Despesa
	                    </button>
	                </div>
	                <?php
            $ano = date('Y');
          ?>
	                <div class="col-md-4">
	                    <h5 class="box-title">Mostrar Despesas por Mês</h5>
	                </div>
	                <div class="col-md-4">
	                    <select class="form-control" name="mesSelect" id="mesDesSelect">
	                        <option value="<?=$ano.'-01-01'.','.$ano.'-01-31'?>" <?=(date('m') == '01')?'selected':'';?>>
	                            Janeiro de <?=$ano?></option>
	                        <option value="<?=$ano.'-02-01'.','.$ano.'-02-29'?>" <?=(date('m') == '02')?'selected':'';?>>
	                            Fevereiro de <?=$ano?></option>
	                        <option value="<?=$ano.'-03-01'.','.$ano.'-03-31'?>" <?=(date('m') == '03')?'selected':'';?>>
	                            Março de <?=$ano?></option>
	                        <option value="<?=$ano.'-04-01'.','.$ano.'-04-30'?>" <?=(date('m') == '04')?'selected':'';?>>
	                            Abril de <?=$ano?></option>
	                        <option value="<?=$ano.'-05-01'.','.$ano.'-05-30'?>" <?=(date('m') == '05')?'selected':'';?>>
	                            Maio de <?=$ano?></option>
	                        <option value="<?=$ano.'-06-01'.','.$ano.'-06-30'?>" <?=(date('m') == '06')?'selected':'';?>>
	                            Junho de <?=$ano?></option>
	                        <option value="<?=$ano.'-07-01'.','.$ano.'-07-31'?>" <?=(date('m') == '07')?'selected':'';?>>
	                            Julho de <?=$ano?></option>
	                        <option value="<?=$ano.'-08-01'.','.$ano.'-08-31'?>" <?=(date('m') == '08')?'selected':'';?>>
	                            Agosto de <?=$ano?></option>
	                        <option value="<?=$ano.'-09-01'.','.$ano.'-09-30'?>" <?=(date('m') == '09')?'selected':'';?>>
	                            Setembro de <?=$ano?></option>
	                        <option value="<?=$ano.'-10-01'.','.$ano.'-10-31'?>" <?=(date('m') == '10')?'selected':'';?>>
	                            Outubro de <?=$ano?></option>
	                        <option value="<?=$ano.'-11-01'.','.$ano.'-11-30'?>" <?=(date('m') == '11')?'selected':'';?>>
	                            novembro de <?=$ano?></option>
	                        <option value="<?=$ano.'-12-01'.','.$ano.'-12-31'?>" <?=(date('m') == '12')?'selected':'';?>>
	                            Dezembro de <?=$ano?></option>
	                    </select>
	                </div>
	            </div>
	        </div>
	        <!-- /.box-body -->
	    </div>
	    <!-- /.box -->

	    <!-- Default box -->
	    <div class="box">
	        <div class="box-body">
	            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
	                <thead>
	                    <tr>
	                        <th>Descrição</th>
	                        <th>Valor</th>
	                        <th>Data</th>
	                        <th>Categoria</th>
	                        <th>Conta</th>
	                    </tr>
	                </thead>

	                <tbody id="bodytabled">

	                </tbody>
	            </table>
	        </div>
	        <div class="overlay hide" id="loadd">
	            <i class="fa fa-refresh fa-spin"></i>
	        </div>
	        <!-- /.box-body -->
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
	                <h4 class="modal-title text-center" style="color:white">Cadastro de Despesas</h4>
	            </div>
	            <div class="modal-body">
	                <form action="<?php echo BASE_URL ?>despesas/add" method="POST">
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
	                                <input type="text" class="form-control pull-right" name="valor" id="valordes"
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
	                                    <option value="Loja">Conta Loja</option>
	                                    <option value="Pessoal">Conta Pessoal</option>
	                                </select>
	                            </div>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label>Categoria:</label>
	                            <div class="input-group">
	                                <div class="input-group-addon">
	                                    <i class="fa fa-sitemap"></i>
	                                </div>
	                                <select name="id_cat" class="form-control" required>
	                                    <option value="">Categorias</option>
	                                    <?php foreach($cat_des as $cat):?>
	                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
	                                    <?php endforeach ?>
	                                </select>
	                            </div>
	                        </div>

	                        <input class="hidden" type="text" name="id_user" value="<?php echo $info['id_user'] ?>">
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