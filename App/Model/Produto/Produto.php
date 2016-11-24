<?php

namespace App\Model\Produto;

use App\Model\Categoria\Categoria;

class Produto {
	private $idProduto;
	private $nome;
	private $descricao;
	private $imagem;
	private $preco;
	private $categoria_idCategoria;

	public function __construct(){

	}

	public function setIdProduto($idProduto){
		$this->idProduto = $idProduto;
	}

	public function getIdProduto(){
		return $this->idProduto;
	}

	public function setNome($nome){
		if(empty($nome)){
			throw new \InvalidArgumentException("Nome obrigatório");
		}
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setImagem($imagem){
		$this->imagem = $imagem;
	}

	public function getImagem(){
		return $this->imagem;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setCategoria_idCategoria($categoria_idCategoria){
		$this->categoria_idCategoria = $categoria_idCategoria;
	}

	public function getCategoria_idCategoria(){
		return $this->categoria_idCategoria;
	}
}