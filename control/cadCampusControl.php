<?php
	include_once '../modal/Campus.class.php';
	$campus = new Campus;

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']    : 0;
	$dsc_campus   = (isset($_POST['txt_campus']))   ? $_POST['txt_campus']      : '';
	$id_cidade    = (isset($_POST['slc_cidade']))    ? $_POST['slc_cidade']       : 0;
	$id_estado    = (isset($_POST['slc_estado']))    ? $_POST['slc_estado']       : '';
	$op           = (isset($_POST['op']))           ? $_POST['op']              : '';
	$params = [
		'dsc_campus' => $dsc_campus,
		'id_cidade'  => $id_cidade,
		'id_estado'  => $id_estado,
	];

	switch ($op) {
    case "INS":
        if ($id = $campus->insert($params)){
			//echo "Inserido com sucesso!";
			header("Location: ../view/cadCampusView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadCampusView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $campus->update($params, $id)){
			header("Location: ../view/lstCampus.php?result=8");
			die();
		}else {
			header("Location: ../view/lstCampus.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $campus->delete($id)){
			header("Location: ../view/lstCampus.php?result=10");
			die();
		}else {
			header("Location: ../view/lstCampus.php?result=11");
			die();
		}
        break;
	}


?>
