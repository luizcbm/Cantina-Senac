<?php
include "include/MySql.php";


$codCategoria = "";
$descricao = "";
$codCategoria ="";

$codCategoriaErro = "";
$descricaoErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codCategoria = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM categoria  WHERE codCategoria = ?");
    if ($sql->execute(array($codCategoria))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codCategoria = $value['codCategoria'];
            $descricao = $value['descricao'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
      

    if (empty($_POST['descricao']))
        $descricaoErro = "descricao é obrigatório!";
    else
        $descricao = $_POST['descricao'];

    if ($codCategoria && $descricao) {
        $sql = $pdo->prepare("UPDATE categoria SET codCategoria=?, descricao=? WHERE codCategoria=?");
        echo $descricao;
        if ($sql->execute(array($codCategoria, $descricao,$codCategoria))) {
            $msgErro = "Dados alterados com sucesso!";
            header('location:listcategoria.php');
        } else {
            $msgErro = "Dados não cadastrados!";
        }
    } else {
        $msgErro = "Dados não alteardos!";
    }

}
echo  $msgErro;
?>


    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Alterar categoria</legend>

            categoria: <input type="text" name="codCategoria" value="<?php echo $codCategoria?>">
            <span class="obrigatorio">*<?php echo $codCategoriaErro ?></span>
            <br>
            descricao: <input type="text" name="descricao" value="<?php echo $descricao ?>">
            <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
            <br>
            <input type="submit" value="Alterar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
