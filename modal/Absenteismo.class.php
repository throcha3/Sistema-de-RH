<?php
include_once 'Modelo.php';


class Absenteismo extends Modelo{
	protected $tabela_nome = 'cad_absenteismo';
	protected $primary_key = 'id_absenteismo';
	protected $campos = [
		'id_funcionario',
		'id_medico',
		'id_cid',
		'tipo_abs',
		'tipo_doc',
		'data_inicio',
		'data_final',
		'tipo_afastamento',
		'cad_observacao',
		'arquivo_nome',
		'arquivo_upload',
		'tamanho_upload',
		'data_upload'
	];

	public function update($array, $id){

		$sql  = "UPDATE $this->tabela_nome
					SET
					id_funcionario = :id_funcionario,
					id_medico = :id_medico,
					id_cid = :id_cid,
					tipo_abs = :tipo_abs,
					tipo_doc = :tipo_doc,
					data_inicio = :data_inicio,
					data_final = :data_final,
					tipo_afastamento = :tipo_afastamento,
					cad_observacao = :cad_observacao,
					arquivo_nome = :arquivo_nome,
					arquivo_upload = :arquivo_upload,
					tamanho_upload = :tamanho_upload,
					data_upload    = :data_upload

				 WHERE $this->primary_key =". $id;

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id_funcionario', $array['id_funcionario']);
		$stmt->bindParam(':id_medico', $array['id_medico']);
		$stmt->bindParam(':id_cid', $array['id_cid']);
		$stmt->bindParam(':tipo_abs', $array['tipo_abs']);
		$stmt->bindParam(':tipo_doc', $array['tipo_doc']);
		$stmt->bindParam(':data_inicio', $array['data_inicio']);
		$stmt->bindParam(':data_final', $array['data_final']);
		$stmt->bindParam(':tipo_afastamento', $array['tipo_afastamento']);
		$stmt->bindParam(':cad_observacao', $array['cad_observacao']);
		$stmt->bindParam(':arquivo_nome', $array['arquivo_nome']);
		$stmt->bindParam(':arquivo_upload', $array['arquivo_upload']);
		$stmt->bindParam(':tamanho_upload', $array['tamanho_upload']);
		$stmt->bindParam(':data_upload', $array['data_upload']);

		return $stmt->execute();
	}
	public function updateSemAnexo($array, $id){

		$sql  = "UPDATE $this->tabela_nome
					SET
					id_funcionario = :id_funcionario,
					id_medico = :id_medico,
					id_cid = :id_cid,
					tipo_abs = :tipo_abs,
					tipo_doc = :tipo_doc,
					data_inicio = :data_inicio,
					data_final = :data_final,
					tipo_afastamento = :tipo_afastamento,
					cad_observacao = :cad_observacao

				 WHERE $this->primary_key =". $id;

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id_funcionario', $array['id_funcionario']);
		$stmt->bindParam(':id_medico', $array['id_medico']);
		$stmt->bindParam(':id_cid', $array['id_cid']);
		$stmt->bindParam(':tipo_abs', $array['tipo_abs']);
		$stmt->bindParam(':tipo_doc', $array['tipo_doc']);
		$stmt->bindParam(':data_inicio', $array['data_inicio']);
		$stmt->bindParam(':data_final', $array['data_final']);
		$stmt->bindParam(':tipo_afastamento', $array['tipo_afastamento']);
		$stmt->bindParam(':cad_observacao', $array['cad_observacao']);

		return $stmt->execute();
	}
	//Usado na ordenacao da listagem
	public function findAllOrderFunc($order){
		$sql  = "SELECT * FROM $this->tabela_nome
			INNER JOIN cad_funcionario on $this->tabela_nome.id_funcionario = cad_funcionario.id_funcionario
		ORDER BY $order";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	//Usado na ordenacao da listagem
	public function findAllOrderMed($order){
		$sql  = "SELECT * FROM $this->tabela_nome
			INNER JOIN cad_medico on $this->tabela_nome.id_medico = cad_medico.id_medico
		ORDER BY $order";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	//Usado na pesquisa da listagem
	public function findAllPesqFuncionario($order, $pesq){
		$sql  = "SELECT * FROM $this->tabela_nome
			INNER JOIN cad_funcionario on $this->tabela_nome.id_funcionario = cad_funcionario.id_funcionario
		WHERE cad_funcionario.nome_funcionario LIKE '%$pesq%' OR cad_funcionario.sobrenome_funcionario LIKE '%$pesq%' ORDER BY $order";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	//Usado na pesquisa da listagem
	public function findAllPesqMed($order, $pesq){
		$sql  = "SELECT * FROM $this->tabela_nome
			INNER JOIN cad_medico on $this->tabela_nome.id_medico = cad_medico.id_medico
		WHERE cad_medico.nome_medico LIKE '%$pesq%' OR cad_medico.sobrenome_medico LIKE '%$pesq%' ORDER BY $order";
		$stmt = $this->conn->prepare($sql);
		//echo '<pre>';
		//var_dump($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}