<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $postId = !empty($_POST['id']) ? intval($_POST['id']) : null;
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $dataNascimento = $_POST['data_nascimento'] ?: null;
  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $salario = floatval($_POST['salario']);
  $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
  $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
  $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
  $cargo = intval($_POST['cargo']);
  $setor = intval($_POST['setor']);

  if ($postId) {
    $sql = "UPDATE funcionarios SET Nome='$nome', DataNascimento=" . ($dataNascimento ? "'$dataNascimento'" : "NULL") . ", Email='$email', Salario=$salario, Sexo='$sexo', CPF='$cpf', RG='$rg', CargoID=$cargo, SetorID=$setor WHERE FuncionarioID = $postId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-funcionarios.php?sucesso=funcionario_atualizado');
    exit;
  } else {
    $sql = "INSERT INTO funcionarios (Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID) VALUES ('$nome', " . ($dataNascimento ? "'$dataNascimento'" : "NULL") . ", '$email', $salario, '$sexo', '$cpf', '$rg', $cargo, $setor)";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-funcionarios.php?sucesso=funcionario_criado');
    exit;
  }
}

// se edição, carregar dados
$nome = '';
$salario = '';
$cpf = '';
$rg = '';
$email = '';
$dataNascimento = '';
$sexo = '';
$cargo = '';
$setor = '';

if ($id) {
  $sql = "SELECT FuncionarioID, Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID FROM funcionarios WHERE FuncionarioID = $id";
  $resultado = mysqli_query($conexao, $sql);
  if ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['Nome'];
    $salario = $row['Salario'];
    $cpf = $row['CPF'];
    $rg = $row['RG'];
    $email = $row['Email'];
    $dataNascimento = $row['DataNascimento'];
    $sexo = $row['Sexo'];
    $cargo = $row['CargoID'];
    $setor = $row['SetorID'];
  }
}
?>
  <main>
    <div id="funcionarios" class="tela">
    <form class="crud-form" method="post" action="">
          <h2>Cadastro de Funcionários</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="text" name="nome" placeholder="Nome" value="<?php echo htmlspecialchars($nome) ?>" required>
          <input type="date" name="data_nascimento" placeholder="Data de Nascimento" value="<?php echo htmlspecialchars($dataNascimento)?>">
          <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email)?>">
          <input type="number" step="0.01" name="salario" placeholder="Salário" value="<?php echo htmlspecialchars($salario)?>">
          <select name="sexo">
            <option value="M" <?php echo ($sexo=='M') ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?php echo ($sexo=='F') ? 'selected' : '' ?>>Feminino</option>
          </select>
          <input type="text" name="cpf" placeholder="CPF" value="<?php echo htmlspecialchars($cpf)?>">
          <input type="text" name="rg" placeholder="RG" value="<?php echo htmlspecialchars($rg)?>">
          <select name="cargo" required>
            <option value="">Selecione o cargo</option>
            <?php
            $sqlCargo = 'SELECT CargoID, Nome FROM cargos';
            $resCargo = mysqli_query($conexao, $sqlCargo);
            while ($c = mysqli_fetch_assoc($resCargo)) {
              $sel = ($cargo == $c['CargoID']) ? 'selected' : '';
              echo '<option value="'.$c['CargoID'].'" '.$sel.'>'.$c['Nome'].'</option>';
            }
            ?>
          </select>
          <select name="setor" required>
            <option value="">Selecione o setor</option>
            <?php
            $sqlSetor = 'SELECT SetorID, Nome FROM setor';
            $resSetor = mysqli_query($conexao, $sqlSetor);
            while ($s = mysqli_fetch_assoc($resSetor)) {
              $sel = ($setor == $s['SetorID']) ? 'selected' : '';
              echo '<option value="'.$s['SetorID'].'" '.$sel.'>'.$s['Nome'].'</option>';
            }
            ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>
  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>
