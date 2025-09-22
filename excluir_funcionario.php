<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM funcionarios WHERE id = $id");
    header("Location: listar_funcionarios.php");
}
?>