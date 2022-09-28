<?php
include_once "include/MySql.php";


$nome = "";
$descricao = "";
$valor = "";

$nomeErro = "";
$descricaoErro = "";
$valorErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM produtos WHERE codigo = ?");
    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codigo = $value['codigo'];
            $nome = $value['nome'];
            $descricao = $value['descricao'];
            $valor = $value['valor'];
            $imgContent = $value['imagem'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'jfif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
           
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG, GIFF são permitidos";
        }
    }         
           
           
    if (empty($_POST['nome_produto']))
        $nomeErro = "nome_produto é obrigatório!";
    else
        $nome= $_POST['nome_produto'];

    if (empty($_POST['descricao']))
        $descricaoErro = "descricao é obrigatório!";
    else
        $descricao = $_POST['descricao'];

    if (empty($_POST['valor']))
        $valorErro = "valor é obrigatório!";
    else
        $valor = $_POST['valor'];

    if ($nome && $descricao && $valor) {
        $sql = $pdo->prepare("UPDATE produtos SET codigo=?, 
                                            nome=?, 
                                                descricao=?, 
                                                valor=?, 
                                                imagem=?
                                        WHERE codigo=?");

        if ($sql->execute(array($codigo, $nome, $descricao, $valor, $imgContent, $codigo))) {
            $msgErro = "Dados alterados com sucesso!";
            header('location:listProdutos.php');
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
            <legend>Alterar produto</legend>

            nome_produto: <input type="text" name="nome_produto" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            descricao: <input type="text" name="descricao" value="<?php echo $descricao ?>">
            <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
            <br>
            valor: <input type="text" name="valor" value="<?php echo $valor ?>">
            <span class="obrigatorio">*<?php echo $valorErro ?></span>
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="Alterar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
