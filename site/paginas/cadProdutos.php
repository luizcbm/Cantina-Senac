<?php
include "../include/MySql.php";

$produto = "";
$nome_produto = "";
$descricao = "";
$valor= "";
$administrador = "";
$imgContent = "";

$produtoErro = "";
$nome_produtoErro = "";
$descricaoErro = "";
$valorErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
            if (empty($_POST['nome_produto']))
                $nome_produtoErro = "nome do produto é obrigatório!";
            else
                $nome_produto = $_POST['nome_produto'];

            if (empty($_POST['descricao']))
                $descricao = "descrição é obrigatório!";
            else
                $descricao = $_POST['descricao'];

            if (empty($_POST['valor']))
                $valor = "valor é obrigatório!";
            else
                $valor = $_POST['valor'];

            if (isset($_POST['administrador']))
                $administrador = 1;
            else
                $administrador = 0;

            if ($nome_produto && $descricao && $valor) {
                //Verificar se ja existe o email
                        $sql = $pdo->prepare("INSERT INTO produtos(codigo, nome, descricao, valor, administrador, IMAGEM)
                                                VALUES (null, ?, ?, ?, ?, ?)");
                        if ($sql->execute(array($nome_produto, $descricao,$valor, $administrador, $imgContent))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $nome_produto = "";
                            $descricao = "";
                            $valor = "";
                            $administrador = "";
                            $imgContent = "";
                            header('location:listProdutos.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
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

?>
    <link rel="stylesheet" href="site/css/cadastro.css">

    <form method="POST" enctype="multipart/form-data">
        <div class="nav">
            <div class="h1">
                <legend>Cadastro</legend>
                <br>
            </div>
            <input type="text" placeholder="nome_produto" name="nome_produto" value="<?php echo $nome_produto ?>">
            <span class="obrigatorio">*<?php echo $nome_produtoErro ?></span>
            <br>
            <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
            <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
            <br>
            <input type="text" placeholder="valor" name="valor" value="<?php echo $valor ?>">
            <span class="obrigatorio">*<?php echo $valorErro ?></span>
            <br>
            <input type="checkbox" name="administrador">Administrador
            <br>

            <div class="daora">
                <label class="custom-file-upload">
                    <input type="file" name="image">
                    Escolher arquivo
                </label>
            </div>
            <br>
            <br>
            <div class="button">
                <a href="login.php"><button type="submit" name="submit">Salvar</button></a>

            </div>
        </div>

    </form>
    <span><?php echo $msgErro ?></span>
