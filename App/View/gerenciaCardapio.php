<?php 
//Titulo página
$titulo_pagina = "Gerenciar Cardápio";
$glyphicon = "off";
$pagina = "login&action=logout";

	//Cabeçalho
	include_once DIR.DS.'App'.DS.'Templates'.DS.'cabecalho.php';
?>

<div class="row">

<!-- Menu lateral -->
	<?php
		include_once DIR.DS.'App'.DS.'Templates'.DS.'menu.php';
	?>
	
	<!-- Conteúdo -->
	<div class="col-xs-8">
		<div class="row">
			<div class="col-xs-12">

				<div class="tab-content">
				    <div role="tabpanel" class="tab-pane" id="pedidos">
				    	<div class="panel panel-default">
							<div class="panel-heading"><h4 class="text-center">Pedidos</h4></div>
							<div class="panel-body">
				    			<?php include_once DIR.DS.'App'.DS.'View'.DS.'pedido.php'; ?>
				    		</div>
				    	</div>
				    </div>

				    <div role="tabpanel" class="tab-pane" id="produtos">
				    	<div class="panel panel-default">
							<div class="panel-heading"><h4 class="text-center">Produtos</h4></div>
							<div class="panel-body">
								<?php include_once DIR.DS.'App'.DS.'View'.DS.'produto.php'; ?>
				    		</div>
				    	</div>
				    </div>
				    
				    <div role="tabpanel" class="tab-pane" id="categorias">
				    	<div class="panel panel-default">
							<div class="panel-heading"><h4 class="text-center">Categorias</h4></div>
							<div class="panel-body">
				    			<?php include_once DIR.DS.'App'.DS.'View'.DS.'categoria.php'; ?>
				    		</div>
				    	</div>
				    </div>
				    
				    <div role="tabpanel" class="tab-pane" id="mesas">
				    	<div class="panel panel-default">
							<div class="panel-heading"><h4 class="text-center">Mesas</h4></div>
							<div class="panel-body">
								<?php include_once DIR.DS.'App'.DS.'View'.DS.'mesa.php'; ?>
				    		</div>
				    	</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="usuarios">
				    	<div class="panel panel-default">
							<div class="panel-heading"><h4 class="text-center">Usuários</h4></div>
							<div class="panel-body">
								<?php include_once DIR.DS.'App'.DS.'View'.DS.'usuario.php'; ?>
				    		</div>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</div> <!-- FIM conteúdo -->

</div>

<!-- Rodape -->
<?php
	include_once DIR.DS.'App'.DS.'Templates'.DS.'rodape.php';
?>