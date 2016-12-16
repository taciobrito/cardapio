<?php 
//Adicionando titulo e cabeçalho da pagina
$titulo_pagina = "Login";
$glyphicon = "home";
$pagina = "home";

	include_once DIR.DS.'App'.DS.'Templates'.DS.'cabecalho.php';
?>
<a href="?page=home">
	<img class="img-responsive logo" src="files/images/logo.png" />
</a>


<div class="formLogin panel">
	<p class="text-center"><?php include_once DIR.DS.'App'.DS.'mensagem.php';?></p>
	<!-- Formulário para iniciar pedido -->
		<form action="?page=login&action=logar" method="post" class="form">
			<div class="form-group">
		        <label for="nome">Usuário <?php include_once DIR.DS.'App'.DS.'mensagem.php';?></label>
		        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu usuário" autofocus required />
		    </div>
		    <div class="form-group">
		        <label for="senha">Senha <?php include_once DIR.DS.'App'.DS.'mensagem.php';?></label>
		        <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required />
			</div>
			<div class="text-right">
				
            <div class="btn-group" role="group">
        		<a class="btn btn-default btn-block" href="?page=home">Cancelar</a></button>
        	</div>
            <div class="btn-group" role="group">
        		<button class="btn btn-success btn-block" type="submit">Login</button>
        	</div>
			</div>
	    </form>
</div>

<?php
	include_once DIR.DS.'App'.DS.'Templates'.DS.'rodape.php';
?>