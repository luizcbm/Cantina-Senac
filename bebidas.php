<?php
include "site/include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM produtos WHERE codigo LIKE "4" ');

if ($sql->execute()) {

    $info = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($info as $key => $value) {

    echo "<div>";

    $imagem = $value["imagem"];

    echo '<img style= "width:300px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';

    echo '<h2>'.$value["nome"].'</h2>';

    echo "</div>";  

    }

}








?>