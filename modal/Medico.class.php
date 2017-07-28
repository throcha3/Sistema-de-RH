<?php
include_once 'Modelo.php';

class Medico extends Modelo{
	protected $tabela_nome = 'cad_medico';
	protected $primary_key = 'id_medico';
	protected $campos = [
		'nome_medico',
		'sobrenome_medico',
		'cad_crm',
		'id_cidade_atuacao',
		'id_estado_atuacao',
		'id_especialidade',
		'inativo'
	];
	
	public function update($array,$id){

		$sql  = "UPDATE $this->tabela_nome  
					SET 
					nome_medico     = :nome_medico,
					sobrenome_medico    = :sobrenome_medico,
				    cad_crm     		= :cad_crm,
				    id_cidade_atuacao   = :id_cidade_atuacao,
				    id_estado_atuacao   = :id_estado_atuacao,
				    id_especialidade 	= :id_especialidade,
				    inativo    			= :inativo
				 WHERE id_medico = ".$id;
		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':nome_medico', $array['nome_medico']);
		$stmt->bindParam(':sobrenome_medico', $array['sobrenome_medico']);
		$stmt->bindParam(':cad_crm', $array['cad_crm']);
		$stmt->bindParam(':id_cidade_atuacao', $array['id_cidade_atuacao']);
		$stmt->bindParam(':id_estado_atuacao', $array['id_estado_atuacao']);
		$stmt->bindParam(':id_especialidade', $array['id_especialidade']);
		$stmt->bindParam(':inativo',  $array['inativo']);
		
		
		
		return $stmt->execute();


	}
}