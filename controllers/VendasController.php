<?php
class VendasController extends Controller
{
        private $user;
        private $arrayInfo;
        
        public function __construct()
        {
                $this->user = new Users();

                if (!$this->user->verifyLogin()) {
                    header("Location: ".BASE_URL."login");
                    exit;
                        }
        
                if (!$this->user->hasPermission('ver_vendas')) {
                    $this->loadView('404/500');
                    exit;
                }
        }

	public function index()
	{
                $data = array(
                        'menuActive' => 'estoque',
                        'user' => $this->user,
                    );
                
                $data['titulo'] = 'Estoque';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $e = new Estoque();
                $data['list'] = $e->getDados();

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('estoque/estoque', $data);
	}

        public function entrada()
        {
                $data = array('menuActive' => 'estoque');
                
                $data['titulo'] = 'Estoque';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $f = new Fornecedores();
                $data['list'] = $f->getAll();
        
                $this->loadTemplate('estoque/entrada', $data);
        }

        public function saida()
        {
                $data = array('menuActive' => 'estoque');
                
                $data['titulo'] = 'Estoque';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);
                $data['users'] = $u->getAll();

                $f = new Fornecedores();
                $data['list'] = $f->getAll();
        
                $this->loadTemplate('estoque/saida', $data);
        }

        public function saidaManual()
        {        
                $e = new Estoque();
                if(isset($_POST['produtos']) && !empty($_POST['produtos'])) {
        
                        $retirante   = $_POST['retirante'];
                        $nota   = $_POST['nota'];
                        $produtos     = $_POST['produtos'];
                        
                        $e->saidaManual($retirante, $nota, $produtos);
                        header("Location: ".BASE_URL."estoque/saida");
                }
        }

    public function all()
	{
        $data = array(
                'menuActive' => 'vendas',
                'user' => $this->user,
        );
        
        $data['titulo'] = 'Vendas';

        $u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendas();
        // $data['list'] = $e->getDados();
        if(isset($_POST['filter_date']) && !empty($_POST['filter_date'])) {
            $data_filter = $_POST['filter_date'];
            $data['dtf'] = $data_filter;
            $data['vendas_list'] = $v->getVendas($data_filter);
        } else {
            $data['dtf'] = '';
            $data['vendas_list'] = $v->getVendas();
        }

        $d = new Despesas();
        $data['cat_des'] = $d->getCat();
        $data['tdes'] = $d->getTotal($_SESSION['idus']);

        $r = new Receitas();
        $data['trec'] = $r->getTotal($_SESSION['idus']);

        $this->loadTemplate('vendas/venda', $data);
	}

    public function atualizar($id_venda)
    {
        $data = array(
            'menuActive' => 'vendas',
            'user' => $this->user,
        );

        $v = new Vendas();
        $data['venda'] = $v->getVendaId($id_venda);

        $u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['vendors'] = $u->getAll();

        $p = new Parceiros();
        $data['parceiros'] = $p->getAll();
    
        $taxas = new Taxas();
        $data['taxas_credito_loja'] = $taxas->getTaxasUpdateCreditoLoja();
        $data['taxas_debito_loja'] = $taxas->getTaxasUpdateDebitoLoja();
        $data['taxas_credito_parceiro'] = $taxas->getTaxasUpdateCreditoParceiro();
        $data['taxas_debito_parceiro'] = $taxas->getTaxasUpdateDebitoParceiro();
        $data['taxas_picpay'] = $taxas->getTaxasUpdatePicPay();
        //dd($data['taxas_picpay']);

        $data['titulo'] = 'Atualizar Venda';

        $this->loadTemplate('vendas/atualizar_venda', $data); 
    }

    public function close_sale($id_venda)
    {
        $v = new Vendas();
        $data['venda'] = $v->closeVendaId($id_venda);
        header("Location: ".BASE_URL."vendas/all");
        exit;   
    }

}