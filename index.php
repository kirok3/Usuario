<?php 
    require_once "config.php";

    $sql = "SELECT * FROM usuario ORDER BY nome";
    $result = mysqli_query($link, $sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir Contatos</title>
</head>
<body>
    <h2>Lista de Contatos</h2>
    <p><a href="create.php">Incluir</a></p>
    <table border="1">
        <tr>
            <td>Id</td><td>Nome</td><td>Telefone</td><td>Endereço</td><td>senha</td><td>email</td>
            <td colspan="3">Ações</td>
        </tr>
        <?php while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo($row['idusuario']) ?></td>
            <td><?php echo($row['nome']) ?></td>
            <td><?php echo($row['telefone']) ?></td>
            <td><?php echo($row['endereco']) ?></td>
            <td><?php echo($row['senha']) ?></td>
            <td><?php echo($row['email']) ?></td>
            <td><?php echo('<a href="read.php?id='.$row['idusuario'].'">Exibir</a>') ?></td>
            <td><?php echo('<a href="update.php?id='.$row['idusuario'].'">Alterar</a>') ?></td>
            <td><?php echo('<a href="delete.php?id='.$row['idusuario'].'">Excluir</a>') ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>