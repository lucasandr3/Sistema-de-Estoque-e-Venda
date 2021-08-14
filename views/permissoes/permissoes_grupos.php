  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Permissões</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
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
                      <a href="<?=BASE_URL?>permissions" class="btn btn-app btn-default btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                      <a href="<?=BASE_URL?>permissions/grupoAdd" class="btn btn-app bg-default btn-touch">
                          <i class="fa fa-plus-square"></i> Novo Grupo de permissão
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
                          <th>Nome da função</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['nome_group'] ?></td>
                          <td>
                              <a href="<?=BASE_URL?>permissions/edit/<?=$item['id_group']?>"
                                  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                              <a href="<?=BASE_URL?>permissions/delete_group/<?=$item['id']?>"
                                  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Permissão</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>fornecedores/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Nome:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="name" autofocus>
                              </div>
                          </div>
                      </div>

                      <input class="hidden" type="text" name="id_user" value="<?php echo $info['id'] ?>">

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