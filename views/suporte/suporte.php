  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Suporte</a></li>
                  <li><a href="" style="color:#555;">Cliente</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="alert alert-info alert-dismissible" style="background-color:#2e4158 !important;border-color:white">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>
              <i class="icon fa fa-info"></i> <?php echo $viewData['info']['name'] ?>
          </h4>
          <p class="text-capitalize" style="font-size:14px">Nesta Tela Você Pode deixar sugestões, seu feedback para que
              possamos cada vez melhor sua experiência.</p>
      </div>
      <?php if(!empty($msg)) {
            echo $msg.'<br/>';
          }
          ?>

      <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-pencil"></i><b> Sugestão</b></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="<?=BASE_URL?>suporte/add" method="post">
                  <div class="box-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Título:</label>
                          <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                              placeholder="Digite um título">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Sugestão:</label>
                          <textarea name="body" id="" cols="30" rows="10" class="form-control"
                              placeholder="Escreva aqui...."></textarea>
                      </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-success btn-touch"><i class="fa fa-send"></i> Enviar
                          Sugestão</button>
                  </div>
              </form>
          </div>
          <!-- /.box -->
      </div>

  </section>
  <!-- /.content -->