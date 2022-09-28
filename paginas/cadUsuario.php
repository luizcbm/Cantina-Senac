<?php
include_once "include/MySql.php";

$nome = "";
$email = "";
$telefone = "";
$senha = "";
$administrador = "";
$imgContent = "";

$nomeErro = "";
$emailErro = "";
$telefoneErro = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    echo "aqui01";
    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
            if (empty($_POST['nome']))
                $nomeErro = "Nome é obrigatório!";
            else
                $nome = $_POST['nome'];

            if (empty($_POST['email']))
                $emailErro = "Email é obrigatório!";
            else
                $email = $_POST['email'];

            if (empty($_POST['telefone']))
                $telefoneErro = "Telefone é obrigatório!";
            else
                $telefone = $_POST['telefone'];

            if (empty($_POST['senha']))
                $senhaErro = "Senha é obrigatório!";
            else
                $senha = $_POST['senha'];

            $administrador = $_POST['senha'];
            if (isset($_POST['administrador']))
                $administrador = 1;
            else
                $administrador = 0;

            if ($email && $nome && $senha && $telefone) {
                //Verificar se ja existe o email
                $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ?");
                if ($sql->execute(array($email))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO USUARIO (codigo, nome, email, telefone, senha, administrador, IMAGEM)
                                                VALUES (null, ?, ?, ?, ?, ?, ?)");
                        if ($sql->execute(array($nome, $email, $telefone, md5($senha), $administrador, $imgContent))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $nome = "";
                            $email = "";
                            $telefone = "";
                            $senha = "";
                            $administrador = "";
                            $imgContent = "";
                            header('location:login.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    } else {
                        $msgErro = "Email de usuário já cadastrado!!";
                    }
                } else {
                    $msgErro = "Erro no comando SELECT!";
                }
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG, GIFF são permitidos";
        }
    } else {
        $msgErro = "Imagem não selecionada!!";
    }
}

   

