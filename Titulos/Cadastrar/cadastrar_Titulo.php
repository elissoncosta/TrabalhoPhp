<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Titulo</title>
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
		echo "<p class=\"erro\">Titulo não cadastrado! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="./cadastrar_Titulo_db.php" method="post">

		<label for="Titulo">Título</label><br>
		<input type="text" 
		       name="Titulo" 
			   id="Titulo" 
			   maxlength="150"><br><br>

		<select name="Tipo" id="Tipo">
			<option value="Terror" >Terror</option>
			<option value="Comédia" >Comédia</option>
			<option value="Romance" >Romance</option>
			<option value="Animação" >Animação</option>
			<option value="Documentário" >Documentário</option>
		</select><br><br>

		<label for="Classificacao">Classificação Indicativa</label><br>
		<select name="Classificacao" id="Classificacao">
			<option value="1">Livre</option>
			<option value="2">10 Anos</option>
			<option value="3">12 Anos</option>
			<option value="4">16 Anos</option>
			<option value="5">18 Anos</option>
		</select><br><br>

		<label for="Quantidade">Quantidade</label><br>
		<input type="number" 
		       name="Quantidade" 
			   id="Quantidade"><b
			   r><br>

		<label for="Sinopse">Sinopse</label><br>
		<textarea name="Sinopse" 
		          id="Sinopse"></textarea><br><br>
		
				  <label for="Id">Cliente</label><br>
		<select name="Id" id="Id">
			<?php
			$sql = "SELECT id_categoria as IdCategoria, descricao FROM categoria";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdCategoria']; ?>">
					<?php echo $item['descricao']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<label for="Id">Cliente</label><br>
		<select name="Id" id="Id">
			<?php
			$sql = "SELECT id_editora as IdEditora, razao_social FROM editora";
			$query = mysqli_query($conexao, $sql);
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<option value="<?php echo $item['IdEditora']; ?>">
					<?php echo $item['razao_social']; ?>
				</option>
			<?php
			}
			?>
		</select><br><br>

		<button type="submit">Cadastrar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>