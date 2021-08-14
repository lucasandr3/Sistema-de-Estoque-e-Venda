  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Taxas</a></li>
                  <li><a href="" style="color:#555;">Taxas do cartão</a></li>
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
      <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-credit-card"></i> <b>Cartão - <?=$brand?></b></h3>
          </div>
          <div class="box-body">
              <form action="<?php echo BASE_URL ?>configuracao/editTaxaAction" method="POST">

                    <div class="row">
                        <?php foreach($taxa as $t): ?>
                        <div class="form-group col-md-4">
                            <label><?=$t['qt_parc']?> Parcela(s)</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    %
                                </div>
                                <input class="form-control" type="text" value="<?=$t['taxa_v']?>"/>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>


                    <input type="hidden" class="form-control pull-right" name="id_tax" value="<?=$id?>">

                    <!-- <button type="submit" class="btn btn bg-purple pull-left">Salvar Alterações</button> -->
            </div>
            </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->