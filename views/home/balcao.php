<section class="content">
    <?php if($open_day): ?>
    <form action="<?= BASE_URL ?>vendedores/createVenda" method="POST">
        <div class="box">
            <div class="box-header with-border">
                <h4 style="margin: 0;"><?=DayToday()?></h4>
            </div>
            <div class="box-body">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active" style="margin-right: 153px;">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                    title="Produtos da Venda">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-barcode"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled" style="margin-right: 153px;">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                    title="Dados da Venda">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"
                                    title="Informações de Pagamento">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-credit-card"></i>
                                    </span>
                                </a>
                            </li>

                            <!-- <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab"
                                    title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                            </li> -->
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <ul class="breadcrumb"
                                    style="background-color: #f3eeee !important;padding: 5px;border-radius: 3px;">
                                    <li><a style="color:#555;">Passo 1</a></li>
                                    <li><a style="color:#555;">Produtos</a></li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-9">

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border" style="width: 135px;">Adicionar Produto
                                            </legend>
                                            <div class="control-group">
                                                <div class="form-group has-feedback">
                                                    <span class="glyphicon glyphicon-barcode form-control-feedback"
                                                        style="right:none;left:0;"></span>
                                                    <input type="text" id="add_prod-v" data-type="busca_prods"
                                                        class="form-control"
                                                        placeholder="Digite o Nome ou o código do produto" autofocus
                                                        style="padding-left: 30.5px;" />
                                                    <i class="icon-time"></i>
                                                </div>
                                            </div>
                                        </fieldset>


                                        <!-- <div class="row">
<div class="col-md-12"> -->
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
                                        <!-- </div>
</div> -->
                                        <!-- <div class="row">
<div class="col-md-12"> -->

                                        <!-- </div>
