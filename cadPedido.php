<?php
include "include/MySql.php";


$codPedido = "";
$idCliente = "";
$horario_abre ="";
$horario_fecha ="";

$codPedidoErro = "";
$idClienteErro = "";
$horario_abreErro ="";
$horario_fechaErro ="";
$msgErro = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (array($_POST['codPedido']))
    $codPedidoErro = "codPedido é obrigatório!";
else
    $codPedido  = $_POST['codPedido '];

if (empty($_POST['idCliente']))
    $idClienteErro = "idCliente é obrigatório!";
else
    $idCliente = $_POST['idCliente'];

if (empty($_POST['horario_abre ']))
    $horario_abreErro  = "horario_abre  é obrigatório!";
else
    $horario_abre  = $_POST['horario_abre '];

    if (empty($_POST['horario_fecha ']))
    $horario_fechaErro  = "horario_fecha  é obrigatório!";
else
    $horario_fechaErro = $_POST['horario_fecha '];

if ($codPedido && $idCliente && $horario_abre && $horario_fecha) {
    //Verificar se ja existe o email
            $sql = $pdo->prepare("INSERT INTO pedido(codPedido, idCliente, horario_abre, horario_fecha)
                                    VALUES (null, ?, ?, ?, ?)");
            if ($sql->execute(array($codPedido, $idCliente,$horario_abre, $horario_fecha))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $codPedido = "";
                $idCliente = "";
                $horario_abre = "";
                $horario_fecha = "";
                header('location:listPedido.php');
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
            <legend>Cadastro de pedidos</legend>

            <br>
        </div>
        <input type="text" placeholder="codPedido" name="codPedido" value="<?php echo $codPedido ?>">
        <span class="obrigatorio">*<?php echo $codPedidoErro ?></span>
        <br>
        <input type="text" placeholder="idCliente" name="idCliente" value="<?php echo $idCliente ?>">
        <span class="obrigatorio">*<?php echo $idClienteErro ?></span>
        <br>
        <input type="text" placeholder="horario_abre" name="horario_abre" value="<?php echo $horario_abre ?>">
        <span class="obrigatorio">*<?php echo $horario_abreErro ?></span>
        <br>
        <input type="text" placeholder="horario_fecha" name="horario_fecha" value="<?php echo $horario_fecha ?>">
        <span class="obrigatorio">*<?php echo $horario_fechaErro ?></span>
        <br>
        <div class="button">
            <a href="listPedido.php"><button type="submit" name="submit">Salvar</button></a>

        </div>
    </div>

</form>
<span><?php echo $msgErro ?></span>