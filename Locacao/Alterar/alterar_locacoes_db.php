<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$IdCliente = $_POST['IdCliente'];
$Valor = $_POST['Valor'];
$Locacao = $_POST['Locacao'];
$Entrega = $_POST['Entrega'];

$sql = "UPDATE LOCACAO 
           SET CLIENTE_ID = '{$IdCliente}', 
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
