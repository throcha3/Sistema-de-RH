<?php
include_once 'Modelo.php';

class Campus extends Modelo{
	protected $tabela_nome = 'cad_campus';
	protected $primary_key = 'id_campus';
	protected $campos = [
		'dsc_campus',
		'id_cidade',
		'id_estado'
	];

	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome 
					SET dsc_campus = :dsc_campus,
					id_cidade = :id_cidade,
					id_estado = :id_estado     
				 WHERE id_campus = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':dsc_campus', $array['dsc_campus']);
		$stmt->bindParam(':id_cidade', $array['id_cidade']);
		$stmt->bindParam(':id_cidade', $array['id_cidade']);
		$stmt->bindParam(':id_estado', $array['id_estado']);
		return $stmt->execute();

	}
}