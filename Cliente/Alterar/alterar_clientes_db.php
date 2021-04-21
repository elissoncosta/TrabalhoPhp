<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero_endereco'];

$sql = "UPDATE CLIENTE SET nome = '{$nome}', cpf = '{$cpf}', celular = '{$celular}', sexo = '{$sexo}', endereco = '{$endereco}', numero_endereco = '{$numero}' WHERE id_cliente = '{$id}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_clientes.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_clientes.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
