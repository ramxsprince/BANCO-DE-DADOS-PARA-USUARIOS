<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            
          <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Produtor</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
          $sql = 'SELECT p.ProducaoID, pr.Nome AS NomeProduto, f.Nome AS Nome, p.DataProducao
                  FROM producao p
                  JOIN produtos pr ON p.ProdutoID = pr.ProdutoID
                  JOIN funcionarios f ON p.FuncionarioID = f.FuncionarioID';
        $retorno = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_assoc($retorno)) {
          echo '    <tr>
              <td>'.$linha['ProducaoID'].'</td>
              <td>'.$linha['NomeProduto'].'</td>
              <td>'.$linha['Nome'].'</td>
              <td>'.$linha['DataProducao'].'</td>
              <td>
                <a href="salvar-producao.php?id='.$linha['ProducaoID'].'" class="btn btn-edit">Editar</a>
                <a href="excluir-producao.php?id='.$linha['ProducaoID'].'" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
           ';
        }
        ?>;
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>