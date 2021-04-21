<?php
include('conexao.php');

$User = $_POST['USER'];
$Senha = $_POST['SENHA'];

$sql = "SELECT USER, SENHA FROM USUARIO WHERE USER = '{$User}' AND SENHA = '{$Senha}'";

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
