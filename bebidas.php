<?php
include "site/include/MySql.php";



$sql = $pdo->prepare('SELECT * FROM produtos WHERE codigo LIKE "11" ');

if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($info as $key => $value) {


                                                                        

    $imagem = $value["imagem"];

    echo '<img style= "width:300px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
    
    echo '<h2>'.$value["nome"].'</h2>';

    echo "</div>";  

    }

}
?>
 <link rel="stylesheet" href="site/css/refri.css">

