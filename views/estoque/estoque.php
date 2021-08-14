  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Estoque</a></li>
                  <li><a href="" style="color:#555;">Saldo de Estoque</a></li>
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
      <div class="box" style="border-top: 3px solid #dd4b39;">
      <div class="box-header with-border" style="display:flex;justify-content:start;background-color:#dd4b393b;">
          <h3 class="box-title text-danger" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-cube"></i>
            <b>Produtos com estoque Negativo</b></h3>
          </div>
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
                      <?php if($item['qtd'] < $item['alert_qt']): ?>
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
                              <a class="btn btn-danger btn-xs">Produto Abaixo do estoque</a>
                          </td>
                      </tr>
                      <?php endif; ?>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->


      <!-- Default box -->
      <div class="box box-warning">
      <div class="box-header with-border bg-warning" style="display:flex;justify-content:start;">
          <h3 class="box-title text-orange" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-cube"></i>
            <b>Produtos com estoque em Atenção</b></h3>
          </div>
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
                      <?php if($item['qtd'] == $item['alert_qt'] + 5): ?>
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
                              <a class="btn btn-warning btn-xs">Atenção</a>
                          </td>
                      </tr>
                      <?php endif; ?>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- Default box -->
      <div class="box box-success ">
      <div class="box-header with-border bg-success" style="display:flex;justify-content:start;">
          <h3 class="box-title text-olive" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-cube"></i>
            <b>Produtos com estoque Bom</b></h3>
          </div>
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
                      <?php if($item['qtd'] > $item['alert_qt']): ?>
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
                              <a class="btn btn-success btn-xs">Bom</a>
                          </td>
                      </tr>
                      <?php endif; ?>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->