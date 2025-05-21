<?php include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST ['autor'];
 

$stmt = $con ->prepare ("INSERT INTO livros (titulo, autor) VALUES (?, ?)");
$stmt->bind_param("ss", $titulo, $autor);
$stmt->execute();

header("Location: index.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar livro</h1>
        <form method="post">
            <input type="text" name = "titulo", placeholder="Título" required>
            <input type="text" name = "autor", placeholder="Autor" required>
            <button type="submit">Salvar</button>
            <a href="index.php">Cancelar</a>

        </form>
    </div>
    
</body>
</html>