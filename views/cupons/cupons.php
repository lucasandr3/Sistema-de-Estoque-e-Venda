  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Cupons</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="box">
          <div class="box-header">
              <h3 class="box-title"><strong>Ações</strong></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal" data-target="#modal-msg"><i
                              class="fa fa-ticket"></i> Novo Cupon
                      </button>
                      <a href="<?=BASE_URL?>cupons/inativos" class="btn btn-app bg-default btn-touch"><i
                              class="fa fa-times"></i> Cupons Inativos
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
                          <th>Porcentagem do Cupon</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td><b><?= $item['valor_cupon'] ?> %</b></td>
                          <td>
                              <button class="btn btn-primary btn-xs btn-touch" data-toggle="modal"
                                  data-target="#modal-edit-cupon<?=$item['id_cupon']?>"><i class="fa fa-edit"></i>
                                  Editar
                              </button>
                              <a href="<?=BASE_URL?>cupons/status/<?=$item['id_cupon']?>"
                                  class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Desativar</a>
                          </td>
                      </tr>

                      <div class="modal fade" id="modal-edit-cupon<?=$item['id_cupon']?>">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header" style="background-color:#2e4158;">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true" style="color:white">x</span></button>
                                      <h4 class="modal-title text-center" style="color:white">Editar cupon</h4>
                                  </div>
                                  <div class="modal-body">
                                      <form action="<?php echo BASE_URL ?>cupons/editCupon" method="POST">
                                          <div class="row">
                                              <div class="form-group col-md-12">
                                                  <label>Porcentagem do desconto:</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                          %
                                                      </div>
                                                      <input type="text" class="form-control" name="cupon"
                                                          value="<?=$item['valor_cupon']?>" id="taxam"
                                                          placeholder="2.0" />
                                                  </div>
                                              </div>
                                          </div>
                                          <input class="hidden" type="text" name="id" value="<?=$item['id_cupon']?>">
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left"
                                          data-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn bg-purple pull-left">Salvar</button>
                                  </div>
                                  </form>
                              </div>
                              <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->

  <div class="modal fade" id="modal-msg">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Criar novo cupon</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>cupons/new" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Porcentagem do desconto:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      %
                                  </div>
                                  <input type="text" class="form-control" name="cupon" id="taxam" placeholder="2.0" />
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