<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Categoria</title>
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
			<a href="../Cadastrar/cadastrar_Categoria.php">Cadastrar Nova Categoria</a>
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
		echo "<p class=\"sucesso\">Categoria excluída com sucesso! Categoria código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Categoria cadastrada com sucesso! Categoria código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Categoria alterada com sucesso! Categoria código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Categoria não excluída! MySQL erro: {$msg}</p>";
	}
	?>
	
	<div id="lista">
		<table>
		<thead class="header_list">
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Classificação Indicativa</th>
					<th colspan="2">Ações</th>
				</tr>
			</thead>
			<tbody class="body_list">
				<?php
				$sql = "SELECT ID_CATEGORIA AS Id,
							descricao,
							classificacao_indicativa as classificacao
						FROM CATEGORIA
						ORDER BY ID_CATEGORIA";

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
							<td class="campos"><?php echo $item['Id']; ?></td>
							<td class="campos"><?php echo $item['descricao']; ?></td>
							<td class="campos"><?php switch ($item['classificacao']) {
													case 1:; ?> Livre
									<?php
														break;
													case 2:; ?> 10 Anos
									<?php
														break;
													case 3:; ?> 12 Anos
									<?php
														break;
													case 4:; ?> 16 Anos
									<?php
														break;
													case 5:; ?> 18 Anos
								<?php } ?>
							</td>
							<td>
								<button class="btn">
									<a href="../Alterar/alterar_Categoria.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
								</button>	
							</td>
							<td>
								<button class="btn">
									<a href="../Excluir/excluir_Categoria.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
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
	<div>
</body>

</html>
<?php
mysqli_close($conexao);
?>