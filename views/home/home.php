<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
            <ul class="breadcrumb">
                <li><a href="" style="color:#555;">Home</a></li>
                <li><a href="" style="color:#555;">Dashboard</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box bg-green btn-touch">
                <div class="inner">
                    <h3><?=$total_vendas['totalv']?></h3>

                    <p>Vendas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="<?=BASE_URL?>vendas" class="small-box-footer">
                    Ir para vendas <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box bg-danger btn-touch">
                <div class="inner">
                    <h3><?=count($validate)?></h3>

                    <p>Produtos próximo da validade</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cube"></i>
                </div>
                <a href="<?=BASE_URL?>produtos" class="small-box-footer">
                    Ir para produtos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box bg-darkblue btn-touch">
                <div class="inner">
                    <h3><?=$total_clients['totalc']?></h3>

                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?=BASE_URL?>clientes" class="small-box-footer">
                    Ir para clientes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box bg-darkblue btn-touch">
                <div class="inner">
                    <h3><?=$total_prods['totalp']?></h3>

                    <p>Produtos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cube"></i>
                </div>
                <a href="<?=BASE_URL?>produtos" class="small-box-footer">
                    Ir para produtos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-app bg-default" data-toggle="modal" data-target="#modal-calculadora"><i
                            class="fa fa-calculator"></i> Calcular imposto
                    </button>
                    <!-- <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                        data-target="#modal-sale-home"><i class="fa fa-shopping-cart"></i> Balcão de vendas
                    </button> -->
                    <a href="<?=BASE_URL?>vendas/all" class="btn btn-app bg-default">
                        <i class="fa fa-tag"></i> Vendas
                    </a>
                    <a href="<?=BASE_URL?>estoque" class="btn btn-app bg-default">
                        <i class="fa fa-cubes"></i> Estoque
                    </a>
                    <a href="<?=BASE_URL?>clientes" class="btn btn-app bg-default">
                        <i class="fa fa-user"></i> Clientes
                    </a>
                    <a href="<?=BASE_URL?>fornecedores" class="btn btn-app bg-default">
                        <i class="fa fa-truck"></i> Novo Fornecedor
                    </a>
                    <a href="<?=BASE_URL?>parceiros/comissao" class="btn btn-app bg-default"><i
                            class="fa fa-money"></i>Comissão Parceiros
                    </a>
                    <a href="<?=BASE_URL?>configuracao" class="btn btn-app bg-default">
                        <i class="fa fa-cog"></i> Configurações
                    </a>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- card estoque abaixo -->
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <?php if($_SESSION['abaixo'] == 'abaixo'): ?>
                <div class="box-header with-border" style="display:flex;justify-content:space-between;">
                    <div>
                        <h3 class="box-title" style="margin-left:0px;margin-right: 50px;"><i class="fa fa-warning"></i>
                            <b>Avisos de Estoque</b></h3>
                    </div>
                    <div><a href="<?=BASE_URL?>estoque" class="small-box-footer">
                            Ir para estoque <i class="fa fa-arrow-right"></i>
                        </a></div>
                </div>
                <div class="box-body">
                    <p>Existem produto(s) com estoque baixo ou zerados.
                        <!-- <a href="<?=BASE_URL?>estoque" class="small-box-footer">
                            Ir para estoque <i class="fa fa-arrow-right"></i>
                        </a> -->
                    </p>
                    <img src="<?=BASE_URL?>assets/img/alerts/nostock.png" style="width:100%;height:244px;">
                </div>
            <?php else: ?>
            <div class="box-header with-border" style="display:flex;justify-content:start;">
                <h3 class="box-title" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-warning"></i>
                    <b>Avisos de Estoque</b></h3>
            </div>
            <div class="box-body">
                <p>Nenhum produto(s) abaixo do Estoque.
                </p>
                <img src="<?=BASE_URL?>assets/img/alerts/no_data.png"
                    style="width:100%;height:244px;object-fit:contain;">
            </div>
            <?php endif; ?>
            </div>
        </div>
   

