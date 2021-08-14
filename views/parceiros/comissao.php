  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Parceiros</a></li>
                  <li><a href="" style="color:#555;">Comissão</a></li>
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
                      <a href="<?=BASE_URL?>parceiros" class="btn btn-app bg-default btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                      <a href="<?=BASE_URL?>parceiros" class="btn btn-app bg-default btn-touch"><i
                              class="fa fa-handshake-o"></i>Parceiros
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

              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Escolha o parceiro <span class="text-danger">*</span></label>
                          <select class="form-control capitalize" id="selectCom" required>
                              <option>Escolha o parceiro</option>
                              <?php foreach($parceiros as $p): ?>
                              <option value="<?=$p['id_parceiro']?>;<?=$p['nome_parc']?>;<?=$p['taxa_parc']?>">
                                  <?=$p['nome_parc']?></option>
                              <?php endforeach; ?>
                          </select>
                      </div><br>
                  </div>
              </div>



              <div class="row">
                  <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive tabela-re" width="100%">
                          <thead>
                              <tr>
                                  <th>Total de venda por indicação</th>
                                  <th>Comissão</th>
                                  <th>Total comissão</th>
                                  <th>Ação</th>
                              </tr>
                          </thead>

                          <tbody id="table-com">

                          </tbody>
                      </table>
                  </div>
                  <div class="overlay hide" id="loadd">
                      <i class="fa fa-refresh fa-spin"></i>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->