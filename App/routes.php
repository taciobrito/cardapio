<?php

//Controle de chamadas de páginas
$page = isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//Minhas Rotas
switch ($page) {
	case 'cardapio':
		$pedidoSession = new App\Model\Pedido\PedidoSession();
		$cardapio = new App\Controller\CardapioController($produtoDao, $categoriaDao, $pedidoSession);
		call_user_func_array(array($cardapio, $action), array());
		break;

	case 'meu-pedido':
		$pedidoSession = new App\Model\Pedido\PedidoSession();
		$pedido = new App\Controller\PedidoController($produtoDao, $pedidoDao, $pedidoSession, $pedido_produtoDao);
		call_user_func_array(array($pedido, $action), array());
		break;

	case 'pedido':
		$pedidoSession = new App\Model\Pedido\PedidoSession();
		$pedido = new App\Controller\PedidoController($produtoDao, $pedidoDao, $pedidoSession, $pedido_produtoDao);
		call_user_func_array(array($pedido, $action), array());
		break;

	case 'gerenciaCardapio':
		$gerencia = new App\Controller\GerenciaCardapioController($pedidoDao, $categoriaDao, $produtoDao, 
			$mesaDao, $usuarioDao, $funcionarioDao);
		call_user_func_array(array($gerencia, $action), array());
		break;

	case 'login':
		$login = new App\Controller\LoginController($usuarioDao);
		call_user_func_array(array($login, $action), array());
		break;
		
	case 'categoria':
		$categoria = new App\Controller\CategoriaController($categoriaDao);
		call_user_func_array(array($categoria, $action),array());
		break;

	case 'produto':
		$produto = new App\Controller\ProdutoController($produtoDao, $categoriaDao);
		call_user_func_array(array($produto, $action),array());
		break;

	case 'mesa':
		$mesa = new App\Controller\MesaController($mesaDao);
		call_user_func_array(array($mesa, $action),array());
		break;

	case 'usuario':
		$usuario = new App\Controller\UsuarioController($usuarioDao, $funcionarioDao);
		call_user_func_array(array($usuario, $action),array());
		break;
	
	default:
		$home = new App\Controller\HomeController($mesaDao);
		call_user_func_array(array($home, $action), array());
		break;
}