<?php
require 'environment.php';

global $config;
global $db;

$config = date_default_timezone_set('America/Sao_paulo');

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/financeiro/");
	$config['dbname'] = 'financeiro';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'lucas1231';
	$config['charset'] = 'utf8';
} else {
	define("BASE_URL", "https://financeiro1231.000webhostapp.com/");
	$config['dbname'] = 'id9991168_financeiro';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'id9991168_lucas';
	$config['dbpass'] = 'lucas1231';
	$config['charset'] = 'utf8';
}

$config['default_lang'] = 'pt-br';

$db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8;host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>