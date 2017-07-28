<?php
 session_start();
 session_destroy();
 header('Location:../view/loginView.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-12">
				<div class="col-middle">
					<div class="text-center text-center">
						<h4>DESLIGADO DO SISTEMA</h4>
						<h4>Clique <a href="../view/loginView.php">Aqui</a> para ser redirecionado para a tela de login</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>