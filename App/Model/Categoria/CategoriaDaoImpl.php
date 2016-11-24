<?php

namespace App\Model\Categoria;

class CategoriaDaoImpl implements CategoriaDao{
	
	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT * FROM categoria");
		
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Categoria\Categoria');
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function buscaPorId($idCategoria){
		$stmt = $this->pdo->prepare("SELECT * FROM categoria WHERE idCategoria = $idCategoria");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Categoria\Categoria');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function insere(Categoria $categoria){
		$stmt = $this->pdo->prepare("INSERT INTO categoria (descricao) VALUES (?)");
		$stmt->execute(array($categoria->getDescricao()));
	}

	public function atualiza(Categoria $categoria){
		$stmt = $this->pdo->prepare("UPDATE categoria SET descricao = ? WHERE idCategoria = ?");
		$stmt->execute(array($categoria->getDescricao(), $categoria->getIdCategoria()));
	}

	public function remove($idCategoria){
		$stmt = $this->pdo->prepare("DELETE FROM categoria WHERE idCategoria = $idCategoria");
		$stmt->execute();
	}
}