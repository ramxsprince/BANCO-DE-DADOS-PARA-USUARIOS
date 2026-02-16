<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $postId = !empty($_POST['id']) ? intval($_POST['id']) : null;
  $produto = intval($_POST['produto']);
  $funcionario = intval($_POST['funcionario']);
  $data = !empty($_POST['data_producao']) ? "'".mysqli_real_escape_string($conexao, $_POST['data_producao'])."'" : "NOW()";

  if ($postId) {
    $sql = "UPDATE producao SET ProdutoID = $produto, FuncionarioID = $funcionario, DataProducao = $data WHERE ProducaoID = $postId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-producao.php?sucesso=producao_atualizada');
    exit;
  } else {
    $sql = "INSERT INTO producao (ProdutoID, FuncionarioID, DataProducao) VALUES ($produto, $funcionario, $data)";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-producao.php?sucesso=producao_criada');
    exit;
  }
}

$produtoSel = '';
$funcionarioSel = '';
$dataProducao = '';
if ($id) {
  $sql = "SELECT ProducaoID, ProdutoID, FuncionarioID, DataProducao FROM producao WHERE ProducaoID = $id";
  $return = mysqli_query($conexao, $sql);
  if ($dados = mysqli_fetch_assoc($return)) {
    $produtoSel = $dados['ProdutoID'];
    $funcionarioSel = $dados['FuncionarioID'];
    $dataProducao = $dados['DataProducao'];
  }
}
?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <label>Produto</label>
          <select name="produto" required>
            <option value="">Selecione o produto</option>
            <?php
            $sqlP = 'SELECT ProdutoID, Nome FROM produtos ORDER BY Nome';
            $resP = mysqli_query($conexao, $sqlP);
            while($p = mysqli_fetch_assoc($resP)){
              $sel = ($produtoSel == $p['ProdutoID']) ? 'selected' : '';
              echo '<option value="'.$p['ProdutoID'].'" '.$sel.'>'.$p['Nome'].'</option>';
            }
            ?>
          </select>

          <label>Funcionário</label>
          <select name="funcionario" required>
            <option value="">Selecione o funcionário</option>
            <?php
            $sqlF = 'SELECT FuncionarioID, Nome FROM funcionarios ORDER BY Nome';
            $resF = mysqli_query($conexao, $sqlF);
            while($f = mysqli_fetch_assoc($resF)){
              $sel = ($funcionarioSel == $f['FuncionarioID']) ? 'selected' : '';
              echo '<option value="'.$f['FuncionarioID'].'" '.$sel.'>'.$f['Nome'].'</option>';
            }
            ?>
          </select>

          <label for="">Data da produção</label>
          <input type="datetime-local" name="data_producao" value="<?php echo $dataProducao ? date('Y-m-d\\TH:i', strtotime($dataProducao)) : '' ?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>