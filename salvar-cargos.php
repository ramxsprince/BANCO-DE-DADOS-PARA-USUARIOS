<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$tetosalarial = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// salvar via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $tetosalarial = floatval($_POST['tetosalarial']);
  if (!empty($_POST['id'])) {
    $updateId = intval($_POST['id']);
    $sql = "UPDATE cargos SET Nome = '$nome', TetoSalarial = $tetosalarial WHERE CargoID = $updateId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-cargos.php?sucesso=cargo_atualizado');
    exit;
  } else {
    $sql = "INSERT INTO cargos (Nome, TetoSalarial) VALUES ('$nome', $tetosalarial)";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-cargos.php?sucesso=cargo_criado');
    exit;
  }
}

// se for edição, carregar dados
if ($id) {
  $sql = "SELECT CargoID, Nome, TetoSalarial FROM cargos WHERE CargoID = $id";
  $resultado = mysqli_query($conexao, $sql);
  if ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['Nome'];
    $tetosalarial = $row['TetoSalarial'];
  }
}
?>
  <main>  
 
       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="text" name="nome" placeholder="Nome do Cargo" value="<?php echo htmlspecialchars($nome);?>" required>
      <input type="number" step="0.01" name="tetosalarial" placeholder="Teto Salarial" value="<?php echo htmlspecialchars($tetosalarial);?>" required>
      <button type="submit">Salvar</button>
    </form>
  </div>
 