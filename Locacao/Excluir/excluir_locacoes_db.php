<?php
	include('../../conexao.php');

	$Id = $_POST['ID_LOCACAO'];
	
	$sql = "DELETE FROM LOCACAO WHERE ID_LOCACAO = {$Id}";
	
	$query = mysqli_query($conexao, $sql);
	if($query) {
		header('Location: ../Listar/listar_locacoes.php?ok=1&msg=' . $Id);
	} else {
		header('Location: ../Listar/listar_locacoes.php?erro=1&msg=' . mysqli_error($conexao));
	}
			
	mysqli_close($conexao);
