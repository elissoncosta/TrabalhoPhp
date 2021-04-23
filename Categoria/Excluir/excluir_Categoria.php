<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Categoria</title>
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<form action="excluir_Categoria_db.php" method="post">
	<?php
		$Id = $_GET['Id'];
		?>
		<input type="hidden" 
		       name="Id" 
			   value="<?php echo $Id; ?>">
			   
		<p>Deseja excluir o regitro número <?php echo $Id; ?>?</p>

		<button type="submit">Sim</button>
		<a href="../Listar/listar_Categoria.php"><button type="button">Não</button></a>
	</form>
</body>

</html>