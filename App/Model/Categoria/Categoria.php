<?php

namespace App\Model\Categoria;

class Categoria {
	private $idCategoria;
	private $descricao;
	
	public function __construct(){
	}

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}
}