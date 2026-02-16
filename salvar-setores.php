<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$andar = '';
$cor = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $andar = mysqli_real_escape_string($conexao, $_POST['andar']);
  $cor = mysqli_real_escape_string($conexao, $_POST['cor']);
  if (!empty($_POST['id'])) {
    $updateId = intval($_POST['id']);
    $sql = "UPDATE setor SET Nome = '$nome', Andar = '$andar', Cor = '$cor' WHERE SetorID = $updateId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-setores.php?sucesso=setor_atualizado');
    exit;
  } else {
    $sql = "INSERT INTO setor (Nome, Andar, Cor) VALUES ('$nome', '$andar', '$cor')";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-setores.php?sucesso=setor_criado');
    exit;
  }
}

if ($id) {
  $sql = "SELECT SetorID, Nome, Andar, Cor FROM setor WHERE SetorID = $id";
  $resultado = mysqli_query($conexao, $sql);
  if ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['Nome'];
    $andar = $row['Andar'];
    $cor = $row['Cor'];
  }
}
?>
  
  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Setores</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="text" name="nome" placeholder="Nome do Setor" value="<?php echo htmlspecialchars($nome)?>" required>
          <input type="text" name="andar" placeholder="Andar" value="<?php echo htmlspecialchars($andar)?>">
          <input type="text" name="cor" placeholder="Cor" value="<?php echo htmlspecialchars($cor)?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>