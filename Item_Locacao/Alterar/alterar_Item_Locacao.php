<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Item Locação</title>
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
		echo "<p class=\"erro\">Item não alterado! MySQL erro: {$msg}</p>";
	}

	?>
	<form action="alterar_Item_Locacao_db.php" method="post">
		<?php
		$Id = $_GET['Id'];

		$sql = "SELECT I.id_item_locacao AS Id,
		               I.sequence,
                       L.data_locacao,
                       L.data_entrega,
                       T.titulo,
					   I.locacao_id AS IdLocacao,
					   I.titulo_id AS IdTitulo
                  FROM ITEM_LOCACAO I
				  JOIN LOCACAO L ON (L.ID_LOCACAO = I.LOCACAO_ID)
                  JOIN TITULOS T ON (T.ID_TITULO = I.TITULO_ID) 
				 WHERE I.ID_ITEM_LOCACAO = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>

		<label for="Id">Código</label><br>
		<input type="text" 
		       name="Id" 
			   id="Id" 
			   maxlength="11" 
			   value="<?php echo $dado['id']; ?>" 
			   disabled="true"><br><br>
		
		<label for="sequence">Sequencia</label><br>
		<input type="number" 
		       name="sequence" 
			   id="sequence" 
			   maxlength="11" 
			   value="<?php echo $dado['sequence']; ?>"><br><br>

		<label for="Locacao">Data da Locação</label><br>
		<input type="date" 
		       name="Locacao" 
			   id="Locacao" 
			   value="<?php echo $dado['data_locacao']; ?>" 
			   disabled="true"><br><br>

		<label for="Entrega">Data Entrega</label><br>
		<input type="date" 
		       name="Entrega" 
			   id="Entrega" 
			   value="<?php echo $dado['data_entrega']; ?>" 
			   disabled="true"><br><br>
		
		<label for="IdLocacao">Locação</label><br>
		<select name="IdLocacao" id="IdLocacao">
			<?php
				$sql = "SELECT id_locacao as IdLocacao FROM locacao";
				$query = mysqli_query($conexao, $sql);
				while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $dado['IdLocacao']; ?>" 
					<?php if($dado['IdLocacao'] == $item['IdLocacao']) 
					{ ?>selected="selected"<?php } ?>><?php echo $item['IdLocacao']; ?>
				</option>
			<?php
				}
			?>
		</select><br><br>

		<label for="IdTitulo">Titulo</label><br>
		<select name="IdTitulo" id="IdTitulo">
			<?php
				$sql = "SELECT id_titulo as IdTitulo, titulo FROM titulos";
				$query = mysqli_query($conexao, $sql);
				while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $dado['IdTitulo']; ?>" 
					<?php if($dado['IdTitulo'] == $item['IdTitulo']) 
					{ ?>selected="selected"<?php } ?>><?php echo $item['titulo']; ?>
				</option>
			<?php
				}
			?>
		</select><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>