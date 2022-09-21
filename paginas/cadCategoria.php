<?php
include "include/MySql.php";


$codCategoria = "";
$descricao = "";


$codCategoriaErro = "";
$descricaoErro = "";
$msgErro = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['descricao']))
        $descricaoErro = "descrição é obrigatório!";
    else
        $descricao = $_POST['descricao'];

    $sql = $pdo->prepare("INSERT INTO categoria( codCategoria, descricao)
                                                VALUES (NULL, ?)");
    if ($sql->execute(array($descricao))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $codCategoria = "";
        $descricao = "";
        header('location:listCategoria.php');
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}
?>
<link rel="stylesheet" href="site/css/cadastro.css">

<form method="POST" enctype="multipart/form-data">
    <div class="nav">
        <div class="h1">
            <legend>Cadastro de categorias</legend>

            <br>
        </div>


        <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
        <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
        <br>
        <br>
        <div class="button">
            <a href="listCategoria.php"><button type="submit" name="submit">Salvar</button></a>

        </div>
    </div>

</form>
<span><?php echo $msgErro ?></span>