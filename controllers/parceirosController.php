<?php
class ParceirosController extends Controller
{
        public function __construct()
        {
                $this->user = new Users();

                if (!$this->user->verifyLogin()) {
                    header("Location: ".BASE_URL."login");
                    exit;
                        }
        
                if (!$this->user->hasPermission('ver_parceiros')) {
                    $this->loadView('404/500');
                    exit;
                }
        }

	public function index()
	{
                $data = array(
                        'menuActive' => 'parceiro',
                        'user' => $this->user,
                    );
                
                $data['titulo'] = 'Parceiros';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $e = new Estoque();
                $data['list'] = $e->getDados();

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $p = new Parceiros();
                $data['parceiros'] = $p->getAll();

                $this->loadTemplate('parceiros/parceiros', $data);
	}

        public function add()
        {
                $p = new Parceiros();
                if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        
                        $nome    = $_POST['nome'];
                        $comicao = $_POST['comicao'];
                        
                        $p->addParc($nome, $comicao);
                        header("Location: ".BASE_URL."parceiros");
                }
        }

        public function del($id)
        {
                $p = new Parceiros();
                $p->delParc($id);
                header("Location: ".BASE_URL."parceiros");

        }

        public function edit($id)
        {
                $data = array(
                        'menuActive' => 'parceiro',
                        'user' => $this->user,
                    );
                
                $data['titulo'] = 'Parceiros';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $p = new Parceiros();
                $data['parceiro'] = $p->getParceiroById($id);
        
                $this->loadTemplate('parceiros/parceiro_edit', $data);
        }

        public function editAction()
        {
                $p = new Parceiros();
                if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        
                        $nome    = $_POST['nome'];
                        $comicao = $_POST['taxa'];
                        $id = $_POST['id_parceiro'];
                        
                        $p->editParc($nome, $comicao, $id);
                        header("Location: ".BASE_URL."parceiros");
                }
        }

        public function comissao()
	{
                $data = array(
                        'menuActive' => 'parceiro',
                        'user' => $this->user,
                    );
                
                $data['titulo'] = 'Parceiros';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $e = new Estoque();
                $data['list'] = $e->getDados();

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $p = new Parceiros();
                $data['parceiros'] = $p->getAll();

                $this->loadTemplate('parceiros/comissao', $data);
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

        public function saidas()
	{
                $data = array('menuActive' => 'estoque');
                
                $data['titulo'] = 'Estoque';

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $e = new Estoque();
                $data['list'] = $e->getDados();
                $data['saidas_list'] = $e->getSaidas();

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('estoque/saidas', $data);
	}

	public function Fevereiro()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getFevereiro($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Marco()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getMarco($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Abril()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getAbril($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Maio()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getMaio($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Junho()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getJunho($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Julho()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getJulho($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Agosto()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getAgosto($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Setembro()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getSetembro($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Outubro()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getOutubro($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Novembro()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getNovembro($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

	public function Dezembro()
	{
        	$data = array('menuActive' => 'despesas');

        	$u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getDezembro($_SESSION['idus']);

                $d = new Despesas();
                $data['cat_des'] = $d->getCat();
        	$data['tdes'] = $d->getTotal($_SESSION['idus']);

                $r = new Receitas();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $this->loadTemplate('despesas', $data);
	}

         /*=====  FINAL DA SESSÃO DESPESAS  ======*/


         /*=============================================
        =              MES DAS RECEITAS               =
        =============================================*/

        public function Rejaneiro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReJaneiro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReFevereiro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReFevereiro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReMarco()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReMarco($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReAbril()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReAbril($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReMaio()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReMaio($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReJunho()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReJunho($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReJulho()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReJulho($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReAgosto()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReAgosto($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReSetembro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReSetembro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReOutubro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReOutubro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReNovembro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReNovembro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }

        public function ReDezembro()
        {
                $data = array('menuActive' => 'receitas');

                $u = new Users();
                $data['info'] = $u->getUserName($_SESSION['idus']);

                $m = new Mes();
                $data['list'] = $m->getReDezembro($_SESSION['idus']);

                $r = new Receitas();
                $data['cat_rec'] = $r->getCat();
                $data['trec'] = $r->getTotal($_SESSION['idus']);

                $d = new Despesas();
                $data['tdes'] = $d->getTotal($_SESSION['idus']);

                $this->loadTemplate('receitas', $data);
        }
}