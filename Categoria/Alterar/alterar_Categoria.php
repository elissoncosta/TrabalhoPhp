<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Categoria</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/cadastro.css">
	<link rel="stylesheet" type="text/css" href="../Styles/site.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/Listar.css">
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

	if ($erro == 3) {
		echo "<p class=\"erro\">Categoria não alterada! MySQL erro: {$msg}</p>";
	}
	?>
	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="alterar_Categoria_db.php" method="post">
					<?php
					$Id = $_GET['Id'];

					$sql = "SELECT ID_CATEGORIA AS Id,
								descricao,
								classificacao_indicativa 
							FROM CATEGORIA WHERE ID_CATEGORIA = {$Id}";

					$query = mysqli_query($conexao, $sql);
					$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
					?>

					<input type="hidden" name="Id" value="<?php echo $Id; ?>">

					<label for="Id">Código</label><br>
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
						value="<?php echo $dado['descricao']; ?>"><br><br>

					<label for="Class_Indic">Classificação Indicativa</label><br>
					<select name="Class_Indic" id="Class_Indic">
						<option value="1" <?php if ($dado['classificacao_indicativa'] == '1') { ?>selected="selected" <?php } ?>>Livre</option>
						<option value="2" <?php if ($dado['classificacao_indicativa'] == '2') { ?>selected="selected" <?php } ?>>10 Anos</option>
						<option value="3" <?php if ($dado['classificacao_indicativa'] == '3') { ?>selected="selected" <?php } ?>>12 Anos</option>
						<option value="4" <?php if ($dado['classificacao_indicativa'] == '4') { ?>selected="selected" <?php } ?>>16 Anos</option>
						<option value="5" <?php if ($dado['classificacao_indicativa'] == '5') { ?>selected="selected" <?php } ?>>18 Anos</option>
					</select><br><br>

					<button class="btn" type="submit">Alterar</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<?php
mysqli_close($conexao);
?>