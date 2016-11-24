<!-- Verifica se há categoria -->
<?php 
	if(!isset($categorias)){ ?>	
		<h4 class="text-center">Não há categorias cadastradas</h4>
<?php } else { ?>

<!-- Botao que abre modal de formulario -->
<div class="text-right form-group">
	<?php
		if($_SESSION['tab'] == 'categorias'){
			include_once DIR.DS.'App'.DS.'mensagem.php';
		}
	?>
	
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#formCategoria">
	  Criar categoria
	</button>
</div>

<!-- Lista as categorias -->
<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>#</th>
		<th>Descrição</th>
		<th></th>
	</tr>
	<?php foreach ($categorias as $categoria) : ?>
		<tr>
			<td><?php echo $categoria->getIdCategoria(); ?></td>
			<td><?php echo $categoria->getDescricao(); ?></td>
			<td class="text-center">
				<!-- Abre formulário para de edição -->					
				<a class="btn btn-primary btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#categoria_<?php echo $categoria->getIdCategoria(); ?>"></a>
				<!-- Exclui uma categoria -->
				<a class="btn btn-danger btn-xs glyphicon glyphicon-remove"
					href="?page=categoria&action=excluir&idCategoria=<?php echo $categoria->getIdCategoria(); ?>">
			</td>
		</tr>

		<!-- Modal do formulário -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="categoria_<?php echo $categoria->getIdCategoria(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content categoria_<?php echo $categoria->getIdCategoria(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Editar categoria</h4>
		            </div>                                                   
		            <div class="modal-body">
		            	<!-- Formulário de edição de Categoria -->
		                <form method="post" action="?page=categoria&action=salvar" class="form">
		                	<div class="form-group">
		               			<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria(); ?>" />
		                		<input type="text" name="descricao" class="form-control" placeholder="nome da categoria" required
		                			value="<?php echo $categoria->getDescricao(); ?>" />
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
<div class="modal fade" id="formCategoria" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content formCategoria">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar categoria</h4>
            </div>                                                   
            <div class="modal-body">
            	<!-- Formulário de Categoria -->
                <form method="post" action="?page=categoria&action=salvar" class="form">
                	<div class="form-group">
                		<input type="text" name="descricao" class="form-control" placeholder="nome da categoria" required />
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