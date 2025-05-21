<?php
include 'conexao.php';

$db = new Database();
$con = $db->con;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Catálogo de livros</h1>
    <a href="adicionar.php" class="botao">+adicionar livros</a>

    <table>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Açôes</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM livros";
            $result = $con->query($sql);

            if ($result->num_rows > 0):
                while($livro = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $livro['id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?= $livro['id'] ?>" onclick="return confirm('Tem certeza?')">Remover</a>
                    </td>
                </tr>
            <?php endwhile; else: ?>
                <tr>
                    <td colspan="3">Nenhum livro cadastrado.</td>
                </tr>
            <?php endif; ?>
    </table>
    </div>
</body>
</html>

