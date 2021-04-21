<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Clientes</title>
			<link rel="stylesheet" type="text/css" href="../Styles/site.css">
</head>

<body>
	<?php
	include('../../menu.php');
	?>
	<?php
	$ok   = @$_GET['ok'];
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($ok == 1) {
		echo "<p class=\"sucesso\">Cliente excluído com sucesso! Cliente código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Cliente cadastrado com sucesso! Cliente código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Cliente alterado com sucesso! Cliente código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Cliente não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="../Cadastrar/cadastrar_clientes.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Celular</th>
				<th>Sexo</th>
				<th>Enredeço</th>
				<th>Numero Endereço</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT ID_CLIENTE,
                           NOME,
                           CPF,
                           CELULAR,
                           SEXO,
                           ENDERECO,
                           NUMERO_ENDERECO
                      FROM CLIENTE";

			$query = mysqli_query($conexao, $sql);
			if (!$query) {
			?>
				<tr>
					<td colspan="3"><?php echo 'MySQL Erro: ' . mysqli_error($conexao); ?></td>
				</tr>
				<?php
			} else {
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td><?php echo $item['ID_CLIENTE']; ?></td>
						<td><?php echo $item['NOME']; ?></td>
						<td><?php echo $item['CPF']; ?></td>
						<td><?php echo $item['CELULAR']; ?></td>
						<td><?php echo $item['SEXO']; ?></td>
						<td><?php echo $item['ENDERECO']; ?></td>
						<td><?php echo $item['NUMERO_ENDERECO']; ?></td>
						<td>
							<a href="../Alterar/alterar_clientes.php?Id=<?php echo $item['ID_CLIENTE']; ?>">Alterar</a>
							<a href="../Excluir/excluir_clientes.php?Id=<?php echo $item['ID_CLIENTE']; ?>">Excluir</a>
						</td>
					</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>
	Exitem <?php echo mysqli_num_rows($query); ?> Itens
</body>

</html>
<?php
mysqli_close($conexao);
?>