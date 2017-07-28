<?php
include_once 'Modelo.php';


class TipoAfastamento extends Modelo{
	protected $tabela_nome = 'cad_tipo_afastamento';
	protected $primary_key = 'id_tipo_afasta';
	protected $campos = [
		'dsc_tipo_afasta'
	];

	public function update($array,$id){
		$sql  = "UPDATE $this->tabela_nome
					SET dsc_tipo_afasta = :dsc_tipo_afasta
				 WHERE $this->primary_key = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':dsc_tipo_afasta', $array['dsc_tipo_afasta']);
		return $stmt->execute();
	}
}