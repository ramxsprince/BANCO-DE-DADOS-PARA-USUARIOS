<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <?php if (isset($_GET['erro']) && $_GET['erro'] === 'produto_em_uso'): ?>
        <div class="alert alert-error">
          O produto não pode ser excluído porque está sendo utilizado em outra tabela.
        </div>
      <?php endif; ?>
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
        <?php
                // montando o SQL que seá executado no banco de dados
                $sql = 'SELECT ProdutoID, p.Nome AS NomeProduto, c.Nome AS NomeCat, Preco FROM produtos AS p
                INNER JOIN categorias AS c ON p.CategoriaID = c.CategoriaID
                ORDER BY ProdutoID ASC;';

                // executar o SQL e guardar o retorno
                $return = mysqli_query($conexao, $sql);

                //listar todos os dados
                while($linha = mysqli_fetch_assoc($return)){
                    echo '<tr id="'.$linha['ProdutoID'].'">
            <td>'.$linha['ProdutoID'].'</td>
            <td>'.$linha['NomeProduto'].'</td>
            <td>'.$linha['NomeCat'].'</td>
            <td>'.'R$ '.number_format($linha['Preco'], 2, ',', '.').'</td>
            <td>
              <a href="./salvar-produtos.php?id='.$linha['ProdutoID'].'" class="btn btn-edit">Editar</a>
              <a href="./action/produtos.php?id='.$linha['ProdutoID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
            </td>
          </tr>';
                };
                ?>   
        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>