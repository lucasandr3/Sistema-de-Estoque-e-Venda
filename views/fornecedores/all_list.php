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

<!-- Main content -->
  <section class="content">

  <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
              <a href="<?=BASE_URL?>vendedores/lista" class="btn btn bg-purple btn-flat">
                <i class="fa fa-list-alt"></i> Criar Lista
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
                <th>Vendedor</th>
                <th>Data</th>
                <th>Total</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($list_all as $item): ?>
                <tr>
                <td class="text-capitalize"><?php echo $item['nome'] ?></td>
                <td><?php echo date('d-m-Y', strtotime($item['data_lista'])) ?></td>
                <td>R$ <?php echo number_format($item['total'],2,",",".") ?></td>
                <td>
                    <a href="<?=BASE_URL?>vendedores/pdf/<?=$item['id_lista'];?>" class="btn btn-primary btn-xs pdfi"><i class="fa fa-file-pdf-o"></i> <b>PDF</b></a>
                    <a href="<?=BASE_URL?>vendedores/imprimir/<?=$item['id_lista'];?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> <b>Imprimir</b></a> 
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