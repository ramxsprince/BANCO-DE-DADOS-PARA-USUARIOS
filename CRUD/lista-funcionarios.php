<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           <?php
          $sql = 'SELECT f.FuncionarioID, f.Nome AS NomeFuncionario, c.Nome AS NomeCargo, s.Nome AS NomeSetor
                  FROM funcionarios f
                  JOIN cargos c ON f.CargoID = c.CargoID
                  JOIN setor s ON f.SetorID = s.SetorID';
        $retorno = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_assoc($retorno)) {
          echo '    <tr>
              <td>'.$linha['FuncionarioID'].'</td>
              <td>'.$linha['NomeFuncionario'].'</td>
              <td>'.$linha['NomeCargo'].'</td>
              <td>'.$linha['NomeSetor'].'</td>
              <td>
                <a href="salvar-funcionarios.php?id='.$linha['FuncionarioID'].'" class="btn btn-edit">Editar</a>
                <a href="excluir-funcionarios.php?id='.$linha['FuncionarioID'].'" class="btn btn-delete">Excluir</a>
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