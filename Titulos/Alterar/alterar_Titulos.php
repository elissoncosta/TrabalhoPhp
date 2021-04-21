<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Titulos</title>
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
		echo "<p class=\"erro\">Titulo não alterado! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="alterar_Titulos_db.php" method="post">
		<?php
		$Id = $_GET['Id'];

		$sql = "SELECT T.ID_TITULO,
                       T.TITULO,
                       T.SINOPSE,
                       T.CLASSIFICACAO,
                       T.TIPO,
                       T.CATEGORIA_ID,
                       T.EDITORA_ID,
				  FROM TITULOS T
				 WHERE ID_TITULO = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
		<input type="hidden" name="Id" value="<?php echo $Id; ?>">

		<label for="codigo">Código</label><br>
		<input type="text" name="codigo" id="codigo" maxlength="11" value="<?php echo $Id; ?>" disabled="true"><br><br>

		<label for="titulo">Título</label><br>
		<input type="text" name="titulo" id="titulo" maxlength="150" value="<?php echo $dado['titulo']; ?>"><br><br>

		<label for="sinopse">Sinopse</label><br>
		<input type="text" name="sinopse" id="sinopse" maxlength="8" value="<?php echo $dado['SINOPSE']; ?>"><br><br>

		<label for="EDITORA_ID">Distribuidor</label><br>
		<select name="EDITORA_ID" id="EDITORA_ID">
			<?php
			$sql = "SELECT ID_EDITORA, RAZAO_SOCIAL FROM EDITORA";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['ID_EDITORA']; ?>" <?php if ($dado['ID_EDITORA'] == $item['ID_EDITORA']) { ?>selected="selected" <?php } ?>>
					<?php echo $item['RAZAO_SOCIAL']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="EDITORA_ID">Distribuidor</label><br>
		<select name="CATEGORIA_ID" id="CATEGORIA_ID">
			<?php
			$sql = "SELECT ID_CATEGORIA, DESCRICAO FROM CATEGORIA";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['ID_CATEGORIA']; ?>" <?php if ($dado['ID_CATEGORIA'] == $item['ID_CATEGORIA']) { ?>selected="selected" <?php } ?>>
					<?php echo $item['DESCRICAO']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>		

		<label for="tipo_midia">Tipo Titulo</label><br>
		<select name="tipo_midia" id="tipo_midia">
			<option value="VHS" <?php if ($dado['tipo_midia'] == 'VHS') { ?>selected="selected" <?php } ?>>VHS</option>
			<option value="DVD" <?php if ($dado['tipo_midia'] == 'DVD') { ?>selected="selected" <?php } ?>>DVD</option>
			<option value="Blu-Ray" <?php if ($dado['tipo_midia'] == 'Blu-Ray') { ?>selected="selected" <?php } ?>>Blu-Ray</option>
		</select><br><br>

		<label for="classificacao">Classificação</label><br>
		<select name="classificacao" id="classificacao">
			<option value="A" <?php if ($dado['classificacao'] == 'A') { ?>selected="selected" <?php } ?>>A</option>
			<option value="B" <?php if ($dado['classificacao'] == 'B') { ?>selected="selected" <?php } ?>>B</option>
			<option value="C" <?php if ($dado['classificacao'] == 'C') { ?>selected="selected" <?php } ?>>C</option>
			<option value="D" <?php if ($dado['classificacao'] == 'D') { ?>selected="selected" <?php } ?>>D</option>
		</select><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>