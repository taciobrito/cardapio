<?php

namespace App\Model\Produto;

class ProdutoDaoImpl implements ProdutoDao{
	
	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT p.*, c.descricao AS categoria_nome 
			FROM produto AS p LEFT JOIN categoria AS c ON c.idCategoria = p.categoria_idCategoria");
		
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Produto\Produto');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buscaPorId($idProduto){
		$stmt = $this->pdo->prepare("SELECT * FROM produto WHERE idProduto = :idProduto");
		$stmt->bindParam(":idProduto", $idProduto, \PDO::PARAM_INT);
		//$stmt = $this->pdo->prepare("SELECT * FROM produto WHERE idProduto = $idProduto");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Produto\Produto');
		$stmt->execute();

		return $stmt->fetch();
	}

	public function insere(Produto $produto){
		$stmt = $this->pdo->prepare("INSERT INTO produto (nome, descricao, imagem, preco, categoria_idCategoria) 
			VALUES (?, ?, ?, ?, ?)");

		$stmt->execute(array($produto->getNome(), $produto->getDescricao(), $produto->getImagem(), 
			$produto->getPreco(), $produto->getCategoria_idCategoria()));
	}

	public function atualiza(Produto $produto){
		$stmt = $this->pdo->prepare("UPDATE produto SET nome = ?, descricao = ?, imagem = ?, 
			preco = ?, categoria_idCategoria = ? WHERE idProduto = ?");

		$stmt->execute(array($produto->getNome(), $produto->getDescricao(), $produto->getImagem(), 
			$produto->getPreco(), $produto->getCategoria_idCategoria(), $produto->getIdProduto()));
	}

	public function remove($idProduto){
		$stmt = $this->pdo->prepare("DELETE FROM produto WHERE idProduto = $idProduto");
		$stmt->execute();
	}

}