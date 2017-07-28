<?php
include_once 'Modelo.php';


class Presenteismo extends Modelo{
	protected $tabela_nome = 'cad_presenteismo';
	protected $primary_key = 'id_presenteismo';
	protected $campos = [
		'id_funcionario',
		'id_enfermeiro',
		'cad_problema',
		'data_presenteismo',
		'cad_observacao',
		'log_tipo',
		'log_data',
		'log_user'
	];

	public function update($array, $id){

		$sql  = "UPDATE $this->tabela_nome  
					SET id_funcionario = :id_funcionario,
					id_enfermeiro = :id_enfermeiro,
					cad_problema = :cad_problema,
					data_presenteismo = :data_presenteismo,
					cad_observacao = :cad_observacao 
				 WHERE id_presenteismo =". $id;
		$stmt = $this->conn->prepare($sql);
		// $stmt->bindParam(':id',   $array['id']);
		$stmt->bindParam(':id_funcionario', $array['id_funcionario']);
		$stmt->bindParam(':id_enfermeiro', $array['id_enfermeiro']);
		$stmt->bindParam(':cad_problema', $array['cad_problema']);
		$stmt->bindParam(':data_presenteismo', $array['data_presenteismo']);
		$stmt->bindParam(':cad_observacao', $array['cad_observacao']);
		$stmt->bindParam(':log_tipo', $array['log_tipo']);
		$stmt->bindParam(':log_data', $array['log_data']);
		$stmt->bindParam(':log_user', $array['log_user']);

		return $stmt->execute();
	}

	public function findAllOrderFunc($order){
		$sql  = "SELECT * FROM $this->tabela_nome 
			INNER JOIN cad_funcionario on $this->tabela_nome.id_funcionario = cad_funcionario.id_funcionario 
		ORDER BY $order";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function findAllPesqFuncionario($order, $pesq){
		$sql  = "SELECT * FROM $this->tabela_nome 
			INNER JOIN cad_funcionario on $this->tabela_nome.id_funcionario = cad_funcionario.id_funcionario 
		WHERE cad_funcionario.nome_funcionario LIKE '%$pesq%' OR cad_funcionario.sobrenome_funcionario LIKE '%$pesq%' ORDER BY $order";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findAllPesqEnfermeiro($order, $pesq){
		$sql  = "SELECT * FROM $this->tabela_nome 
			INNER JOIN cad_enfermeiro on $this->tabela_nome.id_enfermeiro = cad_enfermeiro.id_enferm 
		WHERE cad_enfermeiro.nome_enferm LIKE '%$pesq%' OR cad_enfermeiro.sobrenome_enferm LIKE '%$pesq%' ORDER BY $order";
		$stmt = $this->conn->prepare($sql);
		//echo '<pre>';
		//var_dump($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}