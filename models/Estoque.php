<?php
class Estoque extends Model
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

	public function getDadosVenc()
	{
		$array = array();
		$sql ="SELECT * FROM estoque as e INNER JOIN produtos as p ON(e.id_produto = p.id_prod) WHERE Month(p.validade_prod) = Month(NOW()) + 3 AND day(p.validade_prod)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getDadosVencTrue()
	{
		$array = array();
		$sql ="SELECT * FROM produtos WHERE date(NOW()) > date(validade_prod)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getSaidas()
	{
		$array = array();
		$sql ="SELECT * FROM saida_manual";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
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

	public function getProdsVendaId($id)
    {
        $sql ="SELECT * FROM listas as l INNER JOIN list_prods as lp ON(l.id_lista = lp.id_list) INNER JOIN produtos as p ON(lp.id_produto = p.id_prod) WHERE l.id_lista = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}