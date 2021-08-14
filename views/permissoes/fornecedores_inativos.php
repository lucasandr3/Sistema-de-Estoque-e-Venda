  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Fornecedores</a></li>
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
                  <div class="col-md-10">
                      <a href="<?=BASE_URL?>fornecedores" class="btn btn-success btn-flat">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                      <button class="btn btn bg-purple btn-flat" data-toggle="modal"
                          data-target="#modal-vendor">Cadastrar Fornecedor
                      </button>
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
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['nome'] ?></td>
                          <td><?php echo $item['email'] ?></td>
                          <td><?php echo $item['tel'] ?></td>
                          <td>
                              <a href="<?=BASE_URL?>fornecedores/edit/<?=$item['id_fornecedor']?>"
                                  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                              <?php if($item['status'] == '0'): ?>
                              <a href="<?=BASE_URL?>fornecedores/status/<?=$item['id_fornecedor']?>"
                                  class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Inativo</a>
                              <?php else: ?>
                              <a href="<?=BASE_URL?>fornecedores/status/<?=$item['id_fornecedor']?>"
                                  class="btn btn-success btn-xs"><i class="fa fa-check"></i> Ativo</a>
                              <?php endif; ?>
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

  <div class="modal fade" id="modal-vendor">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Cadastro de Vendedores</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>fornecedores/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Nome:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="nome" autofocus>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>E-mail:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-at"></i>
                                  </div>
                                  <input type="email" class="form-control pull-right" name="email" id=""
                                      placeholder="Digite um E-mail">
                              </div>
                          </div>

                      </div>

                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Telefone:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="tel" class="form-control pull-right" id="tel" name="tel"
                                      placeholder="(00) 00000-0000">
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>CEP:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="cep" id="cep"
                                      placeholder="00000-00">
                              </div>
                          </div>
                          <div class="form-group col-md-4">
                              <label>Rua:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="rua" id="rua">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Bairro:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="bairro" id="bairro">
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>Cidade:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="cidade" id="cidade">
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label>Estado:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <select name="estado" id="uf" class="form-control" required>
                                      <option value="AC">Acre</option>
                                      <option value="AL">Alagoas</option>
                                      <option value="AP">Amapá</option>
                                      <option value="AM">Amazonas</option>
                                      <option value="BA">Bahia</option>
                                      <option value="CE">Ceará</option>
                                      <option value="DF">Distrito Federal</option>
                                      <option value="ES">Espírito Santo</option>
                                      <option value="GO">Goiás</option>
                                      <option value="MA">Maranhão</option>
                                      <option value="MT">Mato Grosso</option>
                                      <option value="MS">Mato Grosso do Sul</option>
                                      <option value="MG">Minas Gerais</option>
                                      <option value="PA">Pará</option>
                                      <option value="PB">Paraíba</option>
                                      <option value="PR">Paraná</option>
                                      <option value="PE">Pernambuco</option>
                                      <option value="PI">Piauí</option>
                                      <option value="RJ">Rio de Janeiro</option>
                                      <option value="RN">Rio Grande do Norte</option>
                                      <option value="RS">Rio Grande do Sul</option>
                                      <option value="RO">Rondônia</option>
                                      <option value="RR">Roraima</option>
                                      <option value="SC">Santa Catarina</option>
                                      <option value="SP">São Paulo</option>
                                      <option value="SE">Sergipe</option>
                                      <option value="TO">Tocantins</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Número:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="numero" id="cidade">
                              </div>
                          </div>


                          <div class="form-group col-md-6">
                              <label>Status:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-sitemap"></i>
                                  </div>
                                  <select name="status" class="form-control">
                                      <option value="0">Ativo</option>
                                      <option value="1">Inativo</option>
                                  </select>
                              </div>
                          </div>

                          <input class="hidden" type="text" name="id_user" value="<?php echo $info['id'] ?>">
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