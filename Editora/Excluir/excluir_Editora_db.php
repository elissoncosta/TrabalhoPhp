<?php
include('conexao.php');

$Id = $_POST['ID_EDITORA'];

$sql = "DELETE FROM EDITORA WHERE ID_EDITORA = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Editora.php?ok=1&msg=' . $Id);
} else {
	header('Location: ../Listar/listar_Editora.php?erro=1&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
