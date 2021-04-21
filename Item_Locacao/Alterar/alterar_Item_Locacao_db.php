<?php
include('conexao.php');

$Id = $_POST['ID_ITEM_LOCACAO'];
$IdLocacao = $_POST['LOCACAO_ID'];
$Sequence = $_POST['SEQUENCE'];
$IdTitulo = $_POST['TITULO_ID'];

$sql = "UPDATE ITEM_LOCACAO 
           SET LOCACAO_ID = '{$IdLocacao}', 
		       SEQUENCE = '{$Sequence}', 
			   TITULO_ID = '{$IdTitulo}' 
		 WHERE ID_ITEM_LOCACAO = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Item_Locacao.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
