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
    <title>Dev's Burguer - Carrinho</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="../css/carrinho.css">
</head>
<body>
    <header>
        <div id="navbar1">
            <div>
                <a href="logado.php"><img id="logo" src="../imagens/titulo.png" alt=""></a>
            </div>
            <div id="navp2">
                <form action="../../procs/proc_sair.php" method="post">
                    <a class="but1" href="perfil.php">
                        <?php
                        // echo $_SESSION["user_name"];
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
        <div id="info-produtos">
            <?php
            $total = 0;
            if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {

                foreach ($_SESSION['carrinho'] as $item_id => $quantity) {
                    // Evitar injeção de SQL escapando a variável (ou use prepared statements)
                    $item_id = mysqli_real_escape_string($conn, $item_id);

                    // Executa a query para obter o produto
                    $sql_carrinho = "SELECT * FROM produto WHERE id_produto = '$item_id'";
                    $result_carrinho = mysqli_query($conn, $sql_carrinho);

                    // Verifica se a consulta retornou um resultado válido
                    if ($result_carrinho && mysqli_num_rows($result_carrinho) > 0) {
                        $item_carrinho = mysqli_fetch_assoc($result_carrinho);

                        // Exibe informações do produto e subtotal
                        echo "<div>";
                        echo "<p>Item: " . htmlspecialchars($item_carrinho['nome_produto']) . "</p>";
                        echo "<p>Quantidade: " . htmlspecialchars($quantity) . "</p>";
                        echo "<p>Preço Unitário: R$" . number_format($item_carrinho['preco_produto'], 2, ',', '.') . "</p>";
                        echo "<p>Subtotal: R$" . number_format($item_carrinho['preco_produto'] * $quantity, 2, ',', '.') . "</p><hr>";
                        echo "</div>";

                        // Calcula o total
                        $total += $item_carrinho['preco_produto'] * $quantity;
                        $_SESSION['totalcar'] = $total;
                    } else {
                        echo "<p>Produto com ID $item_id não encontrado.</p>";
                    }
                }

                // Exibe o total
            

            } else {
                echo "<p>Nenhum item no carrinho.</p>";
            }
            ?>
        </div>
        <div>
            <div id="info-compra">
                <form action="pagamento.php" method="post">
                    <label id="obs1">Observações:</label> <br>
                    <input type="text" name="obs2" id="obs" placeholder="Ex: tire o cheddar">
                    <?php
                    echo "<p><strong>Total: R$" . number_format($total, 2, ',', '.') . "</strong></p>";
                    ?>
                    <input id="fp" type="submit" value="Finalizar Pedido">
                </form>
            </div>
            <div>

            </div>
            <div id="finalizar">
                <a href="logado.php"><input id="cp" type="submit" value="Continuar comprando"></a>
                <br>
            </div>
        </div>
    </section>
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