<!-- Verifica se há produto -->
<?php 
	if(!isset($produtos)){ ?>	
		<h4 class="text-center">Não há produtos cadastradas</h4>
<?php } else { ?>

<!-- Botao que abre modal de formulario -->
<div class="text-right form-group">
	<?php
		if($_SESSION['tab'] == 'produtos'){
			include_once DIR.DS.'App'.DS.'mensagem.php';
		}
	?>

	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#formProduto">
	  	Adicionar produto
	</button>
</div>

<!-- Lista os produtos -->
<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Preço</th>
		<th>Categoria</th>
		<th></th>
	</tr>
	
	<?php foreach ($produtos as $produto) : ?>
		<tr>
			<td><?php echo utf8_encode($produto->getNome()); ?></td>
			<td><?php echo utf8_encode($produto->getDescricao()); ?></td>
			<td><?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></td>
			<td><?php echo $produto->categoria_nome; ?></td>
			<td class="text-center">
				<!-- Abre formulário para de edição -->					
				<a class="btn btn-primary btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#produto_<?php echo $produto->getIdProduto(); ?>"></a>
				<!-- Exclui uma categoria -->
				<a class="btn btn-danger btn-xs glyphicon glyphicon-remove"
					href="?page=produto&action=excluir&idProduto=<?php echo $produto->getIdProduto(); ?>">
			</td>
		</tr>

		<!-- Modal do formulário -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="produto_<?php echo $produto->getIdProduto(); ?>">
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content produto_<?php echo $produto->getIdProduto(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Editar produto</h4>
		            </div>                                                   
		            <div class="modal-body">

		            	<!-- Formulário de edição de Produto -->
		                <form method="post" action="?page=produto&action=salvar" class="form" enctype="multipart/form-data">
		                	<div class="form-group col-xs-6">
		               			<input type="hidden" name="idProduto" value="<?php echo $produto->getIdProduto(); ?>" />
	               				<label for="nome">Nome</label>
	                			<input type="text" name="nome" id="nome" class="form-control" placeholder="nome" required
		                				value="<?php echo utf8_encode($produto->getNome()); ?>" />
		                	</div>

		                	<div class="form-group col-xs-6">
		                		<label for="categoria">Categoria</label>
	                			<select name="categoria_idCategoria" id="categoria" class="form-control" required>
	                				<?php foreach ($categorias as $categoria) : ?>	                					?>
	                					<option value="<?php echo $categoria->getIdCategoria();?>" 
	                						<?php if($categoria->getDescricao() == $produto->categoria_nome) {echo 'selected';}?> > 
	                							<?php echo $categoria->getDescricao();?>
	              						</option>
	                				<?php endforeach; ?>
	                			</select>
		                	</div>

		                	<div class="form-group col-xs-6">
	               				<label for="imagem">Imagem</label>
	                			<input type="file" name="imagem" id="imagem" class="form-control" value="<?php echo $produto->getImagem(); ?>" />
		                	</div>

		                	<div class="form-group col-xs-6">
	               				<label for="preco">Preço</label>
	                			<input type="text" name="preco" id="preco" class="form-control" placeholder="00,00" required
		                				value="<?php echo number_format($produto->getPreco(), 2, ',', '.'); ?>" />
		                	</div>

		                	<div class="form-group col-xs-6 imagem">
		                		<img class="img-rounded img-responsive" src="files/images/<?php echo $produto->getImagem(); ?>" />
		                	</div>

		                	<div class="form-group col-xs-6">
		                		<label for="descricao">Descrição</label>
	                			<textarea type="text" name="descricao" id="descricao" class="form-control" placeholder="descricao" rows="4"><?php echo utf8_encode($produto->getDescricao()); ?></textarea>
		                	</div>

		                	<div class="text-right">
		                		<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>Cancelar</button>
		                		<button type="submit" class="btn btn-success">Salvar</button>
		                	</div>
		                </form>

		            </div>
		        </div>
		    </div>
		</div>


	<?php endforeach; ?>
</table>

<!-- FIM IF -->
<?php } ?>


<!-- Formulário de cadastro -->
<div class="modal fade" id="formProduto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content formProduto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar Produto</h4>
            </div>                                                   
            <div class="modal-body">

            	<!-- Formulário de Categoria -->
                <form method="post" action="?page=produto&action=salvar" class="form" enctype="multipart/form-data">
	            	<div class="form-group col-xs-6">
	       				<label for="nome">Nome</label>
	        			<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do produto" required />
	            	</div>

	            	<div class="form-group col-xs-6">
	            		<label for="categoria">Categoria</label>
	        			<select name="categoria_idCategoria" id="categoria" class="form-control" required>
	        				<?php foreach ($categorias as $categoria) : ?>	                					?>
	        					<option value="<?php echo $categoria->getIdCategoria();?>"> 
	        							<?php echo $categoria->getDescricao();?>
	      						</option>
	        				<?php endforeach; ?>
	        			</select>
	            	</div>

	            	<div class="form-group col-xs-6">
	       				<label for="imagem">Imagem</label>
	        			<input type="file" name="imagem" id="imagem" class="form-control" />
	            	</div>

	            	<div class="form-group col-xs-6">
	       				<label for="preco">Preço</label>
	        			<input type="text" name="preco" id="preco" class="form-control" placeholder="00,00" required />
	            	</div>	            

	            	<div class="form-group col-xs-12">
	            		<label for="descricao">Descrição</label>
	        			<textarea type="text" name="descricao" id="descricao" class="form-control" placeholder="Adicione detalhes do produto..." rows="4"></textarea>
	            	</div>

	            	<div class="text-right">
	            		<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>Cancelar</button>
	            		<button type="submit" class="btn btn-success">Salvar</button>
	            	</div>
	            </form>

            </div>
        </div>
    </div>
</div>

