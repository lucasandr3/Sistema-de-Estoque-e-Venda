  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Permissões Items</a></li>
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
                      <a href="<?=BASE_URL?>permissions" class="btn btn-app bg-default btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-vendor"><i class="fa fa-plus-square"></i> Novo item de
                          Permissão
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
                          <th>Nome da permissão</th>
                          <th>Slug</th>
                          <th>Ação</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td><?php echo $item['nome'] ?></tdss=>
                          <td><?php echo $item['slug'] ?></td>
                          <td>
                              <a data-toggle="modal" data-target="#me<?= $item['id_p_item']?>"
                                  class="btn btn-primary btn-xs" style="color:white;">
                                  <i class="fa fa-edit"></i>
                                  Editar
                              </a>
                          </td>
                      </tr>


                      <div class="modal fade" id="me<?=$item['id_p_item']?>">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header" style="background-color:#2e4158;">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true" style="color:white">x</span></button>
                                      <h4 class="modal-title text-center" style="color:white">Editar Permissão</h4>
                                  </div>
                                  <div class="modal-body">
                                      <form action="<?= BASE_URL ?>permissions/items_edit/<?=$item['id_p_item']?>"
                                          method="POST">
                                          <div class="row">
                                              <div class="form-group col-md-12">
                                                  <label>Nome:</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                          <i class="fa fa-pencil"></i>
                                                      </div>
                                                      <input type="text" class="form-control pull-right"
                                                          placeholder="Digite um nome para a permissão" name="nome"
                                                          value="<?=$item['nome']?>" autofocus>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left"
                                          data-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn bg-purple pull-left">Salvar
                                          Alterações</button>
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

  <div class="modal fade" id="modal-vendor">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Permissão</h4>
              </div>
              <div class="modal-body">
                  <form action="<?= BASE_URL ?>permissions/items_add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Nome:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right"
                                      placeholder="Digite um nome para a permissão" name="nome" autofocus>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Slug:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" placeholder="Digite um slug"
                                      name="slug" autofocus>
                              </div>
                          </div>
                      </div>
                      <p><code>Para criar o slug as palavras devem ser separadas por underline (_)</code></p>
                      <p><code>Ex: ver_configurações => Slug: ver_config</code></p>

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