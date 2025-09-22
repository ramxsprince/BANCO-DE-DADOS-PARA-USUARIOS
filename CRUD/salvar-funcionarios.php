<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// variaveis vazias
$nome = '';
$salario = '';
$cpf = '';
$rg = '';
$email = '';
$dataNascimento = '';
$sexo = '';
$setor = '';
$nomeCargo='';
// verifica se existe o id na url
if( isset($_GET['id']) ){
  // pega o id
  $id = $_GET['id'];
  // monta o sql
  $sql = 'SELECT FuncionarioID ,f.Nome AS nomeFunc, DataNascimento, Email, Salario, Sexo, CPF, RG, s.Nome As nomeSetor, c.Nome AS nomeCargo FROM funcionarios AS f
          INNER JOIN cargos AS c ON f.CargoID = c.CargoID
          INNER JOIN setor AS s ON f.SetorID = s.SetorID
          ORDER BY FuncionarioID ASC;';
  // executa o sql
  $resultado = mysqli_query($conexao, $sql);
  // pega o resultado
  $row = mysqli_fetch_assoc($resultado);
  // preenche o valo na variavel
  $nome = $row['nomeFunc'];
  $salario = $row['Salario'];
  $cpf = $row['CPF'];
  $rg = $row['RG'];
  $email = $row['Email'];
  $dataNascimento = $row['DataNascimento'];
  $sexo = $row['Sexo'];
  $setor = $row['nomeSetor'];
}
?>
  <main>
    <div id="funcionarios" class="tela">
    <form class="crud-form">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" placeholder="Nome" value="<?php echo $nome ?>">
          <input type="date" placeholder="Data de Nascimento" value="<?php echo $dataNascimento?>">
          <input type="email" placeholder="Email" value="<?php echo $email?>">
          <input type="number" placeholder="Salário" value="<?php echo $salario?>">
          <select>
            <?php
            echo'
           <option value="'.$sexo.'">'.(($sexo == 'M') ? 'Masculino' : 'Feminino').'</option>
           <option value=" ">Sexo</option>
           <option value="'.(($sexo != 'M') ? 'M' : 'F').'">'.(($sexo != 'M') ? 'Masculino' : 'Feminino').'</option>
           ';?>
          </select>
          <input type="text" placeholder="CPF" value="<?php echo $cpf?>">
          <input type="text" placeholder="RG" value="<?php echo $rg?>">
          <select>
            <option value="'.$dados['FunCID'].'">'.$dados['nomeCargo'].'</option>';
      </div>
  </main>

  <?php 
  // include dos arquivos
  include_once './include/footer.php';
  ?>
