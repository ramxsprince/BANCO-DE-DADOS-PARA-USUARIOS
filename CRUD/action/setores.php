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
        // Verificar se o setor está sendo referenciado em outra tabela
        $checkSql = 'SELECT COUNT(*) AS total FROM funcionarios WHERE SetorID = '.$id;
        $checkResult = mysqli_query($conexao, $checkSql);
        $checkRow = mysqli_fetch_assoc($checkResult);

        if ($checkRow['total'] > 0) {
            // Exibir alerta de erro via JavaScript
            echo "<script>
                    alert('O setor não pode ser excluído porque está sendo utilizado em outra tabela.');
                    window.location.href = '../lista-setores.php';
                  </script>";
        } else {
            // Excluir o setor
            $sql = 'DELETE FROM setor WHERE SetorID = '.$id;
            mysqli_query($conexao, $sql);
            header("Location: ../lista-setores.php?sucesso=setor_excluido");
        }
        break;
    
    default:
        break;
}
?>