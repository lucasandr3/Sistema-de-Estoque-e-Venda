  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Usuários</a></li>
                  <li><a href="" style="color:#555;">Definir uma senha para permitir descontos na hora da venda</a></li>
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

      <div class="alert alert-info alert-dismissible" style="background-color:#2e4158 !important;border-color:white">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>
              <i class="icon fa fa-info"></i> <?php echo $viewData['info']['name'] ?>
          </h4>
          <p class="text-capitalize" style="font-size:14px">Nesta Tela Você irá criar uma senha para o usuário pode dar desconto na hora da venda</p>
      </div>

      <!-- Default box -->
      <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> <b><?=$userid['name']?></b></h3>
        </div>
          <div class="box-body">
              <form action="<?php echo BASE_URL ?>configuracao/editUserPassDiscountAction" method="POST">
                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Criar Senha:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-lock"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="passdiscount"
                                  placeholder="Digite aqui a senha">
                          </div>
                      </div>
                  </div>

                  <input type="hidden" class="form-control pull-right" name="id" value="<?=$userid['id_user']?>">

                  <button type="submit" class="btn btn bg-purple pull-left">Salvar Alterações</button>

              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->