<?php 

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Usuario\Usuario;
use App\Model\Usuario\UsuarioDao;
use App\Model\Funcionario\FuncionarioDao;

class UsuarioController extends Controller {
	private $usuario;
	private $fucionario;

	function __construct(UsuarioDao $usuarioDao, FuncionarioDao $funcionarioDao){
		parent::__construct();
		$this->usuario = $usuarioDao;
		$this->funcionario = $funcionarioDao;
	}

	public function index(){
		$this->view->set('usuarios', $this->usuario->listaTodos());
		$this->view->set('funcionarios', $this->funcionario->listaTodos());
		$this->view->render('usuario');
	}

	public function salvar(){
		//$senhaCript = md5($_POST['senha']);

		$_usuario = new Usuario();
		$_usuario->setNome($_POST['nome']);
		$_usuario->setSenha($_POST['senha']);
		$_usuario->setFuncionario_idFuncionario($_POST['funcionario_idFuncionario']);
		
		if(isset($_POST['idUsuario'])){
			$_usuario->setIdUsuario($_POST['idUsuario']);
			$this->usuario->atualiza($_usuario);
			$_SESSION['success'] = 'Usuário atualizado com sucesso!';

		} else {
			$this->usuario->insere($_usuario);
			$_SESSION['success'] = 'Usuário criado com sucesso!';
		}
		
		$_SESSION['tab'] = 'usuarios';
		header("Location: ?page=gerenciaCardapio");
	}

	public function excluir(){
		$idUsuario = $_GET['idUsuario'];
		$this->usuario->remove($idUsuario);
		$_SESSION['success'] = 'Usuário excluido com sucesso!';

		$_SESSION['tab'] = 'usuarios';
		header("Location: ?page=gerenciaCardapio");
	}
}