<?php 

include_once '../helpers.php';

if (isset($_SESSION['logado'])){
	header('Location: index.php');
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RHSys - Sist. de Gerenciamento</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.css" id="bootstrap-css" />
    <link rel="stylesheet" href="../layout/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../layout/css/style.css" />
</head>
<body class="login">
		<div class="login_wrapper">
			<section class="login_content">

			<form action="../control/loginControl.php" method="post">
				<div class="row">
				<div class="col-md-4 col-md-offset-4 panel panel-default" id="painel-fundo-login">

					<div class="col-md-12 panel-heading"><p class="login-painel-titulo">Login</p></div>
					<div class="col-md-12 panel-body">

						<div class="col-md-12 input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" name="txt_login" class="form-control" placeholder="Digite seu E-mail" required="true" />
						</div><br />

						<div class="col-md-12 input-group">
							<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
							<input type="password" name="txt_senha" class="form-control" placeholder="Digite a sua senha" required="true" />
						</div><br />

						<div class="col-md-12">
							<input type="hidden" name="op" value="LOG" />
							<input type="submit" class="btn btn-primary btn-md" value="Entrar" name="submit"/>
							<input type="reset" class="btn btn-secondary btn-md" value="Limpar" name="submit"/>
							
						</div><br />
					</div>
					<div class="col-md-12 panel-footer">
						<p class="login-painel-footer"><img src="includes/img/r_logo.png" width="20px"/> HSYS</p>
					</div>
				</div>
				</div>
			</form>

			<div class="footer">
			</div>
			</section>
		</div>
	</body>
</html>
<?php echo  $_SERVER['KRB5CCNAME'];// Testar na unimep que tem login via kerberos ?>
