<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           <?php
          $sql = 'SELECT p.ProdutoID, p.Nome AS NomeProduto, c.Nome AS NomeCategoria, p.Preco
                  FROM produtos p
                  JOIN categorias c ON p.CategoriaID = c.CategoriaID';
        $retorno = mysqli_query($conexao, $sql); 
        while ($linha = mysqli_fetch_assoc($retorno)) {
          echo '    <tr>
              <td>'.$linha['ProdutoID'].'</td>
              <td>'.$linha['NomeProduto'].'</td>
              <td>'.$linha['NomeCategoria'].'</td>
              <td>'.$linha['Preco'].'</td>
              <td>
                <a href="salvar-produtos.php?id='.$linha['ProdutoID'].'" class="btn btn-edit">Editar</a>
                <a href="excluir-produtos.php?id='.$linha['ProdutoID'].'" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
           ';
        }
        ?>;
          </tr>

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>