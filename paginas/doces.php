<?php
include_once "head.php";
include_once "paginas/include/MySql.php";



$sql = $pdo->prepare('SELECT * FROM doces');
if(isset($_SESSION['codigo'])==0){
    echo ""; 
}else{
    echo '<a href="paginas/cadProdutos.php"><button type="submit" name="submit">Cadastrar</button></a>';
}

if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo "<div id='cardapio' class='flex'>"; 
    foreach ($info as $key => $value) {
        $imagem = $value["imagem"];
 
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
<h3><a href="index.php">Tela Principal</a></h3>
<link rel="stylesheet" href="assets/css/doces.css">
<?php
include "footer.php"
?>