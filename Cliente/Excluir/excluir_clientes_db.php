<?php
include('../../conexao.php');

$Id = $_POST['Id'];

$sql = "DELETE FROM CLIENTE WHERE ID_CLIENTE = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_clientes.php?ok=1&msg=' . $Id);
} else {
	header('Location: ../Listar/listar_clientes.php?erro=1&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
