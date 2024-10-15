<?php
session_start();
include_once '../../db/conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="../css/pedidos.css">
    <title>Dev's Burguer - Carrinho</title>
</head>
<body>
    <header>
        <div id="navbar1">
            <div>
                <a href="logado.php">
                   <img id="logo" src="../imagens/titulo.png" alt=""> 
                </a>
        
            </div>
            <div id="navp2">
                <form action="../../procs/proc_sair.php" method="post">
                    <a class="but1" href="perfil.php">
                        <?php
                        
                        if (isset($_SESSION["user_name"])) {
                            echo $_SESSION["user_name"];
                        } else {
                            echo "Usuário não identificado.";
                        }

                        ?>
                    </a>
                    <a class="but1" href="pedidos.php"> Pedidos</a>
                    <a class="but1" href="carrinho.php">Carrinho</a>
                    <a href="../../procs/proc_sair.php">
                      <input id="sair" type="submit" value="Sair" name="logout">  
                    </a>
                </form>
            </div>
        </div>
    </header>
    <div id="espaco-vazio"></div>
    <section>
        
     <h1 id="hist">Histórico de Pedidos</h1>
        <div id="info-produtos">

        <?php

$user_id = $_SESSION['user_id'];

// Consulta todos os pedidos do cliente atual
$sql_orders = "SELECT * FROM pedido WHERE id_cliente = '$user_id' ORDER BY hr_pedido DESC";
$result_orders = mysqli_query($conn, $sql_orders);

// Verifica se o cliente tem pedidos
if (mysqli_num_rows($result_orders) > 0) {
    // 

    // Itera sobre cada pedido
    while ($pedido = mysqli_fetch_assoc($result_orders)) {
        $pedido_id = $pedido['id_pedido'];
        $data_pedido = $pedido['hr_pedido'];
        $status_pedido = $pedido['status_pedido'];
        $total_pedido = $pedido['total'];
        $forma_pagamento = $pedido['forma_pagamento'];
        $observacoes = $pedido['observacoes'];

        // Exibe o número do pedido e suas informações principais
        echo "<div>";
        echo "<h2>Pedido #$pedido_id</h2>";
        echo "<p>Data do Pedido: $data_pedido</p>";
        echo "<p>Status: $status_pedido</p>";
        echo "<p>Total: R$ $total_pedido</p>";
        echo "<p>Forma de Pagamento: $forma_pagamento</p>";
        echo "<p>Observações: $observacoes</p>";
        
        // Consulta os produtos relacionados a este pedido
        $sql_items = "
            SELECT produto.nome_produto, produto.preco_produto, pedido_produto.quantidade 
            FROM pedido_produto 
            JOIN produto ON pedido_produto.id_produto = produto.id_produto 
            WHERE pedido_produto.id_pedido = '$pedido_id'";
        $result_items = mysqli_query($conn, $sql_items);
        
        // Exibe os produtos do pedido
        echo "<h3>Itens do Pedido:</h3>";
        echo "<ul>";
        while ($item = mysqli_fetch_assoc($result_items)) {
            $subtotal = $item['preco_produto'] * $item['quantidade'];
            echo "<li>";
            echo "Produto: " . $item['nome_produto'] . " - Quantidade: " . $item['quantidade'] . " - Preço Unitário: R$" . $item['preco_produto'] . " - Subtotal: R$" . number_format($subtotal, 2);
            echo "</li>";
        }
        echo "</ul>";
        echo "</div><hr>"; // Separador entre pedidos
    }
} else {
    echo "<p>Você ainda não fez nenhum pedido.</p>";
}
        
        ?>
            
        </div>
        <div>
            <!-- <div id="info-compra">
                <label id="obs1">Observações:</label> <br>
                <input type="text" name="observacoes" id="obs" placeholder="Ex: tire o cheddar">
                <?php
    echo "<p><strong>Total: R$" . number_format($total, 2, ',', '.') . "</strong></p>";
                ?>
                
            </div>
            <div>
                
            </div>
            <div id="finalizar">
                <a href="logado.php"><input href="logado.php" id="cp" type="submit" value="Continuar comprando"></a>
                <form action="proc_finaliza_pedido.php">
                    <input id="fp" type="submit" value="Finalizar Pedido"> <br>
                </form>
            </div> -->
        </div>
    </section>
    </div>
            <div id="finalizar">
                <a href="logado.php"><input id="cp" type="submit" value="Continuar comprando"></a>
                <br>
            </div>
        </div>
        <footer style="background-color: #333; color: #fff; text-align: center; padding: 5px; margin-top: 10% ; " >
        <div>
            <h4>Dev's Burguer</h4>
            <p>Feito com carinho por Four Devs</p>
        </div>
        <div>
            <p>&copy; 2024 Dev's Burguer. Todos os direitos reservados.</p>
        </div>
        <div>
            <a href="#" style="color: #fff; text-decoration: none; margin: 0 10px;">Facebook</a>
            <a href="#" style="color: #fff; text-decoration: none; margin: 0 10px;">Instagram</a>
            <a href="#" style="color: #fff; text-decoration: none; margin: 0 10px;">Twitter</a>
        </div>
    </footer>
</body>

</html>