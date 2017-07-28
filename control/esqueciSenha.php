<?php
	include_once('../modal/Usuario.class.php');

	$user = new Usuario;

	$var = $user->buscaLogin('thiago.guitar@live.com');

	
	if (sizeof($var) > 0) {
		mail ("$var['login']", "Recuperacao de Senha RHSYS", "Conforme solicitado, sua senha e: $senha","From: throcha3@gmail.com");
		echo 'FINIXE';

	} else echo 'User not FAÚNDE';


?>