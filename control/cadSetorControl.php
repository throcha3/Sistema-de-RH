<?php
	include_once '../modal/Setor.class.php';
	$setor = new Setor;

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$dsc_setor      = (isset($_POST['txt_setor']))             ? $_POST['txt_setor']        : '';
	$op        = (isset($_POST['op']))                   ? $_POST['op']            : '';
	$params = [
		'dsc_setor' => $dsc_setor
	];

	switch ($op) {
    case "INS":
        if ($id = $setor->insert($params)){
			header("Location: ../view/cadSetorView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadSetorView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $setor->update($params, $id)){
			header("Location: ../view/lstSetor.php?&result=8");
			die();
		}else {
			header("Location: ../view/lstSetor.php?&result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $setor->delete($id)){
			header("Location: ../view/lstSetor.php?result=10");
			die();
		}else {
			header("Location: ../view/lstSetor.php?result=11");
			die();
		}
        break;
	}


?>
