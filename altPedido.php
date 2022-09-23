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

if (isset($_GET['id'])) {
    $codCategoria = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM pedido  WHERE codPedido= ?");
    if ($sql->execute(array($codCategoria))) {
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

    if ($codPedido && $idCliente && $horario_abre && $horario_fecha) {
        $sql = $pdo->prepare("UPDATE pedido SET idCliente=?,horario_abre=?,horario_fecha=?  WHERE codPedido=?");
  
        if ($sql->execute(array($idCliente,$horario_abre,$horario_fecha,$codPedido))) {
            $msgErro = "Dados alterados com sucesso!";
            header('location:listPedido.php');
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
        <input type="hidden" name="codPedido" value="<?php echo  $codPedido ?>">
        <legend>Alterar categoria</legend>
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