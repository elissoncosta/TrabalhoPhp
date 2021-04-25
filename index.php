<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="./Styles/site.css">
</head>

<body>
	<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : false;

	if ($erro == 1) {
		echo "<p class=\"erro\">Usuário ou senha inválida!</p>";
	} elseif ($erro == 2) {
		echo "<p class=\"erro\">Usuário está inativo!</p>";
	}
	?>
	<div id="logotipo_login"></div>
	<div id="box">
		<form action="./login_db.php" method="POST">
			<fieldset>
			<legend>Login:</legend>
				<label for="user">Usúario:</label>
				<input type="text" name="user" id="user" maxlength="20"><br><br>

				<label for="senha">Senha:</label>
				<input type="password" name="senha" id="senha" maxlength="20"><br><br>

				<button type="submit">Login</button>
			</fieldset>
		</form>
	</div>
</body>

</html>
