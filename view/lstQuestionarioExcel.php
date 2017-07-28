<?php

$pw = (isset($_GET['password'])) ? $_GET['password'] : '';

if($pw == 'rhsys'){
	include_once '../modal/Questionario.class.php';
	$questionario = new Questionario;
	$questionalFind = $questionario->findAll();

	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); 
	date_default_timezone_set( 'America/Sao_Paulo' );
	$today = date("d-m-Y__H:i:s"); 
	// Sat Mar 10 17:16:18 MST 2001
	/*
	* Criando e exportando planilhas do Excel
	* /
	*/
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatorio_'.$today.'_.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table>';

		$html .= '<tr>';
			$html .= '<td><b>ID</b></td>';
			$html .= '<td><b>Problema</b></td>';
			$html .= '<td><b>Nome Funcionario</b></td>';
			$html .= '<td><b>Nome Enfermeiro</b></td>';
			$html .= '<td><b>Pergunta  1</b></td>';
			$html .= '<td><b>Pergunta  2</b></td>';
			$html .= '<td><b>Pergunta  3</b></td>';
			$html .= '<td><b>Pergunta  4</b></td>';
			$html .= '<td><b>Pergunta  5</b></td>';
			$html .= '<td><b>Pergunta  6</b></td>';
			$html .= '<td><b>Data</b></td>';
			$html .= '<td><b>Hora</b></td>';
		$html .= '</tr>';

	foreach ($questionalFind as $row) {

		$html .= '<tr>';
			$html.= "<td>".$row['ID']."</td>";
			$problema = $row['problema'];
			$problema = utf8_decode($problema);
			$html.= "<td>".$problema."</td>";
			$nome_fun = $row['funcionario'];
			$nome_fun = utf8_decode($nome_fun);
			$html.= "<td>".$nome_fun."</td>";
			$nome_enf = $row['enfermeiro'];
			$nome_enf = utf8_decode($nome_enf);
			$html.= "<td>".$nome_enf."</td>";
			$html.= "<td>".$row['questao1']."</td>";
			$html.= "<td>".$row['questao2']."</td>";
			$html.= "<td>".$row['questao3']."</td>";
			$html.= "<td>".$row['questao4']."</td>";
			$html.= "<td>".$row['questao5']."</td>";
			$html.= "<td>".$row['questao6']."</td>";
			$html.= "<td>".$row['data']."</td>";
			$html.= "<td>".$row['hora']."</td>";
		$html .= '</tr>';
	}
	$html .= '</table>';


	// Configurações header para forçar o download
	header ("Expires: Mon, 26 Jul 9999 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel;");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );
	// Envia o conteúdo do arquivo
	echo $html;

	//return "dbcrud.php"; não tem mais pq pois nao quero mais listar na tela essa fita 

} else {
	header('Location: ../view/cadQuestionarioView.php?result=7');
}



