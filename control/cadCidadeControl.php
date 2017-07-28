<?php

include_once '../modal/Cidade.class.php';

$cidade = new Cidade;

$id           = (int)(isset($_REQUEST['id']))              ? (int)$_REQUEST['id']             : 0;
$nome_cidade  = (isset($_REQUEST['nome_cidade']))   ? $_REQUEST['nome_cidade']     : '';
$estado       = (isset($_REQUEST['slc_estado']))    ? $_REQUEST['slc_estado']      : '';
$op           = (isset($_POST['op']))               ? $_POST['op']                 : '';

$params = [
	'nome_cidade' => $nome_cidade,
	'cod_uf'      => $estado,
];

	switch ($op) {
    case "INS":
        if ($id = $cidade->insert($params)){
			header("Location: ../view/cadCidadeView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadCidadeView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $cidade->update($params, $id)){
			header("Location: ../view/lstCidade.php?result=8");
			die();
		}else {
			header("Location: ../view/lstCidade.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $cidade->delete($id)){
			header("Location: ../view/lstCidade.php?result=10");
			die();
		}else {
			header("Location: ../view/lstCidade.php?result=11");
			die();
		}
        break;
	}