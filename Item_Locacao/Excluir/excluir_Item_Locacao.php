﻿<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Item</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/Excluir.css">
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<div class="wrapper">
		<div class="campos">
			<form action="excluir_Item_Locacao_db.php" method="post">
				<?php
				$Id = $_GET['Id'];
				?>
				<input type="hidden" name="Id" value="<?php echo $Id; ?>">
				<p>Deseja excluir o regitro número <?php echo $Id; ?>?</p>

				<button class="btn" type="submit">Sim</button>
					<a href="../Listar/listar_Item_Locacao.php">
				<button class="btn" type="button">Não</button></a>
			</form>
		</div>
	</div>
</body>

</html>