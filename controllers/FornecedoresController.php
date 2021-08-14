<?php
class FornecedoresController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_fornecedores')) {
            $this->loadView('404/500');
            exit;
        }
    }

    public function index()
    {
        $data = array(
            'menuActive' => 'fornecedor',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Fornecedores';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $f = new Fornecedores();
        $data['list'] = $f->getAll();
    
    	$this->loadTemplate('fornecedores/fornecedores', $data);
    }

    public function inativos()
    {
        $data = array(
            'menuActive' => 'fornecedor',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Fornecedores';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $f = new Fornecedores();
        $data['list'] = $f->getAllInativos();
    
    	$this->loadTemplate('fornecedores/fornecedores_inativos', $data);
    }

    public function add()
    {
        $f = new Fornecedores();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome     = addslashes(trim($_POST['nome']));
            $email    = addslashes(trim($_POST['email']));
            $tel      = addslashes(trim($_POST['tel']));
            $cep      = addslashes(trim($_POST['cep']));
            $rua      = addslashes(trim($_POST['rua']));
            $bairro   = addslashes(trim($_POST['bairro']));
            $cidade   = addslashes(trim($_POST['cidade']));
            $estado   = addslashes(trim($_POST['estado']));
            $numero   = addslashes(trim($_POST['numero']));
            $status   = addslashes(trim($_POST['status']));

            $f->add($nome, $email, $tel, $cep, $rua, $bairro, $cidade, $estado, $numero, $status);
            header("Location: ".BASE_URL."fornecedores");
        }
    }

    public function edit($id_vendor)
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Fornecedores';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendedores();
        $data['vendor'] = $v->getVendorById($id_vendor);
    
    	$this->loadTemplate('vendedores/vendedores_edit', $data);
    }

    public function editAction()
    {
        $v = new Vendedores();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome      = addslashes(trim($_POST['nome']));
            $email     = addslashes(trim($_POST['email']));
            $tel       = addslashes(trim($_POST['tel']));
            $cep       = addslashes(trim($_POST['cep']));
            $rua       = addslashes(trim($_POST['rua']));
            $bairro    = addslashes(trim($_POST['bairro']));
            $cidade    = addslashes(trim($_POST['cidade']));
            $estado    = addslashes(trim($_POST['estado']));
            $numero    = addslashes(trim($_POST['numero']));
            $comissao  = addslashes(trim($_POST['comissao']));
            $status    = addslashes(trim($_POST['status']));
            $id_vendor = addslashes(trim($_POST['id_vendor']));

            $v->edit($nome, $email, $tel, $cep, $rua, $bairro, $cidade, $estado, $numero, $comissao, $status, $id_vendor);
            header("Location: ".BASE_URL."vendedores");
        }
    }

    public function status($id_fornecedor)
    {
        $f = new Fornecedores();
        $f->toggleStatus($id_fornecedor);
        header('Location: '.BASE_URL.'fornecedores');
        exit;
    }

    public function lista()
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Lista';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendedores();
        $data['list']    = $v->getProds();
        $data['vendors'] = $v->getVendors();
    
    	$this->loadTemplate('vendedores/create_list', $data);
    }

    public function createlist()
    {        
        $v = new Vendedores();
        if(isset($_POST['data_lista']) && !empty($_POST['data_lista'])) {
   
            $data_lista   = $_POST['data_lista'];
            $id_vendor    = $_POST['id_vendor'];
            $produtos     = $_POST['produtos'];
            $totalnf      = $_POST['totalnf'];

            $v->createList($data_lista, $id_vendor, $produtos, $totalnf);
            header("Location: ".BASE_URL."vendedores/lista");
        }
    }

    public function all()
    {        
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Listas';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendedores();
        $data['list_all'] = $v->getAllList();
    
    	$this->loadTemplate('vendedores/all_list', $data);
    }

    public function ver_lista()
    {        
        $v = new Vendedores();
        if(isset($_POST['data_lista']) && !empty($_POST['data_lista'])) {
   
            $data_lista   = $_POST['data_lista'];
            $id_vendor    = $_POST['id_vendor'];
            $produtos     = $_POST['produtos'];
            $totalnf      = $_POST['totalnf'];

            $v->createList($data_lista, $id_vendor, $produtos, $totalnf);
            header("Location: ".BASE_URL."vendedores/lista");
        }
    }

    public function pdf($id_lista)
    {
        $data = array();

        $v = new Vendedores();
        $data['list_s'] = $v->getAllListId($id_lista);
        $data['vendor_list'] = $v->getVendorList($id_lista);
        $data['list_total'] = $v->getListTotal($id_lista);
        
        ob_start();
        $this->loadView('vendedores/pdf', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('arquivo.pdf', 'D');
    }

    public function imprimir($id_lista)
    {
        $data = array();
        $data['titulo'] = 'Lista';

        $v = new Vendedores();
        $data['list_s'] = $v->getAllListId($id_lista);
        $data['vendor_list'] = $v->getVendorList($id_lista);
        $data['list_total'] = $v->getListTotal($id_lista);
        
        ob_start();
        $this->loadView('vendedores/pdf', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function acerto()
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Acerto';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        if(!empty($_FILES['arquivo']['tmp_name'])){
            $arquivo = new DomDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            //var_dump($arquivo);
            
            $linhas = $arquivo->getElementsByTagName("Row");
            //var_dump($linhas);
            
            $primeira_linha = true;
            
            foreach($linhas as $linha){
                if($primeira_linha == false){
                    $data['nome'] = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    //echo "Nome: $nome <br>";
                    
                    $email = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    //echo "E-mail: $email <br>";
                    
                    $niveis_acesso_id = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                    //echo "Nivel de Acesso: $niveis_acesso_id <br>";
                    
                    //echo "<hr>";
                    
                    //Inserir o usuário no BD
                   // $result_usuario = "INSERT INTO usuarios (nome, email, niveis_acesso_id) VALUES ('$nome', '$email', '$niveis_acesso_id')";
                    //$resultado_usuario = mysqli_query($conn, $result_usuario);
                }
                $primeira_linha = false;
            }
        }

        //$v = new Vendedores();
        //$data['list'] = $v->getAll();
    
    	$this->loadTemplate('vendedores/acerto', $data);
    }

}    