<?php
	include_once '../modal/Questionario.class.php';
	$questionario = new questionario;

	$problema    = (isset($_POST['problema']))    ? $_POST['problema']       : 0;
	$funcionario    = (isset($_POST['funcionario']))    ? $_POST['funcionario']       : 0;
	$enfermeiro    = (isset($_POST['enfermeiro']))    ? $_POST['enfermeiro']       : 0;
	$questao1    = (isset($_POST['questao1']))    ? $_POST['questao1']       : 0;
	$questao2    = (isset($_POST['questao2']))    ? $_POST['questao2']       : 0;
	$questao3    = (isset($_POST['questao3']))    ? $_POST['questao3']       : 0;
	$questao4    = (isset($_POST['questao4']))    ? $_POST['questao4']       : 0;
	$questao5    = (isset($_POST['questao5']))    ? $_POST['questao5']       : 0;
	$questao6    = (isset($_POST['questao6']))    ? $_POST['questao6']       : 0;

	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); 
	date_default_timezone_set( 'America/Sao_Paulo' );
	$data = date("d/m/Y");
	$hora = date('H:i:s');

	$params = [
		'problema'  => $problema,
		'funcionario'  => $funcionario,
		'enfermeiro'  => $enfermeiro,
		'questao1'  => $questao1,
		'questao2'  => $questao2,
		'questao3'  => $questao3,
		'questao4'  => $questao4,
		'questao5'  => $questao5,
		'questao6'  => $questao6,
		'data'  => $data,
		'hora'  => $hora
	];

$op='INS';// pois esta tela só insere

	switch ($op) {
    case "INS":
        if ($id = $questionario->insert($params)){
			//echo "Inserido com sucesso!";
			header("Location: ../view/cadQuestionarioView.php?result=1");
			die();
		}else {
			header("Location: ../view/cadQuestionarioView.php?result=0");
			die();
		}
	}


?>
