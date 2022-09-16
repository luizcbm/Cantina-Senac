<?php
<<<<<<< HEAD:delUsuario.php
    include_once "MySql.php";

=======
    include "site/include/MySql.php";
>>>>>>> 203bf6e0bc006b5f8568396e4de8619bf4c07f8e:paginas/delUsuario.php

    $msgErro = "";
    $codigo = "";

    if (isset($_GET['id'])){
        $codigo = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM USUARIO WHERE codigo = ?");
        if ($sql->execute(array($codigo))){
            if ($sql->rowCount() > 0){
                $msgErro = "Usuário excluído com sucesso!";
               header('location:listUsuario.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    //echo "Mensagem de erro: $msgErro";

    include "head.php";
?>