<?php

namespace App\Model\Funcionario;

class Funcionario {
	private $idFuncionario;
	private $nome;
	private $cpf;
	
	public function __construct(){
	}

	public function setIdFuncionario($idFuncionario){
		$this->idFuncionario = $idFuncionario;
	}

	public function getIdFuncionario(){
		return $this->idFuncionario;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

}