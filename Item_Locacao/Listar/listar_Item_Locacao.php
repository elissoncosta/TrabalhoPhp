<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Itens</title>
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
		echo "<p class=\"sucesso\">Distribuidor excluído com sucesso! Distribuidor código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Distribuidor cadastrado com sucesso! Distribuidor código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Distribuidor alterado com sucesso! Distribuidor código: {$msg}</p>";
	}

	if ($erro == 1) {
		echo "<p class=\"erro\">Item não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="../Cadastrar/cadastrar_Item_Locacao.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Sequencia</th>
				<th>Data Entrega</th>
				<th>Data Locacao</th>
				<th>Titulo</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT I.ID_ITEM_LOCACAO,
                           I.SEQUENCE,
                           L.DATA_LOCACAO,
                           L.DATA_ENTREGA,
                           T.TITULO
                      FROM ITEM_LOCACAO I
                      JOIN LOCACAO L ON (L.ID_LOCACAO = I.LOCACAO_ID)
                      JOIN TITULOS T ON (T.ID_TITULO = I.TITULO_ID)";

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
						<td><?php echo $item['ID_ITEM_LOCACAO']; ?></td>
						<td><?php echo $item['SEQUENCE']; ?></td>
						<td><?php echo $item['DATA_LOCACAO']; ?></td>
						<td><?php echo $item['DATA_ENTREGA']; ?></td>
						<td><?php echo $item['TITULO']; ?></td>
						<td>
							<a href="../Alterar/?php echo $item['ID_ITEM_LOCACAO']; ?>">Alterar</a>
							<a href="../Excluir/?php echo $item['ID_ITEM_LOCACAO']; ?>">Excluir</a>
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