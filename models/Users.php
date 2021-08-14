<?php
class Users extends Model
{
	private $uid;
	private $permissoes;

	// Função Verifica se o cliente esta no banco
	public function verifyLogin()
	{
		if (!empty($_SESSION['uLogin'])) {
			$s = $_SESSION['uLogin'];

			$sql ="SELECT * FROM users WHERE token = :hash";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':hash', $s);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$p = new Permissions();

				$data = $sql->fetch();
				$this->uid = $data['id_user'];
				$_SESSION['idus'] = $data['id_user'];
				$this->permissoes = $p->getPermissoes($data['id_permissao']);

				return true;

			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	// Verifica as permissoes do usuario
	public function hasPermission($permission_slug)
	{
		if (in_array($permission_slug, $this->permissoes)) {
			return true;
		} else {
			return false;
		}
	}

	// Verifica se o username esta correto com expressao regular
	public function validateUserName($u)
	{
		if (preg_match('/^[a-z0-9]+$/', $u)) {
			return true;
		} else {
			return false;
		}
	}

	// verifica se o usuario existe
	public function userExists($u)
	{
		$sql ="SELECT * FROM users WHERE email_user = :u";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":u", $u);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//valida o usuario para fazer login
	public function validateUser($email_user, $senha)
	{
		$sql ="SELECT * FROM users WHERE email = :email_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email_user", $email_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$info = $sql->fetch(\PDO::FETCH_ASSOC);

			
			if (password_verify($senha, $info['password'])) {

				$token = md5(rand(0,9999).time().$info['id_user']);
				$this->setLoginHash($info['id_user'], $token);
				$_SESSION['uLogin'] = $token;
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	//cadastra o usuario no banco
	public function registerUser($nome_user, $email_user, $senha)
	{
		$passhash = password_hash($senha, PASSWORD_DEFAULT);

		$sql ="INSERT INTO users SET nome_user = :n, email_user = :e, senha = :s";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":n", $nome_user);
		$sql->bindValue(":e", $email_user);
		$sql->bindValue(":s", $passhash);
		$sql->execute();
	}

	//valida o usuario para fazer login
	public function validateUserMobile($email, $senha)
	{
		$sql ="SELECT * FROM colaboradores WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$info = $sql->fetch(\PDO::FETCH_ASSOC);
			
			if (password_verify($senha, $info['senha'])) {
				$v = ([
					'id_vendor' => $info['id_colab'],
					'name_vendor' => $info['nome_colab']
				]);
				$_SESSION['uid'] = $v;
				return true;
			} else {
				return false;
			}

		} 

	}

	//valida o usuario para fazer login
	public function unlockUser($senha, $id_user)
	{
		$sql ="SELECT * FROM users WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_user", $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$info = $sql->fetch();

			if (password_verify($senha, $info['senha'])) {

				// $token = md5(rand(0,9999).time().$info['id_user']);
				// $this->setLoginHash($info['id_user'], $token);
				// $_SESSION['uLogin'] = $token;
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	private function setLoginHash($uid, $hash)
	{
		$sql ="UPDATE users SET token = :hash WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":hash", $hash);
		$sql->bindValue(":id_user", $uid);
		$sql->execute();
	}

	// Função set o usuario logado para os controllers e model
	public function getUid()
	{
		return $this->uid;
	}

	public function getUserName()
	{
		$array = array();

		$sql ="SELECT * FROM users as u INNER JOIN permission_groups as pg on(u.id_permissao = pg.id_group) WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_user", $_SESSION['idus']);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function toggleStyle()
	{
		$id_user = $_SESSION['idus'];

		$sql ="UPDATE layput SET dark = 1 - dark WHERE id_user = '$id_user'";
		$sql = $this->db->query($sql);
	}

	public function getMode()
	{
		$array = array();

		$id_user = $_SESSION['idus'];

		$sql ="SELECT dark FROM layput WHERE id_user = '$id_user'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}

	public function getAll()
	{
		$array = array();

		$sql = "SELECT * FROM users as u INNER JOIN permission_groups as pg on(u.id_permissao = pg.id_group) WHERE status = 0";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		 }
		 return $array;
	}

	public function getAllVendas($data_inicial = null, $data_final = null)
	{
		$vendas = new Vendas();
		$array = array();

		$sql = "SELECT name FROM users WHERE status = 0";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($array as $key => $value) {
				$array[$key]['vendas'] = $this->getTotalVendaVendedores($value['name'], $data_inicial, $data_final);
			}	
		 }
		 return $array;
	}

	public function getTotalVendaVendedores($name, $data1, $data2)
	{
		$sql ="SELECT count(id_lista) AS quantidade, SUM(total) AS total_vendas FROM listas WHERE vendor = :vendor AND
		data_lista BETWEEN '$data1' AND '$data2'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':vendor', $name);
		$sql->execute();
		return $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getAllInative()
	{
		$array = array();

		$sql = "SELECT * FROM users as u INNER JOIN permission_groups as pg on(u.id_permissao = pg.id_group) WHERE status = 1";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);	
		 }
		 return $array;
	}

