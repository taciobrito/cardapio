<?php

namespace App\Model\Pedido;

class PedidoDaoImpl implements PedidoDao {

	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	public function listaTodos(){
		$stmt = $this->pdo->prepare("SELECT p.*,m.numeroMesa, f.nome FROM pedido AS p LEFT JOIN mesa AS m
		ON p.mesa_idMesa = m.idMesa LEFT JOIN funcionario AS f ON p.funcionario_idFuncionario = f.idFuncionario");

		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Pedido\Pedido');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function listaPedidosPorData(){
		$stmt = $this->pdo->prepare("SELECT p.*, m.numeroMesa, f.nome, pr.nome AS nome_produto, pp.quantidade FROM pedido AS p LEFT JOIN mesa AS m
		ON p.mesa_idMesa = m.idMesa LEFT JOIN funcionario AS f ON p.funcionario_idFuncionario = f.idFuncionario 
		LEFT JOIN pedido_produto AS pp ON p.idPedido = pp.pedido_idPedido LEFT JOIN produto AS pr ON pr.idProduto = pp.produto_idProduto
		order by p.data_hora desc");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Pedido\Pedido');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buscaPorId($idPedido){
		$stmt = $this->pdo->prepare("SELECT * FROM pedido WHERE idPedido = $idPedido");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Pedido\Pedido');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function buscaUltimoIdCadastrado($codigoPedido, $data_hora){
		$stmt = $this->pdo->prepare("SELECT idPedido FROM pedido WHERE codigoPedido = '$codigoPedido' AND data_hora = '$data_hora'");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Pedido\Pedido');
		$stmt->execute();
		return $stmt->fetch();
	}

	public function insere(Pedido $pedido){
		$stmt = $this->pdo->prepare("INSERT INTO pedido (codigoPedido, status, data_hora, totalPedido, nomeCliente, funcionario_idFuncionario, mesa_idMesa) VALUES (?, ?, ?, ?, ?, ?, ?)");

		$stmt->execute(array($pedido->getCodigoPedido(), $pedido->getStatus(), $pedido->getData_hora(), $pedido->getTotalPedido(), 
			$pedido->getNomeCliente(), $pedido->getFuncionario_idFuncionario(), $pedido->getMesa_idMesa()));
	}

	public function atualiza(Pedido $pedido){
		$stmt = $this->pdo->prepare("UPDATE pedido SET codigoPedido = ?, status = ?, data_hora = ?, totalPedido = ?,
			nomeCliente = ?, funcionario_idFuncionario = ?, mesa_idMesa = ? WHERE idPedido = ?");
	
		$stmt->execute(array($pedido->getCodigoPedido(), $pedido->getStatus(), $pedido->getData_hora(), $pedido->getTotalPedido(), 
			$pedido->getNomeCliente(), $pedido->getFuncionario_idFuncionario(), $pedido->getMesa_idMesa(), $pedido->getIdPedido()));
	}

	// Atualiza Status
	public function atualizaStatus($idPedido, $status){
		$stmt = $this->pdo->prepare("UPDATE pedido SET status = $status WHERE idPedido = $idPedido");
		$stmt->execute();
	}

	// Atualiza Funcionario
	public function atualizaFuncionario($idPedido, $funcionario_idFuncionario){
		$stmt = $this->pdo->prepare("UPDATE pedido SET funcionario_idFuncionario = $funcionario_idFuncionario 
			WHERE idPedido = $idPedido");
		$stmt->execute();
	}

	// Atualiza Mesa
	public function atualizaMesa($idPedido, $mesa_idMesa){
		$stmt = $this->pdo->prepare("UPDATE pedido SET mesa_idMesa = $mesa_idMesa WHERE idPedido = $idPedido");
		$stmt->execute();
	}

	public function remove($idPedido){
		$stmt = $this->pdo->prepare("DELETE FROM pedido WHERE idPedido = $idPedido");
		$stmt->execute();
	}

}