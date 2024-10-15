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
    <link rel="stylesheet" href="../css/logado.css">
    <title>Dev's Burguer</title>
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
                        echo $_SESSION["user_name"];
                        ?>

                    </a>
                    <a class="but1" href="pedidos.php"> Pedidos</a>
                    <a class="but1" href="carrinho.php">Carrinho</a>
                    <input id="sair" type="submit" value="Sair" name="logout">
                </form>
            </div>
        </div>
        <div id="espaco-vazio"></div>
        <div id="fundo">
            <div id="navbar2">
                <div>
                    <a class="but2" href="#pizza">Pizza</a>
                </div>
                <div>
                    <a class="but2" href="#hamburguer">Hamburguer</a>
                </div>
                <div>
                    <a class="but2" href="#batatas">Batata</a>
                </div>
            </div>
            <?php
        if (isset($_SESSION["item_add"])) {
            echo $_SESSION["item_add"];
            unset($_SESSION["item_add"]);
        }
        ?>
        </div>
        <div class="background-image">
            <div class="text">
                <h1 class="text1">Bem vindo ao Dev's burguer</h1>
                <p class="text1">faça seu pedido a baixo !</p>
            </div>
        </div>
    </header>

    <section>
        <h3 id="pizza">______________________________ Pizza ______________________________</h3>
        <div class="cards3">
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza2.webp" alt="foto">
                <div class="cards-info">
                    <?php
                    $id = 1;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza1.webp" alt="">
                <div class="cards-info">
                    <?php
                    $id = 2;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza3.webp" alt="">
                <div class="cards-info">
                    <?php
                    $id = 3;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <h3 id="hamburguer">___________________________ Hamburguer ___________________________</h3>
        <div class="cards3">
            <div class="cards-geral">
                <img class="img-card"
                    src="https://minervafoods.com/wp-content/uploads/2023/09/HamburguerAlcatraComBacon_1-scaled.jpg"
                    alt="foto">
                <div class="cards-info">
                    <?php
                    $id = 4;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card" src="https://assets.unileversolutions.com/recipes-v2/240147.jpg" alt="">
                <div class="cards-info">
                    <?php
                    $id = 5;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card"
                    src="https://www.saboresajinomoto.com.br/uploads/images/recipes/hamburguer-de-frango-e-bacon.webp"
                    alt="">
                <div class="cards-info">
                    <?php
                    $id = 6;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <h3 id="batatas"> ____________________________ Batatas ____________________________</h3>
        <div class="cards3">
            <div class="cards-geral">
                <img class="img-card"
                    src="https://www.tendaatacado.com.br/dicas/wp-content/uploads/2022/06/como-fazer-batata-frita-topo.jpg"
                    alt="foto">
                <div class="cards-info">
                    <?php
                    $id = 7;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card"
                    src="https://pausadramatica.com.br/wp-content/uploads/2016/07/batata-rustica-mcdonald-s-original.png"
                    alt="">
                <div class="cards-info">
                    <?php
                    $id = 8;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card"
                    src="https://dbblegusta.appwebdigital.com.br/_core/_uploads/189/2024/04/1946110424iabfkbci2g.jpg"
                    alt="">
                <div class="cards-info">
                    <?php
                    $id = 9;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form action='../../procs/proc_add_carrinho.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<input type='hidden' name='quantity' value='1' min='1'>";
                    echo "<button class='btn' type='submit'>Adicionar ao Carrinho</button>";
                    echo "<a class='car' href='carrinho.php'>----🛒</a>";
                    echo "</form>";
                    ?>
                    </form>
                </div>
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