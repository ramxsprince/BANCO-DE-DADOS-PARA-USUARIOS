<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <?php if (isset($_GET['erro']) && $_GET['erro'] === 'setor_em_uso'): ?>
          <div class="alert alert-error">
            O setor não pode ser excluído porque está sendo utilizado em outra tabela.
          </div>
        <?php endif; ?>
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
                // montando o SQL que seá executado no banco de dados
                $sql = 'SELECT * FROM setor
                ORDER BY SetorID ASC;';

                // executar o SQL e guardar o retorno
                $return = mysqli_query($conexao, $sql);

                //listar todos os dados
                while($linha = mysqli_fetch_assoc($return)){
                    echo '<tr id="'.$linha['SetorID'].'">
              <td>'.$linha['SetorID'].'</td>
              <td>'.$linha['Nome'].'</td>
              <td>'.$linha['Andar'].'</td>
              <td>'.$linha['Cor'].'</td>
              <td>
                <a href="./salvar-setores.php?id='.$linha['SetorID'].'" class="btn btn-edit">Editar</a>
                <a href="./action/setores.php?id='.$linha['SetorID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
              </td>
            </tr>';
                };
                ?> 
          </tbody>
        </table>
      </div>

  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>