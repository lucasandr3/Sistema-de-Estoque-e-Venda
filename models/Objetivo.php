<?php
class Objetivo extends Model
{
	public function addObjetivoAno($descricao, $status, $id_user)
	{
		$sql ="INSERT INTO metas SET descricao = :descricao, status = :status, date_i = NOW(), id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Objetivo Adicionado Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Objetivo!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function addObjetivoMes($descricao, $status, $id_user)
	{
		$sql ="INSERT INTO metas_mes SET descricao = :descricao, status = :status, date_i = NOW(), id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Objetivo Adicionado Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Adicionar Objetivo!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getObAno($id_user)
	{
		$array = array();

		$sql ="SELECT * FROM metas WHERE id_user = :id_user ORDER BY date_i DESC";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getObMes($id_user)
	{
		$array = array();

		$data = date('m');

		$sql ="SELECT * FROM metas_mes WHERE month(date_i) = :data AND id_user = :id_user ORDER BY date_i DESC";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->bindValue(':data', $data);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function editStatusAno($status, $id)
	{
		$sql ="UPDATE metas SET status = :status, date_f = NOW() WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Status Editado Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Status!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function editStatusMes($status, $id)
	{
		$sql ="UPDATE metas_mes SET status = :status, date_f = NOW() WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Status Editado Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Status!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}
} 