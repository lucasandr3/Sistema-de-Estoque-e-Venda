  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Vendas</a></li>
                  <li><a href="" style="color:#555;">Todas as Vendas</a></li>
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
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-9">
                    <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
                </div>
                <div class="col-md-3">
                    <form action="" method="post">
                        <input type="date" name="filter_date" value="<?=($dtf !== "")? $dtf : '' ?>" style="height: 33px;"/>
                        <input type="submit" value="Filtrar Data" class="btn btn-success" style="margin-top:-5px;"/>
                    </form>
                </div>
              </div>
          </div>
          <div class="box-body">
              <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                  <thead>
                      <tr>
                          <th>Editada</th>
                          <th>Total da Venda</th>
                          <th>Pagamento</th>
                          <th>Data da Venda</th>
                          <th>Ações</th>
                      </tr>
                  </thead> 

                  <tbody>
                      <?php foreach($vendas_list as $item): ?>
                      <tr>
                          <td class="text-capitalize">
                            <?php if($item['edited'] === 'NO'): ?>
                               <span class="text-danger"><i class="fa fa-times"></i> Não editada</span>
                            <?php else: ?>
                                <span class="text-success"><i class="fa fa-check"></i> editada</span>
                            <?php endif; ?>
                          </td>
                          <td class="text-green"><b>R$ <?php echo number_format($item['total_tax'],2,',','.') ?></b>
                          </td>
                          <td class="text-capitalize" style="width: 180px;">
                            <?php $formP = explode( ',',$item['pay']);?>
                            <?php for($i=0; $i < count($formP); $i++ ): ?>
                                <p><?=$formP[$i]?></p>
                            <?php endfor;?>    
                          </td>
                          <td><?= date('d/m/Y', strtotime($item['data_lista'])) ?></td>
                          <td>
                              <button class="btn btn-success btn-xs btn-touch"
                                  onclick="vendasDetails('<?=$item['id_lista']?>')"><i class="fa fa-tag"></i>
                                  Detalhes da Venda
                              </button>
                              <button class="btn btn-primary btn-xs btn-touch"
                                  onclick="reciboVenda('<?=$item['id_lista']?>')"><i class="fa fa-print"></i>
                                  Recibo</button>
                                
                                    <a href="<?=BASE_URL?>vendas/atualizar/<?=$item['id_lista']?>" class="btn btn-primary btn-xs btn-touch">
                                        <i class="fa fa-edit"></i>
                                        Ver Venda
                                    </a> 
     
                                <?php if($item['status_venda'] === 'OPEN'): ?>
                                    <a href="<?=BASE_URL?>vendas/close_sale/<?=$item['id_lista']?>" class="btn btn-primary btn-xs btn-touch">
                                        <i class="fa fa-edit"></i>
                                        Fechar Venda
                                    </a>
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
  <div class="modal-loading-v"></div>
  <div id="modal-pedido-v"></div>
  <div id="modal-pedido-impressao-v"></div>

  <div class="modal-loading-vr"></div>
  <div id="modal-pedido-vr"></div>
  <div id="modal-pedido-impressao-vr"></div>