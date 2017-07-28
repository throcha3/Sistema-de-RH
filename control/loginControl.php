<?php
	include_once '../modal/Usuario.class.php';

	$user = new Usuario;

	$id        = (int)(isset($_REQUEST['id']))    ? (int)$_REQUEST['id']    : 0;
	$login     = (isset($_POST['txt_login']))  ? $_POST['txt_login']  : '';
	$senha     = (isset($_POST['txt_senha']))  ? $_POST['txt_senha']  : '';
	$c_senha     = (isset($_POST['txt_c_senha']))  ? $_POST['txt_c_senha']  : '';
	$nome      = (isset($_POST['txt_nome']))   ? $_POST['txt_nome']   : '';
	$op        = (isset($_POST['op']))         ? $_POST['op']         : 0;

	//Verifica qual senha setar no banco e criptografa a mesma.
	if ($op=='ALT' and $c_senha <> ''){
		if ($var = $user->verificaLogin($login, sha1($senha))) {//Verifica se existe o login digitado
			$senha = sha1($c_senha);	//Se o login estiver certo joga a nova senha para o parametro
		} else {
			header('Location: ../view/lstLogin.php?result=89'); //Erro de "senha não confere"
			exit();
		}
	} else $senha = sha1($senha); //Se for cadastro ou exclusão...
	
	/*echo '<pre> Senha atual:';
	echo $senha;
	echo '<br /> Nova senha:';
	echo $c_senha;
	exit();*/

	//Variáveis do controle de acesso
	$presenteismo   = (isset($_POST['presenteismo'])) ? $_POST['presenteismo']  : 0;
	$absenteismo    = (isset($_POST['absenteismo']))  ? $_POST['absenteismo']   : 0;
	$funcionario    = (isset($_POST['funcionario']))  ? $_POST['funcionario']   : 0;
	$enfermeiro     = (isset($_POST['enfermeiro']))   ? $_POST['enfermeiro']    : 0;
	$medico     	= (isset($_POST['medico']))       ? $_POST['medico']        : 0;
	$setor          = (isset($_POST['setor']))        ? $_POST['setor']         : 0;
	$cargo          = (isset($_POST['cargo']))        ? $_POST['cargo']         : 0;
	$cid            = (isset($_POST['cid']))          ? $_POST['cid']           : 0;
	$especialidade  = (isset($_POST['especialidade']))? $_POST['especialidade'] : 0;
	$questionario   = (isset($_POST['questionario'])) ? $_POST['questionario']  : 0;
	$campus   = (isset($_POST['campus'])) ? $_POST['campus']  : 0;
	$cidade   = (isset($_POST['cidade'])) ? $_POST['cidade']  : 0;
	$estado   = (isset($_POST['estado'])) ? $_POST['estado']  : 0;
	$usuario   = (isset($_POST['usuario'])) ? $_POST['usuario']  : 0;

	$params = [
		'login'         => $login,
		'senha'         => $senha,
		'nome'          => $nome,
		'presenteismo'  => $presenteismo,
		'absenteismo'   => $absenteismo,
		'funcionario'   => $funcionario,
		'enfermeiro'    => $enfermeiro,
		'medico'        => $medico,
		'setor'         => $setor,
		'cargo'         => $cargo,
		'cid'           => $cid,
		'especialidade' => $especialidade,
		'questionario'  => $questionario,
		'campus'        => $campus,
		'cidade'        => $cidade,
		'estado'        => $estado,
		'usuario'       => $usuario
	]; 

	

	if (isset($_SESSION['logado']) && $_SESSION['logado'] === true){
		header('Location: ../view/index.php');
		exit();
	}

	switch ($op) {
    case "INS":
    var_dump($params);
        if ($id = $user->insert($params)){

			echo "Inserido com sucesso!";
			header("Location: ../view/lstLogin.php?result=1");
			die();

		}else {
			echo "Erro ao inserir<br />";
			header("Location: ../view/lstLogin.php?result=0");
			die();
		}
        break;
    case "ALT":
        if ($id = $user->update($params,$id)){
			echo "Alterado com sucesso!";
			header("Location: ../view/lstLogin.php?&result=8");
			die();
		}else {
			echo "Erro ao Alterar<br />";
			header("Location: ../view/lstLogin.php?result=9");
			die();
		}
        break;
    case "DEL":
        if ($id = $user->delete($id)){
			echo "Excluído com sucesso!";
			header("Location: ../view/lstLogin.php?result=15");
			die();
		}else {
			echo "Erro ao excluir<br />";
			header("Location: ../view/lstLogin.php?result=14");
			die();
		}
        break;
    case "LOG":
        if ($id = $user->logar($login, $senha)){
			//header('Location: ../view/index.php');
			

			exit();
		}else {
			// header("Location: ../view/login.php?result=2");
			header('Location: ../view/loginView.php?result=0&#FalhaNoLogin');
			exit();
		}
        break;
    default:
		echo 'Algo de errado não está certo!';
		break;
	}


?>


