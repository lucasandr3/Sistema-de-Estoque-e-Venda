  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Estoque</a></li>
                  <li><a href="" style="color:#555;">Todas Saídas Manuais</a></li>
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
                      <a href="<?=BASE_URL?>estoque/entrada" class="btn btn-app bg-default">
                          <i class="fa fa-sign-in"></i> Entrada estoque
                      </a>
                      <a href="<?=BASE_URL?>estoque/saida" class="btn btn-app bg-default">
                          <i class="fa fa-sign-out"></i> Saída manual estoque
                      </a>
                      <a href="<?=BASE_URL?>produtos" class="btn btn-app bg-default">
                          <i class="fa fa-cube"></i> Ir para Produtos
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
                          <th>Quem Retirou</th>
                          <th>Observação</th>
                          <th>Data da Saída</th>
                          <th>Detalhes</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($saidas_list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['user'] ?></td>
                          <td>
                              <?php if($item['nota'] == ''): ?>
                              sem observação
                              <?php else: ?>
                              <?=$item['nota']?>
                              <?php endif; ?>
                          </td>
                          <td><?= date('d/m/Y', strtotime($item['data_saida'])) ?></td>
                          <td>
                              <button class="btn btn-success btn-xs btn-touch"
                                  onclick="saidaDetailsManual('<?=$item['id_saida']?>')"><i class="fa fa-list"></i>
                                  Produtos
                              </button>
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
  <div class="modal-loading-s"></div>
  <div id="modal-pedido-s"></div>
  <div id="modal-pedido-impressao-s"></div>