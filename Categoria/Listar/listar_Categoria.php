<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Categoria</title>
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
		echo "<p class=\"sucesso\">Categoria excluído com sucesso! Categoria código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Categoria cadastrado com sucesso! Categoria código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Categoria alterado com sucesso! Categoria código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Categoria não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="cadastrar_Categoria.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Descrição</th>
				<th>Classificação Indicativa</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT ID_CATEGORIA,
		                   DESCRICAO,
		                   CLASSIFICACAO_INDICATIVA 
	                  FROM CATEGORIA";

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
						<td><?php echo $item['ID_CATEGORIA']; ?></td>
						<td><?php echo $item['DESCRICAO']; ?></td>
						<td><?php echo $item['CLASSIFICACAO_INDICATIVA']; ?></td>
						<td>
							<a href="../Alterar/alterar_Categoria.php?Id=<?php echo $item['ID_CATEGORIA']; ?>">Alterar</a>
							<a href="../Excluir/?php echo $item['ID_CATEGORIA']; ?>">Excluir</a>
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