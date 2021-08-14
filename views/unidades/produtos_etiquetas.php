  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Vendedores</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
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
                      <a href="<?=BASE_URL?>produtos" class="btn btn bg-purple btn-flat">
                          <i class="fa fa-arrow-left"></i> Voltar para produtos
                      </a>
                      <a href="<?=BASE_URL?>estoque" class="btn btn bg-purple btn-flat">
                          <i class="fa fa-arrow-left"></i> Voltar para estoque
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
              <form method="POST" action="../../helper/barcode.php" target="_blank">

                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Código do produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$produto['id_prod']?>"
                               id="product_id" name="product_id" readonly autofocus>
                          </div>
                      </div>
                    </div>  

                    <div class="row">    
                      <div class="form-group col-md-12">
                          <label>Nome do Produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cube"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="product" name="product"
                                  value="<?=$produto['nome_prod']?>" id="" placeholder="Digite um nome para o produto">
                          </div>
                      </div>
                  </div>

                  <div class="row">    
                      <div class="form-group col-md-12">
                          <label>Preço do Produto:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-money"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="rate"  name="rate"
                                  value="<?=$produto['preco']?>" id="valorrec" placeholder="0.00">
                          </div>
                      </div>
                  </div>

                  <div class="row">    
                      <div class="form-group col-md-12">
                          <label>Quantidade de Etiquetas:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="print_qty"  name="print_qty"
                                placeholder="Digite a quantidade de etiquetas">
                          </div>
                      </div>
                  </div>

                  <button class="btn btn bg-purple"><i class="fa fa-barcode"></i> Imprimir Etiquetas</button>
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->