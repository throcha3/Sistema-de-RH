<?php
	include_once '../modal/Medico.class.php';
	$medico = new Medico;

	$id               = (int)(isset($_POST['id']))            ? (int)$_POST['id']             : 0;
	$primeiro_nome    = (isset($_POST['txt_primeiro_nome']))  ? $_POST['txt_primeiro_nome']   : '';
	$sobrenome_medico = (isset($_POST['txt_segundo_nome']))   ? $_POST['txt_segundo_nome']    : '';
	$crm              = (isset($_POST['txt_crm']))            ? $_POST['txt_crm']             : '';
	$id_cidade        = (isset($_POST['slc_cidade']))         ? $_POST['slc_cidade']          : 0;
	$id_estado        = (isset($_POST['slc_estado']))         ? $_POST['slc_estado']          : 0;
	$id_espec         = (isset($_POST['slc_especialidade']))  ? $_POST['slc_especialidade']   : 0;
	$inativo        = (isset($_POST['inativo']))          ? $_POST['inativo']          		  : '0';
	$op               = (isset($_POST['op']))                 ? $_POST['op']                  : '';

	$params = [
		'nome_medico'       => $primeiro_nome,
		'sobrenome_medico'  => $sobrenome_medico,
		'cad_crm'           => $crm,
		'id_cidade_atuacao' => (int)$id_cidade,
		'id_estado_atuacao' => (int)$id_estado,
		'id_especialidade'  => (int)$id_espec,
		'inativo'         => $inativo
	];

	//echo "<pre>";
	//var_dump($params);
	//echo "<br />";
	//var_dump($id);
	// exit();

	switch ($op) {
    case "INS":
        if ($id = $medico->insert($params)){
			header("Location: ../view/cadMedicoView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadMedicoView.php?result=0");
			die();
		}
        break;

    case "ALT":
        if ($id = $medico->update($params, $id)){
			header("Location: ../view/lstMedico.php?&result=8");
			die();
		}

		else {
			header("Location: ../view/lstMedico.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $medico->desAtivar($id,'1')){
			header("Location: ../view/lstMedico.php?result=15");
			die();
		}else {
			header("Location: ../view/lstMedico.php?result=14");
			die();
		}
        break;
    case "ATI":
        if ($id = $medico->desAtivar($id,'0')){
			header("Location: ../view/lstMedico.php?result=15");
			die();
		}else {
			header("Location: ../view/lstMedico.php?result=14");
			die();
		}
        break;
	}


?>
