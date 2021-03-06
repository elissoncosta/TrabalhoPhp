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
		echo "<p class=\"erro\">Cliente não alterado! MySQL erro: {$msg}</p>";
	}
	?>
	<div class="wrapper">
		<div class="cadastro">
			<div class="campos">
				<form action="alterar_clientes_db.php" method="post">
					<?php
					$Id = $_GET['Id'];

					$sql = "SELECT C.ID_CLIENTE AS Id,
								C.nome,
								C.cpf,
								C.celular,
								C.sexo,
								C.endereco,
								C.numero_endereco
							FROM CLIENTE C
							WHERE C.ID_CLIENTE = {$Id}";

					$query = mysqli_query($conexao, $sql);
					$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
					?>
					<input type="hidden" name="Id" value="<?php echo $Id; ?>">

					<label for="codigo">Código</label><br>
					<input type="text" 
						name="codigo" 
						id="codigo" 
						maxlength="11" 
						value="<?php echo $item['Id']; ?>" 
						disabled="true"><br><br>

					<label for="nome">Nome</label><br>
					<input type="text" 
						name="nome" 
						id="nome" 
						maxlength="150" 
						value="<?php echo $item['nome']; ?>">
					<br>

					<label for="cpf">CPF</label><br>
					<input type="text" 
						name="cpf" 
						id="cpf" 
						maxlength="15" 
						value="<?php echo $item['cpf']; ?>">
					<br>

					<label for="celular">Celular</label><br>
					<input type="text" 
						name="celular" 
						id="celular" 
						maxlength="15" 
						value="<?php echo $item['celular']; ?>">
					<br><br>

					<label for="sexo">Genêro</label><br>
					<select name="sexo" id="sexo">
						<option value="1" <?php if ($item['sexo'] == '1') { ?>selected="selected" <?php } ?> >Feminino</option>
						<option value="2" <?php if ($item['sexo'] == '2') { ?>selected="selected" <?php } ?> >Masculino</option>
						<option value="3" <?php if ($item['sexo'] == '3') { ?>selected="selected" <?php } ?> >Outros</option>
					</select><br><br>

					<label for="endereco">Endereço</label><br>
					<input type="text" 
						name="endereco" 
						id="endereco" 
						maxlength="150" 
						value="<?php echo $item['endereco']; ?>">
					<br><br>

					<label for="numero">Número Endereço</label><br>
					<input type="number" 
						name="numero" 
						id="numero" 
						maxlength="10" 
						value="<?php echo $item['numero_endereco']; ?>">
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