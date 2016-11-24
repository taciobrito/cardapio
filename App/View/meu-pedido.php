
<!-- condição para litar os itens -->
<?php
	if($itemsPedidos == NULL){ 
?>
	<h5 class='text-center'>
		< < Pedido Vazio > >
	</h5>
<?php
	} else {
?>

<ul>
	<?php foreach ($itemsPedidos as $item) : ?>
        <li>
        	<div class="row">
	        	<!-- produto -->
	        	<?php echo $item->listaQuantidade(); ?> x 
	            <?php echo utf8_encode($item->listaProduto()->getNome()); ?>

				<?php echo number_format($item->listaSubTotal(), 2, ',', '.'); ?>
				
				<!-- Remover produto da lista -->
	            <a class="btn btn-danger btn-xs glyphicon glyphicon-remove" 
	            	href="?page=meu-pedido&action=deleta&idProduto=<?php echo $item->listaProduto()->getIdProduto(); ?>"></a>
				
				<!-- alterar quantidade -->
				<a href="?page=meu-pedido&action=atualiza&opcao=menos&idProduto=<?php echo $item->listaProduto()->getIdProduto();?>&quantidade=<?php echo $item->listaQuantidade(); ?>"><span class="btn btn-default btn-xs glyphicon glyphicon-chevron-down"></span></a>
				
				<a href="?page=meu-pedido&action=atualiza&opcao=mais&idProduto=<?php echo $item->listaProduto()->getIdProduto();?>&quantidade=<?php echo $item->listaQuantidade(); ?>"><span class="btn btn-default btn-xs glyphicon glyphicon-chevron-up"></span></a>

        	</div>
        </li>
    <?php endforeach; ?>       
</ul>
<hr />

<h5 class="text-right"><strong>Total:</strong> R$ <?php echo number_format($totalPedido, 2, ',','.'); ?></h5>

<?php 
	}
?>
