<?php
date_default_timezone_set('America/Sao_Paulo');

//CONVERTE PARA FORMATO MYSQL DATETIME
function converteDateTime($formato, $data) {
	$dataFormatada = DateTime::createFromFormat($formato, $data);
	return $dataFormatada->format('Y-m-d H:i:s');
	}

//CONVERTE PARA FORMATO MYSQL DATE
function converteDate($data) {
	$dataFormatada = DateTime::createFromFormat('d/m/Y', $data);
	return $dataFormatada->format('Y-m-d');
	}

//CONVERTE DO FORMATO MYSQL PARA O FORMATO DA VIEW SEM HORA
function reverteData($data) {
	$dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $data);
	return $dataFormatada->format('d/m/Y');
}

//CONVERTE DO FORMATO MYSQL PARA O FORMATO DA VIEW COM HORA
function reverteDataHora($data) {
	$dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $data);
	return $dataFormatada->format('d/m/Y H:i');
}

//converte bytes para outras unidades de medidas
function converte_bytes($size, $precision = 2){

 	$base = log($size, 1024);
    $sulfixo = array('', 'Kb', 'Mb', 'Gb', 'Tb');

    return round(pow(1024, $base - floor($base)), $precision) .' '. $sulfixo[floor($base)];
}
?>