<?php
class VendedoresController extends Controller
{
	public function __construct()
    {
        parent::__construct();

        $u = new Users();
        if (!$u->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}
    }

    public function index()
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Vendedores';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendedores();
        $data['list'] = $v->getAll();
    
    	$this->loadTemplate('vendedores/vendedores', $data);
    }

    public function add()
    {
        $v = new Vendedores();
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
            $comissao = addslashes(trim($_POST['comissao']));
            $status   = addslashes(trim($_POST['status']));

            $v->add($nome, $email, $tel, $cep, $rua, $bairro, $cidade, $estado, $numero, $comissao, $status);
            header("Location: ".BASE_URL."vendedores");
        }
    }

    public function edit($id_vendor)
    {
        $data = array('menuActive' => 'vendors');
        
        $data['titulo'] = 'Vendedores';

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

    public function status($id_vendor)
    {
        $v = new Vendedores();
        $v->toggleStatus($id_vendor);
        header('Location: '.BASE_URL.'vendedores');
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
        // echo "<pre>";
        // print_r($_POST);
        // exit;
        $v = new Vendedores();
        if(isset($_POST['produtos']) && !empty($_POST['produtos'])) {
   
            $fornecedor   = $_POST['fornecedor'];
            // $data_lista   = $_POST['data_lista'];
            $produtos     = $_POST['produtos'];
            $nf      = $_POST['nf'];

            $v->createList($fornecedor, $produtos, $nf);
            header("Location: ".BASE_URL."estoque");
        }
    }

    public function createVenda()
    {       
        // dde($_POST); 
        $v = new Vendedores();
        if(isset($_POST['products_v']) && !empty($_POST['products_v'])) {
   
            $total        = $_POST['total'];
            $data_venda   = $_POST['data_venda'];
            $produtos     = $_POST['products_v'];
            $taxa         = $_POST['taxa'];
            $obs          = $_POST['obs'];
            $id_vendor    = $_POST['id_user'];
            $parceiro     = $_POST['parceiro'];
            $discount     = $_POST['discount'];
            $client       = $_POST['client'];
            $dinheiro     = $_POST['fpdinheiro'];
            $credito      = $_POST['fpcartaoc'];
            $credito2     = $_POST['2cardlc'];
            $debito       = $_POST['fpcartaod'];
            $debito2      = $_POST['2cardld'];
            $pix          = $_POST['fppix'];
            $picpay       = $_POST['fppicpay'];
            $pagamento    = $_POST['formapgt'];
            $credito_parc = $_POST['cardcforn'];
            $debito_parc  = $_POST['carddforn'];
            $credito_parc2 = $_POST['2cardfc'];
            $debito_parc2  = $_POST['2cardfd'];

            // if(in_array('Cartão de Crédito (Fornecedor)', $pagamento)) {
            //     $credito_parc = $_POST['cardcforn'];
            //     $credito = "0.00";
            // } else {
            //     $credito_parc = "0.00";
            // }

            // if(in_array('2º Cartão de Crédito (Fornecedor)', $pagamento)) {
            //     $credito_parc2 = $_POST['2cardfc'];
            //     $credito2 = "0.00";
            // } else {
            //     $credito_parc2 = "0.00";
            // }


            // if(in_array('Cartão de Débito (Fornecedor)', $pagamento)) {
            //     $debito_parc = $_POST['carddforn'];
            //     $debito = "0.00";
            // } else {
            //     $debito_parc = "0.00";
            // }

            // if(in_array('2º Cartão de Débito (Fornecedor)', $pagamento)) {
            //     $debito_parc2 = $_POST['2cardfd'];
            //     $debito2 = "0.00";
            // } else {
            //     $debito_parc2 = "0.00";
            // }

            $v->createListVenda($total, $data_venda, $produtos, $taxa, $obs, $id_vendor, $parceiro, $discount, $client, $dinheiro, $credito, $credito2,
             $credito_parc, $credito_parc2, $debito, $debito2, $debito_parc, $debito_parc2, $pix, $picpay, $credl,
             $parccredl, $jurocl, $pagamento);
            header("Location: ".BASE_URL."home/balcao");
        }
    }

    public function updateVenda()
    {        
        dde($_POST);
        $v = new Vendedores();
        if(isset($_POST['products']) && !empty($_POST['products'])) {
   
            $total     = $_POST['total'];
            $obs       = $_POST['obs'];
            $id_vendor = $_POST['vendor'];
            $parceiro  = $_POST['parceiro'];
            $cartao_cp = $_POST['f_cartao_c_parc'];
            $cartao_cp2 = $_POST['f_cartao_c2_parc'];
            $taxa_cp   = $_POST['tcparc'];
            $cartao_dp = $_POST['f_cartao_d_parc'];
            $cartao_dp2 = $_POST['f_cartao_d2_parc'];
            $taxa_dp   = $_POST['tdparc'];
            $dinheiro  = $_POST['f_dinheiro'];
            $cartao_cl = $_POST['f_cartao_c'];
            $cartao_cl2 = $_POST['f_cartao_c2'];
            $taxa_cl   = $_POST['tcloja'];
            $taxa_cl2   = $_POST['tc2loja'];
            $cartao_dl = $_POST['f_cartao_d'];
            $cartao_dl2 = $_POST['f_cartao_d2'];
            $taxa_dl   = $_POST['tdloja'];
            $taxa_dl2   = $_POST['td2loja'];
            $pix       = $_POST['f_pix'];
            $picpay    = $_POST['f_pic_pay'];
            $taxa_pic  = $_POST['txpicpay'];
            $desconto  = $_POST['desconto'];
            $id_venda  = $_POST['id_lista'];
            $pagamento = $_POST['pagamento'];

            $v->updateListVenda($total, $obs, $id_vendor, $parceiro, $cartao_cp, $cartao_cp2, $taxa_cp, $cartao_dp, $cartao_dp2, $taxa_dp,
            $dinheiro, $cartao_cl, $cartao_cl2, $taxa_cl, $taxa_cl2, $cartao_dl, $cartao_dl2, $taxa_dl, $taxa_dl2, $pix, $picpay, $taxa_pic, $desconto, $id_venda, $pagamento);
            header("Location: ".BASE_URL."vendas/atualizar/".$id_venda);
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