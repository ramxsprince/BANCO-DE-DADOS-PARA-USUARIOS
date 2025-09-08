<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// Buscar funcionários, produtos e clientes do banco de dados
$sqlFuncionarios = 'SELECT FuncionarioID, Nome FROM funcionarios';
$resultadoFuncionarios = mysqli_query($conexao, $sqlFuncionarios);

$sqlProdutos = 'SELECT ProdutoID, Nome FROM produtos';
$resultadoProdutos = mysqli_query($conexao, $sqlProdutos);

$sqlClientes = 'SELECT ClienteID, Nome FROM clientes';
$resultadoClientes = mysqli_query($conexao, $sqlClientes);
?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="salvar-producao.php">
          <h2>Cadastro de Produção de Produtos</h2>
          <label for="funcionario">Funcionário:</label>
          <select name="funcionario" id="funcionario" required>
            <option value="">Selecione um funcionário</option>
            <?php
            while ($funcionario = mysqli_fetch_assoc($resultadoFuncionarios)) {
              echo '<option value="'.$funcionario['FuncionarioID'].'">'.$funcionario['Nome'].'</option>';
            }
            ?>
          </select>

          <label for="produto">Produto:</label>
          <select name="produto" id="produto" required>
            <option value="">Selecione um produto</option>
            <?php
            while ($produto = mysqli_fetch_assoc($resultadoProdutos)) {
              echo '<option value="'.$produto['ProdutoID'].'">'.$produto['Nome'].'</option>';
            }
            ?>
          </select>

          <label for="cliente">Cliente:</label>
          <select name="cliente" id="cliente" required>
            <option value="">Selecione um cliente</option>
            <?php
            while ($cliente = mysqli_fetch_assoc($resultadoClientes)) {
              echo '<option value="'.$cliente['ClienteID'].'">'.$cliente['Nome'].'</option>';
            }
            ?>
          </select>
          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <input type="number" placeholder="Quantidade Produzida">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>