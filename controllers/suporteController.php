<?php
class suporteController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_suporte')) {
            $this->loadView('404/500');
            exit;
        }
    }	

	public function index()
	{
		$data = array(
            'menuActive' => 'suporte',
            'user' => $this->user,
        );

        $data['titulo'] = "Suporte";

		$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

		$this->loadTemplate('suporte/suporte', $data);
	}

    public function edit()
    {
        $conf = new Configuracao();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            
            $name     = addslashes(trim($_POST['name']));
            $email    = addslashes(trim($_POST['email']));
            $id       = addslashes(trim($_POST['id']));

            $conf->editUser($name, $email, $id);
            header("Location: ".BASE_URL."configuracao");
        }
    }

    public function editPassword()
    {
        $data = array();

        $conf = new Configuracao();
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            
            $password = addslashes(trim($_POST['password']));
            $id       = addslashes(trim($_POST['id']));

            $conf->editPassword($password, $id);
            header("Location: ".BASE_URL."configuracao");
        }
    }
    
    public function usuarios()
	{
		$data = array('menuActive' => 'configuracoes');
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['list'] = $u->getAll();

        $p = new Permissions();
        $data['permission_groups'] = $p->getGroupList();
    
    	$this->loadTemplate('config/usuarios', $data);
	}

    public function add()
    {
        if(isset($_POST['title']) && !empty($_POST['title'])) {

            $title = $_POST['title'];
            $body = $_POST['body'];
          
            $s = new Suporte();
            if ($s->add($title, $body)) {
                header("Location: ".BASE_URL."suporte/obrigado");
            } else {
                header("Location: ".BASE_URL."suporte");
                $_SESSION['msg'] = "Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Erro ao Enviar Sugestão!',
                    showConfirmButton: false,
                    timer: 2500
                  })";
            }
        }
    }

    public function obrigado()
	{
		$data = array('menuActive' => 'suporte');
        
        $data['titulo'] = 'Obrigado';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $s = new Suporte();
        $data['list'] = $s->getFrases();

        $p = new Permissions();
        $data['permission_groups'] = $p->getGroupList();
    
    	$this->loadTemplate('suporte/obrigado', $data);
	}

    public function addTaxa()
    {
        if(isset($_POST['taxa']) && !empty($_POST['taxa'])) {

            $taxa = $_POST['taxa'];
            $type = $_POST['type'];
            $op = $_POST['op'];

            $t = new Taxas();
            $t->add($taxa, $type, $op);
            header("Location: ".BASE_URL."configuracao/taxas");
        }
    }

    public function edit_taxa($id)
	{
		$data = array('menuActive' => 'configuracoes');
        
        $data['titulo'] = 'Taxas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $t = new Taxas();
        $data['taxa'] = $t->getAllId($id);

        $p = new Permissions();
        $data['permission_groups'] = $p->getGroupList();
    
    	$this->loadTemplate('config/taxa_edit', $data);
	}

    public function editTaxaAction()
    {
        if(isset($_POST['taxa']) && !empty($_POST['taxa'])) {

            $taxa   = $_POST['taxa'];
            $type   = $_POST['type'];
            $op   = $_POST['op'];
            $id_tax = $_POST['id_tax'];

            $t = new Taxas();
            $t->edit($type, $op, $taxa,  $id_tax);
            header("Location: ".BASE_URL."configuracao/taxas");
        }
    }

    public function del_taxa($id)
    {

        $t = new Taxas();
        $t->del($id);
        header("Location: ".BASE_URL."configuracao/taxas");
    }
}