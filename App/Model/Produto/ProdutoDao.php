<?php

namespace App\Model\Produto;

interface ProdutoDao {

	public function listaTodos();
	public function buscaPorId($idProduto);
	public function insere(Produto $produto);
	public function atualiza(Produto $produto);
	public function remove($idProduto);
}