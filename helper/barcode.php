<html>
<head>
<link rel="icon" href="http://localhost/financeiro/assets/img/logo_mini.jpg" type="image/gif" sizes="16x16">
<style>
p.inline {display: inline-block;}
span { font-size: 13px;text-transform: capitalize;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barcode128.php';
		$product = $_POST['product'];
		$product_id = $_POST['product_id'];
		$rate = 'R$ '.number_format($_POST['rate'],2,",",".");

		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<p class='inline text-capitalize'><span ><b>$product". " - $rate</b></span>".bar128(stripcslashes($_POST['product_id']))."</p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>