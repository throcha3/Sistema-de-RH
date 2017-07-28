<?php
	include_once '../modal/Cid.class.php';
	$cid = new Cid;

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']      : 0;
	$dsc_cid     = (isset($_POST['txt_dsc_cid']))        ? $_POST['txt_dsc_cid']  : '';
	$cod_cid     = (isset($_POST['txt_cod_cid']))        ? $_POST['txt_cod_cid']  : 0;
	$op           = (isset($_POST['op']))               ? $_POST['op']                 : '';
	$params = [
		'dsc_cid' => $dsc_cid,
		'cod_cid' => $cod_cid,
	];

	switch ($op) {
    case "INS":
        if ($id = $cid->insert($params)){
			header("Location: ../view/cadCidView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadCidView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $cid->update($params, $id)){
			header("Location: ../view/lstCid.php?result=8");
			die();
		}else {
			header("Location: ../view/lstCid.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $cid->delete($id)){
			header("Location: ../view/lstCid.php?result=10");
			die();
		}else {
			header("Location: ../view/lstCid.php?result=11");
			die();
		}
        break;
	}

?>
