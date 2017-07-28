<?php
	include_once '../helpers.php';
  	include_once '../modal/TipoAfastamento.class.php';
	$afastamento = new tipoAfastamento;

	$id             = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$dsc_afasta     = (isset($_POST['txt_tipo_afastamento']))           ? $_POST['txt_tipo_afastamento']    :''; 
	$op             = (isset($_POST['op']))                   ? $_POST['op']            : '';
	$params = [
		'dsc_tipo_afasta'    => $dsc_afasta,
	];

	switch ($op) {
    case "INS":
        if ($id = $afastamento->insert($params)){
			header("Location: ../view/lstTipoAfastamento.php?result=1");
			die();
		}else {
			header("Location: ../view/lstTipoAfastamento.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $afastamento->update($params, $id)){
			header("Location: ../view/lstTipoAfastamento.php?&result=8");
			die();
		}else {
			header("Location: ../view/lstTipoAfastamento.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $afastamento->delete($id)){
			header("Location: ../view/lstTipoAfastamento.php?result=10");
			die();
		}else {
			header("Location: ../view/lstTipoAfastamento.php?result=11");
			die();
		}
        break;
	}


?>
