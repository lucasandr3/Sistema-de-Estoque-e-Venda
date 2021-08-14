<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SLD - Nova Senha</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page" style="background:#2e4158;">

<?php if(isset($_SESSION['forgot'])): ?>
  <?php echo $_SESSION['forgot']; ?>
  <?php $_SESSION['forgot'] = ''; ?>
<?php endif; ?>

<div class="register-box">
  <div class="register-logo">
    <a href="javascript:void(0)" style="color:white;"><b>SLD </b>Nutrição Esportiva</a>
  </div>

  <div class="register-box-body" style="color:#fff;background:#2e4158;">
    <p class="login-box-msg" style="font-size:19px;">Olá, <span style="color: #977622;font-weight: bold"><?=$_SESSION['id_user_reset']['name']?></span> digite uma nova senha.</p>

    <form action="<?=BASE_URL?>login/newPassAction" method="POST">

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="r-pass" placeholder="Digite a nova senha" required style="height:45px;border-radius:10px;">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="line-height:45px;"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" onkeyup="verifyPass(this.value)" placeholder="Confirme a senha" style="height:45px;border-radius:10px;">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="line-height:45px;"></span>
        <p id="feedback-reset"></p>
      </div>
      <input type="hidden" name="id_user" value="<?=$_SESSION['id_user_reset']['id_user'];?>">
      <!-- <input class="hide" type="text" name="id_user" value="2"> -->
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" id="btn-sub" class="btn btn-primary btn-block btn-flat">Cadastrar Nova Senha</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?=BASE_URL?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=BASE_URL?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=BASE_URL?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script>
    function verifyPass(pass) {
        
       let confirm = document.querySelector('#r-pass').value;
       let feedback = document.querySelector('#feedback-reset');
       let btn = document.querySelector('#btn-sub');
       
       if (pass === confirm) {
           //feedback.classList.add('text-success', 'alert-success');
           feedback.style.display = 'none';
           btn.removeAttribute('disabled');
       } else {
           
           feedback.innerHTML = 'As Senhas não Conferem.';
           feedback.classList.add('text-danger', 'alert-danger');
           btn.setAttribute('disabled', true);
       }

    }
</script>

<style>
    .alert-danger {
        margin-top: 10px;
        border: 1px solid #a94442;
        background: #ff000030;
        padding: 12px;
        border-radius: 10px;
    }

    .alert-success {
        margin-top: 10px;
        border: 1px solid #3c763d !important;
        background: #3c763d !important;
        padding: 12px;
        border-radius: 10px;
    }
    .btn-primary {
    background-color: #2e4158;
    border-color: #ffffff;
    box-shadow: 2px 3px 0px -1px #fff !important;
    height: 45px;
    border-radius: 10px !important;
    }
    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {
        background-color: #977622;
        border-color: #fff;
    }
</style>

</body>
</html>
