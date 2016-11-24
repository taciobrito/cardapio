<?php

namespace App\Model\Pedido_Produto;

class Pedido_Produto {
	private $pedido_idPedido;
	private $produto_idProduto;
	private $quantidade;

	function __construct(){
	}

	public function setPedido_idPedido($pedido_idPedido){
		$this->pedido_idPedido = $pedido_idPedido;
	}

	public function getPedido_idPedido(){
		return $this->pedido_idPedido;
	}

	public function setProduto_idProduto($produto_idProduto){
		$this->produto_idProduto = $produto_idProduto;
	}

	public function getProduto_idProduto(){
		return $this->produto_idProduto;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}
}