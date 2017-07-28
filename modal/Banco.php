<?php
//para web 
class Banco {
	private $dbhost = 'localhost';
    private $dbusuario = 'root';
    private $dbsenha = '';
    private $dbnome = 'rhsys';
    private $conn = null;

	public function __construct(){
		$this->conn = $this->getConnection();
	}

	public function getConnection(){
		if ($this->conn){
			$conected = $this->conn;
			return $conected;
			$conected = null;
			//exit();
			//break;
		}

		try {
			$this->conn = new PDO("mysql:host=" .  $this->dbhost . ";
            	dbname=" . $this->dbnome,
            	$this->dbusuario,
            	$this->dbsenha
			);

		} catch (PDOException $exception) {
			echo "Erro de conexao:  " . $exception->getMessage();
			exit();
		}

		$conected = $this->conn;
		return $conected;
		$conected = null;
		exit();

	}

	public function exec($sql, Array $params = []){
		$stmt = $this->conn->prepare($sql);
		
		foreach ($params as $key => $param) {
			$stmt->bindValue(':'.$key, $param, PDO::PARAM_STR);
			echo '<pre> var dump de: param </br>';
		    var_dump($key);
		}

		if(!$stmt->execute()){
			return false;

		}
		return $stmt;
	}
	
}