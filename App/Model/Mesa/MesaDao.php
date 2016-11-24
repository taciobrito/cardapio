<?php

namespace App\Model\Mesa;

interface MesaDao {

	public function listaTodos();
	public function buscaPorId($idMesa);
	public function insere(Mesa $mesa);
	public function atualiza(Mesa $mesa);
	public function remove($idMesa);
}