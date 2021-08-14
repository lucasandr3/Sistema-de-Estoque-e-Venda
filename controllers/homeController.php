<?php
class homeController extends Controller
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

        if (!$this->user->hasPermission('ver_dashboard')) {
            $this->loadView('404/500');
            exit;
        }  
    }

    public function index()
    {
        $data = array(
            'menuActive' => 'home',
            'user' => $this->user,
        );
        $data['titulo'] = 'Dashboard';
        $u = new Users();
        $data['info'] = $u->getUserName();
        
        $d = new Despesas();
        $data['des'] = $d->getTotal($_SESSION['idus']);
        $data['des_reco'] = $d->getTotalRecorrente($_SESSION['idus']);
        $data['list_des'] = $d->getExpensesList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'),$_SESSION['idus']);
        $data['des_top'] = $d->getDespesasMaisUsadas($_SESSION['idus']);
        $data['bol_pagar'] = $d->getAllAtualData();

        $data['total_boletos'] = $d->getTotalBoletos();

        $r = new Receitas();
        $data['rec'] = $r->getTotal($_SESSION['idus']);
        $data['rec_reco'] = $r->getTotalRecorrente($_SESSION['idus']);
        $data['cob_pagar'] = $r->getAllAtualData();
        $data['total_receber'] = $r->getTotalReceber();
        

        $data['days_list'] = array();
        for($q=30;$q>0;$q--) {
            $data['days_list'][] = date('d/m', strtotime('-'.$q.' days'));
        }

        $data['list_rec'] = $r->getRevenueList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'),$_SESSION['idus']);

        $p = new Produtos();
        $data['total_prods'] = $p->getTotalProds();
        $data['validate'] = $p->getVencHome();
        $data['maisvendidos'] = $p->getMaisVendidos();

        $v = new Vendas();
        $data['total_vendas'] = $v->getTotalV();
        $data['open_day'] = $v->getOpenStatus();

        $e = new Estoque();
        $data['list'] = $e->getDados();

        $c = new Clientes();
        $data['msg'] = $c->getMensagem();
        $data['aniversariantes'] = $c->getAllAtualData();
        $data['total_clients'] = $c->getTotalC();

        $par = new Parceiros();
        $data['parceiros'] = $par->getAll();
      
        $_SESSION['atencao'] = '';
        $_SESSION['abaixo'] = '';

        foreach ($data['list'] as $l) {
            $qt = $l['qtd'];
 
            if ($qt == $l['alert_qt']+5) {
                $_SESSION['atencao'] = 'atencao';
            }
        }

        foreach ($data['list'] as $l) {
            $qt = $l['qtd'];
            
            if ($qt < $l['alert_qt']) {
                $_SESSION['abaixo'] = 'abaixo';
            }
        }

        $this->loadTemplate('home/home', $data);
    }

    public function balcao()
    {
        $data = array(
            'menuActive' => 'home',
            'user' => $this->user,
        );
        $data['titulo'] = 'Ponto de Venda';
        $u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);
        $data['vendedores'] = $u->getAll();

        $d = new Despesas();
        $data['des'] = $d->getTotal($_SESSION['idus']);
        $data['des_reco'] = $d->getTotalRecorrente($_SESSION['idus']);
        $data['list_des'] = $d->getExpensesList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'),$_SESSION['idus']);
        $data['des_top'] = $d->getDespesasMaisUsadas($_SESSION['idus']);
        $data['bol_pagar'] = $d->getAllAtualData();
        $data['total_boletos'] = $d->getTotalBoletos();

        $r = new Receitas();
        $data['rec'] = $r->getTotal($_SESSION['idus']);
        $data['rec_reco'] = $r->getTotalRecorrente($_SESSION['idus']);
        $data['cob_pagar'] = $r->getAllAtualData();
        $data['total_receber'] = $r->getTotalReceber();
        

        $data['days_list'] = array();
        for($q=30;$q>0;$q--) {
            $data['days_list'][] = date('d/m', strtotime('-'.$q.' days'));
        }

        $data['list_rec'] = $r->getRevenueList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'),$_SESSION['idus']);

        $p = new Produtos();
        $data['total_prods'] = $p->getTotalProds();

        $v = new Vendas();
        $data['total_vendas'] = $v->getTotalV();
        $data['open_day'] = $v->getOpenStatus();

        $e = new Estoque();
        $data['list'] = $e->getDados();

        $c = new Clientes();
        $data['msg'] = $c->getMensagem();
        $data['aniversariantes'] = $c->getAllAtualData();
        $data['total_clients'] = $c->getTotalC();
        $data['clients'] = $c->getAll();

        $par = new Parceiros();
        $data['parceiros'] = $par->getAll();

        $cupon = new Cupons();
        $data['cupons'] = $cupon->getAll();
      
        $_SESSION['atencao'] = '';
        $_SESSION['abaixo'] = '';

        foreach ($data['list'] as $l) {
            $qt = $l['qtd'];
            
            if ($qt == $l['alert_qt']) {
                $_SESSION['atencao'] = 'atencao';
            }
        }

        foreach ($data['list'] as $l) {
            $qt = $l['qtd'];
            
            if ($qt < $l['alert_qt']) {
                $_SESSION['abaixo'] = 'abaixo';
            }
        }

        $data['layout'] = 'sidebar-collapse';
        
        $this->loadTemplate('home/balcao', $data);
    }

}