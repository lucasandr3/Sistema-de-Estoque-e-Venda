<?php
class Parceiros extends Model
{
	public function getAll()
	{
		$array = array();
		$sql ="SELECT * FROM parceiros";
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

	public function addParc($nome, $comicao)
    {
        $sql = "INSERT INTO parceiros SET nome_parc = :n, taxa_parc = :c";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":n", $nome);
		$sql->bindValue(":c", $comicao);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Parceiro cadastrado com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao cadastrar parceiro!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	
	}

	public function editParc($nome, $comicao, $id)
    {
        $sql = "UPDATE parceiros SET nome_parc = :n, taxa_parc = :c WHERE id_parceiro = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":n", $nome);
		$sql->bindValue(":c", $comicao);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Parceiro editado com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao editar parceiro!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	
	}

	public function delParc($id)
    {
        $sql = "DELETE FROM parceiros WHERE id_parceiro = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Parceiro apagado com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao apagar parceiro!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	
	}

	public function getParceiroById($id)
	{
		$array = array();

		$sql ="SELECT * FROM parceiros WHERE id_parceiro = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getComId($id, $taxa)
    {
        $sql ="SELECT sum(total_tax) as comissao FROM listas WHERE parceiro = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch(\PDO::FETCH_ASSOC);

			$sqlt ="SELECT telefone, nome_parc FROM parceiros WHERE id_parceiro = :id";
       	 	$sqlt = $this->db->prepare($sqlt);
			$sqlt->bindValue(":id", $id);
			$sqlt->execute();
			$phone = $sqlt->fetch(\PDO::FETCH_ASSOC);

			$p = $row['comissao'];
  			$pct = $taxa;
  			$imp = (($pct/100)*$p);
			$array['dados'] = [];  
			$array['dados']['total_venda'] = 'R$ '.number_format($row['comissao'],2,',','.');  
			$array['dados']['comissao'] = number_format($taxa,2,'.',',').' %';
			$array['dados']['total_comissao'] = 'R$ '.number_format($imp,2,',','.');
			$array['dados']['telefone'] = $phone['telefone'];
			$array['dados']['nome_parc'] = $phone['nome_parc'];
			return $array['dados'];  
        }
    }
	
}