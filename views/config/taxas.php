  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Configuração</a></li>
                  <li><a href="" style="color:#555;">Taxas</a></li>
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
                  <div class="col-md-10">
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-vendor"><i class="fa fa-plus-square"></i> Cadastrar Taxa
                      </button>
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
                          <th>Identificador</th>
                          <th>Operação</th>
                          <th style="text-align:right;">Ação</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['type'] ?></td>
                          <td class="text-capitalize"><?php echo $item['op'] ?></td>
                          <td style="text-align:right;">
                              <a href="<?=BASE_URL?>configuracao/ver_taxas/<?=$item['id_tax']?>/<?=$item['brand']?>"
                                  class="btn btn-primary btn-xs">% Ver Taxas</a>
                              <!-- <a href="<?=BASE_URL?>configuracao/del_taxa/<?=$item['id_tax']?>"
                                  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Excluir
                              </a> -->
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

  <div class="modal fade" id="modal-vendor">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Taxa</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>configuracao/addTaxa" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Taxa:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      %
                                  </div>
                                  <input type="text" class="form-control pull-right" name="taxa" autofocus>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Operação</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-address-card"></i>
                                  </div>
                                  <select class="form-control" name="op" required>
                                      <option value="credito">Crédito</option>
                                      <option value="debito">Débito</option>
                                  </select>
                              </div>
                          </div>

                      </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Parceiro</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-address-card"></i>
                                  </div>
                                  <select class="form-control" name="type" required>
                                      <option value="Loja">Loja</option>
                                      <option value="Parceiro">Parceiro</option>
                                  </select>
                              </div>
                          </div>

                      </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn bg-purple pull-left">Cadastrar</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->