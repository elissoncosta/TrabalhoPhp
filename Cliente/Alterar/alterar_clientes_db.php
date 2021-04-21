<?php
include('../../conexao.php');

$Id = $_POST['ID_CLIENTE'];
$Nome = $_POST['NOME'];
$CPF = $_POST['CPF'];
$Celular = $_POST['CELULAR'];
$Sexo = $_POST['SEXO'];
$Endereco = $_POST['ENDERECO'];
$Numero = $_POST['NUMERO_ENDERECO'];

$sql = "UPDATE CLIENTE 
	       SET NOME = '{$Nome}', 
		       CPF = '{$CPF}', 
		       Celular = '{$Celular}', 
		       SEXO = '{$Sexo}', 
		       ENDERECO = '{$Endereco}', 
		       NUMERO_ENDERECO = '{$Numero}' 
		 WHERE ID_CLIENTE = {$Id}";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: listar_clientes.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_clientes.php?Id_Cliente=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
