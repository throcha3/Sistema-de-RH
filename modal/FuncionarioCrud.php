<?php
include_once 'Modelo.php';


class FuncionarioCrud extends Modelo{
	protected $tabela_nome = 'cad_funcionario';
	protected $primary_key = 'id_funcionario';
	protected $campos = [
		'nome_funcionario',
		'sobrenome_funcionario',
		'id_setor',
		'id_cargo',
		'cad_sexo',
		'cad_data_nasc',
		'cad_prontuario',
		'cad_cpf',
		'tipo_funcionario',
		'id_campus'
	];

	public function update($array, $id){

		$sql  = "UPDATE $this->tabela_nome  
					SET nome_funcionario      = :nome_funcionario,
					sobrenome_funcionario      = :sobrenome_funcionario,
				    id_setor      = :id_setor,
				    id_cargo      = :id_cargo,
				    cad_sexo          = :sexo,
				    cad_data_nasc = :dt_nascimento,
				    id_campus     = :id_campus,
				    cad_cpf       = :cad_cpf,
				    cad_prontuario    = :prontuario,
				    tipo_funcionario          = :tipo  
				 WHERE id_funcionario = ".$id;
		$stmt = $this->conn->prepare($sql);
		var_dump($sql);
		// $stmt->bindParam(':id',   $array['id']);
		$stmt->bindParam(':nome_funcionario', $array['nome_funcionario']);
		$stmt->bindParam(':sobrenome_funcionario', $array['sobrenome_funcionario']);
		$stmt->bindParam(':id_setor', $array['id_setor']);
		$stmt->bindParam(':id_cargo', $array['id_cargo']);
		$stmt->bindParam(':sexo', $array['cad_sexo']);
		$stmt->bindParam(':dt_nascimento', $array['cad_data_nasc']);
		$stmt->bindParam(':id_campus',  $array['id_campus']);
		$stmt->bindParam(':cad_cpf',  $array['cad_cpf']);
		$stmt->bindParam(':prontuario', $array['cad_prontuario']);
		$stmt->bindParam(':tipo',       $array['tipo_funcionario']);

		return $stmt->execute();
	}
	
}