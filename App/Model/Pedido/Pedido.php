<?php

namespace App\Model\Pedido;

class Pedido {
	private $idPedido;
	private $codigoPedido;
	private $status;
	private $data_hora;
	private $totalPedido;
	private $nomeCliente;
	private $funcionario_idFuncionario;
	private $mesa_idMesa;

	function __construct(){
	}

	public function setIdPedido($idPedido){
		$this->idPedido = $idPedido;
	}

	public function getIdPedido(){
		return $this->idPedido;
	}

	public function setCodigoPedido($codigoPedido){
		$this->codigoPedido = $codigoPedido;
	}

	public function getCodigoPedido(){
		return $this->codigoPedido;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setData_hora($data_hora){
		$this->data_hora = $data_hora;
	}

	public function getData_hora(){
		return $this->data_hora;
	}

	public function setTotalPedido($totalPedido){
		$this->totalPedido = $totalPedido;
	}

	public function getTotalPedido(){
		return $this->totalPedido;
	}

	public function setNomeCliente($nomeCliente){
		$this->nomeCliente = $nomeCliente;
	}

	public function getNomeCliente(){
		return $this->nomeCliente;
	}

	public function setFuncionario_idFuncionario($funcionario_idFuncionario){
		$this->funcionario_idFuncionario = $funcionario_idFuncionario;
	}

	public function getFuncionario_idFuncionario(){
		return $this->funcionario_idFuncionario;
	}

	public function setMesa_idMesa($mesa_idMesa){
		$this->mesa_idMesa = $mesa_idMesa;
	}

	public function getMesa_idMesa(){
		return $this->mesa_idMesa;
	}
}