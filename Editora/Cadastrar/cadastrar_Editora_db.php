<?php
include('../../conexao.php');

$RazaoSocial = $_POST['RazaoSocial'];
$Telefone = $_POST['Telefone'];
$Endereco = $_POST['Endereco'];
$Numero = $_POST['Numero'];
$Complemento = $_POST['Complemento'];
$Email = $_POST['Email'];
$Cep = $_POST['Cep'];

$sql = "INSERT INTO EDITORA
	    VALUES(NULL, '{$RazaoSocial}', '{$Telefone}', '{$Endereco}', '{$Numero}', '{$Complemento}', '{$Email}', '{$Cep}')";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Editora.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_Editora.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
