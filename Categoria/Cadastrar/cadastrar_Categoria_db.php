<?php
include('conexao.php');

$Id = $_POST['ID_CATEGORIA'];
$Descricao = $_POST['DESCRICAO'];
$Class_Indic = $_POST['CLASSIFICACAO_INDICATIVA'];

$sql = "UPDATE CATEGORIA 
           SET DESCRICAO = '{$Descricao}', 
               CLASSIFICACAO_INDICATIVA = '{$Class_Indic}' 
	     WHERE ID_CATEGORIA = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Categoria.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
