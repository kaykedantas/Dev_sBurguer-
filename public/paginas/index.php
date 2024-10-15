<?php
session_start();
include_once '../../db/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="../css/index.css">
    <title>Dev's Burguer</title>
</head>

<body>
    <header>
        <div id="navbar1">
            <div>
                <a href="index.php"><img id="logo" src="../imagens/titulo.png" alt=""></a>
            </div>
            <div id="navp2">
                <form action="../../procs/proc_login.php" method="post">
                    <input id="email" type="email" name="email" placeholder="Digite seu E-mail">
                    <input type="password" name="senha" placeholder="Digite sua Senha">
                    <button class="btncad" type="submit">Entrar</button>
                </form>
                <a href="cadastro.php"><button class="btncad" id="cad1">Cadastre-se</button></a>
                  <?php
                    if(isset($_SESSION["msg"])){
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                ?>
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
                    <a class="but2" href="#batata">Batata</a>
                </div>
            </div>
        </div>

        <div class="background-image">
            <div class="text">
                <h1 class="text1">Bem vindo ao Dev's burguer</h1>
                <p class="text1">faça seu pedido a baixo !</p>
            </div>
        </div>

    </header>
<div id="myModal" class="modal">
    <div class="modal-content">
        <p>Faça Login ou <a id="a-modal" href="cadastro.php" target="_blank">Cadastre-se</a>.</p>
        <button id="closeModal">Fechar</button>
    </div>
</div>
    <section>
        <h3 id="pizza">______________________________ Pizza ______________________________</h3>
        <div class="cards3">
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza1.webp" alt="foto">
                <div class="cards-info">
                <?php
                    $id = 1;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza2.webp" alt="">
                <div class="cards-info">
                <?php
                    $id = 2;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
                </div>
            </div>
            <div class="cards-geral">
                <img class="img-card" src="../imagens/pizza3.webp" alt="">
                <?php
                    $id = 3;
                    $sql = "SELECT * FROM produto where id_produto = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);

                    echo "<p>" . $item['nome_produto'] . "</p>";
                    echo "<p>" . $item['descricao_produto'] . "</p>";
                    echo "<p>R$: " . $item['preco_produto'] . "</p>";
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
                </div>
            </div>
        </div>
        </div>
        <h3 id="batata"> ____________________________ Batatas ____________________________</h3>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
                    echo "<form>";
                    echo "<input type='hidden' name='item_id' value='" . $item['id_produto'] . "'>";
                    echo "<button class='btn'>Adicionar ao Carrinho</button>";
                    echo "</form>";
                    ?>
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
    <script>
    const modal = document.getElementById("myModal");
    const showModalButtons = document.getElementsByClassName("btn");
    const closeModal = document.getElementById("closeModal");

    for (let i = 0; i < showModalButtons.length; i++) {
        showModalButtons[i].onclick = function() {
            event.preventDefault();
            modal.style.display = "block";
        };
    }

    closeModal.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
    </script>
</body>

</html>