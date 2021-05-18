<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="./Styles/site.css">
	<link rel="stylesheet" type="text/css" href="./Styles/login.css">
</head>

<body>
	<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : false;

	if ($erro == 1)
	{
		echo "<p class=\"erro\">Usuário ou senha inválida!</p>";
	}
	elseif ($erro == 2)
	{
		echo "<p class=\"erro\">Usuário está inativo!</p>";
	}
	?>
	<div id="logotipo_login" class="loginBox">

		<img src="./Images/User.jpg" alt="avatar" class="avatar">

		<h1>Login</h1>

		<form action="./login_db.php" method="POST">
			<p>Usuário</p>
			<input type="text" name="user" id="user" maxlength="20" placeholder="Digite seu usuário"><br><br>

			<p>Senha</p>
			<input type="password" name="senha" id="senha" maxlength="20" placeholder="Insira sua senha"><br><br>

			<button type="submit">Login</button>

			<a href="./Usuario/Alterar/alterar_usuarios.php">Esqueci minha senha</a>
			<br>
			<a href="./Usuario/Cadastrar/cadastrar_usuarios.php">Registre-se</a>

		</form>

	</div>
</body>

</html>