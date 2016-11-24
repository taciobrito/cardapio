	<!-- Rodape -->
	<div class="row">
        <div class="rodape navbar navbar-fixed-bottom">
            <span class="glyphicon glyphicon-copyright-mark"></span> Copyright - Todos os direitos reservados
        </div>    
    </div>

</div>
	<!-- Importe de JS -->
	<script src="files/js/jquery.min.js"></script>
	<script src="files/js/bootstrap.min.js"></script>

	<!-- Altura do painel lateral -->
	<script type="text/javascript">
	    function redimensionar(){
	    	var altura = $(window).height();
	        $('.painel').css('min-height', altura);
	        $('.lista_produtos').css('height', altura-170);
	    }

 		window.addEventListener("orientationchange", function () {
		    redimensionar();
		}, false);

		window.addEventListener("resize", function () {
		    redimensionar();
		}, false);

		$(document).on('ready', function () {
		    redimensionar();
		});

	</script>

	<!-- Clique na tab apos retorno de metodo de crud -->
	<?php 
		if(isset($_SESSION['tab'])) {	
	?>
			<script type="text/javascript">
				$('#tab<?php echo $_SESSION['tab']; ?>').click();
			</script>
	<?php
		}
		unset($_SESSION['tab']);
	?>

	<!-- Filtro e pesquisar -->
	<script type="text/javascript">
		$(function(){
			$("#pesquisar").keyup(function(){
				var texto = $(this).val();
				
				$(".lista_produtos li").css("display", "block");
				$(".lista_produtos li").each(function(){
					if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
					$(this).css("display", "none");
				});
			});
		});
	</script>

</body>
</html>