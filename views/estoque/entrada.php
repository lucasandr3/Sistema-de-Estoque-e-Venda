  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Estoque</a></li>
                  <li><a href="" style="color:#555;">Entrada de Produtos</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
      <!-- Default box -->

      <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-4">
                      <a href="<?=BASE_URL?>estoque" class="btn btn-app bg-default btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- Mensagem flash -->
      <?php flash_messages::success(); ?>

      <?php flash_messages::danger(); ?>
      <!-- /Mensagem flash  -->
      <div class="box">
          <div class="box-body">
              <form method="POST" action="<?= BASE_URL ?>vendedores/createlist">

                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Fornecedor <span class="text-danger">*</span></label>
                              <select class="form-control capitalize" name="fornecedor" required>
                                  <option>Escolha o fornecedor</option>
                                  <?php foreach($list as $f): ?>
                                  <option value="<?=$f['nome']?>"><?=$f['nome']?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div><br>
                      </div>

                      <!-- <div class="col-md-4">
                          <div class="form-group">
                              <label>Data da Entrada <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="data_lista" placeholder="" autofocus />
                          </div><br>
                      </div> -->

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Nota Fiscal <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="nf" id="" placeholder="Ex: 300" />
                          </div><br>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <h5 class="background"><span><strong>Produtos</strong></span></h5>
                      </div>
                  </div>

                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Adicionar Produto</legend>
                      <div class="control-group">
                          <div class="controls bootstrap-timepicker">
                              <input type="text" id="add_prod" data-type="busca_prods" class="form-control"
                                  placeholder="Digite o Nome ou o código do produto" />
                              <i class="icon-time"></i>
                          </div>
                      </div>
                  </fieldset>

                  <div class="row">
                      <div class="col-md-12">
                          <table class="table table-bordered table-responsive" width="100%" id="table_id">
                              <thead>
                                  <tr>
                                      <th>Excluir</th>
                                      <th>Código do produto</th>
                                      <th>Produto</th>
                                      <th>Custo</th>
                                      <th>Preço</th>
                                      <th>Quantidade</th>
                                      <th>Qtd Min</th>
                                  </tr>
                              </thead>

                              <tbody id="products_table">

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <button class="btn btn bg-purple btn-flat" type="submit"><i class="fa fa-arrow-right"></i>
                      Salvar
                  </button>
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->