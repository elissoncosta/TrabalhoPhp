<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Cliente Locações</title>
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
		echo "<p class=\"sucesso\">Locação excluída com sucesso! Locação código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Locação cadastrada com sucesso! Locação código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Locação alterada com sucesso! Locação código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Locação não excluída! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="cadastrar_locacoes.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Código Cliente</th>
				<th>Nome Cliente</th>
				<th>Valor</th>
				<th>Data da Locação</th>
				<th>Data da Entrega</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT L.ID_LOCACAO,
						   L.CLIENTE_ID,
		                   C.NOME,
		                   L.VALOR,
		                   L.DATA_LOCACAO,
		                   L.DATA_ENTREGA 
	                  FROM LOCACAO L
	                  JOIN CLIENTE C ON (C.ID_CLIENTE = L.CLIENTE_ID)";

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
						<td><?php echo $item['ID_LOCACAO']; ?></td>
						<td><?php echo $item['CLIENTE_ID']; ?></td>
						<td><?php echo $item['NOME']; ?></td>
						<td><?php echo $item['VALOR']; ?></td>
						<td><?php echo $item['DATA_LOCACAO']; ?></td>
						<td><?php echo $item['DATA_ENTREGA']; ?></td>
						<td>
							<a href="../Alterar/alterar_locacoes.php?Id=<?php echo $item['ID_LOCACAO']; ?>">Alterar</a>
							<a href="../Excluir/excluir_locacoes.php?Id=<?php echo $item['ID_LOCACAO']; ?>">Excluir</a>
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