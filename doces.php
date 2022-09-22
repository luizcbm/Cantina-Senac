<?php
include "head.php";
include_once "MySql.php";



$sql = $pdo->prepare('SELECT * FROM item ');

if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo "<div id='cardapio' class='flex'>"; 
    foreach ($info as $key => $value) {
        $imagem = $value["imagens"];
 
            echo "<div id='item'>";
                echo "<h1>".$value["nome"]."</h1>";
                echo "<img id='imagem' style= 'width:300px;'src='data:imagem/jpg;charset=utf8;base64," . base64_encode($imagem) . "'></td>";
                echo "<p>".$value['descricao']."</p>";
                echo "<h1>".$value['valor']."</h1>";
                echo "<button>Comprar</button>";
            echo "</div>";
        
    }
    echo "</div>";

}
?>
<link rel="stylesheet" href="assets/css/doces.css">
<?php
include "footer.php"
?>