<!-- card estoque proximo -->
    <div class="col-md-4">
        <div class="box">
            <?php if($_SESSION['atencao'] == 'atencao'): ?>
            <div class="box-header with-border" style="display:flex;justify-content:space-between;">
                <h3 class="box-title" style="margin-left:0px;margin-right: 50px;"><i class="fa fa-warning"></i>
                    <b>Avisos de Estoque</b></h3>
                <a href="<?=BASE_URL?>estoque" class="small-box-footer">
                    Ir para estoque <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="box-body">
                <p>Existem produto(s) com estoque próximo do limite.
                    <!-- <a href="<?=BASE_URL?>estoque" class="small-box-footer">
                            Ir para estoque <i class="fa fa-arrow-right"></i>
                        </a> -->
                </p>
                <img src="<?=BASE_URL?>assets/img/alerts/ss.svg" style="width:100%;height:244px;">
            </div>
            <?php else: ?>
            <div class="box-header with-border" style="display:flex;justify-content:start;">
                <h3 class="box-title" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-warning"></i>
                    <b>Avisos de Estoque</b></h3>
            </div>
            <div class="box-body">
                <p>Nenhum produto(s) abaixo do Estoque.
                </p>
                <img src="<?=BASE_URL?>assets/img/alerts/no_data.png"
                    style="width:100%;height:244px;object-fit:contain;">
            </div>
            <?php endif; ?>
        </div>
    </div>

<!-- card validade produtos -->
    <div class="col-md-4">
        <div class="box">
            <?php if($validate): ?>
            <div class="box-header with-border" style="display:flex;justify-content:space-between;">
                <h3 class="box-title" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-warning"></i>
                    <b>Avisos de Validade</b></h3>
                <a href="<?=BASE_URL?>produtos/validade" class="small-box-footer">
                    Ir para produtos <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="box-body">
                <p>Existem produto(s) com vencimento próximo.
                </p>
                <img src="<?=BASE_URL?>assets/img/alerts/validate.png"
                    style="width:100%;height:244px;object-fit:contain;">
            </div>
            <?php else: ?>
            <div class="box-header with-border" style="display:flex;justify-content:start;">
                <h3 class="box-title" style="margin-left:0px;margin-right: 40px;"><i class="fa fa-warning"></i>
                    <b>Avisos de Validade</b></h3>
            </div>
            <div class="box-body">
                <p>Nenhum produto(s) com vencimento próximo.
                </p>
                <img src="<?=BASE_URL?>assets/img/alerts/no_data.png"
                    style="width:100%;height:244px;object-fit:contain;">
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>


    <?php if($bol_pagar): ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wpforms"></i> <b>Boletos que vence Hoje</b></h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                <thead>
                    <tr>
                        <th>Recebedor</th>
                        <th>Valor</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($bol_pagar as $b): ?>
                    <tr>
                        <td class="text-capitalize">
                            <i class="fa fa-barcode"></i>
                            <?php echo $b['descricao'] ?>
                        </td>
                        <td class="text-red">
                            <b>R$ <?= number_format($b['valor_boleto'],2,',','.') ?></b>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="background-color: #CCC;font-weight: bold;font-size: 18px;">Total a Pagar</td>
                        <td class="text-red" style="background: #dd4b3940;font-size: 18px;font-weight: bold;">R$
                            <?=number_format($total_boletos['total_boleto'],2,',','.')?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <?php endif; ?>

    <?php if($cob_pagar): ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-money"></i> <b>Valores a Receber Hoje</b></h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                <thead>
                    <tr>
                        <th>Recebedor</th>
                        <th>Valor</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($cob_pagar as $c): ?>
                    <tr>
                        <td class="text-capitalize">
                            <i class="fa fa-barcode"></i>
                            <?php echo $c['descricao'] ?>
                        </td>
                        <td class="text-green">
                            <b>R$ <?= number_format($c['valor_cob'],2,',','.') ?></b>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="background-color: #CCC;font-weight: bold;font-size: 18px;">Total a Receber</td>
                        <td class="text-green" style="background: #00800033;font-size: 18px;font-weight: bold;">R$
                            <?=number_format($total_receber['total_cob'],2,',','.')?>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <?php endif; ?>

    <?php if($aniversariantes): ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-birthday-cake"></i> <b>Aniversariantes de hoje</b></h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                <thead>
                    <tr>
                        <th>Nome do aniversariante</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($aniversariantes as $a): ?>
                    <tr>
                        <td class="text-capitalize"><?php echo $a['name'] ?></td>
                        <td>
                            <a href="https://api.whatsapp.com/send?phone=55<?=$a['phone'];?>&text=<?=$msg['msg']?>"
                                class="btn btn-success btn-xs" target="_blank"><i class="fa fa-whatsapp"></i> Enviar
                                mensagem
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <?php endif; ?>

    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-darkblue">
                    <!-- /.widget-user-image -->

                    <h3 class="widget-user-username" style="margin-left: 0px;">
                        Financeiro Geral
                    </h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#" style="font-size:15px">Saldo Geral <span class="pull-right badge"
                                    style="font-size:13px;border-radius:3px;background-color:#00a685">
                                    R$ <?php echo number_format($rec['SUM(valor)'] - $des['SUM(valor)'],2,',','.') ?>
                                    <i class="fa fa-caret-up"></i>
                                </span>
                            </a>
                        </li>
                        <li><a href="#" style="font-size:15px">Despesas <span class="pull-right badge"
                                    style="font-size:13px;border-radius:3px;background-color:#d05748">
                                    R$
                                    <?php echo number_format($des['SUM(valor)'],2,',','.') ?>
                                    <i class="fa fa-caret-down"></i>
                                </span>
                            </a>
                        </li>
                        <li><a href="#" style="font-size:15px">Receitas Parceladas <span class="pull-right badge"
                                    style="font-size:13px;border-radius:3px;background-color:#00a685">
                                    R$ <?php echo number_format($rec_reco['SUM(valor)'],2,',','.') ?>
                                    <i class="fa fa-gg"></i>
                                </span>
                            </a>
                        </li>
                        <li><a href="#" style="font-size:15px">Despesas Parceladas <span class="pull-right badge"
                                    style="font-size:13px;border-radius:3px;background-color:#d05748">
                                    R$ <?php echo number_format($des_reco['SUM(valor)'],2,',','.') ?>
                                    <i class="fa fa-gg"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row (main row) -->                    

