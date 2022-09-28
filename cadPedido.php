<?php
include_once "include/MySql.php";


$codProduto = "";
$idCliente = "";
$horario_abre ="";
$horario_fecha ="";


$idClienteErro = "";
$horario_abreErro ="";
$horario_fechaErro ="";
$msgErro = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

if (empty($_POST['clientes']))
    $idClienteErro = "cliente é obrigatório!";
else
    $idCliente = $_POST['clientes'];

if (empty($_POST['horario_abre']))
    $horario_abreErro  = "horario_abre  é obrigatório!";
else
    $horario_abre  = $_POST['horario_abre'];

    if (empty($_POST['horario_fecha']))
    $horario_fechaErro  = "horario_fecha  é obrigatório!";
else
    $horario_fecha= $_POST['horario_fecha'];

if (empty($_POST['produtos']))
    $horario_fechaErro  = "produto  é obrigatório!";
else    
    $codProduto= $_POST['produtos'];

if ($idCliente && $horario_abre && $horario_fecha && $codProduto) {
    //Verificar se ja existe o email
            $sql = $pdo->prepare("INSERT INTO pedido(idCliente, horario_abre, horario_fecha)
                                    VALUES ( ?, ?, ?)");
            if ($sql->execute(array($idCliente,$horario_abre, $horario_fecha))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $idCliente = "";
                $horario_abre = "";
                $horario_fecha = "";
                $codPedido = $pdo->lastInsertId();
                $sql = $pdo->prepare("INSERT INTO itenspedido( codProduto, codPedido)
                                    VALUES ( ?, ?)");
                if ($sql->execute(array($codProduto, $codPedido))) {
                    $msgErro = "Dados cadastrados com sucesso!";
                    $codProduto = "";
                    $codPedido = "";
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
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
        <select name="clientes" id="clientes">
            <option value="0">selecione o cliente</option>
            <?php
            $sql1 = $pdo->prepare('SELECT * FROM usuario ');
            if ($sql1->execute()) {
                $info = $sql1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($info as $key => $value) {
                    echo '<option value=' . $value['codigo'] . '>' . $value['nome'] . '</option>';
                }
            }
            ?>
        </select>
        <span class="obrigatorio">*<?php echo $idClienteErro ?></span>
        <br>
        <select name="produtos" id="produtos">
            <option value="0">selecione o produto</option>
            <?php
            $sql1 = $pdo->prepare('SELECT * FROM produtos ');
            if ($sql1->execute()) {
                $info = $sql1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($info as $key => $value) {
                    echo '<option value=' . $value['codigo'] . '>' . $value['nome'] . '</option>';
                }
            }
            ?>
        </select>
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