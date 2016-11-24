<?php

namespace App\Model\Pedido;
use App\Model\Produto\Produto;

class ItemPedido {
	private $produto;
	private $quantidade;

	public function __construct(Produto $_produto, $quantidade){
		$this->produto = $_produto;
		$this->quantidade = $quantidade;
	}

	public function listaProduto(){
		return $this->produto;
	}

	public function listaQuantidade(){
		return $this->quantidade;
	}

	public function listaSubTotal(){
		return $this->produto->getPreco() * $this->quantidade;
	}

}