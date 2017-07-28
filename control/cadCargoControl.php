<?php
	include_once '../modal/Cargo.class.php';
	$cargo = new Cargo;

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$dsc_cargo      = (isset($_POST['txt_cargo']))             ? $_POST['txt_cargo']        : '';
	$id_setor     = (isset($_POST['slc_setor']))            ? $_POST['slc_setor']       : 0;
	$op        = (isset($_POST['op']))                   ? $_POST['op']            : '';
	$params = [
		'dsc_cargo' => $dsc_cargo,
		'id_setor' => $id_setor,
	];

	switch ($op) {
    case "INS":
        if ($id = $cargo->insert($params)){
			header("Location: ../view/cadCargoView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadCargoView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $cargo->update($params, $id)){
			header("Location: ../view/lstCargo.php?result=1");
			die();
		}else {
			header("Location: ../view/lstCargo.php?result=0");
			die();
		}
        break;
    case "DEL":
        if ($id = $cargo->delete($id)){
			header("Location: ../view/lstCargo.php?result=1");
			die();
		}else {
			header("Location: ../view/lstCargo.php?result=0");
			die();
		}
        break;
	}


?>
