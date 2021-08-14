  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Clientes</a></li>
                  <li><a href="" style="color:#555;">Todos Clientes</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="box">
          <div class="box-header">
              <h3 class="box-title"><strong>Ações</strong></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-vendor"><i class="fa fa-plus-square"></i>Novo Cliente
                      </button>
                      <button class="btn btn-app bg-default btn-touch" data-toggle="modal" data-target="#modal-msg"><i
                              class="fa fa-whatsapp"></i> Mensagem De Aniversário
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
                          <th>Cliente desde</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['name'] ?></td>
                          <td><?php echo $item['email'] ?></td>
                          <td class="text-capitalize"><?php echo $item['phone'] ?></td>
                          <td><?= date('d/m/Y', strtotime($item['date_create'])) ?></td>
                          <td>
                              <a href="<?=BASE_URL?>clientes/edit/<?=$item['id']?>" class="btn btn-success btn-xs">Ver
                                  detalhes</a>
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
                  <form action="<?php echo BASE_URL ?>clientes/add" method="POST">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Nome:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="nome"
                                      placeholder="Digite o nome" autofocus>
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
                          <div class="form-group col-md-6">
                              <label>Telefone:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="tel" class="form-control pull-right" name="telefone" id="tel_cliente"
                                      name="tel" placeholder="DDD00000-0000">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Data de Aniversário:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="aniversario" id="aniversario"
                                      placeholder="00/00/0000">
                              </div>
                          </div>

                      </div>

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>CEP:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="cep" id="cep"
                                      placeholder="00000-000">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
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
                                      <option value="MG" selected>Minas Gerais</option>
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

                          <div class="form-group col-md-12">
                              <label>Número:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-map"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="numero" id="cidade">
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

  <div class="modal fade" id="modal-msg">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#2e4158;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color:white">x</span></button>
                  <h4 class="modal-title text-center" style="color:white">Mensagem de aniversário</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo BASE_URL ?>clientes/msg" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label>Nome da Categoria:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-pencil"></i>
                                  </div>
                                  <textarea class="form-control" rows="5" name="msg">
                                    <?=$msg['msg']?>
                                  </textarea>
                              </div>
                          </div>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn bg-purple pull-left">Editar</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->