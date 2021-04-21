<?php
include('conexao.php');

$Sequence = $_POST['sequence'];
$IdLocacao = $_POST['locacao_id'];
$IdTitulo  = $_POST['titulo_id'];

$sql = "INSERT INTO ITEM_LOCACAO 
        VALUES (null, '{$Sequence}', '{$IdLocacao}', '{$IdTitulo}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Item_Locacao.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
