<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
          $sql = 'SELECT * FROM categorias'; 
        $retorno = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_assoc($retorno)) {
          echo '    <tr>
              <td>'.$linha['CategoriaID'].'</td>
              <td>'.$linha['Nome'].'</td>
              <td>
                <a href="salvar-categorias.php?id='.$linha['CategoriaID'].'" class="btn btn-edit">Editar</a>
                <a href="excluir-categorias.php?id='.$linha['CategoriaID'].'" class="btn btn-delete">Excluir</a>
              </td>
                 </td>
            </tr>
           ';
        }
        ?>;



            </tr>
            
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>