<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

// validacao
switch ($acao) {
    case 'excluir':
        $cargoID = $_GET['id'];
        if (!empty($cargoID)) {
            $sql = "DELETE FROM cargos WHERE CargoID = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $cargoID);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../lista-cargos.php?msg=excluido');
            } else {
                header('Location: ../lista-cargos.php?msg=erro');
            }
        } else {
            header('Location: ../lista-cargos.php?msg=invalid');
        }
        break;
    
    default:
        # code...
        break;
}
?>