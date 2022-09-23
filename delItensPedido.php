<?php
    include "include/MySql.php";

    $codItensPedido ="";
    $msgErro = "";


    if (isset($_GET['id'])){
        $codItensPedido = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM itenspedido WHERE codItensPedido = ?");
        if ($sql->execute(array($codItensPedido))){
            if ($sql->rowCount() > 0){
                $msgErro = "produto excluído com sucesso!";
                header('location:listItensPedido.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>