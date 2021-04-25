<?php
include('../../conexao.php');
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
	<br><br><a href="../Cadastrar/cadastrar_locacoes.php">Cadastrar</a><br><br>
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
			$sql = "SELECT L.id_locacao AS Id,
						   L.cliente_id,
		                   C.nome,
		                   L.valor,
		                   L.data_locacao,
		                   L.data_entrega 
	                  FROM LOCACAO L
	                  JOIN CLIENTE C ON (C.ID_CLIENTE = L.CLIENTE_ID)
					  ORDER BY L.id_locacao";

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
						<td><?php echo $item['cliente_id']; ?></td>
						<td><?php echo $item['nome']; ?></td>
						<td><?php echo $item['valor']; ?></td>
						<td><?php echo $item['data_locacao']; ?></td>
						<td><?php echo $item['data_entrega']; ?></td>
						<td>
							<a href="../Alterar/alterar_locacoes.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
							<a href="../Excluir/excluir_locacoes.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
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