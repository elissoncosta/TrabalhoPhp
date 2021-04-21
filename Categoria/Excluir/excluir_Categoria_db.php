<?php
include('../../conexao.php');

$Id = $_POST['ID_CATEGORIA'];

$sql = "DELETE FROM CATEGORIA WHERE ID_CATEGORIA = {$id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=1&msg=' . $Id);
} else {
	header('Location: excluir_Categoria.php?erro=1&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
