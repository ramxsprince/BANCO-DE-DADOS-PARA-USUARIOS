<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// Buscar categorias do banco de dados
$sqlCategorias = 'SELECT CategoriaID, Nome FROM categorias';
$resultadoCategorias = mysqli_query($conexao, $sqlCategorias);
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="salvar-produtos.php" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto">
          <input type="number" placeholder="Preço">
          <input type="number" placeholder="Peso (g)">
          <textarea placeholder="Descrição"></textarea>
          <label for="categoria">Categoria:</label>
          <select name="categoria" id="categoria" required>
            <option value="">Selecione uma categoria</option>
            <?php
            while ($categoria = mysqli_fetch_assoc($resultadoCategorias)) {
              echo '<option value="'.$categoria['CategoriaID'].'">'.$categoria['Nome'].'</option>';
            }
            ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>