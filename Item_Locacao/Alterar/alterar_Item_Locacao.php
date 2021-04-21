<?php
include('conexao.php');
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

		$sql = "SELECT I.ID_ITEM_LOCACAO,
                       L.DATA_LOCACAO,
                       L.DATA_ENTREGA,
                       T.TITULO
                  FROM ITEM_LOCACAO I
				  JOIN LOCACAO L ON (L.ID_LOCACAO = I.LOCACAO_ID)
                  JOIN TITULOS T ON (T.ID_TITULO = I.TITULO_ID) 
				 WHERE I.ID_ITEM_LOCACAO = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>

		<label for="Id">Código</label><br>
		<input type="text" 
		       name="Id" 
			   id="Id" 
			   maxlength="11" value="<?php echo $item['ID_ITEM_LOCACAO']; ?>" 
			   disabled="true"><br><br>

		<label for="Locacao">Data da Locação</label><br>
		<input type="date" 
		       name="Locacao" 
			   id="Locacao" 
			   value="<?php echo $item['DATA_LOCACAO']; ?>" 
			   disabled="true"><br><br>

		<label for="Entrega">Data Entrega</label><br>
		<input type="date" 
		       name="Entrega" 
			   id="Entrega" 
			   value="<?php echo $item['DATA_ENTREGA']; ?>" 
			   disabled="true"><br><br>

		<label for="Titulo">Titulo</label><br>
		<input type="text" 
		       name="Titulo" 
			   id="Titulo" 
			   value="<?php echo $item['TITULO']; ?>" 
			   maxlength="200"><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>