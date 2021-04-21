<?php
include('../../conexao.php');

$Id = $_POST['ID_TITULO'];
$Titulo = $_POST['TITULO'];
$Sinopse = $_POST['SINOPSE'];
$Classificacao = $_POST['CLASSIFICACAO'];
$Tipo = $_POST['TIPO'];
$IdCategoria = $_POST['categoria_ID'];
$IdEditora = $_POST['EDITORA_ID'];

$sql = "UPDATE TITULOS , 
           SET ID_TITULO, 
               TITULO = '{$Titulo}', 
               SINOPSE = '{$Sinopse}', 
               CLASSIFICACAO = '{$Classificacao}', 
               TIPO = '{$Tipo}', 
               CATEGORIA_ID = '{$IdCategoria}'
               EDITORA_ID = '{$IdEditora}'
         WHERE ID_TITULO = '{$Id}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Titulos.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Titulos.php?id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
