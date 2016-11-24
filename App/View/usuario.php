<!-- Verifica se há produto -->
<?php 
	if(!isset($usuarios)){ ?>
		<h4 class="text-center">Não há usuários cadastrados</h4>
<?php } else { ?>

<!-- Botao que abre modal de formulario -->
<div class="text-right form-group">
	<?php
		if($_SESSION['tab'] == 'usuarios'){
			include_once DIR.DS.'App'.DS.'mensagem.php';
		}
	?>

	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#formUsuario">
	  	Adicionar Usuário
	</button>
</div>

<!-- Lista os produtos -->
<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>Funcionário</th>
		<th>CPF</th>
		<th>Usuário</th>
		<th></th>
	</tr>
	
	<?php foreach ($usuarios as $usuario) : ?>
		<tr>
			<td><?php echo utf8_encode($usuario->nome_funcionario); ?></td>
			<td><?php echo utf8_encode($usuario->cpf); ?></td>
			<td><?php echo utf8_encode($usuario->getNome()); ?></td>
			<td class="text-center">
				<!-- Abre formulário para de edição -->					
				<a class="btn btn-primary btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#usuario_<?php echo $usuario->getIdUsuario(); ?>"></a>
				<!-- Exclui um usuário -->
				<a class="btn btn-danger btn-xs glyphicon glyphicon-remove"
					href="?page=usuario&action=excluir&idUsuario=<?php echo $usuario->getIdUsuario(); ?>">
			</td>
		</tr>

		<!-- Modal do formulário -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="usuario_<?php echo $usuario->getIdUsuario(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content usuario_<?php echo $usuario->getIdUsuario(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Editar usuario</h4>
		            </div>                                                   
		            <div class="modal-body">

		            	<!-- Formulário de edição de Produto -->
		                <form method="post" action="?page=usuario&action=salvar" class="form">
		                	<div class="form-group">
		               			<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario(); ?>" />
	               				<label for="nome">Usuário</label>
	                			<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome de Usuário" required value="<?php echo utf8_encode($usuario->getNome()); ?>" />
		                	</div>

		                	<div class="form-group">
	               				<label for="senha">Senha</label>
	                			<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required
		                				value="<?php echo $usuario->getSenha(); ?>" />
		                	</div>

		                	<div class="form-group">
		                		<label for="funcionario">Funcionário</label>
	                			<select name="funcionario_idFuncionario" id="funcionario" class="form-control" required>
	                				<?php foreach ($funcionarios as $funcionario) : ?>	                					?>
	                					<option value="<?php echo $funcionario->getIdFuncionario();?>" 
	                						<?php if($funcionario->getIdFuncionario() == $usuario->getFuncionario_idFuncionario()) {echo 'selected';}?> > 
	                							<?php echo $funcionario->getNome();?>
	              						</option>
	                				<?php endforeach; ?>
	                			</select>
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
<div class="modal fade" id="formUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content formUsuario">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar Usuário</h4>
            </div>                                                   
            <div class="modal-body">

            	<!-- Formulário de Categoria -->
                <form method="post" action="?page=usuario&action=salvar" class="form">
	            	<div class="form-group">
	       				<label for="nome">Nome</label>
	        			<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome de Usuário" required />
	            	</div>

	            	<div class="form-group">
           				<label for="senha">Senha</label>
            			<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required />
		            </div>

	            	<div class="form-group">
	            		<label for="funcionario">Funcionário</label>
	        			<select name="funcionario_idFuncionario" id="funcionario" class="form-control" required>
	        				<?php foreach ($funcionarios as $funcionario) : ?>	                					?>
	        					<option value="<?php echo $funcionario->getIdFuncionario();?>"> 
	        							<?php echo $funcionario->getNome();?>
	      						</option>
	        				<?php endforeach; ?>
	        			</select>
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