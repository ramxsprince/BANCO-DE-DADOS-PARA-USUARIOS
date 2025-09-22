<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM setores WHERE id = $id");
    header("Location: listar_setores.php");
}
?> 