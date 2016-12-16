<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Pedido\Pedido;
use App\Model\Pedido\PedidoDao;
use App\Model\Pedido\PedidoAtual;
use App\Model\Pedido\ItemPedido;
use App\Model\Produto\ProdutoDao;
use App\Model\Produto\Produto;
use App\Model\Pedido_Produto\Pedido_Produto;
use App\Model\Pedido_Produto\Pedido_ProdutoDao;

class PedidoController extends Controller {
	private $produto;
	private $pedido;
	private $pedidoAtual;
	private $pedido_produto;

	public function __construct(ProdutoDao $produtoDao, PedidoDao $pedidoDao, PedidoAtual $pedidoAtual,
			Pedido_ProdutoDao $pedido_produtoDao){

		parent::__construct();
		$this->produto = $produtoDao;
		$this->pedido = $pedidoDao;
		$this->pedidoAtual = $pedidoAtual;
		$this->pedido_produto = $pedido_produtoDao; 
	}

	public function index(){
		$this->view->render('cardapio');
	}

	// Adiciona um produto como item do pedido a ser enviado
	public function adiciona(){
		if(isset($_POST['idProduto']) && preg_match("/^[0-9]+/", $_POST['idProduto'])){
			$_produto = $this->produto->buscaPorId($_POST['idProduto']);
			$itemPedido = new ItemPedido($_produto, $_POST['quantidade']);
			$this->pedidoAtual->adiciona($itemPedido);
		}
		header("Location: ?page=cardapio");
	}

	// Atualiza um produto do pedido
	public function atualiza(){
		if(isset($_GET['idProduto']) && preg_match("/^[0-9]+/", $_GET['idProduto'])){
			$_produto = $this->produto->buscaPorId($_GET['idProduto']);
			$_quantidade = $_GET['quantidade'];
			$opcao = $_GET['opcao'];
			
			$_quantidade = ($opcao == "mais") ? $_quantidade += 1 :  $_quantidade -= 1;

			$itemPedido = new ItemPedido($_produto, $_quantidade);
			$this->pedidoAtual->atualiza($itemPedido);
		}
		header("Location: ?page=cardapio");
	}

	// deleta um produto do pedido
	public function deleta(){
		if(isset($_GET['idProduto']) && preg_match("/^[0-9]+/", $_GET['idProduto'])){
			$this->pedidoAtual->deleta($_GET['idProduto']);
		}
		header("Location: ?page=cardapio");
	}

	// Método que executa o envio do pedido e grava no BD
	public function enviaPedido(){
		// gera o codigo do pedido e adiciona na sessão
		$_SESSION['codigo_pedido'] = 'P'.date('His');
		// armazena a data e hora atual
		$data_hora = date('Y/m/d H:i:s');
		// Cria novo pedido
		$_pedido = new Pedido();
		$_pedido->setCodigoPedido($_SESSION['codigo_pedido']);
		$_pedido->setStatus('Em espera');
		$_pedido->setData_hora($data_hora);
		$_pedido->setTotalPedido($_POST['totalPedido']);
		$_pedido->setNomeCliente($_SESSION['nomeCliente']);
		$_pedido->setFuncionario_idFuncionario(null);
		$_pedido->setMesa_idMesa($_SESSION['idMesa']);
		// insere  pedido criado acima
		$this->pedido->insere($_pedido);
		
		// Recupera o ID do pedido adicionado acima
		$ultimoPedido = $this->pedido->buscaUltimoIdCadastrado($_SESSION['codigo_pedido'], $data_hora);
		//Cria um novo objeto que 
		$_pedido_produto = new Pedido_Produto();
		$_pedido_produto->setPedido_IdPedido($ultimoPedido->getIdPedido());

		if(isset($_SESSION['meu-pedido'])){
			// recupera a lista dos produtos enviados no pedido
			$itemsEnviados = $this->pedidoAtual->listaItemsPedido();
			foreach ($itemsEnviados as $item) :
				// relaciona pedido e produto		
				$_pedido_produto->setProduto_idProduto($item->listaProduto()->getIdProduto());
				$_pedido_produto->setQuantidade($item->listaQuantidade());

				// insere na tabela o pedido e o produto relacionados
				$this->pedido_produto->insere($_pedido_produto);
			endforeach;
		}
		$_SESSION['success'] = 'Pedido enviado com sucesso!';
		header("Location: ?page=cardapio");
	}

	// Essa é uma função que cancela pedido
	public function cancelaPedido(){
		unset($_SESSION['nomeCliente']);
		unset($_SESSION['idMesa']);
		unset($_SESSION['codigo_pedido']);
		
		if(isset($_SESSION['meu-pedido'])){
			$itemsAdicionados = $this->pedidoAtual->listaItemsPedido();
			foreach ($itemsAdicionados as $item) :
				$this->pedidoAtual->deleta($item->listaProduto()->getIdProduto());
			endforeach; 
		}
		$_SESSION['success'] = 'Pedido Cancelado!';
		header("Location: ?page=home");
	}

	// Método de exclusão de pedido
	public function excluir(){
		$idPedido = $_GET['idPedido'];
		$this->pedido->remove($idPedido);
		$_SESSION['success'] = 'Pedido excluido com sucesso!';

		$_SESSION['tab'] = 'pedidos';
		header("Location: ?page=gerenciaCardapio");
	}

	public function atualizaStatus(){
		$this->pedido->atualizaStatus($_POST['idPedido'], $_POST['status']);
		$_SESSION['tab'] = 'pedidos';
		header("Location: ?page=gerenciaCardapio");
	}

	public function atualizaFuncionario(){
		$this->pedido->atualizaFuncionario($_POST['idPedido'], $_POST['funcionario_idFuncionario']);
		$_SESSION['tab'] = 'pedidos';
		header("Location: ?page=gerenciaCardapio");
	}
}