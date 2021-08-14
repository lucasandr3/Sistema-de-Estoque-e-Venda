<?php
class CuponsController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_cupons')) {
            $this->loadView('404/500');
            exit;
        }
    }

    public function index()
    {
        $data = array(
            'menuActive' => 'cupons',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Cupons';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $c = new Cupons();
        $data['list'] = $c->getAll();
    
    	$this->loadTemplate('cupons/cupons', $data);
    }

    public function inativos()
    {
        $data = array(
            'menuActive' => 'cupons',
            'user' => $this->user,
        );
        
        $data['titulo'] = 'Cupons';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $c = new Cupons();
        $data['list'] = $c->getAllDisabled();
    
    	$this->loadTemplate('cupons/cupons_inativos', $data);
    }

    public function add()
    {
        $c = new Clientes();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome     = addslashes(trim($_POST['nome']));
            $email    = addslashes(trim($_POST['email']));
            $tel      = addslashes(trim($_POST['telefone']));
            $ani      = addslashes(trim($_POST['aniversario']));
            $cep      = addslashes(trim($_POST['cep']));
            $rua      = addslashes(trim($_POST['rua']));
            $bairro   = addslashes(trim($_POST['bairro']));
            $cidade   = addslashes(trim($_POST['cidade']));
            $estado   = addslashes(trim($_POST['estado']));
            $numero   = addslashes(trim($_POST['numero']));
        
            $c->add($nome, $email, $tel, $ani, $cep, $rua, $bairro, $cidade, $estado, $numero);
            header("Location: ".BASE_URL."clientes");
        }
    }

    public function edit($id_client)
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Vendedores';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $c = new Clientes();
        $data['cliente'] = $c->getClientById($id_client);
    
    	$this->loadTemplate('clientes/clientes_edit', $data);
    }

    public function editAction()
    {
        $c = new Clientes();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome       = addslashes(trim($_POST['nome']));
            $email      = addslashes(trim($_POST['email']));
            $tel        = addslashes(trim($_POST['telefone']));
            $ani        = addslashes(trim($_POST['aniversario']));
            $cep        = addslashes(trim($_POST['cep']));
            $rua        = addslashes(trim($_POST['rua']));
            $bairro     = addslashes(trim($_POST['bairro']));
            $cidade     = addslashes(trim($_POST['cidade']));
            $estado     = addslashes(trim($_POST['estado']));
            $numero     = addslashes(trim($_POST['numero']));
            $id_cliente = addslashes(trim($_POST['id_cliente']));

            $c->edit($nome, $email, $tel, $ani, $cep, $rua, $bairro, $cidade, $estado, $numero, $id_cliente);
            header("Location: ".BASE_URL."clientes");
        }
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

    public function new()
    {
        $c = new Cupons();
        if (isset($_POST['cupon']) && !empty($_POST['cupon'])) {

            $cupon = $_POST['cupon'];

            $c->saveCupon($cupon);
            header("Location: ".BASE_URL."cupons");
        }
    }

    public function editCupon()
    {
        $c = new Cupons();
        if (isset($_POST['cupon']) && !empty($_POST['cupon'])) {

            $cupon = $_POST['cupon'];
            $id = $_POST['id'];

            $c->editCupon($cupon, $id);
            header("Location: ".BASE_URL."cupons");
        }
    }

    public function status($id_cupon)
    {
        $c = new Cupons();
        $c->toggleStatus($id_cupon);
        header('Location: '.BASE_URL.'cupons');
        exit;
    }

}    