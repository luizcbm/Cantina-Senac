<?php
    include_once "include/MySql.php";

    $msgErro = "";
    $codigo = "";

    if (isset($_GET['id'])){
        $codigo = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM Produtos WHERE codigo = ?");
        if ($sql->execute(array($codigo))){
            if ($sql->rowCount() > 0){
                $msgErro = "produto excluído com sucesso!";
                header('location:listProdutos.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>