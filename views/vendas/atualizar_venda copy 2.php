  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Vendas</a></li>
                  <li><a href="" style="color:#555;">Edição de Venda</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
<form method="post" action="<?=BASE_URL?>vendedores/UpdateVenda">
        <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-1">
                      <a href="<?=BASE_URL?>vendas/all" class="btn btn-app bg-default">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </a>
                  </div>
                  <div class="col-md-11">
                  <div class="alert <?=($venda['status_venda'] === 'CLOSE' ? 'alert-success':'alert-warning')?> alert-dismissible" style="border-color:white;padding:17px;margin-bottom:0px;">
                        <?php if($venda['status_venda'] === 'CLOSE'): ?>
                            <p class="text-capitalize" style="font-size: 17px;font-weight: 600;"><i class="icon fa fa-info"></i> Venda Finalizada</p>
                        <?php else: ?>
                            <p class="text-capitalize" style="font-size: 17px;font-weight: 600;"><i class="icon fa fa-info"></i> Venda em Aberto</p>
                        <?php endif; ?>
                    </div>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><b>Dados da Venda</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                    <label>Data da Venda:</label>
                    <span><?=Data($venda['data_lista'])?> às <?=Hora($venda['data_lista'])?></span>
                    <input type="hidden" name="data_venda" value="<?=$venda['data_lista']?>"/>          
                </div> 
                <div class="col-md-6">
                    <label>Total:</label>
                    <span><?=Real($venda['total_tax'])?></span> 
                    <input type="hidden" name="total" value="<?=$venda['total_tax']?>"/>            
                </div>  
              </div>
              <hr style="margin-top:0px;"/>
              <div class="row">
                  <div class="col-md-6">
                      <label>Vendedor</label>  
                      <select class="form-control select2" name="vendor">
                        <option value="<?=$venda['vendor']?>"><?=$venda['vendor']?></option>
                        <?php foreach($vendors as $vendor): ?>
                        <option value="<?=$vendor['name']?>"><?=$vendor['name']?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label>Parceiro</label>  
                      <select class="form-control select2" name="parceiro">
                        <option value="<?=$venda['parceiro']?>"><?=$venda['parceiro']?></option>
                        <?php foreach($parceiros as $parceiro): ?>
                        <option value="<?=$parceiro['nome_parc']?>"><?=$parceiro['nome_parc']?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><b>Dados de Desconto</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <label>Desconto:</label>
                    <input type="text" class="form-control" name="desconto" value="<?=($venda['desconto'])?$venda['desconto']:'0.00'?>"/>                   
                </div>   
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><b>Dados Financeiros</b></h3>
          </div>
          <div class="box-body">
              <?php $pagamento = explode(',', $venda['pay']) ?>

              
                
                  <div class="row" style="margin-bottom:20px;">
                      <div class="col-md-4">
                          <label>Dinheiro</label>
                          <input type="text" class="form-control" name="f_dinheiro" value="<?=($venda['f_dinheiro'] === '')?'0.00':$venda['f_dinheiro']?>" placeholder="0,00">
                          <?php if($venda['f_dinheiro'] !== ''): ?>
                            <input type="hidden" class="form-control" name="pagamento[]" value="Dinheiro" placeholder="0,00">
                          <?php endif; ?>
                      </div>
                  </div>
               
                  <div class="row" style="margin-bottom:20px;">
                      <div class="col-md-6">
                          <label>Cartão de Crédito</label>
                          <input type="text" class="form-control" value="<?=($venda['f_cartao_c_loja_hist'] === '')?'0.00':$venda['f_cartao_c_loja_hist']?>" name="f_cartao_c" />
                          <?php if($venda['f_cartao_c_loja_hist'] !== '0.00'): ?>
                            <input type="hidden" class="form-control" name="pagamento[]" value="Cartão de Crédito (Loja)" placeholder="0,00">
                          <?php endif; ?>  
                      </div>
                      <div class="col-md-6">
                          <label>Parcelas e Taxa</label>
                          <select class="form-control select2" name="tcloja">
                              <option value="0">Escolha uma Taxa</option>
                              <?php foreach($taxas_credito_loja as $tc): ?>
                                <optgroup label="<?=$tc['brand']?>">
                                    <?php foreach($tc['tax'] as $taxs): ?>
                                        <option value="<?=$taxs['qt_parc']?>-<?=$taxs['taxa_v']?>-<?=$tc['brand']?>"><?=$taxs['qt_parc']?> Parcela(s) - Taxa <?=$taxs['taxa_v']?> - <?=$tc['brand']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                
                  <div class="row" style="margin-bottom:20px;">
                      <div class="col-md-6">
                          <label>Cartão de Débito</label>
                          <input type="text" class="form-control" value="<?=($venda['f_cartao_d_loja_hist'] === '')?'0.00':$venda['f_cartao_d_loja_hist']?>" name="f_cartao_d" />
                          <?php if($venda['f_cartao_d_loja_hist'] !== '0.00'): ?>
                            <input type="hidden" class="form-control" name="pagamento[]" value="Cartão de Débito (Loja)" placeholder="0,00">
                          <?php endif; ?>  
                      </div>
                      <div class="col-md-6">
                          <label>Parcelas e Taxa</label>
                          <select class="form-control select2" name="tdloja">
                              <option value="0">Escolha uma Taxa</option>
                              <?php foreach($taxas_debito_loja as $tc): ?>
                                <optgroup label="<?=$tc['brand']?>">
                                    <?php foreach($tc['tax'] as $taxs): ?>
                                        <option value="<?=$taxs['taxa_v']?>-<?=$tc['brand']?>">Taxa <?=$taxs['taxa_v']?> - <?=$tc['brand']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
               
                  <div class="row" style="margin-bottom:20px;">
                      <div class="col-md-6">
                          <label>Cartão de Crédito (Fornecedor)</label>
                          <input type="text" class="form-control" value="<?=$venda['f_cartao_c_parc_hist']?>" name="f_cartao_c_parc" />
                          <?php if($venda['f_cartao_c_parc_hist'] !== '0.00'): ?>
                            <input type="hidden" class="form-control" name="pagamento[]" value="<?=($venda['f_cartao_c_parc_hist'] === '0.00')?'':'Cartão de Crédito (Fornecedor)'?>" placeholder="0,00">
                          <?php endif; ?>
                      </div>
                      <div class="col-md-6" style="display:none;">
                          <label>Parcelas e Taxa</label>
                          <select class="form-control select2" name="tcparc">
                            <option value="0">Escolha uma Taxa</option>
                            <?php foreach($taxas_credito_parceiro as $tc): ?>
                                <optgroup label="<?=$tc['brand']?>">
                                    <?php foreach($tc['tax'] as $taxs): ?>
                                        <option value="<?=$taxs['taxa_v']?>-<?=$tc['brand']?>">Taxa <?=$taxs['taxa_v']?> - <?=$tc['brand']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
               
                  <div class="row">
                      <div class="col-md-6">
                          <label>Cartão de Débito (Fornecedor)</label>
                          <input type="text" class="form-control" style="margin-bottom:15px;" value="<?=$venda['f_cartao_d_parc_hist']?>" name="f_cartao_d_parc" />
                          <?php if($venda['f_cartao_d_parc_hist'] !== '0.00'): ?>
                            <input type="hidden" class="form-control" name="pagamento[]" value="<?=($venda['f_cartao_d_parc_hist'] === '0.00')?'':'Cartão de Débito (Fornecedor)'?>" placeholder="0,00">
                          <?php endif; ?>
                      </div> 
                      <div class="col-md-6" style="display:none;">
                          <label>Parcelas e Taxa</label>
                          <select class="form-control select2" name="tdparc">
                            <option value="0">Escolha uma Taxa</option>
                            <?php foreach($taxas_debito_parceiro as $tc): ?>
                                <optgroup label="<?=$tc['brand']?>">
                                    <?php foreach($tc['tax'] as $taxs): ?>
                                        <option value="<?=$taxs['taxa_v']?>-<?=$tc['brand']?>">Taxa <?=$taxs['taxa_v']?> - <?=$tc['brand']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-6">
                            <label>Pix</label>
                            <input type="text" class="form-control" name="f_pix" value="<?=($venda['f_pix'] === '')?'0.00':$venda['f_pix']?>" placeholder="0,00">
                            <?php if($venda['f_pix'] !== ''): ?>
                                <input type="hidden" class="form-control" name="pagamento[]" value="<?=($venda['f_pix'] === '')?'':'Pix'?>" placeholder="0,00">
                            <?php endif; ?>    
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-6">
                            <label>Pic Pay</label>
                            <input type="text" class="form-control" value="<?=($venda['f_picpay_hist'] === '')?'0.00':$venda['f_picpay_hist']?>" name="f_pic_pay" />
                            <?php if($venda['f_picpay_hist'] !== ''): ?>
                                <input type="hidden" class="form-control" name="pagamento[]" value="<?=($venda['f_picpay_hist'] === '')?'':'PicPay'?>" placeholder="0,00">
                            <?php endif; ?>    
                        </div>
                        <div class="col-md-6">
                            <label>Parcela e Taxa</label>
                            <select class="form-control select2" name="txpicpay">
                            <option value="0">Escolha uma Taxa</option>
                            <?php foreach($taxas_picpay as $tc): ?>
                                <optgroup label="<?=$tc['brand']?>">
                                    <?php foreach($tc['tax'] as $taxs): ?>
                                        <option value="<?=$taxs['taxa_v']?>-<?=$venda['f_picpay_hist']?>">Taxa <?=$taxs['taxa_v']?> - <?=$tc['brand']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    </div>
           
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- Default box -->
      <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><b>Produtos</b></h3>
          </div>
          <div class="box-body">
              <table class="table table-bordered dt-responsive tabela-res" width="100%">
                  <thead>
                      <tr>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>valor</th>
                      </tr>
                  </thead> 

                  <tbody>
                      <?php foreach($venda['produtos'] as $item): ?>
                      <tr>
                          <td class="text-capitalize" style="display:none;">
                            <input type="text" name="products[<?=$item['id_prod']?>][id_produto]" readonly class="form-control" value="<?=$item['id_produto'] ?>" style="width: 100%;border-radius: 5px;" />
                          </td>
                          <td class="text-capitalize">
                            <input type="text" name="products[<?=$item['id_prod']?>][nome_produto]" readonly class="form-control" value="<?=$item['nome_prod'] ?>" style="width: 100%;border-radius: 5px;" />
                          </td>
                          <td>
                            <input type="number" name="products[<?=$item['id_prod']?>][qtd]" readonly class="form-control" value="<?=$item['quant'] ?>" style="width: 100%;border-radius: 5px;" />
                          </td>
                          <td>
                            <input type="text" name="products[<?=$item['id_prod']?>][preco]" readonly class="form-control" value="<?=$item['valor'] ?>" style="width: 100%;border-radius: 5px;" />
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
     
      </div>
      <!-- /.box -->

      <div class="box <?=($venda['status_venda'] === 'CLOSE' ? 'box-success':'box-warning')?>">
          <div class="box-header with-border">
              <h3 class="box-title"><b>Observação da Venda</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12"> 
                      <textarea class="form-control" name="obs">
                        <?php if($venda['obs'] === ''): ?>
                            Sem Observação
                        <?php else: ?>
                            <?=$venda['obs'];?>
                        <?php endif; ?>
                      </textarea>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <input type="hidden" name="id_lista" value="<?=$venda['id_lista']?>">
      <?php if($venda['status_venda'] === 'OPEN'): ?>
        <button class="btn btn-success btn-block">Fechar Venda</button>
      <?php endif; ?>
</form>
  </section>
  <!-- /.content -->
 <style>
    th {
        background-color: #2e4158;
        color: white;
    }
    td {
        background-color: #d8d8d8;
    }
 </style>