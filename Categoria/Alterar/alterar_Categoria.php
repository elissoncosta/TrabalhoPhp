<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Categoria</title>
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
		echo "<p class=\"erro\">Categoria não alterada! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="alterar_Categoria_db.php" method="post">
		<?php
		$Id = $_GET['ID_CATEGORIA'];

		$sql = "SELECT ID_CATEGORIA,
		               DESCRICAO,
		               CLASSIFICACAO_INDICATIVA 
				  FROM CATEGORIA WHERE ID_CATEGORIA = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
		<input type="hidden" 
		       name="Id" 
		       value="<?php echo $Id; ?>">

		<input type="text" 
		       name="Id" 
			   id="Id" 
			   maxlength="11" 
			   value="<?php echo $Id; ?>" 
			   disabled="true"><br><br>

		<label for="nome">Descricao</label><br>
		<input type="text" 
		       name="Descricao" 
			   id="Descricao" 
			   maxlength="150" 
			   value="<?php echo $dado['DESCRICAO']; ?>"><br><br>

		<label for="Class_Indic">Classificação Indicativa</label><br>
		<input type="text" 
		       name="Class_Indic"
			   id="Class_Indic" 
			   maxlength="11" 
			   value="<?php echo $dado['CLASSIFICACAO_INDICATIVA']; ?>"><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>