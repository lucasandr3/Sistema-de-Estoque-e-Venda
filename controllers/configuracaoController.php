<?php
class configuracaoController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_configuracoes')) {
            $this->loadView('404/500');
            exit;
        }
    }	

	public function index()
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );

        $data['titulo'] = "Configurações";

		$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

		$this->loadTemplate('config/configuracao', $data);
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
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['list'] = $u->getAll();

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/usuarios', $data);
	}

    public function inativos()
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['list'] = $u->getAllInative();

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/usuarios_inativos', $data);
	}

    public function addUser()
    {
        if(isset($_POST['name']) && !empty($_POST['name'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $group = $_POST['group'];

            $u = new Users();
            $u->saveUsuario($name, $email, $password, $status, $group);
            header("Location: ".BASE_URL."configuracao/usuarios");
        }
    }

    public function taxas()
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Taxas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $t = new Taxas();
        $data['list'] = $t->getAll();

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/taxas', $data);
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
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Taxas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $t = new Taxas();
        $data['taxa'] = $t->getAllId($id);

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/taxa_edit', $data);
	}

    public function ver_taxas($id, $brand)
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Taxas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $t = new Taxas();
        $data['taxa'] = $t->getAllIdAll($id);
        $data['brand'] = $brand;
        $data['id'] = $id;
        //dde($data['taxa']);

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/ver_taxas', $data);
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

    public function editUser($id)
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName();
        $data['userid'] = $u->getUsuarioId($id);

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/usuarios_edit', $data);
	}

    public function editUserAction()
    {
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome   = $_POST['nome'];
            $email   = $_POST['email'];
            $grupo   = $_POST['grupo'];
            $id = $_POST['id'];

            $u = new Users();
            $u->editUsuario($nome, $email, $grupo, $id);
            header("Location: ".BASE_URL."configuracao/usuarios");
        }
    }

    public function editUserPass($id)
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['userid'] = $u->getUsuarioId($id);

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/usuarios_pass', $data);
	}

    public function editUserPassDiscount($id)
	{
		$data = array(
            'menuActive' => 'configuracoes',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Usuários';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['userid'] = $u->getUsuarioId($id);

        $p = new Permissions();
        $data['permission_groups'] = $p->getAllGroups();
    
    	$this->loadTemplate('config/usuarios_pass_discount', $data);
	}

    public function editUserPassAction()
    {
        if(isset($_POST['pass']) && !empty($_POST['pass'])) {

            $pass   = $_POST['pass'];
            $id = $_POST['id'];

            $u = new Users();
            $u->editPassword($pass, $id);
            header("Location: ".BASE_URL."configuracao/usuarios");
        }
    }

    public function editUserPassDiscountAction()
    {
        if(isset($_POST['passdiscount']) && !empty($_POST['passdiscount'])) {

            $pass   = $_POST['passdiscount'];
            $id = $_POST['id'];

            $u = new Users();
            $u->editPasswordDiscount($pass, $id);
            header("Location: ".BASE_URL."configuracao/usuarios");
        }
    }

    public function status($id)
    {
        $u = new Users();
        $u->toggleStatus($id);
        header('Location: '.BASE_URL.'configuracao/usuarios');
        exit;
    }
}