<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$sequence = $_POST['sequence'];
$IdLocacao = $_POST['IdLocacao'];
$IdTitulo = $_POST['IdTitulo'];

$sql = "UPDATE ITEM_LOCACAO 
           SET SEQUENCE = '{$sequence}',
		       LOCACAO_ID = '{$IdLocacao}',
			   TITULO_ID = '{$IdTitulo}'
		 WHERE ID_ITEM_LOCACAO = '{$Id}'";

$query = mysqli_query($conexao, $sql);

if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=3&msg=' . $Id);
} else {
	header('Location: alterar_Item_Locacao.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
