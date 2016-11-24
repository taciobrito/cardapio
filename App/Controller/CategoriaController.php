<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Categoria\Categoria;
use App\Model\Categoria\CategoriaDao;

class CategoriaController extends Controller {
	private $categoria;
	
	function __construct(CategoriaDao $categoriaDao) {
		parent::__construct();
		$this->categoria = $categoriaDao;
	}

	public function index(){
		$this->view->set('categorias', $this->categoria->listaTodos());
		$this->view->render('categoria');
	}

	public function salvar(){
		$_categoria = new Categoria();
		$_categoria->setDescricao($_POST['descricao']);
		
		if(isset($_POST['idCategoria'])){
			$_categoria->setIdCategoria($_POST['idCategoria']);
			$this->categoria->atualiza($_categoria);
			$_SESSION['success'] = 'Categoria atualizada com sucesso!';
		} else {
			$this->categoria->insere($_categoria);
			$_SESSION['success'] = 'Categoria criada com sucesso!';
		}
		
		$_SESSION['tab'] = 'categorias';
		header("Location: ?page=gerenciaCardapio");
	}

	public function excluir(){
		$idCategoria = $_GET['idCategoria'];
		$this->categoria->remove($idCategoria);
		$_SESSION['success'] = 'Categoria excluida com sucesso!';

		$_SESSION['tab'] = 'categorias';
		header("Location: ?page=gerenciaCardapio");
	}
}