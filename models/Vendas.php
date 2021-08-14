<?php
class Vendas extends Model
{
	public function getDados()
	{
		$array = array();
		$sql ="SELECT * FROM estoque as e INNER JOIN produtos as p ON(e.id_produto = p.id_prod)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getVendas($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT * FROM listas WHERE data_lista LIKE '%$data_filter%'";
			$sql = $this->db->query($sql);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT * FROM listas WHERE data_lista LIKE '%$day%'";
			$sql = $this->db->query($sql);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getVendaId($id)
	{
		$prods = new ProdutosVenda();
		$array = array();
		$sql ="SELECT * FROM listas WHERE id_lista = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);
		   foreach ($array as $key => $value) {

				$array['produtos'] = $prods->getProdsSaidaId($id);
				
			}
		}
		return $array;
	}

	public function saidaManual($retirante, $nota, $produtos)
    {
        $sql = "INSERT INTO saida_manual SET user = :user, nota = :nota, data_saida = NOW()";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":user", $retirante);
		$sql->bindValue(":nota", $nota);
		$sql->execute();

		$id_saida = $this->db->lastInsertId(); 

		foreach($produtos as $id_prod => $quant_prod) {
            $sql ="SELECT preco FROM produtos WHERE id_prod = :id_prod";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_prod", $id_prod);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$row   = $sql->fetch();
				$valor = $row['preco'];
			
                $sqle ="INSERT INTO saida_list_prods SET id_saida = :id_saida, id_produto = :id_produto, quant = :quant, valor = :valor";
				$sqle = $this->db->prepare($sqle);
				$sqle->bindValue(":id_saida", $id_saida);
				$sqle->bindValue(":id_produto", $id_prod);
				$sqle->bindValue(":quant", $quant_prod['qtd']);
				$sqle->bindValue(":valor", $valor);
				$sqle->execute();

				$quant = $quant_prod['qtd'];
				$sqlp = $this->db->prepare("UPDATE estoque SET qtd = qtd - $quant WHERE id_produto = :id_produto");
				$sqlp->bindValue(":id_produto", $id_prod);
				$sqlp->execute();
			}
		}
		// if ($sqlp->rowCount() > 0) {
		// 	$mesAtual = date('m');
		// 	$sqlr ="INSERT INTO receita SET id_cat = 5, id_user = 1, descricao = 'Vendas', valor = :v,
		// 		data_d = :dt, conta = 'Conta Inicial', mesid = :mid";
		// 	$sqlr = $this->db->prepare($sqlr);
		// 	$sqlr->bindValue(":v", $total_tax);
		// 	$sqlr->bindValue(":dt", $data_venda);
		// 	$sqlr->bindValue(":mid", $mesAtual);
		// 	$sqlr->execute();
		// }

		if ($sqlp->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Saída Manual feita com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao realizar saída manual!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	
	}

	public function getProdsSaidaId($id)
    {
        $sql ="SELECT * FROM saida_manual as sm INNER JOIN saida_list_prods as slp ON(sm.id_saida = slp.id_saida) INNER JOIN produtos as p ON(slp.id_produto = p.id_prod) WHERE sm.id_saida = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

	public function getTotalV()
	{
		$array = array();
		$sql ="SELECT count(*) as totalv FROM listas";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function openPos($amount, $data_open=null)
	{
		if($data_open) {
			$sql ="INSERT INTO open_day SET valor_open = :vo, day = :dto";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":vo", $amount);
			$sql->bindValue(":dto", $data_open);
			$sql->execute();
		} else {
			$sql ="INSERT INTO open_day SET valor_open = :vo, day = NOW()";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":vo", $amount);
			$sql->execute();
		}

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getOpenStatus()
	{
		$array = array();
		$sql ="SELECT * FROM open_day WHERE day = curdate()"; 
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
	
	public function getTotaisVendaDia($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT  sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista = :d";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotaisVendaMes($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getDespesasDia($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT * FROM despesa WHERE data_d = :dt AND conta = 'Loja'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT * FROM despesa WHERE data_d = :d AND conta = 'Loja'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getDespesasDiaTotal($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT sum(valor) as total FROM despesa WHERE data_d = :dt AND conta = 'Loja'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(valor) as total FROM despesa WHERE data_d = :d AND conta = 'Loja'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getDespesasMes($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT * FROM despesa WHERE data_d BETWEEN '$data_inicial' AND '$data_final' AND conta = 'Loja'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT * FROM despesa WHERE data_d BETWEEN '$data_inicial' AND '$data_final' AND conta = 'Loja'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getDespesasMesTotal($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT sum(valor) as total FROM despesa WHERE data_d BETWEEN '$data_inicial' AND '$data_final' AND conta = 'Loja'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(valor) as total FROM despesa WHERE data_d BETWEEN '$data_inicial' AND '$data_final' AND conta = 'Loja'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotaisVendaDiaPaids($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT 
				sum(f_dinheiro) as dinheiro, 
				sum(f_cartao_c_loja_hist) as cartao_c_lh,
				sum(f_cartao_c) as cartao_c_loja, 
				sum(f_cartao_d_loja_hist) as cartao_d_lh,
				sum(f_cartao_d) as cartao_d_loja, 
				sum(f_cartao_c_parc_hist) as cartao_c_ph,
				sum(f_cartao_c_parc) as cartao_c_parc, 
				sum(f_cartao_d_parc_hist) as cartao_d_ph,
				sum(f_cartao_d_parc) as cartao_d_parc, 
				sum(f_pix) as pix, 
				sum(f_picpay_hist) as picpay_hist, 
				sum(f_pic_pay) as picpay FROM listas WHERE data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_dinheiro) as dinheiro,
				sum(f_cartao_c_loja_hist) as cartao_c_lh, 
				sum(f_cartao_c) as cartao_c_loja, 
				sum(f_cartao_d_loja_hist) as cartao_d_lh,
				sum(f_cartao_d) as cartao_d_loja, 
				sum(f_cartao_c_parc_hist) as cartao_c_ph,
				sum(f_cartao_c_parc) as cartao_c_parc, 
				sum(f_cartao_d_parc_hist) as cartao_d_ph,
				sum(f_cartao_d_parc) as cartao_d_parc, 
				sum(f_pix) as pix, 
				sum(f_picpay_hist) as picpay_hist, 
				sum(f_pic_pay) as picpay FROM listas WHERE data_lista = :d";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotaisVendaMesPaids($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_dinheiro) as dinheiro, 
				sum(f_cartao_c_loja_hist) as cartao_c_lh,
				sum(f_cartao_c) as cartao_c_loja, 
				sum(f_cartao_c2_loja_hist) as cartao_c_lh2,
				sum(f_cartao_c2) as cartao_c_loja2, 
				sum(f_cartao_d_loja_hist) as cartao_d_lh,
				sum(f_cartao_d) as cartao_d_loja,
				sum(f_cartao_d2_loja_hist) as cartao_d_lh2,
				sum(f_cartao_d2) as cartao_d_loja2, 
				sum(f_cartao_c_parc_hist) as cartao_c_ph,
				sum(f_cartao_c_parc) as cartao_c_parc, 
				sum(f_cartao_c2_parc_hist) as cartao_c_ph2,
				sum(f_cartao_c2_parc) as cartao_c_parc2, 
				sum(f_cartao_d_parc_hist) as cartao_d_ph,
				sum(f_cartao_d_parc) as cartao_d_parc,
				sum(f_cartao_d2_parc_hist) as cartao_d_ph2,
				sum(f_cartao_d2_parc) as cartao_d_parc2, 
				sum(f_pix) as pix, 
				sum(f_picpay_hist) as picpay_hist, 
				sum(f_pic_pay) as picpay FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_dinheiro) as dinheiro,
				sum(f_cartao_c_loja_hist) as cartao_c_lh, 
				sum(f_cartao_c) as cartao_c_loja, 
				sum(f_cartao_d_loja_hist) as cartao_d_lh,
				sum(f_cartao_d) as cartao_d_loja, 
				sum(f_cartao_c_parc_hist) as cartao_c_ph,
				sum(f_cartao_c_parc) as cartao_c_parc, 
				sum(f_cartao_d_parc_hist) as cartao_d_ph,
				sum(f_cartao_d_parc) as cartao_d_parc, 
				sum(f_pix) as pix, 
				sum(f_picpay_hist) as picpay_hist, 
				sum(f_pic_pay) as picpay FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getOpenCaixa($data_filter = null)
	{
		$array = array();
	
		if($data_filter) {
			$sql ="SELECT valor_open FROM open_day WHERE day = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT valor_open FROM open_day WHERE day = :d";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getOpenCaixaMes($data_inicial = null, $data_final = null)
	{
		$array = array();
	
		if($data_inicial) {
			$sql ="SELECT sum(valor_open) as valor_open FROM open_day WHERE day BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(valor_open) as valor_open FROM open_day WHERE day BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getBrandsCard()
	{
		$array = [];
		$sql ="SELECT * FROM taxas";
		$sql = $this->db->query($sql);
		return $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function closeVendaId($id_venda)
	{
		$sql ="UPDATE listas SET status_venda = 'CLOSE' WHERE id_lista = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_venda);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Venda Fechada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Fechar venda!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getCartaoMaster($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_master,
				sum(f_cartao_c_loja_hist) as cartao_master_hist
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_master,
				sum(f_cartao_c_loja_hist) as cartao_master_hist
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMaster2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_master2,
				sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_master2,
				sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMasterMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_master,
				sum(f_cartao_c_loja_hist) as cartao_master_hist,
				sum(f_cartao_c2) as cartao_master2,
				sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_master,
			 	sum(f_cartao_c_loja_hist) as cartao_master_hist,
			 	sum(f_cartao_c2) as cartao_master2,
			 	sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard'); 
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMasterMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_master2,
				sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
			 	sum(f_cartao_c2) as cartao_master2,
			 	sum(f_cartao_c2_loja_hist) as cartao_master_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard'); 
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisa($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_visa, 
				sum(f_cartao_c_loja_hist) as cartao_visa_hist,
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_visa, 
				sum(f_cartao_c_loja_hist) as cartao_visa_hist,
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisa2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisaMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT
				sum(f_cartao_c) as cartao_visa, 
				sum(f_cartao_c_loja_hist) as cartao_visa_hist,
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2  
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT
				sum(f_cartao_c) as cartao_visa, 
				sum(f_cartao_c_loja_hist) as cartao_visa_hist,
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2  
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisaMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2  
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT
				sum(f_cartao_c2) as cartao_visa2, 
				sum(f_cartao_c2_loja_hist) as cartao_visa_hist2  
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercard($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_hiper, 
				sum(f_cartao_c_loja_hist) as cartao_hiper_hist,
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_hiper, 
				sum(f_cartao_c_loja_hist) as cartao_hiper_hist,
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercard2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_hiper, 
				sum(f_cartao_c_loja_hist) as cartao_hiper_hist,
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_hiper, 
				sum(f_cartao_c_loja_hist) as cartao_hiper_hist,
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_hiper2, 
				sum(f_cartao_c2_loja_hist) as cartao_hiper_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoElo($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_elo, 
				sum(f_cartao_c_loja_hist) as cartao_elo_hist,
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_elo, 
				sum(f_cartao_c_loja_hist) as cartao_elo_hist,
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoElo2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_elo, 
				sum(f_cartao_c_loja_hist) as cartao_elo_hist,
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_elo, 
				sum(f_cartao_c_loja_hist) as cartao_elo_hist,
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_elo2, 
				sum(f_cartao_c2_loja_hist) as cartao_elo_hist2 
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabal($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_cabal, 
				sum(f_cartao_c_loja_hist) as cartao_cabal_hist,
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_cabal, 
				sum(f_cartao_c_loja_hist) as cartao_cabal_hist,
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabal2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_cabal, 
				sum(f_cartao_c_loja_hist) as cartao_cabal_hist,
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_cabal, 
				sum(f_cartao_c_loja_hist) as cartao_cabal_hist,
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_cabal2, 
				sum(f_cartao_c2_loja_hist) as cartao_cabal_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmex($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_amex,
				sum(f_cartao_c_loja_hist) as cartao_amex_hist,
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_amex,
				sum(f_cartao_c_loja_hist) as cartao_amex_hist,
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmex2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexMes($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_amex,
				sum(f_cartao_c_loja_hist) as cartao_amex_hist,
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c) as cartao_amex,
				sum(f_cartao_c_loja_hist) as cartao_amex_hist,
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexMes2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_c2) as cartao_amex2,
				sum(f_cartao_c2_loja_hist) as cartao_amex_hist2
			FROM `listas` WHERE brand_c2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMasterD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_masterd, 
				sum(f_cartao_d_loja_hist) as cartao_masterd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_masterd, 
				sum(f_cartao_d_loja_hist) as cartao_masterd_hist
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMasterD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_masterd2, 
				sum(f_cartao_d2_loja_hist) as cartao_masterd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_masterd2, 
				sum(f_cartao_d2_loja_hist) as cartao_masterd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoMasterDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_masterd, 
				sum(f_cartao_d_loja_hist) as cartao_masterd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_masterd, 
				sum(f_cartao_d_loja_hist) as cartao_masterd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}
	
	public function getCartaoMasterDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_masterd2, 
				sum(f_cartao_d2_loja_hist) as cartao_masterd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_masterd2, 
				sum(f_cartao_d2_loja_hist) as cartao_masterd_hist2
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Mastercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}	

	public function getCartaoVisaD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_visad, 
				sum(f_cartao_d_loja_hist) as cartao_visad_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_visad, 
				sum(f_cartao_d_loja_hist) as cartao_visad_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisaD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_visad2, 
				sum(f_cartao_d2_loja_hist) as cartao_visad_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_visad2, 
				sum(f_cartao_d2_loja_hist) as cartao_visad_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisaDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_visad, 
				sum(f_cartao_d_loja_hist) as cartao_visad_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_visad, 
				sum(f_cartao_d_loja_hist) as cartao_visad_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoVisaDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_visad2, 
				sum(f_cartao_d2_loja_hist) as cartao_visad_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_visad2, 
				sum(f_cartao_d2_loja_hist) as cartao_visad_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Visa');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_hiperd, 
				sum(f_cartao_d_loja_hist) as cartao_hiperd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_hiperd, 
				sum(f_cartao_d_loja_hist) as cartao_hiperd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_hiperd2, 
				sum(f_cartao_d2_loja_hist) as cartao_hiperd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_hiperd2, 
				sum(f_cartao_d2_loja_hist) as cartao_hiperd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_hiperd, 
				sum(f_cartao_d_loja_hist) as cartao_hiperd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_hiperd, 
				sum(f_cartao_d_loja_hist) as cartao_hiperd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoHipercardDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_hiperd2, 
				sum(f_cartao_d2_loja_hist) as cartao_hiperd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_hiperd2, 
				sum(f_cartao_d2_loja_hist) as cartao_hiperd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Hipercard');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_elod, 
				sum(f_cartao_d_loja_hist) as cartao_elod_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_elod, 
				sum(f_cartao_d_loja_hist) as cartao_elod_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_elod2, 
				sum(f_cartao_d2_loja_hist) as cartao_elod_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_elod2, 
				sum(f_cartao_d2_loja_hist) as cartao_elod_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_elod, 
				sum(f_cartao_d_loja_hist) as cartao_elod_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_elod, 
				sum(f_cartao_d_loja_hist) as cartao_elod_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoEloDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_elod2, 
				sum(f_cartao_d2_loja_hist) as cartao_elod_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_elod2, 
				sum(f_cartao_d2_loja_hist) as cartao_elod_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Elo');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_cabald, 
				sum(f_cartao_d_loja_hist) as cartao_cabald_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_cabald, 
				sum(f_cartao_d_loja_hist) as cartao_cabald_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_cabald2, 
				sum(f_cartao_d2_loja_hist) as cartao_cabald_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_cabald2, 
				sum(f_cartao_d2_loja_hist) as cartao_cabald_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_cabald, 
				sum(f_cartao_d_loja_hist) as cartao_cabald_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_cabald, 
				sum(f_cartao_d_loja_hist) as cartao_cabald_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoCabalDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_cabald2, 
				sum(f_cartao_d2_loja_hist) as cartao_cabald_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_cabald2, 
				sum(f_cartao_d2_loja_hist) as cartao_cabald_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Cabal Vale');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexD($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_amexd, 
				sum(f_cartao_d_loja_hist) as cartao_amexd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_amexd, 
				sum(f_cartao_d_loja_hist) as cartao_amexd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexD2($data_filter=null)
	{
		if($data_filter) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_amexd2, 
				sum(f_cartao_d2_loja_hist) as cartao_amexd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_amexd2, 
				sum(f_cartao_d2_loja_hist) as cartao_amexd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->bindValue(':dt', $day);
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexDM($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_amexd, 
				sum(f_cartao_d_loja_hist) as cartao_amexd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d) as cartao_amexd, 
				sum(f_cartao_d_loja_hist) as cartao_amexd_hist 
			FROM `listas` WHERE brand_d_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getCartaoAmexDM2($data_inicial = null, $data_final = null)
	{
		if($data_inicial) {
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_amexd2, 
				sum(f_cartao_d2_loja_hist) as cartao_amexd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT 
				sum(f_cartao_d2) as cartao_amexd2, 
				sum(f_cartao_d2_loja_hist) as cartao_amexd_hist2 
			FROM `listas` WHERE brand_d2_loja = :brand AND data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':brand', 'Amex');
			$sql->execute();
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function getTotalCusto($data_filter = null)
	{
		$array = array();
		
		if($data_filter) {
			$sql ="SELECT sum(custo) as custo FROM list_prods WHERE date_list_prods = :dt";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':dt', $data_filter);
			$sql->execute();
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(custo) as custo FROM list_prods WHERE date_list_prods = :d";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':d', $day);
			$sql->execute();
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotalCustoM($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT sum(custo) as custo FROM list_prods WHERE date_list_prods BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(custo) as custo FROM list_prods WHERE date_list_prods BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotalVendasVendedores($data_inicial = null, $data_final = null)
	{
		$array = array();
		
		if($data_inicial) {
			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		} else {
			$day = Date('Y-m-d');
			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax, sum(desconto) as total_desconto FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->query($sql);
		}

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
}