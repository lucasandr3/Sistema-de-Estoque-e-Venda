<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo BASE_URL ?>assets/img/logosld.jpg" class="img-circle" alt="User Image" style="border: 2px solid #00a65a;">
            </div>
            <div class="pull-left info">
                <p><?php echo $viewData['info']['name'] ?></p>
                <a href="#" style="font-size:13px;"><i class="fa fa-bookmark"></i>
                    <?php echo $viewData['info']['nome_group'] ?></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center">MENU PRINCIPAL</li>

            <!-- Dashboard -->
            <?php if($viewData['user']->hasPermission('ver_dashboard')): ?>
            <li class="<?php echo ($viewData['menuActive'] == 'home')?'active':''; ?>">
                <a href="<?php echo BASE_URL ?>"><i class="fa fa-bar-chart"></i><span>Dashboard</span></a>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_vendas')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'vendas')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Vendas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>vendas/all"><i class="fa fa-circle-o"></i>Ver Vendas</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_cupons')): ?>
            <!-- <li class="treeview <?php echo ($viewData['menuActive'] == 'cupons')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-ticket"></i> <span>Cupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>cupons"><i class="fa fa-circle-o"></i>Ver Cupons</a>
                    </li>
                </ul>
            </li> -->
            <?php endif; ?>

            <!-- Receitas -->
            <?php if($viewData['user']->hasPermission('ver_receitas')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'receitas')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Receitas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>receitas"><i class="fa fa-circle-o"></i><span>Contas a Receber</span></a></li>
                    <li><a href="<?php echo BASE_URL ?>receitas/recorrente"><i class="fa fa-circle-o"></i><span>Contas a receber Parceladas</span></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Despesas -->
            <?php if($viewData['user']->hasPermission('ver_despesas')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'despesas')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Despesas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>despesas"><i class="fa fa-circle-o"></i>Contas a Pagar</a></li>
                    <li><a href="<?php echo BASE_URL ?>despesas/recorrente"><i class="fa fa-circle-o"></i><span>Contas a pagar Parceladas</span></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Produtos -->
            <?php if($viewData['user']->hasPermission('ver_produtos')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'produtos')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Produtos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>categorias"><i class="fa fa-circle-o"></i>Categorias</a></li>
                    <li><a href="<?php echo BASE_URL ?>marcas"><i class="fa fa-circle-o"></i>Marcas</a></li>
                    <li><a href="<?php echo BASE_URL ?>unidades"><i class="fa fa-circle-o"></i>Unidade</a></li>
                    <li><a href="<?php echo BASE_URL ?>produtos"><i class="fa fa-circle-o"></i>Produtos</a></li>
                    <li><a href="<?php echo BASE_URL ?>produtos/validade"><i class="fa fa-circle-o"></i>Validade de
                            Produtos</a></li>
                    <li><a href="<?php echo BASE_URL ?>produtos/vencidos"><i class="fa fa-circle-o"></i> Produtos
                            Vencidos</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Estoque -->
            <?php if($viewData['user']->hasPermission('ver_estoque')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'estoque')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Estoque</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>estoque"><i class="fa fa-circle-o"></i>Saldo de estoque</a></li>
                    <li><a href="<?php echo BASE_URL ?>estoque/entrada"><i class="fa fa-circle-o"></i>Entrada de
                            produto</a></li>
                    <li><a href="<?php echo BASE_URL ?>estoque/saida"><i class="fa fa-circle-o"></i>Saida Manual</a>
                    </li>
                    <li><a href="<?php echo BASE_URL ?>estoque/saidas"><i class="fa fa-circle-o"></i>Ver Saidas
                            Manuais</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_parceiros')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'parceiro')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-handshake-o"></i> <span>Parceiros</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>parceiros"><i class="fa fa-circle-o"></i>Ver Parceiros</a>
                    <li><a href="<?php echo BASE_URL ?>parceiros/comissao"><i class="fa fa-circle-o"></i>Comissão</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Vendedores -->
            <?php if($viewData['user']->hasPermission('ver_fornecedores')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'fornecedor')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Fornecedores</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>fornecedores"><i class="fa fa-circle-o"></i>Ver Fornecedores</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Vendedores -->
            <?php if($viewData['user']->hasPermission('ver_clientes')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'clientes')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Clientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=BASE_URL ?>clientes"><i class="fa fa-circle-o"></i>Ver Clientes</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_caixa')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'fechamento')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-file-pdf-o"></i> <span>Relatórios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>relatorios/caixa_dia"><i class="fa fa-circle-o"></i>Fechamento de caixa diário</a>
                    </li>
                    <li><a href="<?php echo BASE_URL ?>relatorios/caixa_mes"><i class="fa fa-circle-o"></i>Fechamento de caixa Mensal</a>
                    </li>
                    <li><a href="<?php echo BASE_URL ?>relatorios/vendas_vendedor"><i class="fa fa-circle-o"></i>Vendas por vendedor</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Relatorios -->
            <!-- <?php if($viewData['user']->hasPermission('ver_relatorios')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'relatorios')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Relatórios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>relatorios"><i class="fa fa-circle-o"></i> Diário</a></li>
                    <li><a href="<?php echo BASE_URL ?>relatorios/mensal"><i class="fa fa-circle-o"></i> Mensal</a></li>
                </ul>
            </li>
            <?php endif; ?> -->

            <?php if($viewData['user']->hasPermission('ver_configuracoes')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'configuracoes')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Configurações</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL ?>configuracao"><i class="fa fa-circle-o"></i> Loja</a></li>
                    <li><a href="<?php echo BASE_URL ?>configuracao/taxas"><i
                                class="fa fa-circle-o"></i><span>Taxas</span></a>
                    <li><a href="<?php echo BASE_URL ?>configuracao/usuarios"><i
                                class="fa fa-circle-o"></i><span>Usuários</span></a>
                    </li>
                    <li><a href="<?=BASE_URL ?>permissions"><i class="fa fa-circle-o"></i><span>Permissões</span></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_objetivos')): ?>
            <li class="<?php echo ($viewData['menuActive'] == 'objetivos')?'active':''; ?>">
                <a href="<?php echo BASE_URL ?>objetivo"><i class="fa fa-bookmark"></i><span>Metas /
                        Objetivos</span></a>
            </li>
            <?php endif; ?>

            <?php if($viewData['user']->hasPermission('ver_suporte')): ?>
            <li class="treeview <?php echo ($viewData['menuActive'] == 'suporte')?'active':''; ?>">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span>Suporte</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="https://api.whatsapp.com/send?phone=5534988373408" target="_blank"><i
                                class="fa fa-circle-o"></i> Whatsapp</a></li>
                    <li><a href="<?php echo BASE_URL ?>suporte"><i class="fa fa-circle-o"></i><span>Sugestão</span></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- Logout -->
            <li>
                <a href="<?=BASE_URL?>login/logout">
                    <i class="fa fa-sign-out"></i> <span>Sair do Sistema</span><b></b>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?=date('Y')?> <a href="#">Lucas Vieira</a>.</strong> Todos os direitos reservados.
</footer>

<div class="modal fade" data-backdrop="static" id="modal-calculadora">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2e4158;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">x</span></button>
                <h4 class="modal-title text-center" style="color:white">Calcular Impostos</h4>
            </div>
            <div class="modal-body">

                <form method="POST" class="form" id="fcal" action="<?php echo BASE_URL ?>helper/phpform.php">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Valor do Produto</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="produto" id="produto">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Taxa de imposto (em %)</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i>%</i>
                                </div>
                                <input type="text" class="form-control pull-right" name="pct" id="pct">
                            </div>
                        </div>
                    </div><br>

                    <div id="resposta">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn bg-default pull-left" data-dismiss="modal"
                            style="margin-left:10px;margin-top:15px">Fechar
                        </button>
                        <button type="button" class="btn btn bg-purple pull-left" id="salvar" name="salvar"
                            style="margin-top: 15px">
                            Calcular
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
<!-- ./wrapper -->