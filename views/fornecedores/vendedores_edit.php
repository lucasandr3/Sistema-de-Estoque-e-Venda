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
                      <a href="<?=BASE_URL?>vendedores" class="btn btn bg-purple btn-flat">
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
              <form action="<?php echo BASE_URL ?>vendedores/editAction" method="POST">

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Nome:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$vendor['nome']?>"
                                  name="nome" autofocus>
                          </div>
                      </div>

                      <div class="form-group col-md-6">
                          <label>E-mail:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-at"></i>
                              </div>
                              <input type="email" class="form-control pull-right" name="email"
                                  value="<?=$vendor['email']?>" id="" placeholder="Digite um E-mail">
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
                              <input type="tel" class="form-control pull-right" id="tel" value="<?=$vendor['tel']?>"
                                  name="tel" placeholder="(00) 00000-0000">
                          </div>
                      </div>

                      <div class="form-group col-md-4">
                          <label>CEP:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$vendor['cep']?>" name="cep"
                                  id="cep" placeholder="00000-00">
                          </div>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Rua:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$vendor['rua']?>" name="rua"
                                  id="rua">
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
                              <input type="text" class="form-control pull-right" value="<?=$vendor['bairro']?>"
                                  name="bairro" id="bairro">
                          </div>
                      </div>

                      <div class="form-group col-md-4">
                          <label>Cidade:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$vendor['cidade']?>"
                                  name="cidade" id="cidade">
                          </div>
                      </div>

                      <div class="form-group col-md-4">
                          <label>Estado:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <select name="estado" id="uf" class="form-control" required>
                                  <option value="<?=$vendor['estado']?>"><?=$vendor['estado']?></option>
                                  <option value="AC">Acre</option>
                                  <option value="AL">Alagoas</option>
                                  <option value="AP">Amap??</option>
                                  <option value="AM">Amazonas</option>
                                  <option value="BA">Bahia</option>
                                  <option value="CE">Cear??</option>
                                  <option value="DF">Distrito Federal</option>
                                  <option value="ES">Esp??rito Santo</option>
                                  <option value="GO">Goi??s</option>
                                  <option value="MA">Maranh??o</option>
                                  <option value="MT">Mato Grosso</option>
                                  <option value="MS">Mato Grosso do Sul</option>
                                  <option value="MG">Minas Gerais</option>
                                  <option value="PA">Par??</option>
                                  <option value="PB">Para??ba</option>
                                  <option value="PR">Paran??</option>
                                  <option value="PE">Pernambuco</option>
                                  <option value="PI">Piau??</option>
                                  <option value="RJ">Rio de Janeiro</option>
                                  <option value="RN">Rio Grande do Norte</option>
                                  <option value="RS">Rio Grande do Sul</option>
                                  <option value="RO">Rond??nia</option>
                                  <option value="RR">Roraima</option>
                                  <option value="SC">Santa Catarina</option>
                                  <option value="SP">S??o Paulo</option>
                                  <option value="SE">Sergipe</option>
                                  <option value="TO">Tocantins</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-2">
                          <label>N??mero:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-map"></i>
                              </div>
                              <input type="text" class="form-control pull-right" value="<?=$vendor['numero']?>"
                                  name="numero" id="cidade">
                          </div>
                      </div>

                      <div class="form-group col-md-5">
                          <label>Comiss??o:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-money"></i>
                              </div>
                              <input type="number" class="form-control pull-right" value="<?=$vendor['comissao']?>"
                                  name="comissao" placeholder="Ex. 30">
                          </div>
                      </div>

                      <div class="form-group col-md-5">
                          <label>Status:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-sitemap"></i>
                              </div>
                              <select name="status" class="form-control">
                                  <option value="<?=$vendor['status']?>">
                                      <?php if($vendor['status'] == '0'): ?>
                                      Ativo
                                      <?php else: ?>
                                      Inativo
                                      <?php endif; ?>
                                  </option>
                                  <?php if($vendor['status'] == '0'): ?>
                                  <option value="1">Inativo</option>
                                  <?php else: ?>
                                  <option value="0">Ativo</option>
                                  <?php endif; ?>
                              </select>
                          </div>
                      </div>

                      <input class="hidden" type="text" name="id_vendor" value="<?php echo $vendor['id_vendor'] ?>">
                  </div>

                  <input type="submit" class="btn btn bg-purple" value="Salvar altera????es">
              </form>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->