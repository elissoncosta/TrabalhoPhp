<?php
include('../../conexao.php');

$Titulo = $_POST['Titulo'];
$Sinopse = $_POST['Sinopse'];
$Classificacao = $_POST['Classificacao'];
$Tipo = $_POST['Tipo'];
$Quantidade = $_POST['Quantidade'];

$sql = "INSERT INTO TITULOS 
        VALUES (null, '{$Titulo}', '{$Sinopse}', '{$Classificacao}', '{$Tipo}', '{$IdCategoria}', '{$IdEditora}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Titulos.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Titulos.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
