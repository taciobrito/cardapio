<?php 
	//mensagem de sucesso
	if(isset($_SESSION['success'])) { 
?>
	<span class="text-success glyphicon glyphicon-ok-sign"> <?php echo $_SESSION['success']; ?></span>
<?php 
	} unset($_SESSION['success']);

	//mensagem de erro
	if(isset($_SESSION['danger'])) { 
?>
	<span class="text-danger glyphicon glyphicon-exclamation-sign"> <?php echo $_SESSION['danger']; ?></span>
<?php 
	} unset($_SESSION['danger']);


	//mensagem de informação
	if(isset($_SESSION['info'])) { 
?>
	<span class="text-info glyphicon glyphicon-info-sign"> <?php echo $_SESSION['info']; ?></span>
<?php 
	} unset($_SESSION['info']);
?>