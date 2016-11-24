<?php

namespace App\Model\Pedido_Produto;

interface Pedido_ProdutoDao {
	
	public function listaTodos();
	public function insere(Pedido_Produto $pedido_produto);
	public function atualiza($idPedido, $idProduto, $quantidade);
	public function remove($idPedido, $idProduto, $quantidade);
}