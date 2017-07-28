<?php
include_once 'Modelo.php';

class Enfermeiro extends Modelo{
	protected $tabela_nome = 'cad_enfermeiro';
	protected $primary_key = 'id_enferm';
	protected $campos = [
		'nome_enferm',
		'sobrenome_enferm',
		'id_campus',
		'coren_enferm'
	];
 
	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome 
					SET nome_enferm = :nome_enferm,
					sobrenome_enferm = :sobrenome_enferm,
					id_campus = :id_campus,
					coren_enferm = :coren_enferm
				 WHERE $this->primary_key = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':nome_enferm', $array['nome_enferm']);
		$stmt->bindParam(':sobrenome_enferm', $array['sobrenome_enferm']);
		$stmt->bindParam(':id_campus', $array['id_campus']);
		$stmt->bindParam(':coren_enferm', $array['coren_enferm']);
		return $stmt->execute();

	}

	public function findAllPesqNome($campo1,$campo2,$str){
		$sql  = "SELECT * FROM $this->tabela_nome WHERE $campo1 LIKE '%$str%' OR $campo2 LIKE '%$str%' ";
			
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}