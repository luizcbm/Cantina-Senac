<?php
    include_once "include/MySql.php";

    $codPedido ="";
    $msgErro = "";


    if (isset($_GET['id'])){
        $codPedido = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM pedido WHERE codPedido = ?");
        if ($sql->execute(array($codPedido))){
            if ($sql->rowCount() > 0){
                $msgErro = "produto excluído com sucesso!";
                header('location:listPedido.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>