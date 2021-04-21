<?php
include('conexao.php');

$Id = $_POST['ID_CATEGORIA'];
$Descricao = $_POST['DESCRICAO'];
$Class_Indic = $_POST['CLASSIFICACAO_INDICATIVA'];

$sql = "UPDATE CATEGORIA 
           SET Descricao = '{$Descricao}', 
		       ClassIndicativa = '{$Class_Indic}' 
	     WHERE IdCategoria = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Categoria_db.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
