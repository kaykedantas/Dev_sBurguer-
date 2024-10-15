<?php
session_start();
include_once '../db/conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$nome_cadastro = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email_cadastro = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha_cadastro = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(empty($nome_cadastro || $email_cadastro || $senha_cadastro)){
    $_SESSION['msg']=  "E necessário preencher todos os campos.";
    header("Location: ../public/paginas/cadastro.php");
    exit;
}

$verifique_email= "SELECT email FROM cliente WHERE email= '$email_cadastro'";
$verificacao =  mysqli_query($conn, $verifique_email);

if($verificacao == null){
    exit;
} else if ($verificacao > 0){
    $_SESSION['msg'] = "<p style='color:red;'>E-mail já cadastrado</p>";
    header("Location: ../public/paginas/cadastro.php");
}


$criar_tarefa = "INSERT INTO cliente (nome, email, senha) VALUES ('$nome_cadastro', '$email_cadastro', '$senha_cadastro')";
$tarefa_criada = mysqli_query($conn, $criar_tarefa);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Cadastro criado com sucesso.</p>";
    header("Location: ../public/paginas/cadastro.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Cadastro não concluido.</p>";
    header("Location: ../public/paginas/cadastro.php");
}