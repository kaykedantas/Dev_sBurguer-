<?php
session_start();
include_once '../db/conexao.php';

// Corrigido para usar INPUT_POST
$email_login = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha_login = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

// Consulta SQL
$login_correto = "SELECT id_cliente, nome FROM cliente WHERE email = '$email_login' AND senha = '$senha_login'";
$logado = mysqli_query($conn, $login_correto);

// Verifica se o login está correto
if (mysqli_num_rows($logado) > 0) {
    $user = mysqli_fetch_assoc($logado);
    $_SESSION['user_id'] = $user['id_cliente'];
    $_SESSION['user_name'] = $user['nome'];
    
    header("Location: ../public/paginas/logado.php");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color: white;'>E-mail ou senha incorretos.</p>";
    header("Location: ../public/paginas/index.php");
    exit();
}
?>
