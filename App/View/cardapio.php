<!-- Cabeçalho -->
<?php 
    $titulo_pagina = "Menu de Produtos"; 
    $glyphicon = "cog";
    $pagina = "gerenciaCardapio";

    include_once DIR.DS.'App'.DS.'Templates'.DS.'cabecalho.php';

    if(isset($_POST['nomeCliente']) && isset($_POST['mesa_idMesa'])){
        $_SESSION['nomeCliente'] = $_POST['nomeCliente'];
        $_SESSION['idMesa'] = $_POST['mesa_idMesa'];
    }
?>

<!-- Conteúdo do Sistema -->
        <div class="row">
            
            <!-- Painel do Pedido -->
            <div class="col-xs-4">
                <div class="painel">
                	<img class="img-responsive logo" src="files/images/logo.png" />
                    
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">

                            <!-- Botao enviar pedido -->                  
                            <?php if(!isset($_SESSION['codigo_pedido'])){ ?>

                                <form method="post" action="?page=meu-pedido&action=enviaPedido" class="form">
                                    <input type="hidden" name="totalPedido" value="<?php echo $totalPedido; ?>">                                
                                    <button type="submit" class="btn btn-success">Enviar Pedido</button>
                                </form>

                            <!-- botao Finalizar Pedido-->                  
                            <?php } else { ?>

                                <form method="post" action="?page=meu-pedido&action=finalizaPedido" class="form">
                                    <input type="hidden" name="totalPedido" value="<?php echo $totalPedido; ?>">                                
                                    <button type="submit" class="btn btn-success">Finalizar Pedido</button>
                                </form>

                            <!-- FIM else -->                  
                            <?php } ?>
                        </div>

                        <div class="btn-group" role="group">
                            <a href="?page=meu-pedido&action=cancelaPedido" class="btn btn-warning">Cancelar Pedido</a>
                        </div>
                    </div>

                    <div class="panel panel-default meu-pedido">
                        <div class="panel-heading">
                            <h5 class="text-center"> <strong>Bem vindo(s)</strong> </h5>
                                <?php if (isset($_SESSION['codigo_pedido'])) { ?>
                                    <strong>Pedido nº</strong> <?php echo $_SESSION['codigo_pedido'].' | '; ?>
                                <?php } ?>
                                <strong>Cliente: </strong><?php echo $_SESSION['nomeCliente']; ?> |
                                <strong>Mesa: </strong> <?php echo $_SESSION['idMesa']; ?>
                                <?php include_once DIR.DS.'App'.DS.'mensagem.php'; ?>


                        </div>
                        <!-- FIM IF -->

                        <div class="panel-body">
                            <?php
                                include_once DIR.DS.'App'.DS.'View'.DS.'meu-pedido.php';
                            ?>
                        </div>

                    </div>

                </div> <!-- FIM Painel do Pedido -->
            </div>
            
            <!-- Painel do Cardápio -->
            <div class="col-xs-8">

                <div class="row">  
                    <div class="col-xs-6">
                		<div class="input-group pesquisar">
                			<span class="input-group-btn">
                                <span class="btn btn-default">
                                    Categorias
                                </span>
                            </span>

	                    	<select class="form-control" id="filtro">
							  	<option>Todas</option>
							  	<?php 
							  		foreach ($categorias as $categoria) : ?>
							  			<option class="form-control"><?php echo $categoria->getDescricao(); ?></option>
							  	<?php
							  		endforeach;
							  	?>
							</select>
                		</div>                    	
                    </div>

					<!-- Pesquisar -->                    
                    <div class="col-xs-6">
                        <div class="input-group pesquisar">
                            <input type="text" id="pesquisar" class="form-control" placeholder="Pesquise por produtos" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Relação dos Produtos -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Lista Produtos -->
                        <ul class="lista_produtos">
                            <?php foreach ($produtos as $produto) : ?>
                                <!-- Linhas de Produtos -->
                                <li>
                                	<div class="row">
                                        <div class="col-xs-8"> <!-- Imagem e nome do produto -->
                                            <img src="files/images/<?php echo $produto->getImagem(); ?>" class="img-thumbnail img-responsive" />

		                                    <h4 data-toggle="modal" data-target=".produto_<?php echo $produto->getIdProduto(); ?>">
		                                        <?php echo utf8_encode($produto->getNome()); ?>
		                                    </h4>
                                            <p> <?php echo utf8_encode($produto->getDescricao()); ?> </p>
                                		</div>

                                		<div class="col-xs-3"> <!-- Preço e quantidade do produto -->
                                     		R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?>
                                		</div>

                                        <!-- Botao de adicionar o produto -->
                                        <div class="col-xs-2"> 
	                                        <!-- Formulário de adicionar Produtos -->
	                                        <form action="?page=meu-pedido&action=adiciona" method="post" class="form">
	                                            <input type="hidden" name="idProduto" value="<?php echo $produto->getIdProduto(); ?>" />
	                                            <input class="form-control input-sm" type="number" name="quantidade" placeholder="0" required />
                                		</div>
                                		<div class="col-xs-1">
	                                            <button type="submit" class="btn btn-default btn-xs glyphicon glyphicon-share-alt"></button> 
		                                    </form>
                                		</div>
                                	</div>

                                    <!-- Detalhes do produto -->
                                    <div class="modal fade produto_<?php echo $produto->getIdProduto(); ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content modalProduto">
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                
                                                <h4 class="modal-title"><?php echo utf8_encode($produto->getNome()); ?></h4>
                                                
                                                <div class="modal-body">
                                                    
                                                    <img src="files/images/<?php echo $produto->getImagem(); ?>" class="img-rounded img-responsive" />
                                                    <strong>
                                                    R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?>
                                                    </strong>
                                                    <br />
                                                    <?php echo utf8_encode($produto->getDescricao()); ?>
                                                    <br />                                                        
                                                    <?php                                                                 
                                                        echo 'Categoria: '. $produto->categoria_nome;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   <!-- FIM Detalhes do produto -->

                                </li> <!-- FIM Linhas de Produtos -->

                            <?php
                                endforeach;
                            ?>
                        </ul> <!-- FIM Lista Produtos -->

                    </div>

                </div> <!-- FIM Relação dos Produtos -->
        
            </div> <!-- FIM Painel do Cardápio -->

        </div> <!-- FIM Conteúdo do Sistema -->


<!--Rodape-->
<?php
    include_once DIR.DS.'App'.DS.'Templates'.DS.'rodape.php';
?>