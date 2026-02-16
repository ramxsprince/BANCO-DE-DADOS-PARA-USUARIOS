<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$descricao = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
  if (!empty($_POST['id'])) {
    $updateId = intval($_POST['id']);
    $sql = "UPDATE categorias SET Nome = '$nome', Descricao = '$descricao' WHERE CategoriaID = $updateId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-categorias.php?sucesso=categoria_atualizada');
    exit;
  } else {
    $sql = "INSERT INTO categorias (Nome, Descricao) VALUES ('$nome', '$descricao')";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-categorias.php?sucesso=categoria_criada');
    exit;
  }
}

if ($id) {
  $sql = "SELECT CategoriaID, Nome, Descricao FROM categorias WHERE CategoriaID = $id";
  $resultado = mysqli_query($conexao, $sql);
  if ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['Nome'];
    $descricao = $row['Descricao'];
  }
}
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Categorias</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="text" name="nome" placeholder="Nome da Categoria" value="<?php echo htmlspecialchars($nome)?>" required>
          <textarea name="descricao" placeholder="Descrição"><?php echo htmlspecialchars($descricao)?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>
