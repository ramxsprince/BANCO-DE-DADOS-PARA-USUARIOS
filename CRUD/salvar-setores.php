<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$andar = '';
$cor = '';
// verifica se existe o id na url
if( isset($_GET['id']) ){
  // pega o id
  $id = $_GET['id'];
  // monta o sql
  $sql = "SELECT SetorID, Nome, Andar, Cor FROM setor WHERE SetorID = $id;";
  // executa o sql
  $resultado = mysqli_query($conexao, $sql);
  // pega o resultado
  $row = mysqli_fetch_assoc($resultado);
  // preenche o valo na variavel
  $nome = $row['Nome'];
  $andar = $row['Andar'];
  $cor = $row['Cor'];
}
?>
  
  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Setores</h2>
          <input type="text" placeholder="Nome do Setor" value="<?php echo $nome?>">
          <input type="text" placeholder="Andar" value="<?php echo $andar?>">
          <input type="text" placeholder="Cor" value="<?php echo $cor?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>