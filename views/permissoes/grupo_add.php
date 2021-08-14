  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Grupo de permissão</a></li>
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
                  <div class="col-md-4">
                      <a href="<?=BASE_URL?>permissions/grupos" class="btn btn-app btn-default btn-touch">
                          <i class="fa fa-arrow-left"></i> Voltar
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
              <form action="<?= BASE_URL ?>permissions/add_action" method="POST">

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Nome do Grupo:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-pencil"></i>
                              </div>
                              <input type="text" class="form-control pull-right" placeholder="Ex: Administrador"
                                  name="nome_group" autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Permissões que o grupo irá ter:</label>
                          <div class="input-group">

                              <?php foreach($permission_itens as $p): ?>
                              <div class="p_item" style="margin: 10px;">
                                  <input type="checkbox" name="items[]" value="<?php echo $p['id_p_item']; ?>"
                                      id="p_<?php echo $p['id_p_item']; ?>" />
                                  <label for="p_<?php echo $p['id_p_item']; ?>"><?php echo $p['nome']; ?></label>
                              </div>
                              <?php endforeach; ?>
                          </div>
                      </div>
                  </div>

                  <!-- <div class="row">

                      <input class="hidden" type="text" name="id_prod" value="<?php echo $produto['id_prod'] ?>">
                  </div> -->

                  <input type="submit" class="btn btn bg-purple" value="Cadastrar Grupo">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->