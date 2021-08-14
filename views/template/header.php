<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$viewData['titulo'];?></title>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/morris.js/morris.css">
    <!-- Morris charts -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/main.css">
    <link rel="icon" href="<?=BASE_URL?>assets/img/logosld.jpg" type="image/gif" sizes="16x16">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/select2/dist/css/select2.min.css">
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

<body class="hold-transition skin-purple sidebar-mini <?=(isset($viewData['layout'])?$viewData['layout']:'');?>">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=BASE_URL?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    SLD
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    SLD Nutrição
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <?php if($viewData['titulo'] != 'Ponto de Venda'): ?>
                <div class="navbar-custom-menu" style="float: left;">
                    <ul class="nav navbar-nav">

                        <li class="dropdown tasks-menu" style="cursor:pointer;">
                            <a href="<?=BASE_URL ?>home/balcao" class="" target="_blank">
                                <span class="btn-balcao">
                                    Ponto de Venda
                                    <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- 
                        <li class="dropdown tasks-menu" style="cursor:pointer;">
                            <a href="<?=BASE_URL ?>home/balcao" class="">
                                <span class="btn-balcao">
                                    Ponto de Venda
                                    <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            </a>
                        </li> -->

                        <!-- Notifications: style can be found in dropdown.less -->
                        <li>
                            <a href="<?=BASE_URL?>login/logout">
                                <i class="fa fa-sign-out"></i>
                                Sair do sistema
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>