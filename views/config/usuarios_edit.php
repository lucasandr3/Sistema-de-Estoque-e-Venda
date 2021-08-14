  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Usuários</a></li>
                  <li><a href="" style="color:#555;">Edição de Usuário</a></li>
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
              <form action="<?php echo BASE_URL ?>configuracao/editUserAction" method="POST">
                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Nome:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="nome"
                                  value="<?=$userid['name']?>" autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>E-mail:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-at"></i>
                              </div>
                              <input type="email" class="form-control pull-right" name="email"
                                  value="<?=$userid['email']?>" autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Grupo de Permissão:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-object-group"></i>
                              </div>
                              <select class="form-control" name="grupo" required>
                                  <optgroup label="Grupo Atual">
                                      <option value="<?=$userid['id_permissao']?>"><?=$userid['nome_group']?></option>
                                  </optgroup>

                                  <optgroup label="Novo Grupo">
                                      <?php foreach($permission_groups as $group): ?>
                                      <option value="<?=$group['id_group']?>"><?=$group['nome_group']?></option>
                                      <?php endforeach; ?>
                                  </optgroup>
                              </select>
                          </div>
                      </div>

                      <input type="hidden" class="form-control pull-right" name="id" value="<?=$userid['id_user']?>">

                  </div>

                  <button type="submit" class="btn btn bg-purple pull-left">Salvar Alterações</button>

              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->