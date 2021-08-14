  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Produtos</a></li>
                  <li><a href="" style="color:#555;">Validade de Produto</a></li>
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
                      <a href="<?=BASE_URL?>produtos/vencidos" class="btn btn-app bg-default">
                          <i class="fa fa-times"></i> Produtos Vencidos
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
                          <th>Nome do Produto</th>
                          <th>Data de Vencimento</th>
                          <th>Status</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['nome_prod'] ?></td>
                          <td class="text-purple"><b><?=date('d/m/Y', strtotime($item['validade_prod'])) ?></b>
                          </td>
                          <td>
                              <?php $dataAtual = date('Y-m-d');?>
                              <?php if($item['validade_prod'] == $dataAtual): ?>
                              <a class="btn btn-warning btn-xs">Vence Hoje</a>
                              <?php else: ?>
                              <a class="btn btn-warning btn-xs">Atenção</a>
                              <?php endif; ?>
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