<?php
class Categorias extends Model
{
	public function getAll()
	{
		$array = array();
		$sql ="SELECT * FROM categorias";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function add($name_cat)
	{
		$sql ="INSERT INTO categorias SET name_cat = :name_cat";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name_cat', $name_cat);
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Categoria Cadastrada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Cadastrar Categoria!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getCatById($id_cat)
	{
		$array = array();

		$sql ="SELECT * FROM categorias WHERE id_cat = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_cat);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function edit($name_cat, $id_cat)
	{
		$sql ="UPDATE categorias SET name_cat = :n WHERE id_cat = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n', $name_cat); 
		$sql->bindValue(':id', $id_cat);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Categoria Editada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Categoria!',
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
} 