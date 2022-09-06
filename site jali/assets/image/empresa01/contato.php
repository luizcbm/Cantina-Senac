<?php
include "head.php";
if( !empty($_POST)){

$usuario['nome'] = "jalison";
$usuario['idade'] = "18";
$usuario['endereco'] = "rua do atirador";
$usuario['altura'] = "1,65";
$usuario['cidade'] = "joinville";
$usuario['bairro'] = "itinga";


$usuario['nome_idade'] = $usuario['nome'] . " " . $usuario['idade'];
$usuario['endereco_altura'] = $usuario['endereco'] . " " . $usuario['altura'];
$usuario['ciade_bairro'] = $usuario['cidade'] . " " . $usuario['bairro'];



echo $_POST['nome'];
echo $_POST['idade'];
echo $_POST['endereco'];
echo $_POST['altura'];
echo $_POST['cidade'];
echo $_POST['bairro'];
}
?>
<div class="container">
    <h1>enntre em contato</h1>
</div>
<!---
method:é como as informaçoes serão enviadas para o servidos,
 isto é, como vamos trata-las dentro do nosso código depois do envio.
action: para onde vamos enviar estas informaçoes?

$gat
$post
---->
<form action="" method="post">
<div class="form-control">
        <label for="nome">digite seu endereco</label>
        <input id="nome" type="text" name="nome" placeholder="digite seu nome">
    </div>
<div class="form-control">
        <label for="idade">digite seu endereco</label>
        <input id="idade" type="text" name="idade" placeholder="digite sua idade">
    </div>
    <div class="form-control">
        <label for="endereco">digite seu endereco</label>
        <input id="endereco" type="text" name="endereco" placeholder="digite seu endereco">
    </div>
    <div class="form-control">
        <label for="altura">digite sua altura</label>
        <input id="altura" type="text" name="altura" placeholder="digite sua altura ">
    </div>
    <div class="form-control">
        <label for="cidade">digite sua cidade</label>
        <input id="cidade" type="text" name="cidade" placeholder="digite sua cidade ">
    </div>
    <div class="form-control">
        <label for="bairro">digite seu bairro</label>
        <input id="bairro" type="text" name="bairro" placeholder="digite seu bairro ">
    </div>
    
    <button type="subit">Enviar</button>
</form>
<br>
<?php
include "footer.php";
?>