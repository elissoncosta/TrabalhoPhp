<?php
include('../../conexao.php');

$Senha = md5($_POST['Senha']);
$Email = $_POST['Email'];

$sql = "UPDATE USUARIO 
           SET Senha = MD5('{$Senha}'), 
		 WHERE Email = '{$Email}'";

$query = mysqli_query($conexao, $sql);

echo $sql;

if ($query)
{
    header('Location: ../../index.php?ok=3&msg=' . $Id);
}
else
{
    header('Location: alterar_usuarios.php?Id=' . $Id . '&erro=3&msg=' . mysqli_error($conexao));
}

mysqli_close($conexao);
