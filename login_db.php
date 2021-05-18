<?php
session_start();

include('./conexao.php');

$user = $_POST['user'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuario WHERE user = '{$user}' AND senha = MD5('{$senha}')";

$query = mysqli_query($conexao, $sql);
$usuario = mysqli_num_rows($query);

if ($usuario == 1)
{
    $item = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($item['status'] == 'A')
    {
        header('Location:  ./Home/Painel/painel.php');
    }
    else
    {
        header('Location: index.php?erro=2');
    }
}
else
{
    header('Location: index.php?erro=1');
}

mysqli_close($conexao);
