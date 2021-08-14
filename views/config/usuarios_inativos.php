  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Usúarios</a></li>
                  <li><a href="" style="color:#555;">Usuários Inativos</a></li>
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
                      <a href="<?=BASE_URL?>configuracao/usuarios" class="btn btn-app bg-default btn-touch"><i
                              class="fa fa-arrow-left"></i> Voltar
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
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Usuário desde</th>
                          <th>Função</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['name'] ?></td>
                          <td><?php echo $item['email'] ?></td>
                          <td><?= date('d/m/Y', strtotime($item['date_create'])) ?></td>
                          <td class="text-capitalize"><?php echo $item['nome_group'] ?></td>
                          <td>
                              <a href="<?=BASE_URL?>configuracao/status/<?=$item['id_user']?>"
                                  class="btn btn-success btn-xs"><i class="fa fa-mail-reply"></i> Reintegrar
                              </a>
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
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Usuário</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>configuracao/addUser" method="POST">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Nome:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="name" autofocus>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>E-mail:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-at"></i>
                                  </div>
                                  <input type="email" class="form-control pull-right" name="email" id=""
                                      placeholder="Digite um E-mail">
                              </div>
                          </div>

                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Senha:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-lock"></i>
                                  </div>
                                  <input type="password" class="form-control pull-right" id="" name="password"
                                      placeholder="******">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Função</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-address-card"></i>
                                  </div>
                                  <select class="form-control" name="group" required>
                                      <option>Escolha a função</option>
                                      <?php foreach($permission_groups as $p): ?>
                                      <option value="<?=$p['id']?>"><?=$p['name']?></option>
                                      <?php endforeach; ?>
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