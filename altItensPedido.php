<?php
include "include/MySql.php";



$codItensPedido = "";
$codProduto ="";
$codPedido ="";


$codItensPedidoErro = "";
$codProdutoErro ="";
$codPedidoErro ="";
$msgErro = "";


if (isset($_GET['id'])) {
    $codCategoria = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM itenspedido WHERE codItensPedido= ?");
    if ($sql->execute(array($codCategoria))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codItensPedido = $value['codItensPedido'];
            $codProduto = $value['codProduto'];
            $codPedido = $value['codPedido'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
      

if (empty($_POST['codItensPedido']))
    $codItensPedidoErro = "codItensPedido é obrigatório!";
else
    $codItensPedido = $_POST['codItensPedido'];

if (empty($_POST['codProduto']))
    $codProdutoErro  = "codProduto  é obrigatório!";
else
    $codProduto  = $_POST['codProduto'];

    if (empty($_POST['codPedido']))
    $codPedidoErro  = "codPedido  é obrigatório!";
else
    $codPedido = $_POST['codPedido'];

    if ($codItensPedido && $codProduto && $codPedido) {
        $sql = $pdo->prepare("UPDATE itenspedido SET codItensPedido=?,codProduto=?,codPedido=?  WHERE codItensPedido=?");
  
        if ($sql->execute(array($codItensPedido,$codProduto,$codPedido,$codItensPedido))) {
            $msgErro = "Dados alterados com sucesso!";
            header('location:listItensPedido.php');
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
        ItensPedido: <input type="text" name="codItensPedido" value="<?php echo  $codItensPedido ?>">
        <legend>Alterar categoria</legend>
        <br>
        codProduto: <input type="text" name="codProduto" value="<?php echo  $codProduto  ?>">
        <span class="obrigatorio">*<?php echo $codProdutoErro ?></span>
        <br>
        codPedido: <input type="text" name="codPedido" value="<?php echo  $codPedido ?>">
        <span class="obrigatorio">*<?php echo $codPedidoErro ?></span>
        <br>
        <input type="submit" value="Alterar" name="submit">
    </fieldset>
</form>
<span><?php echo $msgErro ?></span>