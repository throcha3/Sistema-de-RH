<?php
	include_once '../modal/Enfermeiro.class.php';
	$enfermeiro = new Enfermeiro;

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$nome_enferm      = (isset($_POST['txt_nome']))             ? $_POST['txt_nome']        : '';
	$sobrenome_enferm      = (isset($_POST['txt_sobrenome']))             ? $_POST['txt_sobrenome']        : '';
	$coren      = (isset($_POST['txt_coren']))             ? $_POST['txt_coren']        : '';
	$id_campus      = (int)(isset($_POST['slc_campus']))             ? (int)$_POST['slc_campus']        : 0;
	$op        = (isset($_POST['op']))                   ? $_POST['op']            : '';

	$params = [
		'nome_enferm' => $nome_enferm,
		'sobrenome_enferm' => $sobrenome_enferm,
		'coren_enferm'       => $coren,
		'id_campus'   => $id_campus
	];

	switch ($op) {
    case "INS":
        if ($id = $enfermeiro->insert($params)){
			header("Location: ../view/cadEnfermeiroView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadEnfermeiroView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $enfermeiro->update($params, $id)){
			header("Location: ../view/lstEnfermeiro.php?result=8");
			die();
		}else {
			header("Location: ../view/lstEnfermeiro.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $enfermeiro->desAtivar($id,'1')){
			header("Location: ../view/lstEnfermeiro.php?result=15");
			die();
		}else {
			header("Location: ../view/lstEnfermeiro.php?result=14");
			die();
		}
        break;
    case "ATI":
        if ($id = $enfermeiro->desAtivar($id,'0')){
			header("Location: ../view/lstEnfermeiro.php?result=15");
			die();
		}else {
			header("Location: ../view/lstEnfermeiro.php?result=14");
			die();
		}
        break;
	}


?>
