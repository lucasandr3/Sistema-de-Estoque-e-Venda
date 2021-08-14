  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Produto</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
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
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <button class="btn btn-app bg-default" data-toggle="modal" data-target="#modal-vendor"><i
                              class="fa fa-plus-square"></i> Cadastrar Produto
                      </button>
                      <a href="<?=BASE_URL?>categorias" class="btn btn-app bg-default">
                          <i class="fa fa-list"></i> Ir para Categorias
                      </a>
                      <a href="<?=BASE_URL?>estoque" class="btn btn-app bg-default">
                          <i class="fa fa-cubes"></i> Ir para Estoque
                      </a>
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
                          <!-- <th>Código do Produto</th> -->
                          <th>Nome do Produto</th>
                          <th>Categoria</th>
                          <th>Marca</th>
                          <th>Unidade</th>
                          <th>Preço</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <!-- <td class="text-capitalize"><?php echo $item['id_prod'] ?></td> -->
                          <td class="text-capitalize"><?php echo $item['nome_prod'] ?></td>
                          <td class="text-capitalize"><?php echo $item['categoria'] ?></td>
                          <td class="text-capitalize"><?php echo $item['marca'] ?></td>
                          <td class="text-capitalize"><?php echo $item['unidade'] ?></td>
                          <td class="text-green"><b>R$ <?php echo number_format($item['preco'],2,",",".") ?></b></td>
                          <td>
                              <a data-toggle="modal" data-target="#modal-details_prod<?=$item['id_prod']?>"
                                  class="btn btn-primary btn-sm btn-touch"><i class="fa fa-eye"></i></a>
                              <a href="<?=BASE_URL?>produtos/edit/<?=$item['id_prod']?>"
                                  class="btn btn-primary btn-sm btn-touch"><i class="fa fa-pencil"></i></a>
                              <a href="<?=BASE_URL?>produtos/etiquetas/<?=$item['id_prod']?>"
                                  class="btn btn-primary btn-sm btn-touch"><i class="fa fa-barcode"></i></a>
                          </td>
                      </tr>



                      <div class="modal fade" id="modal-details_prod<?=$item['id_prod']?>">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header" style="background-color:#2e4158;">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true" style="color:white">x</span></button>
                                      <h4 class="modal-title text-center text-capitalize" style="color:white">
                                          <?=$item['nome_prod']?></h4>
                                  </div>
                                  <div class="modal-body">

                                      <h2 style="margin-top:0px;"><?=$item['nome_prod']?></h2>

                                      <p><b>Código:</b> <?=$item['novo_cod']?></p>
                                      <p><b>Marca:</b> <?=$item['marca']?></p>
                                      <p><b>Categoria:</b> <?=$item['categoria']?></p>
                                      <p><b>Unidade:</b> <?=$item['unidade']?></p>
                                      <p><b>Custo:</b> <span
                                              class="text-green"><b><?=number_format($item['cost'],2,',','.')?></b></span>
                                      </p>
                                      <p><b>Preço de Venda:</b>
                                          <span
                                              class="text-green"><b><?=number_format($item['preco'],2,',','.')?></b></span>
                                      </p>
                                      <p><b>Alerta de Estoque:</b> <?=$item['alert']?> Unidades</p>
                                      <p><b>Data de Validade:</b> <?=date('d/m/Y', strtotime($item['validade_prod']))?>
                                      </p>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-touch pull-left"
                                          data-dismiss="modal" style="border-color:#999;">Fechar Detalhes do
                                          Produto</button>
                                  </div>
                              </div>
                              <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->

  <div class="modal fade" id="modal-vendor">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Produtos</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>produtos/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Código do Produto:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cube"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="novo_cod"
                                      placeholder="Digite o código" autofocus>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Nome do Produto:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cube"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="nome_prod"
                                      placeholder="digite o nome do produto" autofocus>
                              </div>
                          </div>

                      </div>

                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Categoria:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cube"></i>
                                  </div>
                                  <select class="form-control select2" name="categoria" style="width: 100%;" required>
                                      <option>Escolha uma Categoria</option>
                                      <?php foreach($cats as $c): ?>
                                      <option value="<?=$c['name_cat']?>"><?=$c['name_cat']?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>Marca:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-tag"></i>
                                  </div>
                                  <select class="form-control select2" style="width: 100%;" name="marca" required>
                                      <option>Escolha uma Marca</option>
                                      <?php foreach($brands as $b): ?>
                                      <option value="<?=$b['title']?>"><?=$b['title']?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>Unidade:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cube"></i>
                                  </div>
                                  <select class="form-control select2" style="width: 100%;" name="unidade" required>
                                      <option>Escolha uma Unidade</option>
                                      <?php foreach($units as $u): ?>
                                      <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Custo:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-money"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="custo" id="v_custo"
                                      placeholder="0.00" required>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Preço de Venda:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-money"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="preco" id="v_venda"
                                      placeholder="0.00" required>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Qtd para alerta de estoque:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cubes"></i>
                                  </div>
                                  <input type="number" class="form-control pull-right" id="" name="quantidade"
                                      placeholder="Ex: 10">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Data de Validade:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" class="form-control pull-right" value="" name="validade" id=""
                                      placeholder="00/00/0000" required>
                              </div>
                          </div>
                      </div>



              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn bg-purple pull-left">Cadastrar</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->