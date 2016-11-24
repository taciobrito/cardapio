<?php

namespace App\Model\Usuario;

class Usuario {
	private $idUsuario;
	private $nome;
	private $senha;
	private $funcionario_idFuncionario;
	
	public function __construct(){
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setFuncionario_idFuncionario($funcionario_idFuncionario){
		$this->funcionario_idFuncionario = $funcionario_idFuncionario;
	}

	public function getFuncionario_idFuncionario(){
		return $this->funcionario_idFuncionario;
	}
}