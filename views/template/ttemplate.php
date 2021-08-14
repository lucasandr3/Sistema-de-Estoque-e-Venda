<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Financeiro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/main.css">
    <!-- Normalize -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/normalize.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="skin-purple sidebar-mini fixed">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header text-center"
                                    style="background-color:#2e4158;color:#fff;border-top-left-radius:0px;border-top-right-radius:0px;">
                                    <?= $this->lang->get('VOCÊ NÃO TEM NOTIFICAÇÕES') ?>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                    </ul>
                                </li>
                                <li class="footer"><a href="#"><?= $this->lang->get('VER TODAS') ?></a></li>
                            </ul>
                        </li>

                        <!-- Updates -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-th-list"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header text-center"
                                    style="background-color:#2e4158;color:#fff;border-top-left-radius:0px;border-top-right-radius:0px;">
                                    <?= $this->lang->get('APLICATIVOS') ?>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                        <li>
                                            <a data-toggle="modal" data-target="#modal-calculadora"
                                                style="color:#666;cursor:pointer;">
                                                <i class="fa fa-calculator"></i>
                                                Calcular Imposto
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" style="color:#666">
                                                <i class="fa fa-mobile-phone"></i>
                                                <?= $this->lang->get('APLICATIVOS MOBILE') ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header text-center"
                                    style="background-color:#2e4158;color:#fff;border-top-left-radius:0px;border-top-right-radius:0px;">
                                    <?= $this->lang->get('ESCOLHER IDIOMA') ?>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                        <li class="">
                                            <a href="<?php echo BASE_URL; ?>lang/set/pt-br" style="color:#666">
                                                <img src="<?php echo BASE_URL?>assets/img/flags/br.png" alt="Português"
                                                    width="22px"> &nbsp; <?= $this->lang->get('PORTUGUÊS') ?>
                                            </a>
                                        </li>
                                </li>
                                <!-- end task item -->
                                <li>
                                    <!-- Task item -->
                                    <a href="<?php echo BASE_URL; ?>lang/set/en" style="color:#666">
                                        <img src="<?php echo BASE_URL?>assets/img/flags/us.png" alt="Português"
                                            width="22px"> &nbsp; <?= $this->lang->get('INGLÊS') ?>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li>
                                    <!-- Task item -->
                                    <a href="<?php echo BASE_URL; ?>lang/set/es" style="color:#666">
                                        <img src="<?php echo BASE_URL?>assets/img/flags/es.png" alt="Português"
                                            width="22px"> &nbsp; <?= $this->lang->get('ESPANHOL') ?>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                    </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="<?php echo BASE_URL ?>login/logout">
                            <i class="fa fa-power-off"></i>
                            <span class="hidden-xs"></span>
                        </a>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel" style="margin-top:10px">
                    <p class="text-center" style="color:white;"> <?php echo $viewData['info']['name'] ?><br>
                        <small>Assinante desde -
                            <?php echo date('d/m/y', strtotime($viewData['info']['date_create'])) ?>
                        </small>
                    </p>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header text-center"><?= $this->lang->get('MENU PRINCIPAL') ?></li>

                    <li class="<?php echo ($viewData['menuActive'] == 'home')?'active':''; ?>">
                        <a href="<?php echo BASE_URL ?>"><i
                                class="fa fa-bar-chart"></i><span><?= $this->lang->get('INFORMAÇÕES GERAIS') ?></span>
                        </a>
                    </li>

                    <li class="header text-center"><?= $this->lang->get('LANÇAMENTOS') ?></li>

                    <li class="treeview <?php echo ($viewData['menuActive'] == 'receitas')?'active':''; ?>">
                        <a href="#">
                            <i class="fa fa-money"></i> <span><?= $this->lang->get('RECEITA') ?></span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo BASE_URL ?>receitas"><i class="fa fa-circle-o"></i><span>Ver
                                        Receitas</span></a></li>
                            <li><a href="<?php echo BASE_URL ?>receitas/recorrente"><i
                                        class="fa fa-circle-o"></i><span>Receitas Recorrentes</span></a></li>
                        </ul>
                    </li>

                    <li class="treeview <?php echo ($viewData['menuActive'] == 'despesas')?'active':''; ?>">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> <span><?= $this->lang->get('DESPESAS') ?></span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo BASE_URL ?>despesas"><i class="fa fa-circle-o"></i> Ver Despesas</a>
                            </li>
                            <li><a href="<?php echo BASE_URL ?>despesas/recorrente"><i
                                        class="fa fa-circle-o"></i><span>Despesas Recorrentes</span></a></li>
                        </ul>
                    </li>

                    <li class="<?php echo ($viewData['menuActive'] == 'objetivos')?'active':''; ?>">
                        <a href="<?php echo BASE_URL ?>objetivo"><i class="fa fa-check-square-o"></i>
                            <span><?= $this->lang->get('OBJETIVOS') ?></span>
                        </a>
                    </li>

                    <li class="<?php echo ($viewData['menuActive'] == 'relatorios')?'active':''; ?>">
                        <a href="<?php echo BASE_URL ?>relatorios"><i
                                class="fa fa-file-pdf-o"></i><span><?= $this->lang->get('RELATÓRIOS') ?></span>
                        </a>
                    </li>

                    <li class="<?php echo ($viewData['menuActive'] == 'sugestoes')?'active':''; ?>">
                        <a href="<?php echo BASE_URL ?>sugestoes"><i class="fa fa-pencil-square-o"></i>
                            <span>Sugestões</span></a>
                    </li>

                    <li class="<?php echo ($viewData['menuActive'] == 'configuracoes')?'active':''; ?>"><a
                            href="<?php echo BASE_URL ?>configuracao"><i
                                class="fa fa-gear"></i><span><?= $this->lang->get('CONFIGURAÇÕES') ?></span></a>
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
                <b><?= $this->lang->get('VERSÃO') ?></b> 1.0.0
            </div>
            <strong>Copyright &copy; <?php echo date('Y') ?> <a>MLV TEC</a>.</strong>
            <?= $this->lang->get('TODOS OS DIREITOS RESERVADOS') ?>.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

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
                                <button type="button" class="btn btn bg-purple pull-left" id="salvar" name="salvar"
                                    style="margin-top: 15px">
                                    Calcular
                                </button>
                                <button type="button" class="btn btn bg-purple pull-left" data-dismiss="modal"
                                    style="margin-left:10px;margin-top:15px">Fechar
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

    <!-- jQuery 3 -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo BASE_URL ?>assets/js/jquery.mask.min.js"></script>
    <!-- juery Form -->
    <script src="<?php echo BASE_URL ?>assets/js/graficos.js"></script>
    <!-- DataTables -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
    </script>
    <script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js">
    </script>
    <!-- Sparkline -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script
        src="<?php echo BASE_URL ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo BASE_URL ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo BASE_URL ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_URL ?>assets/dist/js/demo.js"></script>
    <!-- Sweet Alert -->
    <script src="<?php echo BASE_URL ?>assets/js/sweetalert2.all.js"></script>
    <!-- dataTables -->
    <script src="<?php echo BASE_URL ?>assets/js/data.js"></script>
    <!-- main js -->
    <script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
    <!-- juery Form -->
    <script src="<?php echo BASE_URL ?>assets/js/calculadora.js"></script>
    <script>
    <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo "swal(".$_SESSION['msg'].");";
            $_SESSION['msg'] = '';
        } 
    ?>
    </script>
</body>

</html>