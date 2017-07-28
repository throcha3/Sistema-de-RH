<?php
include_once 'Modelo.php';

class Setor extends Modelo{
	protected $tabela_nome = 'cad_setor';
	protected $primary_key = 'id_setor';
	protected $campos = [
		'dsc_setor'
	];

	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome 
					SET dsc_setor = :dsc_setor    
				 WHERE id_setor = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':dsc_setor', $array['dsc_setor']);
		return $stmt->execute();

	}
}