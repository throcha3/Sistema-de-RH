<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );

include_once ('Banco.php');
include_once ('Cidade.class.php');

$cod_estado = $_GET['cod_estados'];
$cidade = new Cidade;

$listaCidade = $cidade->buscaCidade($cod_estado);


foreach ($listaCidade as $key) {
	echo "<option value='".$key['id_cidade']."'>".$key['nome_cidade']."</option>";

	//Backup ↓
	//echo "<option charset='UTF-8' value='".$key['id_cidade']."'>".trim(utf8_encode($key['nome_cidade']))."</option>";

}
?>