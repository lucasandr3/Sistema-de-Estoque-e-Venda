<?php
class Suporte extends Model
{

	public function add($title, $body)
	{
		$sql ="INSERT INTO suporte SET title = :title, body = :body, date_created = NOW()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':title', $title);
		$sql->bindValue(':body', $body);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}				   
	}

	public function getFrases()
	{
		$array = array();
		$sql ="SELECT * FROM `frases` ORDER BY RAND( )";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
		   $array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function editUser($name, $email, $id)
	{
		$sql ="UPDATE users SET name = :name, email = :email WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Editado Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getUser($id)
	{
		$array = array();

		$sql = "SELECT * FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function editPassword($password, $id)
	{
		$sql = "UPDATE users SET password = :password WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":password", md5($password));
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Senha Editada Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Editar Senha!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}
} 