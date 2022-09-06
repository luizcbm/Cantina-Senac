<?php
$titulo = "dilema";
include "head.php";

if (!empty($_POST)) {


    $ladoA = $_POST['ladoA'];
    $ladoB = $_POST['ladoB'];
    $ladoC = $_POST['ladoC'];

    if ($ladoA > 60) {
        echo "lado A não pode ser maior que 60";
    }
    if ($ladoB > 100 || $ladoB < 0) {
        echo 'lado B não pode ser maior 100';
    }
    if ($ladoC < 100 || $ladoC > 200) {
        echo "ladoC não pode ser ";
    }
}



?>





<div class="container">
    <h1>enntre em contato</h1>
</div>

<form action="" method="post">
    <div class="form-control">
        <label for="ladoA">digite o lado A do triangulo</label>
        <input id="ladoA" type="text" name="ladoA">
    </div>
    <form action="" method="post">
        <div class="form-control">
            <label for="ladoB">digite o lado B do triangulo</label>
            <input id="ladoB" type="text" name="ladoB">
        </div>
        <form action="" method="post">
            <div class="form-control">
                <label for="ladoC">digite o lado C do triangulo</label>
                <input id="ladoC" type="text" name="ladoC">
            </div>
            <button type="subit">Enviar</button>
        </form>
        <br>


        <?php
        include "footer.php";
        ?>