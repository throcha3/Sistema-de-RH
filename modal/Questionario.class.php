<?php
include_once 'Modelo.php';

class Questionario extends Modelo{
	protected $tabela_nome = 'questionario';
	protected $primary_key = 'ID';
	protected $campos = [
		'problema',
		'funcionario',
		'enfermeiro',
		'questao1',
		'questao2',
		'questao3',
		'questao4',
		'questao5',
		'questao6',
		'data',
		'hora'
	];
}


