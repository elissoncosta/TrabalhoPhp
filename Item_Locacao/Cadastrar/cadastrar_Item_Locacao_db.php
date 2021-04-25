<?php
include('../../conexao.php');

$Sequence = $_POST['Sequence'];
$IdLocacao = $_POST['IdLocacao'];
$IdTitulo  = $_POST['IdTitulo'];

$sql = "INSERT INTO ITEM_LOCACAO 
        VALUES ('{$Sequence}', null, '{$IdLocacao}', '{$IdTitulo}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Item_Locacao.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Item_Locacao.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
