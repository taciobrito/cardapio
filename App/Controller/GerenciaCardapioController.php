<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Pedido\PedidoDao;
use App\Model\Categoria\CategoriaDao;
use App\Model\Produto\ProdutoDao;
use App\Model\Mesa\MesaDao;
use App\Model\Usuario\UsuarioDao;
use App\Model\Funcionario\FuncionarioDao;

class GerenciaCardapioController extends Controller {
	private $pedido;
	private $categoria;
	private $produto;
	private $mesa;
	private $usuario;
	private $funcionario;

	public function __construct(PedidoDao $pedidoDao, CategoriaDao $categoriaDao, ProdutoDao $produtoDao, 
		MesaDao $mesaDao, UsuarioDao $usuarioDao, FuncionarioDao $funcionarioDao){
		parent::__construct();
		$this->pedido = $pedidoDao;
		$this->categoria = $categoriaDao;
		$this->produto = $produtoDao;
		$this->mesa = $mesaDao;
		$this->usuario = $usuarioDao;
		$this->funcionario = $funcionarioDao;
	}

	public function index(){
		//if(isset($_SESSION['usuario-logado'])){
			$this->view->set('mesas', $this->mesa->listaTodos());
			$this->view->set('categorias', $this->categoria->listaTodos());
			$this->view->set('produtos', $this->produto->listaTodos());
			$this->view->set('pedidos', $this->pedido->listaPedidosPorData());
			$this->view->set('pedidosProdutos', $this->pedido->listaPedidosProdutos());
			$this->view->set('usuarios', $this->usuario->listaTodos());
			$this->view->set('funcionarios', $this->funcionario->listaTodos());
			$this->view->render('gerenciaCardapio');
		//} else {
		//	$_SESSION['info'] = 'Acesso restrito, é necessário estar logado!';
		//	header('Location: ?page=login');
		//	die();
		//}

	}
}