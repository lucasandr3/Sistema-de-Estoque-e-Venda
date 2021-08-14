<?php

  $p = floatval($_POST['produto']);
  $pct = floatval($_POST['pct']);
  $imp = (($pct/100)*$p);
  $pimp = $p - $imp;

  echo json_encode("<div class='col-md-6'><h4>Valor do produto</h4>".
  				   "Valor: R$ ".number_format($p,2,',','.')."<br/>"."Taxa de imposto: ".$pct."%</div>".
				   "<div class='col-md-6'><h4>Resultado do Calculo</h4>
				   Imposto: R$ ".number_format($imp,2,',','.')."<br/>"."Produto: R$ ".number_format($pimp,2,',','.')."<br/></div>");