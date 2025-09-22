<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM produtos WHERE id = $id");
    header("Location: listar_produtos.php");
}
?>