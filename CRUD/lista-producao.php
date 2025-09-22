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
              <th>Funcionário</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
          // PEGAR NOME DO produto e NOME DO funcionario
          $sql = 'SELECT p.ProducaoID, pr.Nome AS NomeProduto, f.Nome AS Nome, p.DataProducao
                  FROM producao p 
                  LEFT JOIN produtos pr ON p.ProdutoID = pr.ProdutoID
                  LEFT JOIN funcionarios f ON p.FuncionarioID = f.FuncionarioID';
          $resultado = mysqli_query($conexao, $sql);
          if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
              echo "<tr>
                      <td>".$row["ProducaoID"]."</td>
                      <td>".$row["NomeProduto"]."</td>
                      <td>".$row["Nome"]."</td>
                      <td>".$row["DataProducao"]."</td>
                      <td>
                        <a href='salvar-producao.php?id=".$row["ProducaoID"]."' class='btn btn-edit'>Editar</a>
                        <a href='./action/producao.php?acao=excluir&id=".$row["ProducaoID"]."' class='btn btn-delete'>Excluir</a>
                      </td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='4'>Nenhuma produção encontrada.</td></tr>";
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
 