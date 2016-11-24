<?php

namespace App\Model\Pedido_Produto;

class Pedido_ProdutoDaoImpl implements Pedido_ProdutoDao {
	
	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){

	}

	public function insere(Pedido_Produto $pedido_produto){
		$stmt = $this->pdo->prepare("INSERT INTO pedido_produto (pedido_idPedido, produto_idProduto, quantidade) 
			VALUES (?, ?, ?)");

		$stmt->execute(array($pedido_produto->getPedido_idPedido(), $pedido_produto->getProduto_idProduto(),
			$pedido_produto->getQuantidade()));
	}

	public function atualiza($idPedido, $idProduto, $quantidade){

	}

	public function remove($idPedido, $idProduto, $quantidade){

	}
}