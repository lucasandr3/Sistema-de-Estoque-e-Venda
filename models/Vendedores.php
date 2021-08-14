<?php
class Vendedores extends Model
{
	public function getAll()
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

	public function add($nome, $email, $tel, $cep, $rua, $bairro, $cidade, $estado, $numero, $comissao, $status)
	{
		$sql ="INSERT INTO vendedores SET nome = :nome, email = :email, tel = :tel, cep = :cep, rua = :rua,
						   bairro = :bairro, cidade = :cidade, estado = :estado, numero = :numero, comissao = :comissao,
						   status = :status, data_cadastro = NOW()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':tel', $tel);
		$sql->bindValue(':cep', $cep);
		$sql->bindValue(':rua', $rua);
		$sql->bindValue(':bairro', $bairro);
		$sql->bindValue(':cidade', $cidade);
		$sql->bindValue(':estado', $estado);
		$sql->bindValue(':numero', $numero);
		$sql->bindValue(':comissao', $comissao);
		$sql->bindValue(':status', $status);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Sugestão Recebida Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Enviar Sugestão!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}				   
	}

	public function getVendorById($id_vendor)
	{
		$array = array();

		$sql ="SELECT * FROM vendedores WHERE id_vendor = :id_vendor";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_vendor', $id_vendor);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function edit($nome, $email, $tel, $cep, $rua, $bairro, $cidade, $estado, $numero, $comissao, $status, $id_vendor)
	{
		$sql ="UPDATE vendedores SET nome = :nome, email = :email, tel = :tel, cep = :cep, rua = :rua,
						   bairro = :bairro, cidade = :cidade, estado = :estado, numero = :numero, comissao = :comissao,
						   status = :status WHERE id_vendor = :id_vendor";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':tel', $tel);
		$sql->bindValue(':cep', $cep);
		$sql->bindValue(':rua', $rua);
		$sql->bindValue(':bairro', $bairro);
		$sql->bindValue(':cidade', $cidade);
		$sql->bindValue(':estado', $estado);
		$sql->bindValue(':numero', $numero);
		$sql->bindValue(':comissao', $comissao);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id_vendor', $id_vendor);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Sugestão Recebida Com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao Enviar Sugestão!',
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
        
		$sql = $this->db->prepare("SELECT * FROM produtos WHERE nome_prod LIKE :nome_prod OR id_prod LIKE :id_prod OR novo_cod LIKE :novo_cod LIMIT 10");
		$sql->bindValue(':nome_prod', '%'.$q.'%');
		$sql->bindValue(':novo_cod', '%'.$q.'%');
		$sql->bindValue(':id_prod', '%'.$q.'%');
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function createList($fornecedor, $produtos, $nf)
    {
		$total_custo = 0;
		$total_venda = 0;
		foreach($produtos as $item) {
			$total_custo = $item['custo'] * $item['qtd'];
			$total_venda = $item['preco_venda'] * $item['qtd'];
			
			$sql ="UPDATE estoque SET id_produto = :p, custo = :c,
			 	preco_venda = :pv, qtd = :q + qtd, alert_qt = :aq, total_custo = :tc + total_custo, total_venda = :tv + total_venda, nf = :nf, fornecedor = :fornecedor WHERE id_produto = :p";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":p", $item['id_produto']);
			$sql->bindValue(":c", $item['custo']);
			$sql->bindValue(":pv", $item['preco_venda']);
			$sql->bindValue(":q", $item['qtd']);
			$sql->bindValue(":aq", $item['alert_qt']);
			$sql->bindValue(":tc", $total_custo);
			$sql->bindValue(":tv", $total_venda);
			$sql->bindValue(":nf", $nf);
			$sql->bindValue(":fornecedor", $fornecedor);
			$sql->execute();
		}

		if ($sql->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Lançamento feito com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao fazer lançamento!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
        // $sql = "INSERT INTO listas SET id_vendor = :id_vendor, total = :total, data_lista = :data_lista";
        // $sql = $this->db->prepare($sql);
		// $sql->bindValue(":id_vendor", $id_vendor);
		// $sql->bindValue(":total", $totalnf);
		// $sql->bindValue(":data_lista", $data_lista);
		// $sql->execute();

		// $id_lista = $this->db->lastInsertId(); 

		// foreach($produtos as $id_prod => $quant_prod) {
        //     $sql ="SELECT preco FROM produtos WHERE id_prod = :id_prod";
		// 	$sql = $this->db->prepare($sql);
		// 	$sql->bindValue(":id_prod", $id_prod);
		// 	$sql->execute();

		// 	if($sql->rowCount() > 0) {
		// 		$row   = $sql->fetch();
		// 		$valor = $row['preco'];

        //         $sqle ="INSERT INTO list_prods SET id_list = :id_list, id_produto = :id_produto, quant = :quant, valor = :valor";
		// 		$sqle = $this->db->prepare($sqle);
		// 		$sqle->bindValue(":id_list", $id_lista);
		// 		$sqle->bindValue(":id_produto", $id_prod);
		// 		$sqle->bindValue(":quant", $quant_prod);
		// 		$sqle->bindValue(":valor", $valor);
		// 		$sqle->execute();

		// 		$sqlp = $this->db->prepare("UPDATE estoque SET qtd = qtd - $quant_prod WHERE id_produto = :id_produto");
		// 		$sqlp->bindValue(":id_produto", $id_prod);
		// 		$sqlp->execute();
		// 	}
		// }

        //     if($sql->rowCount() > 0) {
        //         flash_messages::msgSuccessCreate("Lançamento Efetuado com Sucesso.");
        //     } else {
        //         flash_messages::msgDangerCreate("Erro ao Efetuar Lançamento");
        //     }
	
	}

	public function createListVenda($total, $data_venda, $produtos, $taxa, $obs, $id_vendor, $parceiro, $discount, $client, $dinheiro, $credito, $credito2,
	$credito_parc, $credito_parc2, $debito, $debito2, $debito_parc, $debito_parc2, $pix, $picpay, $credl,
	$parccredl, $jurocl, $pagamento)
    {
		$forma_pagamento = implode(',',$pagamento);
		$edit = 'NO';

        $sql = "INSERT INTO listas SET vendor = :id_vendor, parceiro = :parceiro, cliente = :cli, total = :total,
		tax = :taxa, total_tax = :total_tax, obs = :obs, data_lista = :dtv, editada = :edit";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id_vendor", $id_vendor);
		$sql->bindValue(":parceiro", $parceiro);
		$sql->bindValue(":cli", $client);
		$sql->bindValue(":total", $total);
		$sql->bindValue(":taxa", $taxa);
		$sql->bindValue(":total_tax", $total);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":dtv", $data_venda);
		$sql->bindValue(":edit", $edit);
		$sql->execute();

		$id_lista = $this->db->lastInsertId();
		
		// salva os dados financeiros da venda
		$sqlf = "INSERT INTO venda_forma_pagamento SET id_venda = :id_venda, f_dinheiro = :fd, f_cartao_c_loja_hist = :fc, f_cartao_c2_loja_hist = :fc2, f_cartao_d_loja_hist = :fcd, f_cartao_d2_loja_hist = :fcd2,
		f_cartao_c_parc_hist = :cartao_c_parc,f_cartao_c2_parc_hist = :cartao_c2_parc, f_cartao_c_parc = :ccp,f_cartao_c2_parc = :ccp2,
		f_cartao_d_parc_hist = :cartao_d_parc, f_cartao_d2_parc_hist = :cartao_d2_parc, f_cartao_d_parc = :cdp, f_cartao_d2_parc = :cdp2,
		f_pix = :fpix, f_picpay_hist = :fpicpay, crediario_loja = :cred_l, parcela_cred_loja = :parc_cred_l,
		juros_cred_venda = :juro_cred_l, desconto = :disc, pay = :pay";
        $sqlf = $this->db->prepare($sqlf);
		$sqlf->bindValue(":id_venda", $id_lista);
		$sqlf->bindValue(":fd", $dinheiro);
		$sqlf->bindValue(":fc", $credito);
		$sqlf->bindValue(":fc2", $credito2);
		$sqlf->bindValue(":cartao_c_parc", $credito_parc);
		$sqlf->bindValue(":cartao_c2_parc", $credito_parc2);
		$sqlf->bindValue(":ccp", $credito_parc);
		$sqlf->bindValue(":ccp2", $credito_parc2);
		$sqlf->bindValue(":fcd", $debito);
		$sqlf->bindValue(":fcd2", $debito2);
		$sqlf->bindValue(":cartao_d_parc", $debito_parc);
		$sqlf->bindValue(":cartao_d2_parc", $debito_parc2);
		$sqlf->bindValue(":cdp", $debito_parc);
		$sqlf->bindValue(":cdp2", $debito_parc2);
		$sqlf->bindValue(":fpix", $pix);
		$sqlf->bindValue(":fpicpay", $picpay);
		$sqlf->bindValue(":cred_l", $credl);
		$sqlf->bindValue(":parc_cred_l", $parccredl);
		$sqlf->bindValue(":juro_cred_l", $jurocl);
		$sqlf->bindValue(":disc", $discount);
		$sqlf->bindValue(":pay", $forma_pagamento);
		$sqlf->execute();

		foreach($produtos as $id_prod => $quant_prod) {
			
            $sql ="SELECT id_prod, preco, novo_cod, cost FROM produtos WHERE id_prod = :id_prod";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_prod", $id_prod);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$row   = $sql->fetch();
				$valor = $row['preco'];

                $sqle ="INSERT INTO list_prods SET id_list = :id_list, id_produto = :id_produto, quant = :quant, valor = :valor, valor_vendido = :valor_vendido, custo = :custo, tax_l = :txl, total_tx_l = :ttx, date_list_prods = :dtlp";
				$sqle = $this->db->prepare($sqle);
				$sqle->bindValue(":id_list", $id_lista);
				$sqle->bindValue(":id_produto", $row['id_prod']);
				$sqle->bindValue(":quant", $quant_prod['qtd']);
				$sqle->bindValue(":valor", $valor);
				$sqle->bindValue(":valor_vendido", $valor - $discount);
				$sqle->bindValue(":custo", $row['cost']);
				$sqle->bindValue(":txl", $taxa);
				$sqle->bindValue(":ttx", $total);
				$sqle->bindValue(":dtlp",$data_venda);
				$sqle->execute();

				$quant = $quant_prod['qtd'];
				$sqlp = $this->db->prepare("UPDATE estoque SET qtd = qtd - $quant WHERE id_produto = :id_produto");
				$sqlp->bindValue(":id_produto", $row['id_prod']);
				$sqlp->execute();
			}
		}
		if ($sqlp->rowCount() > 0) {
			$mesAtual = date('m');
			$sqlr ="INSERT INTO receita SET id_cat = 5, id_user = 1, id_venda = :idv, descricao = 'Vendas', valor = :v,
				data_d = :dt, conta = 'Conta Inicial', mesid = :mid";
			$sqlr = $this->db->prepare($sqlr);
			$sqlr->bindValue(":idv", $id_lista);
			$sqlr->bindValue(":v", $total);
			$sqlr->bindValue(":dt", $data_venda);
			$sqlr->bindValue(":mid", $mesAtual);
			$sqlr->execute();
		}

		if ($sqlr->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Venda feita com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao realizar venda!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		}
	
	}

	public function updateListVenda($total, $obs, $id_vendor, $parceiro, $cartao_cp, $cartao_cp2, $taxa_cp, $cartao_dp, $cartao_dp2, $taxa_dp,
	$dinheiro, $cartao_cl, $cartao_cl2, $taxa_cl, $taxa_cl2, $cartao_dl, $cartao_dl2, $taxa_dl, $taxa_dl2, $pix, $picpay, $taxa_pic, $desconto, $id_venda, $pagamento)
    {
		$forma_pagamento = implode(',',$pagamento);
		$edit = 'YES';
		//caluco cartao de credito parceiro
		// $txexcp = explode('-', $taxa_cp);
 
		// $cartao_cp_t = floatval($cartao_cp);
  		// $tax_cp = floatval($txexcp[0]);
  		// $tcp = (($tax_cp/100)*$cartao_cp_t);
 		// $cartao_cp_tax = $cartao_cp_t + $tcp;

		// //calculo cartao de debito parceiro
		// $txexdlp = explode('-', $taxa_dp);

		// $cartao_dp_t = floatval($cartao_dp);
  		// $tax_dp = floatval($txexdlp[0]);
  		// $tdp = (($tax_dp/100)*$cartao_dp_t);
 		// $cartao_dp_tax = $cartao_dp_t + $tdp;

		 $txexcl = [];
		 $txexdl = [];

		 $txexcl2 = [];
		 $txexdl2 = [];

		// calculo cartao credito loja
		if($taxa_cl !== '0') {
			$txexcl = explode('-', $taxa_cl);

			$cartao_cl_t = floatval($cartao_cl);
			$tax_cl = floatval($txexcl[1]);
			$tcl = (($tax_cl/100)*$cartao_cl_t);
			$cartao_cl_tax = $cartao_cl_t - $tcl; 
		} else {
			$txexcl = [0 => '', 1 => '0.00', 2 => ''];
			$tax_cl = '0.00';
			$cartao_cl_tax = '0.00';
		}

		// calculo cartao credito loja 2 
		if($taxa_cl2 !== '0') {
			$txexcl2 = explode('-', $taxa_cl2);

			$cartao_cl2_t = floatval($cartao_cl2);
			$tax_cl2 = floatval($txexcl2[1]);
			$tcl2 = (($tax_cl2/100)*$cartao_cl2_t);
			$cartao_cl2_tax = $cartao_cl2_t - $tcl2; 
		} else {
			$txexcl2 = [0 => '', 1 => '0.00', 2 => ''];
			$tax_cl2 = '0.00';
			$cartao_cl2_tax = '0.00';
		}

		
		
		// calculo cartao debito loja
		if($taxa_dl !== '0') {
			$txexdl = explode('-', $taxa_dl);

			$cartao_dl_t = floatval($cartao_dl);
			$tax_dl = floatval($txexdl[0]);
			$tdl = (($tax_dl/100)*$cartao_dl_t);
			$cartao_dl_tax = $cartao_dl_t - $tdl;
		} else {
			$txexdl = [0 => '0.00', 1 => '', 2 => ''];
			$tax_dl = '0.00';
			$cartao_dl_tax = '0.00';
		}

		// calculo cartao debito loja 2
		if($taxa_dl2 !== '0') {
			$txexdl2 = explode('-', $taxa_dl2);

			$cartao_dl2_t = floatval($cartao_dl2);
			$tax_dl2 = floatval($txexdl2[0]);
			$tdl2 = (($tax_dl2/100)*$cartao_dl2_t);
			$cartao_dl2_tax = $cartao_dl2_t - $tdl2;
		} else {
			$txexdl2 = [0 => '0.00', 1 => '', 2 => ''];
			$tax_dl2 = '0.00';
			$cartao_dl2_tax = '0.00';
		}
		 
		// calculo picpay loja

		$txexpic = explode('-', $taxa_pic);
	
		$picpay_t = floatval($picpay);
		$tax_pic = floatval($txexpic[0]);
		$tpic = (($tax_pic/100)*$picpay_t);
		$picpay_tax_loja = $picpay_t - $tpic;

		$totaldetaxa = $tax_pic + $tax_dl + $tax_dl2 + $tax_cl + $tax_cl2;   

		// calculo do total   
		$total = $cartao_cp + $cartao_cp2 + $cartao_dp + $cartao_dp2 + $cartao_cl + $cartao_cl2 + $cartao_dl + $cartao_dl2 + $pix + $picpay + $dinheiro;
		$total_tax = $cartao_cp + $cartao_cp2 + $cartao_dp + $cartao_dp2 +  $cartao_cl_tax + $cartao_cl2_tax +  $cartao_dl_tax + $cartao_dl2_tax + $pix + $picpay_tax_loja + $dinheiro; 

		//$forma_pagamento = implode(',',$pagamento);

        $sql = "UPDATE listas SET vendor = :id_vendor, parceiro = :parceiro, total = :total, total_tax = :total_tax,
		obs = :obs, f_dinheiro = :fd, f_cartao_c = :fc, f_cartao_c2 = :fc2, taxa_c_loja = :txcl, taxa_c2_loja = :txcl2,
		parcela_c_loja = :parcelacl,  parcela_c2_loja = :parcelacl2, brand_c_loja = :brandcl, brand_c2_loja = :brandcl2,
		f_cartao_d = :fdl, f_cartao_d2 = :fdl2, taxa_d_loja = :txdl, taxa_d2_loja = :txdl2, brand_d_loja = :branddl, brand_d2_loja = :branddl2,
		f_cartao_c_parc = :cartao_c_parc, f_cartao_c2_parc = :cartao_c_parc2, 
		f_cartao_d_parc = :cartao_d_parc, f_cartao_d2_parc = :cartao_d_parc2, f_pix = :pix, f_pic_pay = :fpic, taxa_pic = :txpic, desconto = :disc, pay = :pay, edited = :edit
		  WHERE id_lista = :id_lista";
        $sql = $this->db->prepare($sql);
		$sql->bindValue(":id_vendor", $id_vendor);
		$sql->bindValue(":parceiro", $parceiro);
		$sql->bindValue(":total", $total);
		$sql->bindValue(":total_tax", $total_tax);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":fd", $dinheiro);
		$sql->bindValue(":fc", $cartao_cl_tax);
		$sql->bindValue(":fc2", $cartao_cl2_tax);
		$sql->bindValue(":txcl", $txexcl[1]);
		$sql->bindValue(":txcl2", $txexcl2[1]);
		$sql->bindValue(":parcelacl", $txexcl[0]);
		$sql->bindValue(":parcelacl2", $txexcl2[0]);
		$sql->bindValue(":brandcl", $txexcl[2]);
		$sql->bindValue(":brandcl2", $txexcl2[2]);
		$sql->bindValue(":fdl", $cartao_dl_tax);
		$sql->bindValue(":fdl2", $cartao_dl2_tax);
		$sql->bindValue(":txdl", $txexdl[0]);
		$sql->bindValue(":txdl2", $txexdl2[0]);
		$sql->bindValue(":branddl", $txexdl[1]);
		$sql->bindValue(":branddl2", $txexdl2[1]);
		$sql->bindValue(":cartao_c_parc", $cartao_cp);
		$sql->bindValue(":cartao_c_parc2", $cartao_cp2);
		//$sql->bindValue(":txpc", $taxa_cp);
		$sql->bindValue(":cartao_d_parc", $cartao_dp);
		$sql->bindValue(":cartao_d_parc2", $cartao_dp2);
		//$sql->bindValue(":txpd", $cartao_dp_tax);
		$sql->bindValue(":pix", $pix);
		$sql->bindValue(":fpic", $picpay_tax_loja);
		$sql->bindValue(":txpic", $txexpic[0]);
		$sql->bindValue(":disc", $desconto);
		$sql->bindValue(":pay", $forma_pagamento);
		$sql->bindValue(":edit", $edit);
		//$sql->bindValue(":status_venda", 'CLOSE');
		$sql->bindValue(":id_lista", $id_venda);
		$sql->execute();

		$sqle ="UPDATE list_prods SET valor_vendido = :ves, total_tx_l = :ttles WHERE id_list = :idves";
		$sqle = $this->db->prepare($sqle);
		$sqle->bindValue(":ves", $total_tax);
		$sqle->bindValue(":ttles", $total_tax);
		$sqle->bindValue(":idves", $id_venda);
		$sqle->execute();
		
		$sqlr ="UPDATE receita SET valor = :v WHERE id_venda = :idv";
		$sqlr = $this->db->prepare($sqlr);
		$sqlr->bindValue(":v", $total_tax);
		$sqlr->bindValue(":idv", $id_venda);
		$sqlr->execute();
		

		if ($sqlr->rowCount() > 0) {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'success', 
                                  title: 'Venda editada com Sucesso!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
		} else {
			$_SESSION['msg'] = "Swal.fire({
                                  position: 'center',
                                  type: 'error',
                                  title: 'Erro ao editar venda!',
                                  showConfirmButton: false,
                                  timer: 2500
                                })";
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

	public function getAllRelDia($data)
	{
		$array = array(); 

			$sql ="SELECT * FROM `listas` WHERE data_lista = :data";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':data',$data);
			$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
		
	}

	public function getAllCaixaRelDia($data)
	{
		$array = array();

			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax FROM listas WHERE data_lista = :data";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':data',$data);
			$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
		
	}

	public function getAllMesRel($data_inicial, $data_final)
	{
		$array = array();

			$sql ="SELECT * FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
		
	}

	public function getAllCaixaMesRel($data_inicial, $data_final)
	{
		$array = array();

			$sql ="SELECT sum(total) as total, sum(total_tax) as total_tax FROM listas WHERE data_lista BETWEEN '$data_inicial' AND '$data_final'";
			$sql = $this->db->prepare($sql);
			$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
		
	}
 
} 