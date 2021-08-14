  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Unidades</a></li>
                  <li><a href="" style="color:#555;">Nova Unidade</a></li>
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
                      <button class="btn btn-app bg-default" data-toggle="modal" data-target="#modal-vendor"><i
                              class="fa fa-cube"></i> Cadastrar Unidade
                      </button>
                      <a href="<?=BASE_URL?>produtos" class="btn btn-app bg-default">
                          <i class="fa fa-cubes"></i> Ir para Produtos
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
                          <th>Título da Unidade</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['unit_name'] ?></td>
                          <td>
                              <a href="<?=BASE_URL?>unidades/edit/<?=$item['id_unit']?>"
                                  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
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
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Unidade</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>unidades/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Título da Unidade:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-cube"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="unit_name"
                                      placeholder="Digite o título da unidade" autofocus>
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