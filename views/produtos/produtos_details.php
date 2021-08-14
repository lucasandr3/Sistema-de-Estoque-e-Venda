  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="<?=BASE_URL?>produtos" style="color: #2e4158;font-weight: bold;">Produto</a></li>
                  <li><a style="color:#555;">Detalhes - <?=$produto['nome_prod']?></a></li>
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
                  <div class="col-md-12">
                      <a href="<?=BASE_URL?>produtos" class="btn btn-app bg-default">
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
              <table class="table table-bordered table-stripe dt-responsive" width="100%">
                  <tr>
                    <td style="width: 150px;"><strong>Código de Barras</strong></td>
                    <td><?=$produto['novo_cod']?></td>
                  </tr>
                  <tr>  
                    <td style="width: 150px;"><strong>Marca</strong></td>
                    <td><?=$produto['marca']?></td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Categoria</strong></td>
                    <td><?=$produto['categoria']?></td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Unidade</strong></td>
                    <td><?=$produto['unidade']?></td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Custo</strong></td>
                    <td><?=Real($produto['cost'])?></td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Preço de Venda</strong></td>
                    <td><?=Real($produto['preco'])?></td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Alerta de estoque</strong></td>
                    <td><?=$produto['alert']?> Unidades</td>
                  </tr> 
                  <tr> 
                    <td style="width: 150px;"><strong>Validade</strong></td>
                    <td><?=Data($produto['validade_prod'])?></td>
                  </tr>
                  
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
<style>
    td {
        border: 1px solid #ddd !important;
    }
</style>