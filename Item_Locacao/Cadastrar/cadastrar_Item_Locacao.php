<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Distribuidores</title>
	<link rel="stylesheet" type="text/css" href="../Styles/site.css">
</head>

<body>
	<?php
	include('../../menu.php');
	include('../../conexao.php ');
	?>
	<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($erro == 2) {
		echo "<p class=\"erro\">Distribuidor não cadastrado! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="cadastrar_Item_Locacao_db.php" method="post">
		<label for="Sequence">Sequencia</label><br>
		<input type="number" name="Sequence" id="Sequence" maxlength="30"><br><br>

		<label for="IdLocacao">Locação</label><br>		
		<select name="IdLocacao" id="IdLocacao">
			<?php
			$sql = "SELECT ID_LOCACAO AS IdLocacao FROM LOCACAO";
			$query = mysqli_query($conexao, $sql);

			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdLocacao']; ?>">
				<?php echo $item['IdLocacao']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="IdTitulo">Titulo</label><br>
		<select name="IdTitulo" id="IdTitulo">
			<?php
			$sql = "SELECT ID_TITULO AS IdTitulo, TITULO FROM titulos";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdTitulo']; ?>">
					<?php echo $item['TITULO']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<button type="submit">Cadastrar</button>
	</form>
</body>

</html>