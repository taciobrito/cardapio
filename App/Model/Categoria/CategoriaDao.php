<?php

namespace App\Model\Categoria;

interface CategoriaDao {
	public function listaTodos();
	public function buscaPorId($idCategoria);
	public function insere(Categoria $categoria);
	public function atualiza(Categoria $categoria);
	public function remove($idCategoria);
}