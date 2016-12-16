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
			<td>
				<!-- Funcionario -->
				<?php echo $pedido->nome; ?>
				<a data-toggle="modal" data-target="#func_<?php echo $pedido->getIdPedido(); ?>">
					<span class="text-right glyphicon glyphicon-pencil"></span>
				</a>
			</td>
			<td>
				<!-- tratamento de status -->
				<?php echo $pedido->getStatus(); ?> 
				<a data-toggle="modal" data-target="#status_<?php echo $pedido->getIdPedido(); ?>">
					<span class="text-right glyphicon glyphicon-pencil"></span>
				</a>

				<!--<span class="text-<?php echo $cor; ?> glyphicon glyphicon-<?php echo $glyphicon; ?>"></span>-->
			</td>
			
			<td class="text-center">
				
				<!-- Exclui um pedido -->
				<a class="btn btn-danger btn-xs glyphicon glyphicon-remove"
					href="?page=pedido&action=excluir&idPedido=<?php echo $pedido->getIdPedido(); ?>">
			</td>
		</tr>

		<!-- Modal de detalhes do pedido -->
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

		                <?php
		                	if(isset($pedido->quantidade) and isset($pedido->nome_produto)) {
		                ?>
			                <h4>Produtos</h4>
			                <ul>
				                <?php foreach ($pedidosProdutos as $prod) { 
				                		if($prod->getIdPedido() == $pedido->getIdPedido()){
				                ?>
				                	<li><?php echo $prod->quantidade . ' x ' .$prod->nome_produto; ?></li>
				                <?php } } ?>
			                </ul>
			            <?php } ?>

		            </div>
		        </div>
		    </div>
		</div>

		<!-- Modal Alterar Status -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="status_<?php echo $pedido->getIdPedido(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content status_<?php echo $pedido->getIdPedido(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Alterar Status</h4>
		            </div>                                                   
		            <div class="modal-body">
		                <form method="post" action="?page=pedido&action=atualizaStatus" class="form">
		                	<input type="hidden" name="idPedido" value="<?php echo $pedido->getIdPedido(); ?>" />
		                	<div class="form-group">
	               				<label for="status">Status</label>
	                			<select name="status" id="status" class="form-control">
	                				<option value="<?php echo $pedido->getStatus(); ?>" selected><?php echo $pedido->getStatus(); ?></option>
	                				<option value="Em espera">Em espera</option>
	                				<option value="Efetuado">Efetuado</option>
	                				<option value="Finalizado">Finalizado</option>
	                				<option value="Cancelado">Cancelado</option>	                				
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

		<!-- Modal Alterar funcionario -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="func_<?php echo $pedido->getIdPedido(); ?>">
		    <div class="modal-dialog modal-sm" role="document">
		        <div class="modal-content func_<?php echo $pedido->getIdPedido(); ?>">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Alterar Funcionário</h4>
		            </div>                                                   
		            <div class="modal-body">
		                <form method="post" action="?page=pedido&action=atualizaFuncionario" class="form">
		                	<input type="hidden" name="idPedido" value="<?php echo $pedido->getIdPedido(); ?>" />
		                	<div class="form-group">
		                		<label for="funcionario_idFuncionario">Funcionário</label>
	                			<select name="funcionario_idFuncionario" id="funcionario_idFuncionario" class="form-control" required>
	                				<?php foreach ($funcionarios as $funcionario) : ?>
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
		            </div>
		        </div>
		    </div>
		</div>

	<?php endforeach; ?>
</table>