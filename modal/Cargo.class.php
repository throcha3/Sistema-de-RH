<?php
include_once 'Modelo.php';


class Cargo extends Modelo{
	protected $tabela_nome = 'cad_cargo';
	protected $primary_key = 'id_cargo';
	protected $campos = [
		'id_setor',
		'dsc_cargo'
	];

	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome 
					SET dsc_cargo = :dsc_cargo,
					id_setor = :id_setor    
				 WHERE id_cargo = ".$id;
		$stmt = $this->conn->prepare($sql);
		echo '<pre>';
		var_dump($sql);
		$stmt->bindParam(':dsc_cargo', $array['dsc_cargo']);
		$stmt->bindParam(':id_setor', $array['id_setor']);
		return $stmt->execute();
	}

}