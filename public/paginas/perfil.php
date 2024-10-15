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
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Editar Perfil</title>
</head>

<body>
    <div id="navbar">
        <a href="logado.php"><img src="../imagens/logo.png"></a>
    </div>

    <div id="container">
        <div id="foto">
        <h1 id="titulo">Editar Nome</h1>
            <h2>
                <?php
                    echo $_SESSION["user_name"];
                ?> 
            </h2>
            <?php
            if(isset($_SESSION['msg1'])){
            echo $_SESSION['msg1'];
            unset ($_SESSION['msg1']);
            } 
            ?>
            <form action="../../procs/proc_alter_nome.php" method="post">
            <input id="ajustar2" type="text" name="nome" placeholder="Digite o novo nome." required><br><br>
            <button class="btn" type="submit">Confirmar</button>
            </form>
        </div>

        <div id="EditarPerfil">
            <form action="../../procs/proc_alter_senha.php" method="post">
                <h1 id="titulo">Editar Senha</h1>

                <input id="ajustar2" type="email" name="email" placeholder="E-mail" required><br><br>

                <input id="ajustar2" type="password" name="senha" placeholder="Digite sua senha atual" required><br><br><br>

                <input id="ajustar2" type="password" name="novasenha" placeholder="Digite a nova senha." required><br><br><br>
                <button class="btn" type="submit">Confirmar</button><br><br>
            </form>
            <?php
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
            } 
            ?>
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