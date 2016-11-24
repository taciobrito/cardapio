<?php

namespace App\Model\Funcionario;

class FuncionarioDaoImpl implements FuncionarioDao{

	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT * FROM funcionario");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Funcionario\Funcionario');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buscaPorId($idFuncionario){
		$stmt = $this->pdo->prepare("SELECT * FROM funcionario WHERE idFuncionario = $idFuncionario");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Funcionario\Funcionario');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function insere(Funcionario $funcionario){
		$stmt = $this->pdo->prepare("INSERT INTO funcionario (nome, cpf) VALUES (?, ?)");
		$stmt->execute(array($funcionario->getNome(), $funcionario->getCpf()));
	}

	public function atualiza(Funcionario $funcionario){
		$stmt = $this->pdo->prepare("UPDATE funcionario SET nome = ?, cpf = ? WHERE idFuncionario = ?");
		$stmt->execute(array($funcionario->getNome(), $funcionario->getCpf(), $funcionario->getIdFuncionario()));
	}

	public function remove($idFuncionario){
		$stmt = $this->pdo->prepare("DELETE FROM funcionario WHERE idFuncionario = $idFuncionario");
		$stmt->execute();
	}
}