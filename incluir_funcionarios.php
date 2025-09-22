<?php
// Conexão com o banco de dados
include 'conexao.php';

// Query para buscar cargos
$cargos = $conn->query("SELECT id, nome FROM cargos");

// Query para buscar setores
$setores = $conn->query("SELECT id, nome FROM setores");
?>

<select name="cargo">
    <option value="">Selecione um Cargo</option>
    <?php while ($cargo = $cargos->fetch_assoc()): ?>
        <option value="<?= $cargo['id'] ?>"><?= $cargo['nome'] ?></option>
    <?php endwhile; ?>
</select>

<select name="setor">
    <option value="">Selecione um Setor</option>
    <?php while ($setor = $setores->fetch_assoc()): ?>
        <option value="<?= $setor['id'] ?>"><?= $setor['nome'] ?></option>
    <?php endwhile; ?>
</select>