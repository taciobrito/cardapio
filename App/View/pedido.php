<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>Código</th>
		<th>Mesa</th>
		<th>Cliente</th>
		<th>Data/Hora</th>
		<th>Funcionário</th>
		<th>Status</th>
		<th></th>
	</tr>
	<?php foreach ($pedidos as $pedido) : ?>
		<tr>
			<td>
				<a data-toggle="modal" data-target="#pedido_<?php echo $pedido->getIdPedido(); ?>"><?php echo $pedido->getCodigoPedido(); ?></a>
			</td>
			<td><?php echo $pedido->numeroMesa; ?></td>
			<td><?php echo utf8_encode($pedido->getNomeCliente()); ?></td>
			<td>
				<?php 
					$data = new DateTime($pedido->getData_hora());
					echo $data->format('H:i d/m'); 
				?>
			</td>
			<td><?php echo $pedido->nome; ?></td>
			<td>
				<!-- tratamento de status -->
				<?php
					$glyphicon = '';
					$cor = '';
					switch ($pedido->getStatus()) {
						case 'Em espera':
							$glyphicon = 'time';
							$cor = 'warning';
							break;
						
						case 'Efetuado':
							$glyphicon = 'ok-circle';
							$cor = 'success';
							break;

						case 'Finalizado':
							$glyphicon = 'ok-circle';
							$cor = 'primary';
							break;							

						case 'Cancelado':
							$glyphicon = 'remove-circle';
							$cor = 'danger';
							break;
					}

					echo $pedido->getStatus();
				?>

				<!--<span class="text-<?php echo $cor; ?> glyphicon glyphicon-<?php echo $glyphicon; ?>"></span>-->
			</td>
			
			<td class="text-center">
				
				<!-- Exclui um pedido -->
				<a class="btn btn-danger btn-xs glyphicon glyphicon-remove"
					href="?page=pedido&action=excluir&idPedido=<?php echo $pedido->getIdPedido(); ?>">
			</td>
		</tr>

		<!-- Modal do formulário -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="pedido_<?php echo $pedido->getIdPedido(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content pedido_<?php echo $pedido->getIdPedido(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Detalhes</h4>
		            </div>                                                   
		            <div class="modal-body">
			            <ul class="list-unstyled list-inline">
		            		<li>Pedido <?php echo $pedido->getCodigoPedido(); ?></li>
		            		<li class="text-right">
		            			<?php $data = new DateTime($pedido->getData_hora());
								echo $data->format('H:i d/m'); ?>
							</li>
			            </ul>

			            <!-- Formulário de edição de Pedido -->
		                <form method="post" action="?page=pedido&action=salvar" class="form">
		                	<div class="form-group">
		               			<input type="hidden" name="idPedido" value="<?php echo $pedido->getIdPedido(); ?>" />
	               				<label for="nomeCliente">Cliente</label>
	                			<input type="text" name="nomeCliente" id="nomeCliente" class="form-control" placeholder="nomeCliente" required
		                				value="<?php echo utf8_encode($pedido->getNomeCliente()); ?>" />
		                	</div>

		                	<div class="form-group">
		                		<label for="mesa_idMesa">Mesa</label>
	                			<select name="mesa_idMesa" id="mesa_idMesa" class="form-control" required>
	                				<?php foreach ($mesas as $mesa) : ?>	                					?>
	                					<option value="<?php echo $mesa->getIdMesa();?>" 
	                						<?php if($mesa->getNumeroMesa() == $pedido->numeroMesa) {echo 'selected';}?> > 
	                							<?php echo $mesa->getNumeroMesa();?>
	              						</option>
	                				<?php endforeach; ?>
	                			</select>
		                	</div>

		                	<div class="form-group">
	               				<label for="status">Status</label>
	                			<input type="text" name="status" id="status" class="form-control" value="<?php echo $pedido->getStatus(); ?>" />
		                	</div>

		                	<div class="form-group">
		                		<label for="funcionario_idFuncionario">Funcionário</label>
	                			<select name="funcionario_idFuncionario" id="funcionario_idFuncionario" class="form-control" required>
	                				<?php foreach ($funcionarios as $funcionario) : ?>	                					?>
	                					<option value="<?php echo $funcionario->getIdFuncionario();?>" 
	                						<?php if($funcionario->getNome() == $pedido->nome) {echo 'selected';}?> > 
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

		                <?php
		                	if(isset($pedido->quantidade) and isset($pedido->nome_produto)) {
		                ?>

			                <h4>Produtos</h4>

			                <ul>
			                	<li><?php echo $pedido->quantidade . ' x ' .$pedido->nome_produto; ?></li>
			                </ul>

			            <?php } ?>

		            </div>
		        </div>
		    </div>
		</div>


	<?php endforeach; ?>
</table>