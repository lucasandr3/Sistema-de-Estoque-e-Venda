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
              <form method="POST" action="<?= BASE_URL ?>" enctype="multipart/form-data">

                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Data da Lista <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="data_lista" required placeholder=""
                                  autofocus />
                          </div><br>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Vendedor(a) <span class="text-danger">*</span></label>
                              <select name="status" class="form-control" required>
                                  <option>Escolha o Vendedor(a)</option>
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
                              <input type="text" id="add_prod" data-type="buscaProds" class="form-control"
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
                                      <th>Produto</th>
                                      <th>Quantidade</th>
                                      <th>Valor Unitário</th>
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
                  <button class="btn btn-success" type="submit"><i class="fa fa-print"></i>
                    imprimir Lista
                  </button>
                  <button class="btn btn-success" type="submit"><i class="fa fa-print"></i>
                    Exportar Lista
                  </button>
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
  <script>
var id = '<?php echo json_encode(array_column($produtos,'id_prod ')); ?>';
var nome = '<?php echo json_encode(array_column($produtos,'nome_prod ')); ?>';
  </script>