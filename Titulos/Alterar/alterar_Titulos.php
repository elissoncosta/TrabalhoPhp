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

		$sql = "SELECT T.ID_TITULO as Id,
                       T.titulo,
                       T.sinopse,
                       T.classificacao,
                       T.tipo,
                       T.categoria_id IdCategoria,
                       T.editora_id IdEditora
				  FROM TITULOS T
				 WHERE ID_TITULO = {$Id}";

		$query = mysqli_query($conexao, $sql);
		$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
		<input type="hidden" name="Id" value="<?php echo $dado['Id']; ?>">

		<label for="Id">Código</label><br>
		<input type="text" 
		       name="Id" 
			   id="Id" 
			   maxlength="11" 
			   value="<?php echo $Id; ?>" disabled="true"><br><br>

		<label for="titulo">Título</label><br>
		<input type="text" 
		       name="titulo" 
			   id="titulo" 
			   maxlength="150" 
			   value="<?php echo $dado['titulo']; ?>"><br><br>

		<label for="sinopse">Sinopse</label><br>
		<textarea name="sinopse" 
		          id="sinopse" 
				  cols="40" 
				  rows="5"value="<?php echo $dado['sinopse']; ?>"></textarea>
		<br><br>

		<label for="IdEditora">Item</label><br>
		<select name="IdEditora" id="IdEditora">
			<?php
			$sql = "SELECT ID_EDITORA as IdEditora, razao_social FROM EDITORA";
			$query = mysqli_query($conexao, $sql);

			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdEditora']; ?>" 
					<?php if ($dado['IdEditora'] == $item['IdEditora']) 
					{ ?>selected="selected" <?php } ?>><?php echo $item['razao_social']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="IdCategoria">Categoria</label><br>
		<select name="IdCategoria" id="IdCategoria">
			<?php
			$sql = "SELECT id_categoria as IdCategoria, descricao FROM categoria";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdCategoria']; ?>" 
					<?php if ($dado['IdCategoria'] == $item['IdCategoria']) 
					{ ?>selected="selected" <?php } ?>><?php echo $item['descricao']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>	

		<label for="tipo">Tipo Titulo</label><br>
		<select name="tipo" id="tipo">
			<option value="Terror" <?php if ($dado['tipo'] == 'Terror') { ?>selected="selected" <?php } ?>>Terror</option>
			<option value="Comédia" <?php if ($dado['tipo'] == 'Comédia') { ?>selected="selected" <?php } ?>>Comédia</option>
			<option value="Romance" <?php if ($dado['tipo'] == 'Romance') { ?>selected="selected" <?php } ?>>Romance</option>
			<option value="Animação" <?php if ($dado['tipo'] == 'Animação') { ?>selected="selected" <?php } ?>>Animação</option>
			<option value="Documentário" <?php if ($dado['tipo'] == 'Documentário') { ?>selected="selected" <?php } ?>>Documentário</option>
		</select><br><br>

		<label for="classificacao">Classificação Indicativa</label><br>
		<select name="classificacao" id="classificacao">
			<option value="1" <?php if ($dado['classificacao'] == '1') { ?>selected="selected" <?php } ?>>Livre</option>
			<option value="2" <?php if ($dado['classificacao'] == '2') { ?>selected="selected" <?php } ?>>10 Anos</option>
			<option value="3" <?php if ($dado['classificacao'] == '3') { ?>selected="selected" <?php } ?>>12 Anos</option>
			<option value="4" <?php if ($dado['classificacao'] == '4') { ?>selected="selected" <?php } ?>>16 Anos</option>
			<option value="5" <?php if ($dado['classificacao'] == '5') { ?>selected="selected" <?php } ?>>18 Anos</option>
		</select><br><br>

		<button type="submit">Alterar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>