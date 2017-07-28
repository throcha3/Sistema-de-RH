<?php
	include_once '../modal/Presenteismo.class.php';
	include_once '../helpers.php';
	$presenteismo = new Presenteismo;
	$formatoData = 'd/m/Y';

	$id             = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$id_funcionario = (isset($_POST['slc_funcionario']))      ? $_POST['slc_funcionario']        : 0;
	$id_enfermeiro  = (isset($_POST['slc_enfermeiro']))       ? $_POST['slc_enfermeiro']       : 0;
	$cad_problema   = (isset($_POST['txt_problema']))         ? $_POST['txt_problema']       : '';
	$data_presenteismo = (isset($_POST['date_nasc2'])) ? $_POST['date_nasc2']        : '';
	$cad_observacao = (isset($_POST['txt_obs']))              ? $_POST['txt_obs']      : '';
	$op             = (isset($_POST['op']))                   ? $_POST['op']            : '';
	$params = [
		'id_funcionario'    => $id_funcionario,
		'id_enfermeiro'     => $id_enfermeiro,
		'cad_problema'      => $cad_problema,
		'data_presenteismo' => converteDateTime($formatoData, $data_presenteismo),
		'cad_observacao'    => $cad_observacao
	];

	switch ($op) {
    case "INS":
        if ($id = $presenteismo->insert($params)){
			header("Location: ../view/cadPresenteismoView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadPresenteismoView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $presenteismo->update($params, $id)){
			header("Location: ../view/lstPresenteismo.php?&result=8");
			die();
		}else {
			header("Location: ../view/lstPresenteismo.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $presenteismo->delete($id)){
			header("Location: ../view/lstPresenteismo.php?result=10");
			die();
		}else {
			header("Location: ../view/lstPresenteismo.php?result=11");
			die();
		}
        break;
	}


?>
