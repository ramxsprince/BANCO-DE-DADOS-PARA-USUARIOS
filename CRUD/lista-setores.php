<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
          $sql = 'SELECT * FROM setor';
        $retorno = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_assoc($retorno)) {
          echo '    <tr>
              <td>'.$linha['SetorID'].'</td>
              <td>'.$linha['Nome'].'</td>
              <td>'.$linha['Andar'].'</td>
              <td>'.$linha['Cor'].'</td>
              <td>
                <a href="salvar-setores.php?id='.$linha['SetorID'].'" class="btn btn-edit">Editar</a>
                <a href="excluir-setores.php?id='.$linha['SetorID'].'" class="btn btn-delete">Excluir</a>
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