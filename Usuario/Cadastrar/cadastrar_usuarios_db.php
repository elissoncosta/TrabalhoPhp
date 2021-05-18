<?php
include('../../conexao.php');

$Nome = $_POST['Nome'];
$Usuario = $_POST['Usuario'];
$Senha = $_POST['Senha'];
$Status = $_POST['Status'];
$Email = $_POST['Email'];

$sql = "INSERT INTO USUARIO 
        VALUES (null, '{$Nome}', '{$Usuario}', '{$Senha}', '{$Status}', '{$Email}')";

$query = mysqli_query($conexao, $sql);

if ($query)
{
	header('Location: ../../index.php?ok=2&msg=' . mysqli_insert_id($conexao));
}
else
{
	header('Location: cadastrar_usuarios.php?erro=2&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
