<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Mesa\Mesa;
use App\Model\Mesa\MesaDao;

class MesaController extends Controller{
	private $mesa;

	function __construct(MesaDao $mesaDao){
		parent::__construct();
		$this->mesa = $mesaDao;
	}

	public function index(){
		$this->view->set('mesas', $this->mesa->listaTodos());
		$this->view->render('mesa');
	}

	public function salvar(){
		$_mesa = new Mesa();
		$_mesa->setNumeroMesa($_POST['numeroMesa']);
		
		if(isset($_POST['idMesa'])){
			$_mesa->setIdMesa($_POST['idMesa']);
			$this->mesa->atualiza($_mesa);
			$_SESSION['success'] = 'Mesa atualizada com sucesso!';
		} else {
			$this->mesa->insere($_mesa);
			$_SESSION['success'] = 'Mesa cadastrada com sucesso!';
		}

		$_SESSION['tab'] = 'mesas';
		header("Location: ?page=gerenciaCardapio");
	}

	public function excluir(){
		$idMesa = $_GET['idMesa'];
		$this->mesa->remove($idMesa);
		$_SESSION['success'] = 'Categoria excluída com sucesso!';

		$_SESSION['tab'] = 'mesas';
		
		header("Location: ?page=gerenciaCardapio");
	}
}