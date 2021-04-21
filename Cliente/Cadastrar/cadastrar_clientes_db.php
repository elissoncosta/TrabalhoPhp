<?php
include('../../conexao.php');

$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Celular = $_POST['Celular'];
$Sexo = $_POST['Sexo'];
$Endereco = $_POST['Endereco'];
$Numero = $_POST['Numero_Endereco'];

$sql = "INSERT INTO CLIENTE 
        VALUES (null, '{$Nome}', '{$CPF}', '{$Celular}', '{$Sexo}', '{$Endereco}', '{$Numero}')";

$query = mysqli_query($conexao, $sql);

if ($query) {
	header('Location: ../Listar/listar_clientes.php?ok=2&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: cadastrar_clientes.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
