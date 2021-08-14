<?php
class objetivoController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_objetivos')) {
            $this->loadView('404/500');
            exit;
        }
    }

    public function index()
    {
        $data = array(
            'menuActive' => 'objetivos',
            'user' => $this->user,
        );

        $data['titulo'] = 'Objetivos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $ob = new Objetivo();
        $data['obano'] = $ob->getObAno($_SESSION['idus']);
        $data['obmes'] = $ob->getObMes($_SESSION['idus']);

    	$this->loadTemplate('objetivos', $data);
    }

    public function addAno()
    {
        $oba = new Objetivo();
        if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
            
            $descricao = addslashes(trim($_POST['descricao']));
            $status    = addslashes(trim($_POST['status']));
            $id_user   = addslashes(trim($_POST['id']));

            $oba->addObjetivoAno($descricao, $status, $id_user);
            header("Location: ".BASE_URL."objetivo");
        }
    }

    public function addMes()
    {
       $obm = new Objetivo();
        if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
            
            $descricao = addslashes(trim($_POST['descricao']));
            $status    = addslashes(trim($_POST['status']));
            $id_user   = addslashes(trim($_POST['id']));

            $obm->addObjetivoMes($descricao, $status, $id_user);
            header("Location: ".BASE_URL."objetivo");
        } 
    }

    public function editAno()
    {
        $oba = new Objetivo();
        if (isset($_POST['status']) && !empty($_POST['status'])) {
            
            $status = addslashes(trim($_POST['status']));
            $id     = addslashes(trim($_POST['id']));

            $oba->editStatusAno($status, $id);
            header("Location: ".BASE_URL."objetivo");
        }
    }

    public function editMes()
    {
        $obm = new Objetivo();
        if (isset($_POST['status']) && !empty($_POST['status'])) {
            
            $status = addslashes(trim($_POST['status']));
            $id     = addslashes(trim($_POST['id']));

            $obm->editStatusMes($status, $id);
            header("Location: ".BASE_URL."objetivo");
        }
    }
}    