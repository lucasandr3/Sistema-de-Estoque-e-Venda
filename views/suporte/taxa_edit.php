  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Taxas</a></li>
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
                  <div class="col-md-10">
                      <a href="<?=BASE_URL?>configuracao/taxas" class="btn btn-app bg-default btn-touch"><i
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
              <form action="<?php echo BASE_URL ?>configuracao/editTaxaAction" method="POST">
                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Taxa:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  %
                              </div>
                              <input type="text" class="form-control pull-right" name="taxa" value="<?=$taxa['taxa']?>"
                                  autofocus>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Operação</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-address-card"></i>
                              </div>
                              <select class="form-control" name="op" required>
                                  <option value="<?=$taxa['op']?>" selected><?=$taxa['op']?></option>
                                  <option value="credito">Crédito</option>
                                  <option value="debito">Débito</option>
                              </select>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Parceiro</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-address-card"></i>
                                  </div>
                                  <select class="form-control" name="type" required>
                                      <option value="<?=$taxa['type']?>" selected><?=$taxa['type']?></option>
                                      <option value="Loja">Loja</option>
                                      <option value="Parceiro">Parceiro</option>
                                  </select>
                              </div>
                          </div>

                      </div>
                      <input type="hidden" class="form-control pull-right" name="id_tax" value="<?=$taxa['id_tax']?>">

                  </div>

                  <button type="submit" class="btn btn bg-purple pull-left">Salvar Alterações</button>

              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->