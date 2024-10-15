<?php
session_start();
include_once '../db/conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/paginas/login.php');
    exit;
}

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Seu carrinho está vazio.<br>";
    echo "<a href='../public/paginas/logado.php'>Voltar ao menu</a> ";
    exit;
}

$user_id = $_SESSION['user_id'];
$total = $_SESSION['totalcar'];
$obs = isset($_SESSION['observacao']) ? $_SESSION['observacao'] : NULL;
$desc_pagamento = isset($_POST['desc_pagamento']) ? filter_input(INPUT_POST, 'desc_pagamento', FILTER_SANITIZE_STRING) : '';

mysqli_begin_transaction($conn);

try {
    // Seleciona o próximo ID do pedido
    $chama_pedido = "SELECT COALESCE(MAX(id_pedido), 0) + 1 AS prox_id FROM pedido";
    $conectapedido = mysqli_query($conn, $chama_pedido);
    if (!$conectapedido) {
        throw new Exception("Erro ao buscar próximo ID do pedido: " . mysqli_error($conn));
    }

    $pedido = mysqli_fetch_assoc($conectapedido);
    $fk_pedido = $pedido['prox_id'];

    // Inserir o pedido
    $inserir_pedido = "INSERT INTO pedido (id_pedido, hr_pedido, total, observacoes, status_pedido, forma_pagamento, id_cliente) VALUES ('$fk_pedido', NOW(), '$total', '$obs', 'Sendo preparado', '$desc_pagamento', '$user_id')";

    $inseri_prod = mysqli_query($conn, $inserir_pedido);
    if (!$inseri_prod) {
        throw new Exception("Erro na inserção do pedido: " . mysqli_error($conn));
    }

    // Inserir os produtos do pedido
    foreach ($_SESSION['carrinho'] as $item_id => $quantity) {
        $add_pedido_produto = "INSERT INTO pedido_produto (id_pedido, id_produto, quantidade) VALUES ('$fk_pedido', '$item_id', '$quantity')";

        if (!mysqli_query($conn, $add_pedido_produto)) {
            throw new Exception("Erro ao adicionar produto ao pedido: " . mysqli_error($conn));
        }
    }

    mysqli_commit($conn);
    unset($_SESSION['carrinho']);

    echo "Pedido realizado com sucesso!<br>";
    header("Location: ../public/paginas/pedidos.php");
    exit;

} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Falha ao realizar o pedido. Motivo: " . $e->getMessage();
}

