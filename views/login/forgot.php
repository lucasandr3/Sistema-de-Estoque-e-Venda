<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SLD - Esqueci Senha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=BASE_URL?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASE_URL?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=BASE_URL?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASE_URL?>assets/dist/css/AdminLTE.min.css">
  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/logo/logoicon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen" style="background:#2e4158;color:white;">

<?php if(isset($_SESSION['forgot'])): ?>
    <?php echo $_SESSION['forgot']; ?>
    <?php $_SESSION['forgot'] = ''; ?>
<?php endif; ?>

<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>SLD </b>Nutrição Esportiva</a>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <!-- <div class="lockscreen-image">
      <img src="<?=BASE_URL ?>assets/img/logo.png" alt="User Image">
    </div> -->
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="<?=BASE_URL?>login/forgotAction" method="POST">
      <div class="input-group">
        <input type="email" class="form-control" name="email" placeholder="Digite o E-mail">
        <input type="text" class="hide" name="group" value="3"/>
        <div class="input-group-btn" style="background:#977622;">
          <button type="submit" class="btn" style="background:#977622;margin-left: 0px;"><i class="fa fa-arrow-right"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Digite seu E-mail para recuperar a senha
  </div>
  <div class="text-center" style="font-size:16px;">
    Lembrou a Senha <a href="<?=BASE_URL?>login" style="color: #977622;">Fazer Login <i class="fa fa-sign-in"></i></a>
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?=BASE_URL?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=BASE_URL?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<style>
  .lockscreen-logo a {
    color: #fff;
}
.help-block {
    color: #fff;
    font-size: 15px;
}
</style>
</body>
</html>
