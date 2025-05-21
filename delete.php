<?php
include 'conexao.php';
$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $con->prepare("DELETE FROM livros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: index.php");
exit;

