<?php
include('../../conexao.php');

$IdCliente = $_POST['ID_CLIENTE'];
$Valor = $_POST['Valor'];
$Locacao = $_POST['DATA_LOCACAO'];
$Entrega = $_POST['DATA_ENTREGA'];

$sql = "INSERT INTO locacao VALUES (null, '{$IdCliente}', '{$Valor}', '{$Locacao}', '{$Entrega}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_locacoes.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_locacoes.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
