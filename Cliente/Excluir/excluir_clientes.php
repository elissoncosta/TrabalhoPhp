<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Clientes</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/Excluir.css">

</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<div class="wrapper">
		<div class="campos">
			<form action="excluir_clientes_db.php" method="post">
				<?php
				$Id = $_GET['Id'];
				?>
				<input type="hidden" 
					name="Id" 
					value="<?php echo $Id; ?>">
					
				<p>Deseja excluir o regitro número <?php echo $Id; ?>?</p>

				<button class="btn" type="submit">Sim</button>
					<a href="../Listar/listar_clientes.php">
				<button class="btn" type="button">Não</button></a>				
			</form>
		</div>
	</div>
</body>

</html>