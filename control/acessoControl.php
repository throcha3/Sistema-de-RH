<?php
	//session_start(); a session será startada no helpers. O include desse arquivo vai abaixo dele no novoHeader.
	/*echo 'Começar o var dump...<br /> <pre> ';



	var_dump($_SESSION['presenteismo']);
	echo '<br />';
	var_dump($_SESSION['absenteismo']);
	echo '<br />';
	var_dump($_SESSION['funcionario']);
	echo '<br />';
	var_dump($_SESSION['enfermeiro']);
	echo '<br />';
	var_dump($_SESSION['cid']);
	echo '<br /> end';
    */

	$pagina = $_SERVER['PHP_SELF']; 

	$parte = substr($pagina, 9); //9 para o servidor, 13 para local


	//Verificar o que acontece se tiver algum get no link.... <<<<<<<
	if ($_SESSION['logado'] == true) {
		switch (true) {
			case strstr($pagina, 'Presenteismo'):
				if ($_SESSION['presenteismo'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Absenteismo'):
				if ($_SESSION['absenteismo'] != '1')   header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Funcionario'):
				if ($_SESSION['funcionario'] != '1')   header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Enfermeiro'):
				if ($_SESSION['enfermeiro'] != '1')    header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Medico'):
				if ($_SESSION['medico'] != '1')        header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Setor'):
				if ($_SESSION['cetor'] != '1')         header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Cargo'):
				if ($_SESSION['cargo'] != '1')         header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Cid'):
				if ($_SESSION['cid'] != '1')           header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Especialidade'):
				if ($_SESSION['especialidade'] != '1') header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'QuestionarioView'):
				if ($_SESSION['questionario'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Campus'):
				if ($_SESSION['campus'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Cidade'):
				if ($_SESSION['cidade'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Estado'):
				if ($_SESSION['estado'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'Login'):
				if ($_SESSION['usuario'] != '1')  header('Location: ../view/index.php?result=99');
				break;
			case strstr($pagina, 'index'):
				//echo 'index';
				continue;
				break;
			default:
				echo 'Pagina sem controle de acesso...';
				break;
		}
	} else {
		echo 'User non logadu';
	}

?>