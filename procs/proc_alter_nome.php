<?php
session_start();
include_once '../db/conexao.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/paginas/login.php');
    exit;
}

$novo_nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$id = $_SESSION['user_id'];

$nome_alterar = "UPDATE cliente SET nome = '$novo_nome' WHERE id_cliente = $id";
$nome_alterado = mysqli_query($conn, $nome_alterar);

if($nome_alterado) {
    $_SESSION['user_name'] = $novo_nome;
    $_SESSION['msg1'] = "<p style='color:green;'> Nome atualizado com sucesso.</p>";
    header("Location: ../public/paginas/perfil.php");
} else {
    $_SESSION['msg1'] = "<p style='color:red;'> Nome não atualizado.</p>";
    header("Location: ../public/paginas/perfil.php");
}

