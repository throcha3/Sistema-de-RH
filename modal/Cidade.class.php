<?php
include_once 'Modelo.php';


class Cidade extends Modelo{
	protected $tabela_nome = 'cad_cidade';
	protected $primary_key = 'id_cidade';
	protected $campos = [
		'nome_cidade',
		'cod_uf'
	];

	public function update($array,$id){
		$sql  = "UPDATE $this->tabela_nome
					SET nome_cidade = :nome_cidade,
					cod_uf = :cod_uf
				 WHERE $this->primary_key = ".$id;
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':nome_cidade', $array['nome_cidade']);
		$stmt->bindParam(':cod_uf', $array['cod_uf']);
		return $stmt->execute();
	}

	public function buscaCidade ($id_estado) {
		$sql = "SELECT $this->primary_key, nome_cidade
		FROM $this->tabela_nome
		WHERE cod_uf = '$id_estado'
		ORDER BY nome_cidade";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}