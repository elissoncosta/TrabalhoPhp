<?php
include('./conexao.php');

$user = $_POST['user'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM USUARIO WHERE user = '{$user}' AND senha = '{$senha}'";

$query = mysqli_query($conexao, $sql);
$usuario = mysqli_num_rows($query);

if ($usuario == 1) {
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

	if ($item['status'] == 'A') {
		header('Location: painel.php');
	} else {
		header('Location: index.php?erro=2');
	}
} else {
	header('Location: index.php?erro=1');
}

mysqli_close($conexao);
