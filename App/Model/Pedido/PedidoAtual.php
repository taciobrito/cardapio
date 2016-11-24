<?php

namespace App\Model\Pedido;

interface PedidoAtual {
	public function adiciona(ItemPedido $item);
	public function atualiza(ItemPedido $item);
	public function deleta($idProduto);
	public function existe($idProduto);
	public function mostraTotal();
	public function listaItemsPedido();
}