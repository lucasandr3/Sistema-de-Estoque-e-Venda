  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Parceiros</a></li>
                  <li><a href="" style="color:#555;">Edição</a></li>
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
                      <a href="<?=BASE_URL?>parceiros" class="btn btn-app bg-default btn-touch">
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
              <form action="<?php echo BASE_URL ?>parceiros/editAction" method="POST">

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Nome:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-pencil"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="nome"
                                  value="<?=$parceiro['nome_parc']?>" autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Comissão:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  %
                              </div>
                              <input type="tel" class="form-control pull-right" id="taxam" name="taxa"
                                  placeholder="00000000000" value="<?=$parceiro['taxa_parc']?>">
                          </div>
                      </div>
                  </div>


                  <div class="row">

                      <input class="hidden" type="text" name="id_parceiro"
                          value="<?php echo $parceiro['id_parceiro'] ?>">
                  </div>

                  <input type="submit" class="btn btn bg-purple" value="Salvar alterações">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->