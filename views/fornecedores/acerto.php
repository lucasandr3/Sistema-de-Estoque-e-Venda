  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
        <ul class="breadcrumb">
          <li><a href="" style="color:#555;">Vendedores</a></li>
          <li><a href="" style="color:#555;">Listas</a></li>
        </ul> 
      </div>
    </div>
  </section>
<?php print_r($nome); ?>
<!-- Main content -->
  <section class="content">

  <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <h3>Upload do XMl</h3>
		
            <form method="POST" action="<?=BASE_URL?>vendedores/acerto" enctype="multipart/form-data">
                <input type="file" name="arquivo"><br><br>
                <input class="btn btn bg-purple" type="submit" value="Enviar">
            </form>
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
                <th>Vendedor</th>
                <th>Data</th>
                <th>Total</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
            
                <tr>
                <td class="text-capitalize"></td>
                <td></td>
                <td></td>
                <td>
                    <!-- <a href="<?=BASE_URL?>vendedores/pdf/<?=$item['id_lista'];?>" class="btn btn-primary btn-xs pdfi"><i class="fa fa-file-pdf-o"></i> <b>PDF</b></a> -->
                    <!-- <a href="<?=BASE_URL?>vendedores/imprimir/<?=$item['id_lista'];?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> <b>Imprimir</b></a>  -->
                </td>
                </tr>

            </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->