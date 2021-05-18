<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Clientes</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/Cadastro.css">
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
		echo "<p class=\"erro\">Usuário não alterado! MySQL erro: {$msg}</p>";
	}
	?>
	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="alterar_usuarios_db.php" method="post">
					
					<label for="Email">Email</label><br>
					<input type="text" 
						   name="Email" 
						   id="Email" 
						   maxlength="150"
						   placeholder="fulano@gmail.com"><br><br>

						   <label for="Celular">Senha</label><br>
					<input type="password" 
						   name="Senha" 
						   id="Senha" 
						   minlength="6"
						   maxlength="11">
					<br><br>

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