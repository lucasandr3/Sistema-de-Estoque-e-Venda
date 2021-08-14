  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Parceiros</a></li>
                  <li><a href="" style="color:#555;">Todos Parceiros</a></li>
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
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-calc-com"><i class="fa fa-plus-square"></i>Novo Parceiro
                      </button>
                      <a href="<?=BASE_URL?>parceiros/comissao" class="btn btn-app bg-default btn-touch"><i
                              class="fa fa-money"></i>Comissão
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
                          <th>Nome do Parceiro</th>
                          <th>Comissão</th>
                          <th>Calcular Comissão</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($parceiros as $item): ?>
                      <tr>
                          <td class="text-capitalize"><b><?php echo $item['nome_parc'] ?></b></td>
                          <td><?=$item['taxa_parc']?> %</td>
                          <td>

                              <!-- <button class="btn btn-success btn-xs btn-touch"
                                  onclick="saidaDetails('<?=$item['id_parceiro']?>', '<?=$item['nome_parc']?>', '<?=$item['taxa_parc']?>')"><i
                                      class="fa fa-file"></i>
                                  Calcular
                              </button> -->
                              <a href="<?=BASE_URL?>parceiros/edit/<?=$item['id_parceiro']?>"
                                  class="btn btn-primary btn-xs btn-touch"><i class="fa fa-pencil"></i>
                                  Editar</a>
                              <a href="<?=BASE_URL?>parceiros/del/<?=$item['id_parceiro']?>"
                                  class="btn btn-danger btn-xs btn-touch">
                                  <i class="fa fa-times"></i> Excluir</a>
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
  <div class="modal-loading-c"></div>
  <div id="modal-pedido-c"></div>
  <div id="modal-pedido-impressao-c"></div>

  <div class="modal fade" id="modal-calc-com">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Parceiro</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>parceiros/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Nome do Parceiro:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <input type="text" class="form-control" name="nome" placeholder="Nome do parceiro" />
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Comissão do Parceiro:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      %
                                  </div>
                                  <input type="text" class="form-control" name="comicao" placeholder="Ex: 1.5" />
                              </div>
                          </div>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn bg-purple pull-left">Cadastrar</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->