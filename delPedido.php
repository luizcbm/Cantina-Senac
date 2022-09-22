<?php
    include "include/MySql.php";

    $msgErro = "";
$codCategoria ="";

    if (isset($_GET['id'])){
        $codCategoria = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM pedido WHERE codPedido = ?");
        if ($sql->execute(array($codPedido))){
            if ($sql->rowCount() > 0){
                $msgErro = "produto excluído com sucesso!";
                header('location:listCategoria.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>