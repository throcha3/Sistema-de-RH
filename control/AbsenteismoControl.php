<?php
include_once '../modal/Absenteismo.class.php';
include_once '../helpers.php';

$absenteismo = new Absenteismo;

$op               = (isset($_REQUEST['op']))                    ? $_REQUEST['op']                  :'';
$id               = (int)(isset($_POST['id']))                  ? (int)$_POST['id']                :0;
$id_funcionario   = (int)(isset($_REQUEST['txt_funcionario']))  ? (int)$_REQUEST['txt_funcionario']:0;
$crm              = (int)(isset($_REQUEST['txt_crm']))          ? (int)$_REQUEST['txt_crm']        :0;
$cid              = (int)(isset($_REQUEST['slc_cid']))          ? (int)$_REQUEST['slc_cid']        :0;
$tipo_abs         = (isset($_REQUEST['txt_tipo_abs']))          ? $_REQUEST['txt_tipo_abs']        :'';
$tipo_doc         = (isset($_REQUEST['txt_tipo_doc']))          ? $_REQUEST['txt_tipo_doc']        :'';
$tipo_afastamento = (isset($_REQUEST['txt_tipo_afastamento']))  ? $_REQUEST['txt_tipo_afastamento']:'';
$cad_observacao   = (isset($_REQUEST['cad_observacao']))        ? $_REQUEST['cad_observacao']      :'';

if ($op == 'DEL'){
	if ($id = $absenteismo->delete($id)){
		header("Location: ../view/lstAbsenteismo.php?result=10");
		$absenteismo = NULL;
		die();
	}
}

// UPLOAD DO ARQUIVO

	if ($tipo_doc == 'atestado') {
		$pasta_uploads = "../uploads/atestados/";
		$formatoData = 'd/m/Y';
		$data_inicio = (isset($_REQUEST['txt_data_i']))     ? $_REQUEST['txt_data_i']     :'';
		$data_final  = (isset($_REQUEST['txt_data_f']))     ? $_REQUEST['txt_data_f']     :'';
	} else {
		$pasta_uploads = "../uploads/declaracoes/";
		$formatoData = 'd/m/Y H:i';
		$hora_inicio = (isset($_REQUEST['txt_hora_i']))     ? $_REQUEST['txt_hora_i']     :'';
		$hora_final  = (isset($_REQUEST['txt_hora_f']))     ? $_REQUEST['txt_hora_f']     :'';
		$data = (isset($_REQUEST['txt_data_ini']))   ? $_REQUEST['txt_data_ini']     :'';
		$data_inicio = $data. ' ' .$hora_inicio;
		$data_final  = $data. ' ' .$hora_final;
	}

if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
		$parametros =[
		'id_funcionario'   => $id_funcionario,
		'id_medico'        => $crm,
		'id_cid'           => $cid,
		'tipo_abs'         => $tipo_abs,
		'tipo_doc'         => $tipo_doc,
		'data_inicio'      => converteDateTime($formatoData, $data_inicio),
		'data_final'       => converteDateTime($formatoData, $data_final),
		'tipo_afastamento' => $tipo_afastamento,
		'cad_observacao'   => $cad_observacao,
	];

	if ($id = $absenteismo->updateSemAnexo($parametros, $id)){
			header("Location: ../view/lstAbsenteismo.php?result=8");
			die();
			$absenteismo = NULL;
		}else {
			header("Location: ../view/lstAbsenteismo.php?result=16");
			die();
			$absenteismo = NULL;
		}
}

	$tamanhoArq  =  $_FILES["fileToUpload"]["size"];
	$nomeArq     =  $_FILES["fileToUpload"]["name"];
	$target_file =  $pasta_uploads . basename($nomeArq);
	$ext_arq     =  pathinfo($target_file,PATHINFO_EXTENSION);
	$forjaNome   =  round(microtime(true)) . '.' .$ext_arq;
	$arqFinal    =  $pasta_uploads . $forjaNome;
	$uploadOk    =  1;



	//Verifica o tamanho do arquivo em bytes (setei pra 5mb)
	if ($tamanhoArq > 5000000) {
		header("Location: ../view/cadAbsenteismoView.php?result=2");
		die();
	    $uploadOk = 0;
	}
	//Verifica se já houve um upload com este nome
	if (file_exists($target_file)) {
		header("Location: ../view/cadAbsenteismoView.php?result=3");
    	$uploadOk = 0;
	}
	//Verifica a extensão do arquivo
	if($ext_arq != "jpg" && $ext_arq != "png" && $ext_arq != "jpeg" && $ext_arq != "pdf" ) {
		if ($op === 'INS'){
		header("Location: ../view/cadAbsenteismoView.php?result=4");
		}else {
		header("Location: ../view/altAbsenteismoView.php?id=".$id."&result=4");
		}
		die();
	    $uploadOk = 0;
	}

	$params =[
		'id_funcionario'   => $id_funcionario,
		'id_medico'        => $crm,
		'id_cid'           => $cid,
		'tipo_abs'         => $tipo_abs,
		'tipo_doc'         => $tipo_doc,
		'data_inicio'      => converteDateTime($formatoData, $data_inicio),
		'data_final'       => converteDateTime($formatoData, $data_final),
		'tipo_afastamento' => $tipo_afastamento,
		'cad_observacao'   => $cad_observacao,
		'arquivo_upload'   => $arqFinal,
		'tamanho_upload'   => $tamanhoArq,
		'arquivo_nome'     => $nomeArq,
		'data_upload'      => date('Y-m-d H:i:s')
	];

	switch ($op) {
    case "INS":
        if ($uploadOk == 0) {
        	echo "houve um erro com o upload do arquivo";
        }

        if ((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $arqFinal)) && ($id = $absenteismo->insert($params))){
			{
			header("Location: ../view/cadAbsenteismoView.php?result=1");
			die();
			}
		}else {
			echo "<pre>";
			var_dump($id);
			exit();
			header("Location: ../view/cadAbsenteismoView.php?result=0");
			die();
		}

        break;
    case "ALT":
        if ($uploadOk == 0) {
        	echo "houve um erro com o upload do arquivo";
        }

        if ((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $arqFinal)) && ($id = $absenteismo->update($params, $id))){
			header("Location: ../view/lstAbsenteismo.php?result=8");
			die();
			$absenteismo = NULL;
		}else {
			header("Location: ../view/lstAbsenteismo.php?result=9");
			die();
			$absenteismo = NULL;
		}
        break;
    }

?>
