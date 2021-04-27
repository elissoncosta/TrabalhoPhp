<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listar Clientes</title>
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
			<a href="../Cadastrar/cadastrar_clientes.php">Cadastrar Novo Cliente</a>
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
		echo "<p class=\"sucesso\">Cliente excluído com sucesso! Cliente código: {$msg}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"sucesso\">Cliente cadastrado com sucesso! Cliente código: {$msg}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"sucesso\">Cliente alterado com sucesso! Cliente código: {$msg}</p>";
	}
	if ($erro == 1) {
		echo "<p class=\"erro\">Cliente não excluído! MySQL erro: {$msg}</p>";
	}
	?>

	<div id="lista">
	<table>
		<thead class="header_list">
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Celular</th>
				<th>Sexo</th>
				<th>Enredeço</th>
				<th>Numero Endereço</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>
		<tbody class="body_list">
			<?php
			$sql = "SELECT ID_CLIENTE AS Id,
                           nome,
                           cpf,
                           celular,
                           sexo,
                           endereco,
                           numero_endereco
                      FROM CLIENTE
					  ORDER BY ID_CLIENTE";

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
						<td><?php echo $item['nome']; ?></td>
						<td><?php echo $item['cpf']; ?></td>
						<td><?php echo $item['celular']; ?></td>
						<td><?php echo $item['sexo']; ?></td>
						<td><?php echo $item['endereco']; ?></td>
						<td><?php echo $item['numero_endereco']; ?></td>
						<td>
							<button class="btn" type="button">
								<a href="../Alterar/alterar_clientes.php?Id=<?php echo $item['Id']; ?>">Alterar</a>
							</button>
						</td>
						<td>
							<button class="btn" type="button">
								<a href="../Excluir/excluir_clientes.php?Id=<?php echo $item['Id']; ?>">Excluir</a>
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