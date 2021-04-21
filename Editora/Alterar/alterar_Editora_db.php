<?php
include('../../conexao.php');

$Id = $_POST['ID_EDITORA'];
$RAZAO_SOCIAL = $_POST['RAZAO_SOCIAL'];
$Telefone = $_POST['TELEFONE'];
$Endereco = $_POST['ENDERECO'];
$Numero = $_POST['NUMERO_ENDERECO'];
$Complemento = $_POST['COMPLEMENTO'];
$CEP = $_POST['CEP'];
$Email = $_POST['EMAIL'];

$sql = "UPDATE EDITORA
           SET ID_EDITORA ='{$Id}',
               RAZAO_SOCIAL ='{$RAZAO_SOCIAL}',
               TELEFONE ='{$Telefone}',
               ENDERECO ='{$Endereco}',
               NUMERO_ENDERECO ='{$Numero}',
               COMPLEMENTO ='{$Complemento}',
               CEP ='{$CEP}',
               EMAIL ='{$Email}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
	header('Location: ../Listar/listar_Editora.php?ok=3&msg=' . mysqli_insert_id($conexao));
} else {
	header('Location: alterar_Editora.php?id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
