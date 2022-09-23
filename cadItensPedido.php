<?php
include "include/MySql.php";



$codItensPedido = "";
$codProduto ="";
$codPedido ="";


$codItensPedidoErro = "";
$codProdutoErro ="";
$codPedidoErro ="";
$msgErro = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

if (empty($_POST['codItensPedido']))
    $codItensPedido = "codItensPedido é obrigatório!";
else
    $codItensPedido = $_POST['codItensPedido'];

if (empty($_POST['codProduto']))
    $codProdutoErro  = "codProduto  é obrigatório!";
else
    $codProduto  = $_POST['codProduto'];

    if (empty($_POST['codPedido']))
    $codPedidoErro  = "codPedido  é obrigatório!";
else
    $codPedido= $_POST['codPedido'];

if ($codItensPedido && $codProduto && $codPedido) {
    //Verificar se ja existe o email
            $sql = $pdo->prepare("INSERT INTO itensPedido(codItensPedido, codProduto, codPedido)
                                    VALUES ( ?, ?, ?)");
            if ($sql->execute(array($codItensPedido,$codProduto, $codPedido))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $codItensPedido = "";
                $codProduto = "";
                $codPedido = "";
                header('location:listItensPedido.php');
            } else {
                $msgErro = "Dados não cadastrados!";
            }
} else {
    $msgErro = "Dados não cadastrados!";
}
}
?>
<link rel="stylesheet" href="site/css/cadastro.css">

<form method="POST" enctype="multipart/form-data">
    <div class="nav">
        <div class="h1">
            <legend>Cadastro de Itens pedidos</legend>

            <br>
        </div>
        <input type="text" placeholder="codItensPedido" name="codItensPedido" value="<?php echo $codItensPedido ?>">
        <span class="obrigatorio">*<?php echo $codItensPedidoErro ?></span>
        <br>
        <input type="text" placeholder="codProduto" name="codProduto" value="<?php echo $codProduto ?>">
        <span class="obrigatorio">*<?php echo $codProdutoErro ?></span>
        <br>
        <input type="text" placeholder="codPedido" name="codPedido" value="<?php echo $codPedido ?>">
        <span class="obrigatorio">*<?php echo $codPedidoErro ?></span>
        <br>
        <div class="button">
            <a href="listItensPedido.php"><button type="submit" name="submit">Salvar</button></a>

        </div>
    </div>

</form>
<span><?php echo $msgErro ?></span>