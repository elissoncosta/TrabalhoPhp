<?php
include('conexao.php');

$Razao_Social = $_POST['RAZAO_SOCIAL'];
$Telefone = $_POST['TELEFONE'];
$Endereco = $_POST['ENDERECO'];
$Numero = $_POST['NUMERO_ENDERECO'];
$Complemento = $_POST['COMPLEMENTO'];
$Cep = $_POST['CEP'];
$Email = $_POST['EMAIL'];

$sql = "INSERT INTO EDITORA
	    VALUES(NULL, '{$Razao_Social}', '{$Telefone}', '{$Endereco}', '{$Numero}', '{$Complemento}', '{$Cep}', '{$Email}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Editora.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Editora.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
