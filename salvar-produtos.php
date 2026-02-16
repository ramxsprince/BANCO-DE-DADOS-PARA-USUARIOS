<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// captura o ID na query string
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $postId = !empty($_POST['id']) ? intval($_POST['id']) : null;
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $preco = floatval($_POST['preco']);
  $peso = floatval($_POST['peso']);
  $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
  $categoria = intval($_POST['categoria']);

  if ($postId) {
    $sql = "UPDATE produtos SET Nome='$nome', CategoriaID=$categoria, Preco=$preco, Peso=$peso, Descricao='$descricao' WHERE ProdutoID = $postId";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-produtos.php?sucesso=produto_atualizado');
    exit;
  } else {
    $sql = "INSERT INTO produtos (Nome, CategoriaID, Preco, Peso, Descricao) VALUES ('$nome', $categoria, $preco, $peso, '$descricao')";
    mysqli_query($conexao, $sql);
    header('Location: ./lista-produtos.php?sucesso=produto_criado');
    exit;
  }
}

if ($id) {
    // montar o SQL
    $sql = 'SELECT p.ProdutoID, c.CategoriaID as CategoriaID , p.Nome AS NomeProduto, c.Nome AS NomeCat, Preco, Peso, p.Descricao AS Descri FROM produtos AS p
            INNER JOIN categorias AS c ON p.CategoriaID = c.CategoriaID
            WHERE ProdutoID = '.$id;

    // executar o SQL
    $return = mysqli_query($conexao, $sql);

    // pegar os dados e vai deixar dentro do array 
    $dados = mysqli_fetch_assoc($return);
} else {
    $dados = ['NomeProduto' => '', 'Preco' => '', 'Peso' => '', 'Descri' => '', 'CategoriaID' => ''];
}
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="text" name="nome" placeholder="Nome do Produto" value="<?php echo htmlspecialchars($dados['NomeProduto'])?>" required>
          <input type="number" step="0.01" name="preco" placeholder="Preço" value="<?php echo htmlspecialchars($dados['Preco'])?>" required>
          <input type="number" step="0.01" name="peso" placeholder="Peso (g)" value="<?php echo htmlspecialchars($dados['Peso'])?>">
          <textarea name="descricao" placeholder="Descrição"><?php echo htmlspecialchars($dados['Descri'])?></textarea>
          <select name="categoria" required>
            <option value="<?php echo $dados['CategoriaID']; ?>"><?php echo $dados['NomeCat']; ?></option>
            <?php
            $categoriaSQL = 'SELECT CategoriaID, Nome FROM categorias';
            $categoriaResult = mysqli_query($conexao, $categoriaSQL);
            while ($linha = mysqli_fetch_assoc($categoriaResult)) {
                if ($linha['CategoriaID'] != $dados['CategoriaID']) {
                    echo '<option value="'.$linha['CategoriaID'].'">'.$linha['Nome'].'</option>';
                }
            }
            ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
    </div>
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>