<?php 
//Adicionando titulo e cabeçalho da pagina
$titulo_pagina = "Home";
$glyphicon = "cog";
$pagina = "gerenciaCardapio";

	include_once DIR.DS.'App'.DS.'Templates'.DS.'cabecalho.php';
?>

<img class="img-responsive logo" src="files/images/logo.png" />

<!-- Formulário para iniciar pedido -->
<div class="formNovoPedido panel">
	<!-- Mensagem -->
	<?php include_once DIR.DS.'App'.DS.'mensagem.php';?>

	<form action="?page=cardapio" method="post" class="form">
		<div class="form-group">
	        <label for="nomeCliente">Cliente</label>
	        <input type="text" name="nomeCliente" id="nomeCliente" class="form-control" placeholder="Informe seu nome" required autofocus>

	        <label for="mesa_idMesa">Mesa</label>
	        <select name="mesa_idMesa" id="mesa_idMesa" class="form-control" size="4" required>
	        	<!-- Lista Mesas -->
	        	<?php foreach ($mesas as $mesa) : ?>
	        		<option value="<?php echo $mesa->getIdMesa(); ?>">Mesa - <?php echo $mesa->getNumeroMesa(); ?></option>
	        	<?php endforeach; ?>
	        </select>
		</div>

        <button class="btn btn-success btn-block" type="submit">Acesse aqui o nosso cardápio</button>
    </form>
</div>

<?php
	include_once DIR.DS.'App'.DS.'Templates'.DS.'rodape.php';
?>
