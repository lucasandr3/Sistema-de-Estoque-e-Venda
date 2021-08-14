<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
            <ul class="breadcrumb">
                <li><a href="" style="color:#555;">Home</a></li>
                <li><a href="" style="color:#555;">Objetivos</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <button class="btn btn bg-purple btn-flat" data-toggle="modal" data-target="#modal-ano">Novo Objetivo Para o
                Ano de <?php echo date('Y') ?>
            </button>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                <thead>
                    <tr>
                        <th width="420">Descrição</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Qtd. de dias</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($obano as $oba) : ?>
                    <tr>
                        <td class="text-capitalize"><i class="fa fa-pencil"></i> <?php echo $oba['descricao'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($oba['date_i'])) ?></td>
                        <td>
                            <?php if(isset($oba['date_f'])) : ?>
                            <?php echo date('d/m/Y', strtotime($oba['date_f'])) ?>
                            <?php else : ?>

                            <?php endif ?>
                        </td>
                        <td>
                            <?php if(isset($oba['date_f'])) : ?>
                            <?php $data_i = $oba['date_i'] ?>
                            <?php $data_f = $oba['date_f'] ?>
                            <?php $dif = strtotime($data_i) - strtotime($data_f) ?>
                            <?php $dias = (int)round( $dif / (60 * 60 * 24)) ?>
                            <?php if ($dias < 0) {
                      $dias = $dias * -1;
                    }
                    echo $dias.' Dias'
                    // echo strtotime($oba['date_i']) ?>
                            <?php else : ?>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if($oba['status'] == 'Em Andamento...') : ?>
                            <a class="btn btn-xs btn-warning fundo" data-toggle="modal"
                                data-target="#modal-edit-ano1<?php echo $oba['id'] ?>" style="border-radius:10px">
                                <?php echo $oba['status'] ?>
                            </a>
                            <?php elseif($oba['status'] == 'Cancelado') : ?>
                            <a class="btn btn-xs btn-danger" style="border-radius:10px;opacity:.9;">
                                <?php echo $oba['status'] ?>
                            </a>
                            <?php else: ?>
                            <a class="btn btn-xs btn-success" style="border-radius:10px;opacity:.9;">
                                <?php echo $oba['status'] ?>
                            </a>
                            <?php endif ?>
                            <div class="modal fade" id="modal-edit-ano1<?php echo $oba['id'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#2e4158;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="color:white">x</span></button>
                                            <h4 class="modal-title text-center" style="color:white">Status do Objetivo
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo BASE_URL ?>objetivo/editAno" method="POST">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Alterar Status do Pedido</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-pencil"></i>
                                                            </div>
                                                            <select name="status" class="form-control"
                                                                style="min-width: 530px;">
                                                                <option>Escolha o status</option>
                                                                <option value="Cancelado">Cancelado</option>
                                                                <option value="Concluído">Concluído</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <code>* Uma Vez Alterado o Status, não é Possível Voltar Atrás.</code>
                                                    </div>

                                                </div>

                                                <input type="text" class="hidden" name="id"
                                                    value="<?php echo $oba['id'] ?>">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn bg-purple pull-left">Alterar
                                                Status</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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

<div class="modal fade" id="modal-ano">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2e4158;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">x</span></button>
                <h4 class="modal-title text-center" style="color:white">Adicione Objetivos para o ano de
                    <?php echo date('Y') ?>
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASE_URL ?>objetivo/addAno" method="POST">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Objetivo:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="descricao" autofocus>
                            </div>
                        </div>

                        <input class="hidden" type="text" name="status" value="Em Andamento...">
                        <input class="hidden" type="text" name="id" value="<?php echo $info['id_user'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn bg-purple pull-left">Salvar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<section class="content" style="margin-top:-30px">
    <div class="box">
        <div class="box-header with-border">
            <button class="btn btn bg-purple btn-flat" data-toggle="modal" data-target="#modal-mes">
                Novo Objetivo para o mês de
                <?php 
           setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
           echo strftime('%B', strtotime('today')) 
          ?>
            </button>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                <thead>
                    <tr>
                        <th width="420">Descrição</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Qtd. de dias</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($obmes as $obm): ?>
                    <tr>
                        <td class="text-capitalize"><i class="fa fa-pencil"></i> <?php echo $obm['descricao'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($obm['date_i'])) ?></td>
                        <td>
                            <?php if(isset($obm['date_f'])) : ?>
                            <?php echo date('d/m/Y', strtotime($obm['date_f'])) ?>
                            <?php else : ?>

                            <?php endif ?>
                        </td>
                        <td>
                            <?php if(isset($obm['date_f'])) : ?>
                            <?php $data_i = $obm['date_i'] ?>
                            <?php $data_f = $obm['date_f'] ?>
                            <?php $dif = strtotime($data_i) - strtotime($data_f) ?>
                            <?php $dias = (int)round( $dif / (60 * 60 * 24)) ?>
                            <?php if ($dias < 0) {
                      $dias = $dias * -1;
                    }
                    echo $dias.' Dias'
                    // echo strtotime($oba['date_i']) ?>
                            <?php else : ?>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if($obm['status'] == 'Em Andamento...') : ?>
                            <a class="btn btn-xs btn-warning fundo" data-toggle="modal"
                                data-target="#modal-edit-mes1<?php echo $obm['id'] ?>" style="border-radius:10px">
                                <?php echo $obm['status'] ?>
                            </a>
                            <?php elseif($obm['status'] == 'Cancelado') : ?>
                            <a class="btn btn-xs btn-danger" style="border-radius:10px;opacity:.9;">
                                <?php echo $obm['status'] ?>
                            </a>
                            <?php else: ?>
                            <a class="btn btn-xs btn-success" style="border-radius:10px;opacity:.9;">
                                <?php echo $obm['status'] ?>
                            </a>
                            <?php endif ?>
                            <div class="modal fade" id="modal-edit-mes1<?php echo $obm['id'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#2e4158;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="color:white">x</span></button>
                                            <h4 class="modal-title text-center" style="color:white"> Status do Objetivo
                                                <?php
                               setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
                               echo strftime('%B', strtotime('today'))  
                              ?>
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo BASE_URL ?>objetivo/editMes" method="POST">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Alterar Status do Pedido:</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-pencil"></i>
                                                            </div>
                                                            <select name="status" class="form-control"
                                                                style="min-width: 530px;">
                                                                <option>Escolha o status</option>
                                                                <option value="Cancelado">Cancelado</option>
                                                                <option value="Concluído">Concluído</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <code>* Uma Vez Alterado o Status, não é Possível Voltar Atrás.</code>
                                                    </div>
                                                    <input type="text" class="hidden" name="id"
                                                        value="<?php echo $obm['id'] ?>">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn bg-purple pull-left">Alterar
                                                Status</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            </form>
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

<div class="modal fade" id="modal-mes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2e4158;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">x</span></button>
                <h4 class="modal-title text-center" style="color:white">Adicione Objetivos para o Mês de
                    <?php
                 setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
                  echo strftime('%B', strtotime('today'))  
                ?>
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASE_URL ?>objetivo/addMes" method="POST">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Objetivo:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="descricao" autofocus>
                            </div>
                        </div>

                        <input class="hidden" type="text" name="status" value="Em Andamento...">
                        <input class="hidden" type="text" name="id" value="<?php echo $info['id_user'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn bg-purple pull-left">Salvar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->