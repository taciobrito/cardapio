<?php

namespace App\Model\Usuario;

class UsuarioDaoImpl implements UsuarioDao {
	
	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT u.*, f.nome AS nome_funcionario, f.cpf FROM usuario AS u
			JOIN funcionario AS f ON u.funcionario_idFuncionario = f.idFuncionario");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Usuario\Usuario');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buscaPorId($idUsuario){
		$stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE idUsuario = $idUsuario");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Usuario\Usuario');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function buscaPorUsuario($nome, $senha){
		$stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE nome = '$nome' and senha = '$senha'");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Usuario\Usuario');
		$stmt->execute();
		return $stmt->fetch();
	}
	
	public function insere(Usuario $usuario){
		$stmt = $this->pdo->prepare("INSERT INTO usuario (nome, senha, funcionario_idFuncionario) VALUES (?, ?, ?)");
		$stmt->execute(array($usuario->getNome(), md5($usuario->getSenha()), $usuario->getFuncionario_idFuncionario()));
	}

	public function atualiza(Usuario $usuario){
		$stmt = $this->pdo->prepare("UPDATE usuario SET nome = ?, senha = ?, funcionario_idFuncionario = ? 
			WHERE idUsuario = ?");
		$stmt->execute(array($usuario->getNome(), md5($usuario->getSenha()), 
			$usuario->getFuncionario_idFuncionario(), $usuario->getIdUsuario()));
	}

	public function remove($idUsuario){
		$stmt = $this->pdo->prepare("DELETE FROM usuario WHERE idUsuario = $idUsuario");
		$stmt->execute();
	}
}