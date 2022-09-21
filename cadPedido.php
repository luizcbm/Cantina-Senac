<?php
include "include/MySql.php";


$codPedido = "";
$idCliennte = "";
$horario_abre ="";
$horario_fecha ="";

$codPedidoErro = "";
$idCliennteErro = "";
$horario_abreErro ="";
$horario_fechaErro ="";
$msgErro = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['codPedido']))
        $codPedidoErro = "codPedido é obrigatório!";
    else
        $codPedido = $_POST['codPedido'];

        if (empty($_POST['idCliente']))
        $idClienteErro = "idCliente é obrigatório!";
    else
        $idCliente= $_POST['idCliente'];

        if (empty($_POST['horario_abre']))
        $horario_abreErro = "horario_abre é obrigatório!";
    else
        $horario_abre = $_POST['horario_abre'];

    if (empty($_POST['horario_fecha']))
        $horario_fechaErro = "horario_fecha é obrigatório!";
    else
        $horario_fecha = $_POST['horario_fecha'];

    $sql = $pdo->prepare("INSERT INTO categoria( codPedido,idCliente,horario_abre,horario_fecha)
                                                VALUES (NULL, ?,?,?,?)");
    if ($sql->execute(array($descricao))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $codPedido = "";
        $idCliennte = "";
        $horario_abre ="";
        $horario_fecha ="";


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
        <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
        <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
        <br>
        <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
        <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
        <br>
        <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
        <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
        <br>
        <div class="button">
            <a href="listCategoria.php"><button type="submit" name="submit">Salvar</button></a>

        </div>
    </div>

</form>
<span><?php echo $msgErro ?></span>