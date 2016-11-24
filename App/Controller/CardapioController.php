<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Produto\ProdutoDao;
use App\Model\Categoria\CategoriaDao;
use App\Model\Pedido\PedidoAtual;

class CardapioController extends Controller{
	private $produto;
	private $categoria;
	private $pedidoAtual;

	public function __construct(ProdutoDao $produtoDao, CategoriaDao $categoriaDao, PedidoAtual $pedidoAtual){
		parent::__construct();
		$this->produto = $produtoDao;
		$this->categoria = $categoriaDao;
		$this->pedidoAtual = $pedidoAtual;
	}

	public function index(){
		$this->view->set('produtos', $this->produto->listaTodos());
		$this->view->set('categorias', $this->categoria->listaTodos());
		$this->view->set('totalPedido', $this->pedidoAtual->mostraTotal());
		$this->view->set('itemsPedidos', $this->pedidoAtual->listaItemsPedido());
		$this->view->render("cardapio");
	}
}