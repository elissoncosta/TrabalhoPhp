<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Locação</title>
	<link rel="stylesheet" type="text/css" href="../Styles/site.css">
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($erro == 2) {
		echo "<p class=\"erro\">Locação não cadastrada! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="cadastrar_locacoes_db.php" method="post">
		<label for="Id">Cliente</label><br>
		<select name="Id" id="Id">
			<?php
			$sql = "SELECT ID_CLIENTE as Id, NOME FROM CLIENTE";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['Id']; ?>">
					<?php echo $item['NOME']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="Valor">Valor</label><br>
		<input type="number"
		       name="Valor"
		       id="Valor"><br><br>

		<label for="Locacao">Data Locação</label><br>
		<input type="date"
		       name="Locacao"
		       id="Locacao"><br><br>

		<label for="Entrega">Data Entrega</label><br>
		<input type="date" 
		       name="Entrega" 
		       id="Entrega"><br><br>

		<button type="submit">Cadastrar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>