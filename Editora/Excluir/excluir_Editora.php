<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Editora</title>
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<form action="excluir_Editora_db.php" method="post">
		<?php
		$Id = $_GET['ID_EDITORA'];
		?>
		<input type="hidden" name="Id" value="<?php echo $Id; ?>">
		<p>Deseja excluir o regitro número <?php echo $Id; ?>?</p>

		<button type="submit">Sim</button>
		<a href="../Listar/listar_Editora.php"><button type="button">Não</button></a>
	</form>
</body>

</html>