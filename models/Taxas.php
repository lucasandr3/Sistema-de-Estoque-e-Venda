<?php
class Taxas extends Model
{
	public function getAll()
	{
		$array = array();
		$sql ="SELECT * FROM taxas";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		   
		   foreach ($array as $key => $value) {
			   $array[$key]['taxas_por'] = $this->getAllTaxasCartoes($value['id_tax']);
		   }
		}
		return $array;
	}

	public function getAllTaxasCartoes($id)
	{
		$array = array();
		$sql ="SELECT * FROM list_tax WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getTaxasUpdateCreditoLoja()
    {
        $array = array();
        $sql ="SELECT id_tax, brand FROM taxas WHERE who = 'loja' AND op = 'credito'";
        //$sql ="SELECT * FROM taxas as t INNER JOIN list_tax as lt ON(t.id_tax = lt.id_tax) WHERE t.who = 'loja' AND t.op = 'credito'";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			
            foreach ($array as $key => $value) {
                $array[$key]['tax'] = $this->getAllTaxasCartoes($value['id_tax']);
            }
        }
        return $array;
    }

	public function getTaxasUpdateDebitoLoja()
    {
        $array = array();
        $sql ="SELECT id_tax, brand FROM taxas WHERE who = 'loja' AND op = 'debito'";
        //$sql ="SELECT * FROM taxas as t INNER JOIN list_tax as lt ON(t.id_tax = lt.id_tax) WHERE t.who = 'loja' AND t.op = 'credito'";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			
            foreach ($array as $key => $value) {
                $array[$key]['tax'] = $this->getAllTaxasCartoes($value['id_tax']);
            }
        }
        return $array;
    }

	public function getTaxasUpdateCreditoParceiro()
    {
        $array = array();
        $sql ="SELECT id_tax, brand FROM taxas WHERE who = 'parceiro' AND op = 'credito'";
        //$sql ="SELECT * FROM taxas as t INNER JOIN list_tax as lt ON(t.id_tax = lt.id_tax) WHERE t.who = 'loja' AND t.op = 'credito'";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			
            foreach ($array as $key => $value) {
                $array[$key]['tax'] = $this->getAllTaxasCartoes($value['id_tax']);
            }
        }
        return $array;
    }

	public function getTaxasUpdateDebitoParceiro()
    {
        $array = array();
        $sql ="SELECT id_tax, brand FROM taxas WHERE who = 'parceiro' AND op = 'debito'";
        //$sql ="SELECT * FROM taxas as t INNER JOIN list_tax as lt ON(t.id_tax = lt.id_tax) WHERE t.who = 'loja' AND t.op = 'credito'";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			
            foreach ($array as $key => $value) {
                $array[$key]['tax'] = $this->getAllTaxasCartoes($value['id_tax']);
            }
        }
        return $array;
    }

	public function getTaxasUpdatePicPay()
    {
        $array = array();
        $sql ="SELECT id_tax, brand FROM taxas WHERE who = 'picpay' AND op = 'picpay'";
        //$sql ="SELECT * FROM taxas as t INNER JOIN list_tax as lt ON(t.id_tax = lt.id_tax) WHERE t.who = 'loja' AND t.op = 'credito'";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			
            foreach ($array as $key => $value) {
                $array[$key]['tax'] = $this->getAllTaxasCartoes($value['id_tax']);
            }
        }
        return $array;
    }

	public function getAllOP($id)
	{
		$array = array();
		$sql ="SELECT * FROM list_tax WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getAllId($id)
	{
		$array = array();
		$sql ="SELECT * FROM taxas WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	

		   foreach ($array as $key => $value) {
			$array[$key]['taxas_por'] = $this->getAllTaxasCartoes($id);
			}
		}
		return $array;
	}

	public function getAllIdAll($id)
	{
		$array = array();
		$sql ="SELECT * FROM list_tax WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getAllAtualData()
	{
		$array = array();
		$sql ="SELECT name, phone    
		FROM clients   
		WHERE Month(birthdate) = Month(Now())
		AND day(birthdate) = day(Now())";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getMensagem()
	{
		$array = array();
		$sql ="SELECT * FROM mensagem";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function saveMSG($msg)
	{
		$sql ="UPDATE mensagem SET msg = :msg";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':msg',$msg);
		$sql->execute();
	}

	public function add($taxa, $type, $op)
	{
		$sql ="INSERT INTO taxas SET type = :tp, op = :op, taxa = :tx";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':tp', $type);
		$sql->bindValue(':op', $op);
		$sql->bindValue(':tx', $taxa);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Taxa Cadastrada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Cadastrar Taxa!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}				   
	}

	public function getClientById($id_client)
	{
		$array = array();

		$sql ="SELECT * FROM clients WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_client);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function edit($type, $op, $taxa,  $id_tax)
	{
		$sql ="UPDATE taxas SET type = :tp, op = :op, taxa = :tx WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':tp', $type);
		$sql->bindValue(':op', $op);
		$sql->bindValue(':tx', $taxa);
		$sql->bindValue(':id', $id_tax);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Edição Feita Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Taxa!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function del($id_tax)
	{
		$sql ="DELETE FROM taxas WHERE id_tax = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_tax);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Ação Feita Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao apagar Taxa!',
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

	public function getProds()
	{
		$array = array();
		$sql ="SELECT * FROM produtos as p INNER JOIN estoque as e ON(p.id_prod = e.id_produto)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getVendors()
	{
		$array = array();
		$sql ="SELECT * FROM vendedores";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function ProductsByName($q)
	{
		$array = array();
        
		$sql = $this->db->prepare("SELECT id_prod, nome_prod, preco FROM produtos WHERE nome_prod LIKE :nome_prod OR id_prod LIKE :id_prod LIMIT 10");
		$sql->bindValue(':nome_prod', '%'.$q.'%');
		$sql->bindValue(':id_prod', '%'.$q.'%');
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function createList($data_lista, $id_vendor, $produtos, $totalnf)
    {

        $sql = "INSERT INTO listas SET id_vendor = :id_vendor, total = :total, data_lista = :data_lista";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id_vendor", $id_vendor);
		$sql->bindValue(":total", $totalnf);
		$sql->bindValue(":data_lista", $data_lista);
		$sql->execute();

		$id_lista = $this->db->lastInsertId();

		foreach($produtos as $id_prod => $quant_prod) {
            $sql ="SELECT preco FROM produtos WHERE id_prod = :id_prod";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_prod", $id_prod);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$row   = $sql->fetch();
				$valor = $row['preco'];

                $sqle ="INSERT INTO list_prods SET id_list = :id_list, id_produto = :id_produto, quant = :quant, valor = :valor";
				$sqle = $this->db->prepare($sqle);
				$sqle->bindValue(":id_list", $id_lista);
				$sqle->bindValue(":id_produto", $id_prod);
				$sqle->bindValue(":quant", $quant_prod);
				$sqle->bindValue(":valor", $valor);
				$sqle->execute();

				$sqlp = $this->db->prepare("UPDATE estoque SET qtd = qtd - $quant_prod WHERE id_produto = :id_produto");
				$sqlp->bindValue(":id_produto", $id_prod);
				$sqlp->execute();
			}
		}

            if($sql->rowCount() > 0) {
                flash_messages::msgSuccessCreate("Lançamento Efetuado com Sucesso.");
            } else {
                flash_messages::msgDangerCreate("Erro ao Efetuar Lançamento");
            }
	
	}
	
	public function getAllList()
	{
		$array = array();
		$sql ="SELECT id_lista, nome, total, data_lista, impress from listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_list)INNER JOIN vendedores as v on(listas.id_vendor = v.id_vendor) GROUP BY id_lista";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
		// SELECT id_lista, nome, total from listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_list)INNER JOIN vendedores as v on(listas.id_vendor = v.id_vendor) GROUP BY id_lista
		//SELECT * FROM listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_lista)
		//SELECT * FROM listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_lista)INNER JOIN vendedores as v on(listas.id_vendor = v.id_vendor)
	}

	public function getAllListId($id_lista)
	{
		$array = array();
		$sql ="SELECT * FROM listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_list)INNER JOIN produtos as p ON(lp.id_produto = p.id_prod) WHERE id_lista = :id_lista";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_lista', $id_lista);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
		// SELECT id_lista, nome, total from listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_list)INNER JOIN vendedores as v on(listas.id_vendor = v.id_vendor) GROUP BY id_lista
		//SELECT * FROM listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_lista)
		//SELECT * FROM listas INNER JOIN list_prods as lp ON(listas.id_lista = lp.id_lista)INNER JOIN vendedores as v on(listas.id_vendor = v.id_vendor)
	}

	public function getVendorList($id_lista)
	{
		$array = array();
		$sql ="SELECT nome, data_lista FROM listas INNER JOIN vendedores as v ON(listas.id_vendor = v.id_vendor) WHERE id_lista = :id_lista";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_lista', $id_lista);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getListTotal($id_lista)
	{
		$array = array();
		$sql ="SELECT total FROM listas WHERE id_lista = :id_lista";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_lista', $id_lista);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getTotalV()
	{
		$array = array();
		$sql ="SELECT count(*) as totalv FROM vendedores";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
 
} 