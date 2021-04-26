<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Categoria</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/site.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/cadastro.css ">
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

	if ($erro == 2) {
		echo "<p class=\"erro\">Categoria não cadastrada! MySQL erro: {$msg}</p>";
	}
	?>

	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="cadastrar_Categoria_db.php" method="post">
					<label for="Descricao">Descricao</label><br>
					<input type="text" 
					       name="Descricao" 
						   id="Descricao" 
						   maxlength="50"
						   placeholder="Defina a Categoria...">
					<br><br>

					<label for="Class_Indic">Classificação Indicativa</label><br>
					<select name="Class_Indic" id="Class_Indic">
						<option value="1">Livre</option>
						<option value="2">10 Anos</option>
						<option value="3">12 Anos</option>
						<option value="4">16 Anos</option>
						<option value="5">18 Anos</option>
					</select><br><br>

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