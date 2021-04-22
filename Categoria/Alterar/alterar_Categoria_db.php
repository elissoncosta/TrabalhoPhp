<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$Descricao = $_POST['Descricao'];
$Class_Indic = $_POST['Class_Indic'];

$sql = "UPDATE CATEGORIA 
           SET Descricao = '{$Descricao}', 
		       CLASSIFICACAO_INDICATIVA = '{$Class_Indic}' 
	     WHERE ID_CATEGORIA = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Categoria.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}
mysqli_close($conexao);
