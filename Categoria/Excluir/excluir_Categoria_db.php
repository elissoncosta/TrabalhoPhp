<?php
include('../../conexao.php');

$Id = $_POST['Id'];

$sql = "DELETE FROM CATEGORIA WHERE ID_CATEGORIA = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=1&msg=' . $Id);
} else {
	header('Location: ../Listar/listar_Categoria.php?erro=1&msg=' . mysqli_error($conexao));
}
mysqli_close($conexao);
