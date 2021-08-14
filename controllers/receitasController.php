<?php
class receitasController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_receitas')) {
            $this->loadView('404/500');
            exit;
        }
    }
	
	public function index()
	{
		$data = array(
            'menuActive' => 'receitas',
            'user' => $this->user,
        );
		
		$u = new Users();
		$data['info'] = $u->getUserName($_SESSION['idus']);
			
		$data['titulo'] = 'Receitas';

		$r = new Receitas();
		$data['cat_rec'] = $r->getCat();
		$data['trec'] = $r->getTotal($_SESSION['idus']);
		$d = new Despesas();
		$data['tdes'] = $d->getTotal($_SESSION['idus']);
			
		$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$this->loadTemplate('receitas/receitas', $data);
	}

	public function add()
	{
		$r = new Receitas();
		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			
			$descricao = addslashes(trim($_POST['descricao']));
			$valor 	   = addslashes(trim($_POST['valor']));
			$data_d    = addslashes(trim($_POST['data_d']));
			$conta     = addslashes(trim($_POST['conta']));
			$id_cat    = addslashes(trim($_POST['id_cat']));
			$id_user   = addslashes(trim($_POST['id_user']));

			$r->addReceita($descricao, $valor, $data_d, $conta, $id_cat, $id_user);
			header("Location: ".BASE_URL."receitas");
		}
	}

	public function recorrente()
	{
		$data = array(
            'menuActive' => 'receitas',
            'user' => $this->user,
        );

		$data['titulo'] = 'Receitas Parceladas';

		$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $r = new Receitas();
        $data['cat_rec'] = $r->getCat();
        $data['list_reco'] = $r->getAllReco($_SESSION['idus']);

		$this->loadTemplate('receitas/rec_recorrente', $data);
	}

	public function addReco()
	{
		$r = new Receitas();
		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			
			$descricao = addslashes(trim($_POST['descricao']));
			$valor     = addslashes(trim($_POST['valor']));
			$ventrada  = addslashes(trim($_POST['ventrada']));
			$juro      = addslashes(trim($_POST['juro']));
			$qtd_parc  = addslashes(trim($_POST['qtd_parc']));
			$data_parc = addslashes(trim($_POST['data_parc']));
			$conta     = addslashes(trim($_POST['conta']));
			$id_cat    = addslashes(trim($_POST['id_cat']));
			$id_user   = addslashes(trim($_POST['id_user']));

			$r->addRecRecorrente($descricao, $valor, $ventrada, $juro, $qtd_parc, $data_parc, $conta, $id_cat, $id_user);
			header("Location: ".BASE_URL."receitas/recorrente");
		}
	}

	// função faz um requisiçao ajax para retornar registros
	public function datas()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$r = new Receitas();
			$datapost = $r->getAll($data_inicial, $data_final, $_SESSION['idus']);
			echo json_encode($datapost);
			
		} else {

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

			$r = new Receitas();
			$datafixa = $r->getAll($data_inicial, $data_final, $_SESSION['idus']);
			echo json_encode($datafixa);
		}
	}
} 