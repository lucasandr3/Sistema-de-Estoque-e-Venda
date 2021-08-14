<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SLD Nutrição</title>
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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/main.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/plugins/iCheck/square/blue.css">

    <link rel="icon" href="<?=BASE_URL?>assets/img/logo.png" type="image/gif" sizes="16x16">

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

<body class="hold-transition login-page" style="background-color:#2e4158;display: flex;flex-direction:column;
    justify-content: center;
    align-items: center;">

    <?php if(isset($_SESSION['forgot'])): ?>
        <?php echo $_SESSION['forgot']; ?>
        <?php $_SESSION['forgot'] = ''; ?>
    <?php endif; ?>

    <div class="login-box">
        <div class="text-center">
            <img src="<?=BASE_URL ?>assets/img/logo.png" width="255" height="auto">
        </div>
        <div class="login-logo">
            <a href="<?php echo BASE_URL ?>" style="color:#f5f6fa">
                <b>SLD Nutrição Esportiva</b>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="letter-spacing: 1px;">
                <?= $this->lang->get('ENTRE COM SEUS DADOS DE ACESSO') ?></p>

            <?php if(isset($error) && !empty($error)): ?>
            <div class="callout callout-warning text-center"><?php echo $error; ?></div>
            <?php endif; ?>



            <form method="POST" action="<?=BASE_URL?>login/signin">
                <div class="form-group has-feedback">
                    <input type="email" name="email" autofocus class="form-control"
                        placeholder="<?= $this->lang->get('E-MAIL') ?>" style="border-radius:5px;outline:0;border: 0;
    box-shadow: inset 0px 0px 2px 0px #333;">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control"
                        placeholder="<?= $this->lang->get('Digite Sua Senha') ?>" style="border-radius:5px;outline:0;border: 0;
    box-shadow: inset 0px 0px 2px 0px #333;">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit"
                            class="btn btn bg-darkblue btn-block btn-touch"><?= $this->lang->get('ENTRAR') ?></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">

            </div>
            <!-- /.social-auth-links -->

            <i class="fa fa-lock"> <a href="<?=BASE_URL ?>login/forgotpass" style="letter-spacing:1px;color:#555;"><?= $this->lang->get('ESQUECI MINHA SENHA') ?></a></i><br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo BASE_URL ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>