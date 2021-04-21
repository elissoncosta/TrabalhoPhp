<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Categoria</title>
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
		echo "<p class=\"erro\">Categoria não cadastrada! MySQL erro: {$msg}</p>";
	}
	?>
	<form action="cadastrar_Categoria_db.php" method="post">
		<label for="Descricao">Descricao</label><br>
		<input type="text" name="Descricao" id="Descricao" maxlength="150"><br><br>

		<label for="Class_Indic">Classificação Indicativa</label><br>
		<input type="text" name="Class_Indic" id="Class_Indic" maxlength="11"><br><br>

		<button type="submit">Cadastrar</button>
	</form>
</body>

</html>
<?php
mysqli_close($conexao);
?>