<?php
session_start();
include_once '../db/conexao.php';

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// verificacao de quantidade de itens de um item 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

    // se o item ja existir no carrinho ele vai somar um item a ele 
    if (isset($_SESSION['carrinho'][$item_id])) {
        $_SESSION['carrinho'][$item_id] += $quantity;
    } else {
        $_SESSION['carrinho'][$item_id] = $quantity;
    }

    $_SESSION['item_add'] = "<p style='color:white; width: 100%;  text-align: center; font-size: 35px'  >Item adicionado ao carrinho!<br></p>";
    header('Location: ../public/paginas/logado.php');
} else {
    $_SESSION['item_add'] = "Item não adicionado ao carrinho!<br>";
    header('location: ../public/paginas/logado.php');
    exit;
}