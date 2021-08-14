<?php
class Produtos extends Model
{
	public function getAll()
	{
		$array = array();
		$sql ="SELECT * FROM produtos INNER JOIN estoque ON(produtos.id_prod = estoque.id_produto)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function add($codigo, $nome_prod, $categoria, $marca, $unidade, $custo, $preco, $quantidade, $validade=null)
	{
		$sql ="INSERT INTO produtos SET novo_cod = :nc, nome_prod = :nome_prod, categoria = :cat,
		marca = :m, unidade = :un, cost = :custo, preco = :preco, quantidade = :quantidade, 
		alert = :alert, validade_prod = :vp";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nc', $codigo);
		$sql->bindValue(':nome_prod', $nome_prod);
		$sql->bindValue(':cat', $categoria);
		$sql->bindValue(':m', $marca);
		$sql->bindValue(':un', $unidade);
		$sql->bindValue(':custo', $custo);
		$sql->bindValue(':preco', $preco);
		$sql->bindValue(':quantidade', 0);
		$sql->bindValue(':alert', $quantidade);
		if($validade) {
			$sql->bindValue(':vp', $validade);
		} else {
			$sql->bindValue(':vp', null);
		}
		$sql->execute();

		$id_prod = $this->db->lastInsertId();

		$sql ="SELECT * FROM produtos WHERE id_prod = :id_prod";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		$total_custo = 0;
		$total_venda = 0;
		$total_qtd   = 0;

		if ($sql->rowCount() > 0) {
			$row = $sql->fetch(\PDO::FETCH_ASSOC);
			
			$total_custo = ($custo * $quantidade);
			$total_venda = ($preco * $quantidade);
			$total_qtd   = $quantidade;

			$sqle ="INSERT INTO estoque SET id_produto = :id_produto, custo = :custo, preco_venda = :preco_venda,
			qtd = :qtd, alert_qt = :alert_qt, validade_es = :ve, total_custo = 0, total_venda = 0, data_entrada = NOW()";
			$sqle = $this->db->prepare($sqle);
			$sqle->bindValue(':id_produto', $row['id_prod']); 
			$sqle->bindValue(':custo', $custo); 
			$sqle->bindValue(':preco_venda', $preco); 
			$sqle->bindValue(':qtd', 0); 
			$sqle->bindValue(':alert_qt', $quantidade);
			if($validade) {
				$sqle->bindValue(':ve', $validade);
			} else {
				$sqle->bindValue(':ve', null);
			}  
			// $sqle->bindValue(':total_custo', $total_custo); 
			// $sqle->bindValue(':total_venda', $total_venda); 
			// $sqle->bindValue(':total_qtd', $total_qtd);
			$sqle->execute(); 
		}
		
		if ($sqle->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Produto cadastrado com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao cadastrar produto!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getProdById($id_prod)
	{
		$array = array();

		$sql ="SELECT * FROM produtos as p INNER JOIN estoque as e ON(p.id_prod = e.id_produto) WHERE id_prod = :id_prod";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function edit($nome_prod, $categoria, $marca, $unidade, $custo, $preco, $alert, $validade, $id_prod, $newid)
	{
		$sql ="UPDATE produtos SET novo_cod = :ni, nome_prod = :nome_prod, categoria = :cat, marca = :m, unidade = :u, cost = :cost, preco = :preco, alert = :al, validade_prod = :va WHERE id_prod = :id_prod";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ni', $newid);
		$sql->bindValue(':nome_prod', $nome_prod); 
		$sql->bindValue(':cat', $categoria);
		$sql->bindValue(':m', $marca);
		$sql->bindValue(':u', $unidade); 
		$sql->bindValue(':cost', $custo); 
		$sql->bindValue(':preco', $preco);
		$sql->bindValue(':al', $alert);
		$sql->bindValue(':va', $validade);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		$sql ="SELECT * FROM estoque WHERE id_produto = :id_prod";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$row = $sql->fetch(\PDO::FETCH_ASSOC);
			$total_custo = ($custo * $row['qtd']);
			$total_venda = ($preco * $row['qtd']);
			$total_qtd   = $row['qtd'];

			$sqle ="UPDATE estoque SET custo = :custo, preco_venda = :preco_venda,
			total_custo = :total_custo, total_venda = :total_venda, alert_qt = :alert_qt, validade_es = :vae WHERE id_produto = :id_produto";
			$sqle = $this->db->prepare($sqle); 
			$sqle->bindValue(':custo', $custo); 
			$sqle->bindValue(':preco_venda', $preco);  
			$sqle->bindValue(':total_custo', $total_custo); 
			$sqle->bindValue(':total_venda', $total_venda);
			$sqle->bindValue(':alert_qt', $alert);  
			$sqle->bindValue(':vae', $validade); 
			$sqle->bindValue(':id_produto', $id_prod);
			$sqle->execute(); 
		}

		if ($sqle->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Produto editado com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao editar produto!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function toggleStatus($id_vendor)
	{
		$sql ="UPDATE vendedores SET status = 1 - status WHERE id_vendor = '$id_vendor'";
		$sql = $this->db->query($sql);
			
		if($sql->rowCount() > 0) {
			$_SESSION['alert'] = '<div class="alert alert-success mt-4" role="alert">
			<strong><i class="fas fa-check"></i></strong> Fornecedor Atualizado Com Sucesso.
						</div>';
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger mt-4" role="alert">
						<strong><i class="fas fa-frown"></i></strong> Erro ao Atualizar Fornecedor.
						</div>';
		}
	}

	public function getTotalProds()
	{
		$array = array();
		$sql ="SELECT count(*) as totalp FROM produtos";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getVencHome()
	{
		$array = array();
		$sql ="SELECT *   
		FROM produtos WHERE Month(validade_prod) = Month(Now()) + 3 AND day(validade_prod)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getMaisVendidos()
    {
        $sql ="SELECT SUM(list_prods.quant) as total, produtos.nome_prod FROM list_prods INNER JOIN produtos ON(list_prods.id_produto = produtos.id_prod) GROUP BY id_prod ORDER BY total DESC LIMIT 5";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
} 