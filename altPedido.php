<?php
include "include/MySql.php";


$codPedido = "";
$idCliente = "";
$horario_abre = "";
$horario_fecha = "";

$codPedidoErro = "";
$idClienteErro = "";
$horario_abreErro = "";
$horario_fechaErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codCategoria = $_GET['id'];
    $sql = $pdo->prepare("UPDATE pedido  SET codPedido = ?, idCliente = ?, horario_abre= ?,horario_fecha=?");

    if ($sql->execute(array($codPedido, $idCliente, $horario_abre, $horario_fecha,))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codPedido = $value['codPedido'];
            $idCliente = $value['idCliente'];
            $horario_abre = $value['horario_abre'];
            $horario_fecha = $value['horario_fecha'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {


    if (empty($_POST['codPedido']))
        $codPedidoErro = "codPedido é obrigatório!";
    else
        $codPedido = $_POST['codPedido'];


    if (empty($_POST['idCliente']))
        $idClienteErro = "idCliente é obrigatório!";
    else
        $idCliente = $_POST['idCliente'];


    if (empty($_POST['horario_abre']))
        $horario_abreErro = "horario_abre é obrigatório!";
    else
        $horario_abre = $_POST['horario_abre'];


    if (empty($_POST['horario_fecha']))
        $horario_fechaErro = "horario_fecha é obrigatório!";
    else
        $horario_fecha = $_POST['horario_fecha'];


    if ($codpedido && $idCliente && $horario_abre && $horario_fecha) {
        $sql = $pdo->prepare("UPDATE pedido SET codCategoria=?, descricao=? WHERE codCategoria=?");
        echo $descricao;
        if ($sql->execute(array($codCategoria, $descricao, $codCategoria))) {
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

        cadPedido: <input type="text" name="codCatPedido" value="<?php echo $codPedido ?>">
        <span class="obrigatorio">*<?php echo $codPedidoErro ?></span>
        <br>
        idCliente: <input type="text" name="idCliente" value="<?php echo  $idCliente ?>">
        <span class="obrigatorio">*<?php echo $idClienteErro ?></span>
        <br>
        horario_abre: <input type="text" name="horario_abre" value="<?php echo  $horario_abre ?>">
        <span class="obrigatorio">*<?php echo $horario_abreErro ?></span>
        <br>
        horario_fecha: <input type="text" name="horario_fecha" value="<?php echo $horario_fecha ?>">
        <span class="obrigatorio">*<?php echo $horario_fechaErro ?></span>
        <br>
        <input type="submit" value="Alterar" name="submit">
    </fieldset>
</form>
<span><?php echo $msgErro ?></span>