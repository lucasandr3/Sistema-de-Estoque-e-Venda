  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Unidades</a></li>
                  <li><a href="" style="color:#555;">Edição de Unidade</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="box">
          <div class="box-body">
              <div class="row">
                  <div class="col-md-4">
                      <a href="<?=BASE_URL?>unidades" class="btn btn-app btn-touch">
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
              <form action="<?php echo BASE_URL ?>unidades/editAction" method="POST">

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Título da Unidade:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-pencil"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="unit_name"
                                  value="<?=$unidade['unit_name']?>" id="" placeholder="Digite o título da unidade">
                          </div>
                      </div>
                  </div>

                  <div class="row">

                      <input class="hidden" type="text" name="id_unit" value="<?php echo $unidade['id_unit'] ?>">
                  </div>

                  <input type="submit" class="btn btn bg-purple" value="Salvar alterações">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->