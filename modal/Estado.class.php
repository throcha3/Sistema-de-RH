<?php
include_once 'Modelo.php';


class Estado extends Modelo{
	protected $tabela_nome = 'cad_estado';
	protected $primary_key = 'id_uf';
	protected $campos = [
		'nome_uf',
		'cod_uf'
	];

	public function update($array,$id){
		$sql  = "UPDATE $this->tabela_nome
					SET nome_uf = :nome_uf,
						cod_uf = :cod_uf
				 WHERE $this->primary_key = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':nome_uf', $array['nome_uf']);
		$stmt->bindParam(':cod_uf', $array['cod_uf']);
		return $stmt->execute();
	}

	public function buscaCidade ($id_estado) {
		$sql = "SELECT $this->primary_key, nome_uf
		FROM $this->tabela_nome
		WHERE cod_uf = '$id_estado'
		ORDER BY nome_uf";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}