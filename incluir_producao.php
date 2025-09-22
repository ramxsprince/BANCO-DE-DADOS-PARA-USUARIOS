<?php
include 'conexao.php';

// Queries para buscar dados
$funcionarios = $conn->query("SELECT id, nome FROM funcionarios");
$produtos = $conn->query("SELECT id, nome FROM produtos");
$clientes = $conn->query("SELECT id, nome FROM clientes");
?>

<select name="funcionario">
    <option value="">Selecione um Funcionário</option>
    <?php while ($funcionario = $funcionarios->fetch_assoc()): ?>
        <option value="<?= $funcionario['id'] ?>"><?= $funcionario['nome'] ?></option>
    <?php endwhile; ?>
</select>

<select name="produto">
    <option value="">Selecione um Produto</option>
    <?php while ($produto = $produtos->fetch_assoc()): ?>
        <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?></option>
    <?php endwhile; ?>
</select>

<select name="cliente">
    <option value="">Selecione um Cliente</option>
    <?php while ($cliente = $clientes->fetch_assoc()): ?>
        <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
    <?php endwhile; ?>
</select>