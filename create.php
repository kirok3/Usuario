<?php
    require_once "config.php";
    //so vai executar se for acionado o metodo post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $senha = $_POST["senha"];
        $email = $_POST["email"];

        $sql = "INSERT INTO usuario (nome, telefone, endereco, senha, email) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($link, $sql);

        mysqli_stmt_bind_param($stmt, "sssss", $nome, $telefone, $endereco, $senha, $email);

        if(!mysqli_stmt_execute($stmt)){
            echo "Ocorreu um erro";
        }
    }
    ?>
<html>
    <head>
        <title>Cadastro de Contatos</title>
    </head>
    <body>
        <h2>Cadastro de contatos</h2>
        <form method="post" action="create.php">
            <p>nome : <input type="text" name="nome"></p>
            <p>telefone : <input type="text" name="telefone"></p>
            <p>endereco : <input type="text" name="endereco"></p>
            <p>senha : <input type="text" name="senha"></p>
            <p>email : <input type="text" name="email"></p>
            <p><input type="submit" value="gravar"></p>
        </form>
    </body>
</html>