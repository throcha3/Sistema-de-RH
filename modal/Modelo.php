<?php
include_once 'Banco.php';


class Modelo{
	protected $banco;
	protected $conn;

	protected $tabela_nome = '';
	protected $primary_key = '';
	protected $campos = array();


	function __construct(){
		$this->banco = new Banco();
		$this->conn  = $this->banco->getConnection();
	}

	//abstract public function update($array);

	public function insert(Array $params){

		$sql = "
			INSERT INTO {$this->tabela_nome} (".implode(',', $this->campos).")
			VALUES(:".implode(',:', $this->campos).")";
		if($stmt = $this->banco->exec($sql, $params)){
			return $this->conn->lastInsertId();
		}
		return false;
	}

	public function findAll(){
		$sql  = "SELECT * FROM $this->tabela_nome";

		$stmt = $this->conn->prepare($sql);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findAllOrder($order){
		$sql  = "SELECT * FROM $this->tabela_nome ORDER BY $order";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findAllPesq($campo,$str){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE $campo LIKE '%$str%' ORDER BY $campo";
			
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function findAllPesqDoisCampos($campo1,$campo2,$str){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE $campo1 LIKE '%$str%' OR $campo2 LIKE '%$str%' ";
			
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function find($id){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE $this->primary_key = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function delete($id){
		$sql = "DELETE FROM $this->tabela_nome WHERE $this->primary_key = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return true;
		//return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function desAtivar($id,$parametro){
		$sql = "UPDATE $this->tabela_nome SET inativo = '$parametro' WHERE $this->primary_key = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return true;
		//return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function verificaCpf($cpf)
	{
		$sql = "SELECT cad_cpf FROM $this->tabela_nome WHERE cad_cpf = :cpf";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
		$stmt->execute();
		return	$data_exists = ($stmt->fetchColumn() > 0) ? true : false;
	}

	public function verificaCpfUsuario($cpf, $id)
	{
		$sql = "SELECT cad_cpf FROM $this->tabela_nome WHERE cad_cpf = :cpf AND $this->primary_key != $id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
		$stmt->execute();
		return	$data_exists = ($stmt->fetchColumn() > 0) ? true : false;
	}

	public function buscaTotal()
	{
		$sql = "SELECT COUNT(*) FROM $this->tabela_nome";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return	$stmt->fetchColumn();
	}

	public function buscaUltimosDez(){
		$sql  = "SELECT * FROM $this->tabela_nome ORDER BY $this->primary_key DESC LIMIT 10";

		$stmt = $this->conn->prepare($sql);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}
