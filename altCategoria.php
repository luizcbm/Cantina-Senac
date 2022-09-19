<?php
include "include/MySql.php";


$categoria = "";
$descricao = "";


$categoriaErro = "";
$descricaoErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM categoria ?");
    if ($sql->execute(array($categoria))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $categoria = $value['categoria'];
            $descricao = $value['descricao'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
      
           
           
    if (empty($_POST['categoria']))
        $categoriaErro = "categoria é obrigatório!";
    else
        $categoria= $_POST['categoria'];

    if (empty($_POST['descricao']))
        $descricaoErro = "descricao é obrigatório!";
    else
        $descricao = $_POST['descricao'];

    if ($categoria && $descricao) {
        $sql = $pdo->prepare("UPDATE categoria SET categoria=?, 
                                                descricao=?");

        if ($sql->execute(array( $categoria, $descricao,))) {
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

            categoria: <input type="text" name="categoria" value="<?php echo $categoria?>">
            <span class="obrigatorio">*<?php echo $categoriaErro ?></span>
            <br>
            descricao: <input type="text" name="descricao" value="<?php echo $descricao ?>">
            <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
            <br>
            <input type="submit" value="Alterar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
