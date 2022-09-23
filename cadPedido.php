<?php
include "include/MySql.php";



$idCliente = "";
$horario_abre ="";
$horario_fecha ="";


$idClienteErro = "";
$horario_abreErro ="";
$horario_fechaErro ="";
$msgErro = "";
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

if (empty($_POST['idCliente']))
    $idClienteErro = "idCliente é obrigatório!";
else
    $idCliente = $_POST['idCliente'];

if (empty($_POST['horario_abre']))
    $horario_abreErro  = "horario_abre  é obrigatório!";
else
    $horario_abre  = $_POST['horario_abre'];

    if (empty($_POST['horario_fecha']))
    $horario_fechaErro  = "horario_fecha  é obrigatório!";
else
    $horario_fecha= $_POST['horario_fecha'];

if ($idCliente && $horario_abre && $horario_fecha) {
    //Verificar se ja existe o email
            $sql = $pdo->prepare("INSERT INTO pedido(idCliente, horario_abre, horario_fecha)
                                    VALUES ( ?, ?, ?)");
            if ($sql->execute(array($idCliente,$horario_abre, $horario_fecha))) {
                $msgErro = "Dados cadastrados com sucesso!";
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
        <input type="text" placeholder="idCliente" name="idCliente" value="<?php echo $idCliente ?>">
        <span class="obrigatorio">*<?php echo $idClienteErro ?></span>
        <br>
        <input type="time" placeholder="horario_abre" name="horario_abre" value="<?php echo $horario_abre ?>">
        <span class="obrigatorio">*<?php echo $horario_abreErro ?></span>
        <br>
        <input type="time" placeholder="horario_fecha" name="horario_fecha" value="<?php echo $horario_fecha ?>">
        <span class="obrigatorio">*<?php echo $horario_fechaErro ?></span>
        <br>
        <div class="button">
            <a href="listPedido.php"><button type="submit" name="submit">Salvar</button></a>

        </div>
    </div>

</form>
<span><?php echo $msgErro ?></span>