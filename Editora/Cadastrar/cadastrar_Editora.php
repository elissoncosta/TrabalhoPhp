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
						   id="RazaoSocial"
						   placeholder="Editora ali da esquina"><br><br>

					<label for="Telefone">Telefone</label><br>
					<input type="number'" 
						   name="Telefone" 
						   id="Telefone"
						   placeholder="(00) 0000-0000"><br><br>

					<label for="Endereco">Endereço</label><br>
					<input type="number'" 
						   name="Endereco" 
						   id="Endereco"
						   placeholder="Beco Diagonal, Londres, Inglaterra"><br><br>

					<label for="Numero">Número</label><br>
					<input type="text" 
						   name="Numero" 
						   id="Numero"
						   placeholder="9 3/4"><br><br>

					<label for="Complemento">Complemento</label><br>
					<input type="text" 
						   name="Complemento" 
						   id="Complemento"
						   placeholder="Nos fundos do caldeirão furado"><br><br>

					<label for="Email">Email</label><br>
					<input type="text" 
						   name="Email" 
						   id="Email"
						   placeholder="seuEmail@email.com"><br><br>

					<label for="Cep">Cep</label><br>
					<input type="text" 
						   name="Cep" 
						   id="Cep"
						   placeholder="00000-00"><br><br>

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