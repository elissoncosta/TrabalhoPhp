<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Itens</title>
	<link rel="stylesheet" type="text/css" href="../../Styles/site.css">
	<link rel="stylesheet" type="text/css" href="../../Styles/Listar.css">
</head>

<body>
	<nav id="menu-h">
		<?php
		include('../../menu.php');
		?>
	</nav>

	<div id="filtro" class="filtro">
		<button class="btn1" type="button">
			<a href="../Cadastrar/cadastrar_Item_Locacao.php">Cadastrar Novo Item</a>
		</button>
		<input class="pesquisar" 
		       type="search" 
		       class="busca" 
		       placeholder="Pesquisa..." >
		<button class="btn1" type="button">Buscar</button>		
	</div>

	<?php
	$ok   = @$_GET['ok'];
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if ($ok == 1) {
		echo "<p class=\"sucesso\">Item excluído com sucesso! Item código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Item cadastrado com sucesso! Item código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Item alterado com sucesso! Item código: {$msg}</p>";
	}

	if ($erro == 1) {
		echo "<p class=\"erro\">Item não excluído! MySQL erro: {$msg}</p>";
	}
	?>
	<div id="lista">
		<table>
			<thead class="header_list">
				<tr>
					<th>Código</th>
					<th>Sequencia</th>
					<th>Data Entrega</th>
					<th>Data Locacao</th>
					<th>Titulo</th>
					<th colspan="2">Ações</th>
				</tr>
			</thead>
			<tbody class="body_list">
				<?php
				$sql = "SELECT I.ID_ITEM_LOCACAO AS Id,
							I.sequence,
							L.data_locacao,
							L.data_entrega,
							T.titulo
						FROM ITEM_LOCACAO I
						JOIN LOCACAO L ON (L.ID_LOCACAO = I.LOCACAO_ID)
						JOIN TITULOS T ON (T.ID_TITULO = I.TITULO_ID)
						ORDER BY I.ID_ITEM_LOCACAO";

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
							<td><?php echo $item['sequence']; ?></td>
							<td><?php echo $item['data_locacao']; ?></td>
							<td><?php echo $item['data_entrega']; ?></td>
							<td><?php echo $item['titulo']; ?></td>
							<td>
								<button class="btn" type="button">
									<a href="../Alterar/alterar_Item_Locacao.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
								</button>
							</td>
							<td>
								<button class="btn" type="button">
									<a href="../Excluir/excluir_Item_Locacao.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
								</button>								
							</td>
						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>
		<p>
			Exitem <?php echo mysqli_num_rows($query); ?> Itens
		</p>
	</div>
</body>

</html>
<?php
mysqli_close($conexao);
?>