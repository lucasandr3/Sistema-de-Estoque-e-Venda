  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Despesas</a></li>
                  <li><a href="" style="color:#555;">Pagamento Parcelado (boletos a pagar)</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="alert alert-info alert-dismissible" style="background-color:#2e4158 !important;border-color:white">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>
              <i class="icon fa fa-info"></i> <?php echo $viewData['info']['name'] ?>
          </h4>
          <p class="text-capitalize" style="font-size:14px">Nesta Tela Você Pode Acompanhar Compras que você ira pagar
              em parcelas</p>
      </div>

      <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-4">
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-default"><i class="fa fa-plus-square"></i>Nova Despesa
                          Recorrente
                      </button>

                  </div>
              </div>
          </div>
      </div>
      <!-- Default box -->
      <div class="box">
          <div class="box-body">
              <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                  <thead>
                      <tr>
                          <th>Descrição</th>
                          <th>Total</th>
                          <th>Entrada</th>
                          <th>V.Parcela</th>
                          <th>Parcelas</th>
                          <th>Datas de Vencimento</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list_reco as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['descricao'] ?></td>
                          <td width="90">
                              <strong>
                                  <?php echo 'R$ '.number_format($item['valor'],2,',','.') ?>
                              </strong>
                          </td>
                          <td><strong>R$ <?php echo number_format($item['ventrada'],2,',','.') ?></strong></td>
                          <td class="text-red">
                              <strong>
                                  <?php $new_valor_total = (($item['juro']/100)*$item['valor']) ?>
                                  <?php $total_juros = $new_valor_total + $item['valor'] ?>

                                  <?php if ($total_juros == $item['valor']): ?>
                                  <?php $new_valor = $item['valor'] - $item['ventrada'] ?>
                                  <?php $valor_parc = $new_valor/$item['qtd_parc'] ?>
                                  <?php echo 'R$ '.number_format($valor_parc,2,',','.')." <small>Sem Juros</small>" ?>
                                  <?php else : ?>
                                  <?php $new_valor = $total_juros - $item['ventrada'] ?>
                                  <?php $valor_parc = $new_valor/$item['qtd_parc'] ?>
                                  <?php echo 'R$ '.number_format($valor_parc,2,',','.')." <small>Com Juros</small>" ?>
                                  <?php endif ?>
                              </strong>
                          </td>
                          <td><?php echo $item['qtd_parc'] ?> Parcelas</td>
                          <td>
                              <?php $qtdp       = $item['qtd_parc'] ?>
                              <?php $vparc      = $item['valor'] ?>
                              <?php $data_atual = $item['data_parc'] ?>
                              <?php for ($i=0; $i < $qtdp; $i++) { 
                    $data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));
                    $data_atual = $data;
                    echo "<button class='btn btn-danger fundor btn-xs' style='margin-left:3px'>".
                    date('d/m/Y', strtotime($data)).
                    "</button>";
                  } 
                  ?>
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

  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Despesas</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>despesas/addReco" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Descrição:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="descricao" autofocus
                                      required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Valor:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-money"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="valor" id="valordes"
                                      placeholder="0.00" required>
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>V.Entrada:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-money"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="ventrada" value="0.00"
                                      id="valorendes" placeholder="0.00">
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>Juros:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i>%</i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="juro" value="0.0"
                                      id="jurodes" placeholder="0.0">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Data de Vencimento:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" class="form-control pull-right" id="" name="data_parc"
                                      placeholder="00/00/0000" required>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Qtd Parcelas:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="qtd_parc" value="1">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Conta:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-bank"></i>
                                  </div>
                                  <select name="conta" class="form-control">
                                      <option value="Conta Inicial">Conta Inicial</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Categoria:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-sitemap"></i>
                                  </div>
                                  <select name="id_cat" class="form-control" required>
                                      <option value="">Categorias</option>
                                      <?php foreach($cat_des as $cat):?>
                                      <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
                                      <?php endforeach ?>
                                  </select>
                              </div>
                          </div>

                          <input class="hidden" type="text" name="id_user" value="<?php echo $info['id_user'] ?>">
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn bg-purple pull-left">Salvar</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->