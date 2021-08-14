<!-- <?php foreach($list_reco as $item) : ?>

<?php $parc = $item['qtd_parc'] ?>
<?php $valor = $item['valor'] ?>
<?php $data_atual = $item['data_parc'] ?>

<?php for($i = 0; $i <= $parc; $i++){
	$data = date('Y-m-d', strtotime('+ 1 month', strtotime($data_atual)));

	$data_atual = $data;
		echo "<button class='btn btn-warning btn-xs' style='margin-left:3px;margin-top:40px'>".
     	date('d/m/Y', strtotime($data)).
     	"</button>";
} ?>
<?php endforeach ?> -->

<?php foreach($list_reco as $item) : ?>
<?php $tj = (($item['juro']/100)*$item['valor']) ?>
<?php $total_juros = $item['valor'] + $tj ?>

<?php 
echo "Valor do produto: R$ ".$total_juros."<br/>";
?>
<?php endforeach ?>