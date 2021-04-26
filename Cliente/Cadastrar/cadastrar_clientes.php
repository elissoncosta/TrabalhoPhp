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
						   maxlength="150"
						   placeholder="Fulano da Silva"><br><br>

					<label for="CPF">CPF</label><br>
					<input type="text" 
						   name="CPF" 
						   id="CPF" 
						   maxlength="11"
						   placeholder="000.000.000.38"><br><br>

					<label for="Celular">Celular</label><br>
					<input type="text" 
						   name="Celular" 
						   id="Celular" 
						   maxlength="11"
						   placeholder="(00) 00000-0000"><br><br>

					<label for="Sexo">Genêro</label><br>
					<select name="Sexo" id="Sexo">
						<option value="1">Feminino</option>
						<option value="2">Masculino</option>
						<option value="3">Outros</option>
					</select><br><br>

					<label for="Endereco">Endereço</label><br>
					<input type="text" 
						   name="Endereco" 
						   id="Endereco" 
						   maxlength="150"
						   placeholder="Rua aquela lá, Bairro das Laranjeiras, Santa Catarina, Brasil"><br><br>

					<label for="Numero">Número Endereço</label><br>
					<input type="text" 
						   name="Numero" 
						   id="Numero" 
						   maxlength="10"
						   placeholder="000"><br><br>
					<button class="btn" type="submit">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>