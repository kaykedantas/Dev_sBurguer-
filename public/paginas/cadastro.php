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
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div id=navbar>
        <a href="index.php"> <img src="../imagens/logo.png" alt=""></a>
    </div>
    <br>
    <section id=arrumar>
        <div id=cadastro> <br>
            <form action="../../procs/proc_cadastro.php" method="post">

                <h1 id=titulo>Cadastrar</h1>

                <input id="ajustar2" type="text" name="nome" placeholder="Nome"><br><br>

                <input id="ajustar2" type="email" name="email" placeholder="E-mail"><br><br>

                <input id="ajustar2" type="password" name="senha" placeholder="Senha"><br><br><br>

                <button class="btn" type="submit">Cadastrar </button><br><br>

            </form>

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

            <h1>Já tenho uma conta, <a id="logar" href="index.php">logar.</a></h1>

        </div>

    </section>


</body>

</html>