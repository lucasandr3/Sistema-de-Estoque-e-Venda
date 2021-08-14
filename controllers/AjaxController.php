<?php

class AjaxController extends Controller
{

    public function index() {}

    public function busca_prods()
    {
        $data = array();
        
        $q = addslashes($_POST['q']);
        $v = new Vendedores();
        $data = $v->ProductsByName($q);
    
        echo json_encode($data);
    }

    public function taxas()
	{

        $t = new Taxas();
        $data = $t->getAll();;
    
        echo json_encode($data);

	}

    public function taxas_op($id)
	{

        $t = new Taxas();
        $data = $t->getAllOP($id);
    
        echo json_encode($data);

	}

    // função faz um requisiçao ajax para retornar registros
	public function relDia()
	{
		if(isset($_POST['data']) && !empty($_POST['data'])) {
			
			$v = new Vendedores();
            $data = $_POST['data'];
			$datapost = $v->getAllRelDia($data);
			echo json_encode($datapost);
			
		}
	}

    // função faz um requisiçao ajax para retornar registros
	public function caixaRelDia()
	{
		if(isset($_POST['data']) && !empty($_POST['data'])) {
			
			$v = new Vendedores();
            $data = $_POST['data'];
			$datapost = $v->getAllCaixaRelDia($data);
			echo json_encode($datapost);
			
		}
	}

    // função faz um requisiçao ajax para retornar registros
	public function datas_mes()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$v = new Vendedores();
			$datapost = $v->getAllMesRel($data_inicial, $data_final);
			echo json_encode($datapost);
			
		} else {

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

			$v = new Vendedores();
			$datapost = $v->getAllMesRel($data_inicial, $data_final);
			echo json_encode($datafixa);
		}
	}

    // função faz um requisiçao ajax para retornar registros
	public function datas_mes_caixa()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$v = new Vendedores();
			$datapost = $v->getAllCaixaMesRel($data_inicial, $data_final);
			echo json_encode($datapost);
			
		} else {

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

			$v = new Vendedores();
			$datapost = $v->getAllCaixaMesRel($data_inicial, $data_final);
			echo json_encode($datafixa);
		}
	}

	public function prods_saida($id)
	{

		$e = new Estoque();

		if ($e = $e->getProdsSaidaId($id)) {
			
			$resposta['code'] = 0;
			$resposta['list'] = $e;

		} else {
			
			$resposta['code'] = 1;
			$resposta['list'] = 'Produtos não encontrados.';	
		}
		
		echo json_encode($resposta);
		exit;
	}

	public function parc_com()
	{
		// echo "<pre>";
		// print_r($_POST);
		// exit;
		$p = new Parceiros();

		if(isset($_POST['id']) && !empty($_POST['id'])) {

			$id   = $_POST['id'];
			$taxa = $_POST['taxa'];

			if ($p = $p->getComId($id, $taxa)) {
			
				$resposta['code'] = 0;
				$resposta['list'] = $p;
	
			} else {
				
				$resposta['code'] = 1;
				$resposta['list'] = 'Sem resultados.';	
			}
			
			echo json_encode($resposta);
			exit;
		}
	}

	public function prods_venda($id)
	{

		$e = new Estoque();

		if ($e = $e->getProdsVendaId($id)) {
			
			$resposta['code'] = 0;
			$resposta['list'] = $e;

		} else {
			
			$resposta['code'] = 1;
			$resposta['list'] = 'Produtos não encontrados.';	
		}
		
		echo json_encode($resposta);
		exit;
	}

	public function open_day()
	{
		$v = new Vendas();

		if(isset($_POST['amount']) && !empty($_POST['amount'])) {

			$amount   = $_POST['amount'];
			$data_open = $_POST['data_open'];

			if ($v = $v->openPos($amount, $data_open)) {
			
				$resposta['code'] = 0;
				$resposta['msg'] = 'Caixa aberto com sucesso.';
	
			} else {
				
				$resposta['code'] = 1;
				$resposta['list'] = 'Erro ao abrir caixa';	
			}
			
			echo json_encode($resposta);
			exit;
		}	
	}

	public function verify_discount()
	{
		// echo "<pre>";
		// print_r($_POST);
		// exit;
		$u = new Users();

		if(isset($_POST['discount']) && !empty($_POST['discount'])) {

			$discount   = $_POST['discount'];
			$user   = $_POST['user'];

			if ($u = $u->verifyPassDiscount($discount, $user)) {
			
				$resposta['code'] = 0;
		
			} else {
				
				$resposta['code'] = 1;
				$resposta['msg'] = 'Você não tem permissão para dar desconto';	
			}
			
			echo json_encode($resposta);
			exit;
		}	
	}

	public function search_client()
	{
		$param = $_POST['c'];

		$c = new Clientes();

		if ($c = $c->getClientSearch($param)) {
			
			$resposta['code'] = 0;
			$resposta['client'] = $c;

		} else {
			
			$resposta['code'] = 1;
			$resposta['client'] = 'Nenhum Cliente encontrado.';	
		}
		
		echo json_encode($resposta);
		exit;
	}
}    