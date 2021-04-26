<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Listar Titulos</title>
		<link rel="stylesheet" type="text/css" href="../../Styles/site.css">
		<link rel="stylesheet" type="text/css" href="../../Styles/Listar.css">
	</head>

	<body>
		<?php
			include('../../menu.php');
		?>

		<div id="filtro" class="filtro">
			<button type="button"><a href="../Cadastrar/cadastrar_Titulo.php">Cadastrar Novo Titulo</a></button>
			<input class="button_pesquisar" type="search" class="busca">
			<button type="button">Buscar</button>		
		</div>

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

		<div id="lista">
			<table>
				<thead class="header_list">
					<tr>
						<th>Código</th>
						<th>Titulo</th>
						<th>Sinopse</th>
						<th>Classificacao</th>
						<th>Tipo</th>
						<th>Categoria</th>
						<th>Editora</th>
						<th colspan="2">Ações</th>
					</tr>
				</thead>
				<tbody class="body_list">
					<?php
						$sql = "SELECT T.id_titulo AS Id,
									T.titulo,
									T.sinopse,
									T.classificacao,
									T.tipo,
									C.descricao as catergoria,
									E.razao_social as editora
								FROM TITULOS T
								JOIN CATEGORIA C ON (C.ID_CATEGORIA = T.CATEGORIA_ID)
								JOIN EDITORA E ON (E.ID_EDITORA = T.EDITORA_ID) order by T.id_titulo";

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
								<td class="campos" ><?php echo $item['Id']; ?></td>
								<td class="texto" ><?php echo $item['titulo']; ?></td>
								<td class="texto" ><?php echo $item['sinopse']; ?></td>
								<td class="campos" ><?php echo $item['classificacao']; ?></td>
								<td class="campos" ><?php echo $item['tipo']; ?></td>
								<td class="campos" ><?php echo $item['catergoria']; ?></td>
								<td class="campos" ><?php echo $item['editora']; ?></td>
								<td>
									<button class="btn" type="button">
										<a href="../Alterar/alterar_Titulos.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
									</button>
								</td>
								<td>
									<button class="btn" type="button">
										<a href="../Excluir/excluir_Titulo.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
									</button>								
								</td>
							</tr>
						<?php
						}
					}
						?>
				</tbody>
			</table>
			Exitem <?php echo mysqli_num_rows($query); ?> Itens
		<div id="lista">
	</body>

</html>
<?php
mysqli_close($conexao);
?>