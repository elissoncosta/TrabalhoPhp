<?php
include('conexao.php');

$Id = $_POST['ID_LOCACAO'];
$IdCliente = $_POST['ID_CLIENTE'];
$Valor = $_POST['Valor'];
$Locacao = $_POST['DATA_LOCACAO'];
$Entrega = $_POST['DATA_ENTREGA'];

$sql = "UPDATE LOCACAO 
           SET ID_CLIENTE = '{$Id}', 
		       VALOR = '{$Valor}', 
		       DATA_LOCACAO = '{$Locacao}', 
		       DATA_ENTREGA = '{$Entrega}' 
	     WHERE ID_LOCACAO = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_locacoes.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_locacoes.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
