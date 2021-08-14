<?php
class ProdutosVenda extends Model
{
	public function getProdsSaidaId($id)
    {
        $sql ="SELECT * FROM list_prods as lp INNER JOIN produtos as p ON(lp.id_produto = p.id_prod) WHERE id_list = :id";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

}