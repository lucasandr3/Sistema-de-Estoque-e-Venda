<?php
class CategoriasController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_categorias')) {
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
        
        $data['titulo'] = 'Produtos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $c = new Categorias();
        $data['list'] = $c->getAll();
    
    	$this->loadTemplate('categorias/categorias', $data);
    }

    public function add()
    {
        $c = new Categorias();
        if (isset($_POST['name_cat']) && !empty($_POST['name_cat'])) {
            
            $name_cat  = addslashes(trim($_POST['name_cat']));

            $c->add($name_cat);
            header("Location: ".BASE_URL."categorias");
        }
    }

    public function edit($id_cat)
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Produtos';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $c = new Categorias();
        $data['categoria'] = $c->getCatById($id_cat);
    
    	$this->loadTemplate('categorias/categoria_edit', $data);
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
        $c = new Categorias();
        if (isset($_POST['name_cat']) && !empty($_POST['name_cat'])) {
            
            $name_cat = addslashes(trim($_POST['name_cat']));
            $id_cat   = addslashes(trim($_POST['id_cat']));

            $c->edit($name_cat, $id_cat);
            header("Location: ".BASE_URL."categorias");
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