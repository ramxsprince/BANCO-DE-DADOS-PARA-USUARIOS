<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM producao WHERE id = $id");
    header("Location: listar_producao.php");
}
?>