<?php

include_once '../modal/Especialidade.class.php';

$especialidade = new Especialidade;

$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
$dsc_especialidade  = (isset($_REQUEST['txt_especialidade']))   ? $_REQUEST['txt_especialidade']     : '';
$op                 = (isset($_POST['op']))                     ? $_POST['op']                       : '';

$params = [
	'dsc_especialidade' => $dsc_especialidade
];

	switch ($op) {
    case "INS":
        if ($id = $especialidade->insert($params)){
			header("Location: ../view/cadEspecialidadeView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadEspecialidadeView.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $especialidade->update($params, $id)){
			header("Location: ../view/lstEspecialidade.php?result=8");
			die();
		}else {
			header("Location: ../view/lstEspecialidade.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $especialidade->delete($id)){
			header("Location: ../view/lstEspecialidade.php?result=10");
			die();
		}else {
			header("Location: ../view/lstEspecialidade.php?result=11");
			die();
		}
        break;
	}