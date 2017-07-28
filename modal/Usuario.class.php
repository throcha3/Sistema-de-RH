<?php
include_once 'Modelo.php';


class Usuario extends Modelo{
	protected $tabela_nome = 'cad_usuario';
	protected $primary_key = 'id';
	protected $campos = [
		'login',
		'senha',
		'nome',
		'presenteismo',
		'absenteismo',
		'funcionario',
		'enfermeiro',
		'medico',
		'setor',
		'cargo',
		'cid',
		'especialidade',
		'questionario',
		'campus',
		'cidade',
		'estado',
		'usuario'
	];

	public function update($array,$id){ 

		$sql  = "UPDATE $this->tabela_nome
					SET login = :login,
					senha = :senha,
					nome = :nome,
					presenteismo = :presenteismo,
					absenteismo = :absenteismo,
					funcionario = :funcionario,
					enfermeiro = :enfermeiro,
					medico = :medico,
					setor = :setor,
					cargo = :cargo,
					cid = :cid,
					especialidade = :especialidade,
					questionario = :questionario,
					campus = :campus,
					cidade = :cidade,
					estado = :estado,
					usuario = :usuario

				 WHERE id = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':login', $array['login']);
		$stmt->bindParam(':senha', $array['senha']);
		$stmt->bindParam(':nome', $array['nome']);
		$stmt->bindParam(':presenteismo', $array['presenteismo']);
		$stmt->bindParam(':absenteismo', $array['absenteismo']);
		$stmt->bindParam(':funcionario', $array['funcionario']);
		$stmt->bindParam(':enfermeiro', $array['enfermeiro']);
		$stmt->bindParam(':medico', $array['medico']);
		$stmt->bindParam(':setor', $array['setor']);
		$stmt->bindParam(':cargo', $array['cargo']);
		$stmt->bindParam(':cid', $array['cid']);
		$stmt->bindParam(':especialidade', $array['especialidade']);
		$stmt->bindParam(':questionario', $array['questionario']);
		$stmt->bindParam(':campus', $array['campus']);
		$stmt->bindParam(':cidade', $array['cidade']);
		$stmt->bindParam(':estado', $array['estado']);
		$stmt->bindParam(':usuario', $array['usuario']);
		/*echo '<pre>';
	var_dump($array);

		echo '<br /><pre>';
	var_dump($sql);
	exit();*/
		return $stmt->execute();
	}

	public function logar($login, $senha){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE login = :login and senha = :senha";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();

		if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
			session_start();

			$_SESSION['logado'] = true;
			$_SESSION['login'] = $usuario['login'];
			$_SESSION['nome'] = $usuario['nome'];

			$_SESSION['presenteismo'] = $usuario['presenteismo'];
			$_SESSION['absenteismo'] = $usuario['absenteismo'];
			$_SESSION['funcionario'] = $usuario['funcionario'];
			$_SESSION['enfermeiro'] = $usuario['enfermeiro'];
			$_SESSION['medico'] = $usuario['medico'];
			$_SESSION['setor'] = $usuario['setor'];
			$_SESSION['cargo'] = $usuario['cargo'];
			$_SESSION['cid'] = $usuario['cid'];
			$_SESSION['especialidade'] = $usuario['especialidade'];
			$_SESSION['questionario'] = $usuario['questionario'];
			$_SESSION['campus'] = $usuario['campus'];
			$_SESSION['cidade'] = $usuario['cidade'];
			$_SESSION['estado'] = $usuario['estado'];
			$_SESSION['usuario'] = $usuario['usuario'];


			return true;

		} else {

			return false;
		}
	}

	public function verificaLogin($login, $senha){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE login = :login and senha = :senha";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();

		if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return true;

		} else {

			return false;
		}
	}

	public function logout(){
		session_destroy();
	}
}