<?php

namespace App\Model\Funcionario;

interface FuncionarioDao {
	public function listaTodos();
	public function buscaPorId($idFuncionario);
	public function insere(Funcionario $funcionario);
	public function atualiza(Funcionario $funcionario);
	public function remove($idFuncionario);
}