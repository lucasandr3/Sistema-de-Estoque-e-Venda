<?php
class Receitas extends Model
{
	public function getCat()
	{
		$array = array();

		$sql ="SELECT * FROM cat_receita";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addReceita($descricao, $valor, $data_d, $conta, $id_cat, $id_user)
	{
		$mesAtual = date('m');

		$sql ="INSERT INTO receita SET descricao = :descricao, valor = :valor, data_d = :data_d,
		conta = :conta, id_cat = :id_cat, id_user = :id_user, mesid = :mesid";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':valor',   $valor);
		$sql->bindValue(':data_d',  date('Y-m-d',strtotime($data_d)));
		$sql->bindValue(':conta',   $conta);
		$sql->bindValue(':id_cat',  $id_cat);
		$sql->bindValue(':id_user', $id_user);
		$sql->bindValue(':mesid',   $mesAtual);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Receita Adicionada Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Receita!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getAll($data_inicial, $data_final, $id_user)
	{
		$array = array();

			$sql ="SELECT descricao,
					  valor,
					  data_d,
					  id_cat,
					  id_user,
					  img,
					  nome,
					  conta FROM receita as r INNER JOIN cat_receita as cr ON(r.id_cat = cr.id)
					  WHERE data_d BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
		
	}

	public function getTotal($id_user)
	{
		$array = array();

		$sql ="SELECT SUM(valor) FROM receita WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getTotalRecorrente($id_user)
	{
		$array = array();

		$sql ="SELECT SUM(valor) FROM rec_recorrente WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function addRecRecorrente($descricao, $valor, $ventrada, $juro, $qtd_parc, $data_parc, $conta, $id_cat, $id_user)
	{
		if ($juros == null) {
			$sql ="INSERT INTO rec_recorrente SET descricao = :descricao, valor = :valor, ventrada = :ventrada, juro = :juro, qtd_parc = :qtd_parc, data_parc = :data_parc, conta = :conta, id_cat = :id_cat, id_user = :id_user";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':descricao', $descricao);
			$sql->bindValue(':valor', $valor);
			$sql->bindValue(':ventrada', $ventrada);
			$sql->bindValue(':juro', $juro);
			$sql->bindValue(':qtd_parc', $qtd_parc);
			$sql->bindValue(':data_parc', date('Y-m-d', strtotime($data_parc)));
			$sql->bindValue(':conta', $conta);
			$sql->bindValue(':id_cat', $id_cat);
			$sql->bindValue(':id_user', $id_user);
			$sql->execute();

			$id_resc = $this->db->lastInsertId(); 

			$data_atual = $data_parc;
		
			for ($i=0; $i < $qtd_parc; $i++) {

				$new_valor_total = (($juro/100)*$valor);
				$total_juros = $new_valor_total + $valor;

				$data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));
				$data_atual = $data;
				
				$new_valor = $valor - $ventrada;
				$valor_parc = $new_valor/$qtd_parc;

				$sqlb ="INSERT INTO cobranca SET id_resc = :idre,  valor_cob = :vc, vencimento = :v";
				$sqlb = $this->db->prepare($sqlb);
				$sqlb->bindValue(':idre',$id_resc);
				$sqlb->bindValue(':vc',$valor_parc);
				$sqlb->bindValue(':v',$data);
				$sqlb->execute();

			}
		} else {
			
			$sql ="INSERT INTO rec_recorrente SET descricao = :descricao, valor = :valor, ventrada = :ventrada, juro = :juro, qtd_parc = :qtd_parc, data_parc = :data_parc, conta = :conta, id_cat = :id_cat, id_user = :id_user";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':descricao', $descricao);
			$sql->bindValue(':valor', $total_juros);
			$sql->bindValue(':ventrada', $ventrada);
			$sql->bindValue(':juro', $juro);
			$sql->bindValue(':qtd_parc', $qtd_parc);
			$sql->bindValue(':data_parc', date('Y-m-d', strtotime($data_parc)));
			$sql->bindValue(':conta', $conta);
			$sql->bindValue(':id_cat', $id_cat);
			$sql->bindValue(':id_user', $id_user);
			$sql->execute();

			$id_resc = $this->db->lastInsertId(); 

			$data_atual = $data_parc;
		
			for ($i=0; $i < $qtd_parc; $i++) {

				$new_valor_total = (($juro/100)*$valor);
				$total_juros = $new_valor_total + $valor;

				$data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));
				$data_atual = $data;
				

				$new_valor = $total_juros - $ventrada;
				$valor_parc = $new_valor/$qtd_parc;

				$sqlb ="INSERT INTO cobranca SET id_resc = :idre,  valor_cob = :vc, vencimento = :v";
				$sqlb = $this->db->prepare($sqlb);
				$sqlb->bindValue(':idre',$id_resc);
				$sqlb->bindValue(':vc',$valor_parc);
				$sqlb->bindValue(':v',$data);
				$sqlb->execute();

			}
		}
		
		

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Receita Adicionada Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Receita!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getAllReco($id_user)
	{
		$array = array();

		$sql ="SELECT descricao,
					  valor,
					  data_parc,
					  qtd_parc,
					  id_cat,
					  id_user,
					  img,
					  nome,
					  ventrada,
					  juro,
					  conta FROM rec_recorrente as rc INNER JOIN cat_receita as cr ON(rc.id_cat = cr.id)
					  WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getRevenueList($period1, $period2, $id_user) {
		$array = array();
		$currentDay = $period1;
		while($period2 != $currentDay) {
			$array[$currentDay] = 0;
			$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
		}

		$sql = "SELECT DATE_FORMAT(data_d, '%Y-%m-%d') as data_d, SUM(valor) as total FROM receita WHERE id_user = :id_user AND data_d BETWEEN :period1 AND :period2 GROUP BY DATE_FORMAT(data_d, '%Y-%m-%d')";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->bindValue(':period1', $period1);
		$sql->bindValue(':period2', $period2);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$rows = $sql->fetchAll();

			foreach($rows as $item) {
				$array[$item['data_d']] = $item['total'];
			}
		}


		return $array;
	}

	public function getAllAtualData()
	{
		$array = array();
		$sql ="SELECT *   
		FROM cobranca as c INNER JOIN rec_recorrente as rr ON(c.id_resc = rr.id)  
		WHERE Month(c.vencimento) = Month(Now())
		AND day(c.vencimento) = day(Now())";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotalReceber()
	{
		$array = array();
		$sql ="SELECT sum(valor_cob) as total_cob FROM cobranca as c INNER JOIN rec_recorrente as rr ON(c.id_resc = rr.id) WHERE Month(c.vencimento) = Month(Now()) AND day(c.vencimento) = day(Now())";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
}	 