	public function getCargos()
    {
        $array = array();
        $sql ="SELECT * FROM permission_groups";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
           $array = $sql->fetchAll(\PDO::FETCH_ASSOC); 
        }
        return $array;
	}

	public function saveUsuario($name, $email, $password, $status, $group)
    {

		$passhash = password_hash($password, PASSWORD_DEFAULT);

        $sql ="INSERT INTO users SET name = :n, email = :e, password = :p, id_permissao = :id, status = :st, date_create = NOW()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n', $name);		
		$sql->bindValue(':e', $email);		
		$sql->bindValue(':p', $passhash);	
		$sql->bindValue(':id', $group);
		$sql->bindValue(':st', $status);
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Usuário cadastrado com sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao cadastrar usuário!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
    }
	
	public function toggleStatus($id_user)
	{
		$sql ="UPDATE users SET status = 1 - status WHERE id_user = '$id_user'";
        $sql = $this->db->query($sql);
   
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
                                  title: 'Erro ao Editar Cliente!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	}

	public function getUsuarioId($id_user)
	{
		$array = array();
		$sql ="SELECT * FROM users as u INNER JOIN permission_groups as pg on(u.id_permissao = pg.id_group) WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();
		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
	}
	
	public function ultimoAcesso($id_user)
	{
		$sql ="UPDATE users SET hora_saida = NOW() WHERE id_user = '$id_user'";
		$sql = $this->db->query($sql);
	}

	public function getColabId($id_colab)
	{
		$array = array();
		$sql ="SELECT * FROM colaboradores as c INNER JOIN permission_groups as pg on(c.cargo = pg.id_group) WHERE id_colab = :id_colab";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_colab', $id_colab);
		$sql->execute();
		if($sql->rowCount() > 0) {
		   $array = $sql->fetch(\PDO::FETCH_ASSOC);	
		}
		return $array;
    }

    public function editUsuario($nome, $email, $grupo, $id)
    {
		$sql ="UPDATE users SET name = :n, email = :e, id_permissao = :id WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n', $nome);	
		$sql->bindValue(':e', $email);	
		$sql->bindValue(':id', $grupo);	
		$sql->bindValue(':id_user', $id);
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
                                  title: 'Erro ao Editar Usuário!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
    }

	public function editPassword($pass, $id)
    {

		$passhash = password_hash($pass, PASSWORD_DEFAULT);

		$sql ="UPDATE users SET password = :p WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':p', $passhash);		
		$sql->bindValue(':id_user', $id);
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
                                  title: 'Erro ao Editar Senha!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
    }

	public function editPasswordDiscount($pass, $id)
    {

		$passhash = password_hash($pass, PASSWORD_DEFAULT);

		$sql ="UPDATE users SET pass_discount = :p WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':p', $passhash);		
		$sql->bindValue(':id_user', $id);
		$sql->execute();	
		
		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Senha criada com sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao criar Senha!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
    }

	public function validateEmailForgot($email)
	{
		$sql ="SELECT * FROM users WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			$_SESSION['id_user_reset'] = $data;
			return true;
		} else {
			return false;
		}
	}

	public function newPass($password, $id_user)
	{
		$passhash = password_hash($password, PASSWORD_DEFAULT);

		$sql ="UPDATE users SET password = :pass WHERE id_user = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':pass', $passhash);
		$sql->bindValue(':id', $id_user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
		
	}

	//valida o usuario para fazer login
	public function verifyPassDiscount($discount, $user)
	{
		$sql ="SELECT * FROM users WHERE id_user = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $user);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$disc = $sql->fetch(\PDO::FETCH_ASSOC);

			
			if (password_verify($discount, $disc['pass_discount'])) {
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}
}