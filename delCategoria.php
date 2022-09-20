<?php
    include "include/MySql.php";

    $msgErro = "";


    if (isset($_GET['id'])){
        $codigo = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM categoria = ?");
        if ($sql->execute(array($codigo))){
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