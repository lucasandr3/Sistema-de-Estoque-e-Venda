  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Configuração</a></li>
                  <li><a href="" style="color:#555;">Loja</a></li>
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
          <p class="text-capitalize" style="font-size:14px">Nesta Tela Você Pode Editar Seus Dados, se quiser alterar a
              senha, você precisa preencher o campo senha, e o sistema fará a troca de senha !!!</p>
      </div>
      <?php if(!empty($msg)) {
            echo $msg.'<br/>';
          }
          ?>
      <div class="row">
          <div class="col-md-12">
              <div class="row" id="control-sidebar-theme-demo-options-tab">
                  <div class="col-md-12">
                      <h4>Tema do Sistema</h4>
                      <div class="box">
                          <div class="box-body" style="background-color:#fff">
                              <ul class="list-unstyled clearfix">
                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-blue"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div><span
                                                  style="display:block; width: 20%; float: left; height: 7px; background: #367fa9">
                                              </span>
                                              <span class="bg-light-blue"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222d32">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Azul</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-black"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span
                                                  style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span
                                                  style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Branco</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-purple"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-purple-active">
                                              </span>
                                              <span class="bg-purple"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222d32">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Roxo</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-green"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-green-active">
                                              </span>
                                              <span class="bg-green"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222d32">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Verde</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-red"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-red-active">
                                              </span>
                                              <span class="bg-red"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222d32">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Vermelho</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-yellow"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-yellow-active">
                                              </span>
                                              <span class="bg-yellow"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #222d32">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin">Amarelo</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-blue-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 7px; background: #367fa9">
                                              </span>
                                              <span class="bg-light-blue"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Azul
                                          Light</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-black-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 7px; background: #fefefe">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 7px; background: #fefefe">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Branco
                                          Light</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-purple-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-purple-active">
                                              </span>
                                              <span class="bg-purple"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Roxo
                                          Light</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-green-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-green-active">
                                              </span>
                                              <span class="bg-green"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Verde
                                          Light</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-red-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-red-active">
                                              </span>
                                              <span class="bg-red"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Vermelho
                                          Light</p>
                                  </li>

                                  <li style="float:left; width: 33.33333%; padding: 5px;">
                                      <a href="javascript:void(0)" data-skin="skin-yellow-light"
                                          style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                          class="clearfix full-opacity-hover">
                                          <div>
                                              <span style="display:block; width: 20%; float: left; height: 7px;"
                                                  class="bg-yellow-active">
                                              </span>
                                              <span class="bg-yellow"
                                                  style="display:block; width: 80%; float: left; height: 7px;">
                                              </span>
                                          </div>
                                          <div>
                                              <span
                                                  style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc">
                                              </span>
                                              <span
                                                  style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7">
                                              </span>
                                          </div>
                                      </a>
                                      <p class="text-center no-margin" style="font-size: 12px">Amarelo
                                          Light</p>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->

  </section>
  <!-- /.content -->