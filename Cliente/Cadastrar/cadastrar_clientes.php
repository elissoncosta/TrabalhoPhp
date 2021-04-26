<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Clientes</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/site.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/cadastro.css">
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($erro == 2) {
		echo "<p class=\"erro\">Cliente não cadastrado! MySQL erro: {$msg}</p>";
	}
	?>

<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="cadastrar_clientes_db.php" method="post">
					<label for="Nome">Nome</label><br>
					<input type="text"
						name="Nome" 
						id="Nome" 
						maxlength="150"><br><br>

					<label for="CPF">CPF</label><br>
					<input type="text" 
						   name="CPF" 
						   id="CPF" 
						   maxlength="11"><br><br>

					<label for="Celular">Celular</label><br>
					<input type="text" 
						   name="Celular" 
						   id="Celular" 
						   maxlength="11"><br><br>

					<label for="Sexo">Sexo</label><br>
					<input type="text" 
						   name="Sexo" 
						   id="Sexo" 
						   maxlength="11"><br><br>

					<label for="Endereco">Endereço</label><br>
					<input type="text" 
						   name="Endereco" 
						   id="Endereco" 
						   maxlength="150"><br><br>

					<label for="Numero">Número Endereço</label><br>
					<input type="text" 
						   name="Numero" 
						   id="Numero" 
						   maxlength="10"><br><br>
				</form>
				<button class="btn" type="submit">Cadastrar</button>
			</div>
		</div>
	</div>
</body>

</html>