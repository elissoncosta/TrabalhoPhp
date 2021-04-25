<?php
include('../../conexao.php');

$Id = $_POST['Id'];
$RazaoSocial = $_POST['RazaoSocial'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Endereco = $_POST['Endereco'];
$Numero = $_POST['Numero'];
$Complemento = $_POST['Complemento'];
$Cep = $_POST['Cep'];

$sql = "UPDATE EDITORA
           SET RAZAO_SOCIAL ='{$RazaoSocial}',
               TELEFONE ='{$Telefone}',
               ENDERECO ='{$Endereco}',
               NUMERO_ENDERECO ='{$Numero}',
               COMPLEMENTO ='{$Complemento}',
               CEP ='{$Cep}',
               EMAIL ='{$Email}'
         WHERE ID_EDITORA = '{$Id}'";

$query = mysqli_query($conexao, $sql);
if ($query) {
    header('Location: ../Listar/listar_Editora.php?ok=3&msg=' . $Id);
} else {
    header('Location: alterar_Editora.php?id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
