<?php

include_once '../modal/Estado.class.php';

$estado = new Estado;

$id           = (int)(isset($_REQUEST['id']))              ? (int)$_REQUEST['id']             : 0;
$nome_uf  = (isset($_REQUEST['nome_uf']))   ? $_REQUEST['nome_uf']     : '';
$cod_uf       = (isset($_REQUEST['cod_uf']))    ? $_REQUEST['cod_uf']      : '';
$op           = (isset($_POST['op']))               ? $_POST['op']                 : '';

$params = [
	'nome_uf' => $nome_uf,
	'cod_uf'  => $cod_uf,
];

	switch ($op) {
    case "INS":
        if ($id = $estado->insert($params)){
			header("Location: ../view/cadEstadoView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadEstadoView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $estado->update($params, $id)){
			header("Location: ../view/lstEstado.php?result=8");
			die();
		}else {
			header("Location: ../view/lstEstado.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $estado->delete($id)){
			header("Location: ../view/lstEstado.php?result=10");
			die();
		}else {
			header("Location: ../view/lstEstado.php?result=11");
			die();
		}
        break;
	}