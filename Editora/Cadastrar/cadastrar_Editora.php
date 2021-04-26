<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastrar Editora</title>
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
		echo "<p class=\"erro\">Editora não cadastrada! MySQL erro: {$msg}</p>";
	}
	?>
	<div class="wrapper">
		<div class="cadastro"> 
			<div class="campos">
				<form action="cadastrar_Editora_db.php" method="post">

					<label for="RazaoSocial">Razão Social</label><br>
					<input type="text" 
						name="RazaoSocial" 
						id="RazaoSocial"><br><br>

					<label for="Telefone">Telefone</label><br>
					<input type="number'" 
						name="Telefone" 
						id="Telefone"><br><br>

					<label for="Endereco">Endereço</label><br>
					<input type="number'" 
						name="Endereco" 
						id="Endereco"><br><br>

					<label for="Numero">Número</label><br>
					<input type="text" 
						name="Numero" 
						id="Numero"><br><br>

					<label for="Complemento">Complemento</label><br>
					<input type="text" 
						name="Complemento" 
						id="Complemento"><br><br>

					<label for="Email">Email</label><br>
					<input type="text" 
						name="Email" 
						id="Email"><br><br>

					<label for="Cep">Cep</label><br>
					<input type="text" 
						name="Cep" 
						id="Cep"><br><br>

				</form>
				<button class="btn" type="submit">Cadastrar</button>
			</div>
		</div>
	</div>
</body>

</html>
<?php
mysqli_close($conexao);
?>