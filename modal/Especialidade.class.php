<?php
include_once 'Modelo.php';


class Especialidade extends Modelo{
	protected $tabela_nome = 'cad_especialidade';
	protected $primary_key = 'id_especialidade';
	protected $campos = [
		'dsc_especialidade'
	];

	
	public function update($array,$id){
		$sql  = "UPDATE $this->tabela_nome
					SET dsc_especialidade = :dsc_especialidade
				 WHERE $this->primary_key = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':dsc_especialidade', $array['dsc_especialidade']);
		return $stmt->execute();
	}
}