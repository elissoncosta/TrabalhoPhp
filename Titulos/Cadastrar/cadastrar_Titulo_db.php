<?php
include('conexao.php');

$Id = $_POST['ID_TITULO'];
$Titulo = $_POST['TITULO'];
$Sinopse = $_POST['SINOPSE'];
$Classificacao = $_POST['CLASSIFICACAO'];
$Tipo = $_POST['TIPO'];
$IdCategoria = $_POST['categoria_ID'];
$IdEditora = $_POST['EDITORA_ID'];

$sql = "INSERT INTO TITULOS 
        VALUES (null, '{$Titulo}', '{$Sinopse}', '{$Classificacao}', '{$Tipo}', '{$IdCategoria}', '{$IdEditora}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Titulos.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Titulos.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
