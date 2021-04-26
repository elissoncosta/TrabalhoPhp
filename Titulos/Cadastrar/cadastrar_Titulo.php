<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Titulo</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/cadastro.css ">
	<link rel="stylesheet" type="text/css" href="../../Styles/menu.css ">
</head>

<body>
	<nav id="menu-h">
		<?php
			include('../../menu.php');
		?>
	</nav>
	<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($erro == 2) {
		echo "<p class=\"erro\">Titulo não cadastrado! MySQL erro: {$msg}</p>";
	}
	?>
	
	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="./cadastrar_Titulo_db.php" method="post">
					<label for="Titulo">Título</label><br>
					<input type="text" 
						   name="Titulo" 
						   id="Titulo" 
						   maxlength="150"
						   placeholder="Título da obra...">
					<br>

					<label for="Tipo">Tipo</label>
					<select name="Tipo" id="Tipo">		
						<option value="Terror">Terror</option>
						<option value="Comédia">Comédia</option>
						<option value="Romance">Romance</option>
						<option value="Animação">Animação</option>
						<option value="Documentário">Documentário</option>
					</select>
					<br>

					<label for="Classificacao">Classificação Indicativa</label><br>
					<select name="Classificacao" id="Classificacao">
						<option value="1">Livre</option>
						<option value="2">10 Anos</option>
						<option value="3">12 Anos</option>
						<option value="4">16 Anos</option>
						<option value="5">18 Anos</option>
					</select>
					<br>

					<label for="Quantidade">Quantidade</label><br>
					<input type="number" 
						   name="Quantidade" 
						   id="Quantidade"
						   placeholder="Quantidade disponível...">
					<br>
					
					<label for="IdCategoria">Categoria</label><br>
					<select name="IdCategoria" id="IdCategoria">
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
					</select>
					<br>

					<label for="IdEditora">Editora</label><br>
					<select name="IdEditora" id="IdEditora">
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
					</select>
					<br>

					<div class="sinopse">
						<label for="sinopse">Sinopse</label><br>
						<textarea name="sinopse" 
								id="sinopse" 
								cols="40" 
								rows="5"
								value="<?php echo $dado['sinopse']; ?>""
								placeholder="Sinópse da obra..."></textarea>
						<br>
					</div>
					<button class="btn" type="submit">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<?php
mysqli_close($conexao);
?>