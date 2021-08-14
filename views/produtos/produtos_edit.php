  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Vendedores</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="box">
          <div class="box-body">
              <div class="row">
                  <div class="col-md-4">
                      <a href="<?=BASE_URL?>produtos" class="btn btn-app btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
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
              <form action="<?php echo BASE_URL ?>produtos/editAction" method="POST">

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>ID do produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$produto['id_prod']?>"
                                  name="" autofocus readonly>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Código do produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$produto['novo_cod']?>"
                                  name="novoid" autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Nome do Produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="nome_prod"
                                  value="<?=$produto['nome_prod']?>" id="" placeholder="Digite um nome para o produto">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Categoria:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <select class="form-control select2" name="categoria" required>
                                  <option value="<?=$produto['categoria']?>"><?=$produto['categoria']?></option>
                                  <?php foreach($cats as $c): ?>
                                  <option value="<?=$c['name_cat']?>"><?=$c['name_cat']?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Marca:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <select class="form-control select2" name="marca" required>
                                  <option value="<?=$produto['marca']?>"><?=$produto['marca']?></option>
                                  <?php foreach($brands as $b): ?>
                                  <option value="<?=$b['title']?>"><?=$b['title']?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Unidade:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <select class="form-control select2" name="unidade" required>
                                  <option value="<?=$produto['unidade']?>"><?=$produto['unidade']?></option>
                                  <?php foreach($units as $u): ?>
                                  <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Custo do Produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-money"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="custo"
                                  value="<?=$produto['custo']?>" id="v_custo" placeholder="0.00">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Preço do Produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-money"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="preco"
                                  value="<?=$produto['preco']?>" id="v_venda" placeholder="0.00">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>QTD para alerta de estoque:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="alert"
                                  value="<?=$produto['alert']?>" id="" placeholder="">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Data de Validade:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" class="form-control pull-right" value="<?=$produto['validade_prod']?>"
                                  name="validade" id="" placeholder="00/00/0000" required>
                          </div>
                      </div>
                  </div>


                  <div class="row">

                      <input class="hidden" type="text" name="id_prod" value="<?php echo $produto['id_prod'] ?>">
                  </div>

                  <input type="submit" class="btn btn bg-purple" value="Salvar alterações">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->