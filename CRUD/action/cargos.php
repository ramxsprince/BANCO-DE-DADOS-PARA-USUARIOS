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
        // Verificar se o cargo está sendo referenciado em outra tabela
        $checkSql = 'SELECT COUNT(*) AS total FROM funcionarios WHERE CargoID = '.$id;
        $checkResult = mysqli_query($conexao, $checkSql);
        $checkRow = mysqli_fetch_assoc($checkResult);

        if ($checkRow['total'] > 0) {
            // Exibir alerta de erro via JavaScript
            echo "<script>
                    alert('O cargo não pode ser excluído porque está sendo utilizado em outra tabela.');
                    window.location.href = '../lista-cargos.php';
                  </script>";
        } else {
            // Excluir o cargo
            $sql = 'DELETE FROM cargos WHERE CargoID = '.$id;
            mysqli_query($conexao, $sql);
            header("Location: ../lista-cargos.php?sucesso=cargo_excluido");
        }
        break;
    
    default:
        # code...
        break;
}


?>