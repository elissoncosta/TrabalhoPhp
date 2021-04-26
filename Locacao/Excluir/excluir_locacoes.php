<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Locação</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/Excluir.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/Listar.css">
</head>

<body>
	<nav id="menu-h">
		<?php
		include('../../menu.php');
		?>
	</nav>
	<div class="wrapper">
		<div class="campos">
			<form action="excluir_locacoes_db.php" method="post">
				<?php
				$Id = $_GET['Id'];
				?>
				<input type="hidden" name="Id" value="<?php echo $Id; ?>">
				<p>Deseja excluir o regitro número <?php echo $Id; ?>?</p>

				<button class="btn" type="submit">Sim</button>
					<a href="../Listar/listar_locacoes.php">
				<button class="btn" type="button">Não</button></a>
			</form>
		</div>
	</div>
</body>

</html>