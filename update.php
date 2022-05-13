<?php
require_once "config.php";
if($_GET['id']){
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE idusuario = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
}
if($_SERVER['REQUEST_METHOD'] == "POST"){        
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $id = $_POST["id"];
    $sql = "UPDATE usuario SET nome = ?, telefone = ?, endereco = ?, senha = ?, email = ?, WHERE idusuario = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $telefone, $endereco, $senha, $email, $id);
    if(mysqli_stmt_execute($stmt)){
        header('location: index.php');
        exit;
    } else {
        echo "Ocorreu um erro";
    }
}


?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Contato</title>
</head>
<body>
    <h2>Alteração de Contatos</h2>
    <form method="post" action="update.php">
        <p>Nome:<input type="text" name="nome" value="<?php echo $row['nome'] ?>"></p>
        <p>Telefone:<input type="text" name="telefone" value="<?php echo $row['telefone'] ?>"></p>
        <p>Endereco:<input type="text" name="endereco" value="<?php echo $row['endereco'] ?>"></p>
        <p>senha:<input type="text" name="senha" value="<?php echo $row['senha'] ?>"></p>
        <p>email:<input type="text" name="email" value="<?php echo $row['email'] ?>"></p>
        <input type="hidden" name="id" value="<?php echo $row['idusuario'] ?>">
        <p><input type="submit" value="Gravar"></p>
    </form>
    <p><a href='index.php'>Voltar</a></p>
</body>
</html>