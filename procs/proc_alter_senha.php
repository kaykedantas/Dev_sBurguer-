<?php
session_start();
include_once '../db/conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/paginas/login.php');
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
$senha_atual = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); 

$login_correto = "SELECT id_cliente FROM cliente WHERE email = '$email' AND senha = '$senha_atual'";
$logado = mysqli_query($conn, $login_correto);

if (mysqli_num_rows($logado) > 0) {
    $user = mysqli_fetch_assoc($logado);
    $nova_senha = filter_input(INPUT_POST, 'novasenha', FILTER_SANITIZE_STRING); 
    $id = $_SESSION['user_id'];
    $senha_alterar = "UPDATE cliente SET senha = '$nova_senha' WHERE id_cliente = $id";
    $senha_alterada = mysqli_query($conn, $senha_alterar);

    if($senha_alterada) {
    $_SESSION['msg'] = "<p style='color: green;'>Senha Alterada.</p>";
    header("Location: ../public/paginas/perfil.php");
    exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color: red;'>E-mail ou senha incorretos.</p>";
    header("Location: ../public/paginas/perfil.php");
    exit();
}
?>