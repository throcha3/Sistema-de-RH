<?php
include_once 'Modelo.php';


class Cid extends Modelo{
	protected $tabela_nome = 'cad_cid';
	protected $primary_key = 'id_cid';
	protected $campos = [
		'dsc_cid',
		'cod_cid'
	];

	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome 
					SET dsc_cid = :dsc_cid,
					cod_cid = :cod_cid    
				 WHERE id_cid = ".$id;
		$stmt = $this->conn->prepare($sql);
		echo '<pre>';
		var_dump($sql);
		$stmt->bindParam(':dsc_cid', $array['dsc_cid']);
		$stmt->bindParam(':cod_cid', $array['cod_cid']);
		return $stmt->execute();
	}

}