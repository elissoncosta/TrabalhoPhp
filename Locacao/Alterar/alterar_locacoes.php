<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Locação</title>
	<link rel="stylesheet" type="text/css" href="../Styles/site.css">
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($erro == 3) {
		echo "<p class=\"erro\">Locação não alterada! MySQL erro: {$msg}</p>";
	}
	?>

	<form action="alterar_locacoes_db.php" method="post">
		<?php
		$Id = $_GET['Id'];

		$sql = "SELECT id_locacao AS Id,
		               valor,
					   cliente_id AS IdCliente,
					   data_locacao,
					   data_entrega
				  FROM LOCACAO WHERE ID_LOCACAO = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
		<input type="hidden" name="Id" value="<?php echo $Id; ?>">

		<label for="codigo">Código</label><br>
		<input type="text" 
		       name="codigo" 
			   id="codigo" 
			   maxlength="11" value="<?php echo $dado['Id']; ?>" disabled="true"><br><br>

		<label for="IdCliente">Cliente</label><br>
		<select name="IdCliente" id="IdCliente">
			<?php
			$sql = "SELECT ID_CLIENTE AS IdCliente, nome FROM CLIENTE";
			$query = mysqli_query($conexao, $sql);

			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdCliente']; ?>" 
					<?php if ($dado['IdCliente'] == $item['IdCliente']) 
					{ ?>selected="selected" <?php } ?>><?php echo $item['nome']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="Valor">Valor</label><br>
		<input type="number" 
		       name="Valor" 
			   id="Valor" 
			   value="<?php echo $dado['valor']; ?>"><br><br>

		<label for="Locacao">Data Locacao</label><br>
		<input type="date" 
		       name="Locacao" 
			   id="Locacao" 
			   value="<?php echo $dado['data_locacao']; ?>"><br><br>

		<label for="Entrega">Data Entrega</label><br>
		<input type="date" 
		       name="Entrega" 
			   id="Entrega" 
			   value="<?php echo $dado['data_entrega']; ?>"><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>