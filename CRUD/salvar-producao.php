<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = $_GET['id'];

$sql = 'SELECT ProducaoID, c.Nome AS NomeCliente, DataProducao, f.Nome AS NomeFunc, p.Nome AS NomeProduto FROM producao
          INNER JOIN produtos AS p ON producao.ProdutoID = p.ProdutoID
          INNER JOIN funcionarios AS f ON producao.FuncionarioID = f.FuncionarioID
          INNER JOIN clientes AS c ON producao.ClienteID = c.ClienteID
          ORDER BY ProducaoID ASC
          WHERE ProducaoID ='.$id;
$return = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($return);

?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>
          <select>
          </select>
          <select>
          </select>
          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <select>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>