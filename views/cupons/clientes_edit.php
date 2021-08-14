  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Clientes</a></li>
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
                      <a href="<?=BASE_URL?>clientes" class="btn btn bg-purple btn-flat">
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
              <form action="<?php echo BASE_URL ?>clientes/editAction" method="POST">

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Nome:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="nome"
                                  value="<?=$cliente['name']?>" autofocus>
                          </div>
                      </div>

                      <div class="form-group col-md-6">
                          <label>E-mail:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-at"></i>
                              </div>
                              <input type="email" class="form-control pull-right" name="email" id=""
                                  placeholder="Digite um E-mail" value="<?=$cliente['email']?>">
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
                              <input type="tel" class="form-control pull-right" id="tel_cliente" name="telefone"
                                  placeholder="00000000000" value="<?=$cliente['phone']?>">
                          </div>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Data de Aniversário:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="aniversario" id="aniversario"
                                  placeholder="00000-00" value="<?=date('d-m-Y',strtotime($cliente['birthdate']))?>">
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
                                  placeholder="00000-00" value="<?=$cliente['address_zipcode']?>">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                          <label>Rua:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="rua" id="rua"
                                  value="<?=$cliente['address']?>">
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
                              <input type="text" class="form-control pull-right" name="bairro" id="bairro"
                                  value="<?=$cliente['address_neighb']?>">
                          </div>
                      </div>

                      <div class="form-group col-md-4">
                          <label>Cidade:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="cidade" id="cidade"
                                  value="<?=$cliente['address_city']?>">
                          </div>
                      </div>

                      <div class="form-group col-md-4">
                          <label>Estado:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <select name="estado" id="uf" class="form-control" required>
                                  <option value="<?=$cliente['address_state']?>" selected><?=$cliente['address_state']?>
                                  </option>
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
                              <input type="text" class="form-control pull-right" name="numero" id="cidade"
                                  value="<?=$cliente['address_number']?>">
                          </div>
                      </div>

                      <input class="hidden" type="text" name="id_cliente" value="<?php echo $cliente['id'] ?>">
                  </div>

                  <input type="submit" class="btn btn bg-purple" value="Salvar alterações">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->