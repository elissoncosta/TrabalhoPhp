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
		echo "<p class=\"sucesso\">Bônus excluído com sucesso! Bônus código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Bônus cadastrado com sucesso! Bônus código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Bônus alterado com sucesso! Bônus código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Bônus não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="../Cadastrar/cadastrar_cliente_bonus.php">Cadastrar</a><br><br>
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
			$sql = "SELECT ID_EDITORA, 
                           RAZAO_SOCIAL,
                           TELEFONE,
                           ENDERECO,
                           NUMERO_ENDERECO,
                           COMPLEMENTO,
                           CEP,
                           EMAIL 
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
						<td><?php echo $item['ID_EDITORA']; ?></td>
						<td><?php echo $item['RAZAO_SOCIAL']; ?></td>
						<td><?php echo $item['TELEFONE']; ?></td>
						<td><?php echo $item['ENDERECO']; ?></td>
						<td><?php echo $item['NUMERO_ENDERECO']; ?></td>
						<td><?php echo $item['COMPLEMENTO']; ?></td>
						<td><?php echo $item['CEP']; ?></td>
						<td><?php echo $item['EMAIL']; ?></td>
						<td>
							<a href="../Alterar/alterar_cliente_bonus.php?Id=<?php echo $item['ID_EDITORA']; ?>">Alterar</a>
							<a href="../Excluir/excluir_cliente_bonus.php?Id=<?php echo $item['ID_EDITORA']; ?>">Excluir</a>
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