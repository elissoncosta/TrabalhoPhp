<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Editora</title>
			<link rel="stylesheet" type="text/css" href="../Styles/site.css">
</head>

<body>
	<?php
	include('./menu.php');
	?>
	<?php
	$ok   = @$_GET['ok'];
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($ok == 1) {
		echo "<p class=\"sucesso\">Editora excluída com sucesso! Editora código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Editora cadastrada com sucesso! Editora código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Editora alterada com sucesso! Editora código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Editora não excluída! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="../Cadastrar/cadastrar_Editora.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Razão Social</th>
				<th>Telefone</th>
				<th>Endereco</th>
				<th>Número</th>
				<th>Complemento</th>
				<th>CEP</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT ID_EDITORA AS Id, 
                           razao_social,
                           telefone,
                           endereco,
                           numero_endereco,
                           complemento,
                           cep,
                           email 
                      FROM EDITORA";

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
						<td><?php echo $item['Id']; ?></td>
						<td><?php echo $item['razao_social']; ?></td>
						<td><?php echo $item['telefone']; ?></td>
						<td><?php echo $item['endereco']; ?></td>
						<td><?php echo $item['numero_endereco']; ?></td>
						<td><?php echo $item['complemento']; ?></td>
						<td><?php echo $item['cep']; ?></td>
						<td><?php echo $item['email']; ?></td>
						<td>
							<a href="../Alterar/alterar_Editora.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
							<a href="../Excluir/excluir_Editora.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
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