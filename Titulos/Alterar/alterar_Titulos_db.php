<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$titulo = $_POST['titulo'];
$sinopse = $_POST['sinopse'];
$IdEditora = $_POST['IdEditora'];
$IdCategoria = $_POST['IdCategoria'];
$tipo = $_POST['tipo'];
$classificacao = $_POST['classificacao'];

$sql = "UPDATE TITULOS ,
           SET TITULO = '{$titulo}',
               SINOPSE = '{$sinopse}',
               CLASSIFICACAO = '{$classificacao}',
               TIPO = '{$tipo}',
               CATEGORIA_ID = '{$IdCategoria}',
               EDITORA_ID = '{$IdEditora}'
         WHERE ID_TITULO = '{$Id}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Titulos.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Titulos.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
