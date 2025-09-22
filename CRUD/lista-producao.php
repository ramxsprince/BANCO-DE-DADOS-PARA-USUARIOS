<?php 
// include dos arquivos
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
              <th>Cliente</th>
              <th>Funcionário</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = 'SELECT ProducaoID, c.Nome AS NomeCliente, DataProducao, f.Nome AS NomeFunc, p.Nome AS NomeProduto FROM producao
          INNER JOIN produtos AS p ON producao.ProdutoID = p.ProdutoID
          INNER JOIN funcionarios AS f ON producao.FuncionarioID = f.FuncionarioID
          INNER JOIN clientes AS c ON producao.ClienteID = c.ClienteID
          ORDER BY ProducaoID ASC;';

          $return = mysqli_query($conexao, $sql);

          while ($linha = mysqli_fetch_assoc($return)) {
            $dataFormatada = date('d/m/Y', strtotime($linha['DataProducao']));
            echo '<tr id="'.$linha['ProducaoID'].'">
              <td>'.$linha['ProducaoID'].'</td>
              <td>'.$linha['NomeProduto'].'</td>
              <td>'.$linha['NomeCliente'].'</td>
              <td>'.$linha['NomeFunc'].'</td>
              <td>'.$dataFormatada.'</td>
              <td>
                <a href="./salvar-producao.php?id='.$linha['ProducaoID'].'" class="btn btn-edit">Editar</a>
                <a href="./action/producao.php?id='.$linha['ProducaoID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
              </td>
            </tr>';
          }
          ?>
          </tbody>
        </table>
      </div>
  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>