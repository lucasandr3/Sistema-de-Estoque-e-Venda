<?php

class LoginController extends Controller
{
	public function index()
	{
		$data = array('error' => '');
		if (!empty($_GET['error'])) {
        	if ($_GET['error'] == '1') {
          	$data['error'] = 'Usuário e/ou Senha Inválidos.';
        	}
      	}
		$this->loadView('login/login', $data);
	}

	public function signin()
    {
		// echo "<pre>";
		// print_r($_POST);
		// exit;
      if (!empty($_POST['email']) && !empty($_POST['email'])) {

        $email_user = addslashes(trim($_POST['email']));
        $senha = addslashes(trim($_POST['password']));

        $uid = new Users();
        if ($uid->validateUser($email_user, $senha)) {
          header("Location: ".BASE_URL);
          $uid->hora_entrada();
          exit;

        } else {

          header("Location: ".BASE_URL."login?error=1");
          exit;
        }

      } else {

        header("Location: ".BASE_URL."login");
        exit;
      }
    }

    public function signup()
    {
      $data = array();

      if (!empty($_POST['nome_user']) && !empty($_POST['nome_user'])) {
        
        $nome_user       = addslashes(trim($_POST['nome_user']));  
        $email_user      = addslashes(trim($_POST['email_user']));
        $senha      = addslashes(trim($_POST['senha']));

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;

        $uid = new Usuarios();

          if (!$uid->userExists($nome_user)) {
            $uid->registerUser($nome_user, $email_user, $senha);

            header("Location: ".BASE_URL."login");
            exit;
          } else {

            $data['msg'] = 'E-mail já está Cadastrado.';
          }
      }

      $this->loadView('cadastrar', $data);
    }

    public function forgotPass()
    {  
      $data = array();

      $this->loadView('login/forgot', $data);
    }

    public function forgotAction()
    {  
      $uid = new Users();
      if (isset($_POST['email']) && !empty($_POST['email'])) {
        
        $email = addslashes(trim($_POST['email']));
          
          if ($uid->validateEmailForgot($email)) {
           
            header("Location: ".BASE_URL."login/resetPass");
            exit;
  
          } else {
  
            header("Location: ".BASE_URL."login/forgotPass");
            $_SESSION['forgot'] = '<div class="alert alert-warning" role="alert" style="border-radius:0px;text-align:center;">
            E-mail não encontrado, Entre em contato com o suporte.
            </div>';
            exit;
  
          }
      }
    }

    public function resetPass()
    {
      $data = array();

      $this->loadView('login/reset', $data);
    }

    public function newPassAction()
    {
      $uid = new Users();
      if (isset($_POST['password']) && !empty($_POST['password'])) {
        
        $password = addslashes(trim($_POST['password']));
        $id_user  = addslashes(trim($_POST['id_user']));
      }
        
        if($uid->newPass($password, $id_user) == true) {

          header("Location: ".BASE_URL."login");
          $_SESSION['forgot'] = '<div class="alert alert-success" role="alert" style="border-radius:0px;text-align:center;text-transform:capitalize;position: absolute;top: 0;left: 0;right: 0;">
            Senha Alterada com Sucesso.
          </div>';
          exit;
  
        } else {
  
            header("Location: ".BASE_URL."login/resetPass");
            $_SESSION['forgot'] = '<div class="alert alert-warning" role="alert" style="border-radius:0px;text-align:center;text-transform:capitalize;position: absolute;top: 0;left: 0;right: 0;">
            Erro ao resetar senha, tente novamente.
            </div>';
            exit;
        }
    }

    public function logout()
    {
      $uid = new Users();
    //   $uid->ultimoAcesso($_SESSION['idus']);
      unset($_SESSION['uLogin']);
      header("Location: ".BASE_URL."login");
      exit;
    }
}