<?php
class Unidades extends Model
{
	public function getAll()
	{
		$array = array();
		$sql ="SELECT * FROM units";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function add($unit_name)
	{
		$sql ="INSERT INTO units SET unit_name = :unit_name";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':unit_name', $unit_name);
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Unidade Cadastrada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Cadastrar Unidade!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getUnitById($id_unit)
	{
		$array = array();

		$sql ="SELECT * FROM units WHERE id_unit = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_unit);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function edit($unit_name, $id_unit)
	{
		$sql ="UPDATE units SET unit_name = :n WHERE id_unit = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n', $unit_name); 
		$sql->bindValue(':id', $id_unit);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Unidade Editada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Unidade!',
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