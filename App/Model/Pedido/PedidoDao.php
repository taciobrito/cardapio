<?php

namespace App\Model\Pedido;

interface PedidoDao {
	
	public function listaTodos();
	public function listaPedidosPorData();
	public function buscaPorId($idPedido);
	public function insere(Pedido $pedido);
	public function atualiza(Pedido $pedido);
	public function remove($idPedido);
}