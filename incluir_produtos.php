<?php
include 'conexao.php';

// Query para buscar categorias
$categorias = $conn->query("SELECT id, nome FROM categorias");
?>

<select name="categoria">
    <option value="">Selecione uma Categoria</option>
    <?php while ($categoria = $categorias->fetch_assoc()): ?>
        <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
    <?php endwhile; ?>
</select>