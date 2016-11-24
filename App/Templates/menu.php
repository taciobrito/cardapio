<!-- lateral -->
<div class="col-xs-4">
	<div class="painel">
			
		<!-- logo -->
		<div class="row">
			<a href="?page=gerenciaCardapio">
				<img class="img-responsive logo" src="files/images/logo.png" />
			</a>
			<h4 class="text-center">
				Bem vindo <?php echo $_SESSION['usuario-logado']; ?>
			</h4>
		</div>

		<!-- Menu lateral  class="list-group-item"-->
		<div class="row">
			<div class="menuGerencial">
			 	<div class="list-group" role="tablist">
				  	
				  	<a href="#pedidos" id="tabpedidos" aria-controls="pedidos" role="tab" data-toggle="tab"><div role="presentation" class="list-group-item">
				  		<span class="glyphicon glyphicon-list-alt"></span> Pedidos
				  	</div></a>
				    
				    <a href="#produtos" id="tabprodutos" aria-controls="produtos" role="tab" data-toggle="tab"><div role="presentation" class="list-group-item">
				    	<span class="glyphicon glyphicon-cutlery"></span> Produtos
				    </div></a>
				    
				    <a href="#categorias" id="tabcategorias" aria-controls="categorias" role="tab" data-toggle="tab"><div role="presentation" class="list-group-item">
				    	<span class="glyphicon glyphicon-tag"></span> Categorias
				    </div></a>
				    
				    <a href="#mesas" id="tabmesas" aria-controls="mesas" role="tab" data-toggle="tab"><div role="presentation" class="list-group-item">
				    	<span class="glyphicon glyphicon-th-large"></span> Mesas
				    </div></a>
				    
				    <a href="#usuarios" id="tabusuarios" aria-controls="usuarios" role="tab" data-toggle="tab"><div role="presentation" class="list-group-item">
				    	<span class="glyphicon glyphicon-user"></span> Usuários
				    </div></a>
			  	</div>
			</div>
		</div> <!-- FIM Menu lateral -->

	</div> <!-- FIM PAINEL -->
</div> <!-- FIM lateral -->

