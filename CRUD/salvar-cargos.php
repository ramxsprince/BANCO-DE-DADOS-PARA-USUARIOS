<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$tetosalarial = '';
// verifica se existe o id na url
if( isset($_GET['id']) ){
  // pega o id
  $id = $_GET['id'];
  // monta o sql
  $sql = 'SELECT CargoID, Nome, TetoSalarial FROM cargos WHERE CargoID = $id;';
  // executa o sql
  $resultado = mysqli_query($conexao, $sql);
  // pega o resultado
  $row = mysqli_fetch_assoc($resultado);
  // preenche o valo na variavel
  $nome = $row['Nome'];
  $tetosalarial = $row['TetoSalarial'];
}
?>
  <main>  
 
       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="text" placeholder="Nome do Cargo" value="<?php echo $nome;?>">
      <input type="number" placeholder="Teto Salarial" value="<?php echo $tetosalarial;?>">
      <button type="submit">Salvar</button>
    </form>
  </div>
 