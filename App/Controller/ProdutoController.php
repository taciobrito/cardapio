<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Produto\Produto;
use App\Model\Produto\ProdutoDao;
use App\Model\Categoria\CategoriaDao;

class ProdutoController extends Controller {
	private $produto;
	private $categoria;
	
	function __construct(ProdutoDao $produtoDao, CategoriaDao $categoriaDao) {
		parent::__construct();
		$this->produto = $produtoDao;
		$this->categoria = $categoriaDao;
	}

	public function index(){
		$this->view->set('produtos', $this->produto->listaTodos());
		$this->view->set('categorias', $this->categoria->listaTodos());
		$this->view->render('produto');
	}

	public function salvar(){
		$nome_imagem = ''; // inicia a variável de nome da imagem
		// trata o upload da imagem
		if(isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0){
			$nome_imagem = $_FILES['imagem']['name']; //pega o nome da imagem
			$diretorio = 'files/images/' . $nome_imagem; // diretório a ser inserido
			$imagem_tmp = $_FILES['imagem']['tmp_name'];
			move_uploaded_file( $imagem_tmp, $diretorio ); // função que realiza o upload
		} else $nome_imagem = 'produto-sem-imagem.gif';
 
		$_produto = new Produto();
		$_produto->setNome($_POST['nome']);
		$_produto->setDescricao($_POST['descricao']);
		$_produto->setImagem($nome_imagem);
		$_produto->setPreco($_POST['preco']);
		$_produto->setCategoria_idCategoria($_POST['categoria_idCategoria']);
		
		if(isset($_POST['idProduto'])){
			$_produto->setIdProduto($_POST['idProduto']);
			$this->produto->atualiza($_produto);
			$_SESSION['success'] = 'Produto atualizado com sucesso!';
		} else {
			$this->produto->insere($_produto);
			$_SESSION['success'] = 'Produto criado com sucesso!';
		}
		
		$_SESSION['tab'] = 'produtos';
		header("Location: ?page=gerenciaCardapio");
	}

	public function excluir(){
		$idProduto = $_GET['idProduto'];
		$this->produto->remove($idProduto);
		$_SESSION['success'] = 'Produto excluido com sucesso!';

		$_SESSION['tab'] = 'produtos';
		header("Location: ?page=gerenciaCardapio");
	}
}