<?php
session_start();
include_once '../../db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['obs2'])) {
    $_SESSION['observacao'] = filter_input(INPUT_POST, 'obs2', FILTER_SANITIZE_STRING);
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="../css/pagamento.css">
    <title>Pagamento</title>
</head>
<body>
    <header id="navbar">

        <a href="logado.php"> <img src="../imagens/logo.png"></a>

    </header>

    <section id="arrumar">
        <div id="pagamento">
            <h1>Pagamento</h1>
            
            <div id="consertando">
                <form action="../../procs/proc_finaliza_pedido.php" method="post">
                    <input id="ajustar3" type="text" name="NOME" placeholder="Nome Completo" required><br>
                    <input id="ajustar3" type="number" name="cpf" placeholder="CPF" required><br>

                    <select name="desc_pagamento" id="ajustar3" required>
                        <option value="">SELECIONE UMA FORMA DE PAGAMENTO</option>
                        <option value="Credito">Credito</option>
                        <option value="Debito">Debito</option>
                        <option value="Avista">Dinheiro</option>
                        <option value="Pix">Pix</option>
                    </select>
                    <button class="btn" type="submit">Finalizar</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>