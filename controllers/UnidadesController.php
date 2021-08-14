<?php
class UnidadesController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_unidades')) {
            $this->loadView('404/500');
            exit;
        }
    }

    public function index()
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Unidade';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $un = new Unidades();
        $data['list'] = $un->getAll();
    
    	$this->loadTemplate('unidades/unidades', $data);
    }

    public function add()
    {
        $u = new Unidades();
        if (isset($_POST['unit_name']) && !empty($_POST['unit_name'])) {
            
            $unit_name  = addslashes(trim($_POST['unit_name']));

            $u->add($unit_name);
            header("Location: ".BASE_URL."unidades");
        }
    }

    public function edit($id_unit)
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Produtos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $un = new Unidades();
        $data['unidade'] = $un->getUnitById($id_unit);
    
    	$this->loadTemplate('unidades/unidades_edit', $data);
    }

    public function etiquetas($id_prod)
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Produtos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $p = new Produtos();
        $data['produto'] = $p->getProdById($id_prod);
    
    	$this->loadTemplate('produtos/produtos_etiquetas', $data);
    }

    public function editAction()
    {
        $u = new Unidades();
        if (isset($_POST['unit_name']) && !empty($_POST['unit_name'])) {
            
            $unit_name = addslashes(trim($_POST['unit_name']));
            $id_unit   = addslashes(trim($_POST['id_unit']));

            $u->edit($unit_name, $id_unit);
            header("Location: ".BASE_URL."unidades");
        }
    }

    public function status($id_vendor)
    {
        $v = new Vendedores();
        $v->toggleStatus($id_vendor);
        header('Location: '.BASE_URL.'vendedores');
        exit;
    }
}    