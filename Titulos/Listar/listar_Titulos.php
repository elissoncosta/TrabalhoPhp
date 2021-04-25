<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Titulos</title>
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
		echo "<p class=\"sucesso\">Titulo excluído com sucesso! Titulo código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Titulo cadastrado com sucesso! Titulo código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Titulo alterado com sucesso! Titulo código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Titulo não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<br><br><a href="../Cadastrar/cadastrar_Titulo.php">Cadastrar</a><br><br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Titulo</th>
				<th>Sinopse</th>
				<th>Classificacao</th>
				<th>Tipo</th>
				<th>Categoria</th>
				<th>Editora</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT T.id_titulo AS Id,
                           T.titulo,
                           T.sinopse,
                           T.classificacao,
                           T.tipo,
                           C.descricao,
                           E.razao_social
                      FROM TITULOS T
                      JOIN CATEGORIA C ON (C.ID_CATEGORIA = T.CATEGORIA_ID)
                      JOIN EDITORA E ON (E.ID_EDITORA = T.EDITORA_ID)";

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
						<td><?php echo $item['titulo']; ?></td>
						<td><?php echo $item['sinopse']; ?></td>
						<td><?php echo $item['classificacao']; ?></td>
						<td><?php echo $item['tipo']; ?></td>
						<td><?php echo $item['descricao']; ?></td>
						<td><?php echo $item['razao_social']; ?></td>
						<td>
							<a href="../Alterar/alterar_Titulos.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
							<a href="../Excluir/excluir_Titulo.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
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