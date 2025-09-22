<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];
// validacao
switch ($acao) {
    case 'excluir':
        // Verificar se o funcionário está sendo referenciado em outra tabela
        // Substituir o SQL abaixo por verificações reais, se necessário
        $checkSql = 'SELECT COUNT(*) AS total FROM producao WHERE FuncionarioID = '.$id;
        $checkResult = mysqli_query($conexao, $checkSql);
        $checkRow = mysqli_fetch_assoc($checkResult);

        if ($checkRow['total'] > 0) {
            // Exibir alerta de erro via JavaScript
            echo "<script>
                    alert('O funcionário não pode ser excluído porque está sendo utilizado em outra tabela.');
                    window.location.href = '../lista-funcionarios.php';
                  </script>";
        } else {
            // Excluir o funcionário
            $sql = 'DELETE FROM funcionarios WHERE FuncionarioID = '.$id;
            mysqli_query($conexao, $sql);
            header("Location: ../lista-funcionarios.php?sucesso=funcionario_excluido");
        }
        break;
    
    default:
        break;
}
?>