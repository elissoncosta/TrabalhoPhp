<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Editora</title>
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
		echo "<p class=\"erro\">Editora não alterada! MySQL erro: {$msg}</p>";
	}
	?>
	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="./alterar_Editora_db.php" method="post">
					<?php
					$Id = $_GET['Id'];

					$sql = "SELECT ID_EDITORA AS Id, 
								RAZAO_SOCIAL,
								TELEFONE,
								ENDERECO,
								NUMERO_ENDERECO,
								COMPLEMENTO,
								CEP,
								EMAIL 
							FROM EDITORA 
							WHERE ID_EDITORA = {$Id}";

					$query = mysqli_query($conexao, $sql);
					$dado = mysqli_fetch_array($query, MYSQLI_ASSOC);
					?>
					<input type="hidden" name="Id" value="<?php echo $Id; ?>">

					<label for="Id">Código</label><br>
					<input type="text" 
						name="Id" 
						id="Id" 
						maxlength="11" 
						value="<?php echo $Id; ?>" 
						disabled="true">
					<br>

					<label for="RazaoSocial">Razão Social</label><br>
					<input type="text" 
						maxlength="100" 
						name="RazaoSocial" 
						id="RazaoSocial" 
						value="<?php echo $dado['RAZAO_SOCIAL']; ?>">
					<br>

					<label for="Email">EMAIL</label><br>
					<input type="text" 
						maxlength="100" 
						name="Email" 
						id="Email" 
						value="<?php echo $dado['EMAIL']; ?>">
					<br>

					<label for="Telefone">Telefone</label><br>
					<input type="text" 
						maxlength="15" 
						name="Telefone" 
						id="Telefone" 
						value="<?php echo $dado['TELEFONE']; ?>">
					<br>

					<label for="Endereco">Endereço</label><br>
					<input type="text" 
						maxlength="200" 
						name="Endereco" 
						id="Endereco" 
						value="<?php echo $dado['ENDERECO']; ?>">
					<br>

					<label for="Numero">Número</label><br>
					<input type="text" 
						maxlength="5" 
						name="Numero" 
						id="Numero" 
						value="<?php echo $dado['NUMERO_ENDERECO']; ?>">
					<br>

					<label for="Complemento">Complemento</label><br>
					<input type="text" 
						maxlength="50" 
						name="Complemento" 
						id="Complemento" 
						value="<?php echo $dado['COMPLEMENTO']; ?>">
					<br>

					<label for="Cep">CEP</label><br>
					<input type="text" 
						maxlength="11" 
						name="Cep" 
						id="Cep" 
						value="<?php echo $dado['CEP']; ?>">
					<br>

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