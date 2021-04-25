<?php
include('../../conexao.php');

$IdCliente = $_POST['Id'];
$Valor = $_POST['Valor'];
$Locacao = $_POST['Locacao'];
$Entrega = $_POST['Entrega'];

$sql = "INSERT INTO locacao VALUES (null, '{$Locacao}', '{$Entrega}', '{$Valor}', '{$IdCliente}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_locacoes.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_locacoes.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
