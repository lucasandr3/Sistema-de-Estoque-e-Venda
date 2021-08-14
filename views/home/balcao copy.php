<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <div class="row">
        <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
            <ul class="breadcrumb">
                <li><a href="" style="color:#555;">Home</a></li>
                <li><a href="" style="color:#555;">Informações</a></li>
            </ul>
        </div>
    </div>
</section> -->

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

                <!-- <div class="row">
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

                    <div class="form-group col-md-12" id="forma-pgt-md-col" style="display:none;">
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
                                <option value="Cartão de Débito (Loja - Elo)">Cartão de Débito (Loja - Elo)
                                </option>
                                <option value="Cartão de Crédito (Loja - Elo)">Cartão de Crédito (Loja - Elo)
                                </option>
                                <option value="Cartão de Débito (Loja - Cabal Vale)">Cartão de Débito (Loja -
                                    Cabal
                                    Vale)</option>
                                <option value="Cartão de Crédito (Loja - Cabal Vale)">Cartão de Crédito (Loja -
                                    Cabal Vale)</option>
                                <option value="Cartão de Débito (Loja - Amex)">Cartão de Débito (Loja - Amex)
                                </option>
                                <option value="Cartão de Crédito (Loja - Amex)">Cartão de Crédito (Loja - Amex)
                                </option>

                                <option value="Cartão de Débito (Parceiro)">Cartão de Débito (Parceiro)</option>
                                <option value="Cartão de Crédito (Parceiro)">Cartão de Crédito (Parceiro)
                                </option>
                            </select>
                        </div>
                    </div>
                </div> -->

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
                                <option value="0">Escolha uma opção</option>
                                <?php foreach($parceiros as $p): ?>
                                <option value="<?=$p['id_parceiro'];?>"><?=$p['nome_parc']?></option>
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
                                <span class="btn btn-sm btn-primary btn-flat btn-block" onClick="discountShow()">Autorizar Desconto</span>
                            </div>
                            <div id="desconto-true" style="display:none;">
                                <input type="text" class="form-control" value="0" name="discount" placeholder="Digite o valor Ex: 5" />
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
                    <input class="hidden" type="text" name="id_user" value="<?php echo $info['id_user'] ?>">
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

                <?php else: ?>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Valor para abrir o caixa:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>
                            <input type="text" class="form-control pull-right open-venda-v" name="total" id="valorrec"
                                placeholder="0.00">
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
        <div class="modal-footer" style="margin-top: -10px;">
            <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()"
                style="border:1px solid #999;">
                <i class="fa fa-times"></i> Cancelar Venda</button>
            <!-- <button type="submit" class="btn btn bg-green pull-left"><i class="fa fa-check"></i> Confirmar
                Venda</button> -->
            
            <span class="btn bg-green pull-left" data-toggle="modal" data-target="#modal-confirm-sale"><i class="fa fa-check"></i> Confirmar
                Venda</span>
                
        </div>
        <?php endif; ?>

        <div class="modal fade" id="modal-confirm-sale" data-backdrop="static">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#2e4158;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">x</span></button>
                        <h4 class="modal-title text-center" style="color:white">
                            <?php if($open_day): ?>
                            Como o cliente vai pagar
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
                                        <legend class="scheduler-border">Cliente</legend>
                                        <select class="form-control select2" name="client" style="width: 100%;" required>
                                            <option>Escolha o Cliente</option>
                                            <?php foreach($clients as $c): ?>
                                            <option value="<?=$c['id']?>"><?=$c['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Dinheiro</label>
                                   <input class="form-control" type="number" id="cacl-d" name="fpdinheiro" placeholder="Digite o Valor" onFocusOut="calcVenda(this.value)"/>              
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cartão de Crédito</label>
                                   <input class="form-control" type="number" id="cacl-cc" name="fpcartaoc" placeholder="Digite o Valor" onFocusOut="calcVenda(this.value)"/>              
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cartão de Débito</label>
                                   <input class="form-control" type="number" id="cacl-cd" name="fpcartaod" placeholder="Digite o Valor" onFocusOut="calcVenda(this.value)"/>            
                                </div>
                                <div class="form-group col-md-3">
                                   <span class="btn btn-primary" style="margin-top: 25px;width: 100%;" onClick="LimparCalCampos()">Limpar campos</span>            
                                </div>
                            </div>
                                <hr/>

                            <!-- <div class="row">
                                <div class="form-group col-md-12">
                                   <label>Pagamento (maquineta)</label>
                                   <select name="formapgt" class="form-control">
                                      <option value="Dinheiro">Dinheiro</option>  
                                      <option value="Cartão de Crédito (Loja)">Cartão de Crédito (Loja)</option>          
                                      <option value="Cartão de Débito (Loja)">Cartão de Débito (Loja)</option>
                                      <option value="Cartão de Crédito (Parceiro)">Cartão de Crédito (Parceiro)</option>          
                                      <option value="Cartão de Débito (Parceiro)">Cartão de Débito (Parceiro)</option>                  
                                   </select>       
                                </div>
                            </div>  -->
                            
                            <div class="row">
                                    <div class="form-group col-md-12" data-select2-id="13">
                                        <label>Multiple</label>
                                        <select class="form-control select2" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="17">Alabama</option>
                                        <option data-select2-id="18">Alaska</option>
                                        <option data-select2-id="19">California</option>
                                        <option data-select2-id="20">Delaware</option>
                                        <option data-select2-id="21">Tennessee</option>
                                        <option data-select2-id="22">Texas</option>
                                        <option data-select2-id="23">Washington</option>
                                    </div> 
                            </div>

                            <!-- <div class="row">
                                <div class="form-group col-md-6" id="forma-pgt-md-col">
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
                                            <option value="Cartão de Débito (Loja - Elo)">Cartão de Débito (Loja - Elo)
                                            </option>
                                            <option value="Cartão de Crédito (Loja - Elo)">Cartão de Crédito (Loja - Elo)
                                            </option>
                                            <option value="Cartão de Débito (Loja - Cabal Vale)">Cartão de Débito (Loja -
                                                Cabal
                                                Vale)</option>
                                            <option value="Cartão de Crédito (Loja - Cabal Vale)">Cartão de Crédito (Loja -
                                                Cabal Vale)</option>
                                            <option value="Cartão de Débito (Loja - Amex)">Cartão de Débito (Loja - Amex)
                                            </option>
                                            <option value="Cartão de Crédito (Loja - Amex)">Cartão de Crédito (Loja - Amex)
                                            </option>

                                            <option value="Cartão de Débito (Parceiro)">Cartão de Débito (Parceiro)</option>
                                            <option value="Cartão de Crédito (Parceiro)">Cartão de Crédito (Parceiro)
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" style="display:none;" id="sel-parc">
                                    <label>Qtd Parcela:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <select name="" id="sel-op-parc" class="form-control" onChange="setTaxaValue(this.value)">

                                        </select>
                                    </div>
                                </div>
                            </div> -->

                            <hr/>
                            

                            <div class="row" id="val-restante-venda">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                                        <tfoot>
                                            <tr>
                                                <td style="background-color: #CC;font-weight: bold;font-size: 18px;">Valor Restante
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
                                    <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                                        <tfoot>
                                            <tr>
                                                <td style="background-color: #CCC;font-weight: bold;font-size: 18px;">Total da Venda
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
                        <button type="button" class="btn btn-default pull-left" onClick="refreshnotv()" style="border-color: #666;"><i class="fa fa-times"></i> Cancelar Venda</button>
                        <button type="submit" class="btn btn bg-green pull-left"><i class="fa fa-sign-in"></i> Concluir Venda</button>
                    </div>
                    <?php endif; ?>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->   

        </form>
    </div>
    <!-- /.modal-content -->
</section>
<!-- /.content -->
<button class="btn btn-app bg-primary" data-toggle="modal" data-target="#modal-discount-ddd" id="btn-authorize-discount" style="display:non;"><i
    class="fa fa-calculator"></i> 
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
                                <input type="password" class="form-control pull-right" name="produto" id="value-discount" placeholder="Digite a senha">
                            </div>
                            <input type="hidden" value="<?=$info['id_user']?>" id="value-dis-user">
                        </div>
                    </div><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn bg-default pull-left" id="close-discount-modal" data-dismiss="modal"
                            style="margin-left:-15px;margin-top:0px">Fechar
                        </button>
                        <button type="button" class="btn btn bg-purple pull-left" onClick="verifyPassDiscount()" id="btn-discount-save"
                            style="margin-top: 0px">
                            Autorizar
                        </button>
                        <button type="button" class="btn btn bg-purple pull-left" id="btn-discount-spin"  style="display:none;"
                            style="margin-top: 0px">
                            Aguarde  <i class="fa fa-refresh fa-spin"></i>
                        </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>