<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$sequence = $_POST['sequence'];

$sql = "UPDATE ITEM_LOCACAO L
           SET L.SEQUENCE = '{$sequence}'
		 WHERE ID_ITEM_LOCACAO = '{$Id}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Item_Locacao.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
