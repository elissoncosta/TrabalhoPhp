<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Clientes</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/site.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/cadastro.css">
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
		echo "<p class=\"erro\">Usuário não cadastrado! MySQL erro: {$msg}</p>";
	}
	?>

	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="cadastrar_usuarios_db.php" method="post">
					<label for="Nome">Nome</label><br>
					<input type="text"
						   name="Nome" 
						   id="Nome" 
						   maxlength="150"
						   placeholder="Fulano da Silva"><br><br>

					<label for="Usuario">Usuário</label><br>
					<input type="text" 
						   name="Usuario" 
						   id="Usuario" 
						   maxlength="15"
						   placeholder="Fulano da Silva"><br><br>

					<label for="Celular">Senha</label><br>
					<input type="password" 
						   name="Senha" 
						   id="Senha" 
						   minlength="6"
						   maxlength="11">
					<br><br>

					<label for="Status">Status</label><br>
					<select name="Status" id="Sexo">
						<option value="A">Admin</option>
						<option value="U">Usuário</option>
						<option value="C">Cliente</option>
					</select><br><br>

					<label for="Email">Email</label><br>
					<input type="text" 
						   name="Email" 
						   id="Email" 
						   maxlength="150"
						   placeholder="fulano@gmail.com"><br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>