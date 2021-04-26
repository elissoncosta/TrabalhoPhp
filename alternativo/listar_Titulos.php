<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Listar Titulos</title>
		<link rel="stylesheet" type="text/css" href="../Styles/site.css">
		<style type="text/css">

		#menu-h{
			background-color: rgb(37, 37, 39);
		}

		#menu-h ul {
			max-width: 800px;
			list-style: none;
			padding: 0;
		}

		#menu-h ul li {
			display: inline;
		}

		#menu-h ul li a {
			color: #FFF;
			padding: 20px;
			display: inline-block;
			text-decoration: none;
			
		}

		#menu-h ul li a:hover {
			background-color: rgb(24, 139, 233);
		}

		#atalho{
			padding:20px;
			height:150px;
			background-color: #f2f1f0;
		}

		#filtro	{		
			height:30px;
			background-color: #e3e6e3;
			margin-top:5px;
			padding:20px;
			
		}

		.busca{
			width:300px;
		}

		.button_pesquisar{
			margin-left:600px;
			width:400px;
		}

		.header_list{
			background:#e3e6e3;
		}

		.header_list tr th{
			padding-top:5px;
			padding-bottom:5px;
			padding-left:50px;
			padding-right:50px;
		}

		.body_list{
			background:#f2f1f0;
		}

		.body_list tr td{
			padding-top:10px;
			padding-bottom:10px;
	
		}
		button a{
			color: black;
			display: inline-block;
			text-decoration: none;
		}
		</style>
	</head>

	<body>
		<nav id="menu-h">
			<?php
			include('../../menu.php');
			?>
		</nav>

		<div id="atalho">
		</div>
		<div id="filtro">
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
									C.descricao,
									E.razao_social
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
								<td><?php echo $item['Id']; ?></td>
								<td><?php echo $item['titulo']; ?></td>
								<td><?php echo $item['sinopse']; ?></td>
								<td><?php echo $item['classificacao']; ?></td>
								<td><?php echo $item['tipo']; ?></td>
								<td><?php echo $item['descricao']; ?></td>
								<td><?php echo $item['razao_social']; ?></td>
								<td>
									<button type="button"><a href="../Alterar/alterar_Titulos.php?Id=<?php echo $item['Id']; ?>">Alterar</a></button>
								</td>
								<td>
									<button type="button"><a href="../Excluir/excluir_Titulo.php?Id=<?php echo $item['Id']; ?>">Excluir</a></button>								
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