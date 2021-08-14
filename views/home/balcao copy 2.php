<section class="content">

    <div class="box">
        <div class="box-body">
            <?php if($open_day): ?>
            <form action="<?= BASE_URL ?>vendedores/createVenda" method="POST">

                <div class="row">
                    <div class="form-group col-md-12">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Adicionar Produto</legend>
                            <div class="control-group">
                                <div class="controls bootstrap-timepicker">
                                    <input type="text" id="add_prod-v" data-type="busca_prods" class="form-control"
                                        placeholder="Digite o Nome ou o código do produto" autofocus />
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
                        <h5 class="background"><span><strong>Informações de Pagamento</strong></span></h5>
                    </div>
                </div>
                <div class="form-group col-md-6" style="display:none;">
                        <label>total:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>
                            <input type="text" class="form-control pull-right venda-val" name="total" id=""
                                placeholder="0.00">
                        </div>
                    </div>

                <div class="row">

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
                                <input type="text" class="form-control" value="0" id="desc-sale-sld" onchange="updateTotalv()" name="discount"
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
                            <input type="date" class="form-control pull-right" value="<?=date('Y-m-d')?>"
                                name="data_venda" id="" placeholder="00/00/0000">
                        </div>
                    </div>
                </div>

<!--                <div class="row">-->
<!--                    <div class="form-group col-md-6">-->
<!--                        <label>Vendedor:</label>-->
<!--                        <select class="form-control select2" name="id_user" style="width: 100%;"-->
<!--                                                required>-->
<!--                            <option>Escolha o Vendedor</option>-->
<!--                            --><?php //foreach($vendedores as $v): ?>
<!--                            <option value="--><?//=$v['name']?><!--">--><?//=$v['name']?><!--</option>-->
<!--                            --><?php //endforeach; ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nota da Venda:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <textarea class="form-control" name="obs"></textarea>
                        </div>
                    </div>
                    <!-- <input class="hidden" type="text" name="id_user" value="<?php echo $info['id_user'] ?>"> -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                            <tfoot>
                                <tr>
                                    <td style="background-color: #CCC;font-weight: bold;font-size: 18px;">Total da Venda
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

                <div class="box-footer" style="margin: 10px -10px;">
                    <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                        style="border:1px solid #999;margin-right: 10px;">
                        <i class="fa fa-times"></i> Cancelar Venda</button>
                    <!-- <button type="submit" class="btn btn bg-green pull-left"><i class="fa fa-check"></i> Confirmar
                        Venda</button> -->

                    <span class="btn bg-green pull-left" data-toggle="modal" data-target="#modal-confirm-sale"><i
                            class="fa fa-check"></i> Confirmar
                        Venda</span>

                </div>


                <div class="modal fade" id="modal-confirm-sale" data-backdrop="static">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#2e4158;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color:white">x</span></button>
                                <h4 class="modal-title text-center" style="color:white">
                                    Como o cliente vai pagar
                                </h4>
                            </div>
                            <div class="modal-body">



                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Cliente</legend>
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
                                    <div class="form-group col-md-3">
                                        <label>Dinheiro</label>
                                        <input class="form-control" type="text" id="cacl-d" name="fpdinheiro"
                                            placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Dinheiro')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cartão de Crédito</label>
                                        <input class="form-control" type="text" id="cacl-cc" name="fpcartaoc"
                                            placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Cartão de Crédito (Loja)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cartão de Débito</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="fpcartaod"
                                            placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Cartão de Débito (Loja)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Pix</label>
                                        <input class="form-control" type="text" id="cacl-pix" name="fppix"
                                               placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Pix')" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Pic Pay</label>
                                        <input class="form-control" type="text" id="cacl-cd" name="fppicpay"
                                               placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Pic Pay')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cartão de Crédito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-cd" name=""
                                               placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Cartão de Crédito (Fornecedor)')" />
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Cartão de Débito (Fornecedor)</label>
                                        <input class="form-control" type="text" id="cacl-pix" name=""
                                               placeholder="Digite o Valor" onFocusOut="calcVenda(this.value, 'Cartão de Débito (Fornecedor)')" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <span class="btn btn-primary" style="margin-top: 25px;width: 100%;"
                                              onClick="LimparCalCampos()">Limpar campos</span>
                                    </div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="form-group col-md-12">
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
                                                    data-placeholder="Escolha uma opção" style="width: 100%;"
                                                    tabindex="-1" aria-hidden="true" id="pay-options">
                                                <option value="Dinheiro">Dinheiro</option>
                                                <option value="Cartão de Crédito (Loja)">Cartão de Crédito (Loja)</option>
                                                <option value="Cartão de Débito (Loja)">Cartão de Débito (Loja)</option>
                                                <option value="Pix">Pix</option>
                                                <option value="Pic Pay">Pic Pay</option>
                                                <option value="Cartão de Crédito (Fornecedor)">Cartão de Crédito (Parceiro)</option>
                                                <option value="Cartão de Débito (Fornecedor)">Cartão de Débito (Parceiro)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <hr />


                                <div class="row" id="val-restante-venda">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped dt-responsive tabela-res"
                                            width="100%">
                                            <tfoot>
                                                <tr>
                                                    <td
                                                        style="background-color: #CC;font-weight: bold;font-size: 18px;">
                                                        Valor Restante
                                                    </td>
                                                    <td class="text-green" id="td-calc-venda"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda-modal-calc">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped dt-responsive tabela-res"
                                            width="100%">
                                            <tfoot>
                                                <tr>
                                                    <td
                                                        style="background-color: #CCC;font-weight: bold;font-size: 18px;">
                                                        Total da Venda
                                                    </td>
                                                    <td class="text-green"
                                                        style="background:#00800033;font-size: 18px;font-weight: bold;">
                                                        <span id="total-table-venda-modal">R$ 0,00</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                                    style="border-color: #666;"><i class="fa fa-times"></i> Cancelar Venda</button>
                                <button type="submit" class="btn btn bg-green pull-left"><i class="fa fa-sign-in"></i>
                                    Concluir Venda</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

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


            <?php else: ?>

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

            <?php endif; ?>
        </div>
    </div>
    <!-- /.modal-content -->
</section>
<!-- /.content -->




    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color:white;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border: 1px solid #3c8dbc;
        }
    </style>