<?php
session_start();
define("DIR", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);
error_reporting(E_ALL ^ E_NOTICE);

include_once DIR.DS.'App'.DS.'Loader.php';

//Chamada de função para carregar classes autoamticamente
$loader = new \App\Loader();
$loader->registrar();

//Conexao com banco
try {
	$pdo = new PDO("mysql:host=localhost;dbname=cardapio_virtual", "root", "");
} catch (PDOException $e){
	echo "<h3>Erro ao estabelecer conexão com o banco: </h3>".$e."<br /><br />";
}

//INSTANCIA DAS CLASSES
//Produto
$produtoDao = new App\Model\Produto\ProdutoDaoImpl($pdo);
//Mesa
$mesaDao = new App\Model\Mesa\MesaDaoImpl($pdo);
//Categoria
$categoriaDao = new App\Model\Categoria\CategoriaDaoImpl($pdo);
//Pedido
$pedidoDao = new App\Model\Pedido\PedidoDaoImpl($pdo);
//Usuário
$usuarioDao = new App\Model\Usuario\UsuarioDaoImpl($pdo);
//Funcionário
$funcionarioDao = new App\Model\Funcionario\FuncionarioDaoImpl($pdo);
//PedidoProduto
$pedido_produtoDao = new App\Model\Pedido_Produto\Pedido_ProdutoDaoImpl($pdo);

//Inclusão das rotas
include_once DIR.DS.'App'.DS.'routes.php';