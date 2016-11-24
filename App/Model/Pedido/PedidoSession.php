<?php

namespace App\Model\Pedido;

class PedidoSession implements PedidoAtual{
	// Cria array de items
	private $items = array();

	//metodo construtor
	public function __construct(){
		$this->items = $this->restaura();
	}

	// metodo que restaura minha sessão de pedido
	public function restaura(){
		return isset($_SESSION['meu-pedido']) ? unserialize($_SESSION['meu-pedido']) : array();
	}

	// metodo que verifica que se o produto existe no pedido
	public function existe($idProduto){
		return isset($this->items[$idProduto]);
	}

	// metodo que adiciona produto ao pedido
	public function adiciona(ItemPedido $item) {
		$idProduto = $item->listaProduto()->getIdProduto();		
		
		if (!$this->existe($idProduto)) {
			$this->items[$idProduto] = $item;
		}
	}

	// metodo que atualiza um produto do pedido
	public function atualiza(ItemPedido $item){
		$idProduto = $item->listaProduto()->getIdProduto();
		
		if ($this->existe($idProduto)) {
			// Se a quantidade de produto no pedido for '0', remove ele
			if($item->listaQuantidade() <= 0){
				$this->deleta($idProduto);
				return;
			}
			$this->items[$idProduto] = $item;
		}
	}

	//metodo que remove o produto do pedido
	public function deleta($idProduto){
		if ($this->existe($idProduto)) {
			unset($this->items[$idProduto]);
		}
	}

	//metodo que mostra o total do pedido
	public function mostraTotal(){
		$total = 0;
		foreach ($this->items as $item) {
			$total += $item->listaSubTotal();
		}
		return $total;
	}

	//metodo que lista os items do pedido
	public function listaItemsPedido(){
		return $this->items;
	}

	// caso a sessão seja destruida, salva as informações do pedido
	public function __destruct(){
		$_SESSION['meu-pedido'] = serialize($this->items);
	}
}