</div> -->
                                    </div>
                                    <div class="col-md-3" style="margin-top:3px;">
                                        <table class="table table-bordered dt-responsive tabela-res" width="100%">
                                            <tbody>
                                                <th colspan="2">Total da Venda</th>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td class="text-green" id="subtotal-step-1">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Desconto</th>
                                                    <td class="text-danger" id="desconto-step-1">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td class="text-green" id="total-step-1">R$ 0.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td
                                                        style="background-color: #CCC;font-weight: bold;font-size: 18px;">
                                                        Total da Venda
                                                    </td>
                                                    <td class="text-green"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <hr />
                                <ul class="list-inline pull-left">
                                    <li><button type="button" class="btn btn-primary next-step">Continuar <i
                                                class="fa fa-arrow-right"></i></button>
                                    </li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                                        style="border-color: #666;"><i class="fa fa-times"></i> Cancelar Venda</button>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <ul class="breadcrumb"
                                    style="background-color: #f3eeee !important;padding: 5px;border-radius: 3px;">
                                    <li><a style="color:#555;">Passo 2</a></li>
                                    <li><a style="color:#555;">Dados da Venda</a></li>
                                </ul>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Teve indicação ? quem ?</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-handshake-o"></i>
                                            </div>
                                            <select class="form-control" name="parceiro">
                                                <option value="Sem Indicação">Sem Indicação</option>
                                                <?php foreach($parceiros as $p): ?>
                                                <option value="<?=$p['nome_parc'];?>"><?=$p['nome_parc']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Desconto:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tag"></i>
                                            </div>
                                            <div id="desconto-false">
                                                <span class="btn btn-sm btn-primary btn-flat btn-block"
                                                    onClick="discountShow()">Autorizar Desconto</span>
                                            </div>
                                            <div id="desconto-true" style="display:none;">
                                                <input type="text" class="form-control" value="0" id="desc-sale-sld"
                                                    onchange="updateTotalv()" name="discount"
                                                    placeholder="Digite o valor Ex: 5" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Data da Venda:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right"
                                                value="<?=date('Y-m-d')?>" name="data_venda" id=""
                                                placeholder="00/00/0000">
                                        </div>
                                    </div>



                                    <div class="form-group col-md-9">
                                        <label>Nota da Venda:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <textarea class="form-control" name="obs"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-top:-51px;">
                                        <table class="table table-bordered dt-responsive tabela-res" width="100%">
                                            <tbody>
                                                <th colspan="2">Total da Venda</th>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td class="text-green" id="subtotal-step-2">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Desconto</th>
                                                    <td class="text-danger" id="desconto-step-2">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td class="text-green" id="total-step-2">R$ 0.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td
                                                        style="background-color: #CCC;font-weight: bold;font-size: 18px;">
                                                        Total da Venda
                                                    </td>
                                                    <td class="text-green"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda-step-2">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                                <hr />
                                <ul class="list-inline pull-left">
                                    <li><button type="button" class="btn btn-default prev-step" style="border-color: #666;"><i
                                                class="fa fa-arrow-left"></i> Voltar</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Continuar <i
                                                class="fa fa-arrow-right"></i></button>
                                    </li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                                        style="border-color: #666;"><i class="fa fa-times"></i> Cancelar Venda</button>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <ul class="breadcrumb"
                                    style="background-color: #f3eeee !important;padding: 5px;border-radius: 3px;">
                                    <li><a style="color:#555;">Passo 3</a></li>
                                    <li><a style="color:#555;">Informações de Pagamento</a></li>
                                </ul>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border" style="width: 51px;">Cliente</legend>
                                            <select class="form-control select2" name="client" style="width: 100%;"
                                                required>
                                                <option>Escolha o Cliente</option>
                                                <?php foreach($clients as $c): ?>
                                                <option value="<?=$c['name']?>"><?=$c['name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Dinheiro</label>
                                        <input class="form-control" type="text" id="cacl-d" name="fpdinheiro"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Dinheiro')" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cartão de Crédito</label>
                                        <input class="form-control" type="text" id="cacl-cc" name="fpcartaoc"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Cartão de Crédito (Loja)')" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cartão de Débito</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="fpcartaod"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Cartão de Débito (Loja)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Pix</label>
                                        <input class="form-control" type="text" id="cacl-pix" name="fppix"
                                            placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Pix')" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Pic Pay</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="fppicpay"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Pic Pay')" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>C/Crédito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="cardcforn"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Cartão de Crédito (Fornecedor)')" />
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>C/Débito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-pix" name="carddforn"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, 'Cartão de Débito (Fornecedor)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <span class="btn btn-primary btn-flat" style="margin-top: 25px;width: 100%;"
                                            onClick="LimparCalCampos()">Limpar campos</span>
                                    </div>

                                </div>
                                

                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>2º C/Crédito Loja</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="2cardlc"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, '2º Cartão de Crédito (Loja)')" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>2º C/Débito Loja</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="2cardld"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, '2º Cartão de Débito (Loja)')" />
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>2º C/Crédito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-pix" name="2cardfc"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, '2º Cartão de Crédito (Fornecedor)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>2º C/Débito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-pix" name="2cardfd"
                                            placeholder="Digite o Valor"
                                            onFocusOut="calcVenda(this.value, '2º Cartão de Débito (Fornecedor)')" />
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label>Vendedor:</label>
                                        <select class="form-control select2" name="id_user" style="width: 100%;"
                                            required>
                                            <option>Escolha o Vendedor</option>
                                            <?php foreach($vendedores as $v): ?>
                                            <option value="<?=$v['name']?>"><?=$v['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group">
                                            <label>Forma de Pagamento</label>
                                            <select class="form-control select2" multiple="" name="formapgt[]"
                                                data-placeholder="Escolha uma opção" style="width: 100%;" tabindex="-1"
                                                aria-hidden="true" id="pay-options">
                                                <option value="Dinheiro">Dinheiro</option>
                                                <option value="Cartão de Crédito (Loja)">Cartão de Crédito (Loja)
                                                </option>
                                                <option value="Cartão de Débito (Loja)">Cartão de Débito (Loja)</option>
                                                <option value="2º Cartão de Crédito (Loja)">2º Cartão de Crédito (Loja)
                                                </option>
                                                <option value="2º Cartão de Débito (Loja)">2º Cartão de Débito (Loja)</option>
                                                <option value="Pix">Pix</option>
                                                <option value="Pic Pay">Pic Pay</option>
                                                <option value="Cartão de Crédito (Fornecedor)">Cartão de Crédito
                                                    (Parceiro)</option>
                                                <option value="Cartão de Débito (Fornecedor)">Cartão de Débito
                                                    (Parceiro)</option>
                                                <option value="2º Cartão de Crédito (Fornecedor)">2º Cartão de Crédito
                                                    (Parceiro)</option>
                                                <option value="2º Cartão de Débito (Fornecedor)">2º Cartão de Débito
                                                    (Parceiro)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-top:-198px;">
                                        <table class="table table-bordered dt-responsive tabela-res" width="100%">
                                            <tbody>
                                                <th colspan="2">Total da Venda</th>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td class="text-green" id="subtotal-step-3">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Desconto</th>
                                                    <td class="text-danger" id="desconto-step-3">R$ 0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td class="text-green" id="total-step-3">R$ 0.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td
                                                        style="background-color: #CCC;font-weight: bold;font-size: 18px;">
                                                        Total da Venda
                                                    </td>
                                                    <td class="text-green"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda-step-3">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                                <tr id="val-restante-venda">
                                                    <th
                                                        style="background-color: #CC;font-weight: bold;font-size: 18px;">
                                                        Valor Restante
                                                    </th>
                                                    <td class="text-green" id="td-calc-venda"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda-modal-calc">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <hr />

                                <ul class="list-inline pull-left">
                                    <li><button type="button" class="btn btn-default prev-step" style="border-color: #666;"><i
                                                class="fa fa-arrow-left"></i> Voltar</button></li>
                                    <li><button type="submit" class="btn btn-success btn-info-full next-step"><i
                                                class="fa fa-check"></i> Finalizar Venda</button></li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                                        style="border-color: #666;"><i class="fa fa-times"></i> Cancelar Venda</button>
                                </ul>
                            </div>
                            <!-- <div class="tab-pane" role="tabpanel" id="complete" style="text-align:center;">
                                <h3>Sucesso</h3>
                                <p>Venda realizada com sucesso.</p>
                                <button>imprimir comprovante</button>
                            </div> -->
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="form-group col-md-6" style="display:none;">
                <label>total:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control pull-right venda-val" name="total" id="" placeholder="0.00">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6" style="display:none;" id="in-taxa-parc">
                    <label>Taxa:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="taxa" id="venda-taxa" placeholder="0.0"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php else: ?>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="form-group col-md-8">
                    <label>Valor para abrir o caixa:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </div>
                        <input type="text" class="form-control pull-right open-venda-v" name="total" id="valorrec"
                            placeholder="0.00">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Data:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </div>
                        <input type="date" class="form-control pull-right" id="data-open-c" name="data-open">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-block btn-success btn-touch" onClick="openCaixa()">
                        <span id="btn-open-pos">Abrir Caixa</span></button>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>


    <button class="btn btn-app bg-primary" data-toggle="modal" data-target="#modal-discount-ddd"
        id="btn-authorize-discount" style="display:none;"><i class="fa fa-calculator"></i>
    </button>

    <div class="modal fade" data-backdrop="static" id="modal-discount-ddd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#2e4158;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white">x</span></button>
                    <h4 class="modal-title text-center" style="color:white">Autorizar Desconto</h4>
                </div>
                <div class="modal-body">

                    <form>

                        <div class="row">
                            <div class="form-group col-md-12" style="margin-bottom:0px;">
                                <label>Digite a Senha para Desconto</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <input type="password" class="form-control pull-right" name="produto"
                                        id="value-discount" placeholder="Digite a senha">
                                </div>
                                <input type="hidden" value="<?=$info['id_user']?>" id="value-dis-user">
                            </div>
                        </div><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn bg-default pull-left" id="close-discount-modal"
                                data-dismiss="modal" style="margin-left:-15px;margin-top:0px">Fechar
                            </button>
                            <button type="button" class="btn btn bg-purple pull-left" onClick="verifyPassDiscount()"
                                id="btn-discount-save" style="margin-top: 0px">
                                Autorizar
                            </button>
                            <button type="button" class="btn btn bg-purple pull-left" id="btn-discount-spin"
                                style="display:none;" style="margin-top: 0px">
                                Aguarde <i class="fa fa-refresh fa-spin"></i>
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<!-- /.content -->

<style>
.wizard {
    margin: 20px auto;
    background: #fff;
}

.wizard .nav-tabs {
    position: relative;
    margin: 40px auto;
    margin-bottom: 0;
    border-bottom-color: #e0e0e0;
}

.wizard>div.wizard-inner {
    position: relative;
    margin-top: -60px;
}

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs>li.active>a,
.wizard .nav-tabs>li.active>a:hover,
.wizard .nav-tabs>li.active>a:focus {
    color: #555555;
    cursor: pointer;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}

span.round-tab i {
    color: #555555;
}

.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #2e4158;

}

.wizard li.active span.round-tab i {
    color: #2e4158;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs>li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #2e4158;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #2e4158;
}

.wizard .nav-tabs>li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

.wizard .nav-tabs>li a:hover {
    background: transparent;
}

.wizard .tab-pane {
    position: relative;
    padding-top: 15px;
}

.wizard h3 {
    margin-top: 0;
}

@media(max-width : 585px) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs>li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>


<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: white;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border: 1px solid #3c8dbc;
}
</style>