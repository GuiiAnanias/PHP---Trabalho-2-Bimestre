<?php include 'conexao.php';

$id = $$_GET['id'] ?? null;

if (!$id) {
    die("ID invalido.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST ['titulo'];
    $autor = $_POST ['autor'];

    $stmt = $con->prepare("UPDATE livros SET titulo = ?, autor = ?, WHERE id = ?");
    $stmt->bind_param("ssi", $titulo, $autor, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}



$stmt = $con->prepare("SELECT * FROM livros WHERE id = ?");
$stmt ->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$livro = $result->fetch_assoc();

if (!$livro) {
    die ("Livro nao encontrado");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livros</title>
</head>
<body>
    <div class="container">
        <h1>Editar livros</h1>
        <form method="post">
                 <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
                 <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
                 <button type="submit">Salvar Alterações</button>
                 <a href="index.php">Cancelar</a>
        </form>
    </div>
    
</body>
</html>

