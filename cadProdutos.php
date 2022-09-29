<?php
include_once "head.php";
include_once "include/MySql.php";



$nome_produto = "";
$descricao = "";
$valor = "";
$imgContent = "";
$administrador = "";

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

                if ($nome_produto && $descricao && $valor) {
                    //Verificar se ja existe o email
                    $sql = $pdo->prepare("INSERT INTO produtos (codigo,nome,descricao, valor,IMAGEM)
                                                VALUES (null, ?, ?, ?, ?)");
                    if ($sql->execute(array($nome_produto, $descricao, $valor, $imgContent))) {
                        $msgErro = "Dados cadastrados com sucesso!";
                        $nome_produto = "";
                        $descricao = "";
                        $valor = "";
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


<div class="bolo">
    <form method="POST" enctype="multipart/form-data">
        <div class="nav">
            <div class="h1">
                <legend>Cadastro</legend>
                <br>
            </div>
            <div class="bola">
                <input type="text" placeholder="nome_produto" name="nome_produto" value="<?php echo $nome_produto ?>">
                <span class="obrigatorio">*<?php echo $nome_produtoErro ?></span>
                <br>
                <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
                <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
                <br>
                <input type="text" placeholder="valor" name="valor" value="<?php echo $valor ?>">
                <span class="obrigatorio">*<?php echo $valorErro ?></span>
                <br>
            </div>
            <div class="daora">
                <label class="custom-file-upload">
                    <input type="file" name="image">
                    Escolher arquivo
                </label>
            </div>
            <br>
            <br>
            <div class="enzo">
                <a href="login.php"><button type="submit" name="submit">Salvar</button></a>

            </div>
        </div>

    </form>
    <span><?php echo $msgErro ?></span>
</div>


<?php
include "footer.php";
?>