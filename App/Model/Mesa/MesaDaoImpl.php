<?php

namespace App\Model\Mesa;

class MesaDaoImpl implements MesaDao{
	
	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT * FROM mesa");
		
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Mesa\Mesa');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buscaPorId($idMesa){
		$stmt = $this->pdo->prepare("SELECT * FROM mesa WHERE idMesa = $idMesa");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Mesa\Mesa');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function insere(Mesa $mesa){
		$stmt = $this->pdo->prepare("INSERT INTO mesa (numeroMesa) VALUES (?)");
		$stmt->execute(array($mesa->getNumeroMesa()));
	}

	public function atualiza(Mesa $mesa){
		$stmt = $this->pdo->prepare("UPDATE mesa SET numeroMesa = ? WHERE idMesa = ?");
		$stmt->execute(array($mesa->getNumeroMesa(), $mesa->getIdMesa()));
	}

	public function remove($idMesa){
		$stmt = $this->pdo->prepare("DELETE FROM mesa WHERE idMesa = $idMesa");
		$stmt->execute();
	}
}