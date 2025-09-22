<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salárial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
                // montando o SQL que seá executado no banco de dados
                $sql = 'SELECT * FROM cargos;';

                // executar o SQL e guardar o retorno
                $return = mysqli_query($conexao, $sql);

                //listar todos os dados
                while($linha = mysqli_fetch_assoc($return)){
                    echo '<tr id="'.$linha['CargoID'].'">
              <td>'.$linha['CargoID'].'</td>
              <td>'.$linha['Nome'].'</td>
              <td>'.'R$ '.number_format($linha['TetoSalarial'], 2, ',', '.').'</td>

              <td>
                <a href="./salvar-cargos.php?id='.$linha['CargoID'].'" class="btn btn-edit">Editar</a>
                <a href="./action/cargos.php?id='.$linha['CargoID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
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