<!-- </section> -->

<!-- Main content -->
<!-- <section class="content"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i> <b>Despesas e Receitas dos Últimos 30 Dias</b>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <!-- Sales Chart Canvas -->
                                <canvas id="rel1" style="height: 169px; width: 629px;" width="629"
                                    height="169"></canvas>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i></span>
                                <h5 class="description-header">R$
                                    <?php echo number_format($rec['SUM(valor)'] - $des['SUM(valor)'],2,',','.') ?></h5>
                                <span class="description-text">TOTAL RECEITAS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-sm-6 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i></span>
                                <h5 class="description-header">R$
                                    <?php echo number_format($des['SUM(valor)'],2,',','.') ?></h5>
                                <span class="description-text">TOTAL DESPESAS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
<!-- </section> -->
<!-- /.content -->



   <div class="box box-default">
   <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-shopping-cart"></i> <b>Produtos Mais Vendidos</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-responsive">
                    <canvas id="rel2" height="160" width="204" style="width: 204px; height: 160px;"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <div class="col-md-6">
                  <ul class="chart-legend clearfix" id="chart-home-donut">
                    
                  </ul>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
</section>

<div class="modal fade" id="modal-sale-home" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2e4158;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">x</span></button>
                <h4 class="modal-title text-center" style="color:white">
                    <?php if($open_day): ?>
                    Nova Venda
                    <?php else: ?>
                    Abrir Caixa
                    <?php endif; ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php if($open_day): ?>
                <form action="<?= BASE_URL ?>vendedores/createVenda" method="POST">

                    <div class="row">
                        <div class="form-group col-md-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Adicionar Produto</legend>
                                <div class="control-group">
                                    <div class="controls bootstrap-timepicker">
                                        <input type="text" id="add_prod-v" data-type="busca_prods" class="form-control"
                                            placeholder="Digite o Nome ou o código do produto" />
                                        <i class="icon-time"></i>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-responsive" width="100%" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Excluir</th>
                                                <th>Código do produto</th>
                                                <th>Produto</th>
                                                <th>Preço</th>
                                                <th>Quantidade</th>
                                            </tr>
                                        </thead>

                                        <tbody id="products_table_v">

                                        </tbody>

                                        <tfoot id="totalF">

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: -40px;">
                        <div class="col">
                            <h5 class="background"><span><strong>Pagamento</strong></span></h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Valor:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="text" class="form-control pull-right venda-val" name="total" id="valorrec"
                                    placeholder="0.00">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Forma de pagamento:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <select name="formapgt" id="" class="form-control" onChange="pgtVenda(this.value)">
                                    <option>Escolha a forma</option>
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Cartão de Débito (Loja - Mastercard)">Cartão de Débito (Loja -
                                        Mastercard)</option>
                                    <option value="Cartão de Crédito (Loja - Mastercard)">Cartão de Crédito (Loja -
                                        Mastercard)</option>
                                    <option value="Cartão de Débito (Loja - Visa)">Cartão de Débito (Loja - Visa)
                                    </option>
                                    <option value="Cartão de Crédito (Loja - Visa)">Cartão de Crédito (Loja - Visa)
                                    </option>
                                    <option value="Cartão de Débito (Loja - Hipercard)">Cartão de Débito (Loja -
                                        Hipercard)</option>
                                    <option value="Cartão de Crédito (Loja - Hipercard)">Cartão de Crédito (Loja -
                                        Hipercard)</option>
                                    <option value="Cartão de Débito (Loja - Elo)">Cartão de Débito (Loja - Elo)</option>
                                    <option value="Cartão de Crédito (Loja - Elo)">Cartão de Crédito (Loja - Elo)
                                    </option>
                                    <option value="Cartão de Débito (Loja - Cabal Vale)">Cartão de Débito (Loja - Cabal
                                        Vale)</option>
                                    <option value="Cartão de Crédito (Loja - Cabal Vale)">Cartão de Crédito (Loja -
                                        Cabal Vale)</option>
                                    <option value="Cartão de Débito (Loja - Amex)">Cartão de Débito (Loja - Amex)
                                    </option>
                                    <option value="Cartão de Crédito (Loja - Amex)">Cartão de Crédito (Loja - Amex)
                                    </option>

                                    <option value="Cartão de Débito (Parceiro)">Cartão de Débito (Parceiro)</option>
                                    <option value="Cartão de Crédito (Parceiro)">Cartão de Crédito (Parceiro)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" style="display:none;" id="sel-parc">
                            <label>Qtd Parcela:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <select name="" id="sel-op-parc" class="form-control"
                                    onChange="setTaxaValue(this.value)">

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="display:none;" id="in-taxa-parc">
                            <label>Taxa:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="taxa" id="venda-taxa"
                                    placeholder="0.0" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Teve indicação ? quem ?</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-handshake-o"></i>
                                </div>
                                <select class="form-control" name="parceiro">
                                    <option value="0">Escolha uma opção</option>
                                    <?php foreach($parceiros as $p): ?>
                                    <option value="<?=$p['id_parceiro'];?>"><?=$p['nome_parc']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Data da Venda:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control pull-right" name="data_venda" id=""
                                    placeholder="00/00/0000">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Nota de Pagamento:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <textarea class="form-control" name="obs"></textarea>
                            </div>
                        </div>
                        <input class="hidden" type="text" name="id_user" value="<?php echo $info['id'] ?>">
                    </div>
                    <?php else: ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Valor para abrir o caixas:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="text" class="form-control pull-right open-venda-v" name="total"
                                    id="valorrec" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-block btn-success btn-touch" onClick="openCaixa()">
                                <span id="btn-open-pos">Abrir Caixa</span></button>
                        </div>
                    </div>
                    <?php endif; ?>
            </div>
            <?php if($open_day): ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()">Cancelar Venda</button>
                <button type="submit" class="btn btn bg-green pull-left">Confirmar Venda</button>
            </div>
            <?php endif; ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
var days_list = <?php echo json_encode($days_list) ?>;
var receitas = <?php echo json_encode(array_values($list_rec)) ?>;
var despesas = <?php echo json_encode(array_values($list_des)) ?>;
var moreSales = <?php echo json_encode(array_values($maisvendidos)) ?>;
</script>