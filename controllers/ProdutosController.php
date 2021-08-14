<?php
class ProdutosController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_produtos')) {
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

        $p = new Produtos();
        $data['list'] = $p->getAll();
        // dde($data['list']);

        $c = new Categorias();
        $data['cats'] = $c->getAll();

        $m = new Marcas();
        $data['brands'] = $m->getAll();

        $un = new Unidades();
        $data['units'] = $un->getAll();
    
    	$this->loadTemplate('produtos/produtos', $data);
    }

    public function add()
    {
        $p = new Produtos();
        if (isset($_POST['novo_cod']) && !empty($_POST['novo_cod'])) {
            
            $codigo     = addslashes(trim($_POST['novo_cod']));
            $nome_prod  = addslashes(trim($_POST['nome_prod']));
            $categoria  = addslashes(trim($_POST['categoria']));
            $marca      = addslashes(trim($_POST['marca']));
            $unidade    = addslashes(trim($_POST['unidade']));
            $custo      = addslashes(trim($_POST['custo']));
            $preco      = addslashes(trim($_POST['preco']));
            $quantidade = addslashes(trim($_POST['quantidade']));
            $validade   = addslashes(trim($_POST['validade']));

            $p->add($codigo, $nome_prod, $categoria, $marca, $unidade, $custo, $preco, $quantidade, $validade);
            header("Location: ".BASE_URL."produtos");
        }
    }

    public function edit($id_prod)
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
        
        $c = new Categorias();
        $data['cats'] = $c->getAll();

        $c = new Marcas();
        $data['brands'] = $c->getAll();

        $u = new Unidades();
        $data['units'] = $u->getAll();
    
    	$this->loadTemplate('produtos/produtos_edit', $data);
    }

    public function details($id_prod)
    {
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
        
    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $p = new Produtos();
        $data['produto'] = $p->getProdById($id_prod);

        $data['titulo'] = 'Detalhes - '.$data['produto']['nome_prod'];
        
    	$this->loadTemplate('produtos/produtos_details', $data);
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
        $p = new Produtos();
        if (isset($_POST['nome_prod']) && !empty($_POST['nome_prod'])) {
            
            $nome_prod = addslashes(trim($_POST['nome_prod']));
            $categoria = addslashes(trim($_POST['categoria']));
            $marca = addslashes(trim($_POST['marca']));
            $unidade = addslashes(trim($_POST['unidade']));
            $custo      = addslashes(trim($_POST['custo']));
            $preco     = addslashes(trim($_POST['preco']));
            $alert     = addslashes(trim($_POST['alert']));
            $validade     = addslashes(trim($_POST['validade']));
            $id_prod   = addslashes(trim($_POST['id_prod']));
            $newid = addslashes(trim($_POST['novoid']));

            $p->edit($nome_prod, $categoria, $marca, $unidade, $custo, $preco, $alert, $validade, $id_prod, $newid);
            header("Location: ".BASE_URL."produtos");
        }
    }

    public function status($id_vendor)
    {
        $v = new Vendedores();
        $v->toggleStatus($id_vendor);
        header('Location: '.BASE_URL.'vendedores');
        exit;
    }

    public function validade()
	{
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
                
                $data['titulo'] = 'Produtos';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $e = new Estoque();
                $data['list'] = $e->getDadosVenc(); 

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('produtos/validade', $data);
	}

    public function vencidos()
	{
        $data = array(
            'menuActive' => 'produtos',
            'user' => $this->user,
        );
                
        $data['titulo'] = 'Produtos';

        $u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $e = new Estoque();
        $data['list'] = $e->getDadosVencTrue();
        // dde($data['list']);

        $d = new Despesas();
        $data['cat_des'] = $d->getCat();
        $data['tdes'] = $d->getTotal($_SESSION['idus']);

        $r = new Receitas();
        $data['trec'] = $r->getTotal($_SESSION['idus']);

        $this->loadTemplate('produtos/vencidos', $data);
	}
}    