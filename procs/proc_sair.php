<?php
// Inicia a sessão
session_start();
include_once '../db/conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/paginas/index.php');
    exit;
}

// Verifica se o botão de logout foi clicado
if (isset($_POST['logout'])) {
    // Destroi todas as variáveis da sessão
    session_unset();

    // Destroi a sessão
    session_destroy();

    // Redireciona para a página de login ou inicial
    header('Location: ../public/paginas/index.php');
    exit;
}
