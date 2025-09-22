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
        $sql = 'DELETE FROM producao WHERE ProducaoID ='.$id;
        mysqli_query($conexao,$sql);
        header("Location: ../lista-producao.php");
        break;
    
    default:
        # code...
        break;
}
?>