<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$Descricao = $_POST['Descricao'];
$Class_Indic = $_POST['Class_Indic'];

$sql = "INSERT INTO CATEGORIA 
          VALUES(NULL, '{$Descricao}', '{$Class_Indic}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Categoria.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Categoria.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
