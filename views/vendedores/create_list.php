  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Vendedores</a></li>
                  <li><a href="" style="color:#555;">Lista</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
      <!-- Default box -->

      <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
              <a href="<?=BASE_URL?>vendedores/all" class="btn btn bg-purple btn-flat">
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
                              <label>Data da Entrada <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="data_lista" required placeholder=""
                                  autofocus />
                          </div><br>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Fornecedores <span class="text-danger">*</span></label>
                              <select name="id_vendor" class="form-control" required>
                                  <option>Escolha um Vendedor(a)</option>
                                  <?php foreach($vendors as $item): ?>
                                  <option value="<?=$item['id_vendor']?>" class="text-capitalize"><?=$item['nome']?></option>
                                  <?php endforeach; ?>
                              </select>
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
                                      <th>Preço</th>
                                      <th>Quantidade</th>
                                      <th>Total</th>
                                  </tr>
                              </thead>

                              <tbody id="products_table">

                              </tbody>

                              <tfoot id="totalNF">

                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <button class="btn btn bg-purple btn-flat" type="submit"><i class="fa fa-arrow-right"></i>
                   Criar Lista
                  </button>
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->