  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Produtos</a></li>
                  <li><a href="" style="color:#555;">Estoque</a></li>
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
                          <th>Nome do Produto</th>
                          <th>Quantidade</th>
                          <th>Total Custo</th>
                          <th>Total Venda</th>
                          <th>Qtd Min</th>
                          <th>Status</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['nome_prod'] ?></td>
                          <td>
                              <?php if($item['qtd'] == '1'): ?>
                              <?=$item['qtd']?> Unidade
                              <?php else: ?>
                              <?=$item['qtd']?> Unidades
                              <?php endif; ?>
                          </td>
                          <td class="text-green"><b>R$ <?php echo number_format($item['total_custo'],2,",",".") ?></b>
                          </td>
                          <td class="text-green"><b>R$ <?php echo number_format($item['total_venda'],2,",",".") ?></b>
                          </td>
                          <td><?=$item['alert_qt']?> Undidades</td>
                          <td>
                              <?php $qts = $item['qtd'];?>
                              <?php if($qts > $item['alert_qt']): ?>
                              <a class="btn btn-success btn-xs">Bom</a>
                              <?php elseif($qts == $item['alert_qt']): ?>
                              <a class="btn btn-warning btn-xs">Atenção</a>
                              <?php elseif($qts < $item['alert_qt']): ?>
                              <a class="btn btn-danger btn-xs">Produto Abaixo do estoque</a>
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