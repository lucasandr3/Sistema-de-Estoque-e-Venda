<?php
class MarcasController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_marcas')) {
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
        
        $data['titulo'] = 'Marcas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $m = new Marcas();
        $data['list'] = $m->getAll();
    
    	$this->loadTemplate('marcas/marcas', $data);
    }

    public function add()
    {
        $m = new Marcas();
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            
            $title  = addslashes(trim($_POST['title']));

            $m->add($title);
            header("Location: ".BASE_URL."marcas");
        }
    }

    public function edit($id)
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Produtos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $m = new Marcas();
        $data['marca'] = $m->getMarcaById($id);
    
    	$this->loadTemplate('marcas/marcas_edit', $data);
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
        $m = new Marcas();
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            
            $title = addslashes(trim($_POST['title']));
            $id   = addslashes(trim($_POST['id']));

            $m->edit($title, $id);
            header("Location: ".BASE_URL."marcas");
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