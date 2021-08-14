<?php
class Despesas extends Model
{
	public function getCat()
	{
		$array = array();

		$sql ="SELECT * FROM cat_despesa";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addDespesa($descricao, $valor, $data_d, $conta, $id_cat, $id_user)
	{
		$sql ="INSERT INTO despesa SET descricao = :descricao, valor = :valor, data_d = :data_d,
		conta = :conta, id_cat = :id_cat, id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':valor', $valor);
		$sql->bindValue(':data_d', date('Y-m-d', strtotime($data_d)));
		$sql->bindValue(':conta', $conta);
		$sql->bindValue(':id_cat', $id_cat);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Despesa Adicionada Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Despesa!',
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
					  moeda_des,
					  conta FROM despesa as d INNER JOIN cat_despesa as cd ON(d.id_cat = cd.id)
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

		$sql ="SELECT SUM(valor) FROM despesa WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function addDesRecorrente($descricao, $valor, $ventrada, $juro, $qtd_parc, $data_parc, $conta, $id_cat, $id_user)
	{
		if ($juro == null) {
			$sql ="INSERT INTO des_recorrente SET descricao = :descricao, valor = :valor, ventrada = :ventrada, juro = :juro, qtd_parc = :qtd_parc, data_parc = :data_parc, conta = :conta, id_cat = :id_cat, id_user = :id_user";
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

			$id_desp = $this->db->lastInsertId(); 

			$data_atual = $data_parc;

			for ($i=0; $i < $qtd_parc; $i++) {

				$data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));
				$data_atual = $data;

				$new_valor_total = (($juro/100)*$valor);
				$total_juros = $new_valor_total + $valor;
	
				$new_valor = $valor - $ventrada;
				$valor_parc = $new_valor/$qtd_parc;

				$sqlb ="INSERT INTO boletos SET id_desp = :idep,  valor_boleto: vb, vencimento = :v";
				$sqlb = $this->db->prepare($sqlb);
				$sqlb->bindValue(':idep',$id_desp);
				$sqlb->bindValue(':vb',$valor_parc);
				$sqlb->bindValue(':v',$data);
				$sqlb->execute();

			}

		} else {
			$new_valor_total = ($juro/100) * $valor;
			$total_juros = $new_valor_total + $valor;
			$sql ="INSERT INTO des_recorrente SET descricao = :descricao, valor = :valor, ventrada = :ventrada, juro = :juro, qtd_parc = :qtd_parc, data_parc = :data_parc, conta = :conta, id_cat = :id_cat, id_user = :id_user";
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

			$id_desp = $this->db->lastInsertId(); 

			$data_atual = $data_parc;
		
			for ($i=0; $i < $qtd_parc; $i++) {

				$new_valor_total = (($juro/100)*$valor);
				$total_juros = $new_valor_total + $valor;

				$data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));
				$data_atual = $data;
				
		
				$new_valor = $total_juros - $ventrada;
				$valor_parc = $new_valor/$qtd_parc;

				$sqlb ="INSERT INTO boletos SET id_desp = :idep, valor_boleto = :vb, vencimento = :v";
				$sqlb = $this->db->prepare($sqlb);
				$sqlb->bindValue(':idep',$id_desp);
				$sqlb->bindValue(':vb',$valor_parc);
				$sqlb->bindValue(':v',$data);
				$sqlb->execute();
		
			}
		}
		

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Despesa Adicionada Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Despesa!',
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
					  conta FROM des_recorrente as dr INNER JOIN cat_despesa as cd ON(dr.id_cat = cd.id)
					  WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getTotalRecorrente($id_user)
	{
		$array = array();

		$sql ="SELECT SUM(valor) FROM des_recorrente WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getDespesaList($id_user)
	{
		$array = array();

		$data = date('m');

		$sql ="SELECT SUM(valor) as total,
					  data_d,
					  id_user
					  FROM despesa as d INNER JOIN cat_despesa as cd ON(d.id_cat = cd.id)
					  WHERE id_user = :id_user GROUP BY month(data_d)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
			foreach($array as $item) {
                $array[$item['data_d']] = $item['total'];
            }
		}

		return $array;
	}

	public function getExpensesList($period1, $period2, $id_user) {
		$array = array();
		$currentDay = $period1;
		while($period2 != $currentDay) {
			$array[$currentDay] = 0;
			$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
		}

		$sql = "SELECT DATE_FORMAT(data_d, '%Y-%m-%d') as data_d, SUM(valor) as total FROM despesa WHERE id_user = :id_user AND data_d BETWEEN :period1 AND :period2 GROUP BY DATE_FORMAT(data_d, '%Y-%m-%d')";
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

	public function getDespesasMaisUsadas($id_user)
	{
		$array = array();

		$sql ="SELECT SUM(id_cat) as total FROM despesa as d INNER JOIN cat_despesa as cd ON(d.id_cat = cd.id) GROUP BY id_cat LIMIT 4";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getAllAtualData()
	{
		$array = array();
		$sql ="SELECT *   
		FROM boletos as b INNER JOIN des_recorrente as dr ON(b.id_desp = dr.id)  
		WHERE Month(b.vencimento) = Month(Now())
		AND day(b.vencimento) = day(Now())";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotalBoletos()
	{
		$array = array();
		$sql ="SELECT sum(valor_boleto) as total_boleto FROM boletos as b INNER JOIN des_recorrente as dr ON(b.id_desp = dr.id) WHERE Month(b.vencimento) = Month(Now()) AND day(b.vencimento) = day(Now())";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
} 

// SELECT 
// dr.descricao,
// dr.valor,
// b.vencimento
// 		FROM des_recorrente as dr INNER JOIN boletos as b ON(dr.id = b.id_desp)   
// 		WHERE Month(b.vencimento) = Month(Now())
// 		AND day(b.vencimento) = day(Now())