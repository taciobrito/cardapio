<?php

namespace App\Model\Usuario;

interface UsuarioDao {
	public function listaTodos();
	public function buscaPorId($idUsuario);
	public function buscaPorUsuario($nome, $senha);
	public function insere(Usuario $usuario);
	public function atualiza(Usuario $usuario);
	public function remove($idUsuario);
}