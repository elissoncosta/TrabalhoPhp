<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$titulo = $_POST['titulo'];
$sinopse = $_POST['sinopse'];
$classificacao = $_POST['classificacao'];
$tipo = $_POST['tipo'];
$IdCategoria = $_POST['IdCategoria'];
$IdEditora = $_POST['IdEditora'];

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
	header('Location: ../Listar/listar_Titulos.php?ok=3&msg=' . $Id);
} else {
	header('Location: alterar_Titulos.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
