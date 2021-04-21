<?php
	include('conexao.php');

	$Id = $_POST['Id'];
	
	$sql = "DELETE FROM TITULOS WHERE ID_TITULO = {$Id}";
	
	$query = mysqli_query($conexao, $sql);
	if($query) {
		header('Location: ../Listar/listar_Titulos.php?ok=1&msg=' . $Id);
	} else {
		header('Location: ../Listar/listar_Titulos.php?erro=1&msg=' . mysqli_error($conexao));
	}

	mysqli_close($conexao);
?>