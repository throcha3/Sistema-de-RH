<?php
	include_once '../modal/FuncionarioCrud.php';
	include_once '../helpers.php';
	$funcionarioCrud = new FuncionarioCrud;
	$formatoData = 'd/m/Y'; 

	$id        = (int)(isset($_POST['id']))              ? (int)$_POST['id']             : 0;
	$nome      = (isset($_POST['txt_nome']))             ? $_POST['txt_nome']        : '';
	$sobrenome      = (isset($_POST['txt_sobrenome']))             ? $_POST['txt_sobrenome']        : '';
	$setor     = (isset($_POST['slc_setor']))            ? $_POST['slc_setor']       : 0;
	$cargo     = (isset($_POST['slc_cargo']))            ? $_POST['slc_cargo']       : 0;
	$sexo      = (isset($_POST['slc_sexo']))             ? $_POST['slc_sexo']        : '';
	$dt_nascimento     = (isset($_POST['date_nasc2']))   ? $_POST['date_nasc2']      : '';
	$prontuario= (isset($_POST['txt_pront']))            ? $_POST['txt_pront']       : 0;
	$cpf    = (isset($_POST['txt_cpf']))           ? $_POST['txt_cpf']      : 0;
	$tipo      = (isset($_POST['tipo']))                 ? $_POST['tipo']            : 'v';
	$campus    = (isset($_POST['slc_campus']))           ? $_POST['slc_campus']      : 0;
	$op        = (isset($_POST['op']))                   ? $_POST['op']            : '';
	$params = [
		'nome_funcionario'      => $nome,
		'sobrenome_funcionario' => $sobrenome,
		'id_setor' => $setor,
		'id_cargo' => $cargo,
		'cad_sexo' => $sexo,
		'cad_data_nasc' => converteDate($dt_nascimento),
		'cad_prontuario'     => $prontuario,
		'cad_cpf' => $cpf,
		'tipo_funcionario' => $tipo,
		'id_campus' => $campus
	];
	

	switch ($op) {
    case "INS":
        if (!$funcionarioCrud->verificaCpf($params['cad_cpf'])){
        	if ($id = $funcionarioCrud->insert($params)){
			//echo "Inserido com sucesso!";
			header("Location: ../view/cadFuncionarioView.php?result=1");
			die();

		}else {
			//echo "Erro ao inserir<br />";
			header("Location: ../view/cadFuncionarioView.php?result=0");
			die();
			}
		} else {
			//erro cpf já existe
			header("Location: ../view/cadFuncionarioView.php?result=12");
			die();
		} 
        break;
    case "ALT":
    	if ($teste = !$funcionarioCrud->verificaCpfUsuario($params['cad_cpf'], $id)){
        if ($id = $funcionarioCrud->update($params, $id)){
			//echo "Alterado com sucesso!";
			header("Location: ../view/lstFuncionario.php?result=8");
			die();
		}else {
			header("Location: ../view/lstFuncionario.php?result=9");
			die();
			//echo 'deu ruim';
			} 
		}else {
			//erro cpf já existe
			header("Location: ../view/lstFuncionario.php?result=12");
			die();
		} 
        break;
    case "DEL":
        if ($id = $funcionarioCrud->desAtivar($id, '1')){
			header("Location: ../view/lstFuncionario.php?result=15");
			die();
		}else {
			header("Location: ../view/lstFuncionario.php?result=14");
			die();
		}
        break;
    case "ATI":
        if ($id = $funcionarioCrud->desAtivar($id, '0')){
			header("Location: ../view/lstFuncionario.php?result=15"); 
			die();
		}else {
			header("Location: ../view/lstFuncionario.php?result=14");
			die();
		}
        break;
	}


?>
