<!-- Verifica se há mesa -->
<?php 
	if(!isset($mesas)){ ?>	
		<h4 class="text-center">Não há mesas cadastradas</h4>
<?php } else { ?>

<!-- Botao que abre modal de formulario -->
<div class="text-right form-group">
	<?php
		if($_SESSION['tab'] == 'mesas'){
			include_once DIR.DS.'App'.DS.'mensagem.php';
		}
	?>

	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#formMesa">
	  Criar mesa
	</button>
</div>

<!-- Lista as mesas -->
<?php foreach ($mesas as $mesa) : ?>
	
	<div class="col-xs-3">
		<div class="panel panel-default">
		    <div class="panel-body text-center">
				<span class="glyphicon glyphicon-stop text-danger"></span><br />
				<span class="glyphicon glyphicon-stop text-danger"></span>
				<span class="mesa"><?php echo $mesa->getNumeroMesa();?></span>
				<span class="glyphicon glyphicon-stop text-danger"></span><br />
				<span class="glyphicon glyphicon-stop text-danger"></span>
		   	</div>
		  	
		  	<div class="panel-footer text-center">
		  		<div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
						<!-- Abre formulário para de edição -->					
						<a class="btn btn-primary btn-sm glyphicon glyphicon-edit" data-toggle="modal" data-target="#mesa_<?php echo $mesa->getIdMesa(); ?>"></a>
                    </div>
                    <div class="btn-group" role="group">
						<!-- Exclui uma mesa -->
						<a class="btn btn-danger btn-sm glyphicon glyphicon-remove"
							href="?page=mesa&action=excluir&idMesa=<?php echo $mesa->getIdMesa(); ?>"></a>
                    </div>
                </div>
		  	</div>
		</div>
	</div>


		<!-- Modal do formulário -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="mesa_<?php echo $mesa->getIdMesa(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content mesa_<?php echo $mesa->getIdMesa(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Editar mesa</h4>
		            </div>                                                   
		            <div class="modal-body">

		            	<!-- Formulário de edição de Categoria -->
		                <form method="post" action="?page=mesa&action=salvar" class="form">
		                	<div class="form-group">
		               			<input type="hidden" name="idMesa" value="<?php echo $mesa->getIdMesa(); ?>" />
		                		<input type="text" name="numeroMesa" class="form-control" placeholder="número da mesa" required
		                			value="<?php echo $mesa->getNumeroMesa(); ?>" />
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
<div class="modal fade" id="formMesa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content formMesa">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar mesa</h4>
            </div>                                                   
            <div class="modal-body">
            	<!-- Formulário de Categoria -->
                <form method="post" action="?page=mesa&action=salvar" class="form">
                	<div class="form-group">
                		<input type="text" name="numeroMesa" class="form-control" placeholder="número da mesa" required />
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