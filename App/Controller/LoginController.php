<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Usuario\Usuario;
use App\Model\Usuario\UsuarioDao;

class LoginController extends Controller{
	private $usuario;
	
	public function __construct(UsuarioDao $usuarioDao) {	
		parent::__construct();
		$this->usuario = $usuarioDao;
	}

	public function index(){
		$this->view->render('login');
	}

	public function logar(){

		if(isset($_SESSION['usuario-logado'])){
			unset($_SESSION['usuario-logado']);			
		}

		if($_POST['nome'] == '' || $_POST['senha'] == ''){
			$_SESSION['danger'] = 'Usuário ou senha não infomados!';
			header('Location: ?page=login');
			die();
		} else {
			$_usuario = new Usuario();
			$nome = $_POST['nome'];
			$senha = md5($_POST['senha']);
			$_usuario = $this->usuario->buscaPorUsuario($nome, $senha); 
			
			if($_usuario == NULL) {
				$_SESSION['danger'] = 'Usuário não existente!';
				header('Location: ?page=login');
			} else {
				$_SESSION['usuario-logado'] = $_POST['nome'];
				$_SESSION['success'] = 'Usuário Logado com sucesso!';
				header('Location: ?page=gerenciaCardapio');
			}
		}
	}
	
	public function logout(){
		if(isset($_SESSION['usuario-logado'])){
			unset($_SESSION['usuario-logado']);
			$_SESSION['success'] = 'Usuário Deslogado com sucesso!';
			header('Location: ?page=login');
		}
	}
}