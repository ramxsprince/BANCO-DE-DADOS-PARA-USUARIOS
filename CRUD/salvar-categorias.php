<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$descricao = '';
// verifica se existe o id na url
if( isset($_GET['id']) ){
  // pega o id
  $id = $_GET['id'];
  // monta o sql
  $sql = 'SELECT CategoriaID, Nome, Descricao FROM categorias WHERE CategoriaID = $id;';
  // executa o sql
  $resultado = mysqli_query($conexao, $sql);
  // pega o resultado
  $row = mysqli_fetch_assoc($resultado);
  // preenche o valo na variavel
  $nome = $row['Nome'];
  $descricao = $row['Descricao'];
}
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Categorias</h2>
          <input type="text" placeholder="Nome da Categoria" value="<?php echo $nome?>">
          <textarea placeholder="Descrição"><?php echo $descricao?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>
