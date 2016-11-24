<?php

namespace App\Model\Mesa;

class Mesa {
	private $idMesa;
	private $numeroMesa;

	public function __construct(){
	}

	public function setIdMesa($idMesa){
		$this->idMesa = $idMesa;
	}

	public function getIdMesa(){
		return $this->idMesa;
	}

	public function setNumeroMesa($numeroMesa){
		if(empty($numeroMesa)){
			throw new \InvalidArgumentException("Numero da mesa obrigatório");
		}
		$this->numeroMesa = $numeroMesa;
	}

	public function getNumeroMesa(){
		return $this->numeroMesa;
	}
}