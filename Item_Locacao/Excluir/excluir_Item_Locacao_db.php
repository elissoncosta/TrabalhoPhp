<?php
include('conexao.php');

$Id = $_POST['Id'];

$sql = "DELETE FROM ITEM_LOCACAO WHERE ID_ITEM_LOCACAO = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=1&msg=' . $Id);
} else {
	header('Location: ../Listar/listar_Item_Locacao.php?erro=1&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
